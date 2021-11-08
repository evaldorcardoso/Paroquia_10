# Reformulando Paroquia10 com Laravel (Em Andamento)

Um verdadeiro Informativo Digital!

## 🚀 Começando

Paróquia10 é um aplicativo PWA feito para congregações/igrejas que desejam ter um informativo digital com seus eventos de forma simples e rápida.

## 🛠️ Em construção utilizando:

* [PHP](https://www.php.net/) - Usado no WebService para comunicação com o Banco de Dados
* [Laravel](https://laravel.com/) - Framework PHP
* [MySQL](https://www.mysql.com/) - Banco de Dados
* [Docker] (https://www.docker.com/) - Ambiente de execução com containers

## 🛠️ Como fazer funcionar:
###  É necessário ter o composer instalado na máquina e o Docker
 * Navegar até a pasta do projeto, abrir o terminal e digitar:
 * Copiar o arquivo **.env.example** para o **.env** no mesmo caminho   
 * Instalar as dependências: **composer require laravel/sail --dev**
 * Criar o alias para o sail: **alias sail='bash vendor/bin/sail'**
 * Subir os containers: **sail up -d**
 * Acessar no navegador: http://localhost:88
 * Logar no phpmyadmin com **Servidor: mysql**, **Usuário:root**
 * Criar um banco de dados chamado **paroquia10** com a colattion **utf8mb4_unicode_ci**
 * Voltar no terminal e rodar as migrations: **sail artisan migrate**
 * Para acessar o sistema abrir no navegador **http://localhost/users**

## ✒️ Autores

* **Desenvolvedor** - *Projeto Inicial* - [Evaldo R Cardoso](https://github.com/evaldorcardoso)

## 🎁 Expressões de gratidão

* Obrigado publicamente 🤓.

---
⌨️ com ❤️ por [Evaldo R Cardoso](https://github.com/evaldorcardoso) 😊




