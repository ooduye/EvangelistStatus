# Evangelist Status

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

An agnostic package that grades Github users based on the number of open source projects they own

## Install

Via Composer

``` bash
$ composer require ooduye/evangelist-status
```

## Usage

``` php
$skeleton = new League\EvangelistStatus();
echo $skeleton->getStatus("Github Username");
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email oluwayemisioduye@gmail.com instead of using the issue tracker.

## Credits

- Oduye Oluwayemisi

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ooduye/evangeliststatus.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/andela-ooduye/EvangelistStatus/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephpleague/evangeliststatus.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephpleague/evangeliststatus.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ooduye/evangeliststatus.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/ooduye/evangeliststatus
[link-travis]: https://travis-ci.org/andela-ooduye/EvangelistStatus
[link-scrutinizer]: https://scrutinizer-ci.com/g/thephpleague/evangeliststatus/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/thephpleague/evangeliststatus
[link-downloads]: https://packagist.org/packages/ooduye/evangeliststatus
[link-author]: https://github.com/andela-ooduye
[link-contributors]: ../../contributors