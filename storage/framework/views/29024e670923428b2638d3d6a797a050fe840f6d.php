<div class="sidebar position-fixed border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="z-index: 9999;">
    <div class="offcanvas-md offcanvas-start bg-body-tertiary" tabindex="-1" id="sidebarMenu"
         aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel"><?php echo e(config('devstarit.app_name')); ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                    aria-label="Close"></button>
        </div>

        <div class="offcanvas-body position-static sidebar-sticky d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto"
             style="background-color: #202C46 !important;">
            <ul class="nav flex-column">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view dashboard')): ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                       href="/dashboard">
                        <span data-feather="home" class="align-text-bottom"></span>
                        Dashboard
                    </a>
                </li>
                <?php endif; ?>   
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                    <li class="nav-item">
                        <a class="nav-link "
                           href="">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Users
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="">
                            <span data-feather="shield" class="align-text-bottom"></span>
                            Permissions
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="">
                            <span data-feather="disc" class="align-text-bottom"></span>
                            Roles
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('post_access')): ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Posts
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_access')): ?>
                    <li class="nav-item">
                        <a class="nav-link "
                           href="">
                            <span data-feather="list" class="align-text-bottom"></span>
                            Categories
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tag_access')): ?>
                    <li class="nav-item">
                        <a class="nav-link "
                           href="">
                            <span data-feather="tag" class="align-text-bottom"></span>
                            Tags
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Setting</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                </a>
            </h6>
            <ul class="nav flex-column mb-2">
                
                <li class="nav-item">
                    <a class="nav-link "
                       href="">
                        <span data-feather="user" class="align-text-bottom"></span>
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "
                       href="">
                        <span data-feather="key" class="align-text-bottom"></span>
                        Change Password
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/layout/menu1.blade.php ENDPATH**/ ?>