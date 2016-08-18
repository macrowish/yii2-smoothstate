Yii2 SmoothState
================
Unobtrusive page transitions for Yii2: http://smoothstate.com/

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist macrowish/yii2-smoothstate "dev-master"
```

or add

```
"macrowish/yii2-smoothstate": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in any view file by  :

```
<?php
use macrowish\widgets\SmoothState;
?>

<?= SmoothState::begin(); ?>
Dynamically loaded content here.
<?= SmoothState::end(); ?>
```
