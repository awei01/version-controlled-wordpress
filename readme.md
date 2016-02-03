# Version Controlled Wordpress

This is an opinionated boilerplate installation of wordpress that seeks to make development and deployment more manageable by allowing everything to be under source control, including media uploads and database.

While this boilerplate should work on any operating system, this readme is written with Linux/Debian system in mind. You'll have to google alternative commands for your particular environment.

Note that on Windows environments, symlinks are kind of a pain to accomplish. But, there are ways to circumvent this problem, e.g. Apache virtual folders.


## Motivation

Wordpress was born in an age when FTP was the best tool publish websites. It's primarily intended for designers and not developers. As a result, maintenance and version control are a nightmare. This repository seeks to mitigate some of the headaches a developer may encounter when developing and maintaining a Wordpress installation.

This repository assumes that you are technically proficient enough to find your way around a server via a command prompt.


## System Requirements

* A webserver: While any server should technically work with this codebase, I'm assuming Apache and provide a sample config file. `apt-get install apache2`
* PHP >5.6: While earlier versions of PHP may work, I've developed this boilerplate using PHP 5.6.17-3. `apt-get install php5`
* SQLite PDO driver: There is assume MySQL database. If you really want MySQL, there are ways to re-enable it. `apt-get install php5-sqlite`
* Git: A version control tool. `apt-get install git`
* Composer: A PHP package manager. [Installation instructions](https://getcomposer.org/download/)


## Suggested Installation

* Install via Composer: `composer create-project --prefer-dist awei01/version-controlled-wordpress <folder>`
* Change directory into your folder: `cd <folder>`
* Install the dependencies using `composer install`
* Copy `.env.sample` to `.env` and edit the values to suit your configuration
* Ensure `storage` folder is recursively is writeable `chmod -R 766 storage`
* Copy and edit your `server/apache.example.conf` into your Apache `sites-enabled`
* Restart Apache
* Browse to your domain and you should get the Wordpress installation page.
* Initialize your repository so that you can start checking in your code changes: `git init`


## Symlinks (or Apache virtual folders)

* `public/wp` points to `wp` for wordpress core files
* `public/content/db.php` points to `wp-plugins/sqlite-integration/db.php` to use SQLite instead of MySQL
* `public/content/plugins` points to `/wp-plugins` for Composer managed wordpress plugins
* `public/uploads` to `storage/uploads` for uploaded media


## Composer Managed Modules

* `vlucas/phpdotenv`: Allow loading environment specific configurations via flat file. https://packagist.org/packages/vlucas/phpdotenv


## Composer Managed Wordpress Plugins

These can be found on http://wpackagist.org/ or http://wordpress.org/plugins

* `disable-wordpress-updates`: To prevent wordpress from checking for newer versions. http://wordpress.org/plugins/disable-wordpress-updates/
* `sqlite-integration`: So we can check in a flat file for the database. https://wordpress.org/plugins/sqlite-integration/


## Suggestions and Pull Requests are welcomed 
