# MatchaJob

An automated job aggregation and smart classification platform designed to collect, structure, and organize tech opportunities from multiple website sources, including Jadarat, People, and Wadhefa.

## Tech Stack

- Laravel 12
- PostgreSQL
- Docker
- n8n

## Quick Start

1. Copy the environment file and set your database password:
```bash
cp .env.example .env
```

2. Start PostgreSQL and n8n:
```bash
docker compose up -d
```

3. Set up the database and run the app:
```bash
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

4. Import `n8n/jadarat-ingestion.json` into n8n at `http://localhost:5678` and then just run it.
