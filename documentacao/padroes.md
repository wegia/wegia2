# Padrões do Projeto

## Commits

Para garantir consistência e clareza nas mensagens de commit, seguimos uma convenção de prefixos que indica o tipo de alteração realizada no código.

- `feat:` - Indica a adição de uma nova funcionalidade, como uma nova função, classe ou recurso.  
- `fix:` - Usado para correções de erros no código.  
- `refactor:` - Refatorações que melhoram a estrutura do código sem alterar sua funcionalidade.  
- `test:` - Criação ou modificação de testes automatizados.  
- `build:` - Alterações na configuração do projeto ou adição de bibliotecas e dependências.  
- `docs:` - Criação ou ajustes na documentação.  

Caso o commit envolva múltiplos tipos de alterações, utilize um ponto (`.`) para separar os prefixos.

**Exemplo:**  
`feat: Criação do model ExemploModel. fix: Correções no controller ExemploController`

---

## Diagrama de Classes

Deve seguir o padrão: **snake_case**

**Exemplo:**  
`cargo_colaborador`

---

## Model

Deve ter o mesmo nome presente no Diagrama de Classes, mas seguir o padrão: **PascalCase (upper camel case)**

**Exemplo:**  
`CargoColaborador`

---

## Migrations

Deve seguir o padrão do Laravel (criadas por linha de comando):  
**data_id_create_*snake_case*_table**

**Exemplo:**  
`2023_08_18_121458_create_cargo_colaborador_table`

*Obs:* No comando, não é necessário passar a data, apenas o nome da tabela com o sufixo `table`.

---

## Seeders

Deve seguir o padrão: **PascalCaseSeeder**

**Exemplo:**  
`CargoColaboradorSeeder`

---

## Controllers

Deve seguir o padrão: **PascalCaseController**

**Exemplo:**  
`CargoColaboradorController`

---

## Testes

Deve seguir o padrão: **PascalCaseTest**

*Obs:* A maioria dos testes é feita para as classes Controllers.

**Exemplo:**  
`CargoColaboradorControllerTest`
