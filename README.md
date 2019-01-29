Teste para desenvolvedor da REDBELT
==============================

Pré-requisitos para execução

* Linux
* PHP
* Banco de Dados ( Ex. MySql )
* Composer

## Etapas

1.1 Efetuar o clone do Projeto para uma maquina local:

git clone https://github.com/titojunior1/redbelt.git redbelt

1.2 Na raiz do projeto, gerar um arquivo .env baseado no arquivo .env.example  e editar as seguintes informações:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<nome database>
DB_USERNAME=<usuario>
DB_PASSWORD=<senha>

1.3 Dentro do Terminal, executar os seguintes comandos:

* composer update
* php artisan migrate
* php artisan key:generate
* npm install
* npm run dev
* php artisan serve

Após isso, acessar a URL: abaixo:

http://127.0.0.1:8000/incidentes/create

Esta é a tela inicial de cadastro de incidentes, após efetuar o primeiro cadastro, sera direcionado para a tela de listagem e outras funcionalidades.

