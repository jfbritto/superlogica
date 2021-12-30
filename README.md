# Teste Superlógica

## Instalação

Baixe o repositório 

* Crie o banco de dados mysql `superlogica`

Entre na raíz do projeto e siga os passos abaixo:

* Crie o arquivo com as variaveis de ambiente: `cp .env.example .env` e configure o banco de dados

* Instale as dependências do projeto: `composer install`

* Gere a chave do ambiente: `php artisan key:generate`

* Crie a tabela no banco de dados:
`php artisan migrate`

## Teste online
Para visualizar o teste online [Clique aqui](https://superlogica.jfbritto.com.br)