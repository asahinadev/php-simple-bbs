<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    echo PHP_EOL;
    echo $this->Html->charset() . PHP_EOL;
    echo $this->Html->meta("viewport", "width=device-width, initial-scale=1") . PHP_EOL;
    echo $this->Html->tag("title", $cakeDescription . $this->fetch('title')) . PHP_EOL;
    echo $this->Html->meta('icon') . PHP_EOL;
    echo $this->fetch('meta') . PHP_EOL;
    echo $this->Html->css("https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css") . PHP_EOL;
    echo $this->Html->script("https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js") . PHP_EOL;
    echo $this->Html->script("https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js") . PHP_EOL;
    echo $this->fetch('css') . PHP_EOL;
    echo $this->fetch('script') . PHP_EOL;

    ?>

</head>
<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark pl-5">
    <a class="navbar-brand" href="#"><?=__("APP NAME")?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbars">
      <?php

    $list = [
        $this->App->navItem(__("Home"), "Pages", "display", "home", "/"),
        $this->App->navItem(__("Users"), "Users", "index"),
        $this->App->navItem(__("Posts"), "Posts", "index"),
    ];

    echo $this->App->headerNav($list)?>
    </div>
  </nav>


  <div class="container-fluid pt-3">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
  </div>
  <footer>
        <?= $this->Html->link(__('Back'), 'javascript:history.back()') ?>
  </footer>
</body>
</html>
