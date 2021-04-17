<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo() {

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
        Form Assignment        <small>Edit Form Assignment</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/form_assignment'); ?>">Form Assignment</a></li>
        <li class="active">Edit</li>
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
                            <h3 class="widget-user-username">มอบหมาย</h3>
                            <h5 class="widget-user-desc">แก้ไขการมอบหมายท่ากายภาพให้ผู้ป่วย</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/form_assignment/edit_save/' . $this->uri->segment(4)), [
                            'name'    => 'form_form_assignment',
                            'class'   => 'form-horizontal form-step',
                            'id'      => 'form_form_assignment',
                            'method'  => 'POST'
                        ]); ?>

                        <!-- <div class="form-group ">
                            <label for="assignment_no" class="col-sm-2 control-label">Assignment No 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                        -->
                        <input type="hidden" class="form-control" name="assignment_no" id="assignment_no" placeholder="Assignment No" value="<?= set_value('assignment_no', $form_assignment->assignment_no); ?>">
                        <!-- <small class="info help-block">
                                <b>Input Assignment No</b> Max Length : 225.</small>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="patient_id" class="col-sm-2 control-label">ชื่อผู้ป่วย
                                <i class="required">*</i>
                            </label>
                            <!-- <div class="col-sm-8">
                                <input type="text" class="form-control" name="patient_id" id="patient_id" placeholder="Patient Id" value="<?= set_value('patient_id', $form_assignment->patient_id); ?>">
                                <small class="info help-block">
                                <b>Input Patient Id</b> Max Length : 225.</small>
                            </div> -->
                            <div class="col-sm-8">
                                <select class="form-control" name="patient_id" id="patient_id" value="<?= set_value('patient_id', $form_assignment->patient_id); ?>">
                                    <?php foreach ($form_users as $form_user) : ?>
                                        <option value="<?= $form_user->id ?>"><?= $form_user->first_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="assignee_id" class="col-sm-2 control-label">ผู้มอบหมาย
                                <i class="required">*</i>
                            </label>
                            <!-- <div class="col-sm-8">
                                <input type="text" class="form-control" name="assignee_id" id="assignee_id" placeholder="Assignee Id" value="<?= set_value('assignee_id', $form_assignment->assignee_id); ?>">
                                <small class="info help-block">
                                <b>Input Assignee Id</b> Max Length : 225.</small>
                            </div> -->
                            <div class="col-sm-8">
                                <select class="form-control" name="assignee_id" id="assignee_id" value="<?= set_value('assignee_id', $form_assignment->assignee_id); ?>">
                                    <?php foreach ($users as $user) : ?>
                                        <option value="<?= $user->id ?>"><?= $user->full_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="assignment_day" class="col-sm-2 control-label">วันที่ต้องทำกายภาพ
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8 row">
                                <!-- <textarea id="assignment_day" name="assignment_day" rows="10" cols="80"> <?= set_value('assignment_day', $form_assignment->assignment_day); ?></textarea> -->
                                <!-- Select CheckBox By Nadoo V.1.0 -->
                                <textarea style="display:none;" id="assignment_day" name="assignment_day" rows="10" cols="80"> <?= set_value('assignment_day', $form_assignment->assignment_day); ?>
                                </textarea>
                                <?php
                                $days = array("MON" => "จันทร์", "TUE" => "อังคาร", "WED" => "พุธ", "THU" => "พฤหัสบดี", "FRI" => "ศุกร์", "SAT" => "เสาร์", "SUN" => "อาทิตย์");
                                foreach ($days as $key => $day) :
                                ?>
                                    <div class="checkbox col-sm-3">
                                        <label><input class="assignment_day_checkbox" id="day_<?= $key ?>" type="checkbox" value="<?= $key ?>" <?php if (count(explode(",", $form_assignment->assignment_day)) > 0) {
                                                                                                                                                    if (in_array($key, explode(",", $form_assignment->assignment_day))) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                } ?>><?= $day ?></label>
                                    </div>
                                <?php
                                endforeach;
                                ?>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <!-- <div class="form-group ">
                            <label for="assignment_time" class="col-sm-2 control-label">Assignment Time
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right timepicker" name="assignment_time" id="assignment_time" value="<?= set_value('form_assignment_assignment_time_name', $form_assignment->assignment_time); ?>">
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div> -->

                        <!-- <div class="form-group ">
                            <label for="total_amount" class="col-sm-2 control-label">Total Amount
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="total_amount" id="total_amount" placeholder="Total Amount" value="<?= set_value('total_amount', $form_assignment->total_amount); ?>">
                                <small class="info help-block">
                                    <b>Input Total Amount</b> Max Length : 11.</small>
                            </div>
                        </div> -->

                        <!-- <div class="form-group ">
                            <label for="total_estimate_time" class="col-sm-2 control-label">Total Estimate Time
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right timepicker" name="total_estimate_time" id="total_estimate_time" value="<?= set_value('form_assignment_total_estimate_time_name', $form_assignment->total_estimate_time); ?>">
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div> -->
                        <!-- ฺAssignment List By Nadoo V.1.0 -->
                        <div style="margin-top:10px;">
                            <div class="row">
                                <h4 class="col-sm-6 col-md-6 col-xs-6" style="font-weight:bold;">รายการท่ากายภาพ</h4>
                                <div class="col-sm-6 col-md-6 col-xs-6" style="text-align:end;">
                                    <!-- <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('form_assignmentlist')]); ?>  (Ctrl+a)" href="<?= site_url('administrator/form_assignmentlist/add?id='); ?><?= $form_assignment->id; ?>"><i class="fa fa-plus-square-o"></i> <?= cclang('add_new_button', [cclang('form_assignmentlist')]); ?></a> -->

                                    <?= anchor('administrator/form_assignmentlist/add?id=' . $form_assignment->id . '&popup=show', '<i class="fa fa-plus-square-o"></i> เพิ่มท่ากายภาพ', ['class' => 'btn btn-flat btn-success btn_add_new popup-view']); ?>

                                    <!-- <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="" href="<?= site_url('administrator/form_assignmentlist/add?id='); ?><?= $form_assignment->id; ?>"><i class="fa fa-plus-square-o"></i> เพิ่มท่ากายภาพ</a> -->
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable">
                                    <thead>
                                        <tr class="">
                                            <!-- <th>
                                                <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                                            </th> -->
                                            <!-- <th data-field="assignment_id" data-sort="1" data-primary-key="0"> <?= cclang('assignment_id') ?></th> -->
                                            <th data-field="workout_id" data-sort="1" data-primary-key="0">ชื่อท่ากายภาพ</th>
                                            <th data-field="set_per_each" data-sort="1" data-primary-key="0" class="text-center">จำนวนครั้งต่อชุด</th>
                                            <th data-field="amount_per_set" data-sort="1" data-primary-key="0" class="text-center">จำนวนชุดต่อการกายภาพ</th>
                                            <th data-field="total_amount" data-sort="1" data-primary-key="0" class="text-center">จำนวนรวม(ครั้ง)</th>
                                            <th data-field="average_workout_time" data-sort="1" data-primary-key="0" class="text-center">ระยะเวลากายภาพ(นาที)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_form_assignmentlist">
                                        <?php foreach ($form_assignmentlists as $form_assignmentlist) :
                                            // print_r($form_assignmentlist);
                                        ?>
                                            <tr>
                                                <!-- <td width="5">
                                                    <input type="checkbox" class="flat-red check" name="id[]" value="<?= $form_assignmentlist->id; ?>">
                                                </td> -->

                                                <!-- <td><?= _ent($form_assignmentlist->assignment_id); ?></td> -->
                                                <td><?= _ent($form_assignmentlist->workout_name); ?></td>
                                                <td align="right"><?= _ent($form_assignmentlist->workout_total_count); ?></td>
                                                <td align="right"><?= _ent($form_assignmentlist->set_per_each); ?></td>
                                                <td align="right"><?= _ent($form_assignmentlist->workout_total_count * $form_assignmentlist->set_per_each); ?></td>
                                                <td align="right"><?= number_format(($form_assignmentlist->workout_total_second * $form_assignmentlist->workout_total_count * $form_assignmentlist->set_per_each) / 60, 2); ?></td>
                                                <td width="200">

                                                    <!-- <?php is_allowed('form_assignmentlist_view', function () use ($form_assignmentlist) { ?>
                                                        <a href="<?= site_url('administrator/form_assignmentlist/single_pdf/' . $form_assignmentlist->id); ?>" class="label-default"><i class="fa fa-file-pdf-o"></i> <?= cclang('PDF') ?>
                                                            <a href="<?= site_url('administrator/form_assignmentlist/view/' . $form_assignmentlist->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                                                            <?php }) ?> -->
                                                    <?php is_allowed('form_assignmentlist_update', function () use ($form_assignmentlist) { ?>
                                                        <a href="<?= site_url('administrator/form_assignmentlist/edit/' . $form_assignmentlist->id); ?>" class="label-default"><i class="fa fa-edit "></i>แก้ไข</a>
                                                    <?php }) ?>
                                                    <?php is_allowed('form_assignmentlist_delete', function () use ($form_assignmentlist) { ?>
                                                        <a href="javascript:void(0);" data-href="<?= site_url('administrator/form_assignmentlist/delete/' . $form_assignmentlist->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i>ลบ</a>
                                                    <?php }) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php if ($form_assignmentlist_counts == 0) : ?>
                                            <tr>
                                                <td colspan="100">
                                                    Form Assignmentlist data is not available
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- ฺAssignment List By Nadoo V.1.0 -->
                        <div class="message"></div>
                        <div class="row-fluid col-md-7 container-button-bottom">
                            <!-- <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button> -->
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> บันทึก
                            </a>
                            &nbsp;
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> ยกเลิก
                            </a>
                            <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
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
        // CKEDITOR.replace('assignment_day'); 
        // var assignment_day = CKEDITOR.instances.assignment_day;

        // Check Box By Nadoo V.1.0
        $(".assignment_day_checkbox").unbind('click').bind('click', function() {
            let olddayval = $("#assignment_day").val()
            // alert(olddayval.indexOf("MON"))
            // alert($("#assignment_day").val().length)
            // if($(this).prop("checked")){
            //     $("#assignment_day")
            // }else{

            // }
            // 
        })

        $('#btn_cancel').click(function() {
            swal({
                    title: "Are you sure?",
                    text: "the data that you have created will be in the exhaust!",
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
                        window.location.href = BASE_URL + 'administrator/form_assignment';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('.btn_save').click(function() {
            $('.message').fadeOut();
            $('#assignment_day').val(assignment_day.getData());

            var form_form_assignment = $('#form_form_assignment');
            var data_post = form_form_assignment.serializeArray();
            var save_type = $(this).attr('data-stype');
            data_post.push({
                name: 'save_type',
                value: save_type
            });

            $('.loading').show();

            $.ajax({
                    url: form_form_assignment.attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {
                    $('form').find('.form-group').removeClass('has-error');
                    $('form').find('.error-input').remove();
                    $('.steps li').removeClass('error');
                    if (res.success) {
                        var id = $('#form_assignment_image_galery').find('li').attr('qq-file-id');
                        if (save_type == 'back') {
                            window.location.href = res.redirect;
                            return;
                        }

                        $('.message').printMessage({
                            message: res.message
                        });
                        $('.message').fadeIn();
                        $('.data_file_uuid').val('');

                    } else {
                        if (res.errors) {
                            parseErrorField(res.errors);
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





        async function chain() {}

        chain();




    }); /*end doc ready*/
</script>