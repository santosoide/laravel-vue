# laravel-vue

Just another example Laravel v5.8.x &amp; VueJs v2.5.17

## Installation

### Clone the repo

```sh
$ git clone https://github.com/cyberid41/laravel-vue
```

### Install dependencies

```sh
// run composer install
$ composer install

// run npm install
$ npm install
```

### Database config

copy file `env.example` to `.env`

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravue
DB_USERNAME=root
DB_PASSWORD=root
```

### Migration table & seeder

```sh
$ php artisan migrate --seed
```

### Running development

```sh
// serving laravel
$ php serve

// running npm scripts to watch changes
$ npm run watch
```
