<?php
use App\Model\Entity\Post;
use App\View\AppView;

/**
 *
 * @var $post Post
 * @var $this AppView
 */
?>
<div>

  <?php
$list = [
    $this->App->navItem(__("List"), "Posts", "index", "index"),
    $this->App->navItem(__("Create"), "Posts", "add", "add"),
    $this->App->navItem(__("Edit"), "Posts", "edit", "edit", false, $post->id),
    $this->App->navItem(__("View"), "Posts", "view", "view", false, $post->id),
];

echo $this->App->tabs($list);

?>
<div class="w-75 mx-auto mt-1">
    <div class="card">
      <div class="card-header">
    <?= __("Post View")?>
  </div>
      <div class="card-body">
<?php
echo $this->element("form/static", [
    "name" => __("Text"),
    "value" => nl2br(h($post->text)),
    "appendClass" => "bg-light"
]);
echo $this->element("form/static", [
    "name" => __("Creator"),
    "value" => h($post->user->username),
    "appendClass" => "bg-light"
]);
?>
    </div>
      <div class="card-footer text-muted"></div>
    </div>
  </div>
</div>