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
- new DB - sweet_castle
- .env & .env.testing copy
- composer install
- npm run dev
- php artisan storage:link
- php artisan migrate --seed
- php artisan queue:work
- php artisan test (check all pages are responsive)

# Main features
- Displaying products
- Comments
- Admin Panel:
  - products
  - users
  - comments
  - orders
- CRUD
- Login form
- Registration form
- Feedback Form
- Forgotten password form


# Map of site

## Admin
- **/admin/login** (point of entry)
- **/admin/products** (CRUD async Livewire)
- **/admin/users** (list and delete entry (sync PHP)
- **/admin/comments** (list and delete entry (sync PHP)
- **/admin/orders** (list async Livewire)

## Guest (User)
- **/admin/login** (point of entry)
- **/** (main page)
- **/login** (point of entry)
- **/products** (list of products through pagination)
- **/product/{id}** (detailed product card, comments (async Livewire)
- **/forgot** (password reset form with sending an email with a new password (sync PHP, through the worker QUEUE)
-  **/register** (new user registration form (sync PHP)
-  **/contacts** (submitting a feedback form (sync PHP, through the worker QUEUE)


# Stack (why selected?)
## Backend
### Core
- **PHP** - main engine
### Framework
- **Laravel** - friendly framework based on MVC model, automation of routine tasks, built-in test suite)
- **Livewire** - creating dynamic interfaces, automating work with ajax
### Template engine
- **Blade** - simplification of work with HTML layout, used out of the box in Laravel
## Frontend
### Styles
- **Bootstrap** - did not live up to expectations, it is required to be eradicated from the project
- **Tailwind CSS** - flexible framework for working with CSS styles inside HTML layout, the peculiarity of its work is to clean the output CSS-file from unused classes
### JavaScript
- **Alpine JS** - working with js inside html-file
- **Flowbite** - plugin for Tailwind that allows you to create dynamic components using JS

# Frontend features
1. Styling is done with Tailwind and Flowbite responsive components
2. Order style changes depending on the status
3. Accordions in the admin panel orders
4. Tooltip above the "+" button in the products category of the admin panel
5. Responsive sidebar admin panel
6. Responsive website menu

# Backend features
1. Factories and seeds are used to fill the base
2. Using unit tests to check if page status works, tests use the test base
3. Slim controllers:
- Validation moved to Requests classes
- For simple business logic, there is a php artisan make:action console command that creates an action class template with the magic method __invoke method (object as a function)
4. Mail:
- Sending feedback to personal mail (smtp Yandex)
- A forgotten password is sent to the user's email
- Sending mail is replicated through setting pending tasks so as not to load the server (queue: work or supervisor for Linux)
5. Traits were used to render identical pieces of code
6. Livewire:
- Comments are updated (polymorphic model in case of scaling)
- CRUD rewritten with Livewire and Alpine JS. Everything is updated without reloading the page. Delete method also cleans up the image
- Implemented adding products to the cart through the database
- Transferring data from cart to order
- Order status change
- Cart preview showing items and amount
7. Using an external API:
- Notification of a new order in Telegram
