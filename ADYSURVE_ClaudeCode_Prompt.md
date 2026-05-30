# ADYSURVE LTD — Laravel Website: Claude Code Agent Prompt

---

## 🧠 AGENT ROLE & MISSION

You are a **senior full-stack Laravel developer** and **UI/UX engineer** with deep expertise in:
- Laravel 11+ (latest stable) with modern best practices
- Blade templating + Livewire (where interactive components are needed)
- Tailwind CSS v3 for utility-first, mobile-first styling
- On-page SEO architecture
- Filament v3 as the CMS/admin panel
- cPanel shared hosting deployment preparation

Your mission is to build the **complete production-ready website** for **ADYSURVE LTD**, a Nigerian technology and security services company. You will scaffold, configure, develop, and document every file needed so the developer can run the project locally on **Laragon** and later deploy to **cPanel shared hosting**.

---

## 🏢 COMPANY PROFILE

**Company Name:** ADYSURVE LTD.
**Tagline:** *Securing Tomorrow, Today.*
**Location:** Nigeria
**Core Services:**
1. Networks & Security (IT Infrastructure & Support)
2. CCTV Installation & Surveillance Security
3. Solar Renewable Energy Design & Installation
4. IT Essentials for Beginners (Training)
5. Graphic Designs & Media Communication

**Brand Colors (extracted from logo):**
- **Gold/Amber:** `#C9972B` (primary accent — logo gold)
- **Dark Charcoal:** `#3A3A3A` (logo dark, text)
- **Off-White/Light Gray:** `#F5F5F5` (backgrounds)
- **Pure White:** `#FFFFFF`
- **Deep Dark:** `#1A1A1A` (footer, dark sections)

**CSS Variable names to use throughout:**
```css
--color-primary: #C9972B;
--color-primary-dark: #A67C1F;
--color-primary-light: #E8B84B;
--color-dark: #3A3A3A;
--color-darker: #1A1A1A;
--color-light: #F5F5F5;
--color-white: #FFFFFF;
--color-text: #2D2D2D;
--color-text-muted: #6B6B6B;
```

---

## 🛠️ TECH STACK

| Layer | Technology |
|---|---|
| Framework | Laravel 11 (latest) |
| PHP | PHP 8.2+ |
| Frontend Styling | Tailwind CSS v3 |
| Admin/CMS | Filament v3 |
| Templating | Blade with components |
| Icons | Heroicons (via Blade Heroicons) + custom SVGs |
| Images | Unsplash-sourced (via `picsum.photos` placeholders initially) |
| Animations | Alpine.js + CSS transitions |
| SEO | `spatie/laravel-sitemap` + manual meta layer |
| Forms | Livewire v3 forms with validation |
| Local Dev | Laragon (MySQL, PHP 8.2, Apache) |
| Deployment | cPanel shared hosting (Apache + `.htaccess`) |

---

## 📁 PROJECT SETUP INSTRUCTIONS

### Step 1 — Create Laravel Project

```bash
cd C:/laragon/www
composer create-project laravel/laravel adysurve
cd adysurve
```

### Step 2 — Install Dependencies

```bash
# Tailwind CSS
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p

# Alpine.js
npm install alpinejs

# Filament v3 (CMS)
composer require filament/filament:"^3.0"
php artisan filament:install --panels

# Spatie SEO sitemap
composer require spatie/laravel-sitemap

# Blade Heroicons
composer require blade-ui-kit/blade-heroicons

# Laravel Activity Log (optional, for admin audit)
composer require spatie/laravel-activitylog

# Image intervention for media
composer require intervention/image

npm install && npm run build
```

### Step 3 — Environment Setup

Configure `.env`:
```env
APP_NAME="ADYSURVE LTD"
APP_ENV=local
APP_URL=http://adysurve.test
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=adysurve_db
DB_USERNAME=root
DB_PASSWORD=
```

Create the database `adysurve_db` in phpMyAdmin (Laragon).

---

## 🗂️ DATABASE SCHEMA & MIGRATIONS

Create and run these migrations in order:

### 1. `services` table
```php
Schema::create('services', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->string('icon')->nullable(); // heroicon name or SVG filename
    $table->string('featured_image')->nullable();
    $table->text('short_description');
    $table->longText('full_description');
    $table->string('meta_title')->nullable();
    $table->text('meta_description')->nullable();
    $table->boolean('is_active')->default(true);
    $table->integer('sort_order')->default(0);
    $table->timestamps();
});
```

