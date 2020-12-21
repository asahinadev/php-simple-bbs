<?php
use App\Model\Entity\User;
use App\View\AppView;

/**
 *
 * @var $user User
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
<div class="w-75 mx-auto mt-1">
    <div class="card">
<?=$this->Form->create($user) ?>
  <div class="card-header">
    <?= __("User Create")?>
  </div>
      <div class="card-body">
<?php
echo $this->Form->control("username");
echo $this->Form->control("email");
echo $this->Form->control("password");
if ($authUser && $authUser->admin) {
    echo $this->Form->control("enable");
    echo $this->Form->control("admin");
}
echo $this->Form->submit(__("Save"));
?>
      </div>
      <div class="card-footer text-muted"></div>
    </div>
    <?=$this->Form->end()?>
    </div>
</div>