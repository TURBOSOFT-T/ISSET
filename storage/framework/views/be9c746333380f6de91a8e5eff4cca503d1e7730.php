<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="plateform isset">
    <meta name="keywords" content="plateform isset">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
    <title>  ISSET</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <?php echo $__env->make('layouts.simple.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('style'); ?>
    <style>
      .show-hide-passe{
        position: relative !important;
        top: 11px !important;
        right: -5px !important;
        transform: translateY(-50%);
      }
      .bg-div{
        background-color: white;
        margin-bottom: 12px;
        margin-top: 12px !important;
      }
      .padd-form{
        padding: 40px;
      }
      .page-wrapper .page-body-wrapper .page-title {
        padding-bottom: 8px !important;
      }
      .link-padding{
        padding: 6px;
        border-radius: 15px;
      }

      .padding-alert{
        padding: 9px !important;
      }

      .select2-container {
        border: 1px solid #ced4da !important;
      }

      .margin-btn-dir{

        margin-top: 30px;
      }

      .margin-div-dir{

        margin-right: 7px;

      }

      .dispform{
        display: flex;
      }

      .height-range{
        height: 42px;
      }

      .mbotton{
        margin-bottom:8px;
      }
      .page-wrapper.material-type .page-body-wrapper {
        background-image: unset !important;
      }

      .card .card-header {
        padding: 24px !important;
      }

    </style>
  </head>
  <body <?php if(Route::current()->getName() == 'index'): ?> onload="startTime()" <?php endif; ?>>
    <?php if(Route::current()->getName() == 'index'): ?>
      <div class="loader-wrapper">
        <div class="loader-index"><span></span></div>
        <svg>
          <defs></defs>
          <filter id="goo">
            <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
          </filter>
        </svg>
      </div>
     <?php endif; ?>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper horizontal-wrapper material-type" id="pageWrapper">
      <!-- Page Header Start-->
      <?php echo $__env->make('layouts.simple.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Page Header Ends  -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <?php echo $__env->make('layouts.simple.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <?php echo $__env->yieldContent('breadcrumb-title'); ?>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('/')); ?>"> <i data-feather="home"></i></a></li>
                    <?php echo $__env->yieldContent('breadcrumb-items'); ?>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <?php echo $__env->yieldContent('content'); ?>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <?php echo $__env->make('layouts.simple.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        
      </div>
    </div>
    <!-- latest jquery-->
    <?php echo $__env->make('layouts.simple.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
    <!-- Plugin used-->

    <script type="text/javascript">
      $(".customizer-links").hide();

      if ($(".page-wrapper").hasClass("horizontal-wrapper enterprice-type advance-layout")) {
            $(".according-menu.other" ).css( "display", "none" );
            $(".sidebar-submenu" ).css( "display", "block" );
      }
    </script>
  </body>
</html><?php /**PATH C:\wamp64\www\Projet-Isset\isset\resources\views/layouts/simple/master.blade.php ENDPATH**/ ?>