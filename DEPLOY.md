# Deployment Guide — ADYSURVE LTD (Cloudflare Pages)

## Overview

This site is built with **Astro** and deployed on **Cloudflare Pages**. The build is configured in the `adysurve-astro/` directory.

## Deploying to Cloudflare Pages

### Prerequisites

1. A [Cloudflare](https://cloudflare.com) account
2. A GitHub/GitLab repository with this code
3. A SendGrid (or other email API) account for form submissions

### Step 1 — Connect Repository

1. Log in to the [Cloudflare Dashboard](https://dash.cloudflare.com)
2. Go to **Workers & Pages** → **Pages**
3. Click **Connect to Git** and select your repository

### Step 2 — Configure Build Settings

| Setting | Value |
|---|---|
| Project name | `adysurve` |
| Production branch | `main` |
| Framework preset | Astro |
| Build command | `npm run build` |
| Build directory | `adysurve-astro` |
| Output directory | `dist` |
| Root directory | `adysurve-astro` |

### Step 3 — Set Environment Variables

In **Environment variables (advanced)**, add:

| Variable | Description |
|---|---|
| `EMAIL_API_KEY` | SendGrid API key for transactional emails |
| `EMAIL_API_URL` | SendGrid API URL (default works if blank) |
| `FROM_EMAIL` | Sender address (e.g., `info@adysurve.com`) |
| `TO_EMAIL` | Recipient for contact form/consultation emails |

### Step 4 — Deploy

Click **Save and Deploy**. Cloudflare will:
1. Install dependencies (`npm install`)
2. Build the project (`npm run build`)
3. Deploy to `https://<project>.pages.dev`

### Step 5 — Custom Domain

1. Go to your Pages project → **Custom domains**
2. Click **Set up a custom domain**
3. Enter `adysurve.com` (or your domain)
4. Update DNS records as instructed

## Cloudflare Pages CMS

The site uses Cloudflare Pages CMS (configured in `pages.config.json`).

To access:
1. Deploy the site to Cloudflare Pages first
2. Visit `https://<your-domain>/admin`
3. Authorize via your Git provider
4. Edit content directly through the visual editor

## Local Development

```bash
cd adysurve-astro
npm install
npm run dev       # Start dev server
npm run build     # Production build
npm run preview   # Preview production build locally
```

## Email Notifications

Form submissions use SendGrid API. If you use a different provider:
- Update the `EMAIL_API_URL` env variable
- The API contract expects `personalizations[0].to[0].email`, `from.email`, `subject`, and `content[0].value`

Files to modify if changing email provider:
- `adysurve-astro/functions/api/contact.ts`
- `adysurve-astro/functions/api/consultation.ts`
