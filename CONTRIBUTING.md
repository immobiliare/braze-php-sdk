# Contributing

1. [Fork](https://help.github.com/articles/fork-a-repo/) this repository to your own GitHub account and then [clone](https://help.github.com/articles/cloning-a-repository/) it to your local machine.
2. Install the dependencies (`composer install --dev`)
3. Create a new branch (`git checkout -b feat/new-feature`)
4. Write your feature or fix and make sure tests pass and code standards are met (see below)
5. Commit your changes (`git commit -m 'feat(new-feature): some feature or fix'`)
6. Push to the branch (`git push origin feat/new-feature`)
7. Open a pull request


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

## Contributors

Below the list of all contributors:

* [`@antonioturdo`](https://github.com/antonioturdo)
* [`@JellyBellyDev`](https://github.com/JellyBellyDev)
