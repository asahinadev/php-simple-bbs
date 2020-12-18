<?php
use App\Model\Entity\User;
use App\View\AppView;

/**
 *
 * @var $user User
 * @var $this AppView
 */
?>

<div class="w-75 pt-5 mx-auto">
  <div class="card">
<?=$this->Form->create($user) ?>
  <div class="card-header">
    <?= __("User Login")?>
  </div>
    <div class="card-body">
      <fieldset>
<?=$this->Form->control("username") ?>
<?=$this->Form->control("password") ?>
      </fieldset>
<?=$this->Form->submit(__("Login"));?>
      <ul class="list-group mt-5">
        <li class="list-group-item">
        <?=$this->Html->link(__("Signup"), ["action"=>"add"])?>
      </li>
        <li class="list-group-item">
        <?=$this->Html->link(__("Password Forgot"), ["action"=>"password_forgot"])?>
      </li>
      </ul>
    </div>
    <div class="card-footer text-muted"></div>
  </div>
    <?=$this->Form->end()?>
    </div>
</div>