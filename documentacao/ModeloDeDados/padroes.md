# Padrões do projeto

## Commits
Para garantir consistência e clareza nas mensagens de commit, seguimos uma convenção de prefixos que indica o tipo de alteração realizada no código.
 
 `feat: ` - Indica a adição de uma nova funcionalidade, como uma nova função, classe ou recurso.
 
 `fix:` - Usado para correções de erros no código.
 
 `refactor:` - Refatorações que melhoram a estrutura do código sem alterar sua funcionalidade.
 
 `test:` - Criação ou modificação de testes automatizados.
 
 `build:` - Alterações na configuração do projeto ou adição de bibliotecas e dependências.

 `doc:` - Criação ou ajustes na documentação.
 
Caso o commit envolva múltiplos tipos de alterações, utilize um ponto (`.`) para separar os prefixos.
 
Exemplo: feat: Criação do model ExemploModel. fix: Correções no controller ExemploController

## Diagrama de Classes

Deve seguir o padrão: **snake_case**

Exemplo: cargo_colaborador
## Model

Mesmo nome presente no Diagrama de Classes, mas deve seguir o padrão: **PascalCase (upper camel case)**

Exemplo: CargoColaborador

## Migrations

Padrão do laravel (criar por linha de comando): **data_id_create_*snake_case*_table**

Exemplo: 2023_08_18_121458_create_cargo_colaborador_table

*Obs:* No comando não precisa passar a data somente o nome da tabela com o fim *table* por padrão 

## Seeders

Padrão: **PascalCaseSeeder**

Exemplo: CargoColaboradorSeeder

## Controllers
Padrão: **PascalCaseControlller**

Exemplo: CargoColaboradorController

## Testes
Padrão: **PascalCaseTest**

*Obs:* A maioria dos testes são feitas para as classes Controllers

Exemplo: CargoColaboradorControllerTest
