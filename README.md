# Practical UI Components

Companion code for the [Laracasts](https://laracasts.com) series on building practical UI components with Laravel, Livewire 4, and Tailwind CSS 4.

Each episode builds a real-world interactive component using Livewire's single-file component format.

## Components

| Ep | Component | Route |
|----|-----------|-------|
| 1 | Inline Editing With Auto-Save | `/ep1` |
| 2 | Toast Notification System With Multiple Toasts Stacking | `/ep2` |
| 3 | Multi-Step Wizard Modal With Auto-Save Progress | `/ep3` |
| 4 | Tag Input With Autocomplete And Create-On-The-Fly | `/ep4` |
| 5 | Infinite Scroll With Search And Filters | `/ep5` |
| 6 | Notification Center Dropdown With Real Time Updates | `/ep6` |
| 7 | Dynamic Search With Live Results | `/ep7` |
| 8 | Kanban Board With Drag And Drop | `/ep8` |

## Tech Stack

- **Laravel 12**
- **Livewire 4**
- **Tailwind CSS 4**
- **Alpine JS**

## Getting Started

```bash
git clone https://github.com/shrutibalasawebdev/practical-ui-components-livewire.git
cd practical-ui-components-livewire
composer setup
```

This runs `composer install`, copies `.env`, generates an app key, runs migrations, and builds frontend assets.

Then start the dev server:

```bash
composer run dev
```

This launches the Laravel server, queue worker, log tail, and Vite dev server concurrently.
