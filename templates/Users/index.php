<?php
use App\Model\Entity\User;
use App\View\AppView;

/**
 *
 * @var $users User[]
 * @var $authUser User
 * @var $this AppView
 */
?>
<div>

  <?php
$list = [
    $this->App->navItem(__("List"), "Users", "index", "index"),
    $this->App->navItem(__("Create"), "Users", "add", "add"),
];

echo $this->App->tabs($list);

?>
<div class="mt-1">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th><?= __("Id")?></th>
          <th><?= __("Username")?></th>
          <th><?= __("Admin")?></th>
          <th><?= __("Enable")?></th>
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
          <td><?= $user->admin?__("Yes"):__("No")?></td>
          <td><?= $user->enable?__("Yes"):__("No")?></td>
          <td><?= $this->Time->format($user->created, "Y/M/d")?></td>
          <td><?= $this->Time->format($user->modified, "Y/M/d")?></td>
          <td>
            <?=$this->html->link("M", "mailto:" . $user->email, ["class" => "btn btn-warning"]);?>
            <?php if ($authUserId == $user->id || $authUser->admin) {?>
              <?=$this->Html->link("E", ["action" => "edit",$user->id], ["class" => "btn btn-primary"]);?>
              <?=$this->Html->link("V", ["action" => "view",$user->id], ["class" => "btn btn-info"]);?>
              <?=$this->Form->postLink("D", ["action" => "delete",$user->id],["class" => "btn btn-danger","confirm" => sprintf(__("Do you want to delete this information? #%d"), $user->id)]);?>
            <?php } else {?>
              <?=$this->Html->link("V", ["action" => "view",$user->id], ["class" => "btn btn-info"]);?>
            <?php }?>
            </td>
        </tr>
      <?php endforeach;?>
    </tbody>
    </table>
  </div>
</div>