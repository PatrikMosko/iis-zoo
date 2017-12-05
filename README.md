## Laravel Information System - Zoo ##

**Information System Zoo** is simple web application with all configs, database schemas and seeders.

### Installation ###

* type `git clone https://github.com/surfer19/iis-zoo.git` to clone the repository 
* type `cd iis-zoo`
* type `composer install`
* type `composer update`
* type `bower install`
* start apache server (mysql + webserver)
* create mysql database with name `zoodb` - you can change name in *.env* file
* type `php artisan migrate --seed` to create and populate tables
* (optional) edit *.env* for emails configuration

### Include ###

* [Bootstrap Framework](https://getbootstrap.com/docs/3.3/) for easier creating gui
* [eonasdan-bootstrap-datetimepicker](http://eonasdan.github.io/bootstrap-datetimepicker/) nice datetimepicker
* [nicolaslopezj/searchable](https://github.com/nicolaslopezj/searchable) provide functionality for finding in models

### Tricks ###

To use application the database is seeding with users :

* Administrator : user name = majko, password = poklop
* User : email = manazer123, password = poklop

### License ###

This example for Laravel is open-sourced software licensed under the MIT license
