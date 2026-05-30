import { defineConfig } from 'astro/config';
import cloudflare from '@astrojs/cloudflare';
import sitemap from '@astrojs/sitemap';
import mdx from '@astrojs/mdx';

// https://astro.build/config
export default defineConfig({
  site: 'https://adysurve.com',
  output: 'static',
  adapter: cloudflare(),
  integrations: [sitemap(), mdx()],
  vite: {
    css: {
      postcss: './postcss.config.js',
    },
  },
});
