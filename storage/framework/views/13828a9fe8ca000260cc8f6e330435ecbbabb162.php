<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('dashboard','active'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/pages/data-tables.css')); ?>">
<?php $__env->stopSection(); ?>
<!-- BEGIN: Page Main-->
<div id="main">
   <div id="card-stats" class="pt-0">
      <div class="row">
         <div class="col s12 m6 l3">
            <div class="card animate fadeLeft">
               <div class="card-content cyan white-text">
                  <p class="card-stats-title"><?php echo e(__('messages.dashboard.today queue')); ?></p>
                  <h4 class="card-stats-number white-text"><?php echo e($today_queue); ?></h4>
                  <p class="card-stats-compare">
                  </p>
               </div>
               <div class="card-action cyan darken-1">
                  <div id="clients-bar" class="center-align"></div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l3">
            <div class="card animate fadeLeft">
               <div class="card-content red accent-2 white-text">
                  <p class="card-stats-title"><?php echo e(__('messages.dashboard.today served')); ?></p>
                  <h4 class="card-stats-number white-text"><?php echo e($today_served); ?></h4>
                  <p class="card-stats-compare">
                  </p>
               </div>
               <div class="card-action red">
                  <div id="sales-compositebar" class="center-align"></div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l3">
            <div class="card animate fadeRight">
               <div class="card-content orange lighten-1 white-text">
                  <p class="card-stats-title"> <?php echo e(__('messages.dashboard.today noshow')); ?></p>
                  <h4 class="card-stats-number white-text"><?php echo e($today_noshow); ?></h4>
                  <p class="card-stats-compare">
                  </p>
               </div>
               <div class="card-action orange">
                  <div id="profit-tristate" class="center-align"></div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l3">
            <div class="card animate fadeRight">
               <div class="card-content green lighten-1 white-text">
                  <p class="card-stats-title"> <?php echo e(__('messages.dashboard.today serving')); ?></p>
                  <h4 class="card-stats-number white-text"><?php echo e($today_serving); ?></h4>
                  <p class="card-stats-compare">
                  </p>
               </div>
               <div class="card-action green">
                  <div id="invoice-line" class="center-align"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class=row>
      <div class="col m6 s12">
         <div class=card-panel>
            <span style="line-height:0;font-size:22px;font-weight:300"><?php echo e(__('messages.dashboard.today')); ?></span>
            <div class=divider style="margin:15px 0 10px 0"></div>
            <div><canvas id="avg" height="260px"></canvas></div>
         </div>
      </div>
      <div class="col m6 s12">
         <div class=card-panel>
            <span style="line-height:0;font-size:22px;font-weight:300"><?php echo e(__('messages.dashboard.today vs yesterday')); ?></span>
            <div class=divider style="margin:15px 0 10px 0"></div>
            <div><canvas id="chart2" height="260px"></canvas></div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('app-assets/chart.js')); ?>"></script>
<script>
   var ChartData = {
      labels: [
         "<?php echo e(__('messages.common.queue')); ?>",
         "<?php echo e(__('messages.common.served')); ?>",
         "<?php echo e(__('messages.common.noshow')); ?>",
         "<?php echo e(__('messages.common.serving')); ?>",
      ],
      datasets: [{
         label: 'Today',
         backgroundColor: [
            'rgb(0, 188, 212)',
            'rgb(255, 82, 82)',
            'rgb(255, 167, 38)',
            'rgb(102, 187, 106)',
         ],
         data: ['<?php echo e($today_queue); ?>', '<?php echo e($today_served); ?>', '<?php echo e($today_noshow); ?>', '<?php echo e($today_serving); ?>'],
         hoverOffset: 4,
      }]
   };

   const LineChartData = {
      labels: ['00:00', '6:00', '12:00', '18:00', '24:00'],
      datasets: [{
            label: "<?php echo e(__('messages.dashboard.today')); ?>",
            data: [<?php $__currentLoopData = $chart_data['today']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($indx == 0): ?> <?php echo "'$data'"; ?>
               <?php else: ?> <?php echo ", '$data'"; ?>
               <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            borderColor: ['rgb(54, 162, 235)', ],
            backgroundColor: ['rgb(255,255,255)'],
            pointStyle: 'circle',
            pointRadius: 10,
            pointHoverRadius: 15,

         },
         {
            label: "<?php echo e(__('messages.dashboard.yesterday')); ?>",
            data: [<?php $__currentLoopData = $chart_data['yesterday']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indx => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($indx == 0): ?> <?php echo "'$data'"; ?>
               <?php else: ?> <?php echo ", '$data'"; ?>
               <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            borderColor: ['rgb(255, 99, 132)', ],
            backgroundColor: ['rgb(255,255,255)'],
            pointStyle: 'circle',
            pointRadius: 10,
            pointHoverRadius: 15
         }
      ]
   };

   $(document).ready(function() {
      $('.datepicker').datepicker({
         format: 'yyyy-mm-dd'
      });

      var ctx = document.getElementById("avg").getContext("2d");
      window.myBar = new Chart(ctx, {
         type: 'pie',
         data: ChartData,
         options: {
            maintainAspectRatio: false,
            radius: 100,
            responsive: true,
         }
      });

      var c2 = document.getElementById("chart2").getContext("2d");
      window.myBar2 = new Chart(c2, {
         type: 'line',
         data: LineChartData,
         options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
               y: {
                  min: 0,
                  title: {
                     display: true,
                     text: "<?php echo e(__('messages.dashboard.number of tokens')); ?>"
                  },
                  ticks: {
                     stepSize: 1,
                  }
               },
               x: {
                  title: {
                     display: true,
                     text: "<?php echo e(__('messages.dashboard.time')); ?>"
                  },
               }
            },
         }
      });

   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/milan/Desktop/Work/token_backened/resources/views/dashboard/index.blade.php ENDPATH**/ ?>