<?php
//default sidebar active items value
$sidebar_active_items = $this->sidebar_active_items ?? [];
?>
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
        <li class="nav-header">一般</li>
        <li class="nav-item">
          <?php $active_str = in_array('index', $sidebar_active_items) ? ' active' : ''; ?>
          <a href="/" class="nav-link<?= $active_str ?>">
            <i class="bi bi-speedometer2"></i>
            <p class="ml-1">首頁</p>
          </a>
        </li>
      </ul>
  </div>
</aside>
