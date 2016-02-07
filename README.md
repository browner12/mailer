# Mailer

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package provides a convenient consistent way to send emails from your Laravel application.

## Install

Via Composer

``` bash
$ composer require browner12/mailer
```

## Generator

Generate a mailer using the artisan command. A good practice is to group models together. For example, a mailer for users and a mailer for events.

``` sh
php artisan make:mailer UserMailer
```

## Setup

Create a method within your mailer. The following method will be used to send a confirmation email when a user signs up.

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

## Usage

To send a signup email, we will instantiate our `UserMailer`.
Then call the specific method of the email you would like to send.
Finally, you can use either the `send()` or `view()` method, depending on if you are testing or actually sending emails.

``` php
$mailer  = new UserMailer();
$mailer->signup()->send();
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
