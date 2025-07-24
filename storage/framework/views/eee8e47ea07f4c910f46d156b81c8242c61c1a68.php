<!DOCTYPE html>
<html class="loading" data-textdirection="<?php echo e(\App::currentLocale() == 'sa' ? 'rtl' : 'ltr'); ?>">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php if(Route::current()->getName() == 'issue_token'): ?>
  <title>Kiosk</title>
  <?php elseif(Route::current()->getName() == 'display'): ?>
  <title>Display</title>
  <?php else: ?>
  <title>JL Token</title>
  <?php endif; ?>
  <link rel="apple-touch-icon" href="<?php echo e(asset('app-assets/images/icon/favicon.ico')); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('app-assets/images/icon/favicon.ico')); ?>">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- BEGIN: VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/vendors.min.css')); ?>">
  <!-- END: VENDOR CSS-->
  <!-- BEGIN: Page Level CSS-->
  <?php if(\App::currentLocale() == 'sa'): ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css-rtl/style-rtl.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css-rtl/themes/vertical-dark-menu-template/materialize.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css-rtl/themes/vertical-dark-menu-template/style.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css-rtl/loader/main.css')); ?>">
  <?php else: ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/vertical-dark-menu-template/materialize.css')); ?>"> 
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/vertical-dark-menu-template/style.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/loader/main.css')); ?>">
  <?php endif; ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/loader/normalize.css')); ?>">
  <!-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=r9xj0FyQ"></script> -->
