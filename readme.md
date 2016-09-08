# Version Controlled Wordpress

This is an opinionated boilerplate installation of wordpress that seeks to make development and deployment more manageable by allowing everything to be under source control, including media uploads and database.

While this boilerplate should work on any operating system, this readme is written with Linux/Debian system in mind. You'll have to google alternative commands for your particular environment.

Note that on Windows environments, symlinks are kind of a pain to accomplish. You'll have to google how to resolve these.


## Motivation

Wordpress was born in an age when FTP was the best tool used to publish websites. It was primarily intended for designers and not developers. As a result, maintenance and version control are a nightmare. This repository seeks to mitigate some of the headaches a developer may encounter when developing and maintaining a Wordpress installation.

This repository assumes that you are technically proficient enough to find your way around a server via a command prompt.

## Default Configuration

All the following configurations can be disabled via the `.env` file

* File-based caching: Store cache in the file system `storage/cache` instead of your `wp_options` table.
* File-based database: Now you can version control your blog content. You don't have to export/import a mysql dump.
* Upload folder outside of `wp-content`: Your `uploads` folder is located outside of `wp-content`. This way, you can version control your uploads.
* Automated plugin management: Manage your plugins via `composer.json` without relying on the web-based installation process.
* Disable automated updates: Core, plugins and themes updates are disabled, saving database read/writes. You now have finer control over versioning via `composer.json`.
* Suppress admin menu items and widgets: Themes and plugins menu items are hidden by default since they're now managed via `composer.json`. Certain dashboard widgets are removed by default.


## System Requirements

Note: All of the following commands are for Debian based systems.

* A webserver: While any server should technically work with this codebase, I'm assuming Apache and provide a sample config file in `/server/apache.example.conf`. To install: `apt-get install apache2`
* PHP >5.6: While earlier versions of PHP may work, I've developed this boilerplate using PHP 5.6.17-3. `apt-get install php5`
* SQLite PDO driver: `apt-get install php5-sqlite` This overrides the default MySQL database. If you really want MySQL, there are ways to re-enable it.
* Git: A version control tool. `apt-get install git`
* Composer: A PHP package manager. [Installation instructions](https://getcomposer.org/download/)


## Suggested Installation

* Install via Composer: `composer create-project --prefer-dist awei01/version-controlled-wordpress <folder>`
* Change directory into your folder: `cd <folder>`
* Initialize your repository so that you can start checking in your code changes: `git init`

When using the above step on a virtual machine, I have encountered issues with the symbolic links within the project breaking. I'm not sure why this is occurring. To fix the problem, you can try the Alternative Installation instructions or, manually fix the symlinks yourself.


## Alternative Installation

* Clone this repository: `git clone https://github.com/awei01/version-controlled-wordpress.git ./<folder>`
* Change directory into your folder: `cd <folder>`
* Have Composer install dependencies: `composer install`
* Rename the git remote to upstream: `git remote rename origin upstream`
* Initialize your repository so that you can start checking in your code changes: `git remote add origin <your git url>`


### Continue Set Up

* Copy `.env.sample` to `.env` and edit the values to suit your configuration
* Ensure `storage` folder is recursively is writeable `chmod -R 766 storage`
* Copy and edit your `server/apache.example.conf` into your Apache `sites-enabled`
* Restart Apache
* Browse to your domain and you should get the Wordpress installation page.
* The default location for Wordpress admin is `http://<domain>/wp/wp-admin`


## Required Symlinks

* `public/wp` points to `wp` for wordpress core files
* `public/content/db.php` points to `modules/sqlite/init.php` to use SQLite instead of MySQL
* `public/content/object-cache.php` points to `modules/file-cache/init.php` to use file-based caching
* `public/content/plugins` points to `/wp-plugins` for Composer managed wordpress plugins
* `public/uploads` to `storage/uploads` for uploaded media


## Composer Managed Modules

* `vlucas/phpdotenv`: Allow loading environment specific configurations via flat file. https://packagist.org/packages/vlucas/phpdotenv
* `illuminate/cache`: Allow for file-based caching
* `illuminate/filesystem`: Allow for file-based caching
* `symfony/var-dumper`: Supporting modules for `illuminate/cache`

## Composer Managed Wordpress Plugins

These can be found on http://wpackagist.org/ or http://wordpress.org/plugins

* `johnpbloch/wordpress`: Core module to manage Wordpress through Composer.
* `disable-all-wp-updates`: To prevent wordpress from checking for newer versions. http://wordpress.org/plugins/disable-all-wp-updates/
* `sqlite-integration`: So we can check in a flat file for the database. https://wordpress.org/plugins/sqlite-integration/

## Installing plugins/themes
Plugins and themes are now managed via the `composer.json` file.

* Use http://wpackagist.org to locate your plugin or theme and add it to the `require` section of `composer.json`.
* Run `composer update` from the command line to install the new dependencies.
* If you've installed a plugin and you're using file-based caching, you'll need to delete the cache first: `rm -rf storage/cache/*`
* Browse to your site again and your new plugins will be activated.



## Suggestions and Pull Requests are welcomed
