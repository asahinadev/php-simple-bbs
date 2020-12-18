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
    echo $this->Html->css("common") . PHP_EOL;
    echo $this->Html->script("https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js") . PHP_EOL;
    echo $this->Html->script("https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js") . PHP_EOL;
    echo $this->Html->script("common") . PHP_EOL;
    echo $this->fetch('css') . PHP_EOL;
    echo $this->fetch('script') . PHP_EOL;

    ?>

</head>
<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Expand at md</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link" href="<?= $this->Url->build('/') ?>">Home <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
        <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a></li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something
              else here</a>
          </div></li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid pt-3">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  </div>
  <footer>
    <?= $this->fetch('footer') ?>
  </footer>
</body>
</html>
