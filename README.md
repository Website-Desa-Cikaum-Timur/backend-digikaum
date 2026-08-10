<div align="center">

<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320" alt="Laravel Logo" />

# backend-digikaum

**RESTful API & Admin Panel — Website Desa Cikaum Timur**

[![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)
[![Filament](https://img.shields.io/badge/Filament-5.x-FDAE4B?logo=filament&logoColor=white)](https://filamentphp.com/)
[![PostgreSQL](https://img.shields.io/badge/PostgreSQL-PostGIS-336791?logo=postgresql&logoColor=white)](https://postgis.net/)
[![Tests](https://img.shields.io/badge/Tests-Pest%20PHP-brightgreen?logo=php)](https://pestphp.com/)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

*Backend monolith powering the digital governance platform for Desa Cikaum Timur — serving a public-facing REST API and a full-featured Filament admin panel with granular RBAC.*

</div>

---

## Table of Contents

- [Overview](#overview)
- [Architecture](#architecture)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Prerequisites](#prerequisites)
- [Getting Started](#getting-started)
- [Environment Configuration](#environment-configuration)
- [Database](#database)
- [API Reference](#api-reference)
- [Admin Panel](#admin-panel)
- [Roles & Permissions](#roles--permissions)
- [Testing](#testing)
- [Code Quality](#code-quality)
- [API Documentation](#api-documentation)
- [Deployment](#deployment)
- [Project Structure](#project-structure)
- [Contributing](#contributing)
- [Security](#security)

---

## Overview

`backend-digikaum` is the server-side backbone of the **DigiKaum** platform — a digital government portal for Desa Cikaum Timur. It exposes a versioned RESTful API (consumed by the public-facing frontend) and a Filament-powered admin dashboard used by village staff to manage content, residents, complaints, and public services.

The application follows a **Service–Repository** layered architecture, built on Laravel 13 with PHP 8.3, and uses **PostgreSQL + PostGIS** for relational data and geospatial location management.

---

## Architecture

```
┌────────────────────────────────────────────────────────────┐
│                     Client Layer                           │
│           Frontend SPA           Filament Admin            │
│        (React / Vite)           (Internal Staff)           │
└────────────────┬───────────────────────┬───────────────────┘
                 │ REST API (v1)         │ Web Panel
┌────────────────▼───────────────────────▼───────────────────┐
│                     Laravel Application                     │
│                                                             │
│  ┌───────────┐  ┌───────────┐  ┌────────────────────────┐  │
│  │   Routes  │  │  Filament │  │   Middleware Stack     │  │
│  │  api.php  │  │  Panel    │  │  (Sanctum, CORS, etc.) │  │
│  └─────┬─────┘  └─────┬─────┘  └────────────────────────┘  │
│        │              │                                      │
│  ┌─────▼──────────────▼──────────────────────────────────┐  │
│  │                HTTP Controllers (API)                  │  │
│  │  Complaint · Demographic · Gallery · Location · Post   │  │
│  │  Official · Organization · PostCategory · Product      │  │
│  └──────────────────────┬────────────────────────────────┘  │
│                         │                                    │
│  ┌──────────────────────▼────────────────────────────────┐  │
│  │               Service Layer                           │  │
│  │  Business logic, validation orchestration,            │  │
│  │  state transitions (Spatie Model States)              │  │
│  └──────────────────────┬────────────────────────────────┘  │
│                         │                                    │
│  ┌──────────────────────▼────────────────────────────────┐  │
│  │            Repository Layer (Eloquent)                 │  │
│  │  Implements RepositoryInterface per domain entity.     │  │
│  │  Query filtering via Spatie Query Builder.             │  │
│  └──────────────────────┬────────────────────────────────┘  │
│                         │                                    │
│  ┌──────────────────────▼────────────────────────────────┐  │
│  │             Data / Infrastructure Layer                │  │
│  │  PostgreSQL + PostGIS · Spatie Media Library           │  │
│  │  Spatie Activity Log · Laravel Queue · File Storage    │  │
│  └────────────────────────────────────────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
```

---

## Features

### Public API
- **Berita (News)** — CRUD for village news articles with slug-based routing, category filtering, and publication status workflow.
- **Kategori Berita** — Hierarchical post categories for news classification.
- **Profil Pemerintahan** — Organization units and their officials with structured SOTK (org-chart) data.
- **Pengaduan (Complaints)** — Anonymous complaint submission with auto-generated tracking codes; public tracking endpoint and admin status management.
- **Pemetaan (Locations)** — GIS-backed location registry using PostGIS geometry, supporting map integrations.
- **Demografi** — Resident and family registry with aggregate demographic statistics endpoint.
- **UMKM (Products)** — Local SME product catalog with image media support.
- **Galeri** — Photo gallery management with year-based browsing and category filters.

### Admin Panel (Filament)
- Fully responsive admin dashboard with stats overview widget.
- Per-resource CRUD with inline relation managers (e.g., residents within a family card, officials within an organization).
- Map picker component for location geometry input (via `dotswan/filament-map-picker`).
- Rich-text content editor for posts, with featured image uploads.
- Granular RBAC enforced at the panel level via Filament Shield.

### Platform
- **ULID** primary keys across all domain models (URL-safe, lexicographically sortable).
- **Activity logging** on all model mutations via Spatie Activity Log.
- **Media management** (disk-agnostic, conversion-ready) via Spatie Media Library.
- **Model state machine** for complaint status lifecycle (Spatie Model States).
- **API Resources** for consistent, versioned JSON response shaping.

---

## Tech Stack

| Layer | Technology | Version |
|---|---|---|
| Language | PHP | ^8.3 |
| Framework | Laravel | ^13.8 |
| Admin Panel | Filament | ^5.7 |
| Database | PostgreSQL + PostGIS | — |
| Authentication | Laravel Sanctum | ^4.0 |
| RBAC | Spatie Permission + Filament Shield | ^8.3 / ^4.3 |
| Media | Spatie Media Library | ^11.23 |
| Activity Log | Spatie Activity Log | ^5.0 |
| Model States | Spatie Model States | ^2.14 |
| Query Filtering | Spatie Query Builder | ^7.3 |
| GIS / Spatial | matanyadaev/laravel-eloquent-spatial | ^4.8 |
| API Docs | Knuckles Scribe | ^5.11 |
| Testing | Pest PHP + pest-plugin-laravel | ^4.7 |
| Static Analysis | Larastan | ^3.10 |
| Code Style | Laravel Pint | ^1.27 |

---

## Prerequisites

Ensure the following are installed before proceeding:

| Tool | Minimum Version |
|---|---|
| PHP | 8.3 |
| Composer | 2.x |
| Node.js | 20.x LTS |
| npm | 10.x |
| PostgreSQL | 15+ (with PostGIS extension) |

**Enable PostGIS** on your PostgreSQL instance:

```sql
CREATE EXTENSION IF NOT EXISTS postgis;
```

---

## Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/Website-Desa-Cikaum-Timur/backend-digikaum.git
cd backend-digikaum
```

### 2. One-Command Setup

A `setup` composer script is provided for rapid bootstrapping:

```bash
composer setup
```

This script sequentially runs:
- `composer install`
- Copies `.env.example` → `.env` (if not present)
- `php artisan key:generate`
- `php artisan migrate --force`
- `npm install && npm run build`

### 3. Manual Setup (Alternative)

If you prefer step-by-step control:

```bash
# Install PHP dependencies
composer install

# Copy environment file and generate app key
cp .env.example .env
php artisan key:generate

# Configure your database in .env, then:
php artisan migrate
php artisan db:seed          # Seed roles, permissions, and demo data

# Install & compile frontend assets (Filament panel)
npm install
npm run build
```

### 4. Start Development Server

```bash
composer dev
```

This starts a concurrent development environment using `concurrently`:

| Process | Description |
|---|---|
| `php artisan serve` | Laravel dev server |
| `php artisan queue:listen` | Queue worker |
| `php artisan pail` | Real-time log viewer |
| `npm run dev` | Vite asset server |

---

## Environment Configuration

Copy `.env.example` to `.env` and update the following critical variables:

```dotenv
# Application
APP_NAME="DigiKaum Backend"
APP_ENV=production          # local | staging | production
APP_KEY=                    # Generated via php artisan key:generate
APP_URL=https://api.your-domain.id

# Database (PostgreSQL required)
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=digikaum
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

# Filesystem (local or s3)
FILESYSTEM_DISK=local       # Use 's3' for production media storage

# Queue (use 'redis' in production)
QUEUE_CONNECTION=database

# Cache (use 'redis' in production)
CACHE_STORE=database

# AWS S3 (if FILESYSTEM_DISK=s3)
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=ap-southeast-1
AWS_BUCKET=digikaum-media
```

> **Important:** Never commit `.env` to version control. The `.gitignore` already excludes it.

---

## Database

### Migrations

All migrations are located in `database/migrations/`. Key tables:

| Migration | Domain |
|---|---|
| `enable_postgis_extension` | Enables PostGIS spatial functions |
| `create_permission_tables` | Spatie RBAC (roles, permissions, model_has_roles) |
| `create_media_table` | Spatie Media Library |
| `create_activity_log_table` | Audit trail |
| `create_post_categories_table` | Kategori berita |
| `create_organizations_table` | Organisasi pemerintah |
| `create_officials_table` | Pejabat desa |
| `create_posts_table` | Artikel berita |
| `create_locations_table` | Lokasi (GIS geometry) |
| `create_complaints_table` | Pengaduan warga |
| `create_families_table` | Data keluarga |
| `create_residents_table` | Data penduduk |
| `create_products_table` | Produk UMKM |
| `create_galleries_table` | Galeri foto |

Run all migrations:

```bash
php artisan migrate
```

Reset and reseed (development only):

```bash
php artisan migrate:fresh --seed
```

### Seeders

| Seeder | Purpose |
|---|---|
| `RoleSeeder` | Creates `super-admin`, `editor-konten`, `ppid-officer` roles |
| `PermissionSeeder` | Seeds all named permissions |
| `ShieldSeeder` | Wires Filament Shield policies |
| `VillageDataSeeder` | Seeds base village profile data |
| `DemographicSeeder` | Generates sample residents and families |

---

## API Reference

Base URL: `https://api.your-domain.id/api/v1`

Authentication uses **Laravel Sanctum** Bearer tokens. Routes marked 🔒 require `Authorization: Bearer {token}`.

### Post Categories

| Method | Endpoint | Auth | Description |
|---|---|---|---|
| `GET` | `/categories` | — | List all categories |
| `GET` | `/categories/{id}` | — | Get a single category |
| `POST` | `/categories` | 🔒 | Create a category |
| `PUT` | `/categories/{id}` | 🔒 | Update a category |
| `DELETE` | `/categories/{id}` | 🔒 | Delete a category |

### Posts (Berita)

| Method | Endpoint | Auth | Description |
|---|---|---|---|
| `GET` | `/posts` | — | Paginated list with filters |
| `GET` | `/posts/{slug}` | — | Get post by slug |
| `POST` | `/posts` | 🔒 | Create a post |
| `PUT` | `/posts/{id}` | 🔒 | Update a post |
| `DELETE` | `/posts/{id}` | 🔒 | Delete a post |

### Organizations & Officials

| Method | Endpoint | Auth | Description |
|---|---|---|---|
| `GET` | `/organizations` | — | List organizations |
| `GET` | `/organizations/{id}` | — | Organization detail |
| `POST` | `/organizations` | 🔒 | Create organization |
| `PUT` | `/organizations/{id}` | 🔒 | Update organization |
| `DELETE` | `/organizations/{id}` | 🔒 | Delete organization |
| `GET` | `/officials/{id}` | — | Get official detail |
| `POST` | `/officials` | 🔒 | Create official |
| `PUT` | `/officials/{id}` | 🔒 | Update official |
| `DELETE` | `/officials/{id}` | 🔒 | Delete official |

### Locations (Pemetaan)

| Method | Endpoint | Auth | Description |
|---|---|---|---|
| `GET` | `/locations` | — | List all locations (with GIS data) |
| `GET` | `/locations/{slug}` | — | Get location by slug |
| `POST` | `/locations` | 🔒 | Create location |
| `PUT` | `/locations/{slug}` | 🔒 | Update location |
| `DELETE` | `/locations/{slug}` | 🔒 | Delete location |

### Complaints (Pengaduan)

| Method | Endpoint | Auth | Description |
|---|---|---|---|
| `POST` | `/complaints` | — | Submit a complaint (public) |
| `GET` | `/complaints/track/{code}` | — | Track complaint by code (public) |
| `GET` | `/complaints` | 🔒 | List all complaints (admin) |
| `PATCH` | `/complaints/{id}/status` | 🔒 | Update complaint status (admin) |

### Demographics

| Method | Endpoint | Auth | Description |
|---|---|---|---|
| `GET` | `/demographics/stats` | — | Aggregate population statistics |
| `GET` | `/demographics/families/{id}` | — | Family detail with residents |
| `POST` | `/demographics/families` | 🔒 | Create family record |

### Products (UMKM)

| Method | Endpoint | Auth | Description |
|---|---|---|---|
| `GET` | `/products` | — | Paginated product catalog |
| `GET` | `/products/{id}` | — | Product detail |
| `POST` | `/products` | 🔒 | Create product |
| `PUT` | `/products/{id}` | 🔒 | Update product |
| `DELETE` | `/products/{id}` | 🔒 | Delete product |

### Galleries

| Method | Endpoint | Auth | Description |
|---|---|---|---|
| `GET` | `/galleries` | — | Paginated gallery list |
| `GET` | `/galleries/years` | — | Available gallery years |
| `GET` | `/galleries/{id}` | — | Gallery item detail |
| `POST` | `/galleries` | 🔒 | Create gallery item |
| `PUT` | `/galleries/{id}` | 🔒 | Update gallery item |
| `DELETE` | `/galleries/{id}` | 🔒 | Delete gallery item |

> **Interactive Docs:** A full Scribe-generated API reference is available at `/docs` after running `php artisan scribe:generate`.

---

## Admin Panel

The Filament admin panel is accessible at `/admin`.

### Panel Resources

| Resource | Managed Entity | Features |
|---|---|---|
| Posts | Berita | Rich text, featured image, publication status |
| Post Categories | Kategori | Nested category management |
| Organizations | Organisasi | With inline officials relation manager |
| Families | Keluarga | With inline residents relation manager |
| Locations | Pemetaan | Interactive map geometry picker |
| Complaints | Pengaduan | Status workflow with filtering |
| Products | UMKM | Product images, category, price |
| Galleries | Galeri | Category, year, bulk media upload |

### Dashboard Widget

A `DashboardStatsOverview` widget provides at-a-glance metrics on the admin home screen covering key entity counts.

---

## Roles & Permissions

The application implements a **named-permission RBAC** system using `spatie/laravel-permission` and enforced in the admin panel via `bezhansalleh/filament-shield`.

### Roles

| Role | Slug | Description |
|---|---|---|
| Super Admin | `super-admin` | Unrestricted access to all resources and settings |
| Editor Konten | `editor-konten` | Can create, read, update, and delete news articles |
| PPID Officer | `ppid-officer` | Can view and manage public information (PPID) |

### Named Permissions

| Permission | Label |
|---|---|
| `view berita` | Lihat Berita |
| `create berita` | Buat Berita |
| `update berita` | Ubah Berita |
| `delete berita` | Hapus Berita |
| `view ppid` | Lihat PPID |
| `manage ppid` | Kelola PPID |
| `manage users` | Kelola Pengguna |
| `manage roles` | Kelola Peran |

Create the initial super admin:

```bash
php artisan make:filament-user
# Then assign role:
php artisan tinker
>>> $user = \App\Models\User::where('email', 'admin@example.com')->first();
>>> $user->assignRole('super-admin');
```

---

## Testing

Tests are written using **Pest PHP** and cover all API endpoints as feature tests.

### Run All Tests

```bash
composer test
# Equivalent to: php artisan config:clear && php artisan test
```

### Run Tests with Coverage

```bash
php artisan test --coverage --min=80
```

### Test Suites

Feature tests exist for every API resource under `tests/Feature/Api/`:

```
tests/
└── Feature/
    └── Api/
        ├── ComplaintApiTest.php
        ├── DemographicApiTest.php
        ├── GalleryApiTest.php
        ├── LocationApiTest.php
        ├── OfficialApiTest.php
        ├── OrganizationApiTest.php
        ├── PostApiTest.php
        ├── PostCategoryApiTest.php
        └── ProductApiTest.php
```

> Tests use an in-memory SQLite database by default to keep the suite fast and isolated.

---

## Code Quality

### Static Analysis (Larastan)

Runs PHPStan at a strict level via Larastan:

```bash
./vendor/bin/phpstan analyse
```

### Code Style (Laravel Pint)

Enforces PSR-12 + Laravel conventions:

```bash
# Check only
./vendor/bin/pint --test

# Auto-fix
./vendor/bin/pint
```

Pint configuration is defined in `pint.json`.

---

## API Documentation

Interactive API documentation is generated by **Knuckles Scribe**:

```bash
php artisan scribe:generate
```

Documentation is then served at: `http://localhost:8000/docs`

Scribe configuration lives in `config/scribe.php`. The generated endpoint stubs are stored under `.scribe/`.

---

## Deployment

### Production Checklist

```bash
# 1. Install production dependencies only
composer install --optimize-autoloader --no-dev

# 2. Compile assets
npm ci && npm run build

# 3. Cache configuration for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# 4. Run migrations
php artisan migrate --force

# 5. Link storage
php artisan storage:link
```

### Queue Worker

Ensure a persistent queue worker is running in production (e.g., via Supervisor):

```bash
php artisan queue:work --sleep=3 --tries=3 --timeout=90
```

### Environment Variables for Production

```dotenv
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=pgsql
QUEUE_CONNECTION=redis
CACHE_STORE=redis
FILESYSTEM_DISK=s3
```

---

## Project Structure

```
backend-digikaum/
├── app/
│   ├── Filament/
│   │   ├── Resources/           # Admin panel resources (CRUD)
│   │   │   ├── Complaints/
│   │   │   ├── Families/
│   │   │   ├── Galleries/
│   │   │   ├── Locations/
│   │   │   ├── Organizations/
│   │   │   ├── PostCategories/
│   │   │   ├── Posts/
│   │   │   └── Products/
│   │   └── Widgets/             # Dashboard widgets
│   ├── Http/
│   │   ├── Controllers/Api/     # API controllers (one per domain)
│   │   ├── Requests/            # Form request validation classes
│   │   └── Resources/Api/       # JSON API resource transformers
│   ├── Models/                  # Eloquent models
│   ├── Repositories/
│   │   └── Eloquent/            # Repository implementations
│   └── Services/                # Business logic layer
│   └── Shared/
│       ├── Concerns/            # HasUlid trait
│       ├── Contracts/           # RepositoryInterface
│       ├── Enums/               # Typed enums (UserRole, PermissionName, etc.)
│       ├── Exceptions/          # Domain exceptions
│       └── Responses/           # Standardized ApiResponse helper
├── config/                      # Application configuration
├── database/
│   ├── factories/               # Model factories (Faker-based)
│   ├── migrations/              # Database schema history
│   └── seeders/                 # Data seeders
├── routes/
│   ├── api.php                  # API v1 routes
│   └── web.php                  # Admin & web routes
└── tests/
    └── Feature/Api/             # Pest feature tests
```

---

## Contributing

1. Fork the repository.
2. Create a feature branch: `git checkout -b feat/your-feature-name`
3. Make changes and ensure all tests pass: `composer test`
4. Ensure static analysis is clean: `./vendor/bin/phpstan analyse`
5. Ensure code style is consistent: `./vendor/bin/pint`
6. Push to your fork and open a Pull Request targeting `main`.

Please follow the [Conventional Commits](https://www.conventionalcommits.org/) specification for commit messages.

---

## Security

If you discover a security vulnerability in this project, please **do not open a public issue**. Instead, reach out to the maintainer directly through the repository's private security advisory feature.

All HTTP routes are protected by:
- CSRF protection on web routes
- Sanctum token authentication on write-protected API routes
- Filament Shield RBAC policies on admin panel resources
- Request validation on all mutating endpoints

---

## License

This project is open-sourced software licensed under the [MIT License](LICENSE).

---

<div align="center">
Built with ❤️ for Desa Cikaum Timur · <a href="https://github.com/Website-Desa-Cikaum-Timur">Website-Desa-Cikaum-Timur</a>
</div>