# GeekUni_PHP-2

### Установка

```sh
$ composer install
```

### Для разработки

Available commands:

```sh
$ php shop.php cleantables
```


 * cleantables : Clean all tables
 * fixture : Here we will add some fixtures
 * generatemodel : Generate table for model
 * migrate  : Migration

Приведение кода к стандарту PSR2 при изменении файла

```sh
$ gulp
```
```sh
$ gulp default
```

Приведение кода к стандарту PSR2
```sh
$ .\vendor\bin\php-cs-fixer fix --rules=@PSR2 .\
```

### Тестирование

```sh
$ .\vendor\bin\phpunit --testdox tests
```

### Выгрузка на сервер

```sh
$ gulp deploy
```
