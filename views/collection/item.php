<?php
$config = TypeHelper::getTypeConfig()[$this->type];
$this->heading = $this->escape($config['name'] . '/' . $this->id);
?>
<?php $this->yield_start('content') ?>
<ul class="nav nav-pills my-3">
  <?php foreach ($this->features as $ftab => $fname) { ?>
  <li class="nav-item">
    <a class="nav-link <?= $this->if($ftab == $this->tab, 'active') ?>" href="/collection/item/<?= $this->type ?>/<?= urlencode($this->id) ?>/<?= $ftab ?>">
      <?= $this->escape($fname) ?>
    </a>
  </li>
  <?php } ?>
</ul>
<?php if ($this->tab == 'rawdata') { ?>
<?= $this->partial('collection/rawdata', $this) ?>
<?php } else { ?>
<?= $this->partial("collection/{$this->type}_{$this->tab}", $this) ?>
<?php } ?>

<?php $this->yield_end() ?>
<?php $this->yield_start('body-load') ?>
<?php $this->yield_end() ?>

<?= $this->partial('layout/app', $this) ?>
