# GeekUni_PHP-2

### Установка

```sh
$ composer install
```

### Для разработки

Available commands:

 * cleantables : Clean all tables
 * fixture : Here we will add some fixtures
 * generatemodel : Generate table for model
 * migrate  : Migration


Приведение кода к стандарту PSR2
```sh
$ .\vendor\bin\php-cs-fixer fix --rules=@PSR2 .\
```

### Выгрузка на сервер

```sh
$ gulp deploy
```
