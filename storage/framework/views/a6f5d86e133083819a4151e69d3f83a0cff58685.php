
<?php $__env->startSection('content'); ?>
<!-- BEGIN: Page Main-->
<div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<div id="main" class="noprint" style="padding: 15px 15px 0px; ">
   
        <section class="content-wrapper no-print">
            <div class="container no-print">
                <div class="row">
                <div class="col s12">
                 <div class="card" id="service-btn-container">
              <div class="card-content center-align">
              <span class="card-title" style="line-height: 3; font-size: 22px; margin-bottom: 10px;">
                <?php echo e(__('messages.issue_token.click one service to issue token')); ?>

                  </span>
                   </div>
                  </div>
                 </div>
                    <!-- <div class="col s12">
                        <div class="card"  style="display:flex; justify-content: center; align-items: center; " id="service-btn-container">
                        <span class="card-title" style="line-height:3;font-size:22px;margin-bottom:10px"> <?php echo e(__('messages.issue_token.click one service to issue token')); ?></span>
                    </div>  -->
                             <div class="divider" style="margin:10px 0 10px 0"></div>

                 
        </div>
            </div>
        </section>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="display: flex; justify-content: center;">
                 <div class="btn btn-large btn-queue waves-effect waves-light mr-2  mb-1" id="service_id_24" style="background: #00BFFF" onclick="queueDept(<?php echo e($service); ?>)"><?php echo e($service->name); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>      
                  
                    <form action="<?php echo e(route('create-token')); ?>" method="post" id="my-form-two" style="display: none;">
                        <?php echo e(csrf_field()); ?>



                    </form>
  
    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer" style="max-height: 30%; width:80%">
        <form id="details_form">
            <div class="modal-content" style="padding-bottom:0">
                <div id="inline-form">
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s4" id="name_tab">
                                <input id="name" name="name" type="text" value="" data-error=".name">
                                <label for="name"><?php echo e(__('messages.settings.name')); ?></label>
                                <div class="name">

                                </div>
                            </div>
                            <div class="input-field col s4" id="phone_tab">
                                <input id="phone" name="phone" type="text" value="" data-error=".phone">
                                <label for="phone"><?php echo e(__('messages.settings.phone')); ?></label>
                                <div class="phone">

                                </div>
                            </div>
                            <div class="input-field col s4" id="email_tab">
                                <input id="email" name="email" type="email" value="" data-error=".email">
                                <label for="email"><?php echo e(__('messages.settings.email')); ?></label>
                                <div class="email">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="modal_button" type="submit" class="modal-action waves-effect waves-green btn-flat" style="background: #009688; color:#fff" onclick="issueToken()"><?php echo e(__('messages.common.submit')); ?></button>
            </div>
            <form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<div id="printarea" class="printarea" style="text-align:center;margin-top: 20px; display:none">
</div>
<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function() {
        $('body').addClass('loaded');
        $('.modal').modal();
    })
    var service;

    function queueDept(value) {
        if (value.ask_email == 1 || value.ask_name == 1 || value.ask_phone == 1) {
            if (value.ask_email == 1) $('#email_tab').show();
            else $('#email_tab').hide();
            if (value.ask_name == 1) $('#name_tab').show();
            else $('#name_tab').hide();
            if (value.ask_phone == 1) $('#phone_tab').show();
            else $('#phone_tab').hide()
            service = value;
            $('#modal_button').removeAttr('disabled');
            $('#modal1').modal('open');
        } else {
            $('body').removeClass('loaded');
            let data = {
                service_id: value.id,
                with_details: false
            }
            createToken(data);
        }
    }

    function issueToken() {
        $('#details_form').validate({
            rules: {
                name: {
                    required: function(element) {
                        return service.name_required == "1";
                    },
                },
                email: {
                    required: function(element) {
                        return service.email_required == "1";
                    },
                    email: true
                },
                phone: {
                    required: function(element) {
                        return service.phone_required == "1";
                    },
                    number: true
                },
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                $('#modal_button').attr('disabled', 'disabled');
                $('body').removeClass('loaded');
                let data = {
                    service_id: service.id,
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    with_details: true
                }
                createToken(data);
            }
        });
    }

    function createToken(data) {
        $.ajax({
            type: "POST",
            url: "<?php echo e(route('create-token')); ?>",
            data: data,
            cache: false,
            success: function(response) {
                if (response.status_code == 200) {
                    $('#modal1').modal('close');
                    let html = `
                            <p style="font-size: 15px; font-weight: bold; margin-top:-15px;">` + response.settings.name + `,` + response.settings.location + `
                            </p>
                            <p style="font-size: 10px; margin-top:-15px;">` + response.queue.service.name + `</p>
                            <h3 style="font-size: 20px; margin-bottom: 5px; font-weight: bold; margin-top:-12px; margin-bottom:16px;">` + response.queue.letter + ` - ` + response.queue.number + `</h3>
                            <p style="font-size: 12px; margin-top: -16px;margin-bottom: 27px;">` + response.queue.formated_date + `</p>
                            <div style="margin-top:-20px; margin-bottom:15px;" align="center">
                            </div>
                            <p style="font-size: 10px; margin-top:-12px;"><?php echo e(__('messages.issue_token.please wait for your turn')); ?></p>
                            <p style="font-size: 10px; margin-top:-12px;"><?php echo e(__('messages.issue_token.customer waiting')); ?>:` + response.customer_waiting + ` 
                            </p>
                            <p style="text-align:left !important;font-size:8px;"></p>
                            <p style="text-align:right !important; margin-top:-23px;font-size:8px;"></p>`;
                    $('#printarea').html(html);
                    $('body').addClass('loaded');
                    window.print();
                } else if (response.status_code == 422 && response.errors && (response.errors['name'] || response.errors['email'] || response.errors['phone'])) {
                    $('#modal_button').removeAttr('disabled');
                    if (response.errors['name'] && response.errors['name'][0]) {
                        $('.name').html('<span class="text-danger errbk">' + response.errors['name'][0] + '</span>')
                    }
                    if (response.errors['email'] && response.errors['email'][0]) {
                        $('.email').html('<span class="text-danger errbk">' + response.errors['email'][0] + '</span>')
                    }
                    if (response.errors['phone'] && response.errors['phone'][0]) {
                        $('.phone').html('<span class="text-danger errbk">' + response.errors['phone'][0] + '</span>')
                    }
                    $('body').addClass('loaded');
                } else {
                    $('#modal1').modal('close');
                    $('body').addClass('loaded');
                    M.toast({
                        html: 'something went wrong',
                        classes: "toast-error"
                    });
                }
            },
            error: function() {
                $('body').addClass('loaded');
                $('#modal1').modal('close');
                M.toast({
                    html: 'something went wrong',
                    classes: "toast-error"
                });
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.call_page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Milan\Desktop\Work\token_backend\resources\views/issue_token/index.blade.php ENDPATH**/ ?>