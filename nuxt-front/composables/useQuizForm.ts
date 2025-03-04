import { reactive } from "vue";
import type { Quiz } from "@/interfaces/quiz";
import { useRuntimeConfig } from "nuxt/app";
import { ofetch } from "ofetch";

/**
 * Tipagem para dados do formulário
 * Omit é usado para omitir a propriedade id do tipo Quiz
 */
export type QuizFormData = Omit<Quiz, "id"> & {
  [key: string]: any;
};

/**
 * Interface para resposta da API
 */
interface ApiResponse<T> {
  data?: T;
  status: number;
  message: string;
  success: boolean;
}

/**
 * Composable para gerenciar o formulário de criação de quizzes
 */
export const useQuizForm = () => {
  // iniciar o objecto reativo do formulário com valores vazios
  const form = reactive<Quiz>({
    id: 0,
    title: "",
    description: "",
    type: "",
    body: "",
    numberOptions: 5,
    status: "",
  });

  // criar os estados de loading e de erro
  const isSubmitting = ref(false);
  const error = ref<string | null>(null);

  // criar o metodo de create


  const createQuiz = async (): Promise<ApiResponse<Quiz>> => {
    // criar a variavel de configuração
    const config = useRuntimeConfig();
  
    // definição de url da api
    const apiUrl = `${config.public.apiBaseUrl}/quiz`;

    // iniciar o loading
    isSubmitting.value = true;
  
    // limpar o erro
    error.value = null;

    try {
      // validar o formulário
      // TODO: criar metodo para validar o formulários
      if (!form.title) {
        throw new Error("O campo título é obrigatório");
      }

      // criar o objeto de envio sem o ID
      // usando a desestruturação de objeto e o operador rest (...)
      const {id, ...formDataWidoutId} = form;

      // realizar a requisição
      const response = await ofetch<ApiResponse<Quiz>>(apiUrl, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: formDataWidoutId,
        retry: 1,
        timeout: 10000,
      });

      // Atualiza o formulário com os dados da resposta
      if (response.data){
        Object.assign(form, response.data);
      }

      return response;

    } catch (err: any) {
      const errorMessage = err.message || 'Erro desconhecido ao criar quiz';
      error.value = errorMessage;
      
      // Log estruturado de erro
      console.error({
        action: 'createQuiz',
        error: errorMessage,
        status: err.status || 500,
        data: { ...form }
      }); 

      throw new Error(`Falha ao criar quiz: ${errorMessage}`);


    } finally {
      // desligar o loading
      isSubmitting.value = false;
    }
  }

  /**
   * Reseta o formulário para os valores iniciais
   */
  const resetForm = () => {
    Object.assign(form, {
      id: 0,
      title: "",
      description: "",
      type: "",
      body: "",
      numberOptions: 5,
      status: "",
    });
    error.value = null;
  };

  return {
    form,
    isSubmitting,
    error,
    createQuiz,
    resetForm
  };
};
