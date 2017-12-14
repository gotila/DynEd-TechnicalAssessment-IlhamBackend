<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#UTable').DataTable({
            "dom": '<"row"r>t<"row"<"col-md-6"i><"col-md-6"p>><"clear">',
            "order": [[ 0, "desc" ]],
            "pageLength": Settings.rows_per_page,
            "processing": false, "serverSide": false,
            "buttons": []
        });
    });
</script>

<section class="content">
   <div class="row">
         <div class="col-xs-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?= lang('list_results'); ?></h3>
                </div>
                <div class="box-body">
                   <table id="UTable" class="table table-bordered table-striped table-hover">
                        <thead class="cf">
                        <tr>
                            <th><?php echo lang('first_name'); ?></th>
                            <th><?php echo lang('last_name'); ?></th>
                            <th><?php echo lang('email'); ?></th>
                            <th><?php echo lang('group'); ?></th>
                            <th><?php echo lang('store'); ?></th>
                            <th style="width:100px;"><?php echo lang('status'); ?></th>
                            <th style="width:80px;"><?php echo lang('actions'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($users as $user) {
                            echo '<tr>';
                            echo '<td>' . $user->first_name . '</td>';
                            echo '<td>' . $user->last_name . '</td>';
                            echo '<td>' . $user->email . '</td>';
                            echo '<td>' . $user->group . '</td>';
                            echo '<td>' . $user->store . '</td>';
                            echo '<td class="text-center" style="padding:6px;">' . ($user->active ? '<span class="label label-success">' . lang('active') . '</span' : '<span class="label label-danger">' . lang('inactive') . '</span>') . '</td>';
                            echo '<td class="text-center" style="padding:6px;"><div class="btn-group btn-group-justified" role="group"><div class="btn-group btn-group-xs" role="group"><a class="tip btn btn-warning btn-xs" title="' . lang("profile") . '" href="' . site_url('users/profile/' . $user->id) . '"><i class="fa fa-edit"></i></a></div>
                            <div class="btn-group btn-group-xs" role="group"><a class="tip btn btn-danger btn-xs" title="' . lang("delete_user") . '" href="' . site_url('auth/delete/' . $user->id) . '" onclick="return confirm(\''.lang('alert_x_user').'\')"><i class="fa fa-trash-o"></i></a></div></div></td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
           
        <div class="row">
        <div class="col-sm-4">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title"><?= lang('daily_sales'); ?></h3>
                </div>
                <div class="box-body">
                   <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="info-box bg-aqua">
                                    <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?= lang('sales_value'); ?></span>
                                        <span class="info-box-number"><?= $this->tec->formatMoney($total_sales->total_amount) ?></span>
                                        <div class="progress">
                                            <div style="width: 100%" class="progress-bar"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?= $total_sales->total .' ' . lang('sales'); ?> |
                                            <?= $this->tec->formatMoney($total_sales->paid) . ' ' . lang('received') ?> |
                                            <?= $this->tec->formatMoney($total_sales->tax) . ' ' . lang('tax') ?>
                                        </span>
                                    </div>
                                </div>
                            </div>


                      <div class="col-sm-12">
                        <div class="row">        
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-plus"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?= lang('purchases_value'); ?></span>
                                        <span class="info-box-number"><?= $this->tec->formatMoney($total_purchases->total_amount) ?></span>
                                        <div class="progress">
                                            <div style="width: 0%" class="progress-bar"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?= $total_purchases->total ?> <?= lang('purchases'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                      
                        </section>
