<?php
use App\View\AppView;

/**
 *
 * @var $this AppView
 */
?>
<pre>
<?= $this->fetch('content')?>
</pre>

<hr>

<dl>
  <dt><?= __("Login URL")?></dt>
  <dd>
    <?=$this->Url->build(["controller" => "Users","action" => "login"],["fullBase"=>true])?>
  </dd>
</dl>

<hr>

<dl>
  <dt><?= __("Those who do not remember the contents of this email")?></dt>
  <dd>
    <?= sprintf(__("This email is sent to those who have applied for %s registration."), __("APP NAME"))?><br />
    <?= __("If you do not remember the contents of the email, please contact us.")?>
  </dd>
</dl>
