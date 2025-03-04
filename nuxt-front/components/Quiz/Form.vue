<template>
  <div>
    <!-- componente custom para exibir barra de carregamento -->
    <LoadingBar />

    <!-- TODO: Criar  customizados para cada tipo de campo do formulário -->
    <form @submit.prevent="submitForm" class="space-y-6">
      <!-- Título -->
      <div class="space-y-2">
        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
        <input 
          id="title" 
          v-model="form.title" 
          type="text" 
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2"
          placeholder="Digite o título do quiz" 
          required
        />
      </div>
    
      <!-- Descrição -->
      <div class="space-y-2">
        <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
        <textarea 
          id="description" 
          v-model="form.description" 
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2"
          placeholder="Digite uma descrição para o quiz" 
          rows="3"
        ></textarea>
      </div>
    
      <!-- Tipo -->
      <div class="space-y-2">
        <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
        <select 
          id="type" 
          v-model="form.type" 
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pr-10 p-2"
          required
        >
          <option value="" disabled>Selecione o tipo</option>
          <option value="1" selected>Normal</option>
          <option value="2">Avaliar</option>
          <option value="3">Custom</option>
        </select>
      </div>
    
      <!-- Conteúdo -->
      <div class="space-y-2">
        <label for="body" class="block text-sm font-medium text-gray-700">Conteúdo</label>
        <textarea 
          id="body" 
          v-model="form.body" 
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2"
          placeholder="Conteúdo adicional do quiz" 
          rows="5"
        ></textarea>
      </div>
    
      <!-- Número de Opções -->
      <div class="space-y-2">
        <label for="numberOptions" class="block text-sm font-medium text-gray-700">Número de Opções</label>
        <input 
          id="numberOptions" 
          v-model.number="form.numberOptions" 
          type="number" 
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
          min="2" 
          max="10" 
        />
        <p class="mt-1 text-sm text-gray-500">Quantidade de opções para perguntas de múltipla escolha</p>
      </div>
    
      <!-- Status -->
      <div class="space-y-2">
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select 
          id="status" 
          v-model="form.status" 
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm pr-10"
        >
          <option :value="1" selected>Ativo</option>
          <option :value="2">Rascunho</option>
          <option :value="9">Desativado</option>
        </select>
      </div>
    
      <!-- Ações -->
      <div class="flex justify-end gap-3 pt-6">
        <button 
          type="button" 
          @click="resetForm" 
          class="inline-flex items-center rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
          :disabled="isSubmitting"
        >
          Cancelar
        </button>
        <button 
          type="submit" 
          class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
          :disabled="isSubmitting"
        >
          {{ isSubmitting ? 'Salvando...' : 'Salvar Quiz' }}
        </button>
      </div>
    
      <!-- Mensagem de Erro -->
      <div 
        v-if="error" 
        class="rounded-md bg-red-50 border-l-4 border-red-400 p-4"
      >
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-3">
            <p class="text-sm text-red-700">{{ error }}</p>
          </div>
        </div>
      </div>
    </form>
   
  </div>  
</template>

<script lang="ts" setup>
/*/////////////////////////// DEFINIÇÕES ///////////////////////////////////*/

// Pegar o ID da rota
const id: Ref<Number> = ref(Number(useRoute().params.id));

// definição das Props
const props = defineProps({
  action: { type: String, required: true },
  desription: { type: String, required: true },
});


// opções default para select de type
const optionsType = [
  { label: "Normal", value: "1" },
  { label: "Avaliar", value: "2" },
  { label: "Custom", value: "3" },
];

// opções default para select de type
const optionsStatus = [
  { label: "Ativo", value: "1" },
  { label: "Inativo", value: "9" },
];

import { useQuizForm } from '~/composables/useQuizService';

const { form, isSubmitting, error, createQuiz, resetForm } = useQuizForm();

const submitForm = async () => {
  try {
    const response = await createQuiz();

    if (response.success) {
      navigateTo('/quiz');
    }
    resetForm();
  } catch (error) {
    // console.error(error);
  }
};
</script>

<style></style>
