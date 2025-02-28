<template>
  <div class="w-full h-full bg-gray-100 font-sans">
    <!--Página inicial da aplicação: Header-->
    <header class="w-full h-20 border-b border-gray-200 flex items-center gap-4 pl-8">
      <NuxtLink to="/">
        <img src="/logo.svg" alt="Logo" class="w-12 h-12" />
      </NuxtLink>
      <NuxtLink to="/">
        <p class="text-3xl font-bold text-[#21223a]">QuizApp</p>
      </NuxtLink>
    </header>
    <main class="w-full h-full ">
      <NuxtPage />
    </main>
  </div>
</template>
<script setup>
</script>