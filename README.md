# PokeTrade 
O projeto "Poketrade" é um programa criado para auxiliar os treinadores a trocarem seus pokemons com outros treinadores. O software utiliza um critério para validar uma troca como sendo justa ou não sendo este o "base experience". Com base no "base experience" de cada pokemon ou sua soma o software utiliza um padrão de similaridade para avaliar uma troca como sendo justa ou não.


1. A aplicação funciona de uma forma bem simples, primeiro você precisa acessar sua conta e adicionar os pokemons no catálogo como
mostrado na imagem abaixo:

PS: Os pokemons podem ser adicionados dessa forma para facilitar o uso da aplicação.

![Screenshot](docs/Catalog.png)


2. Após adicionar os pokemons que desejar click no botão a esquerda da tela chamado de "Place a trade" para adicionar uma ordem de troca:

![Screenshot](docs/place_a_trade.png)

Clique no botão verde "Add a not listed" como mostrado na imagem acima.

3. Após isso de um um nome para a ordem e selecione os pokemons que deseja adicionar a ordem, o máximo de pokemons permitidos são de 6 e o mínimo um pokemon. 

![Screenshot](docs/ordem.png)

Repare no botão abaixo chamado de "Availability", ao selecionar a opção "Available" a ordem ficará visível para todos os usuários no sistema, ou seja, sua ordem estara de disponível. 

4. Um ponto importante a se considerar é a base de experiencia dos seus pokemons, que ficaram visíveis na aba "Place a trade" como mostrado na imagem abaixo:

![Screenshot](docs/ordem_e.png)

Esse número é importante devido ao fato de que ele será utilizado como critério para se considerar uma troca justa do seu set (os pokemons da sua ordem) com o set do outro treinador.

5. Depois desse processo vá ao dashboard para poder visualizar as ordems abertas por outros treinadores. As ordems podem ser vistas no quadro "Trades opportunities". As ordems que podem ser trocadas estaram na cor laranja. Você poderá clicar na ordem e será exibida uma tela como essa:

![Screenshot](docs/dash.png)

6. Atente-se a seta que indica o set que você quer dar em troca e a esquerda o set que você quer adquirir de outro trainador.
Repare que o sistema informa TBE (Total base experience) do set do outro trainador e também informa o seu no dashboard junto com as outros ordems porem com o botão de trade em vermelho. Isso serve para fins de comparação. O sistema considera uma troca justa com os TBEs diferenciando-se no máximo até 300 pontos. 

Para efetivar a troca é preciso clicar no botão "TRADE" caso a troca não seja justa a seguinte tela será exibida:

![Screenshot](docs/Not_play.png)


Caso a troca seja justa os pokemons serão trocados mediante a seguinte tela de sucesso:

![Screenshot](docs/success.png)

Após uma troca efetiva o sistema irá remover as ordens de ambos os lados. 



## Overview

1. [Intale os pre requisitos](#install-prerequisites)

    Antes de comecar tenha certeza de que possui os pre requisitos para inicar a aplicacao.

2. [Clone o projeto](#clone-the-project)

    Faca o download no repositório do GITHUB.

3. [Abra a aplicacao](#run-the-application)

    Ate aqui tudo está configurado para rodar.

4. [Comandos do Docker](#use-docker-commands)

    When running, you can use docker commands for doing recurrent operations.

___

## Install prerequisites

Para rodar os comandos do docker sem usar o sudo **sudo** voce precisa adicionar o docker **docker** ao grupo **your-user**:

```
sudo usermod -aG docker your-user
```

Requisitos :

* [Git](https://git-scm.com/downloads)
* [Docker](https://docs.docker.com/engine/installation/)
* [Docker Compose](https://docs.docker.com/compose/install/)

Check com o `docker-compose` se tudo está devidamente instalado : 

```sh
which docker-compose
```


### Images to use

* [Nginx](https://hub.docker.com/_/nginx/)
* [MySQL](https://hub.docker.com/_/mysql/)
* [PHP-FPM](https://hub.docker.com/r/nanoninja/php-fpm/)
* [Composer](https://hub.docker.com/_/composer/)


As imagens estao utilizando as seguintes portas :

| Server     | Port |
|------------|------|
| MySQL      | 3306 |
| Nginx      | 80   |

___

## Clone o projeto

Utilize este comando :

```sh
git clone git@github.com:carlosandrecds/poketrade.git
```

Va para o diretório baixado :

```sh
cd poketrade
```

### Project tree

```sh
.
├── Makefile
├── README.md
├── data
│   └── db
│       ├── dumps
│       └── mysql
├── docker-compose.yml
├── etc
│   ├── nginx
│   │   ├── default.conf
│   │   └── default.template.conf
│   ├── php
│   │   └── php.ini
│   └── ssl
└── web
    ├── app
    │   ├── composer.json.dist
    │   ├── phpunit.xml.dist
    │   ├── src
    │   │   └── Foo.php
    │   └── test
    │       ├── FooTest.php
    │       └── bootstrap.php
    └── public
        └── index.php
```

___


## Abra a aplicacao

1. Start the application :

    ```sh
    docker-compose up -d
    ```

    **Paciencia, isso pode levar alguns minutos...**

    ```sh
    docker-compose logs -f 
    ```

2. Abra o projeto no seu navegador favorito :

    * [http://localhost:80](http://localhost:80/)

3. Parar a aplicacao

    ```sh
    docker-compose down -v
    ```

___

## Help us

carlosandrecds@gmail.com