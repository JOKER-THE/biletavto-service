<p align="center">
    <h1 align="center">Biletavto-service</h1>
    <br>
</p>

ОПИСАНИЕ ПРИЛОЖЕНИЯ
-------------------

Сервисный модуль для глобальной системы Biletavto.
Данный модуль реализует систему управления сервисом "Билетавто".

Модуль разработан с использованием Yii2 PHP Framework

УСТАНОВКА
-------------------

1. Выполнить git clone в консоле:
  ~~~
    $ git clone https://github.com/JOKER-THE/biletavto-service.git
  ~~~

2. Используя composer, собрать autoload и загрузить подключаемые библиотеки:
  ~~~
    $ composer install
  ~~~

3. Редактируем файл `config/db.example.php` и сохраняем его под именем `config/db.php`:

```php

define('HOST', '127.0.0.1');
define('DATABASE', 'db_biletavto_service');
define('USERNAME', 'root');
define('PASSWORD', '');
define('CHARSET', 'utf8');
```

4. Выполняем миграцию таблиц в базу данных:
  ~~~
    $ php yii migrate
  ~~~
