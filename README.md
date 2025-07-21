# Admin Videos Stack - PHP/Laravel + React

Sistema de administração de vídeos desenvolvido com uma arquitetura moderna e escalável, utilizando Docker para containerização e Keycloak para autenticação e autorização.

## 🚀 Principais Tecnologias

### Backend (API)
- **Laravel 6.0** - Framework PHP robusto para desenvolvimento de APIs REST
- **PHP 7.2+** - Linguagem de programação principal do backend
- **JWT (JSON Web Tokens)** - Sistema de autenticação stateless
- **Keycloak Integration** - Integração com Keycloak para autenticação federada
- **Laravel CORS** - Gerenciamento de políticas CORS
- **Laravel AMQP** - Integração com sistemas de mensageria
- **Google Cloud Storage** - Armazenamento de arquivos na nuvem
- **Redis/Predis** - Cache e sessões distribuídas
- **PHPUnit** - Framework de testes unitários
- **Laravel Dusk** - Testes de interface (browser testing)

### Frontend
- **React 18** - Biblioteca JavaScript para construção de interfaces
- **TypeScript** - Superset tipado do JavaScript
- **Vite** - Build tool moderna e rápida
- **Redux Toolkit** - Gerenciamento de estado da aplicação
- **Material-UI (MUI)** - Biblioteca de componentes seguindo Material Design
- **Axios** - Cliente HTTP para comunicação com APIs
- **Keycloak-js** - SDK JavaScript para integração com Keycloak
- **Notistack** - Sistema de notificações toast
- **Vitest** - Framework de testes para Vite

### Infraestrutura
- **Docker & Docker Compose** - Containerização e orquestração
- **Keycloak 24.0.3** - Sistema de autenticação e autorização
- **Hot Module Replacement (HMR)** - Desenvolvimento com recarga automática

## 📋 Pré-requisitos

- Docker e Docker Compose instalados
- Portas 3000, 8080 e 8180 disponíveis

## ⚡ Início Rápido

Para subir toda a stack, execute:

```bash
docker compose up
```

Após a inicialização:
- **Frontend**: http://localhost:3000
- **Backend API**: http://localhost:8080
- **Keycloak Admin**: http://localhost:8180

## 🔐 Configuração do Keycloak

### Passo 1: Acessar o Console Administrativo

1. Acesse http://localhost:8180
2. Clique em **"Administration Console"**
3. Faça login com as credenciais:
   - **Usuário**: `admin`
   - **Senha**: `admin`

### Passo 2: Criar um Novo Realm

1. No menu lateral esquerdo, passe o mouse sobre **"Master"** (dropdown do realm atual)
2. Clique em **"Add realm"** ou **"Create Realm"**
3. Na página de criação:
   - **Name**: Digite `React-auth`
   - **Enabled**: Mantenha marcado
4. Clique em **"Create"**

### Passo 3: Importar Configuração do Realm

#### Opção A: Import durante a criação (Recomendado)
1. Na página **"Add realm"**, ao invés de preencher o nome manualmente:
2. Clique em **"Select file"** na seção **"Import"**
3. Selecione o arquivo `realm-export.json` localizado na raiz do projeto
4. Clique em **"Create"**

#### Opção B: Import após criação
1. Acesse **"Manage"** → **"Import"** no menu lateral
2. Clique em **"Select file"**
3. Selecione o arquivo `realm-export.json`
4. Em **"If a resource exists"**, selecione **"Overwrite"**
5. Clique em **"Import"**

### Passo 4: Verificar Configurações

Após a importação, verifique se foram criados:

1. **Clients**: Verifique se existe um client configurado para o frontend
2. **Users**: Acesse **"Manage"** → **"Users"** para ver usuários pré-configurados
3. **Roles**: Verifique **"Configure"** → **"Roles"** para roles do sistema
4. **Realm Settings**: Confirme configurações gerais em **"Configure"** → **"Realm Settings"**

### Passo 5: Configurar URLs do Client (se necessário)

1. Vá em **"Configure"** → **"Clients"**
2. Clique no client da aplicação frontend
3. Verifique/configure:
   - **Valid Redirect URIs**: `http://localhost:3000/*`
   - **Web Origins**: `http://localhost:3000`
   - **Admin URL**: `http://localhost:3000`

### Passo 6: Testar Integração

1. Acesse o frontend em http://localhost:3000
2. Tente fazer login - você deve ser redirecionado para o Keycloak
3. Use as credenciais de um usuário criado ou crie um novo usuário

## 🛠️ Desenvolvimento

### Backend (Laravel)

```bash
# Acessar container do backend
docker compose exec backend bash

# Instalar dependências
composer install

# Executar migrações
php artisan migrate

# Executar testes
php artisan test
```

### Frontend (React)

```bash
# Acessar container do frontend
docker compose exec frontend bash

# Instalar dependências
npm install

# Executar testes
npm test

# Build para produção
npm run build
```

## 📁 Estrutura do Projeto

```
├── backend/           # API Laravel
│   ├── app/          # Código da aplicação
│   ├── config/       # Configurações
│   ├── database/     # Migrações e seeds
│   └── tests/        # Testes
├── frontend/         # Aplicação React
│   └── src/          # Código fonte
├── docker-compose.yaml
└── realm-export.json # Configuração do Keycloak
```

## 🔧 Configurações Importantes

### Backend
- JWT configurado para autenticação
- Integração com Keycloak via `vizir/laravel-keycloak-web-guard`
- CORS configurado para permitir requisições do frontend
- Google Cloud Storage para upload de arquivos

### Frontend
- Configuração do Keycloak em `KeycloackConfig.ts`
- Redux para gerenciamento de estado
- Axios interceptors para autenticação automática
- Material-UI para interface consistente

## 📝 Logs e Debugging

```bash
# Logs em tempo real
docker compose logs -f

# Logs específicos do serviço
docker compose logs backend
docker compose logs frontend
docker compose logs keycloak
```

