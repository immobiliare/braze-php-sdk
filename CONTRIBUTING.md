# Contributing

## Getting started

1. [Fork](https://help.github.com/articles/fork-a-repo/) this repository to your own GitHub account and then [clone](https://help.github.com/articles/cloning-a-repository/) it to your local machine.
2. Create a new branch `git checkout -b MY_BRANCH_NAME`
3. Install [composer](https://getcomposer.org/download/)


## Install the dependencies

```bash
composer install --dev
```

## Testing

To run the test use the command below:

```bash
composer test

# or if you want see the coverage

composer test-coverage-html
```


## Coding standards fixer

```bash
composer php-cs-fixer
```


## Pull Request

Please, before submitting your pull request, check whether your code adheres to coding standards and that tests are green! ;)


## Contributors

Below the list of all contributors:

* [`@antonioturdo`](https://github.com/antonioturdo)
