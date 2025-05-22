<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/static/favicon.ico">
  <?= $this->yield('head-load') ?>
  <!-- load frontend packages -->
  <!-- jquery 3.7.1 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- bootstrap 5.3.3 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- bootstrap.bundle 5.3.3 js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- admin-lte 3.2.0 css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- admin-lte 3.2.0 js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Chart.js 4.4.1 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js" integrity="sha512-CQBWl4fJHWbryGE+Pc7UAxWMUMNMWzWxF4SQo9CgkJIN1kx6djDQZjh3Y8SZ1d+6I+1zze6Z7kHXO7q3UyZAWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- dataTable 2.2.2 css -->
  <link href="https://cdn.datatables.net/v/bs5/dt-2.3.1/datatables.min.css" rel="stylesheet" integrity="sha384-rcK/Hw0a8czqNV8XiNNbA2kqXBypz/reTTu9ewJiCYQRES16Xpl47dKudYItkU7M" crossorigin="anonymous">
  <!-- dataTable 2.2.2 js -->
  <script src="https://cdn.datatables.net/v/bs5/dt-2.3.1/datatables.min.js" integrity="sha384-BE8jgQ18lLIDRFU5irQ26MTXl+tzWCKvu313il+U+Wo2wVTDr47xBIDmggcM21dh" crossorigin="anonymous"></script>
  <!-- font-awesome 6.7.2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- bootstrap-icons 1.11.3 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="hold-transition layout-fixed">
  <div class="wrapper">
    <?= $this->partial('partial/navbar', $this) ?>
    <?= $this->partial('partial/sidebar', $this) ?>
    <!-- div.content-wrapper -->
    <div class="content-wrapper">
      <?= $this->partial('partial/heading_n_breadcrumb', $this) ?>
      <!-- section.content -->
      <section class="content">
        <div class="container-fluid">
          <?= $this->yield('content') ?>
        </div>
      </section>
    </div>
    <!-- Footer -->
    <footer class="main-footer">
      <!-- 本頁面使用 API -->
      <div class="row">
        <div class="col-12 col-md-8 mx-auto">
          <div class="card card-dark">
            <div class="card-header">
              <h5 class="card-title">本頁面使用 API</h5>
            </div>
            <div class="card-body">
              <ul id="api-log">
                <?php foreach (Api::getLogs() as $log) { ?>
                <li>
                <a href="<?= $this->escape($log[0]) ?>" target="_blank"><?= $this->escape($log[1]) ?></a>
                </li>
                <?php } ?>
              </ul>
              <script id="tmpl-api-log" type="text/html">
                <li>
                  <a href="" target="_blank" class="link"></a>
                </li>
              </script>
            </div>
          </div>
        </div>
      </div>
      <div class="text-end">
        <strong>Powered by <a href="https://openfun.tw">歐噴有限公司(OpenFun Ltd.)</a></strong>
      </div>
    </footer>
  </div>
  <?= $this->yield('body-load') ?>
</body>
