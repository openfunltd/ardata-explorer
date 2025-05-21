<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- brand logo -->
  <a href="/" class="brand-link">
    <img src="/static/images/planet-earth-global.png" alt="Explorer Logo" class="brand-image">
    <span class="brand-text font-weight-light">Data Explorer</span>
  </a>

  <!-- sidebar -->
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php foreach (TypeHelper::getTypeConfig() as $key => $config) { ?>
        <li class="nav-item">
          <a href="/collection/list/<?= $key ?>" class="nav-link <?= $this->if($this->type== $key, 'active') ?>">
            <i class="<?= $this->escape($config['icon']) ?>"></i>
            <p class="ml-1"><?= $this->escape($config['name']) ?> / <?= $this->escape($key) ?></p>
          </a>
        </li>
        <?php } ?>
      </ul>
  </div>
</aside>
