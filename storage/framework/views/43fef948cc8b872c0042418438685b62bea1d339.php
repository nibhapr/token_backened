<?php if(session()->has('success')): ?>
<script>
    $(document).ready(function() {
        M.toast({
            html: "<?php echo e(session()->get('success')); ?>",
            classes: "toast-success"
        });
    })
</script>
<?php elseif(session()->has('warning')): ?>
<script>
    $(document).ready(function() {
        M.toast({
            html: "<?php echo e(session()->get('warning')); ?>",
            classes: "toast-warning"
        });
    })
</script>
<?php elseif(session()->has('error')): ?>
<script>
    $(document).ready(function() {
        M.toast({
            html: "<?php echo e(session()->get('error')); ?>",
            classes: "toast-error"
        });
    })
</script>
<?php endif; ?><?php /**PATH /Users/milan/Desktop/Apps/token_backend/resources/views/common/message.blade.php ENDPATH**/ ?>