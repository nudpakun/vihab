<style type="text/css">
    .widget-user-header {
        padding-left: 20px !important;
    }

    th {
        background-color: antiquewhite;
    }
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
    <h1>
        แดชบอร์ด
    </h1>
    <!-- <h1>
        <?= cclang('dashboard') ?>
        <small>
            
        <?= cclang('control_panel') ?>
        </small>
    </h1> -->

</section>

<section class="content">
    <div class="row">
        <?php cicool()->eventListen('dashboard_content_top'); ?>
        <!-- By Nadoo V.1.0 -->
        <section class="content">
            <?php
            $average_accsc = 0;
            $average_worktime = 0;
            $average_painscore = 0;

            foreach ($form_workout_logs as $form_workout_log) :
                $average_accsc += $form_workout_log->average_accuracy;
                $average_worktime += $form_workout_log->average_time;
                $average_painscore += $form_workout_log->average_pain_score;
            endforeach;
            ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">ค่าเฉลี่ยความถูกต้องรวม</div>
                    <div class="panel-body" style="font-size:3rem;">
                        <?php echo number_format(($average_accsc / $form_workout_log_counts), 2, ".", ","); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">ระยะเวลากายภาพเฉลี่ยรวม</div>
                    <div class="panel-body" style="font-size:3rem;">
                        <?php echo number_format(($average_worktime / $form_workout_log_counts), 2, ".", ",") . " วินาที"; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">ค่าความเจ็บปวดเฉลี่ยทั้งหมด</div>
                    <div class="panel-body" style="font-size:3rem;">
                        <?php echo number_format(($average_painscore / $form_workout_log_counts), 2, ".", ",") . " / 3.00"; ?>
                    </div>
                </div>
            </div>

            <section class="content-header">
                <h1 style="font-size:24px;">รายชื่อผู้ปวย</h1>
            </section>
            <br />

            <!--  Patient Table -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable">
                        <thead>
                            <!-- <tr class="">
                                <th>#</th>
                                <th data-field="first_name" data-sort="1" data-primary-key="0"> <?= cclang('first_name') ?></th>
                                <th>Last Workout</th>
                                <th data-field="average_pain_score"> <?= cclang('average_pain_score') ?></th>
                                <th data-field="average_accuracy"> <?= cclang('average_accuracy') ?></th>
                                <th data-field="average_time"> <?= cclang('average_time') ?></th>
                                <th> <?= cclang('action') ?></th>
                            </tr> -->
                            <tr class="">
                                <th>#</th>
                                <th data-field="first_name" data-sort="1" data-primary-key="0" class="text-center">ชื่อผู้ป่วย</th>
                                <th class="text-center">วันที่กายภาพล่าสุด</th>
                                <th class="text-center">ชื่อท่ากายภาพ</th>
                                <th data-field="average_accuracy" class="text-center">ค่าเฉลี่ยความถูกต้อง</th>
                                <th data-field="average_time" class="text-center">ระยะเวลากายภาพเฉลี่ย</th>
                                <th data-field="average_pain_score" class="text-center">ค่าความเจ็บปวดเฉลี่ย</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbody_form_user">
                            <?php foreach ($form_users as $key => $form_user) : ?>
                                <?php
                                $last = "";
                                $count = 0;
                                $average_pt_painscore = 0;
                                $average_pt_accscore = 0;
                                $average_pt_worktime = 0;
                                $last_workout_name = "";
                                foreach ($form_workout_logs as $form_workout_log) :
                                    if ($form_workout_log->patient_id == $form_user->id) {

                                        $average_pt_painscore += $form_workout_log->average_pain_score;
                                        $average_pt_accscore += $form_workout_log->average_accuracy;
                                        $average_pt_worktime += $form_workout_log->average_time;
                                        $count += 1;

                                        if ($last_workout_name == "") {
                                            foreach ($form_workouts as $form_workout) :
                                                if ($form_workout_log->workout_id == $form_workout->id) {
                                                    $last_workout_name = $form_workout->name;
                                                    break;
                                                }
                                            endforeach;
                                        }
                                    }
                                endforeach;
                                ?>
                                <tr>
                                    <td width="5">
                                        <?php echo $key + 1; ?>
                                    </td>
                                    <td><?= _ent($form_user->first_name); ?></td>
                                    <td align="center"><?= $form_workout_log->created_at; ?></td>
                                    <td><?= $last != "" ? $last_workout_name : "-" ?></td>
                                    <td align="right"><?= $count != 0 ? number_format(($average_pt_accscore / $count), 2, ".", ",") : "-" ?></td>
                                    <td align="right"><?= $count != 0 ? number_format(($average_pt_worktime / $count), 2, ".", ",") : "-" ?></td>
                                    <td align="right"><?= $count != 0 ? number_format(($average_pt_painscore / $count), 2, ".", ",") : "-" ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('administrator/page/detail/patient?id=' . $form_user->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> ดูประวัติ
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if ($form_user_counts == 0) : ?>
                                <tr>
                                    <td colspan="100">
                                        Form User data is not available
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- By Nadoo V.1.0 -->
    </div>
</section>

<!-- /.row -->
<?php cicool()->eventListen('dashboard_content_bottom'); ?>


<!-- /.content -->

<!-- Page script -->
<script>
    $(document).ready(function() {
        initSortable('dashboard', $('table.dataTable'));
    }); /*end doc ready*/
</script>