# IP geo locator

## Тестирование

### Предварительные требования

На компьютере/сервере должны быть установлены:

- Docker
- Docker compose

### Билд проекта (производится только при первом запуске)
```bash
docker-compose up build
```

### Запуск проекта
```bash
docker-compose up -d
```

Запускаем тесты:
```bash
docker-compose exec app ./vendor/bin/phpunit tests
```