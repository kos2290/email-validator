# Email validator
Validate the list of email addresses

## Requirements
* PHP >= 7.4

## Installation
```bash
$ composer require konstantin-dmitrienko/email-validator
```

## Usage
```PHP
<?php

use KonstantinDmitrienko\EmailValidator\Email\Email;
use KonstantinDmitrienko\EmailValidator\File\File;

require 'vendor/autoload.php';

// Load file with list of emails
$emails = File::getLinesFromFile('emails.txt');

// Filter valid emails only 
$validEmails = Email::validateEmails($emails);

// Save valid emails in a new flle
File::putLinesInFile($validEmails, 'valid-emails.txt');
```

## License
[The MIT License (MIT)](LICENSE)
