<?php
use App\Model\Entity\Post;
use App\View\AppView;

/**
 *
 * @var $posts Post[]
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
<div class="mt-1">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th><?= __("Id")?></th>
          <th><?= __("Text")?></th>
          <th><?= __("Username")?></th>
          <th><?= __("Action")?></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($posts as $post):?>
      <tr>
          <td><?= $post->id?></td>
          <td><?= nl2br(h($post->text))?></td>
          <td><?=$this->Html->link($post->user->username, ["controller" => "Users","action" => "view",$post->user_id])?></td>
          <td>
            <?php if ($authUserId == $post->user_id) {?>
              <?=$this->Html->link("E", ["action" => "edit",$post->id], ["class" => "btn btn-primary"]);?>
            <?php }?>
            <?=$this->Html->link("V", ["action" => "view",$post->id], ["class" => "btn btn-info"]);?>
            <?php if ($authUserId == $post->user_id) {?>
              <?=$this->Form->postLink("D", ["action" => "delete",$post->id],["class" => "btn btn-danger","confirm" => sprintf(__("Do you want to delete this information? #%d"), $post->id)]);?>
            <?php }?>
            </td>
        </tr>
      <?php endforeach;?>
    </tbody>
    </table>
  </div>
</div>