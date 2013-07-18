DwApcInfo
=======
Version 0.0.1 created by Daniel Wolkenhauer

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