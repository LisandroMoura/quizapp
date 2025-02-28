<template>
  <div>
    <!-- componente custom para exibir barra de carregamento -->
    <LoadingBar />

    <form @submit.prevent="submitForm" class="space-y-6">
      <!-- TODO: Criar componentes customizados para cada tipo de campo do formulário -->
      campos do formulário

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

// Objeto reativo para armazenar os dados do formulário
import type { Quiz } from '~/interfaces/quiz';
const form: Quiz = reactive(
    {
      id: 0,
      title: "",
      description: "",
      type: "",
      body: "",
      numberOptions: 5,
      status: ''
    }
  );

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


/*/////////////////////////// METODOS ///////////////////////////////////*/

/**
 * Metodo responsável por submeter o formulário
 */
const submitForm = () => {
  // Enviar formulário
  // validadeForm()
  if (validateForm()) {
    props.action === "create" ? create(form) : update(form);
  }
  console.log("Formulário enviado");
}

/**
 * Metodo responsável por validar o formulário
1 */
const validateForm = () => {
  // Validar formulário
  console.log("Formulário validado");
  return true;
}

/**
 * Metodo responsável por criar um novo registro
 */
const create = (form: any) => {
  // Criar novo registro
  console.log("Criar novo registro");
}

/**
 * Metodo responsável por alterar um registro
 */
const update = (form: any) => {
  // Alterar registro
  console.log("Alterar registro");
}
/**
 * Metodo responsável por excluir um registro
 */
const destroy = (id: any) => {
  // Excluir registro
  console.log("Excluir registro");
}

</script>

<style></style>