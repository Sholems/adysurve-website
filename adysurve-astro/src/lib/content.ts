import { getCollection, getEntry } from 'astro:content';
import { createClient } from '@sanity/client';

const projectId = process.env.PUBLIC_SANITY_PROJECT_ID;
const dataset = process.env.PUBLIC_SANITY_DATASET || 'production';
const useSanity = Boolean(projectId);

const sanityClient = projectId
  ? createClient({
      projectId,
      dataset,
      apiVersion: '2026-06-01',
      useCdn: false,
    })
  : null;

type AnyEntry = {
  id: string;
  data: Record<string, any>;
  body?: string;
  bodyHtml?: string;
};

const entry = (doc: Record<string, any>): AnyEntry => {
  const { slug, body, bodyHtml, _id, _type, ...data } = doc;
  return {
    id: slug?.current || String(_id || '').split('.').pop() || '',
    data,
    body,
    bodyHtml,
  };
};

const fetchEntries = async (query: string) => {
  if (!sanityClient) return null;
  const docs = await sanityClient.fetch(query);
  return docs.map(entry);
};

export async function getServices() {
  const docs = useSanity
    ? await fetchEntries(`*[_type == "service"] | order(sortOrder asc, title asc){
        _id, title, "slug": slug, icon, featuredImage, shortDescription, fullDescription,
        isActive, sortOrder, metaTitle, metaDescription
      }`)
    : null;

  return docs ?? (await getCollection('services'));
}

export async function getProjects() {
  const docs = useSanity
    ? await fetchEntries(`*[_type == "project"] | order(title asc){
        _id, title, "slug": slug, serviceSlug, clientName, location, featuredImage,
        galleryImages, description, isFeatured, isActive, metaTitle, metaDescription
      }`)
    : null;

  return docs ?? (await getCollection('projects'));
}

export async function getTestimonials() {
  const docs = useSanity
    ? await fetchEntries(`*[_type == "testimonial"] | order(clientName asc){
        _id, clientName, clientTitle, clientCompany, clientAvatar, content, rating, isActive
      }`)
    : null;

  return docs ?? (await getCollection('testimonials'));
}

export async function getTeamMembers() {
  const docs = useSanity
    ? await fetchEntries(`*[_type == "teamMember"] | order(sortOrder asc, name asc){
        _id, name, role, photo, bio, socialLinks, isActive, sortOrder
      }`)
    : null;

  return docs ?? (await getCollection('team'));
}

export async function getAcademyPrograms() {
  const docs = useSanity
    ? await fetchEntries(`*[_type == "academyProgram"] | order(title asc){
        _id, title, "slug": slug, subtitle, kicker, service, duration, facts, intro, why,
        curriculum, corporate, cards, cta, metaTitle, metaDescription
      }`)
    : null;

  if (docs) {
    return docs.map((program) => ({
      ...program,
      data: {
        ...program.data,
        cards: parseJsonField(program.data.cards, {}),
        cta: parseJsonField(program.data.cta, {}),
        curriculum: {
          ...program.data.curriculum,
          modules: (program.data.curriculum?.modules ?? []).map((module: any) => [
            module.title,
            module.items ?? [],
          ]),
        },
      },
    }));
  }

  return getCollection('academy');
}

export async function getBlogPosts() {
  const docs = useSanity
    ? await fetchEntries(`*[_type == "blogPost"] | order(publishedAt desc){
        _id, title, "slug": slug, category, featuredImage, excerpt, isFeatured,
        isPublished, publishedAt, body, metaTitle, metaDescription
      }`)
    : null;

  if (docs) {
    return docs.map((post) => ({
      ...post,
      data: {
        ...post.data,
        publishedAt: post.data.publishedAt ? new Date(post.data.publishedAt) : undefined,
      },
      bodyHtml: markdownToHtml(post.body ?? ''),
    }));
  }

  return getCollection('blog');
}

export async function getSiteSettings() {
  if (sanityClient) {
    const doc = await sanityClient.fetch(`*[_type == "siteSettings"][0]`);
    if (doc) return { id: 'site', data: doc };
  }

  return getEntry('settings', 'site');
}

function parseJsonField(value: unknown, fallback: unknown) {
  if (!value || typeof value !== 'string') return value ?? fallback;
  try {
    return JSON.parse(value);
  } catch {
    return fallback;
  }
}

function markdownToHtml(markdown: string) {
  const escape = (value: string) =>
    value.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

  return markdown
    .split(/\n{2,}/)
    .map((block) => {
      const trimmed = block.trim();
      if (!trimmed) return '';
      if (trimmed.startsWith('### ')) return `<h3>${escape(trimmed.slice(4))}</h3>`;
      if (trimmed.startsWith('## ')) return `<h2>${escape(trimmed.slice(3))}</h2>`;
      if (trimmed.startsWith('# ')) return `<h1>${escape(trimmed.slice(2))}</h1>`;
      return `<p>${escape(trimmed).replace(/\n/g, '<br>')}</p>`;
    })
    .join('\n');
}
