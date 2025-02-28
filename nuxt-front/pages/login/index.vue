<template>
    <div class="min-h-screen flex  justify-center bg-gray-100">
      <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <!-- Cabeçalho do formulário -->
        <div class="text-center mb-8">
          <h1 class="text-2xl font-bold text-gray-800">Bem-vindo de volta</h1>
          <p class="text-gray-600 mt-2">Entre com sua conta para continuar</p>
        </div>
  
        <!-- Formulário de login -->
        <form @submit.prevent="handleLogin">
          <!-- Campo de e-mail -->
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
            <input 
              type="email" 
              id="email" 
              v-model="email" 
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
              placeholder="seu@email.com" 
              required
            />
          </div>
  
          <!-- Campo de senha -->
          <div class="mb-6">
            <div class="flex justify-between items-center mb-2">
              <label for="password" class="text-sm font-medium text-gray-700">Senha</label>
              <NuxtLink to="/recuperar-senha" class="text-sm text-blue-600 hover:text-blue-800">
                Esqueceu sua senha?
              </NuxtLink>
            </div>
            <input 
              type="password" 
              id="password" 
              v-model="password" 
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
              placeholder="••••••••" 
              required
            />
          </div>
  
          <!-- Lembrar login -->
          <div class="flex items-center mb-6">
            <input 
              type="checkbox" 
              id="remember" 
              v-model="rememberMe" 
              class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
            />
            <label for="remember" class="ml-2 block text-sm text-gray-700">
              Lembrar minha conta
            </label>
          </div>
  
          <!-- Botão de login -->
          <button 
            type="submit" 
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200"
            :disabled="loading"
          >
            <span v-if="loading">Entrando...</span>
            <span v-else>Entrar</span>
          </button>
        </form>
  
        <!-- Link para registro -->
        <div class="text-center mt-6">
          <p class="text-gray-600">
            Não tem uma conta?
            <NuxtLink to="/registro" class="text-blue-600 hover:text-blue-800 font-medium">
              Criar conta
            </NuxtLink>
          </p>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  // Estados do formulário
  const email = ref('');
  const password = ref('');
  const rememberMe = ref(false);
  const loading = ref(false);
  
  // Função para lidar com o login
  const handleLogin = async () => {
    loading.value = true;
    
    try {
      // Aqui você implementaria a lógica de autenticação
      // Por exemplo, usando o módulo de autenticação do Nuxt
      // await $auth.loginWith('local', { data: { email: email.value, password: password.value } });
      
      console.log('Tentativa de login com:', {
        email: email.value,
        password: password.value,
        rememberMe: rememberMe.value
      });
      
      // Simular um delay de 1 segundo para demonstração
      await new Promise(resolve => setTimeout(resolve, 1000));
      
      // Navegação após o login bem-sucedido
      // await navigateTo('/dashboard');
    } catch (error) {
      console.error('Erro no login:', error);
      // Aqui você poderia mostrar uma mensagem de erro
    } finally {
      loading.value = false;
    }
  };
  </script>