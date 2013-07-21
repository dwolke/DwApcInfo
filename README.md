#DwApcInfo

[![Build Status](https://travis-ci.org/dwolke/DwApcInfo.png?branch=develop)](https://travis-ci.org/dwolke/DwApcInfo) [![Latest Unstable Version](https://poser.pugx.org/dwolke/dw-apcinfo/v/unstable.png)](https://packagist.org/packages/dwolke/dw-apcinfo) [![](http://stillmaintained.com/dwolke/DwApcInfo.png)](http://stillmaintained.com/dwolke/DwApcInfo)

Version 0.0.1 created by [Daniel Wolkenhauer](http://dwolke.de)

> NOTE: This code is used for testing purposses only, primarily for my playground. Use this at your own risk.


Introduction
------------

...

Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)


Features / Goals
----------------

...

Installation
------------

#### With composer

1. Add this project to your composer.json:

    ```json
    "require": {
        "dwolke/dw-apcinfo": "dev-master"
    }
    ```

2. Now tell composer to download DwApcInfo by running the command:

    ```bash
    $ php composer.phar update
    ```

#### Post installation

1. Enabling it in your `application.config.php`file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'DwApcInfo',
        ),
        // ...
    );
    ```

Navigate to http://yourproject/apcinfo and you should land on the info page.


...