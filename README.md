# It CLI

Uma interface de linha de comando (CLI) para acelerar o desenvolvimento em projetos baseados no Adianti Framework.

> ⚠️ Esta CLI **não é afiliada oficialmente** à Adianti Solutions Ltd. e **não inclui o Adianti Framework**. Ela apenas facilita o desenvolvimento em projetos que **já utilizam** o framework.

---

## ✨ Funcionalidades

- Geração de formulários, listagens e classes com estrutura base  
- Auxilia na criação de telas, serviços e páginas  
- Automatiza tarefas repetitivas em projetos Adianti

---

## ⚠️ Requisitos

- PHP >= 7.4  
- Um projeto com o [Adianti Framework](https://adiantiframework.com.br/) já instalado e configurado  
- A CLI **deve ser executada dentro da raiz de um projeto Adianti válido**

---

## 📦 Instalação

Adicione como dependência no seu projeto:

```bash
composer require --dev vespasiano/it
```

---

### 📦 Comandos Disponíveis

Abaixo estão os comandos disponíveis na CLI deste projeto.

---

#### 🚀 `init`

> Inicializa a estrutura básica da CLI no projeto. Cria o arquivo `it` na raiz, responsável por executar os comandos, e gera a pasta `command` em `app/service/`, onde você poderá organizar e criar seus próprios comandos personalizados.

**Uso:**
```bash
./vendor/bin/it init
```
---
### 🚀 Comando: `make:controller`

Cria um novo controller na estrutura do projeto.

---

**Uso:**

```bash
php it make:controller ControllerName [Subdirectory]
```

---

**Parâmetros:**

| Parâmetro          | Descrição                                         | Obrigatório |
| ------------------ | ------------------------------------------------- | ----------- |
| `ControllerName`   | Nome do controller a ser criado                   | ✅ Sim       |
| `Subdirectory`     | Subdiretório a ser criado dentro de `app/control` | ❌ Não       |

---

**Exemplos:**

Criar um controller padrão:

```bash
php it make:controller UserController
```

Criar um controller dentro de um subdiretório:

```bash
php it make:controller AuthController admin
```

---

Esse comando facilita a organização da aplicação ao automatizar a criação de controllers seguindo o padrão definido em `app/control`.

---

### 🧱 Comando: `make:model`

Cria um novo model na estrutura do projeto, com base nas colunas de uma tabela do banco de dados.

---

**Uso:**

```bash
php it make:model ModelName connectorDatabase [Subdirectory]
```

---

**Parâmetros:**

| Parâmetro           | Descrição                                                    | Obrigatório |
| ------------------- | ------------------------------------------------------------ | ----------- |
| `ModelName`         | Nome do model a ser criado                                   | ✅ Sim       |
| `connectorDatabase` | Nome do conector utilizado para buscar os atributos no banco de dados. | ✅ Sim       |
| `Subdirectory`      | Subdiretório a ser criado dentro de `app/model`              | ❌ Não       |

---

**Exemplos:**

Criar um model básico:

```bash
php it make:model User db
```

Criar um model dentro de um subdiretório:

```bash
php it make:model Product db admin
```

---

**Observações:**

* O nome da classe do model será convertido automaticamente para o nome da tabela no banco de dados.

  * Exemplo: `SystemUsers` → `system_users`
* A conversão segue o padrão snake\_case, que é o mais comum em bancos relacionais.

---

Esse comando agiliza a criação de models com base na estrutura atual do banco, seguindo as convenções da aplicação.

---

### 🧱 Comando: `make:sm`

Cria um novo serviço rest na estrutura do projeto.

---

**Uso:**

```bash
php it make:sm ServiceName connectorDatabase [Subdirectory]
```

---

**Parâmetros:**

| Parâmetro           | Descrição                                                    | Obrigatório |
| ------------------- | ------------------------------------------------------------ | ----------- |
| `ServiceName`       | Nome do serviço a ser criado                                 | ✅ Sim       |
| `connectorDatabase` | Nome do connector                                            | ✅ Sim       |
| `Subdiretorio`      | Subdiretório a ser criado dentro de `app/service/rest`       | ❌ Não       |

---

**Exemplos:**

Criar um serviço básico:

```bash
php it make:sm User db
```

Criar um serviço dentro de um subdiretório:

```bash
php it make:sm Product db admin
```
---

## 🛡️ Licença

Distribuído sob os termos da **MIT License**.

---
