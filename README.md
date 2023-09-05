# Code Test

This is a short code test for potential new developers. It's purely PHP command line based so requires no
servers/containers to run, just a machine with composer installed running a relatively modern PHP version.

PHP 7.3 or above will work.

#### Instructions

Install the required packages.

```shell
composer install
```

You can try running the tests to make sure everything works as it should.

```shell
composer test
```

### The App

The application is a PHP script that can recover users from a simulated users repository.

You can run the script via

```shell
composer app
```

You will see the available arguments.

```shell
composer app -- --all
```

Will show the user list as a json.

```shell
composer app -- --user 1
```

Will recover the user at index 1 in the users array.

## The task

Modify the get method of the users class so that users are found via the `id` column rather than
the array index, for example

```shell
composer app -- --user 20
```

should return the user with id = 20, not the user at index 20.

We would also like to restrict the columns that are displayed in the output JSON. You should modify the output to only
show the fields;

- id
- firstName
- lastName
- email
- phone

Modify the tests as you see fit. Any issues please get in touch. 

### Link

- [options kit](https://github.com/c9s/GetOptionKit)
- [php unit 9](https://phpunit.de/getting-started/phpunit-9.html)