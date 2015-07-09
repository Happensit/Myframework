<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:33
 */

define('BASE_URL', '/');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to <?php echo Config::get('AppName'); ?></title>
    <?php print $meta; // Установка значений в метатеги title, keywords, description.?>
    <?php print $css; ?>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo Config::get('AppName'); ?>"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo BASE_URL; ?>">Главная</a></li>
        <li><a href="<?php echo BASE_URL; ?>catalog">Каталог</a></li>
        <li><a href="<?php echo BASE_URL; ?>about">О нас</a></li>
        <li><a href="<?php echo BASE_URL; ?>contact">Контакты</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"
             role="button" aria-expanded="false">Dropdown <span
              class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo BASE_URL; ?>portfolio">Portfolio model</a></li>
            <li><a href="<?php echo BASE_URL; ?>#">Another action</a></li>
            <li><a href="<?php echo BASE_URL; ?>#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="<?php echo BASE_URL; ?>#">Separated link</a></li>
            <li><a href="<?php echo BASE_URL; ?>#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!--/.nav-collapse -->
  </div>
</nav>
