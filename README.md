# Demo of a Docker Compose project with Laravel Dusk Testing

```
$ docker compose up -d
$ docker compose exec web bash
```

Then inside container:

```
$ composer install
$ artisan migrate:fresh --seed
```
