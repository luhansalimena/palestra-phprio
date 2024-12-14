# Projeto de Exemplificação para Palestra PHPrio

Este projeto foi desenvolvido com o objetivo de exemplificar códigos apresentados durante a palestra para o PHPRio.

## Descrição

O projeto contém exemplos práticos de código que foram utilizados para demonstrar conceitos e técnicas durante a palestra.

## Estrutura do Projeto

A estrutura do projeto é organizada da seguinte forma:

- `app/`: Contém os arquivos principais da aplicação.
- `config/`: Arquivos de configuração.
- `database/`: Arquivos relacionados ao banco de dados.
- `public/`: Arquivos públicos acessíveis via web.
- `resources/`: Recursos como views e assets.
- `routes/`: Definição das rotas da aplicação.
- `storage/`: Arquivos de armazenamento.
- `tests/`: Testes automatizados.
- `vendor/`: Dependências do Composer.

## Configuração

Para configurar o projeto, siga os passos abaixo:

1. Clone o repositório:
    ```sh
    git clone https://github.com/luhansalimena/palestra-php-rio
    ```

2. Instale as dependências:
    ```sh
    composer install
    ```

3. Configure o arquivo [.env] com as suas variáveis de ambiente.

4. Execute as migrações do banco de dados:
    ```sh
    php artisan migrate
    ```

## Uso

Para iniciar o servidor de desenvolvimento, execute:
```sh
php artisan serve