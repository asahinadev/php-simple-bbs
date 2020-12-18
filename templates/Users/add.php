<?php
use App\Model\Entity\User;
use App\View\AppView;

/**
 *
 * @var $user User
 * @var $this AppView
 */

$list_options = [
    "class" => "nav nav-tabs"
];
$item_options = [
    "class" => "nav-item"
];
$link_options = [
    "class" => "nav-link"
];
$link__active_options = [
    "class" => "nav-link active"
];

$list = [

    $this->Html->link(__("List"), [
        "action" => "index"
    ], $link_options),

    $this->Html->link(__("Create"), [
        "action" => "add"
    ], $link__active_options),
];

?>

  <?=$this->Html->nestedList($list, $list_options, $item_options);?>

<div class="w-75 mx-auto mt-1">
  <div class="card">
<?=$this->Form->create($user) ?>
  <div class="card-header">
    <?= __("User Create")?>
  </div>
    <div class="card-body">
      <fieldset>
<?=$this->Form->control("username") ?>
<?=$this->Form->control("email") ?>
<?=$this->Form->control("password") ?>
      </fieldset>
<?=$this->Form->submit(__("Save"));?>
    </div>
    <div class="card-footer text-muted"></div>
  </div>
    <?=$this->Form->end()?>
    </div>
</div>