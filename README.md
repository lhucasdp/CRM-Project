<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Preparação de ambiente

* Primeiramente baixe e instale o <b>Docker</b> em sua máquina com o link a seguir https://www.docker.com/get-started/ .
* A seguir clone meu repositório com o comando ```git clone https://github.com/lhucasdp/CRM-Project.git``` utilizando o GitBash.
* Em seguida acesse a pasta do seu projeto, via terminal, e clone o laradock com o comando ```git clone https://github.com/laradock/laradock.git```
## Acesse o <b>Laradock</b>
* Faça uma cópia do arquivo ```.env.example``` e renomeie para ```.env```
* Abra o arquivo renomeado e renomeie os seguintes trechos de código (utilize ```Ctrl + F``` pra pesquisar)
* ```PHP_VERSION=7.4```
* ```MYSQL_VERSION=latest```
* ```MYSQL_DATABASE=default```
* ```MYSQL_USER=default```
* ```MYSQL_PASSWORD=secret```
* ```MYSQL_PORT=3306```
* ```MYSQL_ROOT_PASSWORD=root```
* ```MYSQL_ENTRYPOINT_INITDB=./mysql/docker-entrypoint-initdb.d```

## Faça o mesmo com a pasta ```.env``` dentro do projeto.
* ```DB_CONNECTION=mysql```
* ```DB_HOST=mysql```
* ```DB_PORT=3306```
* ```DB_DATABASE=projeto_crm```
* ```DB_USERNAME=root```
* ```DB_PASSWORD=root```

## Abra novamente o prompt dentro da pasta ```laradock``` e execute os seguintes comandos.
* ```docker-compose up -d nginx mysql phpmyadmin``` - Criará e iniciará suas imagens no docker.
* ```docker-compose exec --user=laradock workspace bash``` - Gerar outra linha de comando <b>Bash</b>.
* ```composer install``` - Instalar o composer.
* ```php artisan key:generate``` - Gera a chave
* ```php artisan storage:link``` - Permite o BD abrir imagens.

## Configuração do Banco de Dados
* Pressione ```Ctrl + D``` e execute o comando ```docker ps``` - Verificar as portas do projeto.
* Acesse seu <b>localhost</b> observando a porta com o comando anterior (```:8081```)
* Abra seu navegador e digite na url ```localhost: #porta#```
* ![image](https://user-images.githubusercontent.com/90513511/173357899-5f7b07d6-7114-47f3-b78b-a42c64fca0f6.png)
* Crie um banco com o mesmo nome que está definido anteriormente na pasta ```.env``` em ```DB_DATABASE=projeto_crm```
* Em seguida execute os seguintes comandos
* ```docker-compose exec --user=laradock workspace bash```
* ```php artisan migrate``` - Gerar migrações no banco
* ```php artisan db:seed``` - Gerar os dados do banco
* Acesse o projeto inserindo na url ```localhost: #porta do gninx#```
* Login: ```admin@admin.com```
* Senha: ```admin```
