<?php
$config = TypeHelper::getTypeConfig()[$this->type];
$this->heading = $this->escape($config['name']) . ' / ' . $this->escape($this->type);
?>
<?php $this->yield_start('content') ?>
<ul class="nav nav-pills my-3">
  <?php if (count($this->features) > 1) { ?>
    <?php foreach ($this->features as $ftab => $fname) { ?>
    <li class="nav-item">
      <a class="nav-link <?= $this->if($ftab == $this->tab, 'active') ?>" href="/collection/list/<?= $this->type ?>/<?= $ftab ?>">
        <?= $this->escape($fname) ?>
      </a>
    </li>
    <?php } ?>
  <?php } ?>
</ul>
<?php if ($this->tab == 'table') { ?>
<?= $this->partial('collection/table', $this) ?>
<?php } else { ?>
<?= $this->partial("collection/{$this->type}_{$this->tab}", $this) ?>
<?php } ?>
<?php $this->yield_end() ?>

<?php $this->yield_start('body-load') ?>
<?= $this->yield('list-body-load') ?>
<?php $this->yield_end() ?>

<?= $this->partial('layout/app', $this) ?>
