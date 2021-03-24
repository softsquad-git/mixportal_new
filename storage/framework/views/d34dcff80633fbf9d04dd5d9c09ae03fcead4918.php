<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo e($invoice->name); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <link rel="stylesheet" href="<?php echo e(public_path('/vendor/invoices/bootstrap.min.css')); ?>">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style type="text/css" media="screen">
            * {
                font-family: "DejaVu Sans";
            }
            html {
                margin: 0;
            }
            body {
                font-size: 10px;
                margin: 36pt;
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }

            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 1rem;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #eceeef;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #eceeef;
            }

            .table tbody + tbody {
                border-top: 2px solid #eceeef;
            }

            .table .table {
                background-color: #fff;
            }

            .table-sm th,
            .table-sm td {
                padding: 0.3rem;
            }

            .table-bordered {
                border: 1px solid #eceeef;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #eceeef;
            }

            .table-bordered thead th,
            .table-bordered thead td {
                border-bottom-width: 2px;
            }

            .table-striped tbody tr:nth-of-type(odd) {
                background-color: rgba(0, 0, 0, 0.05);
            }

            .table-hover tbody tr:hover {
                background-color: rgba(0, 0, 0, 0.075);
            }

            .table-active,
            .table-active > th,
            .table-active > td {
                background-color: rgba(0, 0, 0, 0.075);
            }

            .table-hover .table-active:hover {
                background-color: rgba(0, 0, 0, 0.075);
            }

            .table-hover .table-active:hover > td,
            .table-hover .table-active:hover > th {
                background-color: rgba(0, 0, 0, 0.075);
            }

            .table-success,
            .table-success > th,
            .table-success > td {
                background-color: #dff0d8;
            }

            .table-hover .table-success:hover {
                background-color: #d0e9c6;
            }

            .table-hover .table-success:hover > td,
            .table-hover .table-success:hover > th {
                background-color: #d0e9c6;
            }

            .table-info,
            .table-info > th,
            .table-info > td {
                background-color: #d9edf7;
            }

            .table-hover .table-info:hover {
                background-color: #c4e3f3;
            }

            .table-hover .table-info:hover > td,
            .table-hover .table-info:hover > th {
                background-color: #c4e3f3;
            }

            .table-warning,
            .table-warning > th,
            .table-warning > td {
                background-color: #fcf8e3;
            }

            .table-hover .table-warning:hover {
                background-color: #faf2cc;
            }

            .table-hover .table-warning:hover > td,
            .table-hover .table-warning:hover > th {
                background-color: #faf2cc;
            }

            .table-danger,
            .table-danger > th,
            .table-danger > td {
                background-color: #f2dede;
            }

            .table-hover .table-danger:hover {
                background-color: #ebcccc;
            }

            .table-hover .table-danger:hover > td,
            .table-hover .table-danger:hover > th {
                background-color: #ebcccc;
            }

            .thead-inverse th {
                color: #fff;
                background-color: #292b2c;
            }

            .thead-default th {
                color: #464a4c;
                background-color: #eceeef;
            }

            .table-inverse {
                color: #fff;
                background-color: #292b2c;
            }

            .table-inverse th,
            .table-inverse td,
            .table-inverse thead th {
                border-color: #fff;
            }

            .table-inverse.table-bordered {
                border: 0;
            }

            .table-responsive {
                display: block;
                width: 100%;
                overflow-x: auto;
                -ms-overflow-style: -ms-autohiding-scrollbar;
            }

            .table-responsive.table-bordered {
                border: 0;
            }


        </style>
    </head>

    <body>
        
        <?php if($invoice->logo): ?>
            <img src="<?php echo e($invoice->getLogo()); ?>" alt="logo" height="100">
        <?php endif; ?>
        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%">
                        <h4 class="text-uppercase">
                            <strong><?php echo e(__('invoice.name')); ?></strong>
                        </h4>
                    </td>
                    <td class="border-0 pl-0">
                        <p><?php echo e(__('invoice.serial')); ?> <strong><?php echo e($invoice->getSerialNumber()); ?></strong></p>
                        <p><?php echo e(__('invoice.date')); ?>: <strong><?php echo e($invoice->getDate()); ?></strong></p>
                    </td>
                </tr>
            </tbody>
        </table>

        
        <table class="table">
            <thead>
                <tr>
                    <th class="border-0 pl-0 party-header" width="48.5%">
                        <?php echo e(__('invoice.seller')); ?>

                    </th>
                    <th class="border-0" width="3%"></th>
                    <th class="border-0 pl-0 party-header">
                        <?php echo e(__('invoice.buyer')); ?>

                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-0">
                        <?php if($invoice->seller->name): ?>
                            <p class="seller-name">
                                <strong><?php echo e($invoice->seller->name); ?></strong>
                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->address): ?>
                            <p class="seller-address">
                                <?php echo e(__('invoice.address')); ?>: <?php echo e($invoice->seller->address); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->code): ?>
                            <p class="seller-code">
                                <?php echo e(__('invoice.code')); ?>: <?php echo e($invoice->seller->code); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->vat): ?>
                            <p class="seller-vat">
                                <?php echo e(__('invoice.vat')); ?>: <?php echo e($invoice->seller->vat); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->seller->phone): ?>
                            <p class="seller-phone">
                                <?php echo e(__('invoice.phone')); ?>: <?php echo e($invoice->seller->phone); ?>

                            </p>
                        <?php endif; ?>

                        <?php $__currentLoopData = $invoice->seller->custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="seller-custom-field">
                                <?php echo e(ucfirst($key)); ?>: <?php echo e($value); ?>

                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="border-0"></td>
                    <td class="px-0">
                        <?php if($invoice->buyer->name): ?>
                            <p class="buyer-name">
                                <strong><?php echo e($invoice->buyer->name); ?></strong>
                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->address): ?>
                            <p class="buyer-address">
                                <?php echo e(__('invoice.address')); ?>: <?php echo e($invoice->buyer->address); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->code): ?>
                            <p class="buyer-code">
                                <?php echo e(__('invoice.code')); ?>: <?php echo e($invoice->buyer->code); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->vat): ?>
                            <p class="buyer-vat">
                                <?php echo e(__('invoice.vat')); ?>: <?php echo e($invoice->buyer->vat); ?>

                            </p>
                        <?php endif; ?>

                        <?php if($invoice->buyer->phone): ?>
                            <p class="buyer-phone">
                                <?php echo e(__('invoice.phone')); ?>: <?php echo e($invoice->buyer->phone); ?>

                            </p>
                        <?php endif; ?>

                        <?php $__currentLoopData = $invoice->buyer->custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="buyer-custom-field">
                                <?php echo e(ucfirst($key)); ?>: <?php echo e($value); ?>

                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
            </tbody>
        </table>

        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="border-0 pl-0"><?php echo e(__('invoice.description')); ?></th>
                    <?php if($invoice->hasItemUnits): ?>
                        <th scope="col" class="text-center border-0"><?php echo e(__('invoice.units')); ?></th>
                    <?php endif; ?>
                    <th scope="col" class="text-center border-0"><?php echo e(__('invoice.quantity')); ?></th>
                    <th scope="col" class="text-right border-0"><?php echo e(__('invoice.price')); ?></th>
                    <?php if($invoice->hasItemDiscount): ?>
                        <th scope="col" class="text-right border-0"><?php echo e(__('invoice.discount')); ?></th>
                    <?php endif; ?>
                    <?php if($invoice->hasItemTax): ?>
                        <th scope="col" class="text-right border-0"><?php echo e(__('invoice.tax')); ?></th>
                    <?php endif; ?>
                    <th scope="col" class="text-right border-0 pr-0"><?php echo e(__('invoice.sub_total')); ?></th>
                </tr>
            </thead>
            <tbody>
                
                <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="pl-0"><?php echo e($item->title); ?></td>
                    <?php if($invoice->hasItemUnits): ?>
                        <td class="text-center"><?php echo e($item->units); ?></td>
                    <?php endif; ?>
                    <td class="text-center"><?php echo e($item->quantity); ?></td>
                    <td class="text-right">
                        <?php echo e($invoice->formatCurrency($item->price_per_unit)); ?>

                    </td>
                    <?php if($invoice->hasItemDiscount): ?>
                        <td class="text-right">
                            <?php echo e($invoice->formatCurrency($item->discount)); ?>

                        </td>
                    <?php endif; ?>
                    <?php if($invoice->hasItemTax): ?>
                        <td class="text-right">
                            <?php echo e($invoice->formatCurrency($item->tax)); ?>

                        </td>
                    <?php endif; ?>

                    <td class="text-right pr-0">
                        <?php echo e($invoice->formatCurrency($item->sub_total_price)); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php if($invoice->hasItemOrInvoiceDiscount()): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoice.total_discount')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->total_discount)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->taxable_amount): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoice.taxable_amount')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->taxable_amount)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->tax_rate): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoice.tax_rate')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->tax_rate); ?>%
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->hasItemOrInvoiceTax()): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoice.total_taxes')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->total_taxes)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php if($invoice->shipping_amount): ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoice.shipping')); ?></td>
                        <td class="text-right pr-0">
                            <?php echo e($invoice->formatCurrency($invoice->shipping_amount)); ?>

                        </td>
                    </tr>
                <?php endif; ?>
                    <tr>
                        <td colspan="<?php echo e($invoice->table_columns - 2); ?>" class="border-0"></td>
                        <td class="text-right pl-0"><?php echo e(__('invoice.total_amount')); ?></td>
                        <td class="text-right pr-0 total-amount">
                            <?php echo e($invoice->formatCurrency($invoice->total_amount)); ?>

                        </td>
                    </tr>
            </tbody>
        </table>

        <?php if($invoice->notes): ?>
            <p>
                <?php echo e(trans('invoice.notes')); ?>: <?php echo $invoice->notes; ?>

            </p>
        <?php endif; ?>

        <p>

        </p>
        <p>
            Płatność: Zapłacono
        </p>

        <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
    </body>
</html>
<?php /**PATH /home/informackr/www/resources/views/vendor/invoices/templates/default.blade.php ENDPATH**/ ?>