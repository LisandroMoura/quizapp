// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  modules: ['@nuxtjs/tailwindcss', '@pinia/nuxt'],
  compatibilityDate: '2024-11-01',

  app: {
    head: {
      title: 'Quiz App - Gestão de sistema de quiz',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { hid: 'description', name: 'description', content: 'Uma app Nuxt incrível para gestão de quiz' },
      ],
      link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
    },
  },

  runtimeConfig: {
    public: {
      apiBaseUrl: process.env.NUXT_API_BASE_URL || 'http://localhost:8000/api',
      apiUser: process.env.NUXT_API_USER || 'lisandro@pandora.dev',
      apiPassword: process.env.NUXT_API_PASSWORD || 'password'
    }
  },

  devtools: { enabled: true },
})
