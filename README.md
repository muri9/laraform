### manuals
https://cli.github.com/manual/  
https://laravel.com/docs/8.x#installation-via-composer  
https://laravel.com/docs/8.x/authentication  
https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose-ru
https://dev.to/zaxwebs/implementing-simple-role-based-authorization-in-laravel-8-using-gates-1n44
https://tokmakov.msk.ru/blog/tags/314

### used commands

`php artisan migrate`  
`php artisan migrate:rollback`  
`php artisan make:model Role`  
`php artisan make:migration migration_name`  
`php artisan make:model Claim -mcr`  
`php artisan make:seeder ClaimsTableSeeder`  
`php artisan db:seed --class=ClaimsTableSeeder`  
`php artisan migrate:refresh --seed`  
`php artisan make:factory ClaimFactory --model=Claim`  
`php artisan config:cache`

### deploy
install vendors `composer install`  
run mysql docker `docker-compose up -d`  
migrate `php artisan migrate`  
run web `php artisan serve`
##Тестовое задание:

Необходимо реализовать форму обратной связи на Laravel или Yii2:

-регистрация\авторизация: стандартный модуль auth (но пользователи должны быть с двумя
ролями: менеджер и клиент.
Клиенты регистрируются самостоятельно, а аккаунт менеджера должен быть создан заранее,
логин и пароль выслать вместе с готовым заданием)
-после логина, клиент видит форму обратной связи, а менеджер список заявок. (все страницы
и функционал доступны только авторизованным пользователям и только в соответствии с их
привилегиями)
-менеджер может просматривать список заявок и отмечать те, на которые ответил.
-список заявок:
ID, тема, сообщение, имя клиента, почта клиента, ссылка на прикрепленный файл, время
создания

-клиент может оставлять заявку, но не чаще раза в сутки.

-на странице создания заявки: тема и сообщение.

На вёрстку внимание обращаться не будет, важно оформление кода, использование фич php7+
и возможностей фреймворка.

Ожидаем от Вас ссылку на репозиторий Github, в readme.md выполнить инструкцию по
развёртыванию проекта.

https://drive.google.com/file/d/1wMvKipNawvu8zHc577Z_sijMv97BZhuj/view













<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
