<template>
   <div>
    teste   
   </div> 
</template>

<script setup lang="ts">

const runtimeConfig = useRuntimeConfig()

definePageMeta({
    layout: 'default',
   //  middleware: ['auth']
})
// const { data } = await useFetch('/api/quizzes', {
//     baseURL: runtimeConfig.public.apiBase,
//     headers: {
//         Authorization: `Bearer ${useCookie('token').value}`
//     }
// })

</script>

<style lang="scss" scoped></style>