<!--<script src="https://code.responsivevoice.org/responsivevoice.js?key=9bM5BpJH"></script>-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/app.css')); ?>">
<!-- <script src="<?php echo e(asset('app-assets/js/voice.js')); ?>"></script> -->

  <!-- vue js -->
  <?php echo $__env->yieldContent('css'); ?>

  <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<body id="page-layout-body" class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns ">

  <!-- BEGIN: Header-->

  <!-- <header class="page-topbar noprint" id="header">
    <div class="navbar navbar-fixed">
      <nav class="navbar-main navbar-color nav-collapsible sideNav-lock">
        <div class="nav-wrapper">
          <?php if(\App::currentLocale() == 'sa'): ?>
          <ul class="navbar-list left" style="padding-right: 60px;">
            <li><span style="font-weight: bold; font-size: x-large; ">JL Token</span></li>
          </ul>
          <?php else: ?>
          <ul class="navbar-list left" style="padding-left: 60px;">
            <li><span style="font-weight: bold; font-size: x-large; ">JL Token</span></li>
          </ul>
          <?php endif; ?>
          <ul class="navbar-list right">
            <?php if(isset($settings->logo) && Storage::disk('public')->exists($settings->logo)): ?>
            <li style="padding: 5px 0;">
              <img style="max-height:50px" src="<?php echo e($settings->logo_url); ?>" alt="avatar">
            </li>
            <?php endif; ?>
             <li class="navbar-list left"><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="extra-dropdown"><i class="material-icons">attachment</i></a></li> 
            <li class="navbar-list left"><a><b><?php echo e($settings->name); ?>,<?php echo e($settings->location); ?></b></a></li>
            <?php if(\Request::route()->getName() == 'show_call_page'): ?><li class="dropdown-language"><a class="waves-effect waves-block waves-light translation-button" href="#" data-target="translation-dropdown"><span class="flag-icon flag-icon-<?php echo e(\App::currentLocale()); ?>"></span></a></li><?php endif; ?>
            <li id="side-menu-icon-attachment" class="navbar-list left"><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="extra-dropdown"><i class="material-icons">attachment</i></a></li>
            <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
            <li id="side-menu-icon"><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li>
          </ul>



          <ul class="dropdown-content" id="extra-dropdown">
            <li><a href="" style="font-weight: 600; color:black"><?php echo e(__('messages.common.links')); ?></a></li>
            <li class="divider"></li>
            <li><a class="grey-text text-darken-1" href="<?php echo e(route('issue_token')); ?>" target="_blank"> <?php echo e(__('messages.menu.issue token url')); ?></a></li>
            <li><a class="grey-text text-darken-1" href="<?php echo e(route('display')); ?>" target="_blank"> <?php echo e(__('messages.menu.display url')); ?></a></li>
          </ul>

          <ul class="dropdown-content" id="translation-dropdown">
            <li class="dropdown-item" onclick="changeLanguage(1)"><a class="grey-text text-darken-1" href="#!" data-language="en"><i class="flag-icon flag-icon-gb"></i> English</a></li>
            <li class="dropdown-item" onclick="changeLanguage(2)"><a class="grey-text text-darken-1" href="#!" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a></li>
            <li class="dropdown-item" onclick="changeLanguage(3)"><a class="grey-text text-darken-1" href="#!" data-language="in"><i class="flag-icon flag-icon-in"></i> Hindi</a></li>
            <li class="dropdown-item" onclick="changeLanguage(4)"><a class="grey-text text-darken-1" href="#!" data-language="sa"><i class="flag-icon flag-icon-sa"></i> Arabic</a></li>
            <li class="dropdown-item" onclick="changeLanguage(5)"><a class="grey-text text-darken-1" href="#!" data-language="sa"><i class="flag-icon flag-icon-es"></i> Spanish</a></li>
            <li class="dropdown-item" onclick="changeLanguage(6)"><a class="grey-text text-darken-1" href="#!" data-language="sa"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></li>
            <li class="dropdown-item" onclick="changeLanguage(7)"><a class="grey-text text-darken-1" href="#!" data-language="sa"><i class="flag-icon flag-icon-it"></i> Italian</a></li>
            <li class="dropdown-item" onclick="changeLanguage(8)"><a class="grey-text text-darken-1" href="#!" data-language="sa"><i class="flag-icon flag-icon-id"></i> Indonesian</a></li>
          </ul>

        </div>

      </nav>
    </div>
  </header> -->
  <?php if(isset($show_menu) && $show_menu): ?>
  <?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
  <!-- END: Header-->
  <!-- BEGIN: SideNav-->
  <!-- END: SideNav-->

  <!-- BEGIN: Page Main-->
  <?php echo $__env->yieldContent('content'); ?>
  <!-- END: Page Main-->
  <div id="mount">
    <aside id="right-sidebar-nav">
      <div id="slide-out-right" class="slide-out-right-sidenav sidenav 
       side ">
        <div class="row" id="call-page-sidebar">
          <div class="slide-out-right-title">
            <div class="col s12 border-bottom-1 pb-0 pt-1 pr-0" style="border-bottom: 2px solid #000">
              <div class="row">
                <div class="col s2 pr-0 pl-0 center" style="width: 11.66667%;">
                  <i class="material-icons vertical-text-middle"><a href="#" @click="closeRightMenu()" style="color: #009688;">clear</a></i>
                </div>
                <div class="col s10 pl-0">
                  <ul class="tabs">
                    <li class="tab col s12 p-0">
                      <a href="#messages" style="color: #000000;">
                        <span><?php echo e(__('messages.call_page.walk in')); ?></span>
                      </a>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
          </div>
          
          <div class="slide-out-right-body row">
            <div id="messages" class="col s12 pb-0">
              <div class="collection border-none mt-0 mb-0">
                <div class="progress" v-if="loader">
                  <div class="indeterminate"></div>
                </div>
                <ul class="collection right-sidebar-chat p-0 m-0" v-if="!loader">
                  <li class="right-sidebar-chat-item pb-0 waves-effect waves-light next-to-call" :class="{'selected-token': show_next_to_call }" style="padding:0px; align-items:center; min-height:40px" @click="showNextToCall()">
                    <div class="user-content" style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                      <h6 style="margin: 0px; font-size:14px; font-weight:600;"><?php echo e(__('messages.call_page.next to call')); ?></h6>
                      <i v-if="show_next_to_call" class="material-icons" style="font-size: 25px; color:#b3b3b3">expand_more</i>
                      <i v-if="!show_next_to_call" class="material-icons" style="font-size: 25px; color:#b3b3b3">chevron_right</i>
                    </div>
                  </li>
                  <li class="right-sidebar-chat-item  pb-0 " style="padding:0px; align-items:center; min-height:40px; cursor:auto" data-target="slide-out-chat" v-for=" token in tokens_for_next_to_call" v-if="show_next_to_call">
                    <div class="user-content" style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: .1rem; margin-top: .7em;">
                      <div @click="!isCalled ? callNext(token.id): ''" style="border-radius:50%; display:flex; align-items:center; padding:5px;" :class="{'recall-active':  !isCalled, 'disabled-color': isCalled }"><i class="material-icons" style="font-size: 22px; color:#fff">call</i></div>
                      <h6 style="margin: 0px; font-size:20px; font-weight:600;">{{token.letter}}-{{token.number}}</h6>
                      <!-- <i class="material-icons" style="font-size: 25px; color:#b3b3b3">expand_more</i> -->
                      <div></div>
                    </div>
                  </li>
                  <li class="right-sidebar-chat-item  pb-0 waves-effect waves-light next-to-call" :class="{'selected-token': show_called }" style="padding:0px; align-items:center; min-height:40px" @click="showCalled()">
                    <div class="user-content" style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                      <h6 style="margin: 0px; font-size:14px; font-weight:600;"><?php echo e(__('messages.call_page.called')); ?></h6>
                      <i v-if="show_called" class="material-icons" style="font-size: 25px; color:#b3b3b3;">expand_more</i>
                      <i v-if="!show_called" class="material-icons" style="font-size: 25px; color:#b3b3b3;">chevron_right</i>
                    </div>
                  </li>
                  <li class="right-sidebar-chat-item  pb-0" style="padding:0px; align-items:center; min-height:40px; cursor:auto" data-target="slide-out-chat" v-for=" token in called_tokens" v-if="show_called">
                    <div class="user-content" style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: .1rem; margin-top: .7em;">
                      <div @click="(token.call_status_id == <?php echo e(CallStatuses::NOSHOW); ?> && !isCalled) ? recallToken(token.id) : ''" style="border-radius:50%; display:flex; align-items:center; padding:5px;" :class="{'recall-active': token.call_status_id == <?php echo e(CallStatuses::NOSHOW); ?> && !isCalled, 'disabled-color': token.call_status_id != <?php echo e(CallStatuses::NOSHOW); ?> || isCalled }"><i class="material-icons" style="font-size: 22px; color:#fff">replay</i></div>
                      <h6 style="margin: 0px; font-size:20px; font-weight:600;">{{token.token_letter}}-{{token.token_number}}</h6>
                      <span style="background-color: #009688; padding: 0 5px; color:#fff; font-weight:600; min-width:22px" v-if="token.call_status_id == <?php echo e(CallStatuses::SERVED); ?>">S</span>
                      <span style="background-color: #ff0000; padding: 0 5px; color:#fff; font-weight:600; min-width:22px" v-if="token.call_status_id != <?php echo e(CallStatuses::SERVED); ?>">N</span>
                      <!-- <i class="material-icons" style="font-size: 25px; color:#b3b3b3">expand_more</i> -->
                    </div>
                  </li>                
              </div>
            </div>
    </aside>
  </div>

  <!-- </div> -->
  <!-- BEGIN: Footer-->
  <!-- <footer class="page-footer footer footer-static navbar-border navbar-shadow noprint">
    <div class="footer-copyright">
      <div class="container" style="display: flex; justify-content: end;">Powered by&nbsp;<a href="https://www.justlabtech.com" target="_blank" style="color:#ffffff;font-weight: bolder;">Justlab Technologies</a>&nbsp;All rights reserved.</div>
    </div>
  </footer> -->

  <?php echo $__env->yieldContent('b-js'); ?>
  <!-- BEGIN VENDOR JS-->
  <script src="<?php echo e(asset('app-assets/js/loader/modernizr-2.6.2.min.js')); ?>"></script>
  <script src="<?php echo e(asset('app-assets/js/vendors.min.js')); ?>"></script>
  <script src="<?php echo e(asset('/js/app.js')); ?>"></script>
  <script src="<?php echo e(asset('app-assets/js/plugins.js')); ?>"></script>
  <script src="<?php echo e(asset('app-assets/js/voice.js')); ?>"></script>
  <!--<script src="https://code.responsivevoice.org/responsivevoice.js?key=9bM5BpJH"></script>-->
  <script src="<?php echo e(asset('app-assets/vendors/jquery-validation/jquery.validate.min.js')); ?>"></script>

  <!-- BEGIN VENDOR JS-->
  <?php echo $__env->yieldContent('js'); ?>
  <script>
    $(document).on("click", 'a.frmsubmit', function(e) {
      var message = '';
      if (e.currentTarget.attributes.message != undefined) {
        message = e.currentTarget.attributes.message.value;
      } else {
        message = 'Are you sure you want delete ?';
      }
      if (message != 'false') {
        if (confirm(message)) {
          e.preventDefault();
          var myForm = '<form id="hidfrm" action="' + e.currentTarget.attributes.href.value + '" method="post"><?php echo e(@csrf_field()); ?><input type="hidden" name="_method" value="' + e.currentTarget.attributes.method.value + '"></form>';
          $('body').append(myForm);
          myForm = $('#hidfrm');
          myForm.submit();
        }
      } else {
        e.preventDefault();
        var myForm = '<form id="hidfrm" action="' + e.currentTarget.attributes.href.value + '" method="post"><?php echo e(@csrf_field()); ?><input type="hidden" name="_method" value="' + e.currentTarget.attributes.method.value + '"></form>';
        $('body').append(myForm);
        myForm = $('#hidfrm');
        myForm.submit();
      }
      return false;
    });
  </script>
  <script>
    function changeLanguage(id) {
      $('body').removeClass('loaded');
      var data = "language=" + id + '&_token=<?php echo e(csrf_token()); ?>';
      $.ajax({
        type: "POST",
        url: "<?php echo e(Route('change_session_language')); ?>",
        data: data,
        cache: false,
        success: function(response) {
          location.reload(true);
        },
        error: function() {
          $('body').addClass('loaded');
          M.toast({
            html: 'something went wrong',
            classes: "toast-error"
          });
        }
      });
    }
  </script>
  <?php echo $__env->make('common.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/layout/call_page.blade.php ENDPATH**/ ?>