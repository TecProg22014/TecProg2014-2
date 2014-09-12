Folha de Estilos
===

* [Documento em .doc](https://docs.google.com/document/d/1s6-zncL5hlHcRo-ENEUFxex-5ntJHSV2Kk-uciWX5jw/edit#)

## Cabeçalho

O código deve conter um cabeçalho no início da classe no estilo /** ... */ contendo o nome da classe, uma breve descrição da mesma e um aviso de direitos autorais.

### Declaração de classes e interfaces
-------------

A tabela a seguir mostra as partes de uma classe e a ordem em que devem aparecer:

Partes da declaração Classe/interface                       | -
--------------------------------------                      | -------------
Comentário de documentação da classe/interface (/** ... */) | * [PHPdoc](http://www.phpdoc.org/docs/latest/index.html)
Declaração class ou interface                               | -
Comentários de implementação da classe/interface (/** ... */), se necessário   | Este comentário deve conter qualquer informação não apropriada para o comentário da documentação
Variáveis de classe (static)                                                   | Primeiro as variáveis public, depois protected, depois private.
Variáveis de instância                                                         | Primeiro public, depois protected, depois private
Construtores                                                                   | <code>__construct();</code>
Métodos                                                                        | Esses métodos devem ser agrupados por funcionalidade ``` __patchset() ```


## Indentação

### Comprimento da linha
-------------

Evitar linhas com mais de <code>80 caracters</code>.


### Quebra de linha
-------------

Quando uma expressão não couber em uma linha, quebre-a com os seguintes princípios
gerais:

* Quebrar depois da vírgula
* Quebrar antes do operador
* Alinhar a nova linha com o mesmo nível do início da expressão da linha anterior
* Discutir Indentação;

## Comentários

### De Linha
-------------
Deve seguir o padrão:
``` php
  // comentário
```

### Da função
-------------
Deve seguir o padrão: 
``` php
/** comentário */
```

### Do bloco
-------------
Deve seguir o padrão:
``` php
/** comentário */
```

## Declarações

### Número por linha
-------------

Uma declaração por linha é o recomendado, visto que essa abordagem incentiva a
comentar.

### Localização
-------------

Colocar a declaração das variáveis o mais próximo possível da sua utilização

### Inicialização
-------------

Inicializar variáveis locais onde são declaradas, exceto quando o valor inicial depende
de alguns cálculos que ocorrem primeiro.

### De classes
-------------

As seguintes regras devem ser seguidas:
* Sem espaço entre o nome do método e o parênteses que inicia a sua lista de parâmetros .
* Abrir colchetes “{“ aparece no final da mesma linha que o comando da declaração.
* Fecha colchetes “}” inicia em uma linha própria recuando para combinar com a abertura de colchetes da correspondente declaração, exceto quando a declaração é nula neste caso o “}” deve seguir imediatamente depois do “{“.
* Métodos devem ser separados por uma linha em branco.


### Declarações simples
-------------

Cada linha deve conter apenas uma declaração.

### Declaração return
-------------

Uma declaração return com um valor não deve usar parênteses a menos que seja uma
expressão.

### Declaração if-else, if-else-if-else
-------------

Deve seguir a seguinte forma:

``` php
  if(condicao){
  
    declaracao;
    
  }
```

``` php
   if (condição) {
   
      declaração;
      
    } else if (condição) {
    
      declaração;
      
    } else if (condição) {
    
      declaração;
      
    }
```

### Declaração for
-------------

A declaração for deve seguir a seguinte forma:
<br />
``` php
  for ( inicialização; condição; update ) {
    declaração;
  }
```


### Declaração while
-------------

A declaração while deve seguir a seguinte forma:
<br />
``` php
  while (condição) {
  
    declaração;
    
  }
```

### Declaração do-while
-------------

A declaração do-while deve seguir a seguinte forma:
<br />
``` php
  do {
  
    declaração;
    
  } while (condição);
  
```

### Declaração switch
-------------

A declaração switch deve seguir a seguinte forma:
<br />
``` php
  switch (condição) {
  
    case ABC:
    declaração;
    break;

    case DEF:
    declaração;
    break;

    case XYZ:
    declaração;
    break;

    default:
    declaração;
    break;
  }
```

### Declaração try-catch
-------------

A declaração try-catch deve seguir a seguinte forma:
<br />
``` php
  try {
  
    <strong>declaração;</strong>
    
  } catch (Exception $erro) {
  
    declaração;
    
  }

```

### Espaço em branco
-------------

Deve-se usar uma linha em branco nas seguintes situções:
* Entre métodos
* Entre as variáveis locais em um método e a sua primeira declaração
* Antes de um comentário de bloco
* Entre seções lógicas dentro de um método para melhorar sua legibilidade

Deve-se usar espaços em branco nas seguintes situações:
* Uma palavra-chave seguida por um parentese deve ser separada por um espaço em branco. Exemplo:
<br />
``` php
  while ( true ) {
  
    declaração;
    
  }
```

<strong>Nota:</strong> Um espaço em branco não deve ser utilizado entre o nome do método e a abertura do parentese. Isso ajuda a distinguir palavra chave de chamada de método.
* Um espaço em branco deve aparecer depois da vírgula em uma lista de argumentos.
* Todo operador binário exceto “.” deve ser separado de outros operadores por espaço. Espaço em branco nunca deve separar operadores unários, como incremento (``` “++” ```) e decremento (``` “--” ```).
* As expressões em uma declaração for deve ser separada por um espaço em branco.

## Convenções dos nomes

### Nomes de Variáveis, Métodos e Funções
------------

[Sugestões para novos nomes de variáveis e comentários](https://drive.google.com/folderview?id=0B9tT-j0PH4pgOUp0S3V2c2Zabzg&usp=sharing)

## Controle de Versão

### Branches
-------------

O nome das Branches deverá ser de acordo com o recurso que esta sendo corrigido, melhorado ou desenvolvido, podendo inclusive ser vinculado a determinada Issue utilizando exatamente o mesmo nome.

### Commits
-------------

REGRAS PARA COMMITS
* Os commits deverão ser dados por classe ou arquivo
* Só deverão ser dados commits de multiplos arquivos quando os mesmos contiverem arquivos estáticos do frontend (.html, .css, .js, .scss, .sass e etc)
* Devem ser evitadas adições de arquivos em lote com o comando ``` git add --all ```


### Issues
-------------

Para possíveis reparos de qualquer uma das soluções, utilizar issues para reportar estes problemas.


### Merge / Pull Request
-------------

* Todos os dias, as modificações de diretórios podem ser feitas até as 23:00
* O ``` merge ``` só poderá ser feito por 1 pessoa do grupo (Macario)
