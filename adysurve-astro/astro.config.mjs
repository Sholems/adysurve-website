import { defineConfig } from 'astro/config';
import cloudflare from '@astrojs/cloudflare';
import sitemap from '@astrojs/sitemap';
import mdx from '@astrojs/mdx';
import react from '@astrojs/react';
import sanity from '@sanity/astro';

const sanityProjectId = process.env.PUBLIC_SANITY_PROJECT_ID;
const sanityDataset = process.env.PUBLIC_SANITY_DATASET || 'production';
const sanityIntegrations = sanityProjectId
  ? [
      sanity({
        projectId: sanityProjectId,
        dataset: sanityDataset,
        useCdn: false,
        studioBasePath: '/admin',
      }),
      react(),
    ]
  : [];

// https://astro.build/config
export default defineConfig({
  site: 'https://adysurve.com',
  output: 'static',
  adapter: cloudflare(),
  integrations: [sitemap(), mdx(), ...sanityIntegrations],
  vite: {
    css: {
      postcss: './postcss.config.js',
    },
  },
});
