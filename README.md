# Brackets Checker CLI Application

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/MaxVoronov/brackets-app/master.svg?style=flat)](https://travis-ci.org/MaxVoronov/brackets-app)
[![Codacy grade](https://img.shields.io/codacy/grade/2ec38d8e738545b1835c744104060535.svg?style=flat)]()

Simple CLI application for brackets checking.

## Usage
The Application provide two commands: `check:line` and `check:file`.
You can run checker using:
```
php bin/console check:line '(())()'
php bin/console check:file data/example.txt
```

## Testing
```
composer test
```

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.