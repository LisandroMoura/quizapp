export default defineNuxtRouteMiddleware((to, from) => {
  // obter o id da rota
  const id: Ref<number> = ref(Number(useRoute().params.id));

  if (isNaN(id.value) || id.value < 0) {
    return navigateTo("/invalid");
  }
});
