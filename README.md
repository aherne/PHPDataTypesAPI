# PHPDataTypesAPI

The purpose of Data Types API is to encapsulate native PHP functions that work on primitive data types (eg: strings, arrays) into a PHP-language OOP construct (which automatically means we are using option #2) that brings order into chaos while suffering as little as possible from slowness induced by inherent function calls that involve the encapsulation process.

The way Data Types API is designed is roughly similar to the model Java uses to map primitives to a class (a 1:1 mapping, meaning a primitive such as “int” will only be mapped by one class such as “Integer”) and delegate high-level operations (such as looking for a character position in a string) to that class. In Java and even more so in PHP, this brings an inherent performance decrease (it’s always faster to use primitives, no matter the language) and classes only should be used for complex operations.

In addition of mapping primitives to classes, Data Types API also introduces new data types that either extend on primitive-mapping ones (Set/Map/List >> Collection) or provide handy implementations for data types one encounters while working with databases (Date, Time, Timestamp), which is what the vast majority of PHP programmers do.

Full documentation here:

https://docs.google.com/document/d/1RO2r_1wxH6yJQ6LGouk-6VlgsLrT8ZnXD9RcQ0Iw3xk/edit#