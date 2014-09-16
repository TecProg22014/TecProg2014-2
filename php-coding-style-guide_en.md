PHP Style Sheet
===

## Header

The code must contain a header at the beginning of the class in the style / ** ... * / containing the class name, a brief description of it and a notice of copyright.

### Declaration of classes and interfaces
-------------

The following table shows the parts of a class and the order in which they appear:

Parts of the class / interface declaration                  | -
--------------------------------------                      | -------------
Review documentation of the class / interface (/** ... */)  | * [PHPdoc](http://www.phpdoc.org/docs/latest/index.html)
Class or interface statement                                | -
Comments implement the class / interface (/** ... */), if necessary   | This comment should contain any information not appropriate to comment documentation
Class variables (static)                                                   | First the variables public, then protected, then private.
Instance variables                                                         | First public, then protected, then private
Builders                                                                   | ``` __construct(); ```
Methods                                                                    | These methods should be grouped by functionality ``` __patchset() ```


## Indentation

### Line Length
-------------

Avoid lines longer than ``` 80 characters ```.


### Line break
-------------

When an expression will not fit on a line, break it with the following general principles:

* Break after the comma
* Break before the operator
* Align the new line to the same level at the beginning of the previous row of the expression

## Comments

### Line
-------------
Should follow the pattern:
``` php
  // comment
```

### Function
-------------
Should follow the pattern:
``` php
/** comment */
```

### Block
-------------
Should follow the pattern:
``` php
/** comment */
```

## Statements

### Number per line
-------------

One declaration per line is recommended, since this approach encourages comment.

### Location
-------------

Put the declaration of variables as close as possible to its use

### Inicialização
-------------

Initialize local variables where they are declared, except when the initial value depends on some calculations that occur first.

### Class
-------------

The rules must be followed:
* No space between the method name and the parenthesis that starts its parameter list .
* Open brackets "{" appears at the end of the same line as the command statement.
* Right square bracket "}" starts a line by itself in retreating to match the opening bracket of the corresponding statement, unless the statement is null in this case the "}" should follow immediately after the "{".
* Methods should be separated by a blank line.


### Simple Statements
-------------

Each line should contain only a statement.

### Declaration `return`
-------------

Uma declaração return com um valor não deve usar parênteses a menos que seja uma
expressão.

### Declaration `if-else`, `if-else-if-else`
-------------

Should follow the pattern:

``` php
  if( condition ){
  
    statement;
    
  }
```

``` php
   if ( condition ) {
   
      statement;
      
    } else if ( condition ) {
    
      statement;
      
    } else if ( condition ) {
    
      statement;
      
    }
```

### Declaration `for`
-------------

Should follow the pattern:
<br />
``` php
  for ( initial; condition; update ) {
    statement;
  }
```


### Declaration `while`
-------------

Should follow the pattern:
<br />
``` php
  while ( condition ) {
  
    statement;
    
  }
```

### Declaration `do-while`
-------------

Should follow the pattern:
<br />
``` php
  do {
  
    declaração;
    
  } while ( condição );
  
```

### Declaration `switch`
-------------

Should follow the pattern:
<br />
``` php
  switch ( condition ) {
  
    case ABC:
    statement;
    break;

    case DEF:
    statement;
    break;

    case XYZ:
    statement;
    break;

    default:
    statement;
    break;
  }
```

### Declaration `foreach`
    
A `foreach` statement looks like the following. Note the placement of
parentheses, spaces, and braces.

```php
<?php
foreach ( $iterable as $key => $value ) {
    // foreach body
}
```

### Declaration `try-catch`
-------------

The try-catch statement should follow the following form:
<br />
``` php
  try {
  
    statement;
    
  } catch ( Exception $erro ) {
  
    statement;
    
  }

```

### Blank
-------------

Must use a blank line in the following situations:
* Among methods
* Between the local variables in a method and its first statement
* Before a block comment
* Between logical sections inside a method to improve its readability

Must use blanks in the following situations:
* A keyword followed by a parenthesis should be separated by a blank space. example:
<br />
``` php
  while ( true ) {
  
    statement;
    
  }
```

<strong>Note:</strong> A blank space should not be used between the method name and the opening parenthesis. This helps to distinguish keyword method call.
* Um espaço em branco deve aparecer depois da vírgula em uma lista de argumentos.
* All except binary operator "." Must be separated from other operators for space. Whitespace should never separate unary operators such as increment (``` “++” ```) and decrement (``` “--” ```).
* The expressions in a for statement should be separated by a blank space.

Always use ``` <?php ``` to delimit PHP code. Do not use the shorthand version, <code><?</code>. PHP short tags are not enabled by default on new installations and are deprecated.

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

<p>Put a space between the (type) and the $variable in a cast: ``` (int) $mynumber ``` .</p>

### Function Calls
-------------

  * Functions should be called with no spaces between the function name and the opening parenthesis.
  * No space between the opening paren and the first parameter.
  * Spaces between commas and each parameter.
  * No space between the last parameter, the closing parenthesis, and the semicolon
  *
    Here's an example:
    ``` $var = foo( $bar, $apple, $peach ); ```

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

## Naming Conventions

### Variable Names, Methods and Functions
------------

[Suggestions for new variable names and comments](https://drive.google.com/folderview?id=0B9tT-j0PH4pgOUp0S3V2c2Zabzg&usp=sharing)

## Version Control

### Branches
-------------

The name of the Branches should be in accordance with the resource that is being corrected, improved or developed, and may also be linked to certain Issue using exactly the same name.

### Commits
-------------

COMMIT RULES
* Commits should be given by class or file
* Data should only be commits multiple files when they contain static files from frontend (html, css, js, .scss, .sass and etc)
* File additions should be avoided in batch with the command ``` git add --all ```


### Issues
-------------

Para possíveis reparos de qualquer uma das soluções, utilizar issues para reportar estes problemas.


### Merge / Pull Request
-------------

* Todos os dias, as modificações de diretórios podem ser feitas até as 23:00
* To request Pull Request event is not part of groups of contributors who can not make ``` push ``` the repository, wait for response to your ``` Pull Request ``` 
* The ``` merge ``` can only be done by one person in the group (Macario)
