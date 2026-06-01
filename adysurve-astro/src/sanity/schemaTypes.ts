import { defineArrayMember, defineField, defineType } from 'sanity';

const seoFields = [
  defineField({ name: 'metaTitle', title: 'SEO Title', type: 'string' }),
  defineField({ name: 'metaDescription', title: 'SEO Description', type: 'text', rows: 3 }),
];

const imageUrlField = (name = 'featuredImage', title = 'Featured Image') =>
  defineField({
    name,
    title,
    type: 'string',
    description: 'Use a full image URL, or upload media later if you switch this field to Sanity images.',
  });

const stringList = defineArrayMember({ type: 'string' });

export const settings = defineType({
  name: 'siteSettings',
  title: 'Site Settings',
  type: 'document',
  fields: [
    defineField({ name: 'siteName', title: 'Site Name', type: 'string', validation: (Rule) => Rule.required() }),
    defineField({ name: 'siteTagline', title: 'Tagline', type: 'string' }),
    defineField({ name: 'siteEmail', title: 'Email', type: 'string' }),
    defineField({ name: 'sitePhone', title: 'Phone', type: 'string' }),
    defineField({ name: 'siteAddress', title: 'Address', type: 'text', rows: 3 }),
    defineField({ name: 'siteWhatsapp', title: 'WhatsApp Number', type: 'string' }),
    defineField({ name: 'businessHours', title: 'Business Hours', type: 'string' }),
    defineField({ name: 'heroHeadline', title: 'Hero Headline', type: 'string' }),
    defineField({ name: 'heroSubheadline', title: 'Hero Subheadline', type: 'text', rows: 2 }),
    defineField({ name: 'aboutSummary', title: 'About Summary', type: 'text', rows: 4 }),
    defineField({ name: 'facebookUrl', title: 'Facebook URL', type: 'url' }),
    defineField({ name: 'twitterUrl', title: 'Twitter/X URL', type: 'url' }),
    defineField({ name: 'linkedinUrl', title: 'LinkedIn URL', type: 'url' }),
    defineField({ name: 'instagramUrl', title: 'Instagram URL', type: 'url' }),
    defineField({ name: 'youtubeUrl', title: 'YouTube URL', type: 'url' }),
    defineField({ name: 'tiktokUrl', title: 'TikTok URL', type: 'url' }),
    defineField({ name: 'googleAnalyticsId', title: 'Google Analytics ID', type: 'string' }),
  ],
});

export const service = defineType({
  name: 'service',
  title: 'Services',
  type: 'document',
  fields: [
    defineField({ name: 'title', title: 'Title', type: 'string', validation: (Rule) => Rule.required() }),
    defineField({ name: 'slug', title: 'Slug', type: 'slug', options: { source: 'title' }, validation: (Rule) => Rule.required() }),
    defineField({ name: 'icon', title: 'Icon', type: 'string' }),
    imageUrlField(),
    defineField({ name: 'shortDescription', title: 'Short Description', type: 'text', rows: 4, validation: (Rule) => Rule.required() }),
    defineField({ name: 'fullDescription', title: 'Full Description HTML', type: 'text', rows: 8, validation: (Rule) => Rule.required() }),
    defineField({ name: 'isActive', title: 'Active', type: 'boolean', initialValue: true }),
    defineField({ name: 'sortOrder', title: 'Sort Order', type: 'number', initialValue: 0 }),
    ...seoFields,
  ],
});

export const project = defineType({
  name: 'project',
  title: 'Projects',
  type: 'document',
  fields: [
    defineField({ name: 'title', title: 'Title', type: 'string', validation: (Rule) => Rule.required() }),
    defineField({ name: 'slug', title: 'Slug', type: 'slug', options: { source: 'title' }, validation: (Rule) => Rule.required() }),
    defineField({ name: 'serviceSlug', title: 'Service Slug', type: 'string', validation: (Rule) => Rule.required() }),
    defineField({ name: 'clientName', title: 'Client Name', type: 'string' }),
    defineField({ name: 'location', title: 'Location', type: 'string' }),
    imageUrlField(),
    defineField({ name: 'galleryImages', title: 'Gallery Images', type: 'array', of: [stringList] }),
    defineField({ name: 'description', title: 'Description', type: 'text', rows: 5, validation: (Rule) => Rule.required() }),
    defineField({ name: 'isFeatured', title: 'Featured', type: 'boolean', initialValue: false }),
    defineField({ name: 'isActive', title: 'Active', type: 'boolean', initialValue: true }),
    ...seoFields,
  ],
});

export const testimonial = defineType({
  name: 'testimonial',
  title: 'Testimonials',
  type: 'document',
  fields: [
    defineField({ name: 'clientName', title: 'Client Name', type: 'string', validation: (Rule) => Rule.required() }),
    defineField({ name: 'clientTitle', title: 'Client Title', type: 'string' }),
    defineField({ name: 'clientCompany', title: 'Company', type: 'string' }),
    imageUrlField('clientAvatar', 'Client Avatar'),
    defineField({ name: 'content', title: 'Testimonial Content', type: 'text', rows: 4, validation: (Rule) => Rule.required() }),
    defineField({ name: 'rating', title: 'Rating', type: 'number', initialValue: 5, validation: (Rule) => Rule.min(1).max(5) }),
    defineField({ name: 'isActive', title: 'Active', type: 'boolean', initialValue: true }),
  ],
});

