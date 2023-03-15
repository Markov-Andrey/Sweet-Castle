# Sweet Castle
## Welcome to the fairytale kingdom

:candy: *Created with love from the sweet tooth and for the sweet tooth.* :candy:

Final project at My IT School.

# Installation

Config Open Server:
- Apache 2.4
- PHP 8.1
- MySQL 8.0
- Domain name:
  - sweet-castle.local
- Domain dir:
  - \sweet-castle\public

Deployment:
- composer install
- npm run dev
- php artisan migrate --seed
- php artisan queue:work

# Main features
- Displaying products
- Comments
- Admin Panel
- CRUD
- Login form
- Registration form
- Feedback Form
- Forgotten password form


## Stack
- Core:
  - PHP
- Framework:
  - Laravel
  - Livewire
- Template engine:
  - Blade
- Styles:
  - Bootstrap
  - Tailwind CSS

## Backend features
- Factories and seeds are used to fill the base
- Using unit tests to check if page status works, tests use the test base
- Slim controllers:
  - Validation moved to Requests classes
  - For simple business logic, there is a php artisan make:action console command that creates an action class template with the magic method __invoke method (object as a function)
- Mail:
  - Sending feedback to personal mail (smtp Yandex)
  - A forgotten password is sent to the user's email
  - Sending mail is replicated through setting pending tasks so as not to load the server (queue: work or supervisor for Linux)
- Traits were used to render identical pieces of code
- Comments are updated via livewire (polymorphic model in case of scaling)