### 2. `projects` table (portfolio/case studies)
```php
Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->foreignId('service_id')->constrained()->onDelete('cascade');
    $table->string('client_name')->nullable();
    $table->string('location')->nullable();
    $table->string('featured_image')->nullable();
    $table->json('gallery_images')->nullable();
    $table->text('description');
    $table->string('meta_title')->nullable();
    $table->text('meta_description')->nullable();
    $table->boolean('is_featured')->default(false);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### 3. `testimonials` table
```php
Schema::create('testimonials', function (Blueprint $table) {
    $table->id();
    $table->string('client_name');
    $table->string('client_title')->nullable();
    $table->string('client_company')->nullable();
    $table->string('client_avatar')->nullable();
    $table->text('content');
    $table->tinyInteger('rating')->default(5);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### 4. `team_members` table
```php
Schema::create('team_members', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('role');
    $table->string('photo')->nullable();
    $table->text('bio')->nullable();
    $table->json('social_links')->nullable();
    $table->boolean('is_active')->default(true);
    $table->integer('sort_order')->default(0);
    $table->timestamps();
});
```

### 5. `contact_messages` table
```php
Schema::create('contact_messages', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->string('phone')->nullable();
    $table->string('service_interest')->nullable();
    $table->string('subject');
    $table->text('message');
    $table->boolean('is_read')->default(false);
    $table->timestamps();
});
```

### 6. `site_settings` table
```php
Schema::create('site_settings', function (Blueprint $table) {
    $table->id();
    $table->string('key')->unique();
    $table->text('value')->nullable();
    $table->string('type')->default('text'); // text, textarea, image, boolean
    $table->timestamps();
});
```

Run: `php artisan migrate`

---

## 🌱 DATABASE SEEDERS

### SiteSettingsSeeder
Seed the following key-value pairs into `site_settings`:

| key | value |
|---|---|
| site_name | ADYSURVE LTD. |
| site_tagline | Securing Tomorrow, Today |
| site_email | info@adysurve.com |
| site_phone | +234 XXX XXX XXXX |
| site_address | Nigeria |
| site_whatsapp | +234 XXX XXX XXXX |
| google_analytics_id | (empty) |
| facebook_url | (empty) |
| twitter_url | (empty) |
| linkedin_url | (empty) |
| instagram_url | (empty) |
| hero_headline | Professional IT, Security & Energy Solutions |
| hero_subheadline | We protect your infrastructure, power your future, and connect your world. |
| about_summary | ADYSURVE LTD is a leading Nigerian technology and security company... |

### ServicesSeeder
Seed all 5 services with full content:

1. **Networks & Security** — slug: `networks-security`
2. **CCTV Installation & Surveillance** — slug: `cctv-surveillance`
3. **Solar Renewable Energy** — slug: `solar-energy`
4. **IT Essentials Training** — slug: `it-training`
5. **Graphic Design & Media** — slug: `graphic-design-media`

Each service must have:
- Compelling `short_description` (2 sentences)
- Rich `full_description` (4–6 paragraphs covering what it is, what ADYSURVE offers, benefits, who it's for)
- Proper `meta_title` and `meta_description` (SEO-optimized, 150–160 chars for description)

Run: `php artisan db:seed`

---

## 🗺️ SITE ARCHITECTURE & ROUTES

### Public Routes (`routes/web.php`)

```php
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServicesController::class, 'show'])->name('services.show');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [ProjectsController::class, 'show'])->name('projects.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
```

---

## 📄 PAGES TO BUILD

### 1. HOME PAGE (`/`)

**Sections (in order):**

#### A. Hero Section
- Full-viewport height, dark overlay on background image (network/tech/security themed)
- Gold diagonal accent element (matching logo aesthetic)
- Animated headline: *"Securing Tomorrow, Today."*
- Subheadline with service highlights
- Two CTAs: `[Get a Free Quote]` (gold button) + `[Our Services]` (outline button)
- Floating stats bar below hero: `500+ Projects` | `10+ Years Experience` | `98% Client Satisfaction` | `5 Core Services`

#### B. Services Section
- Section title: *"What We Do"*
- 5 service cards in a responsive grid (2 cols mobile → 3 cols tablet → 5 cols on wide, or 2×3 layout)
- Each card: gold icon top, service name, short description, `[Learn More →]` link
- Hover: card lifts with gold bottom border animation

#### C. Why Choose Us Section
- Split layout: left = image collage / right = bullet points
- Points: Certified Professionals | End-to-End Solutions | Fast Response Time | Local Expertise | Affordable Pricing | Quality Guarantee
- Each point has a gold checkmark icon

#### D. Featured Projects / Portfolio Teaser
- 3 featured project cards with image, category badge, title, brief description
- `[View All Projects]` CTA at bottom

#### E. Testimonials Section
- Dark background (`#1A1A1A`) with gold accents
- Carousel/slider (Alpine.js) showing 3 client testimonials
- Star ratings, client name, company

#### F. Call-to-Action Banner
- Bold full-width section: *"Ready to Secure & Empower Your Business?"*
- Gold background with dark text
- CTA: `[Contact Us Today]`

#### G. Blog/News Teaser (optional, stub for future)
- Show 3 placeholder cards with "Coming Soon" or skip if not needed

---

### 2. ABOUT PAGE (`/about`)

**Sections:**
- Hero banner with page title + breadcrumb
- Company Story (who we are, founded, mission)
- Vision & Mission cards
- Core Values (grid of 6 values with icons)
- Team Section (photo grid with name + role)
- Certifications / Partners logos strip
- CTA to Contact

**SEO Meta:**
- Title: `About ADYSURVE LTD | IT, Security & Solar Solutions in Nigeria`
- Description: `Learn about ADYSURVE LTD — Nigeria's trusted provider of IT infrastructure, CCTV surveillance, solar energy, and technology training solutions.`

---

### 3. SERVICES INDEX PAGE (`/services`)

- Hero banner
- Intro paragraph
- Large service cards (one per row on mobile, 2 on tablet) with featured image, title, description excerpt, `[Read More]`
- Each card links to individual service page

---

### 4. SERVICE DETAIL PAGE (`/services/{slug}`)

Dynamic. Structure:
- Hero with service name + breadcrumb
- Service overview (rich text from DB)
- What's Included (bullet list or icon list pulled from content)
- Benefits section
- Related projects for this service
- FAQ accordion (hardcoded or DB-driven)
- CTA: *"Request This Service"* → links to contact with service pre-selected

**SEO:** Dynamic `meta_title` and `meta_description` from DB per service.

---

### 5. PROJECTS PAGE (`/projects`)

- Filterable portfolio grid (filter by service category, Alpine.js)
- Project cards: image, title, service badge, location, `[View Details]`
- Pagination

---

### 6. PROJECT DETAIL PAGE (`/projects/{slug}`)

- Hero image
- Project title, client, location, service category
- Description
- Image gallery (lightbox)
- Related projects

---

### 7. CONTACT PAGE (`/contact`)

- Hero banner
- Two-column layout:
  - Left: contact form (Name, Email, Phone, Service Interest dropdown, Subject, Message, Submit)
  - Right: contact info cards (Address, Phone, Email, WhatsApp, Business Hours), embedded Google Map iframe (placeholder)
- Livewire form with real-time validation
- Success message after submission
- Contact info pulled from `site_settings`

**SEO Meta:**
- Title: `Contact ADYSURVE LTD | Get a Free Consultation`
- Description: `Contact ADYSURVE LTD for IT support, CCTV installation, solar energy, and graphic design services in Nigeria. Request a free quote today.`

---

### 8. PRIVACY POLICY & TERMS (static Blade views)

Standard legal pages with proper heading hierarchy.

---

## 🏗️ BLADE COMPONENT ARCHITECTURE

Create reusable Blade components under `resources/views/components/`:

```
components/
├── layout/
│   ├── app.blade.php          # Main layout wrapper
│   ├── header.blade.php       # Sticky navigation
│   └── footer.blade.php       # 4-column footer
├── ui/
│   ├── button.blade.php       # Primary/secondary/outline variants
│   ├── service-card.blade.php
│   ├── project-card.blade.php
│   ├── testimonial-card.blade.php
│   ├── team-card.blade.php
│   ├── breadcrumb.blade.php
│   ├── page-hero.blade.php    # Reusable inner-page hero banner
│   ├── section-header.blade.php # Centered title + subtitle
│   └── alert.blade.php        # Success/error alerts
├── seo/
│   └── meta.blade.php         # All meta tags, OG tags, canonical
└── icons/
    └── *.blade.php            # Custom SVG icons if needed
```

---

## 🧭 NAVIGATION STRUCTURE

### Primary Nav (header)
```
Logo | Home | About | Services ▾ | Projects | Contact | [Get a Quote] (CTA button)
```

Services dropdown shows all 5 services.

Mobile: Hamburger → slide-down menu (Alpine.js).

### Footer (4 columns)

**Column 1 — About**
- Logo (white version)
- 2-line company description
- Social media icons (Facebook, Instagram, Twitter, LinkedIn, WhatsApp)

**Column 2 — Services**
- Links to all 5 service pages

**Column 3 — Quick Links**
- Home, About, Projects, Contact, Privacy Policy, Terms

**Column 4 — Contact Info**
- Address with map icon
- Phone with phone icon
- Email with email icon
- WhatsApp with WhatsApp icon
- Business hours

**Footer Bottom Bar**
- Copyright: `© 2025 ADYSURVE LTD. All rights reserved.`
- Built with ❤ in Nigeria

---

## 🎨 DESIGN SYSTEM & UI GUIDELINES

### Typography
Use Google Fonts (loaded via `<link>` in layout head):
- **Display/Headings:** `Syne` (bold, geometric — matches the angular logo)
- **Body:** `DM Sans` (clean, modern readability)

```html
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
```

### Tailwind Config (`tailwind.config.js`)
```js
module.exports = {
  content: ['./resources/**/*.blade.php', './resources/**/*.js'],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#C9972B',
          dark: '#A67C1F',
          light: '#E8B84B',
        },
        dark: {
          DEFAULT: '#3A3A3A',
          deeper: '#1A1A1A',
        },
        light: '#F5F5F5',
      },
      fontFamily: {
        display: ['Syne', 'sans-serif'],
        body: ['DM Sans', 'sans-serif'],
      },
    },
  },
  plugins: [require('@tailwindcss/typography'), require('@tailwindcss/forms')],
}
```

Install plugins: `npm install -D @tailwindcss/typography @tailwindcss/forms`

### Design Principles
- **Mobile-first:** All components designed from 320px up
- **Gold accents** on borders, underlines, hover states, CTA buttons
- **Dark sections** alternate with light for visual rhythm
- **Cards** have subtle shadows, rounded corners (`rounded-xl`), hover lift effects
- **Section spacing:** `py-16 md:py-24` consistently
- **Container:** `max-w-7xl mx-auto px-4 sm:px-6 lg:px-8`
- **Buttons:** Gold fill for primary, dark outline for secondary, always rounded-full

---

## 🔍 SEO IMPLEMENTATION (CRITICAL)

### 1. Meta Component (`components/seo/meta.blade.php`)

Every page must pass these to the layout:
```php
@props([
    'title' => config('app.name'),
    'description' => 'ADYSURVE LTD offers IT infrastructure, CCTV, solar energy, IT training, and graphic design services in Nigeria.',
    'image' => asset('images/og-default.jpg'),
    'canonical' => request()->url(),
    'type' => 'website',
])
```

Output in `<head>`:
```html
<title>{{ $title }} | ADYSURVE LTD</title>
<meta name="description" content="{{ $description }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ $canonical }}">

<!-- Open Graph -->
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:type" content="{{ $type }}">
<meta property="og:site_name" content="ADYSURVE LTD">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">

<!-- Schema.org JSON-LD -->
```

### 2. Schema.org Structured Data

Inject JSON-LD in layout `<head>`:

**Organization Schema (global):**
```json
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "ADYSURVE LTD",
  "url": "https://adysurve.com",
  "logo": "https://adysurve.com/images/logo.png",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+234-XXX-XXX-XXXX",
    "contactType": "customer service"
  },
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "NG"
  }
}
```

**Service Schema** (on each service page):
```json
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ $service->title }}",
  "provider": { "@type": "Organization", "name": "ADYSURVE LTD" },
  "description": "{{ $service->short_description }}"
}
```

**LocalBusiness Schema** (on contact page):
```json
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "ADYSURVE LTD",
  "image": "...",
  "telephone": "...",
  "address": { "@type": "PostalAddress", "addressCountry": "NG" },
  "openingHours": "Mo-Fr 08:00-17:00"
}
```

### 3. Sitemap (`/sitemap.xml`)

Use `spatie/laravel-sitemap`. In `SitemapController`:
```php
Sitemap::create()
    ->add(Url::create('/'))
    ->add(Url::create('/about'))
    ->add(Url::create('/services'))
    ->add(Url::create('/projects'))
    ->add(Url::create('/contact'))
    ->add(Service::all()->map(fn($s) => Url::create("/services/{$s->slug}")))
    ->add(Project::all()->map(fn($p) => Url::create("/projects/{$p->slug}")))
    ->writeToFile(public_path('sitemap.xml'));
```

Add console command to regenerate: `php artisan sitemap:generate`

### 4. robots.txt
```
User-agent: *
Allow: /
Disallow: /admin
Sitemap: https://adysurve.com/sitemap.xml
```

### 5. URL Structure
- Clean slugs: `/services/cctv-surveillance`
- No trailing slashes
- All lowercase
- Breadcrumbs on every inner page (with schema `BreadcrumbList`)

### 6. Performance SEO
- Lazy-load all images: `loading="lazy"` attribute
- Use `width` and `height` on all `<img>` tags
- Minify assets: `npm run build` (Vite)
- Add `<link rel="preconnect" href="https://fonts.googleapis.com">` for fonts
- Use `webp` format for images where possible

---

## ⚙️ FILAMENT v3 ADMIN PANEL (CMS)

Admin URL: `/admin`

### Resources to create:

1. **ServiceResource** — CRUD for services with rich text editor (TipTap), image upload, SEO fields, sort order
2. **ProjectResource** — CRUD with gallery image upload, service relationship, featured toggle
3. **TestimonialResource** — CRUD with star rating, avatar upload, active toggle
4. **TeamMemberResource** — CRUD with photo, role, bio, social links
5. **ContactMessageResource** — Read-only list with mark-as-read, email export
6. **SiteSettingResource** — Key-value settings editor

### Filament Config
```php
// In AdminPanelProvider
->colors(['primary' => Color::Amber])
->brandName('ADYSURVE LTD Admin')
->favicon(asset('images/favicon.ico'))
```

### Filament Plugins to install:
```bash
composer require filament/spatie-laravel-media-library-plugin:"^3.0"
php artisan vendor:publish --tag="filament-config"
```

Use `SpatieMediaLibraryFileUpload` for all image fields.

### Create First Admin User:
```bash
php artisan make:filament-user
```

---

## 🖼️ IMAGE STRATEGY

For initial development, use high-quality placeholder images from `https://picsum.photos`:
- Hero backgrounds: `https://picsum.photos/1920/1080?random=1`
- Service cards: `https://picsum.photos/600/400?random=N`
- Team photos: `https://picsum.photos/400/400?random=N`

Store images in `storage/app/public/` with proper symlink:
```bash
php artisan storage:link
```

Use Intervention Image for thumbnail resizing on upload.

**Icon Strategy:** Use Heroicons via `<x-heroicon-o-*>` for UI icons. For service-specific icons, use inline SVGs stored in `resources/views/components/icons/`.

Suggested icon mapping:
- Networks & Security → `heroicon-o-server` or shield-check
- CCTV → `heroicon-o-eye` or video-camera
- Solar Energy → `heroicon-o-sun`
- IT Training → `heroicon-o-academic-cap`
- Graphic Design → `heroicon-o-paint-brush`

---

## 🚀 CPANEL DEPLOYMENT PREPARATION

### `.htaccess` (public folder — already Laravel default)
Ensure this is in `public/.htaccess`:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

### Deployment Steps (document in `DEPLOY.md`):
1. Upload all files except `node_modules` and `vendor` to cPanel file manager
2. Upload `vendor` separately (or run `composer install --no-dev` on server)
3. Point document root to `/public`
4. Set up MySQL database in cPanel, update `.env`
5. Run `php artisan migrate --force`
6. Run `php artisan db:seed --force`
7. Run `php artisan storage:link`
8. Run `php artisan config:cache && php artisan route:cache && php artisan view:cache`
9. Set `APP_ENV=production` and `APP_DEBUG=false`

Create a `DEPLOY.md` file documenting every step in detail.

---

## 📂 FINAL DIRECTORY STRUCTURE

```
adysurve/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── AboutController.php
│   │   ├── ServicesController.php
│   │   ├── ProjectsController.php
│   │   ├── ContactController.php
│   │   ├── SitemapController.php
│   │   └── PageController.php
│   ├── Models/
│   │   ├── Service.php
│   │   ├── Project.php
│   │   ├── Testimonial.php
│   │   ├── TeamMember.php
│   │   ├── ContactMessage.php
│   │   └── SiteSetting.php
│   ├── Filament/Resources/
│   │   ├── ServiceResource.php (+ Pages/)
│   │   ├── ProjectResource.php (+ Pages/)
│   │   ├── TestimonialResource.php (+ Pages/)
│   │   ├── TeamMemberResource.php (+ Pages/)
│   │   ├── ContactMessageResource.php (+ Pages/)
│   │   └── SiteSettingResource.php (+ Pages/)
│   └── Console/Commands/
│       └── GenerateSitemap.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── SiteSettingsSeeder.php
│       └── ServicesSeeder.php
├── resources/
│   ├── views/
│   │   ├── components/
│   │   │   ├── layout/
│   │   │   ├── ui/
│   │   │   ├── seo/
│   │   │   └── icons/
│   │   ├── home/index.blade.php
│   │   ├── about/index.blade.php
│   │   ├── services/index.blade.php
│   │   ├── services/show.blade.php
│   │   ├── projects/index.blade.php
│   │   ├── projects/show.blade.php
│   │   ├── contact/index.blade.php
│   │   └── pages/
│   │       ├── privacy.blade.php
│   │       └── terms.blade.php
│   ├── css/app.css
│   └── js/app.js
├── public/
│   ├── images/ (logo, og-image, favicon)
│   └── robots.txt
├── routes/web.php
├── tailwind.config.js
├── vite.config.js
├── DEPLOY.md
└── .env.example
```

---

## ✅ QUALITY CHECKLIST

Before completing, verify:

- [ ] All 5 services have full DB records with SEO meta
- [ ] All pages have unique `<title>` and `<meta name="description">`
- [ ] Canonical URLs on every page
- [ ] Open Graph tags on every page
- [ ] JSON-LD structured data on relevant pages
- [ ] `sitemap.xml` generates correctly
- [ ] `robots.txt` in `public/` folder
- [ ] All images have `alt`, `width`, `height` attributes
- [ ] All images use `loading="lazy"`
- [ ] Mobile nav works correctly (hamburger open/close)
- [ ] Services dropdown works on desktop hover AND mobile tap
- [ ] Contact form validates and shows success message
- [ ] Contact form entries save to `contact_messages` table
- [ ] Filament admin is accessible at `/admin`
- [ ] All 6 Filament resources are functional
- [ ] `php artisan route:list` shows no route conflicts
- [ ] `npm run build` completes without errors
- [ ] `.env.example` is updated with all required keys
- [ ] `DEPLOY.md` is complete and accurate
- [ ] No hardcoded text that should come from `site_settings`
- [ ] Footer contact info renders from DB settings
- [ ] 404 and 500 error pages are styled with brand colors

---

## 🎯 AGENT EXECUTION ORDER

Follow this sequence strictly:

1. Create Laravel project + install all dependencies
2. Configure `tailwind.config.js` and `resources/css/app.css`
3. Configure `vite.config.js`
4. Run all migrations
5. Build all Eloquent Models with fillable, casts, relationships
6. Run all Seeders
7. Build Blade layout components (app.blade.php, header, footer)
8. Build SEO meta component
9. Build all UI components (button, service-card, project-card, etc.)
10. Build all Controllers
11. Register all routes
12. Build all page views (home first, then about, services, projects, contact)
13. Build all Filament Resources
14. Configure `robots.txt` and Sitemap command
15. Write `DEPLOY.md`
16. Run `npm run build` and `php artisan optimize`
17. Final QA against checklist above

---

*End of Agent Prompt — ADYSURVE LTD Website*
