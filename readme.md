# Composer Wordpress Starter
This repository seeks to make development and deployment of Wordpress sites more manageable by allowing everything to be under source control.

## Installation
* Clone this repository
* Install the dependencies using `composer install`
* Copy `.env.sample` to `.env` and set the configurations
* Ensure `storage` folder is recursively is writeable `chmod -R 766 storage`

## Symlinks or virtual folders
* `public/wp` points to `wp` for wordpress core files
* `public/content/db.php` points to `wp-plugins/sqlite-integration/db.php`
* `public/content/plugins` to `/wp-plugins` for composer managed wordpress plugins
* `public/uploads` to `storage/uploads` for uploaded media

## Composer Managed Modules
* `vlucas/phpdotenv`: Allow loading environment specific configurations via flat file.

## Composer Managed Wordpress Plugins
* `disable-wordpress-updates`: to prevent wordpress from updating
* `sqlite-integration`: so we can check in the database flat file

## Install SQLite
* `apt-get update`
* `apt-get install php5-sqlite`
