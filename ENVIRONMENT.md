# Список переменных проекта

## Обязательные

| Имя | Значение | Описание |
| ------------              | ----------- | ----------- |
| APP_ENV                   | production                | Окружение для работы приложения (staging, development, testing) |
| APP_DOMAIN                | rest.chocodev.kz          | Домен на котором запущено приложение |
| APP_KEY                   | -                         | Ключ приложения используется для всех зашифрованных данных в laravel |
| APP_URL                   | http://localhost          | Используется в емайлах, в фоновых задачах и прочем где прриложение не способно самостоятельно определить свой url |
| APP_URL_BASE_PATH         | larabase                  | Базовый путь для http запросов |

## Не обязательные

| Имя | Значение | Описание |
| ------------              | ----------- | ----------- |
| APP_NAME                  | Laravel                   | Название проекта |
| APP_DEBUG                 | true                      | Показывать debug информацию или скрывать |
| LOG_CHANNEL               | stack                     | Куда и как логировать |
| DB_CONNECTION             | pgsql                     | Соеденение с БД по умолчанию |
| DB_HOST                   | 127.0.0.1                 | БД Хост |
| DB_PORT                   | 5432                      | БД Порт |
| DB_DATABASE               | homestead                 | Название БД |
| DB_USERNAME               | homestead                 | Логин |
| DB_PASSWORD               | secret                    | Пароль |
| BROADCAST_DRIVER          | log                       | Куда посылать broadcast события |
| CACHE_DRIVER              | file                      | Куда кешировать |
| QUEUE_CONNECTION          | sync                      | Где лежат очереди |
| AWS_ACCESS_KEY_ID         |                           | S3 |
| AWS_SECRET_ACCESS_KEY     |                           | S3 |
| AWS_DEFAULT_REGION        | us-east-1                 | S3 |
| AWS_BUCKET                |                           | S3 |
| PUSHER_APP_ID             |                           |  |
| PUSHER_APP_KEY            |                           |  |
| PUSHER_APP_SECRET         |                           |  |
| PUSHER_APP_CLUSTER        | mt1                       |  |
| SENTRY_LARAVEL_DSN        | https://<key>@sentry.choco.kz/<project> | Подключение к Sentry |
| PINBA_DESTINATION         | null                      | Set's where pinba will send the data. Possible values are "pinba", "file", "null" |
| PINBA_HOSTNAME            | null                      | Set custom hostname instead of the result of gethostname() used by default. |
| PINBA_SERVERNAME          | null                      | Set custom server name instead of $_SERVER['SERVER_NAME'] used by default. |
| PINBA_SCHEMA              | null                      | Set request schema (HTTP/HTTPS/whatever). |