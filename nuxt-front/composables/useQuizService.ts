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
  error?: {
    statusCode: number;
    message: string;
    details?: any;
  };
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
  
  // função para obter os headers
  const getHeaders = async () => {
    return {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${useAuth().token}`
    };
  };

  // função para obter o token
  const useAuth = () => {
    const token = useCookie("token") || "token provisório";
    return {
      token: token.value,
    };
  };

  // criar os estados de loading e de erro
  const isSubmitting = ref(false);
  const error = ref<string | null>(null);

  const deleteQuiz = async (quizId: number): Promise<ApiResponse<Object>> => {

    // criar a variavel de configuração
    const config = useRuntimeConfig();

    // definição de url da api
    const apiUrl = `${config.public.apiBaseUrl}/quiz/${quizId}`;

    // iniciar o loading
    isSubmitting.value = true;

    // limpar o erro
    error.value = null;

    return $fetch(apiUrl, {
      method: 'DELETE',
      headers: await getHeaders(),
    })

    // headers: await this.getHeaders(),
  }
  // metodo de create
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
      const { id, ...formDataWidoutId } = form;

      // realizar a requisição
      const response = await ofetch<ApiResponse<Quiz>>(apiUrl, {
        method: "POST",
        headers: await getHeaders(),
        body: formDataWidoutId,
        retry: 1,
        timeout: 10000,
      });

      // Atualiza o formulário com os dados da resposta
      if (response.data) {
        Object.assign(form, response.data);
      }

      return response;
      
    } catch (err: any) {
      const errorMessage = err.message || "Erro desconhecido ao criar quiz";
      let statusCode = err.status || 500;
      error.value = errorMessage;

      if (err.status === 400) statusCode = `Dados inválidos - ${err.status}`;
      if (err.status === 404) statusCode = `Endpoint não encontrado - ${err.status}`;
      if (err.status === 401) statusCode = `Autenticação necessária - ${err.status} `;
      if (err.status === 500) statusCode = `Erro interno no servidor - ${err.status}`;

      // Log estruturado de erro
      console.error({
        action: "createQuiz",
        error: errorMessage,
        status: statusCode,
        data: { ...form },
      });

      throw new Error(`Falha ao criar quiz: ${errorMessage}`);
    } finally {
      // desligar o loading
      isSubmitting.value = false;
    }
  };

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
    deleteQuiz,
    resetForm,
  };
};