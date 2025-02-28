<template>
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Cadastro de Quiz</h2>
            <p class="text-gray-600">Relação de quiz cadastrados no sistema.</p>
        </div>
    </div>
</template>

<script setup lang="ts">

const runtimeConfig = useRuntimeConfig()
// const { data } = await useFetch('/api/quizzes', {
//     baseURL: runtimeConfig.public.apiBase,
//     headers: {
//         Authorization: `Bearer ${useCookie('token').value}`
//     }
// })
</script>

<style lang="scss" scoped></style>