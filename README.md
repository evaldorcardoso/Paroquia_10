# Reformulando Paroquia10 com Laravel/NestJS e Vuejs(3.x) - (Em Andamento)

Um verdadeiro Informativo Digital!

## 🚀 Começando

Paróquia10 é um aplicativo Web PWA feito para congregações/igrejas que desejam ter um informativo digital com seus eventos de forma simples e rápida.

## 🛠️ Em construção utilizando:

* [Laravel](https://laravel.com/) - Framework PHP - Api Back-end
* [NestJS](https://nestjs.com/) - A progressive Node.js framework - Api Back-end
* [Vue] (https://v3.vuejs.org/) - Framework progressivo para a construção de interfaces de usuário - Aplicativo Front-end
* [MySQL](https://www.mysql.com/) - Banco de Dados
* [Docker] (https://www.docker.com/) - Ambiente de execução com containers
* [Docker Compose] (https://docs.docker.com/compose/) - Compose ferramenta para definir e rodar multi-containers Docker
* [Composer] (https://getcomposer.org/) - Gestor de Dependências PHP
* [Yarn] (https://yarnpkg.com/) - Gerenciador de Pacotes e Dependências Javascript

## 🛠️ 1- Como fazer funcionar a API em Laravel:
###  É necessário ter o composer(https://getcomposer.org/) instalado na máquina e o Docker
 * Navegar até a pasta do projeto (laravel_api)
 * Copiar o arquivo **.env.example** para o **.env** no mesmo caminho   
 * Abrir o terminal e digitar:
 * Instalar as dependências: **composer require laravel/sail --dev**
 * Criar o alias para o sail: **alias sail='bash vendor/bin/sail'**
 * Subir os containers: **sail up -d**
 * Ainda no terminal e rodar as migrations: **sail artisan migrate**
 * Ainda no terminal e rodar as seeders para alimentar o banco de dados: **sail artisan db:seed**
 * Ainda no terminal gerar as chaves de autenticação: **sail artisan passport:keys**
 * Gerar clientid Personal: **sail artisan passport:client --personal**
 * A API estará rodando no endereço: **http://localhost**

## 🛠️ 2- Como fazer funcionar a API em NestJS:
###  É necessário ter o yarn(https://yarnpkg.com/) instalado na máquina e o Docker Compose
 * Navegar até a pasta do projeto (nestjs_api)
 * Copiar o arquivo **.env.example** para o **.env** no mesmo caminho   
 * Abrir o terminal e digitar:
 * Instalar as dependências: **yarn**
 * Subir os containers: **docker-compose up**
 * Ainda no terminal iniciar o projeto: **yarn start:dev**
 * A API estará rodando no endereço: **http://localhost:3000**


## 🛠️ 3- Como fazer funcionar o Front-End:
* Navegar até a pasta do projeto (app)
* Abrir o terminal e digitar:
* Instalar as dependências: **yarn**
* Rodar o projeto com **yarn serve**
* Será exibido no terminal o endereço para acessar o aplicativo no navegador

## ✒️ Autor(es)

* **Desenvolvedor** - *Projeto Inicial* - [Evaldo R Cardoso](https://github.com/evaldorcardoso)

## 🎁 Expressões de gratidão

* Obrigado publicamente 🤓.

---
⌨️ com ❤️ por [Evaldo R Cardoso](https://github.com/evaldorcardoso) 😊




