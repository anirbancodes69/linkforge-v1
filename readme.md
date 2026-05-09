# WEBN

Modern URL Shortener & Real-Time Analytics Platform

WEBN is a modern SaaS platform for shortening, tracking, and managing links with real-time analytics, custom aliases, and scalable infrastructure.

Built with Laravel, PostgreSQL, Docker, Redis, and Nginx.

---

# Features

## URL Shortening

* Instant short link creation
* Custom aliases
* Expiring links
* Active/inactive link management
* Fast redirect engine

## Analytics

* Real-time click tracking
* Device analytics
* Browser analytics
* Platform insights
* Referrer tracking
* Country support
* Dashboard charts

## Guest Link Support

* Anonymous users can create links
* Guest links stored via guest token
* Automatic migration after signup/login

## Authentication

* Registration
* Login/logout
* Session-based authentication
* Protected dashboard routes

## Admin Dashboard

* Total users
* Total links
* Total clicks
* Guest usage tracking
* Platform overview
* Activity monitoring

## UI/UX

* Modern dark SaaS interface
* Responsive design
* Mobile-first experience
* Smooth onboarding flow
* Glassmorphism-inspired UI

---

# Tech Stack

## Backend

* Laravel 13
* PHP 8.2+

## Database

* PostgreSQL

## Infrastructure

* Docker
* Docker Compose
* Nginx
* Redis

## Frontend

* Blade
* Tailwind CSS
* Vanilla JavaScript
* Lucide Icons
* Chart.js

## Deployment

* AWS EC2
* Let's Encrypt SSL

---

# Architecture

## Stateless Application Design

WEBN is designed using a stateless architecture for future horizontal scalability.

## Analytics Engine

Analytics are separated into dedicated tracking tables for scalability and cleaner reporting.

## Queue-Ready Infrastructure

Redis is integrated for future:

* queues
* analytics aggregation
* background jobs
* scheduled processing

## Guest-to-User Migration

Anonymous links automatically migrate to registered accounts after authentication.

## Dockerized Environment

Entire infrastructure runs inside containers:

* app
* nginx
* postgres
* redis

---

# Core Modules

## Authentication Module

Handles:

* registration
* login
* logout
* session management

## Link Management Module

Handles:

* short link creation
* alias management
* updates
* deletion

## Redirect Engine

Handles:

* public redirects
* analytics capture
* click tracking
* device detection

## Analytics Module

Handles:

* dashboard metrics
* charts
* devices
* countries
* recent activity

## Admin Module

Handles:

* global platform statistics
* user growth monitoring
* system-wide insights

---

# Security

* CSRF protection
* Input validation
* Secure password hashing
* Protected routes
* Session authentication
* Eloquent ORM protection

---

# Production Stack

* AWS EC2
* Dockerized services
* Nginx reverse proxy
* PostgreSQL container
* Redis container
* SSL with Let's Encrypt

---

# Local Development

## Start Containers

```bash
docker compose up -d
```

## Run Migrations

```bash
php artisan migrate
```

## Clear Cache

```bash
php artisan optimize:clear
```

---

# Roadmap

## Current MVP

* URL shortening
* Analytics
* Admin dashboard
* Guest links
* Authentication
* Responsive UI
* Docker deployment
* SSL setup

## Planned Features

* QR code generation
* Geo analytics
* API access
* Custom domains
* Team collaboration
* Export reports
* Advanced analytics

---

# Vision

WEBN aims to become a modern lightweight platform for:

* link management
* analytics
* creator growth
* branded short links
* developer-friendly APIs

with strong focus on simplicity, speed, and scalable infrastructure.

---

# About

Built independently by Anirban Bhowmick.

WEBN is currently in active public MVP development.
