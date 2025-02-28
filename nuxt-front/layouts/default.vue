<template>
<div>
    <div class="w-full h-full ">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <div class="bg-gray-800 text-white w-64 flex flex-col">
                <div class="p-4 text-2xl font-bold border-b border-gray-700">
                    QuizMaster
                </div>
                <nav class="flex-grow">
                    <ul class="mt-6">
                        <li class="px-4 py-3 hover:bg-gray-700 rounded-lg mx-2 mb-1 flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <a href="/" class="block">Home</a>
                        </li>
                        <li class="px-4 py-3 hover:bg-gray-700 rounded-lg mx-2 mb-1 flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <a href="/quiz" class="block">Cadastro de Quiz</a>
                        </li>
                        <li class="px-4 py-3 hover:bg-gray-700 rounded-lg mx-2 mb-1 flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <a href="/pregunta" class="block">Cadastro de Perguntas</a>
                        </li>
                        <li class="px-4 py-3 hover:bg-gray-700 rounded-lg mx-2 mb-1 flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                            <a href="/resposta" class="block">Cadastro de Resposta</a>
                        </li>
                    </ul>
                </nav>
                <div class="p-4 border-t border-gray-700">
                    <a href="/logout""
                        class="block py-2 px-4 text-red-400 hover:bg-red-500 hover:text-white rounded-lg flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Logout
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Top Navigation -->
                <header class="bg-white shadow-sm z-10">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
                        <div class="flex items-center">
                            <button
                                class="p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Notificações</span>
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </button>
                            <div class="ml-3 relative">
                                <div class="flex items-center">
                                    <div
                                        class="h-8 w-8 rounded-full bg-gray-500 flex items-center justify-center text-white font-bold">
                                        U
                                    </div>
                                    <span class="ml-2 text-gray-700">Usuário</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main Content -->

                <main class="flex-1 overflow-auto bg-gray-100 p-6">
                    <slot />                    
                </main>
            </div>
        </div>
    </div>
</div>
</template>

<script setup></script>

<style lang="scss" scoped></style>
