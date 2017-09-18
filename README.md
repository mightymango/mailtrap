# MailTrap
![Version](https://img.shields.io/badge/version-1.0.1-green.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)
![Kirby Version](https://img.shields.io/badge/Kirby-2.4%2B-red.svg)

A [Kirby](http://getkirby.com) email service for [MailTrap](https://mailtrap.io)

## Installation

### 1. Kirby CLI

If you are using the [Kirby CLI](https://github.com/getkirby/cli) you can install this plugin by running the following command in your shell from the root folder of your Kirby installation:

```
kirby plugin:install mightymango/mailtrap
```

### 2. Manual
[Download this archive](https://github.com/mightymango/mailtrap/archive/1.0.0.zip), extract it and rename it to `mailtrap`. Copy the folder to your `site/plugins` folder.

### 3. Git Submodule
If you know your way around git, you can download this as a submodule:

```
git submodule add https://github.com/mightymango/mailtrap/ site/plugins/mailtrap
```

## Usage
To use this mail service add the following to your config.php file:

```
c::set('mailtrap.host', 'smtp.mailtrap.io');
c::set('mailtrap.port', 2525);
c::set('mailtrap.username', "<Your username>");
c::set('mailtrap.password', "<Your password>");
```

To send emails using MailTrap, set `mailtrap` as the email service:

```php
$email = email(array(
  'service' => 'mailtrap',
  'to'      => 'peter@example.com',
  'from'    => 'johndoe@email.com',
  'subject' => 'Sending emails with Kirby is easy',
  'body'    => 'Hey! This was really easy!'
));

if($email->send()) {
  echo 'The email has been sent';
} else {
  echo $email->error();
}
```

## Note
Currently this service will only accept email addresses formated as `peter@example.com`.

Emails using an address such as `Peter <peter@example.com>` will fail.


## Credits
Readme file based on template by [Thiousi](https://github.com/Thiousi/kirby-plugin-starterkit)

Uses [PHPMailer](https://github.com/PHPMailer/PHPMailer) to send.

## License
MIT

## Changelog
### 1.0.0
- Initial release
