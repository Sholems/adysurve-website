import { defineCollection, z } from 'astro:content';
import { glob } from 'astro/loaders';

// ============================================================
// Shared schemas
// ============================================================

const seoSchema = z.object({
  metaTitle: z.string().optional(),
  metaDescription: z.string().optional(),
});

const imageSchema = z.string().optional();

// ============================================================
// Services collection — YAML files in src/content/services/
// ============================================================

const services = defineCollection({
  loader: glob({ pattern: '**/[^_]*.yaml', base: './src/content/services' }),
  schema: seoSchema.extend({
    title: z.string(),
    icon: z.string().optional(),
    featuredImage: imageSchema,
    shortDescription: z.string(),
    fullDescription: z.string(),
    isActive: z.boolean().default(true),
    sortOrder: z.number().default(0),
  }),
});

// ============================================================
// Blog collection — MDX files in src/content/blog/
// ============================================================

const blog = defineCollection({
  loader: glob({ pattern: '**/*.{md,mdx}', base: './src/content/blog' }),
  schema: seoSchema.extend({
    title: z.string(),
    category: z.string().optional(),
    featuredImage: imageSchema,
    excerpt: z.string(),
    isFeatured: z.boolean().default(false),
    isPublished: z.boolean().default(true),
    publishedAt: z.date().optional(),
  }),
});

// ============================================================
// Projects collection — YAML files in src/content/projects/
// ============================================================

const projects = defineCollection({
  loader: glob({ pattern: '**/[^_]*.yaml', base: './src/content/projects' }),
  schema: seoSchema.extend({
    title: z.string(),
    serviceSlug: z.string().optional(),
    clientName: z.string().optional(),
    location: z.string().optional(),
    featuredImage: imageSchema,
    galleryImages: z.array(z.string()).optional(),
    description: z.string(),
    isFeatured: z.boolean().default(false),
    isActive: z.boolean().default(true),
  }),
});

// ============================================================
// Testimonials collection — YAML files in src/content/testimonials/
// ============================================================

const testimonials = defineCollection({
  loader: glob({ pattern: '**/[^_]*.yaml', base: './src/content/testimonials' }),
  schema: z.object({
    clientName: z.string(),
    clientTitle: z.string().optional(),
    clientCompany: z.string().optional(),
    clientAvatar: imageSchema,
    content: z.string(),
    rating: z.number().min(1).max(5).default(5),
    isActive: z.boolean().default(true),
  }),
});

// ============================================================
// Team collection — YAML files in src/content/team/
// ============================================================

const team = defineCollection({
  loader: glob({ pattern: '**/[^_]*.yaml', base: './src/content/team' }),
  schema: z.object({
    name: z.string(),
    role: z.string(),
    photo: imageSchema,
    bio: z.string().optional(),
    socialLinks: z
      .array(
        z.object({
          platform: z.string(),
          url: z.string().url(),
        }),
      )
      .optional(),
    isActive: z.boolean().default(true),
    sortOrder: z.number().default(0),
  }),
});

// ============================================================
// Academy programs collection — YAML files in src/content/academy/
// ============================================================

const academyModuleSchema = z.tuple([z.string(), z.array(z.string())]);

const academy = defineCollection({
  loader: glob({ pattern: '**/[^_]*.yaml', base: './src/content/academy' }),
  schema: seoSchema.extend({
    title: z.string(),
    subtitle: z.string(),
    kicker: z.string(),
    service: z.string(),
    duration: z.string(),
    facts: z.array(
      z.object({
        icon: z.string(),
        label: z.string(),
        value: z.string(),
      }),
    ),
    intro: z.array(z.string()),
    why: z.object({
      label: z.string(),
      heading: z.string(),
      text: z.string(),
      items: z.array(z.string()),
    }),
    curriculum: z.object({
      heading: z.string(),
      text: z.string(),
      modules: z.array(academyModuleSchema),
    }),
    corporate: z.object({
      label: z.string(),
      heading: z.string(),
      paragraphs: z.array(z.string()),
      methods: z.array(z.string()),
      panelHeading: z.string(),
      items: z.array(z.string()),
    }),
    cards: z.object({
      apply: z.object({
        heading: z.string(),
        intro: z.string(),
        items: z.array(z.string()),
        note: z.string().optional(),
      }),
      benefits: z.object({
        heading: z.string(),
        intro: z.string(),
        items: z.array(z.string()),
      }),
      careers: z.object({
        heading: z.string(),
        intro: z.string(),
        items: z.array(z.string()),
        note: z.string().optional(),
      }),
    }),
    cta: z.object({
      heading: z.string(),
      paragraphs: z.array(z.string()),
    }),
  }),
});

// ============================================================
// Site settings collection — single YAML file in src/content/settings/
// ============================================================

const settings = defineCollection({
  loader: glob({ pattern: '**/[^_]*.yaml', base: './src/content/settings' }),
  schema: z.object({
    siteName: z.string(),
    siteTagline: z.string(),
    siteEmail: z.string(),
    sitePhone: z.string(),
    siteAddress: z.string(),
    siteWhatsapp: z.string().optional(),
    businessHours: z.string().optional(),
    googleAnalyticsId: z.string().optional(),
    facebookUrl: z.string().optional(),
    twitterUrl: z.string().optional(),
    linkedinUrl: z.string().optional(),
    instagramUrl: z.string().optional(),
    youtubeUrl: z.string().optional(),
    tiktokUrl: z.string().optional(),
    heroHeadline: z.string().optional(),
    heroSubheadline: z.string().optional(),
    aboutSummary: z.string().optional(),
  }),
});

// ============================================================
// Export all collections
// ============================================================

export const collections = {
  services,
  blog,
  projects,
  testimonials,
  team,
  academy,
  settings,
};
