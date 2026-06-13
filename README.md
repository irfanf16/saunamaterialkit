# SaunaMaterialKit — Sauna Products eCommerce & Workshop Management

> **Laravel 9** dual-panel management platform for sauna material products and workshops. A super-admin panel manages the product catalog, locations, and workshops platform-wide; workshop managers run their own staff, services, inventory, and schedules through a dedicated panel. Backed by Spatie RBAC with per-workshop role scoping.

![Laravel](https://img.shields.io/badge/Laravel-9-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.0-777BB4?style=flat-square&logo=php&logoColor=white)
![Spatie](https://img.shields.io/badge/Spatie_RBAC-5.5-red?style=flat-square)

---

## Tech Stack

| Package | Version | Purpose |
|---|---|---|
| `laravel/framework` | ^9.0 | Core framework |
| `spatie/laravel-permission` | ^5.5 | Per-workshop RBAC |
| `yajra/laravel-datatables-oracle` | ^9.0 | Server-side admin data tables |
| `laravelcollective/html` | ^6.3 | Blade form helpers |
| `realrashid/sweet-alert` | ^5.1 | Confirmation dialogs |
| `laravel/sanctum` | ^3.0 | API auth |
| `mashape/unirest-php` | ^3.0 | HTTP client |

---

## Dual-Panel Architecture

```
/systemUser/login    — Shared login
/admin/*             — Super-admin panel (platform-wide management)
/workshop/*          — Workshop owner panel (own operation only)
```

---

## Route Structure

**Super Admin (`/admin/*`, auth):**
Dashboard, Roles, Users, Services, Workshops, Locations, Products, Stock, Banners

**Workshop Panel (`/workshop/*`, auth):**
Dashboard, Roles, Users, Services, Holidays, Products

---

## Database Schema

| Table | Key Columns |
|---|---|
| `workshops` | id, name, logo, address, contact_person, phone_no |
| `services` | id, name (sauna service types) |
| `workshop_services` | workshop_id, service_id |
| `locations` | id, name |
| `location_cities` | id, location_id, name |
| `workshop_locations` | workshop_id, location_id |
| `products` | id, name, description, image (sauna materials catalog) |
| `product_variants` | id, product_id, variant attributes |
| `workshop_products` | workshop_id, product_id (per-workshop inventory) |
| `workshop_holidays` | id, workshop_id, date |
| `banners` | id, title, image, status |
| `users` | id, name, email, password, user_type, workshop_id |
| `roles` + Spatie tables | workshop_id column for per-workshop scoping |

---

## Key Features

- **Per-workshop RBAC** — roles scoped by `workshop_id`; each workshop manages its own staff independently
- **Location hierarchy** — state/region → city; coverage areas configurable per workshop
- **Service catalog** — platform-defined service types; workshops opt in
- **Workshop inventory** — global product catalog, per-workshop stock via `workshop_products`
- **Holiday calendar** — workshops configure closure dates
- **Yajra DataTables** — all listings are server-side AJAX paginated
- **SweetAlert2** — destructive action confirmation dialogs

---

## Getting Started

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
