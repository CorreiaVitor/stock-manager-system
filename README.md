# Stock Manager System

Sistema de gerenciamento de estoque desenvolvido com Laravel como projeto de estudo e portfólio, com foco em organização de código, operações de CRUD e boas práticas no back-end.

## Sobre o projeto

O **Stock Manager System** foi criado com o objetivo de praticar o desenvolvimento de uma aplicação web em Laravel, simulando um cenário real de controle de estoque.

O projeto foi construído com foco principal no gerenciamento de **categorias** e **produtos**, buscando aplicar conceitos importantes como:

- organização por responsabilidades
- fluxo completo de CRUD
- validação de dados
- uso de migrations
- estruturação de rotas, controllers e views

## Funcionalidades implementadas

Atualmente, o sistema possui:

- cadastro de categorias
- listagem de categorias
- edição de categorias
- exclusão de categorias
- cadastro de produtos
- listagem de produtos
- edição de produtos
- exclusão de produtos
- associação entre produtos e categorias

## Tecnologias utilizadas

- PHP
- Laravel
- Blade
- MySQL
- Composer
- Vite
- Docker
- Laravel Sail

## Objetivo do projeto

Este projeto foi desenvolvido como parte do meu processo de estudo em Laravel, com o objetivo de consolidar conhecimentos em:

- desenvolvimento back-end com PHP
- estrutura de aplicações Laravel
- modelagem básica de domínio
- operações de banco de dados com Eloquent ORM
- organização de código para projetos reais
- versionamento com Git e publicação no GitHub

## Estrutura geral do projeto

O projeto segue a estrutura padrão do Laravel, com destaque para:

- `app/` para regras da aplicação
- `routes/` para definição das rotas
- `resources/views/` para as telas Blade
- `database/migrations/` para estrutura do banco

## Como executar o projeto com Docker (Laravel Sail)

### Pré-requisitos

Antes de começar, você precisa ter instalado em sua máquina:

- Docker
- Docker Compose
- Composer

> O Composer é necessário no primeiro setup do projeto para instalar as dependências PHP e disponibilizar o script `./vendor/bin/sail`, já que a pasta `vendor/` não é versionada no repositório.

### Passos para instalação

Clone o repositório:

```bash
git clone https://github.com/CorreiaVitor/stock-manager-system.git
```

Acesse a pasta do projeto:

```bash
cd stock-manager-system
```

Instale as dependências do PHP:

```bash
composer install
```

Copie o arquivo de ambiente:

```bash
cp .env.example .env
```

Configure as variáveis do arquivo `.env`.

Se estiver usando o serviço MySQL do próprio Sail, revise principalmente estes valores:

```env
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=stock_manager_system
DB_USERNAME=sail
DB_PASSWORD=password
```

Suba os containers do projeto:

```bash
./vendor/bin/sail up -d
```

Gere a chave da aplicação:

```bash
./vendor/bin/sail artisan key:generate
```

Instale as dependências do front-end:

```bash
./vendor/bin/sail npm install
```

Execute as migrations:

```bash
./vendor/bin/sail artisan migrate
```

Inicie o servidor do Vite:

```bash
./vendor/bin/sail npm run dev
```

### Acesso ao sistema

Após subir os containers, acesse no navegador:

```text
http://localhost
```

## Executando comandos no Sail

Alguns exemplos úteis:

- Rodar migrations:

```bash
./vendor/bin/sail artisan migrate
```

- Rodar os testes:

```bash
./vendor/bin/sail artisan test
```

- Parar os containers:

```bash
./vendor/bin/sail stop
```

## Próximos passos

Algumas evoluções previstas para o projeto são:

- melhoria da interface
- refinamento da experiência de uso
- ampliação das regras de negócio
- novas funcionalidades relacionadas ao controle de estoque
- evolução da estrutura para uma base ainda mais próxima de um sistema real

## Autor

Desenvolvido por **Vitor Correia** como projeto de estudo e evolução prática em Laravel.

## Licença

Este projeto está disponível para fins de estudo e portfólio.