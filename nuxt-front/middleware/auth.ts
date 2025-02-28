// Dedinição de middleware global para todas as rotas...

const logado : boolean= true;


// criar middle para verificar se o usuario esta logado
export default defineNuxtRouteMiddleware((to, from) => {

  // if (!logado && to.path !== "/login") {
  //   return navigateTo("/login");
  // }
  // const { $store } = useNuxtApp()
  // if (!($store as any).state.auth.loggedIn) {
  //   return navigateTo('/login')
  // }
})