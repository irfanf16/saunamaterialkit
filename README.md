# Sauna Material Kit — Workshop & Materials Platform

**Laravel 9** location-based platform for finding sauna material kits and contractors. Three-panel architecture: public website (search by location), admin panel (full system management), and a per-workshop portal.

![PHP](https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=flat&logo=php)
![Laravel](https://img.shields.io/badge/Laravel-9.x-FF2D20?style=flat&logo=laravel)
![Spatie Permissions](https://img.shields.io/badge/spatie%2Flaravel--permission-5.x-orange?style=flat)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat&logo=bootstrap)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql)

## Features

**Public Website** — Hero banner slider (Owl Carousel), location-based search ("Find material kit near you" / "Find material + Contractor"), contractors listing page.

**Admin Panel** (`/admin`)
- Workshop profiles (name, logo, address, contact, phone, zipcode)
- Products with variants (name, description, image, multiple variant SKUs)
- Services management, location hierarchy (countries/regions/cities)
- Per-workshop stock levels per product+variant
- Banner image management
- Spatie RBAC: roles, permissions, user management

**Workshop Portal** (`/workshop`)
- Workshop-scoped dashboard, roles, users
- Service offerings, holiday calendar (closure dates)
- Product + stock management

## Data Model

- `Workshop` belongs-to-many: `User`, `Service`, `Location`, `Product`
- `Product` has-many `ProductVariant`
- `WorkshopHoliday` — per-workshop closure dates with named holidays
- Spatie `roles` / `permissions` with `workshop_id` scoping

## Getting Started

```bash
composer install
cp .env.example .env && php artisan key:generate
php artisan migrate --seed && php artisan storage:link
php artisan serve
# Admin: /systemUser/login — first user gets admin role via seeder
```

## License
MIT
