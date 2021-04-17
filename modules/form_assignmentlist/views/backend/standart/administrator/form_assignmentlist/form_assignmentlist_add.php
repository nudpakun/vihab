
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<!-- <section class="content-header">
    <h1>
        Form Assignmentlist        <small><?= cclang('new', ['Form Assignmentlist']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/form_assignmentlist'); ?>">Form Assignmentlist</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section> -->
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">ท่ากายภาพ</h3>
                            <h5 class="widget-user-desc">เพิ่มท่ากายภาพบำบัด</h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_form_assignmentlist',
                            'class'   => 'form-horizontal form-step',
                            'id'      => 'form_form_assignmentlist',
                            'enctype' => 'multipart/form-data',
                            'method'  => 'POST'
                        ]); ?>

                        <!-- <div class="form-group ">
                            <label for="assignment_id" class="col-sm-2 control-label">Assignment Id
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8"> -->
                                <?php if (isset($form_assignmentlistid)) { ?>
                                    <input type="hidden" class="form-control" name="assignment_id" id="assignment_id" placeholder="Assignment Id" value="<?php
                                                                                                                                                        echo $form_assignmentlistid;
                                                                                                                                                        ?>" <?= isset($form_assignmentlistid) ? "disabled" : "" ?>>
                                <?php } else { ?>
                                    <select class="form-control" name="assignment_id" id="assignment_id">
                                        <?php foreach ($form_assignments as $form_assignment) : ?>
                                            <option value="<?= $form_assignment->id ?>"><?= $form_assignment->id ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php } ?>
                                <!-- <small class="info help-block">
                                    <b>Input Assignment Id</b> Max Length : 225.</small>
                            </div>
                        </div> -->

                        <div class="form-group ">
                            <label for="workout_id" class="col-sm-2 control-label">ท่ากายภาพบำบัด
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-10">
                                <!-- <textarea id="workout_id" name="workout_id" rows="5" cols="80"><?= set_value('Workout Id'); ?></textarea>
                                <small class="info help-block">
                                </small> -->
                                <select class="form-control" name="workout_id" id="workout_id">
                                    <?php foreach ($form_workouts as $form_workout) : ?>
                                        <option value="<?= $form_workout->id ?>"><?= $form_workout->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="set_per_each" class="col-sm-2 control-label">จำนวนชุดต่อการกายภาพ
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="set_per_each" id="set_per_each" placeholder="จำนวนชุดต่อการกายภาพ" value="<?= set_value('set_per_each'); ?>">
                                <!-- <small class="info help-block"> -->
                                    <!-- <b>Input Set Per Each</b> Max Length : 11.</small> -->
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="amount_per_set" class="col-sm-2 control-label">จำนวนครั้งต่อชุด
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="amount_per_set" id="amount_per_set" placeholder="จำนวนครั้งต่อชุด" value="<?= set_value('amount_per_set'); ?>">
                                <!-- <small class="info help-block">
                                    <b>Input Amount Per Set</b> Max Length : 11.</small> -->
                            </div>
                        </div>

                        <!-- <div class="form-group ">
                            <label for="total_amount" class="col-sm-2 control-label">Total Amount
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="total_amount" id="total_amount" placeholder="Total Amount" value="<?= set_value('total_amount'); ?>">
                                <small class="info help-block">
                                    <b>Input Total Amount</b> Max Length : 11.</small>
                            </div>
                        </div> -->

                        <!-- <div class="form-group ">
                            <label for="average_workout_time" class="col-sm-2 control-label">Average Workout Time
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right timepicker" name="average_workout_time" id="average_workout_time">
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div> -->


                        <div class="message"></div>
                        <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>
                            <!-- <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a> -->
                            <!-- <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                            </a> -->
                            <!-- <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i><?= cclang('loading_saving_data'); ?></i>
                            </span> -->
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
    $(document).ready(function() {

        // Cancel CKEditor By Nadoo V.1.0
        // CKEDITOR.replace('workout_id'); 
        // var workout_id = CKEDITOR.instances.workout_id;

        $('#btn_cancel').click(function() {
            swal({
                    title: "<?= cclang('are_you_sure'); ?>",
                    text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = BASE_URL + 'administrator/form_assignmentlist';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('.btn_save').click(function() {
            $('.message').fadeOut();
            $('#workout_id').val(workout_id.getData());

            var form_form_assignmentlist = $('#form_form_assignmentlist');
            var data_post = form_form_assignmentlist.serializeArray();
            var save_type = $(this).attr('data-stype');

            data_post.push({
                name: 'save_type',
                value: save_type
            });

            $('.loading').show();

            $.ajax({
                    url: BASE_URL + '/administrator/form_assignmentlist/add_save',
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {
                    $('form').find('.form-group').removeClass('has-error');
                    $('.steps li').removeClass('error');
                    $('form').find('.error-input').remove();
                    if (res.success) {

                        if (save_type == 'back') {
                            window.location.href = res.redirect;
                            return;
                        }

                        $('.message').printMessage({
                            message: res.message
                        });
                        $('.message').fadeIn();
                        resetForm();
                        $('.chosen option').prop('selected', false).trigger('chosen:updated');
                        workout_id.setData('');

                    } else {
                        if (res.errors) {

                            $.each(res.errors, function(index, val) {
                                $('form #' + index).parents('.form-group').addClass('has-error');
                                $('form #' + index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">` + val + `</div>
                      `);
                            });
                            $('.steps li').removeClass('error');
                            $('.content section').each(function(index, el) {
                                if ($(this).find('.has-error').length) {
                                    $('.steps li:eq(' + index + ')').addClass('error').find('a').trigger('click');
                                }
                            });
                        }
                        $('.message').printMessage({
                            message: res.message,
                            type: 'warning'
                        });
                    }

                })
                .fail(function() {
                    $('.message').printMessage({
                        message: 'Error save data',
                        type: 'warning'
                    });
                })
                .always(function() {
                    $('.loading').hide();
                    $('html, body').animate({
                        scrollTop: $(document).height()
                    }, 2000);
                });

            return false;
        }); /*end btn save*/

    }); /*end doc ready*/
</script>