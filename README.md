<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## setup project

1. run following command in root of project [news-sample]
    1. systemctl start docker
    2. ./vendor/bin/sail up -d
    3. ./vendor/bin/sail root-shell
    4. sudo chmod -R 777 storage
    5. sudo chmod -R 777 bootstrap
    6. php artisan cache:clear
    7. php artisan db:seed --class=NewsSeeder
    8. php artisan db:seed --class=CommentSeeder
2. all request base url is http://localhost
3. all routes exist in web.php


# sample output

![](storage/app/public/screenshots/Screenshot from 2023-07-16 14-33-14.png)
