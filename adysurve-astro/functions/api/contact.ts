interface ContactFormData {
  name: string;
  email: string;
  phone?: string;
  service_interest?: string;
  subject: string;
  message: string;
  website?: string;
}

export const onRequest: PagesFunction = async (context) => {
  if (context.request.method !== 'POST') {
    return new Response('Method not allowed', { status: 405 });
  }

  try {
    const formData = await context.request.json<ContactFormData>();

    // Honeypot check
    if (formData.website) {
      // Bot detected — silently accept to avoid revealing the check
      return Response.json({
        success: true,
        message: 'Thank you. Your message has been received.',
      });
    }

    // Validate required fields
    const errors: string[] = [];

    if (!formData.name || formData.name.trim().length < 2) {
      errors.push('Name is required (min 2 characters).');
    }
    if (!formData.email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.email)) {
      errors.push('A valid email address is required.');
    }
    if (!formData.subject || formData.subject.trim().length < 3) {
      errors.push('Subject is required (min 3 characters).');
    }
    if (!formData.message || formData.message.trim().length < 10) {
      errors.push('Message is required (min 10 characters).');
    }

    if (errors.length > 0) {
      return Response.json({ success: false, errors }, { status: 422 });
    }

    const {
      name,
      email,
      phone = 'Not provided',
      service_interest = 'Not provided',
      subject,
      message,
    } = formData;

    // Send email via email API service
    const apiKey = context.env.EMAIL_API_KEY;
    const apiUrl = context.env.EMAIL_API_URL || 'https://api.sendgrid.com/v3/mail/send';
    const fromEmail = context.env.FROM_EMAIL || 'info@adysurve.com';
    const toEmail = context.env.TO_EMAIL || 'info@adysurve.com';

    if (apiKey && apiUrl) {
      const emailBody = `
New website enquiry from ADYSURVE LTD

Name: ${name}
Email: ${email}
Phone: ${phone}
Service Interest: ${service_interest}
Subject: ${subject}

Message:
${message}
      `.trim();

      const emailPayload = {
        personalizations: [{ to: [{ email: toEmail }] }],
        from: { email: fromEmail, name: 'ADYSURVE Website' },
        reply_to: { email, name },
        subject: `New website enquiry: ${subject}`,
        content: [
          { type: 'text/plain', value: emailBody },
        ],
      };

      const response = await fetch(apiUrl, {
        method: 'POST',
        headers: {
          'Authorization': `Bearer ${apiKey}`,
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(emailPayload),
      });

      if (!response.ok) {
        console.error('Email API returned error:', await response.text());
      }
    }

    return Response.json({
      success: true,
      message: 'Thank you. Your message has been received and our team will respond shortly.',
    });
  } catch (error) {
    console.error('Contact form error:', error);
    return Response.json(
      { success: false, errors: ['An unexpected error occurred. Please try again.'] },
      { status: 500 },
    );
  }
};
