# Polus Network

Laravel 9 platform served through **Inertia + Vue 3**, covering deposits, withdrawals, currency
swaps, subscription plans, staking and the admin surface over all of it.

> Part of a commercial fintech product. The repository is published for reference; production
> configuration and credentials are not included.

## Stack

| Layer | Choice |
|---|---|
| Backend | PHP, Laravel 9 (`laravel/framework ^9.19`) |
| API auth | Laravel Sanctum (`^3.2`) |
| Frontend | Vue 3 via Inertia (`inertiajs/inertia-laravel ^0.6.8`) |
| UI | Flowbite / Tailwind, Chart.js, Font Awesome, AOS, vue-carousel |
| Search | Meilisearch |
| Services | MySQL 8, Redis, Mailpit, Selenium |

## What's in it

- **Deposits** — record and track incoming deposits, with list and detail views
  (`DepositController`, `DepositList.vue`, `DepositSingle.vue`).
- **Withdrawals** — the payout side of the ledger, including per-withdrawal status views
  (`WithdrawController`, `WithdrawList.vue`, `SingleWithdraw.vue`).
- **Swaps** — currency exchange between supported assets (`SwapController`, `Swap.vue`).
- **Plans & subscriptions** — recurring plan definitions with their lifecycle and plan-level
  configuration (`PlanController`, `SubscriptionController`, `PlansList.vue`, `SinglePlan.vue`).
- **Staking** — staking positions and the list view over them (`StakingList.vue`, `Stake.vue`).
- **Users** — account administration, including the `UsersController` and `UsersList.vue`.
- **Settings** — platform-wide configuration (`SettingController`, `Settings/`).
- **Profile & auth** — profile management plus the standard authentication flows
  (`ProfileController`, `Auth/`).

## Local setup

The repository ships a Laravel Sail stack, so the dependency set (MySQL, Redis, Meilisearch,
Mailpit, Selenium) comes up with one command:

```bash
composer install
npm install && npm run dev

cp .env.example .env
php artisan migrate --seed

./vendor/bin/sail up -d
./vendor/bin/sail artisan serve
```

Mailpit catches local mail on `http://localhost:8025`, and the app runs on `http://localhost:8000`.

### Docker services

| Service | Image |
|---|---|
| App | `sail-8.2/app` |
| Database | `mysql/mysql-server:8.0` |
| Cache & queues | `redis:alpine` |
| Search | `getmeili/meilisearch:latest` |
| Mail | `axllent/mailpit:latest` |
| Browser tests | `selenium/standalone-chrome` |

## Notes

- Secrets are read from the environment; `.env` is not committed.
- Sanctum issues the API tokens used by the client.
- Meilisearch backs the searchable lists in the admin UI.
