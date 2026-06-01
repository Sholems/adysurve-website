import { createClient } from '@sanity/client';
import fs from 'node:fs/promises';
import path from 'node:path';
import { parse as parseYaml } from 'yaml';

const projectId = process.env.PUBLIC_SANITY_PROJECT_ID;
const dataset = process.env.PUBLIC_SANITY_DATASET || 'production';
const token = process.env.SANITY_API_TOKEN;
const root = process.cwd();
const contentRoot = path.join(root, 'src', 'content');

if (!projectId || !token) {
  console.error('Set PUBLIC_SANITY_PROJECT_ID and SANITY_API_TOKEN before running this importer.');
  process.exit(1);
}

const client = createClient({
  projectId,
  dataset,
  token,
  apiVersion: '2026-06-01',
  useCdn: false,
});

const typeMap = {
  services: 'service',
  projects: 'project',
  testimonials: 'testimonial',
  team: 'teamMember',
  academy: 'academyProgram',
};

const slugify = (value) =>
  String(value || '')
    .trim()
    .toLowerCase()
    .replace(/&/g, 'and')
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/^-+|-+$/g, '');

async function readYamlFiles(collection) {
  const dir = path.join(contentRoot, collection);
  const files = await fs.readdir(dir);
  return Promise.all(
    files
      .filter((file) => file.endsWith('.yaml') || file.endsWith('.yml'))
      .map(async (file) => {
        const id = path.basename(file, path.extname(file));
        const raw = await fs.readFile(path.join(dir, file), 'utf8');
        return { id, data: parseYaml(raw) };
      }),
  );
}

function normalizeDocument(collection, entry) {
  const doc = {
    _id: `${typeMap[collection]}.${entry.id}`,
    _type: typeMap[collection],
    ...entry.data,
  };

  if (['services', 'projects', 'academy'].includes(collection)) {
    doc.slug = { _type: 'slug', current: entry.id };
  }

  if (collection === 'academy') {
    doc.cards = JSON.stringify(entry.data.cards ?? {}, null, 2);
    doc.cta = JSON.stringify(entry.data.cta ?? {}, null, 2);
    if (entry.data.curriculum?.modules) {
      doc.curriculum = {
        ...entry.data.curriculum,
        modules: entry.data.curriculum.modules.map(([title, items]) => ({ title, items })),
      };
    }
  }

  return doc;
}

function parseFrontmatter(raw) {
  const match = raw.match(/^---\r?\n([\s\S]*?)\r?\n---\r?\n?([\s\S]*)$/);
  if (!match) {
    return { data: {}, body: raw };
  }
  return { data: parseYaml(match[1]), body: match[2].trim() };
}

async function readBlogPosts() {
  const dir = path.join(contentRoot, 'blog');
  const files = await fs.readdir(dir);
  return Promise.all(
    files
      .filter((file) => file.endsWith('.md') || file.endsWith('.mdx'))
      .map(async (file) => {
        const id = path.basename(file, path.extname(file));
        const raw = await fs.readFile(path.join(dir, file), 'utf8');
        const { data, body } = parseFrontmatter(raw);
        return {
          _id: `blogPost.${id}`,
          _type: 'blogPost',
          ...data,
          slug: { _type: 'slug', current: id || slugify(data.title) },
          body,
        };
      }),
  );
}

async function main() {
  const settingsEntries = await readYamlFiles('settings');
  const docs = [
    {
      _id: 'siteSettings.site',
      _type: 'siteSettings',
      ...(settingsEntries.find((entry) => entry.id === 'site')?.data ?? settingsEntries[0]?.data ?? {}),
    },
  ];

  for (const collection of Object.keys(typeMap)) {
    const entries = await readYamlFiles(collection);
    docs.push(...entries.map((entry) => normalizeDocument(collection, entry)));
  }

  docs.push(...(await readBlogPosts()));

  const transaction = client.transaction();
  for (const doc of docs) {
    transaction.createOrReplace(doc);
  }

  await transaction.commit();
  console.log(`Imported ${docs.length} documents into Sanity dataset "${dataset}".`);
}

main().catch((error) => {
  console.error(error);
  process.exit(1);
});
