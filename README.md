Anax comment
==================================

[![Latest Stable Version](https://poser.pugx.org/almrooth/comment/v/stable)](https://packagist.org/packages/almrooth/comment)
[![Total Downloads](https://poser.pugx.org/almrooth/comment/downloads)](https://packagist.org/packages/almrooth/comment)
[![Build Status](https://travis-ci.org/almrooth/comment.svg?branch=master)](https://travis-ci.org/almrooth/comment)
[![Build Status](https://scrutinizer-ci.com/g/almrooth/comment/badges/build.png?b=master)](https://scrutinizer-ci.com/g/almrooth/comment/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/almrooth/comment/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/almrooth/comment/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/almrooth/comment/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/almrooth/comment/?branch=master)

This is a comment module for use with Anax. The module contains provides login/logout and CRUD functionality for users, admins and comments.

## Setup

### Install with composer
```
composer require almrooth/comment
```

### Database
The comment module uses a MYSQL-database for storage. Make sure you have one installed.

Make sure you have a configuration file for your database. There is a sample to use in `vendor/almrooth/comment/config/database.php`.

To setup all tables for use with the module execute the code in `vendor/almrooth/comment/sql/setup.sql`.

### Router files
Copy the router files to your `config/route`.
```
rsync -av vendor/almrooth/comment/config/route/* config/route/
```
Inlcude the routes in your router configuration `config/route.php`. There is a sample to use in `vendor/almrooth/comment/config/route.php`.

### DI services
Add the required services to DI, `config/di.php`. There is a sample to use in `vendor/almrooth/comment/config/di.php`.

Make sure that all services that are in the sample file are added to your DI.

### Views
The comment module ships with its own default views. Copy them to your view directory.

```
rsync -av vendor/almrooth/comment/view/* view/
```

License
------------------

This software carries a MIT license.


```
 .  
..:  Copyright (c) 2017 Tobias Almroth (almrooth@gmail.com)
```
