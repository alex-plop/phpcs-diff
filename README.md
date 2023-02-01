This is a fork of [olivertapping/phpcs-diff](https://github.com/olivertappin/phpcs-diff).

## Installation

The recommended method of installing this library is via [Composer](https://getcomposer.org/).

### Composer

#### Global Installation

Run the following command from your project root:

    composer global require alex-plop/phpcs-diff

#### Manual Installation

Alternatively, you can manually include a dependency for `alex-plop/phpcs-diff` in your `composer.json` file. For example:

```json
{
    "require-dev": {
        "alex-plop/phpcs-diff": "^0.1"
    }
}
```

And run `composer update alex-plop/phpcs-diff`.

### Git Clone

You can also download the `phpcs-diff` source and create a symlink to your `/usr/bin` directory:

    git clone https://github.com/alex-plop/phpcs-diff.git
    ln -s phpcs-diff/bin/phpcs-diff /usr/bin/phpcs-diff
    cd /var/www/project
    phpcs-diff master -v

## Usage

### Basic Usage

Compare the staged and unstaged files from the current folder to the HEAD of the branch.
```shell
phpcs-diff 
```

Compare the staged files from the current folder to the <base-branch>.
E.g. <base-branch> being master/main.

```shell
phpcs-diff <base-branch>
```

_Please note:_
- The `-v` flag is optional. This returns a verbose output during processing.
- You must have a `phpcs.xml` defined in your project base directory.

After running `phpcs-diff`, the executable will return an output similar to the following:

```
########## START OF PHPCS CHECK ##########
module/Poject/src/Console/Script.php
 - Line 28 (WARNING) Line exceeds 120 characters; contains 190 characters
 - Line 317 (ERROR) Blank line found at end of control structure
########### END OF PHPCS CHECK ###########
```

Currently this is the only supported format however, I will look into adding additional formats (much like `phpcs`) in the near future.

## About
`phpcs-diff` detects violations of a defined set of coding standards based on a `git diff`. It uses `phpcs` from the [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) project.

This project helps by achieving the following:
- Speeds up your CI/CD pipeline validating changed files only, rather than the whole code base.
- Allows you to migrate legacy code bases that cannot risk changing everything at once to become fully compliant to a coding standard.

This executable works by only checking the changed lines, compared to the base branch, against all failed violations for those files, so you can be confident that any new or changed code will be compliant.

This will hopefully put you in a position where your codebase will become more compliant to that coding standard over time, and maybe you will find the resource to eventually change everything, and just run `phpcs` on its own.

## Requirements

The latest version of `phpcs-diff` requires PHP version 5.6.0 or later.

This project also depends on `squizlabs/php_codesniffer` which is used internally to fetch the failed violations via `phpcs`.

Finally, the `league/climate` package is also installed. This is to deal with console output, but this dependency may be removed in a future release.

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) for information.
