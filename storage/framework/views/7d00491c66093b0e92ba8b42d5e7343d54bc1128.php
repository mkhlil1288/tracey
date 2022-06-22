
<?php $__env->startSection('head'); ?>
    <style type="text/css">
        html, body {
            background: #f0f0f0;
        }
        .bravo_topbar, .bravo_header, .bravo_footer {
            display: none;
        }
        .invoice-amount {
            margin-top: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px 20px;
            display: inline-block;
            text-align: center;
        }
        .table-service-head {
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .table-service-head th {
            padding: 5px 15px;
        }
        #invoice-print-zone {
            background: white;
            padding: 15px;
            margin: 60px auto 40px auto;
            max-width: 400px;
            border-radius: 7px;
        }
        .invoice-company-info{
            margin-top: 15px;
        }
        .invoice-company-info p{
            margin-bottom: 2px;
            font-weight: normal;
        }
        .servive-name{
            font-size: 18px;
            font-weight: bold;
            color: #5191fa;

        }
        .service-location{

            font-style: italic;
        }
        .service-info{
            margin-bottom: 14px;
        }
        .ticket-body{

            border-top: dashed 1px #dfdfdf;
            padding-top: 20px;
        }
        .ticket-body td{
            padding-bottom: 20px;
            vertical-align: top;
        }
        .ticket-body .label{
            color: #868686;
            margin-bottom: 5px;
        }
        .ticket-body .val{
            font-weight: 600;
            font-size: 15px;
        }
        .list-ticket{
            list-style: none;
        }
        .ticket-footer{
            margin-top: 20px;
            border-top: dashed 1px #dfdfdf;
            padding-top: 20px;
        }
        @media(max-width: 400px){
            #invoice-print-zone{
                margin-left: 15px;
                margin-right: 15px;
            }
        }
    </style>
    <link href="<?php echo e(asset('module/user/css/user.css')); ?>" rel="stylesheet">
    <script>
        window.print();
    </script>
    <div id="invoice-print-zone">
        <div class="ticket-content">
            <div class="ticket-header d-flex justify-content-between">
                <div class="service-info">
                    <div class="servive-name"><?php echo e($booking->service->title ?? ''); ?></div>
                    <div class="service-location"><i class="fa fa-map-marker"></i> <?php echo e($booking->service->address ??''); ?></div>
                </div>
                <div class="print">
                    <button onclick="window.print()" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></button>
                </div>
            </div>
            <div class="ticket-body">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="50%"><div class="label"><i class="fa fa-calendar"></i> <?php echo e(__("Date")); ?></div>
                        <div class="val"><?php echo e(display_date($booking->start_date)); ?></div>
                        </td>
                        <td><div class="label"><i class="fa fa-money"></i> <?php echo e(__("Price")); ?></div>
                        <div class="val"><?php echo e(format_money($booking->total)); ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if($booking->getMeta("booking_type") == "ticket"): ?>
                                <div class="label"><i class="fa fa-ticket"></i> <?php echo e(__("Ticket")); ?></div>
                                <div class="val">
                                    <?php if($meta = $booking->getMeta('ticket_types') and !empty(json_decode($meta,true))): ?>
                                        <ul class="list-ticket">
                                            <?php $__currentLoopData = json_decode($meta,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($ticket_type['number'])): ?>
                                                    <li><?php echo e($ticket_type['name'] ?? ''); ?> x <?php echo e($ticket_type['number']); ?></li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($booking->getMeta("booking_type") == "time_slot"): ?>
                                    <div class="label"><i class="fa fa-ticket"></i> <?php echo e(__("Start Time")); ?></div>
                                    <div class="val">
                                        <div class="slots-wrapper d-flex justify-content-start flex-wrap">
                                            <?php if(!empty($timeSlots = $booking->time_slots)): ?>
                                                <?php $__currentLoopData = $timeSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="btn btn-sm mr-2 mb-2 btn-success">
                                                        <?php echo e(date( "H:i",strtotime($item->start_time))); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                            <?php endif; ?>
                        </td>
                        <td><div class="label"><i class="fa fa-user"></i> <?php echo e(__("Customer")); ?></div>
                            <div class="val"><?php echo e($booking->first_name); ?> <?php echo e($booking->last_name); ?>

                                <br>
                                <?php echo e($booking->email); ?><br>
                                <?php echo e($booking->phone); ?>

                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="ticket-footer">
                <div class="text-center"><?php echo e(__("Show QR Code at the counter")); ?></div>

                <div class="qr-content text-center">
                    <?php echo QrCode::size(200)->generate($booking->id.'.'.\Illuminate\Support\Facades\Hash::make($booking->id)); ?>

                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset("module/user/js/user.js")); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout::empty', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m5lil/Sites/mytravel/themes/Base/User/Views/frontend/booking/ticket.blade.php ENDPATH**/ ?>