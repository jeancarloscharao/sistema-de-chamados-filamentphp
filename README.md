
# Sistema de Chamados

Este repositório contém um sistema de chamados desenvolvido com o framework Laravel e a biblioteca FilamentPHP. Este sistema foi criado para gerenciar e acompanhar tickets de suporte de forma eficiente e intuitiva.

## Funcionalidades

- **Criação de Chamados**: Permite aos usuários criar novos tickets de suporte detalhando o problema ou solicitação.
- **Acompanhamento de Chamados**: Acompanhe o status e o progresso de cada chamado, desde a criação até a resolução.
- **Notificações**: Receba notificações sobre atualizações importantes nos chamados.
- **Gerenciamento de Usuários**: Controle de acesso e permissões para diferentes tipos de usuários (administradores, técnicos, clientes).
- **Dashboard Interativa**: Visualize estatísticas e métricas importantes sobre os chamados através de gráficos e tabelas.
- **Relatórios**: Gere relatórios detalhados sobre os chamados para análise e melhoria contínua.

## Tecnologias Utilizadas

- **Laravel**: Framework PHP robusto e flexível para o desenvolvimento de aplicações web.
- **FilamentPHP**: Biblioteca para a criação de interfaces administrativas com Laravel.
- **MySQL**: Banco de dados relacional utilizado para armazenar as informações dos chamados.
- **Tailwind CSS**: Framework CSS para estilização rápida e responsiva.
- **Laravel Sail**: Ambiente de desenvolvimento leve para Laravel utilizando Docker.

## Instalação

Para configurar o ambiente de desenvolvimento, siga os passos abaixo:

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/sistema-de-chamados.git
   ```

2. Navegue até o diretório do projeto:
   ```bash
   cd sistema-de-chamados
   ```

3. Instale as dependências do Composer:
   ```bash
   composer install
   ```

4. Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente:
   ```bash
   cp .env.example .env
   ```

5. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

6. Instale o Laravel Sail e suas dependências:
   ```bash
   composer require laravel/sail --dev
   php artisan sail:install
   ```

7. Inicialize os containers do Sail:
   ```bash
   ./vendor/bin/sail up -d
   ```

8. Execute as migrações e seeders para configurar o banco de dados:
   ```bash
   ./vendor/bin/sail artisan migrate --seed
   ```

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
