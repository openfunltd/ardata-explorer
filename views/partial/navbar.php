<nav class="main-header navbar navbar-expand navbar-light">
  <!-- left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fa fa-bars"></i>
      </a>
    </li>
    <?php if (getenv('ENV_INFO') !== false) { ?>
    <li class="nav-item">
      <span class="navbar-text text-danger">
        <i class="bi bi-server"></i>
        <?= $this->escape(getenv('ENV_INFO')) ?>
      </span>
    </li>
    <?php } ?>
  </ul>
  <!-- right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>
