## Apresentação do Projeto Backend

Este projeto de backend foi desenvolvido com o objetivo de fornecer uma API RESTful robusta e escalável para um sistema de gerenciamento de empresas e sócios. A API foi construída utilizando o framework Symfony, aproveitando as suas poderosas ferramentas e componentes que permitem uma rápida prototipagem e um código bem organizado.

### Principais Características

- **CRUD Completo**: Implementei operações de criação, leitura, atualização e exclusão para empresas e sócios, permitindo um gerenciamento completo dos registros através de endpoints bem definidos.

- **Validação de Dados**: As entradas do usuário são validadas no servidor para garantir a integridade dos dados e prevenir possíveis inconsistências.

- **ORM Doctrine**: Utilizamos o Doctrine para abstrair e automatizar o gerenciamento de dados relacionais, o que proporciona uma maneira eficiente de realizar operações com o banco de dados.


### Desafios Encontrados

Durante o desenvolvimento, enfrei desafios como a implementação de relações complexas entre as entidades, a garantia de que as respostas da API fossem tanto informativas quanto seguras, e a criação de uma estrutura que permitisse futuras expansões sem grandes refatorações.

## Como Executar

Para colocar o sistema em funcionamento, siga os passos abaixo:

### Pré-requisitos

- PHP 7.4 ou superior
- Composer
- Symfony CLI
- PostGresql ou outro banco de dados compatível

### Configuração

1. Clone o repositório do GitLab para o seu ambiente local:
git clone <endereço-do-repositório>

2.Entre no diretório do projeto:
cd <nome-do-diretório-do-projeto>

3.Instale as dependências do projeto:
composer install

4.Configure a conexão com o banco de dados editando o arquivo .env ou configurando as variáveis de ambiente do seu servidor.

5.Execute as migrações para criar a estrutura do banco de dados:
php bin/console doctrine:migrations:migrate

Iniciar o Servidor de Desenvolvimento
Após a configuração, você pode iniciar o servidor de desenvolvimento usando o Symfony CLI:
symfony server:start

Agora a API estará disponível em http://127.0.0.1:8000/api.

Utilização da API
Utilize um cliente de API, como o Postman, para testar os endpoints conforme documentação da API. Por exemplo:

Para listar todas as empresas: GET /api/empresas
Para adicionar uma nova empresa: POST /api/empresas com o payload apropriado
Notas Adicionais
Certifique-se de configurar corretamente o servidor web ou o ambiente de hospedagem para ambientes de produção.
Para mais comandos e opções de execução, consulte a documentação do Symfony.

Esses comandos são exemplos gerais e devem ser ajustados de acordo com as especificidades do seu projeto, como o nome do diretório, o endereço do repositório, e as variáveis de ambiente específicas da configuração do banco de dados.
### Conclusão

Com a API implementada neste projeto, uma base sólida para qualquer frontend interagir de maneira eficiente, segura e confiável, abrindo portas para a construção de um sistema empresarial integrado e de fácil manutenção.

Para dúvidas, sugestões ou contribuições, por favor, consulte a seção de contribuição deste documento ou entre em contato diretamente.

---

Agradeço por considerar este projeto. Estou ansioso para seu feedback e para oportunidades de melhorias contínuas.

