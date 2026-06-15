import { defineConfig } from 'astro/config';
import cloudflare from '@astrojs/cloudflare';
import sitemap from '@astrojs/sitemap';
import mdx from '@astrojs/mdx';
import react from '@astrojs/react';
import sanity from '@sanity/astro';
import { loadEnv } from 'vite';

const env = loadEnv(process.env.NODE_ENV || 'production', process.cwd(), '');
const sanityProjectId = env.PUBLIC_SANITY_PROJECT_ID || process.env.PUBLIC_SANITY_PROJECT_ID;
const sanityDataset = env.PUBLIC_SANITY_DATASET || process.env.PUBLIC_SANITY_DATASET || 'production';
const sanityIntegrations = sanityProjectId
  ? [
      sanity({
        projectId: sanityProjectId,
        dataset: sanityDataset,
        useCdn: false,
        studioBasePath: '/admin',
        studioRouterHistory: 'hash',
      }),
      react(),
    ]
  : [];

// https://astro.build/config
export default defineConfig({
  site: 'https://www.adysurve.com',
  output: 'static',
  adapter: cloudflare(),
  integrations: [sitemap(), mdx(), ...sanityIntegrations],
  vite: {
    css: {
      postcss: './postcss.config.js',
    },
  },
});
