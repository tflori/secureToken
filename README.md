# SecureToken - tflori/secure-token

[![build status](https://gitlab.w00tserver.org:617/tflori/secureToken/badges/master/build.svg)](https://gitlab.w00tserver.org:617/tflori/secureToken/commits/master)
[![Latest Stable Version](https://poser.pugx.org/tflori/secure-token/v/stable)](https://packagist.org/packages/tflori/secure-token)
[![Total Downloads](https://poser.pugx.org/tflori/secure-token/downloads)](https://packagist.org/packages/tflori/secure-token)
[![License](https://poser.pugx.org/tflori/secure-token/license)](https://packagist.org/packages/tflori/secure-token)

A helper library to generate tokens.

## Usage

```php
<?php

// generate base 36 encoded 160 bit token 
$token160 = SecureToken\Token::generate(160, 36);

// default: base 62 encoded 256 bit token
$token256 = SecureToken\Token::generate();
```
