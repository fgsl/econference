# eConference

Sistema de Gerenciamento de Conferências

## Introdução

Este sistema é um software livre e aberto que tem por finalidade o gerenciamento de conferências, eventos que promovem a difusão de conhecimento por meio de palestras e cursos.

Existem dois eixos principais de funcionalidades:

### Gestão da grade de conteúdo

* Submissão de trabalhos
* Pontuação e classificação de trabalhos
* Criação de trilhas de acordo com categorias
* Resolução de conflito de horários
* Conexão entre trabalhos e patrocinadores


### Gestão de atividades

* Controle de tarefas
* Votação de decisões
* Controle de receita e despesa
* Auditoria

## Instalação usando Composer

Faça o clone do projeto e em seguida rode o comando *composer install* no diretório raiz:

```bash
$ composer install
```

Uma vez instalado, você pode iniciar a aplicação usando o servidor embutido do PHP:

```bash
$ cd econference
$ php -S 0.0.0.0:8080 -t public/ public/index.php
# OU use o composer:
$ composer run --timeout 0 serve
```


