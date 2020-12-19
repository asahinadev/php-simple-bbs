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
];

echo $this->App->tabs($list);

?>
<div class="w-75 mx-auto mt-1">
    <div class="card">
<?=$this->Form->create($post) ?>
  <div class="card-header">
    <?= __("Post Create")?>
  </div>
      <div class="card-body">
<?php
echo $this->Form->control("text");
echo $this->Form->submit(__("Save"));
?>
    </div>
      <div class="card-footer text-muted"></div>
    </div>
    <?=$this->Form->end()?>
    </div>
</div>