# SecureToken - tflori/secure-token

[![Build Status](https://travis-ci.org/tflori/secureToken.svg?branch=master)](https://travis-ci.org/tflori/secureToken)
[![Coverage Status](https://coveralls.io/repos/github/tflori/secureToken/badge.svg?branch=master)](https://coveralls.io/github/tflori/secureToken?branch=master)
[![Latest Stable Version](https://poser.pugx.org/tflori/secure-token/v/stable.svg)](https://packagist.org/packages/tflori/secure-token)
[![Total Downloads](https://poser.pugx.org/tflori/secure-token/downloads.svg)](https://packagist.org/packages/tflori/secure-token)
[![License](https://poser.pugx.org/tflori/secure-token/license.svg)](https://packagist.org/packages/tflori/secure-token)

A helper library to generate tokens.

## Usage

```php
<?php

// generate base 36 encoded 160 bit token 
$token160 = SecureToken\Token::generate(160, 36);

// default: base 62 encoded 256 bit token
$token256 = SecureToken\Token::generate();
```
