<template>
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <!-- Title and Description -->
                <div class="flex-1">
                    <h2 class="text-xl font-semibold mb-2">Cadastro de Quiz</h2>
                    <p class="text-gray-600">Relação de quiz cadastrados no sistema.</p>
                </div>

                <!-- Controls Container -->
                <div class="flex flex-col sm:flex-row items-center gap-4">

                    <div class="flex items-center space-x-4">
                        <!-- Contador de Registros -->
                        <div class="flex items-center bg-gray-100 px-3 py-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            <span class="text-gray-700 font-medium">Total: {{ quizzes.length }}</span>
                        </div>

                        <!-- Campo de Busca -->
                        <div class="flex">
                            <input type="text" v-model="searchTerm" placeholder="Buscar quiz..."
                                class="border border-gray-300 rounded-l-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <button @click="searchQuizzes"
                                class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Botão de Configurações -->
                        <button @click="openConfigModal"
                            class="text-gray-600 hover:bg-gray-100 p-2 rounded-full transition-colors"
                            title="Configurações">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>

                        <!-- Botão de Novo Quiz -->
                        <NuxtLink to="/quiz/add"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition-colors duration-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Novo Quiz
                        </NuxtLink>
                    </div>

                </div>
            </div>

        </div>

        <div class="container mx-auto pt-6">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b w-16">ID</th>
                        <th class="py-2 px-4 border-b w-48">Title</th>
                        <th class="py-2 px-4 border-b w-96 truncate">Description</th>
                        <th class="py-2 px-4 border-b w-24">Status</th>
                        <th class="py-2 px-4 border-b w-40 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="quiz in quizzes" :key="quiz.id" class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b text-center">{{ quiz.id }}</td>
                        <td class="py-2 px-4 border-b truncate">{{ quiz.title }}</td>
                        <td class="py-2 px-4 border-b truncate max-w-[24rem]">{{ quiz.description }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ quiz.status }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <div class="flex justify-center space-x-2">
                                <!-- Editar -->
                                <button @click="onEdit(quiz.id)"
                                    class="p-2 text-blue-500 hover:text-blue-700 hover:bg-blue-100 rounded transition focus:ring-2 focus:ring-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>

                                <!-- Visualizar -->
                                <button @click="onPreview(quiz.id)"
                                    class="p-2 text-green-500 hover:text-green-700 hover:bg-green-100 rounded transition focus:ring-2 focus:ring-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <!-- Excluir -->
                                <button @click="confirmDelete(quiz.id)"
                                    class="p-2 text-red-500 hover:text-red-700 hover:bg-red-100 rounded transition focus:ring-2 focus:ring-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script setup lang="ts">
// Importações necessárias
import { ref, onMounted } from 'vue';
import type { Ref } from 'vue';
import type { Quiz } from '~/interfaces/quiz';

// Use apenas uma instância de useRuntimeConfig
const runtimeConfig = useRuntimeConfig();

// Objeto reativo para armazenar os dados do formulário
const quizzes: Ref<Quiz[]> = ref([]);

// Campo de busca
const searchTerm: Ref<string> = ref('');

// Função para buscar os quizzes
import { $fetch } from 'ofetch'

import { useQuizForm } from '~/composables/useQuizService';

const { form, isSubmitting, error, deleteQuiz } = useQuizForm();

const fetchQuizzes = async () => {

    try {

        const apiUrl = `${runtimeConfig.public.apiBaseUrl}/quiz`;
        const response = await $fetch(apiUrl, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                // Adicione headers de autenticação se necessário
            },
        });

        // Tratativa para se a API retornar o array diretamente
        if (response && Array.isArray(response)) {
            quizzes.value = response;
        } else if (response.data && Array.isArray(response.data)) {
            // Ou se a API retorna um objeto com uma propriedade 'data' contendo o array
            quizzes.value = response.data;
        }
    } catch (error) {
        console.error("Exception:", error);
    } finally {
        // console.log('Requisição finalizada');
    }
};

// Flag para controlar a visibilidade do modal de configuração
const showCreateModal: Ref<boolean> = ref(false);

// Chamada da função fetchQuizzes quando o componente é montado
onMounted(fetchQuizzes);


// Métodos para lidar com as ações
const onEdit = (id: number) => {
    useRouter().push(`/quiz/edit/${id}`)
};

const onPreview = (id: number) => {
    useRouter().push(`/quiz/${id}`)
};

// Função para confirmar a exclusão
const confirmDelete = async (id: number) => {
    // Use a more user-friendly confirmation dialog
    const isConfirmed = await useConfirmDialog({
        title: 'Confirmar Exclusão',
        message: 'Você tem certeza que deseja excluir este quiz? Esta ação não pode ser desfeita.',
        confirmText: 'Sim, excluir',
        cancelText: 'Cancelar'
    });

    if (!isConfirmed) return;

    try {
        // fazer a requisição
        const response = await deleteQuiz(id);

        // notificar o retorno
        if (response.success) {
            alert(response.message);
            // Atualização otimista ao invés de refetch completo
            quizzes.value = quizzes.value.filter(q => q.id !== id)
            // await fetchQuizzes()
        }
        else {
            throw new Error('Erro ao excluir o quiz')
        }


    } catch (error) {

    } finally {

    }
};

const useConfirmDialog = async (options: any) => {
    // Implement a promise-based confirmation dialog
    return confirm(options.message);
};


// Função para abrir o modal de configuração
const openConfigModal = () => {
    showCreateModal.value = true;
};

// Função para fechar o modal de configuração
const closeConfigModal = () => {
    showCreateModal.value = false;
};

// Função para buscar quizzes com base na busca
const searchQuizzes = () => {
    // fetchQuizzes();
};

</script>

<style lang="scss" scoped></style>