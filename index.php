<?php require_once('./config.php'); ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<style>
  #header {
    height: 60vh;
    width: calc(100%);
    position: relative;
    top: -1em;
  }


  #header:before {
    content: "";
    position: absolute;
    height: calc(100%);
    width: calc(100%);
    background-image: url("http://localhost/dental/evsu2.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
  }

  #header>div {
    position: absolute;
    height: calc(100%);
    width: calc(100%);
    z-index: 2;
  }

  #top-Nav a.nav-link.active {
    color: #f8f9fa;
    font-weight: 900;
    position: relative;
  }

  #top-Nav a.nav-link.active:before {
    content: "";
    position: absolute;
    border-bottom: 2px solid #f8f9fa;
    width: 33.33%;
    left: 33.33%;
    bottom: 0;
  }

  /* .content-wrapper {
    background-image: url('./dist/img/evsuImg.jpg');
    background-color: #3a3a3acc;


   
  } */
</style>
<?php require_once('inc/header.php') ?>

<body class="layout-top-nav layout-fixed layout-navbar-fixed layout-footer-fixed" style="height: auto;">
  <div class="wrapper">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';  ?>
    <?php require_once('inc/topBarNav.php') ?>
    <?php if ($_settings->chk_flashdata('success')) : ?>
      <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success')
      </script>
    <?php endif; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-5" style="position: relative;">
      <img className="" src="<?php echo base_url . 'dist/img/evsuImg.jpg' ?>" style="width:100% ;position: absolute; opacity: 0.3;object-fit: contain;">
      <?php if ($page == "home" || $page == "about_us") : ?>
        <div id="header" class="shadow ">
          <div class="text-center mt-4">
            <img className="m-auto" src="<?php echo base_url . 'dist/img/header.png' ?>" style="width:40% ; ">
          </div>

          <div class="d-flex justify-content-center h-100 w-100 align-items-center flex-column px-3 mt-5">
            <h1 style="color: Black; text-align: center; font-family: Copperplate, fantasy; ">Web-Based Dental Clinic Appointment Management with QR Code System for EVSU-TC</h1>
            <!-- <h3 class="w-100 text-center px-5 site-subtitle"><?php echo $_settings->info('name') ?></h3> -->
          </div>
        </div>
      <?php endif; ?>
      <!-- Main content -->
      <section class="content ">
        <div class="container">
          <?php
          if (!file_exists($page . ".php") && !is_dir($page)) {
            include '404.html';
          } else {
            if (is_dir($page))
              include $page . '/index.php';
            else
              include $page . '.php';
          }
          ?>
        </div>
      </section>
      <!-- /.content -->
      <div class="modal fade rounded-0" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header rounded-0">
              <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body rounded-0">
              <div id="delete_content"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade rounded-0" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md modal-dialog-centered rounded-0" role="document">
          <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
              <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body rounded-0">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Submit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade rounded-0" id="uni_modal_right" role='dialog'>
        <div class="modal-dialog modal-full-height  modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header rounded-0">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="fa fa-arrow-right"></span>
              </button>
            </div>
            <div class="modal-body rounded-0">
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="viewer_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
            <img src="" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
    <?php require_once('inc/footer.php') ?>
</body>

</html>