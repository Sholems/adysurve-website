import { defineConfig } from 'sanity';
import { structureTool } from 'sanity/structure';
import { schemaTypes } from './src/sanity/schemaTypes';

const projectId = import.meta.env.PUBLIC_SANITY_PROJECT_ID || '00000000';
const dataset = import.meta.env.PUBLIC_SANITY_DATASET || 'production';

export default defineConfig({
  name: 'adysurve',
  title: 'ADYSURVE CMS',
  projectId,
  dataset,
  plugins: [structureTool()],
  schema: {
    types: schemaTypes,
  },
});
