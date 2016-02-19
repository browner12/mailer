# Mailer

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package provides a convenient consistent way to send emails from your Laravel application.

## Install

``` bash
$ composer require browner12/mailer
```

## Setup

Add the service provider to the providers array in  `config/app.php`.

``` php
'providers' => [
    browner12\mailer\MailerServiceProvider::class,
];
```

## Publishing

You can publish everything at once

``` php
php artisan vendor:publish --provider="browner12\mailer\MailerServiceProvider"
```

or you can publish groups individually.

``` php
php artisan vendor:publish --provider="browner12\mailer\MailerServiceProvider" --tag="config"
```

## Usage

Use Artisan to generate a new validator.

``` sh
php artisan make:mailer UserMailer
```

Create a method within your mailer for every unique email. The following method will be used to send a confirmation email when a user signs up.

``` php
method signup($user)
{
    $this->name = $user->name;
    $this->email = $user->email;
    $this->subject = 'Signup Confirmation';
    $this->data = [
        'user' => $user,
    ];
}
```

To use the mailer, start by instantiating it. Next, setup the email by calling the method of the email you wish to send. If your method requires parameters, pass them in. Finally, chain the `send()` method to send the email.

``` php
$mailer = new UserMailer();

$mailer->signup($user)->send();
```

You may also simply render the email output.

``` php
echo $mailer->signup($user)->view();
```

## Queuing

By default, emails will be queued when you call the `send()` method. To send out emails synchronously, call `sendSynchronously()` instead.

``` php
$mailer->signup($user)->sendSynchronously();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email browner12@gmail.com instead of using the issue tracker.

## Credits

- [Andrew Brown][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/browner12/mailer.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/browner12/mailer/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/browner12/mailer.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/browner12/mailer.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/browner12/mailer.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/browner12/mailer
[link-travis]: https://travis-ci.org/browner12/mailer
[link-scrutinizer]: https://scrutinizer-ci.com/g/browner12/mailer/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/browner12/mailer
[link-downloads]: https://packagist.org/packages/browner12/mailer
[link-author]: https://github.com/browner12
[link-contributors]: ../../contributors
