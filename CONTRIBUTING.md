#A quick guide to contribute to the project:

##Installing the dev environment

1.  Fork the repo
2.  Clone the repo to local
3.  Install dependencies: `composer install` (this assumes you have 'composer' aliased to whereever your composer.phar lives)
4.  Run the tests. We only take pull requests with passing tests, and it's great to know that you have a clean slate:
    `./bin/phpspec run --format=pretty`

##The actual contribution

1.  Make the changes/additions to the code, committing often and making clear what you've done
2.  Make sure you write tests for your code, located in the folder structure `spec/Coduo/PHPHumanizer/...`
3.  Run your tests (often and while coding): `./bin/phpspec run --format=pretty`

##Coding Standards

Try use similar coding standards to what you see in the project to keep things clear to the contributors. If you're unsure, it's always a safe bet to fall-back to the PSR standards.

[PSR-1: Basic Coding Standard](http://www.php-fig.org/psr/psr-1/)

[PSR-2: Coding Style Guide](http://www.php-fig.org/psr/psr-2/)
