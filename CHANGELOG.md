# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [13.0.0] - 2026-03-27
### New Features
- [`4eb3697`](https://github.com/myerscode/laravel-api-response/commit/4eb3697b12185a032287649df808e3d5c4e3a539) - **docs**: added new changelog *(commit by [@oniice](https://github.com/oniice))*
- [`845fb1c`](https://github.com/myerscode/laravel-api-response/commit/845fb1c2133ea2fe7389e89e1fa87d0c2232cd89) - **laravel**: update to Laravel 13 and Testbench 11 *(commit by [@oniice](https://github.com/oniice))*

### Bug Fixes
- [`30f9c0e`](https://github.com/myerscode/laravel-api-response/commit/30f9c0e38552eafed26bcc48ca4afa963a0d4584) - **builder**: reset headers when calling fresh *(commit by [@oniice](https://github.com/oniice))*
- [`3f3c9c2`](https://github.com/myerscode/laravel-api-response/commit/3f3c9c2638303f452c8be4df5c3c15cad57106d0) - resolve Larastan level 8 issues *(commit by [@oniice](https://github.com/oniice))*

### Performance Improvements
- [`9b641e2`](https://github.com/myerscode/laravel-api-response/commit/9b641e2fbca41c862cbe6a6bb9dc3f49035e4c32) - **core**: added typings to contructor and methods *(commit by [@oniice](https://github.com/oniice))*

### Refactors
- [`f0c1d30`](https://github.com/myerscode/laravel-api-response/commit/f0c1d303b823c8ddc569869073480e28e7f6ac10) - modernise codebase with Rector *(commit by [@oniice](https://github.com/oniice))*
- [`c0c588a`](https://github.com/myerscode/laravel-api-response/commit/c0c588adc0930293af3c33f846d0e1b4e1e22d93) - modernise PHP and Laravel patterns *(commit by [@oniice](https://github.com/oniice))*


## Unreleased

## [11.0.0](https://github.com/myerscode/laravel-api-response/releases/tag/11.0.0) - 2024-09-15

- [`39fc324`](https://github.com/myerscode/laravel-api-response/commit/39fc324f050c3566ac10e7ab919dca910ed933a7) chore(docs): removed old change log in prep for using uplift
- [`3f36cbc`](https://github.com/myerscode/laravel-api-response/commit/3f36cbcc16df6ac21df3e81ceea32dca8d5b0efa) feat(docs): added new test and codecov badges
- [`10af37a`](https://github.com/myerscode/laravel-api-response/commit/10af37a597a4d0deccc2d8b058e3c1db6116ab06) fix(github): added missing extensions for actions
- [`9199dc4`](https://github.com/myerscode/laravel-api-response/commit/9199dc43bb2ef90c2af34fb4a98baaa788222834) feat(github): setup actions for testing and coverage
- [`b6c0ae7`](https://github.com/myerscode/laravel-api-response/commit/b6c0ae710aab76d8456e80b8d77737f80c1c25fc) fix(tests): dont track coverage reports
- [`f65f3a1`](https://github.com/myerscode/laravel-api-response/commit/f65f3a13da7c2c17c86c1c73baf614b0ffe41b99) refactor(core): updated syntax for php8 and phpunit
- [`30791d7`](https://github.com/myerscode/laravel-api-response/commit/30791d71cf0848f5af9b2b1f0cf1454bdd9b90ba) chore(core): updated dependencies for laravel 11

## [8.0.0](https://github.com/myerscode/laravel-api-response/releases/tag/8.0.0) - 2021-01-07

- [`ce9e51c`](https://github.com/myerscode/laravel-api-response/commit/ce9e51c9b528e06ca5808922eabad4bdfd47dfce) reactor: updated dependencies for php 8 compatibility

## [1.1.2](https://github.com/myerscode/laravel-api-response/releases/tag/1.1.2) - 2019-01-02

- [`11b1b55`](https://github.com/myerscode/laravel-api-response/commit/11b1b5535811003ab8c6b5fc56599368537cb878) feat: added missing method for adding header values to the response

## [1.1.1](https://github.com/myerscode/laravel-api-response/releases/tag/1.1.1) - 2018-12-19

- [`fa3326b`](https://github.com/myerscode/laravel-api-response/commit/fa3326b5ba808156412009fb21fd940d29470ad7) test: added missing test for toJson

## [1.1.0](https://github.com/myerscode/laravel-api-response/releases/tag/1.1.0) - 2018-12-11

- [`7c976a3`](https://github.com/myerscode/laravel-api-response/commit/7c976a31d2dc9a658f3cdb459435469242d6ae0b) docs: improved docs readability and examples
- [`e879630`](https://github.com/myerscode/laravel-api-response/commit/e879630172851b9b780ecec35fa901a57206d8a3) feat: added .gitignore
- [`3fb3ff0`](https://github.com/myerscode/laravel-api-response/commit/3fb3ff01c69d188304f8054429672f2af3839532) feat: added tests

## [1.0.1](https://github.com/myerscode/laravel-api-response/releases/tag/1.0.1) - 2018-08-27

- [`f6e66b8`](https://github.com/myerscode/laravel-api-response/commit/f6e66b8a7eaffda997e89c0c6798772653712d26) fix: should not track composer.lock
- [`f399613`](https://github.com/myerscode/laravel-api-response/commit/f39961388fef01b285fe34248f1f692a3c191f86) chore: added badges to readme

## [1.0.0.1](https://github.com/myerscode/laravel-api-response/releases/tag/1.0.0.1) - 2018-05-10

- [`66c31b9`](https://github.com/myerscode/laravel-api-response/commit/66c31b9256ec1e941262bffd1cb83cf541721048) docs: added info about what the package actually does
- [`49d1530`](https://github.com/myerscode/laravel-api-response/commit/49d15300bbd21c3dad05a0fb8beb7d803301787d) docs: added .md to licence file and referenced in readme
- [`05de5fa`](https://github.com/myerscode/laravel-api-response/commit/05de5fa6271f39770642ca984629ed0e9b1242e4) docs: corrected package name on install instructions

## [1.0.0](https://github.com/myerscode/laravel-api-response/releases/tag/1.0.0) - 2018-05-08

- [`424c435`](https://github.com/myerscode/laravel-api-response/commit/424c43564af6f3408de7139faa9304116b15e0ae) docs: added usage example
- [`cd6933d`](https://github.com/myerscode/laravel-api-response/commit/cd6933dd348124ddb5d80be02e0b80626ad6c8c9) created package
[13.0.0]: https://github.com/myerscode/laravel-api-response/compare/11.0.0...13.0.0
