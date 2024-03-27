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

## Key Takeaways

- A single Docker Compose environment local **development** and **testing**
- selenium included and brought up by default
- `web` container serves local development web requests AND testing web requests
  - `web` service also response to `web.testing` internally
  - dusk tests will internally talk to `web.testing`, which will instruct
    the `web` container to switch databases to the `testing` database
    - handled inside the `TestingMiddleware`
- A `testing` database that the normal database user has access to
- A dusk environment:
  - dusk environment is configuration-less (controlled in `DuskTestCase`)
  - can be executed by `artisan dusk` or `phpunit` directly
