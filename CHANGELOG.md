# Changelog

All notable changes to `browner12\mailer` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## [UNRELEASED]

## [1.1.1] - 2016-05-15

### Fixed
- `unset`ing a class property can have unintended effects. instead we set 'name' and 'email properties to null to ensure we do not send multiple times to the same recipient.

## [1.1.0] - 2016-03-27

### Added
- configuration option to set where new mailers are created

## 1.0.0 - 2016-02-19

### Added
- new mailer package

[unreleased]: https://github.com/browner12/mailer/compare/v1.1.1...HEAD
[1.1.1]: https://github.com/browner12/mailer/compare/v1.1.0...v1.1.1
[1.1.0]: https://github.com/browner12/mailer/compare/v1.0.0...v1.1.0
