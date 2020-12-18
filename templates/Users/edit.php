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
    ], $link_options),

    $this->Html->link(__("Edit"), [
        "action" => "edit",
        $user->id
    ], $link__active_options),

    $this->Html->link(__("View"), [
        "action" => "view",
        $user->id
    ], $link_options),
];

?>

  <?=$this->Html->nestedList($list, $list_options, $item_options);?>

<div class="w-75 mx-auto mt-1">
  <div class="card">
<?=$this->Form->create($user) ?>
  <div class="card-header">
    <?= __("User Modify")?>
  </div>
    <div class="card-body">
      <fieldset>
        <div class="form-group row text">
          <label class="col-form-label col-md-2" for="id"><?=__("Id")?></label>
          <div class="col-md-10">
            <div class="form-control bg-light"><?= h($user->id)?></div>
          </div>
        </div><?=$this->Form->control("username") ?>
<?=$this->Form->control("email") ?>
<?=$this->Form->control("password") ?>
        <div class="form-group row text">
          <label class="col-form-label col-md-2" for="created"><?=__("Created")?></label>
          <div class="col-md-10">
            <div class="form-control bg-light"><?= $this->Time->format($user->created,"Y/M/d H:m")?></div>
          </div>
        </div>
        <div class="form-group row text">
          <label class="col-form-label col-md-2" for="modified"><?=__("Modified")?></label>
          <div class="col-md-10">
            <div class="form-control bg-light"><?= $this->Time->format($user->modified,"Y/M/d H:m")?></div>
          </div>
        </div>
      </fieldset>
<?=$this->Form->submit(__("Save"));?>
    </div>
    <div class="card-footer text-muted"></div>
  </div>
    <?=$this->Form->end()?>
    </div>
</div>