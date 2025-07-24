<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-rounded">
  <div class="brand-sidebar">
    <h1 class="logo-wrapper">
      <a class="brand-logo darken-1" style="top: 4px; left: 31px;">
        <span class="logo-text hide-on-med-and-down" style="color: #fff; font-weight:bold">Digiimpact</span></a>
      <a class="navbar-toggler" href="#"><i class="material-icons" style="color: #fff;">radio_button_checked</i></a>
    </h1>
  </div>
  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" style="padding-top: 20px; padding-left:0" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view dashboard')): ?>
    <li class="bold"><a class="waves-effect waves-cyan <?php echo $__env->yieldContent('dashboard'); ?>" href="/dashboard" style="padding-top: 10px;"><i class="material-icons">dashboard</i><span class="menu-title" data-i18n="ToDo"><?php echo e(__('messages.menu.dashboard')); ?></span></a>
    </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('call token')): ?>
    <li class="bold"><a class="waves-effect waves-cyan <?php echo $__env->yieldContent('call'); ?> " href="<?php echo e(route('show_call_page')); ?>"><i class="material-icons">call</i><span class="menu-title" data-i18n="Kanban"><?php echo e(__('messages.menu.call')); ?></span></a>
    </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view counters')): ?>
    <li class="bold"><a class="waves-effect waves-cyan <?php echo $__env->yieldContent('counter'); ?> " href="<?php echo e(route('counters.index')); ?>"><i class="material-icons">dvr</i><span class="menu-title" data-i18n="Kanban"><?php echo e(__('messages.menu.counters')); ?></span></a>
    </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view services')): ?>
    <li class="bold"><a class="waves-effect waves-cyan <?php echo $__env->yieldContent('service'); ?> " href="<?php echo e(route('services.index')); ?>"><i class="material-icons">business_center</i><span class="menu-title" data-i18n="Kanban"><?php echo e(__('messages.menu.services')); ?></span></a>
    </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view reports')): ?>
    <li class="bold <?php echo $__env->yieldContent('report'); ?>"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">content_paste</i><span class="menu-title" data-i18n="Pages"><?php echo e(__('messages.menu.reports')); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li class="<?php echo $__env->yieldContent('user_report'); ?>"><a class="<?php echo $__env->yieldContent('user_report'); ?>" href="<?php echo e(route('user_report')); ?>"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Contact"><?php echo e(__('messages.menu.user report')); ?></span></a>
          </li>
          <li class="<?php echo $__env->yieldContent('queue_list_report'); ?>"><a class="<?php echo $__env->yieldContent('queue_list_report'); ?>" href="<?php echo e(route('queue_list_report')); ?>"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Blog"><?php echo e(__('messages.menu.queue list')); ?></span></a>
          </li>
          <li class="<?php echo $__env->yieldContent('monthly_report'); ?>"><a class="<?php echo $__env->yieldContent('monthly_report'); ?>" href="<?php echo e(route('monthly_report')); ?>"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Search"><?php echo e(__('messages.menu.monthly report')); ?></span></a>
          </li>
          <!-- <li class="<?php echo $__env->yieldContent('statitical_report'); ?>"><a  class="<?php echo $__env->yieldContent('statitical_report'); ?>" href="<?php echo e(route('statitical_report')); ?>"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Knowledge">Statitical</span></a>
              </li> -->
    </li>
    </li>
  </ul>
  </div>
  </li>
  <?php endif; ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view users')): ?>
  <li class="bold"><a class="waves-effect waves-cyan <?php echo $__env->yieldContent('user'); ?> " href="<?php echo e(route('users.index')); ?>"><i class="material-icons">people</i><span class="menu-title" data-i18n="Kanban"><?php echo e(__('messages.menu.users')); ?></span></a>
  </li>
  <?php endif; ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view user_roles')): ?>
  <li class="bold"><a class="waves-effect waves-cyan <?php echo $__env->yieldContent('roles'); ?> " href="<?php echo e(route('roles.index')); ?>"><i class="material-icons">verified_user</i><span class="menu-title" data-i18n="Kanban"><?php echo e(__('messages.menu.user roles')); ?></span></a>
  </li>
  <?php endif; ?>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view settings')): ?>
  <li class="bold"><a class="waves-effect waves-cyan <?php echo $__env->yieldContent('settings'); ?>" href="<?php echo e(route('settings')); ?>"><i class="material-icons">settings</i><span class="menu-title" data-i18n="Kanban"><?php echo e(__('messages.menu.settings')); ?></span></a>
  </li>
  <?php endif; ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view profile')): ?>
  <li class="bold"><a class="waves-effect waves-cyan <?php echo $__env->yieldContent('profile'); ?> " href="<?php echo e(route('profile')); ?>"><i class="material-icons">person</i><span class="menu-title" data-i18n="Kanban"><?php echo e(__('messages.common.profile')); ?></span></a>
  </li>
  <?php endif; ?>
  <li class="bold"><a class="waves-effect waves-cyan <?php echo $__env->yieldContent('qr-code'); ?> " href="<?php echo e(route('qr-code')); ?>"><i class="material-icons">share</i><span class="menu-title" data-i18n="Kanban">Qr Code</span></a>
  </li>

  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside><?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/layout/menu.blade.php ENDPATH**/ ?>