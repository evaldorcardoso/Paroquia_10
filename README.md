# Reformulando Paroquia10 com Laravel (Em Andamento)

Um verdadeiro Informativo Digital!

## 🚀 Começando

Paróquia10 é um aplicativo PWA feito para congregações/igrejas que desejam ter um informativo digital com seus eventos de forma simples e rápida.

## 🛠️ Em construção utilizando:

* [PHP](https://www.php.net/) - Usado no WebService para comunicação com o Banco de Dados
* [Laravel](https://laravel.com/) - Framework PHP
* [MySQL](https://www.mysql.com/) - Banco de Dados
* [Docker] (https://www.docker.com/) - Ambiente de execução com containers
* [Composer] (https://getcomposer.org/) - Gestor de Dependências PHP

## 🛠️ 1- Como fazer funcionar a API em Laravel:
###  É necessário ter o composer(https://getcomposer.org/) instalado na máquina e o Docker
 * Navegar até a pasta do projeto, abrir o terminal e digitar:
 * Copiar o arquivo **.env.example** para o **.env** no mesmo caminho   
 * Instalar as dependências: **composer require laravel/sail --dev**
 * Criar o alias para o sail: **alias sail='bash vendor/bin/sail'**
 * Subir os containers: **sail up -d**
 * Voltar no terminal e rodar as migrations: **sail artisan migrate**
 * Ainda no terminal gerar as chaves de autenticação: **sail artisan passport:keys**
 * A API estará rodando no endereço: **http://localhost**


## 🛠️ 2- Como fazer funcionar o Front-End:
* Em desenvolvimento ainda...

## ✒️ Autores

* **Desenvolvedor** - *Projeto Inicial* - [Evaldo R Cardoso](https://github.com/evaldorcardoso)

## 🎁 Expressões de gratidão

* Obrigado publicamente 🤓.

---
⌨️ com ❤️ por [Evaldo R Cardoso](https://github.com/evaldorcardoso) 😊




