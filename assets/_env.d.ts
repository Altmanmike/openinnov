/// <reference types="vite/client" />
declare module 'datatables.net-plugins/i18n/fr-FR.mjs'
declare module '*.vue' {
  import type { DefineComponent } from 'vue'
  // eslint-disable-next-line @typescript-eslint/no-explicit-any, @typescript-eslint/ban-types
  const component: DefineComponent<{}, {}, any>
  export default component
}