# Contributing

## Quick Guide

1. [Fork](https://help.github.com/articles/fork-a-repo/) this repository to your own GitHub account and then [clone](https://help.github.com/articles/cloning-a-repository/) it to your local machine.
2. Install the dependencies (`composer install --dev`)
3. Create a new branch (`git checkout -b feat/new-feature`)
4. Write your feature or fix and make sure tests pass and code standards are met (see below)
5. Commit your changes (`git commit -m 'feat(new-feature): some feature or fix'`)
6. Push to the branch (`git push origin feat/new-feature`)
7. Open a pull request

## Working with Docker

This project provides a Docker setup that allows working on it using any of the supported PHP versions.

To use it, you first need to install:

* [Docker](https://docs.docker.com/get-docker/)
* [Docker Compose](https://docs.docker.com/compose/install/)

Make sure the versions installed support [Compose file format 3.9](https://docs.docker.com/compose/compose-file/).

You can then build the images:

```console
docker compose up --build -d
```

Now you can run commands needed to work on the project. For example, say you want to install the dependencies on PHP 8.0:

```console
docker compose run php-80 composer install
```

or for enter in the container

```console
docker compose exec php-80 sh
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

## Commit guidelines

Please see the [Conventional Commits](https://conventionalcommits.org) for commit guidelines.

## Contributors

Below the list of all contributors:

* [`@antonioturdo`](https://github.com/antonioturdo)
* [`@JellyBellyDev`](https://github.com/JellyBellyDev)
