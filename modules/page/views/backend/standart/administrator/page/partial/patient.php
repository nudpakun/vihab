<style type="text/css">
  .widget-user-header {
    padding-left: 20px !important;
  }
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<!-- By Nadoo V.1.0 -->
<section class="content-header">
  <h1 style="font-size:24px;">ประวัติการกายภาพ <br />
    <small>ชื่อผู้ป่วย: <?php foreach ($form_users as $form_user) : if ($patientid == $form_user->id) {
                            echo $form_user->username;
                          }
                        endforeach; ?></small>
  </h1>
</section>
<section class="content" style="min-height:100px;">
  <?php
  $average_accsc = 0;
  $average_worktime = 0;
  $average_painscore = 0;
  $workouts = [];
  $workoutlogids = [];

  foreach ($form_workout_logs as $form_workout_log) :
    $average_accsc += $form_workout_log->average_accuracy;
    $average_worktime += $form_workout_log->average_time;
    $average_painscore += $form_workout_log->average_pain_score;
    if (!in_array($form_workout_log->workout_id, $workoutlogids)) {
      array_push($workoutlogids, $form_workout_log->workout_id);
      foreach ($form_workouts as $form_workout) :
        if ($form_workout_log->workout_id == $form_workout->id) {
          array_push($workouts, $form_workout);
        }
      endforeach;
    }
  endforeach;
  ?>
  <div class="col-md-4 col-sm-6 col-xs-12" style="padding-left:0px;">
    <div class="panel panel-default text-center">
      <div class="panel-heading">ค่าเฉลี่ยความถูกต้อง</div>
      <div class="panel-body" style="font-size:3rem;">
        <?= $form_workout_log_counts != 0 ? number_format(($average_accsc / $form_workout_log_counts), 2, ".", ",") : "" ?>
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="panel panel-default text-center">
      <div class="panel-heading">ระยะเวลากายภาพเฉลี่ย</div>
      <div class="panel-body" style="font-size:3rem;">
        <?= $form_workout_log_counts != 0 ? number_format(($average_worktime / $form_workout_log_counts), 2, ".", ",") : "" ?> วินาที
      </div>
    </div>
  </div>

  <div class="col-md-4 col-sm-6 col-xs-12" style="padding-right:0px;">
    <div class="panel panel-default text-center">
      <div class="panel-heading">ค่าความเจ็บปวดเฉลี่ย</div>
      <div class="panel-body" style="font-size:3rem;">
        <?= $form_workout_log_counts != 0 ? number_format(($average_painscore / $form_workout_log_counts), 2, ".", ",") : "" ?> / 3
      </div>
    </div>
  </div>
</section>

<!-- Chart Wrapper -->
<?php foreach ($workouts as $workout) : ?>
  <section class="content-header">
    <h1 style="font-size:24px;">ท่ากายภาพ: <?= $workout->name ?></h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-4">
        <!-- LINE CHART -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">ความถูกต้อง (<?= $workout->total_count; ?> ครั้ง)</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body chart-responsive">
            <div class="chart" id="workout_acc_<?= $workout->id ?>" style="height: 300px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <!-- LINE CHART -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">ระยะเวลาในการกายภาพ (<?= $workout->total_count * $workout->total_second; ?> วินาที)</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body chart-responsive">
            <div class="chart" id="workout_time_<?= $workout->id ?>" style="height: 300px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <!-- LINE CHART -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">ค่าความเจ็บปวด (3 คะแนน)</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body chart-responsive">
            <div class="chart" id="workout_pain_<?= $workout->id ?>" style="height: 300px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
<?php endforeach; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.min.js"></script>
<script>
  $(function() {
    "use strict";
    <?php foreach ($workouts as $workout) : ?>
      // LINE CHART
      var workout_acc_<?= $workout->id  ?> = new Morris.Line({
        element: 'workout_acc_<?= $workout->id  ?>',
        resize: true,
        data: [
          <?php foreach ($form_workout_logs as $form_workout_log) :
            if ($form_workout_log->workout_id == $workout->id) {
          ?> {
                y: '<?= $form_workout_log->created_at ?>',
                item1: <?= $form_workout_log->average_accuracy ?>
              },
          <?php
            }
          endforeach;
          ?>
        ],
        xkey: 'y',
        ykeys: ['item1'],
        ymax: <?= $workout->total_count; ?>,
        labels: ['ความถูกต้อง'],
        lineColors: ['#008000'],
        hideHover: 'auto'
      });

      // LINE CHART
      var workout_time_<?= $workout->id  ?> = new Morris.Line({
        element: 'workout_time_<?= $workout->id  ?>',
        resize: true,
        data: [
          <?php foreach ($form_workout_logs as $form_workout_log) :
            if ($form_workout_log->workout_id == $workout->id) {
          ?> {
                y: '<?= $form_workout_log->created_at ?>',
                item1: <?= $form_workout_log->average_time ?>
              },
          <?php
            }
          endforeach;
          ?>
        ],
        xkey: 'y',
        ykeys: ['item1'],
        ymax: <?= $workout->total_second * $workout->total_count; ?>,
        labels: ['ระยะเวลา'],
        lineColors: ['#1E90FF'],
        hideHover: 'auto'
      });
      
        // LINE CHART
        var workout_pain_<?= $workout->id  ?> = new Morris.Line({
        element: 'workout_pain_<?= $workout->id  ?>',
        resize: true,
        data: [
          <?php 
          $counter = 1;
          foreach ($form_workout_logs as $form_workout_log) :
            if ($form_workout_log->workout_id == $workout->id) {
          ?> {
                y: '<?= $form_workout_log->created_at; ?>',
                item1: <?= $form_workout_log->average_pain_score ?>
              },
          <?php
            }
            $counter++;
          endforeach;
          ?>
        ],
        xkey: 'y',
        ykeys: ['item1'],
        ymax: 3,
        labels: ['ความเจ็บปวด'],
        lineColors: ['#FF4500'],
        hideHover: 'auto'
      });
    <?php endforeach; ?>
  });
</script>