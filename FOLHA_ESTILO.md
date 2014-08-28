Folha de Estilos
===

* [Documento em .doc](https://docs.google.com/document/d/1s6-zncL5hlHcRo-ENEUFxex-5ntJHSV2Kk-uciWX5jw/edit#)

## Cabeçalho

O código deve conter um cabeçalho no início da classe no estilo /** ... */ contendo o nome da classe, uma breve descrição da mesma e um aviso de direitos autorais.


### Declaração de pacotes
----------------

A primeira linha não comentada é a declaração do Package e o mesmo deve seguir o seguinte padrão: nome do pacote sem nenhum caracter especial, caso o nome do pacote tenha duas palavras, escreve-las juntas com a primeira letra da segunda palavra em
maiúsculo. Como segue o exemplo: <code>nomePacote</code>


### Declaração de classes e interfaces
-------------

A tabela a seguir mostra as partes de uma classe e a ordem em que devem aparecer:

Partes da declaração Classe/interface                       | -
--------------------------------------                      | -------------
Comentário de documentação da classe/interface (/** ... */) | * [Javadoc](http://www.oracle.com/technetwork/java/javase/documentation/index-jsp-135444.html)
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

Quando uma expressão não couber em uma linha, quebre-a com os seguintes princípios
gerais:

* Quebrar depois da vírgula
* Quebrar antes do operador
* Alinhar a nova linha com o mesmo nível do início da expressão da linha anterior
* ´´Discutir Indentação;´´
