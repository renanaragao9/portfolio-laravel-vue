# Instruções para o GitHub Copilot - Projeto Laravel

## Visão Geral

Este projeto utiliza o framework Laravel para desenvolvimento de aplicações web e APIs. O GitHub Copilot deve seguir rigorosamente os princípios de Programação Orientada a Objetos (POO), Test-Driven Development (TDD) e os princípios SOLID ao gerar código.

## Princípios Fundamentais

### Programação Orientada a Objetos (POO)

- **Encapsulamento**: Proteja os dados internos das classes, expondo apenas interfaces necessárias.
- **Herança**: Utilize herança para promover reutilização de código, evitando duplicação.
- **Polimorfismo**: Permita que objetos de diferentes classes sejam tratados de forma uniforme através de interfaces comuns.
- **Abstração**: Foque nos aspectos essenciais, ocultando detalhes de implementação.

### Princípios SOLID

- **S (Single Responsibility)**: Cada classe deve ter uma única responsabilidade.
- **O (Open-Closed)**: Classes devem estar abertas para extensão, mas fechadas para modificação.
- **L (Liskov Substitution)**: Subclasses devem ser substituíveis por suas classes base sem alterar o comportamento.
- **I (Interface Segregation)**: Interfaces específicas são melhores que uma interface geral.
- **D (Dependency Inversion)**: Dependa de abstrações, não de implementações concretas.

### Test-Driven Development (TDD)

- Sempre escreva testes antes de implementar funcionalidades.
- Siga o ciclo Red-Green-Refactor: escreva teste que falha, implemente código para passar, refatore.
- Mantenha cobertura de testes alta, especialmente para lógica de negócio.

## Estrutura da API RESTful

### Componentes Principais

1. **Controllers**: Responsáveis por receber requisições HTTP e delegar lógica para services.
2. **Requests**: Classes para validação e sanitização de dados de entrada.
3. **Services**: Contêm a lógica de negócio, seguindo princípios SOLID.
4. **Resources**: Transformam modelos em respostas JSON estruturadas.

### Padrão de Implementação

- **Controllers**: Devem ser enxutos, apenas coordenando chamadas para services e retornando responses.
- **Requests**: Use Form Requests do Laravel para validação. Implemente regras de negócio complexas aqui quando necessário.
- **Services**: Centralize lógica de negócio. Injete dependências via construtor. Use interfaces para abstração.
- **Resources**: Use Laravel Resources para transformar dados. Implemente diferentes representações quando necessário.

### Boas Práticas

- Use injeção de dependência para promover baixo acoplamento.
- Implemente tratamento de erros consistente usando exceptions customizadas.
- Documente APIs com ferramentas como Laravel API Resource ou Swagger.
- Mantenha código limpo, legível e bem comentado.
- Siga convenções do Laravel (nomes de arquivos, estrutura de pastas).

### Exemplo de Estrutura

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Api/
│   │       └── UserController.php
│   └── Requests/
│       └── StoreUserRequest.php
├── Services/
│   └── UserService.php
└── Http/
    └── Resources/
        └── UserResource.php
```

Ao gerar código, o Copilot deve sempre considerar esses princípios e estruturas, garantindo que o código seja sustentável, testável e alinhado com as melhores práticas do Laravel.

## Instruções para Geração de Código

Não precisa colocar comentários explicativos no código gerado.
Use nomes de classes, métodos e variáveis em inglês.
Sempre ao criar um arquivo de request, service, controller ou resource, siga a estrutura de pastas contendo o nome da classe principal, Exemplo: UserController.php deve estar em Controllers/Api, UserService.php em Services, StoreUserRequest.php em Requests e UserResource.php em Resources. Dentro da pasta principal que é User/.
