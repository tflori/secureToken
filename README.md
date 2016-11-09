# SecureToken - tflori/secure-token

[![build status](https://gitlab.w00tserver.org:617/tflori/secureToken/badges/master/build.svg)](https://gitlab.w00tserver.org:617/tflori/secureToken/commits/master)
[![Latest Stable Version](https://poser.pugx.org/tflori/secureToken/v/stable)](https://packagist.org/packages/tflori/secureToken)
[![Total Downloads](https://poser.pugx.org/tflori/secureToken/downloads)](https://packagist.org/packages/tflori/secureToken)
[![License](https://poser.pugx.org/tflori/secureToken/license)](https://packagist.org/packages/tflori/secureToken)

A helper library to generate tokens.

## Usage

```php
<?php

// generate base 36 encoded 160 bit token 
$token160 = SecureToken\Token::generate(160, 36);

// default: base 62 encoded 256 bit token
$token256 = SecureToken\Token::generate();
```
