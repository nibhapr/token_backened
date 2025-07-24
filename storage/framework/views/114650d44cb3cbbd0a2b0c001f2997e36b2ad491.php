<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Token</title>
  
</head>
<body style="text-align: center; border: 1px solid #000;background-color:aqua;">
        <h5><?php echo e($settings->name); ?></h5>
        <h5>Department:<?php echo e($queue->service->name); ?></h5>
        <p><?php echo e($queue->formated_date); ?></p>
        <h5> Token Number:<?php echo e($queue->token_number); ?></h5>
        <p class="instructions">Please wait for your trun</p>
        <h6 style = "color:red;">Customer waiting : <?php echo e($customer_waiting); ?></h6>    
</body>
</html>

                             <?php /**PATH C:\Users\Milan\Desktop\Work\token\resources\views/pdf/template.blade.php ENDPATH**/ ?>