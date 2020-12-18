<?php
use App\Model\Entity\User;
use App\View\AppView;

/**
 *
 * @var $users User[]
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
    ], $link__active_options),

    $this->Html->link(__("Create"), [
        "action" => "add"
    ], $link_options)
];

?>
<div>

  <?=$this->Html->nestedList($list, $list_options, $item_options);?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th><?= __("Id")?></th>
        <th><?= __("Username")?></th>
        <th><?= __("Created")?></th>
        <th><?= __("Modified")?></th>
        <th><?= __("Action")?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user):?>
      <tr>
        <td><?= $user->id?></td>
        <td><?= h($user->username)?></td>
        <td><?= $this->Time->format($user->created, "Y/M/d")?></td>
        <td><?= $this->Time->format($user->modified, "Y/M/d")?></td>
        <td>
          <?= $this->html->link("M", "mailto:". $user->email,["class"=>"btn btn-warning"])?>
          <?= $this->Html->link("E", [ "action"=>"edit", $user->id],["class"=>"btn btn-primary"])?>
          <?= $this->Html->link("V", [ "action"=>"view", $user->id],["class"=>"btn btn-info"])?>
          <?=$this->Form->postLink("D", ["action" => "delete",$user->id], ["class"=>"btn btn-danger","confirm" => sprintf("#%d 削除しますか？", $user->id)])?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>