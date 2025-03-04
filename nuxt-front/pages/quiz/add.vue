<template>
  <!-- Main Content -->
  <div class="max-w-7xl mx-auto">
    <div class="bg-white shadow-sm rounded-lg p-6">
      <h2 class="text-xl font-semibold mb-4">id:{{ id }} - {{ title }} </h2>
      <p class="text-gray-600">{{ description }}.  </p>
      <p><i> Post publicado há {{ diferencialEmDias }} dias </i></p>


      <div class="mt-6 grid grid-cols-1 gap-5 ">
        <!-- Card 1 -->
        <div class="bg-indigo-50 overflow-hidden shadow rounded-lg">
          <div class="p-5">
            <QuizForm action="view" desription="visualização de registro" /> 
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script lang="ts" setup>

const {diasPassados, diferencialEmDias} = useDataEmSegundos()

const data = new Date("2025-01-01");

diasPassados(data);

import { QuizForm } from '#components'; 

// Pegar o ID da rota
const id: Ref<Number> = ref(Number(useRoute().params.id));

const title: Ref<String> = ref("Qual o seu temperamento?");

  // definePageMeta({
  //   middleware: "only-numbers",
  // });

// Provisória descrição
const description: Ref<String> = ref("Faça esse incível teste (quiz) e descubra se o seu temperamento é Colérico, Melancólico, Fleumático ou Sangüíneo.");
</script>

<style></style>