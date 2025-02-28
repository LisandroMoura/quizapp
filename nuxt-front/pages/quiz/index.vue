<template>
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Cadastro de Quiz</h2>
            <p class="text-gray-600">Relação de quiz cadastrados no sistema.</p>
        </div>
        <div class="container mx-auto pt-6">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="quiz in quizs" :key="quiz.id" class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ quiz.id }}</td>
                        <td class="py-2 px-4 border-b">{{ quiz.title }}</td>
                        <td class="py-2 px-4 border-b">{{ quiz.description }}</td>
                        <td class="py-2 px-4 border-b">{{ quiz.status }}</td>
                        <td class="py-2 px-4 border-b">
                            <!-- Botão de Editar -->
                            <button @click="onEdit"
                                class="p-2 text-blue-500 hover:text-blue-700 hover:bg-blue-100 rounded-full transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                title="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>

                            <!-- Botão de Visualizar -->
                            <button @click="onPreview(quiz.id)"
                                class="p-2 text-green-500 hover:text-green-700 hover:bg-green-100 rounded-full transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                                title="Visualizar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Botão de Excluir -->
                            <button @click="confirmDelete"
                                class="p-2 text-red-500 hover:text-red-700 hover:bg-red-100 rounded-full transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                title="Excluir">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup lang="ts">

const runtimeConfig = useRuntimeConfig()

// Objeto reativo para armazenar os dados do formulário
import type { Quiz } from '~/interfaces/quiz';
const quizs: Quiz[] = reactive(
    [
        {
            id: 1,
            title: "Qual o seu temperamento",
            description: "Fleumatico, colerico melancolico, sanguineo, flematico",
            type: "2",
            body: "Que tal nosso teste de personalidade?",
            numberOptions: 5,
            status: '1'
        },
        {
            id: 2,
            title: "Descubra, qual animal é você",
            description: "Que tipo de animal você é?",
            type: "1",
            body: "Que tal saber que tipo de animal você é seu animal??",
            numberOptions: 5,
            status: '1'
        },
        {
            id: 3,
            title: "Teste, qual país você é",
            description: "Que tipo de país você é?",
            type: "1",
            body: "Que tal saber que tipo de país você é seu animal??",
            numberOptions: 5,
            status: '1'
        },
    ]);


// const { data } = await useFetch('/api/quizzes', {
//     baseURL: runtimeConfig.public.apiBase,
//     headers: {
//         Authorization: `Bearer ${useCookie('token').value}`
//     }
// })


// Emits para comunicar ações ao componente pai
const emit = defineEmits(['edit', 'delete', 'preview']);

// Métodos para lidar com as ações
const onEdit = () => {
//   emit('edit', props.item);
};

const onPreview = (id:number) => {
    useRouter().push(`/quiz/${id}`)
//   emit('preview', props.item);
};

const confirmDelete = () => {
  if (confirm(`Tem certeza que deseja excluir este item?`)) {
    // emit('delete', props.item.id);
  }
};

</script>

<style lang="scss" scoped></style>