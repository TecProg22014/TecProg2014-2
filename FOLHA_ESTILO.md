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
Métodos                                                                        | Esses métodos devem ser agrupados por funcionalidade <code>__patchset()</code>


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

### Da função
-------------
Deve seguir o padrão: <code>/** comentário */</code>

### Do bloco
-------------
Deve seguir o padrão: <code>/** comentário */</code>

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

<code>
  if(condicao){
  
    declaracao;
    
  }
</code>

<code>
   if (condição) {
   
      declaração;
      
    } else if (condição) {
    
      declaração;
      
    } else if (condição) {
    
      declaração;
      
    }
</code>

### Declaração for
-------------

A declaração for deve seguir a seguinte forma:
<code>
  for (inicialização; condição; update) {
    declaração;
  }
</code>


### Declaração while
-------------

A declaração while deve seguir a seguinte forma:
<code>
  while (condição) {
  
    declaração;
    
  }
</code>

### Declaração do-while
-------------

A declaração do-while deve seguir a seguinte forma:
<code>
  do {
  
    declaração;
    
  } while (condição);
  
</code>

### Declaração switch
-------------

A declaração switch deve seguir a seguinte forma:
<br />
<code>
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
</code>

### Declaração try-catch
-------------

A declaração try-catch deve seguir a seguinte forma:
<br />
<code>
  try {
  
    <strong>declaração;</strong>
    
  } catch (Exception $erro) {
  
    declaração;
    
  }

</code>

### Espaço em branco
-------------

Deve-se usar uma linha em branco nas seguintes situções:
* Entre métodos
* Entre as variáveis locais em um método e a sua primeira declaração
* Antes de um comentário de bloco
* Entre seções lógicas dentro de um método para melhorar sua legibilidade

Deve-se usar espaços em branco nas seguintes situações:
* Uma palavra-chave seguida por um parentese deve ser separada por um espaço em branco. Exemplo:

<code>
  while ( true ) {
  
    declaração;
    
  }
</code>

<strong>Nota:</strong> Um espaço em branco não deve ser utilizado entre o nome do método e a abertura do parentese. Isso ajuda a distinguir palavra chave de chamada de método.
* Um espaço em branco deve aparecer depois da vírgula em uma lista de argumentos.
* Todo operador binário exceto “.” deve ser separado de outros operadores por espaço. Espaço em branco nunca deve separar operadores unários, como incremento (<code>“++”</code>) e decremento (<code>“--”</code>).
* As expressões em uma declaração for deve ser separada por um espaço em branco.

## Convenções dos nomes