export const teamMember = defineType({
  name: 'teamMember',
  title: 'Team Members',
  type: 'document',
  fields: [
    defineField({ name: 'name', title: 'Name', type: 'string', validation: (Rule) => Rule.required() }),
    defineField({ name: 'role', title: 'Role', type: 'string', validation: (Rule) => Rule.required() }),
    imageUrlField('photo', 'Photo'),
    defineField({ name: 'bio', title: 'Bio', type: 'text', rows: 4 }),
    defineField({
      name: 'socialLinks',
      title: 'Social Links',
      type: 'array',
      of: [
        defineArrayMember({
          type: 'object',
          fields: [
            defineField({ name: 'platform', title: 'Platform', type: 'string' }),
            defineField({ name: 'url', title: 'URL', type: 'url' }),
          ],
        }),
      ],
    }),
    defineField({ name: 'isActive', title: 'Active', type: 'boolean', initialValue: true }),
    defineField({ name: 'sortOrder', title: 'Sort Order', type: 'number', initialValue: 0 }),
  ],
});

export const academyProgram = defineType({
  name: 'academyProgram',
  title: 'Academy Programs',
  type: 'document',
  fields: [
    defineField({ name: 'title', title: 'Title', type: 'string', validation: (Rule) => Rule.required() }),
    defineField({ name: 'slug', title: 'Slug', type: 'slug', options: { source: 'title' }, validation: (Rule) => Rule.required() }),
    defineField({ name: 'subtitle', title: 'Subtitle', type: 'string' }),
    defineField({ name: 'kicker', title: 'Kicker', type: 'string' }),
    defineField({ name: 'service', title: 'Service', type: 'string' }),
    defineField({ name: 'duration', title: 'Duration', type: 'string' }),
    defineField({
      name: 'facts',
      title: 'Facts',
      type: 'array',
      of: [
        defineArrayMember({
          type: 'object',
          fields: [
            defineField({ name: 'icon', title: 'Icon', type: 'string' }),
            defineField({ name: 'label', title: 'Label', type: 'string' }),
            defineField({ name: 'value', title: 'Value', type: 'string' }),
          ],
        }),
      ],
    }),
    defineField({ name: 'intro', title: 'Intro Paragraphs', type: 'array', of: [stringList] }),
    defineField({ name: 'why', title: 'Why Choose This Program', type: 'object', fields: sectionFields() }),
    defineField({
      name: 'curriculum',
      title: 'Curriculum',
      type: 'object',
      fields: [
        defineField({ name: 'heading', title: 'Heading', type: 'string' }),
        defineField({ name: 'text', title: 'Text', type: 'text', rows: 3 }),
        defineField({
          name: 'modules',
          title: 'Modules',
          type: 'array',
          of: [
            defineArrayMember({
              type: 'object',
              fields: [
                defineField({ name: 'title', title: 'Title', type: 'string' }),
                defineField({ name: 'items', title: 'Items', type: 'array', of: [stringList] }),
              ],
            }),
          ],
        }),
      ],
    }),
    defineField({ name: 'corporate', title: 'Corporate Training', type: 'object', fields: corporateFields() }),
    defineField({ name: 'cards', title: 'Cards JSON', type: 'text', rows: 12 }),
    defineField({ name: 'cta', title: 'CTA JSON', type: 'text', rows: 6 }),
    ...seoFields,
  ],
});

export const blogPost = defineType({
  name: 'blogPost',
  title: 'Blog Posts',
  type: 'document',
  fields: [
    defineField({ name: 'title', title: 'Title', type: 'string', validation: (Rule) => Rule.required() }),
    defineField({ name: 'slug', title: 'Slug', type: 'slug', options: { source: 'title' }, validation: (Rule) => Rule.required() }),
    defineField({ name: 'category', title: 'Category', type: 'string' }),
    imageUrlField(),
    defineField({ name: 'excerpt', title: 'Excerpt', type: 'text', rows: 4, validation: (Rule) => Rule.required() }),
    defineField({ name: 'isFeatured', title: 'Featured', type: 'boolean', initialValue: false }),
    defineField({ name: 'isPublished', title: 'Published', type: 'boolean', initialValue: true }),
    defineField({ name: 'publishedAt', title: 'Publish Date', type: 'date' }),
    defineField({ name: 'body', title: 'Body', type: 'text', rows: 16 }),
    ...seoFields,
  ],
});

function sectionFields() {
  return [
    defineField({ name: 'label', title: 'Label', type: 'string' }),
    defineField({ name: 'heading', title: 'Heading', type: 'string' }),
    defineField({ name: 'text', title: 'Text', type: 'text', rows: 3 }),
    defineField({ name: 'items', title: 'Items', type: 'array', of: [stringList] }),
  ];
}

function corporateFields() {
  return [
    defineField({ name: 'label', title: 'Label', type: 'string' }),
    defineField({ name: 'heading', title: 'Heading', type: 'string' }),
    defineField({ name: 'paragraphs', title: 'Paragraphs', type: 'array', of: [stringList] }),
    defineField({ name: 'methods', title: 'Methods', type: 'array', of: [stringList] }),
    defineField({ name: 'panelHeading', title: 'Panel Heading', type: 'string' }),
    defineField({ name: 'items', title: 'Items', type: 'array', of: [stringList] }),
  ];
}

export const schemaTypes = [
  settings,
  service,
  project,
  testimonial,
  teamMember,
  academyProgram,
  blogPost,
];
