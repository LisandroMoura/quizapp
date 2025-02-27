# 🚀 Pandora.app QuizApp - Gestão de Quiz para sites

Aplicação desenvolvida para gestão de sistema de quiz:

- **Backend**: Laravel (API REST)
- **Ou/e Backend**: SpringBoot (API REST)
- **Frontend**: Nuxt.js (Vue.js)

## 📋 Pré-requisitos

- PHP ≥ 8.1
- Composer
- Node.js ≥ 16.x
- npm ≥ 8.x

## 🛠 Instalação via docker

## Pré-requisitos
- ✅ Docker instalado
- ✅ Docker Compose instalado

## 🔗 instalando...

- [x] Clone o repositório e faça checkout para esta branch.
- [x] Execute docker-compose up --build.
- [x] Acesse http://localhost:3000 para validar o funcionamento.

```bash
git clone https://github.com/LisandroMoura/pandorarh.git 
cd pandorarh
docker-compose up --build
```

--------------------------------------
## 🛠 Instalação Manual

### Backend (Laravel)

1. Acesse a pasta do backend:
```bash
cd caminho_do_projeto/backend
```

2. Instalar dependências do PHP:
```bash
composer install --optimize-autoloader --no-dev
```

3. Iniciar o servidor do frontend
```bash
php artisan serve
```

🔌 Endpoint: http://127.0.0.1:8000


### Frontend (Nuxt.js)

1. Acesse a pasta do backend:
```bash
cd caminho_do_projeto/frontend
```

2. Instalar dependências do Node:
```bash
npm install --omit=dev

```

3. Iniciar Aplicação Vue
```bash
npm run dev
```
🌐 Aplicação: http://localhost:3000


## 🧪 Testando a Aplicação

1. Acesse o frontend em http://localhost:3000
2. Navegue entre as telas:
    - Cadastro: Preencha o formulário com dados do funcionário
    - Listagem: Visualize todos os registros cadastrados


## 🧪 Executando o Feature/Unit Tests 

### Backend (Laravel)
1. Acesse a pasta do backend:
```bash
cd caminho_do_projeto/backend
php artisan test
```

### Frontend (Nuxt.js)

1. Acesse a pasta do frontend:
```bash
cd caminho_do_projeto/frontend
npm run test  // ou npx vitest
```


## � Tecnologias Utilizadas
- Backend:

<img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&amp;logo=laravel&amp;logoColor=white" alt="Laravel">
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&amp;logo=mysql&amp;logoColor=white" alt="MySQL">


- Frontend:

<img src="https://img.shields.io/badge/Nuxt.js-00DC82?style=for-the-badge&amp;logo=nuxtdotjs&amp;logoColor=white" alt="Nuxt.js">
<img src="https://img.shields.io/badge/Vue.js-4FC08D?style=for-the-badge&amp;logo=vuedotjs&amp;logoColor=white" alt="Vue.js">



## ⁉ Suporte
Em caso de problemas: [lisandro.programdor@gmail.com]

## Links

Link para o projeto:
https://github.com/users/LisandroMoura/projects/4


---------------------------------------

# Sobre o Desafio:

| Um resumo do que foi desenvolvido neste desafio

### Backend

Sistema Laravel para o fornecimento de uma API robusta e consistente.

**Recursos do Laravel Implementados:**

*   **Padrão de Projetos:** Arquitetura MVC (Model-View-Controller) para organização do código e implementação de controllers para rotas do tipo "resources".
*   **Segurança:** Autenticação de API via Laravel Sanctum para proteção dos endpoints.
*   **Validações e consistência de dados:** Implementação de `Validators` e `Rules` customizadas para garantir a integridade dos dados na camada de backend:
    *   `app/Rules/CpfValidate.php`: Validação de CPF válidos bem como duplicidade de CPF na base de dados.
    *   `app/Rules/DataNascimentoValidate.php`: Validação da idade (maior de 18 anos).
    *   `Duplicidade de cadastro`: Validações impedindo repetições de CPF e email no sistema.

*   **Testes Unitários:** Testes automatizados com PhpUnit para validação de cadastros e autenticação:
    *   `tests/Feature/AuthControllerTest.php`: Testes para cadastro de usuário e login.
    *   `tests/Feature/FuncionarioTest.php`: Testes para o CRUD e funcionamento geral da API.
    *   Para executar os testes, navegue até a pasta do backend e execute: `php artisan test`

### Frontend

*   **Layout:** Componentização de páginas para um layout modular e reutilizável.
    *   Reutilização de componentes, como `components/Funcionario/Form.vue`, para cadastro, edição e visualização de colaboradores.
*   **Componentização de Objetos de Formulário:** Criação de componentes customizados:
    *   `Input.vue`: Componente de input customizado para o layout.
    *   `Select.vue`: Componente de select customizado para o layout.
*   **Formatação e Máscaras em Campos Numéricos:** Implementação do componente `Form/CustomInputFormat.vue` para aplicar máscaras a campos numéricos (CPF, Telefone, valores financeiros, RG, etc.).
*   **Composables:** Utilização de composables para reaproveitamento de lógica
    *   `useFetchAuth.ts`: Hook para requisições autenticadas, login na API e gestão do token no `localStorage`.
    *   `useApiErrorHandler.ts`: Hook para tratamento de erros da API.

# Bônus:
| Algunas nelhorias que foram adicionadas ao desafio:

- [x] Implementar validações para os campos do formulário
- [x] Implementado `Loading State` nas páginas da aplicação
- [x] Implementado  `Error State` nas páginas da aplicação
- [x] Implementado  `Testes unitários com Vitest` 
    - Teste do componente Breadcrumb:
        - Teste de renderização simples do componente
    - Teste do componentei ListItem:
        - Teste de renderização das props
        - Teste de renderização dos botões de ação



