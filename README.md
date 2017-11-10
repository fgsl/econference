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

## Instalação

O sistema ainda não tem uma versão estável, por isso não há releases disponíveis, mas você pode baixar o código de duas formas pelo Github:

* Clonando via git o repositório (git clone https://github.com/fgsl/econference.git ou git clone git@github.com:fgsl/econference.git)
* Baixando o arquivo compactado (https://github.com/fgsl/econference/archive/master.zip)


### Instalação das dependências

O eConference faz uso de bibliotecas de terceiros, que não são mantidas com o projeto. Para trazê-las e tornarmos o sistema funcional, usamos o gerenciador de dependências do PHP, o Composer.

As instruções para instalar o Composer estão [aqui](https://getcomposer.org/download).

Rode o comando *composer install* no diretório raiz do eConference:

```bash
$ composer install
```

### Configuração do banco de dados

A configuração global do banco de dados está no arquivo config/autoload/global.php. O nome padrão do banco é econference, mas você pode alterá-lo, assim como o driver de banco de dados. As opções de drivers são: 

* IbmDb2
* Mysqli
* Oci8
* Pgsql
* Mqlsrv
* Pdo_Mysql
* Pdo_Sqlite
* Pdo_Pgsql 

O driver selecionado precisa estar instalado para que a aplicação funcione. Para informações sobre driver de banco de dados para PHP, consulte a documentação [aqui](http://php.net/manual/pt_BR/refs.database.php).

Para sistemas baseados em Debian, a instalação dos drivers pode ser feita com o aplicativo apt-get. O exemplo a seguir mostra como instalar o driver para MySQL no Debian 9. Consulte a documentação do seu sistema operacional para saber qual o nome dos pacotes com os drivers.

```bash
sudo apt-get install php-mysql
```

Você precisa criar a configuração local da aplicação. Crie no diretório config/autoload o arquivo local.php com o seguinte conteúdo:

```php
<?php
return [
		'db' => [
				'username' => '[USUÁRIO DO BANCO DE DADOS]',
				'password' => '[SENHA DO BANCO DE DADOS]',
		],
];

```

### Criação do banco de dados

Há duas formas para criar as tabelas da aplicação, desde que o banco de dados tenha sido criado previamente.

#### Especificamente para MySQL

Após criar o banco de dados, você pode usar um cliente de MySQL para executar o conteúdo do arquivo data/erm/econference.sql.

* No terminal (supondo que você esteja no diretório econference):

```bash
mysql -u [usuário] -p [nome do banco de dados] < data/erm/econference.sql
```

* Pelo phpmyadmin:

1) Clique sobre o nome do banco de dados na árvore de bancos à esquerda

2) Clique sobre a aba SQL na parte superior do quadro da direita

3) Cole o conteúdo do arquivo econference.sql

4) Clique em Executar

#### Para qualquer banco

**IMPORTANTE**: O script a seguir NÃO FUNCIONARÁ se o driver PHP do seu banco de dados não estiver instalado. Veja a seção sobre configuração do banco de dados.

Execute o script createdatabase.php a partir do diretório raiz:

```bash
php scripts/createdatabase.php
```


## Execução da aplicação

Uma vez instalado, você pode iniciar a aplicação usando o servidor embutido do PHP:

```bash
$ cd econference
$ php -S 0.0.0.0:8080 -t public/ public/index.php
# OU use o composer:
$ composer run --timeout 0 serve
```

Rodando diretamente pelo PHP é possível ver as mensagens de log pelo terminal.


## Orientações para contribuição

Sempre que modificar algo no projeto, execute os testes automatizados, para verificar se algo não foi "quebrado" durante a mudança.

No terminal, na pasta raiz do projeto, execute a instância interna do phpunit assim:

```bash
vendor/bin/phpunit
```

Quando criar novas classes, adicionar ou modificar métodos existentes, crie um teste no respectivo módulo. Os testes automatizados devem ser criados na pasta test do módulo. Cada módulo novo deve ser incluído no arquivo phpunit.xml, para que seus testes sejam executados pelo comando acima.

Os testes automatizados no projeto eConference são feitos de acordo com os padrões xUnit implementados pelo PHPUnit. Para saber mais sobre o PHPUnit, leia a documentação [aqui](https://phpunit.de/manual/current/pt_br/phpunit-book.html)

NUNCA submeta código enquanto um teste estiver falhando.



