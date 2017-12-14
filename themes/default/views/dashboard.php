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
                            <th style="width:100px;"><?php echo lang('status'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                
                        
                        <?php
                        foreach ($users as $group_id) {
                            echo '<tr>';
                            echo '<td>' . $group_id->first_name . '</td>';
                            echo '<td>' . $group_id->last_name . '</td>';
                            echo '<td>' . $group_id->email . '</td>';
                            echo '<td>' . $group_id->group . '</td>';
                            echo '<td class="text-center" style="padding:6px;">' 
                            . ($group_id->active ? '<span class="label label-success">' 
                            . lang('active') . '</span' : '<span class="label label-danger">' 
                            . lang('inactive') . '</span>') . '</td>';
                            // echo '<td class="text-center" style="padding:6px;"><div class="btn-group btn-group-justified" role="group"><div class="btn-group btn-group-xs" role="group"><a class="tip btn btn-warning btn-xs" title="' . lang("profile") . '" href="' . site_url('users/profile/' . $user->id) . '"><i class="fa fa-edit"></i></a></div>
                            // <div class="btn-group btn-group-xs" role="group"><a class="tip btn btn-danger btn-xs" title="' . lang("delete_user") . '" href="' . site_url('auth/delete/' . $user->id) . '" onclick="return confirm(\''.lang('alert_x_user').'\')"><i class="fa fa-trash-o"></i></a></div></div></td>';
                            // echo '</tr>';
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
                    <h3 class="box-title"><?= lang('Member'); ?></h3>
                </div>
                <div class="box-body">
                   <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="info-box bg-red">
                                    <span class="info-box-icon"><i class="fa fa-users"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?= lang('users'); ?></span>
                                        <span class="info-box-number"><?php echo $this->db->get('users')->num_rows();?> </span>
                                        <div class="progress">
                                            <div style="width: 100%" class="progress-bar"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?= $total_users->total ?> <?= lang('users'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>


                      <div class="col-sm-12">
                        <div class="row">        
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="info-box bg-yellow">
                                    <span class="info-box-icon"><i class="fa fa-exchange"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?= lang('connected_groups'); ?></span>
                                        <span class="info-box-number"><?php echo $this->db->get('groups')->num_rows();?></span>
                                        <div class="progress">
                                            <div style="width: 0%" class="progress-bar"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?= $total_purchases->total ?> <?= lang('Groups'); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </section>
                            
