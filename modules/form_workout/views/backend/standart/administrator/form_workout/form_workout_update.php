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
        Form Workout        <small>Edit Form Workout</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/form_workout'); ?>">Form Workout</a></li>
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
                            <h3 class="widget-user-username">ท่ากายภาพบำบัด</h3>
                            <h5 class="widget-user-desc">แก้ไขรายการท่ากายภาพบำบัด</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/form_workout/edit_save/' . $this->uri->segment(4)), [
                            'name'    => 'form_form_workout',
                            'class'   => 'form-horizontal form-step',
                            'id'      => 'form_form_workout',
                            'method'  => 'POST'
                        ]); ?>


                                <input type="hidden" class="form-control" name="trainer_id" id="trainer_id" placeholder="Trainer Id" value="<?= set_value('trainer_id', $form_workout->trainer_id); ?>">

                        <!-- <div class="form-group ">
                            <label for="trainer_id" class="col-sm-2 control-label">
                            </label>
                            <div class="col-sm-8">
                                 <small class="info help-block">
                                    <b>Input Trainer Id</b> Max Length : 225.</small>
                            </div>
                        </div> -->

                        <div class="form-group ">
                            <label for="name" class="col-sm-2 control-label">ชื่อท่ากายภาพ
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?= set_value('name', $form_workout->name); ?>">
                                <!-- <small class="info help-block">
                                    <b>Input Name</b> Max Length : 225.</small> -->
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="description" class="col-sm-2 control-label">รายละเอียด
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="description" name="description" rows="10" cols="80"> <?= set_value('description', $form_workout->description); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="method" class="col-sm-2 control-label">วิธีการ
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="method" name="method" rows="10" cols="80"> <?= set_value('method', $form_workout->method); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="total_step" class="col-sm-2 control-label">จำนวนขั้นตอน
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="total_step" id="total_step" placeholder="Total Step" value="<?= set_value('total_step', $form_workout->total_step); ?>" disabled>
                                <!-- <small class="info help-block">
                                    <b>Input Total Step</b> Max Length : 11.</small> -->
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="total_second" class="col-sm-2 control-label">ระยะเวลาต่อครั้ง(วินาที)
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="total_second" id="total_second" placeholder="Total Second" value="<?= set_value('total_second', $form_workout->total_second); ?>">
                                <!-- <small class="info help-block">
                                    <b>Input Total Second</b> Max Length : 11.</small> -->
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="total_count" class="col-sm-2 control-label">จำนวนครั้งต่อชุด
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="total_count" id="total_count" placeholder="Total Count" value="<?= set_value('total_count', $form_workout->total_count); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <!-- <div class="form-group ">
                            <label for="tracking_point" class="col-sm-2 control-label">Tracking Point
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tracking_point" id="tracking_point" placeholder="Tracking Point" value="<?= set_value('tracking_point', $form_workout->tracking_point); ?>">
                                <small class="info help-block">
                                    <b>Input Tracking Point</b> Max Length : 512.</small>
                            </div>
                        </div> --> 

                        <div class="message"></div>
                        <div class="row-fluid col-md-7 container-button-bottom">
                            <!-- <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button> -->
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> บันทึก
                            </a>
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


        CKEDITOR.replace('description');
        var description = CKEDITOR.instances.description;
        CKEDITOR.replace('method');
        var method = CKEDITOR.instances.method;

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
                        window.location.href = BASE_URL + 'administrator/form_workout';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('.btn_save').click(function() {
            $('.message').fadeOut();
            $('#description').val(description.getData());
            $('#method').val(method.getData());

            var form_form_workout = $('#form_form_workout');
            var data_post = form_form_workout.serializeArray();
            var save_type = $(this).attr('data-stype');
            data_post.push({
                name: 'save_type',
                value: save_type
            });

            $('.loading').show();

            $.ajax({
                    url: form_form_workout.attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {
                    $('form').find('.form-group').removeClass('has-error');
                    $('form').find('.error-input').remove();
                    $('.steps li').removeClass('error');
                    if (res.success) {
                        var id = $('#form_workout_image_galery').find('li').attr('qq-file-id');
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