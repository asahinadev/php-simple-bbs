<?php
use App\Model\Entity\User;
use App\View\AppView;

/**
 *
 * @var $user User
 * @var $this AppView
 */
?>
<div>

  <?php
$list = [
    $this->App->navItem(__("List"), "Users", "index", "index"),
    $this->App->navItem(__("Create"), "Users", "add", "add"),
    $this->App->navItem(__("Edit"), "Users", "edit", "edit", false, $user->id, $authUserId != $user->id),
    $this->App->navItem(__("View"), "Users", "view", "view", false, $user->id),
];

echo $this->App->tabs($list);

?>
<div class="w-75 mx-auto mt-1">
    <div class="card">
      <div class="card-header"><?= __("User View")?></div>
      <div class="card-body">
<?php
echo $this->element("form/static", [
    "name" => __("Id"),
    "value" => $user->id,
    "appendClass" => ""
]);
echo $this->element("form/static", [
    "name" => __("Username"),
    "value" => h($user->username),
    "appendClass" => ""
]);
echo $this->element("form/static", [
    "name" => __("Email"),
    "value" => h($user->email),
    "appendClass" => ""
]);
echo $this->element("form/static", [
    "name" => __("Password"),
    "value" => __("Hide for security"),
    "appendClass" => "text-danger"
]);
echo $this->element("form/static", [
    "name" => __("Created"),
    "value" => $this->Time->format($user->created, "Y/M/d H:m"),
    "appendClass" => ""
]);
echo $this->element("form/static", [
    "name" => __("Modified"),
    "value" => $this->Time->format($user->modified, "Y/M/d H:m"),
    "appendClass" => ""
]);
?>
      </div>
      <div class="card-footer text-muted"></div>
    </div>
  </div>