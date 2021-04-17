## Инструкция по развертыванию

1. Установить проект  
    `composer create-project muri9/laraform laraform`  
    `cd example-app`
1. Запустить контейнер с БД  
   `docker-compose up -d`  
   или настроить в .env подключение к своей БД
1. Выполнить миграции  
`php artisan config:clear`  
`php artisan migrate`
1. Запустить веб сервер, если требуется  
`php artisan serve`

Логин и пароль менеджера  
`manager@example.com manager-pw`  
Логин и пароль админа  
`admin@example.com admin-pw`  
Можно изменить в .env

### Что сделано:
- Установлен laravel-breeze (auth, оформленный как starter-kit) 
- Создана табличка ролей с belongsToMany через промежуточную таблицу
- В миграциях созданы пользователи admin и manager, назначены соотв. роли
- При регистрации нового пользователя назначается роль client
- Клиенты видят форму, менеджеры список заявок. Роли, права и ограничения по ТЗ.
- Админы видят дашборд со ссылками на списки пользователей, ролей, заявок, форму заявок.
  Могут назначать роли пользователям на детальной странице.

### Тестовое задание:

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
