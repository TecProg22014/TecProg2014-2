Folha de Estilos
===

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

### Declaração `return`
-------------

Uma declaração return com um valor não deve usar parênteses a menos que seja uma
expressão.

### Declaração `if-else`, `if-else-if-else`
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

### Declaração `for`
-------------

A declaração for deve seguir a seguinte forma:
<br />
``` php
  for ( inicialização; condição; update ) {
    declaração;
  }
```


### Declaração `while`
-------------

A declaração while deve seguir a seguinte forma:
<br />
``` php
  while (condição) {
  
    declaração;
    
  }
```

### Declaração `do-while`
-------------

A declaração do-while deve seguir a seguinte forma:
<br />
``` php
  do {
  
    declaração;
    
  } while (condição);
  
```

### Declaração `switch`
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

### `foreach`
    
A `foreach` statement looks like the following. Note the placement of
parentheses, spaces, and braces.

```php
<?php
foreach ($iterable as $key => $value) {
    // foreach body
}
```

### Declaração `try-catch`
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

Always use <code><?php</code> to delimit PHP code. Do not use the shorthand version, <code><?</code>. PHP short tags are not enabled by default on new installations and are deprecated.

### Use PHP 5 Conventions
-------------

* Class constructors should use ``` public function __construct() {} ``` rather than the PHP 4 style class name.
* Use class destructors where appropriate.
* Explicitly declare visibility of member methods and variables (public, private, protected).
  
* Do <strong>NOT</strong> use closing tags for files containing only PHP code.
    <blockquote>
      The <code>?></code> at the end of code files is purposely omitted. This includes for module and include files. ...          Removing it eliminates the possibility for unwanted whitespace at the end of files which can cause "header             already sent" errors, XHTML/XML validation issues, and other problems.
    </blockquote>

### Indenting and Whitespace
-------------

  * Use indent of 2 spaces, no tabs.
  * Leave no trailing whitespace at the end of lines.
  * Files should be formatted with Unix line endings.

### Operators
-------------

  * Binary operators (``` +, =, !=, -, ==, >,```  etc.) should include a space before and after the operator, for readability. For instance, an assignment would be formatted as ``` $lorem = $ipsum```  rather than ``` $lorem=$ipsum``` .

  * Unary operators (``` ++, --```) should not have a space between the operator and the variable or number they are operating on.

### Casting
-------------

<p>Put a space between the (type) and the $variable in a cast: ``` (int) $mynumber``` .</p>

### Function Calls
-------------

  * Functions should be called with no spaces between the function name and the opening parenthesis.
  * No space between the opening paren and the first parameter.
  * Spaces between commas and each parameter.
  * No space between the last parameter, the closing parenthesis, and the semicolon
  *
    Here's an example:
    ``` $var = foo($bar, $apple, $peach); ```

### Arrays
-------------

  * A space should separate each element.
  * Add spaces around the => key association operator.
  * Example: ``` $arr = array('hey', 'jude', 'git' => 'commit'); ```
  * If the array spans more than 80 characters, each element should be broken up on its own line.
  * Multi-line declarations should have elements indented.

Example:
<pre>
$arr = array(
  'one' => $one,
  'two' => $two,
  'three' => $three,
  'four' => $four,
  'count' => 26
);
</pre>

### Keywords and True/False/Null

PHP [keywords] MUST be in lower case.

The PHP constants `true`, `false`, and `null` MUST be in lower case.

[keywords]: http://php.net/manual/en/reserved.keywords.php


## Namespace and Use Declarations

When present, there MUST be one blank line after the `namespace` declaration.

When present, all `use` declarations MUST go after the `namespace`
declaration.

There MUST be one `use` keyword per declaration.

There MUST be one blank line after the `use` block.

For example:

```php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

// ... additional PHP code ...

```

### Extends and Implements

The `extends` and `implements` keywords MUST be declared on the same line as
the class name.

The opening brace for the class MUST go on the same line; the closing brace
for the class MUST go on the next line after the body.

```php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements \ArrayAccess, \Countable {
    // constants, properties, methods
}
```

Lists of `implements` MAY be split across multiple lines, where each
subsequent line is indented once. When doing so, the first item in the list
MUST be on the next line, and there MUST be only one interface per line.

```php
<?php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

class ClassName extends ParentClass implements
    \ArrayAccess,
    \Countable,
    \Serializable {
    // constants, properties, methods
}
```

### `abstract`, `final`, and `static`

When present, the `abstract` and `final` declarations MUST precede the
visibility declaration.

When present, the `static` declaration MUST come after the visibility
declaration.

```php
<?php
namespace Vendor\Package;

abstract class ClassName {
    protected static $foo;

    abstract protected function zim();

    final public static function bar() {
        // method body
    }
}
```

### Method and Function Calls

When making a method or function call, there MUST NOT be a space between the
method or function name and the opening parenthesis, there MUST NOT be a space
after the opening parenthesis, and there MUST NOT be a space before the
closing parenthesis. In the argument list, there MUST NOT be a space before
each comma, and there MUST be one space after each comma.

```php
<?php
bar();
$foo->bar($arg1);
Foo::bar($arg2, $arg3);
```

Argument lists MAY be split across multiple lines, where each subsequent line
is indented once. When doing so, the first item in the list MUST be on the
next line, and there MUST be only one argument per line.

```php
<?php
$foo->bar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
```

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
