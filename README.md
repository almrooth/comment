Anax comment
==================================

[![Latest Stable Version](https://poser.pugx.org/anax/comment/v/stable)](https://packagist.org/packages/anax/comment)
[![Join the chat at https://gitter.im/mosbth/anax](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/canax?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Build Status](https://travis-ci.org/canax/comment.svg?branch=master)](https://travis-ci.org/canax/comment)
[![CircleCI](https://circleci.com/gh/canax/comment.svg?style=svg)](https://circleci.com/gh/canax/comment)
[![Build Status](https://scrutinizer-ci.com/g/canax/comment/badges/build.png?b=master)](https://scrutinizer-ci.com/g/canax/comment/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/canax/comment/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/canax/comment/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/canax/comment/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/canax/comment/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d831fd4c-b7c6-4ff0-9a83-102440af8929/mini.png)](https://insight.sensiolabs.com/projects/d831fd4c-b7c6-4ff0-9a83-102440af8929)

This is a comment module for use with Anax. The module contains provides login/logout and CRUD functionality for users, admins and comments.

## Setup

### Install with composer
```
composer require almrooth/comment
```

### Database
The comment module uses a MYSQL-database for storage. Make sure you have one installed.

Make sure you have a configuration file for your database. There is a sample to use in `vendor/almrooth/config/database.php`.

To setup all tables for use with the module execute the code in `vendor/almrooth/sql/setup.sql`.

### Router files
Copy the router files to your `config/route`.
```
rsync -av vendor/almrooth/config/route/* config/route
```
Inlcude the routes in your router configuration `config/route.php`. There is a sample to use in `vendor/almrooth/config/route.php`.

### DI services
Add the required services to DI, `config/di.php`. There is a sample to use in `vendor/almrooth/config/di.php`.

Make sure that all services that are in the sample file are added to your DI.

#### Pagerender 


License
------------------

This software carries a MIT license.


```
 .  
..:  Copyright (c) 2017 Tobias Almroth (almrooth@gmail.com)
```
