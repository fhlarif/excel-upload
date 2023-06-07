## Getting Started

_Notes on Requirements:_

1. Minimum PHP 8.1 and above.
2. NPM and Composer installed with the latest version
3. If errors occurred during `composer install` or `npm install`, then remove the `package-lock.json` file and `composer.lock` file. If `vendor` or `node_modules` folders existed, remove them as well. Then perform the `install` command for `composer` and `npm`.

```bash
git clone https://github.com/fhlarif/excel-upload.git
```

```bash
cd excel-upload
```

```bash
cp .env.example .env
```

_**Note**: Make sure the .env file is modify to your local dev environment. For database, we are using SQLite to simplify the process. Therefore, a file named `database.sqlite` is needed and an absolute path is required. Adjust the path syntax based on your OS_
_Example:_

_Creating database.sqlite_

```bash
touch .\database\database.sqlite
```

```bash
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="C:\\laragon\\www\\excel-upload\\database\\database.sqlite"
DB_USERNAME=root
DB_PASSWORD=
```


```bash
composer install
```

```bash
npm install
```

```bash
php artisan key:generate
```

```bash
npm run build
```


_Migrate the tables:_

```bash
php artisan migrate
```

_Visit the url:_

```bash
http://localhost/excel-upload/public
```

