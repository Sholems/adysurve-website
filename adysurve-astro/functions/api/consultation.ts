interface ConsultationFormData {
  name: string;
  email: string;
  phone?: string;
  service_interest?: string;
  preferred_date: string;
  preferred_time: string;
  meeting_mode: string;
  notes?: string;
  website?: string;
}

const ALLOWED_TIMES = ['09:00', '10:00', '11:00', '12:00', '14:00', '15:00', '16:00'];
const ALLOWED_MODES = ['Phone Call', 'WhatsApp', 'Video Call', 'Office Visit'];

export const onRequest: PagesFunction = async (context) => {
  if (context.request.method !== 'POST') {
    return new Response('Method not allowed', { status: 405 });
  }

  try {
    const formData = await context.request.json<ConsultationFormData>();

    // Honeypot check
    if (formData.website) {
      return Response.json({
        success: true,
        message: 'Your free consultation has been requested.',
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
    if (!formData.preferred_date) {
      errors.push('Preferred date is required.');
    } else {
      const selectedDate = new Date(formData.preferred_date);
      const today = new Date();
      today.setHours(0, 0, 0, 0);
      if (selectedDate < today) {
        errors.push('Preferred date must be today or later.');
      }
    }
    if (!formData.preferred_time) {
      errors.push('Preferred time is required.');
    } else if (!ALLOWED_TIMES.includes(formData.preferred_time)) {
      errors.push('Invalid time slot selected.');
    }
    if (!formData.meeting_mode) {
      errors.push('Meeting mode is required.');
    } else if (!ALLOWED_MODES.includes(formData.meeting_mode)) {
      errors.push('Invalid meeting mode selected.');
    }

    if (errors.length > 0) {
      return Response.json({ success: false, errors }, { status: 422 });
    }

    const {
      name,
      email,
      phone = 'Not provided',
      service_interest = 'Not provided',
      preferred_date,
      preferred_time,
      meeting_mode,
      notes = 'No additional notes provided.',
    } = formData;

    // Format the date for display
    const formattedDate = new Date(preferred_date + 'T12:00:00').toLocaleDateString('en-GB', {
      weekday: 'long',
      day: 'numeric',
      month: 'long',
      year: 'numeric',
    });

    // Send email via email API
    const apiKey = context.env.EMAIL_API_KEY;
    const apiUrl = context.env.EMAIL_API_URL || 'https://api.sendgrid.com/v3/mail/send';
    const fromEmail = context.env.FROM_EMAIL || 'info@adysurve.com';
    const toEmail = context.env.TO_EMAIL || 'info@adysurve.com';

    if (apiKey && apiUrl) {
      const emailBody = `
New free consultation booking from ADYSURVE LTD

Name: ${name}
Email: ${email}
Phone: ${phone}
Service Interest: ${service_interest}
Preferred Date: ${formattedDate}
Preferred Time: ${preferred_time}
Meeting Mode: ${meeting_mode}

Notes:
${notes}
      `.trim();

      const emailPayload = {
        personalizations: [{ to: [{ email: toEmail }] }],
        from: { email: fromEmail, name: 'ADYSURVE Website' },
        reply_to: { email, name },
        subject: `New free consultation booking: ${formattedDate} at ${preferred_time}`,
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
      message: 'Your free consultation has been requested. Our team will confirm the appointment shortly.',
    });
  } catch (error) {
    console.error('Consultation booking error:', error);
    return Response.json(
      { success: false, errors: ['An unexpected error occurred. Please try again.'] },
      { status: 500 },
    );
  }
};
