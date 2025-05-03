<script setup>
import { ref } from 'vue';
import apiClient from '../api/client';

const email = ref('');
const password = ref('');
const errorMessage = ref('')

const handleLogin = async () => {
  try {
    const response = await apiClient.post('/login', {
      email: email.value,
      password: password.value,
    });
    errorMessage.value = ''
  } catch (error) {
    errorMessage.value = error.response?.data.message
    console.error('Erro ao fazer login:', error.response?.data || error.message);
  }

  console.log(errorMessage.value)
};
</script>

<template>
  <div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full bg-white rounded-lg shadow-md p-8" style="background: #F6F6FA; width: 770px; height: 522px">
      <div class="flex justify-center mb-6" >
        <img src="@img/logo.svg" alt="Logo Always Fit" style="width: 201px;">
      </div>

      <h1 class="font-bold text-center" style="font-size: 36px">Login</h1>

      <div class="mb-8">
        <p class="font-bold text-gray-800">Olá!</p>
        <p class="mt-3">Este é o ambiente seguro de login da Always Fit ®</p>
    </div>
    
    <div class="space-y-4">
          <p class="mt-3"><strong> Para acessar, informe suas credenciais.</strong> </p>
          <p class="mt-3" style='color: red' v-if="errorMessage!=''"><strong> {{errorMessage}}</strong> </p>
        <div>
          <input 
            v-model="email"
            type="text" 
            id="username" 
            placeholder="E-mail"
            class="w-full px-4 py-2 border  rounded-md focus:outline-none focus:ring-2"
          >
        </div>

        <div>
          <input 
            v-model="password"
            type="password" 
            id="password" 
            placeholder="Senha"
            class="w-full px-4 py-2 border  rounded-md focus:outline-none"
          >
        </div>

        <button 
          @click="handleLogin()"
          class="w-full text-white font-bold py-2 px-4 rounded-md transition duration-200" style="background: #153B4E"
        >
          Logar
        </button>
      </div>
    </div>
  </div>
</template>
