[![Build Status](https://travis-ci.org/dariuszwrzesien/DwrGameOfLive-PHP.svg?branch=master)](https://travis-ci.org/dariuszwrzesien/DwrGameOfLive-PHP)
[![Coverage Status](https://coveralls.io/repos/github/dariuszwrzesien/DwrGameOfLive-PHP/badge.svg?branch=master)](https://coveralls.io/github/dariuszwrzesien/DwrGameOfLive-PHP?branch=master)

# Game of live

The Game of Life, also known simply as Life, is a cellular automaton devised by the British mathematician John Horton Conway in 1970.[1]

The "game" is a zero-player game, meaning that its evolution is determined by its initial state, requiring no further input. One interacts with the Game of Life by creating an initial configuration and observing how it evolves, or, for advanced "players", by creating patterns with particular properties.

##Rules

The universe of the Game of Life is an infinite two-dimensional orthogonal grid of square cells, each of which is in one of two possible states, alive or dead, or "populated" or "unpopulated" (the difference may seem minor, except when viewing it as an early model of human/urban behaviour simulation or how one views a blank space on a grid). Every cell interacts with its eight neighbours, which are the cells that are horizontally, vertically, or diagonally adjacent. At each step in time, the following transitions occur:

  -  Any live cell with fewer than two live neighbours dies, as if caused by underpopulation.
  -  Any live cell with two or three live neighbours lives on to the next generation.
  -  Any live cell with more than three live neighbours dies, as if by overpopulation.
  -  Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction.

The initial pattern constitutes the seed of the system. The first generation is created by applying the above rules simultaneously to every cell in the seed—births and deaths occur simultaneously, and the discrete moment at which this happens is sometimes called a tick (in other words, each generation is a pure function of the preceding one). The rules continue to be applied repeatedly to create further generations.




**Note:** Replace ```:author_name``` ```:author_username``` ```:author_website``` ```:author_email``` ```:vendor``` ```:package_name``` ```:package_description``` with their correct values in [README.md](README.md), [CHANGELOG.md](Php/CHANGELOG.md), [CONTRIBUTING.md](CONTRIBUTING.md), [LICENSE.md](Php/LICENSE.md) and [composer.json](Php/composer.json) files, then delete this line. You can run `$ php prefill.php` in the command line to make all replacements at once. Delete the file prefill.php as well.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require :vendor/:package_name
```

## Usage

``` php
$skeleton = new League\Skeleton();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](Php/CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [dariuszwrzesien][link-author]

## License

The MIT License (MIT). Please see [License File](Php/LICENSE.md) for more information.
