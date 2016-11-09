# SecureToken - tflori/secure-token

A helper library to generate tokens.

## Usage

```php
<?php

// generate base 36 encoded 160 bit token 
$token160 = SecureToken\Token::generate(160, 36);

// default: base 62 encoded 256 bit token
$token256 = SecureToken\Token::generate();
```
