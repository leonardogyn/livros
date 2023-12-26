## Projeto - Livros

Seguir os passos abaixo para a instalação do sistema:

## Iniciar os containers do docker

docker-compose up -d

## Instalar os pacotes do composer

docker-compose exec php-fpm composer install

## Instalar os pacotes do npm

docker-compose exec php-fpm npm install

## Limpar o cache do Laravel

docker-compose exec php-fpm php artisan config:clear
docker-compose exec php-fpm php artisan optimize

## Gerar as tabelas no banco de dados

docker-compose exec php-fpm php artisan migrate

## Teste de código

docker-compose exec php-fpm php artisan test 


## Documentação - Swagger API

 - [Swagger API](http://localhost/api/)
 * Observação: É preciso Gerar a doc do swagger
 http://localhost/api/generation.php



## Sobre o Laravel

Laravel é um framework de aplicações web com sintaxe expressiva e elegante. Acreditamos que o desenvolvimento deve ser uma experiência agradável e criativa para ser verdadeiramente gratificante. Ele facilita o desenvolvimento facilitando tarefas comuns usadas em muitos projetos da web


## Documentação

 - [Documentação](https://laravel.com/docs)
 - [Laracasts](https://laracasts.com)


## Licença

O framework Laravel é um software de código aberto licenciado sob a [MIT license](https://opensource.org/licenses/MIT).
