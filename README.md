[esquema.pdf](https://github.com/user-attachments/files/18596750/esquema.pdf)## Projeto VLAB em Laravel

Projeto usando a framework Laravel para a criação de um banco de dados com endpoints para alimentar funcionalidades de uma aplicação.

## Setup

A aplicação foi feita utilizando o [Sail]([https://laravel.com/docs/contributions](https://laravel.com/docs/11.x/sail)), interface para interação com o ambiente de desenvolvimento em Docker da laravel.

Para a execução do projeto é necessário todas as dependências do laravel + docker. Em teoria a aplicação ainda funciona sem o docker, mas irei colocar as operações baseados no meu uso.

Para levantar o docker, executar o comando:

<code>./vendor/bin/sail up

Com isso o banco de dados mySQL e as rotas já estarão funcionando.

Para importar o banco de dados, um dump sql já está disponível no diretório do projeto, bastando executar o comando:

<code>./vendor/bin/sail mysql < laraveldb_dump.sql

Caso deseje visualizar o banco como um todo, inclui nas configurações do docker-compose para também levantar uma instância do phpadmin, localizado em [http://localhost:8001](http://localhost:8001), com usuário "sail" e senha "password".

Para o teste das funcionalidades requisitadas, também está disponível um swagger quando o ambiente é executado, localizado em [http://localhost/api/documentation](http://localhost/api/documentation) (também pode ser importado do arquivo em "/storage/api-docs/api-docs.json")

Também incluso segue o esquema do banco de dados : [esquema.pdf](https://github.com/user-attachments/files/18596751/esquema.pdf)
