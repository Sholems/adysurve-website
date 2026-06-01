<p align="center">
  <a href="https://adysurve.com" target="_blank">
    <img src="https://adysurve.com/images/ady-logo.png" width="120" alt="ADYSURVE LTD Logo">
  </a>
</p>

<h1 align="center">ADYSURVE LTD Website</h1>

<p align="center">
  <strong>Smart Solutions for a Secure Future.</strong><br>
  Built with Astro &middot; Deployed on Cloudflare Pages
</p>

---

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | [Astro](https://astro.build) v6 |
| Styling | [Tailwind CSS](https://tailwindcss.com) v3 |
| Interactivity | [Alpine.js](https://alpinejs.dev) v3 |
| Content | Astro Content Collections (YAML / MDX) |
| Hosting | [Cloudflare Pages](https://pages.cloudflare.com) |
| Adapter | `@astrojs/cloudflare` |
| CMS | Cloudflare Pages CMS (via `pages.config.json`) |
| Functions | Cloudflare Pages Functions (contact & consultation APIs) |

## Project Structure

```
adysurve-astro/
├── src/
│   ├── components/          # Reusable Astro components (Header, Footer, SEOHead)
│   ├── content/             # Content collections (services, projects, blog, etc.)
│   ├── layouts/             # Page layout (Layout.astro)
│   ├── pages/               # Route pages (index, about, contact, blog, etc.)
│   │   ├── academy/         # Megabyte Academy pages
│   │   ├── blog/            # Blog listing + dynamic posts
│   │   ├── projects/        # Project portfolio + dynamic projects
│   │   └── services/        # Services listing + dynamic services
│   ├── scripts/             # Client-side scripts (Alpine.js, scroll reveal)
│   └── styles/              # Global CSS (Tailwind + custom vars)
├── functions/api/           # Cloudflare Pages Functions
├── public/                  # Static assets (images, robots.txt, admin/)
├── astro.config.mjs         # Astro configuration
├── pages.config.json        # Cloudflare Pages CMS config
└── tailwind.config.mjs      # Tailwind configuration
```

## Getting Started

```bash
# Install dependencies
cd adysurve-astro
npm install

# Start dev server
npm run dev

# Build for production
npm run build

# Preview production build
npm run preview
```

## Content Management

Content can be managed through Sanity CMS. The Astro app falls back to YAML/MDX files in `src/content/` when Sanity is not configured.

### Sanity CMS

1. Create a free Sanity project at https://sanity.io/manage.
2. Set these environment variables locally and in Cloudflare Pages:
   - `PUBLIC_SANITY_PROJECT_ID`
   - `PUBLIC_SANITY_DATASET` (`production` by default)
   - `SANITY_API_TOKEN` for importing existing content
3. Import the existing content:

```bash
cd adysurve-astro
npm run sanity:import
```

4. Deploy after setting the Sanity env vars. The CMS will be available at `/admin`.

Local fallback content is stored in `src/content/` collections:

| Collection | Format | Description |
|---|---|---|
| `services` | YAML | 5 core service offerings |
| `projects` | YAML | Project portfolio entries |
| `blog` | MDX | Blog articles |
| `testimonials` | YAML | Client testimonials |
| `team` | YAML | Team member profiles |
| `academy` | YAML | Training program details |
| `settings` | YAML | Global site settings |

Content can also be edited via the Cloudflare Pages CMS visual editor (configured in `pages.config.json`).

## API Functions

- `POST /api/contact` &mdash; Contact form submission with email notification
- `POST /api/consultation` &mdash; Free consultation booking with email notification

## Deployment

The project is configured for **Cloudflare Pages** via `@astrojs/cloudflare`. Connect your repo to Cloudflare Pages and it will automatically build from the `adysurve-astro` directory.

Required environment variables in Cloudflare Pages:
- `EMAIL_API_KEY` &mdash; SendGrid API key
- `EMAIL_API_URL` &mdash; SendGrid API endpoint (default: `https://api.sendgrid.com/v3/mail/send`)
- `FROM_EMAIL` &mdash; Sender email address
- `TO_EMAIL` &mdash; Recipient email for form submissions

---

<p align="center">
  Built with care by <a href="https://getboldideas.com" target="_blank">Bold Ideas</a>
</p>
