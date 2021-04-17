
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
<section class="content-header">
    <h1>
        Form Workoutstep        <small><?= cclang('new', ['Form Workoutstep']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/form_workoutstep'); ?>">Form Workoutstep</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
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
                            <h3 class="widget-user-username">Form Workoutstep</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['Form Workoutstep']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_form_workoutstep', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_form_workoutstep', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="workout_id" class="col-sm-2 control-label">Workout Id 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="workout_id" id="workout_id" placeholder="Workout Id" value="<?= set_value('workout_id'); ?>">
                                <small class="info help-block">
                                <b>Input Workout Id</b> Max Length : 11.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="step_id" class="col-sm-2 control-label">Step Id 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="step_id" id="step_id" placeholder="Step Id" value="<?= set_value('step_id'); ?>">
                                <small class="info help-block">
                                <b>Input Step Id</b> Max Length : 11.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="nose_x" class="col-sm-2 control-label">Nose X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nose_x" id="nose_x" placeholder="Nose X" value="<?= set_value('nose_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_eye_x" class="col-sm-2 control-label">Right Eye X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_eye_x" id="right_eye_x" placeholder="Right Eye X" value="<?= set_value('right_eye_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_eye_x" class="col-sm-2 control-label">Left Eye X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_eye_x" id="left_eye_x" placeholder="Left Eye X" value="<?= set_value('left_eye_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_ear_x" class="col-sm-2 control-label">Right Ear X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_ear_x" id="right_ear_x" placeholder="Right Ear X" value="<?= set_value('right_ear_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_ear_x" class="col-sm-2 control-label">Left Ear X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_ear_x" id="left_ear_x" placeholder="Left Ear X" value="<?= set_value('left_ear_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_shoulder_x" class="col-sm-2 control-label">Right Shoulder X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_shoulder_x" id="right_shoulder_x" placeholder="Right Shoulder X" value="<?= set_value('right_shoulder_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_shoulder_x" class="col-sm-2 control-label">Left Shoulder X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_shoulder_x" id="left_shoulder_x" placeholder="Left Shoulder X" value="<?= set_value('left_shoulder_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_elbow_x" class="col-sm-2 control-label">Right Elbow X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_elbow_x" id="right_elbow_x" placeholder="Right Elbow X" value="<?= set_value('right_elbow_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_elbow_x" class="col-sm-2 control-label">Left Elbow X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_elbow_x" id="left_elbow_x" placeholder="Left Elbow X" value="<?= set_value('left_elbow_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_wrist_x" class="col-sm-2 control-label">Right Wrist X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_wrist_x" id="right_wrist_x" placeholder="Right Wrist X" value="<?= set_value('right_wrist_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_wrist_x" class="col-sm-2 control-label">Left Wrist X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_wrist_x" id="left_wrist_x" placeholder="Left Wrist X" value="<?= set_value('left_wrist_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_hip_x" class="col-sm-2 control-label">Right Hip X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_hip_x" id="right_hip_x" placeholder="Right Hip X" value="<?= set_value('right_hip_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_hip_x" class="col-sm-2 control-label">Left Hip X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_hip_x" id="left_hip_x" placeholder="Left Hip X" value="<?= set_value('left_hip_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_knee_x" class="col-sm-2 control-label">Right Knee X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_knee_x" id="right_knee_x" placeholder="Right Knee X" value="<?= set_value('right_knee_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_knee_x" class="col-sm-2 control-label">Left Knee X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_knee_x" id="left_knee_x" placeholder="Left Knee X" value="<?= set_value('left_knee_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_ankle_x" class="col-sm-2 control-label">Right Ankle X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_ankle_x" id="right_ankle_x" placeholder="Right Ankle X" value="<?= set_value('right_ankle_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_ankle_x" class="col-sm-2 control-label">Left Ankle X 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_ankle_x" id="left_ankle_x" placeholder="Left Ankle X" value="<?= set_value('left_ankle_x'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="nose_y" class="col-sm-2 control-label">Nose Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nose_y" id="nose_y" placeholder="Nose Y" value="<?= set_value('nose_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_eye_y" class="col-sm-2 control-label">Right Eye Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_eye_y" id="right_eye_y" placeholder="Right Eye Y" value="<?= set_value('right_eye_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_eye_y" class="col-sm-2 control-label">Left Eye Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_eye_y" id="left_eye_y" placeholder="Left Eye Y" value="<?= set_value('left_eye_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_ear_y" class="col-sm-2 control-label">Right Ear Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_ear_y" id="right_ear_y" placeholder="Right Ear Y" value="<?= set_value('right_ear_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_ear_y" class="col-sm-2 control-label">Left Ear Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_ear_y" id="left_ear_y" placeholder="Left Ear Y" value="<?= set_value('left_ear_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_shoulder_y" class="col-sm-2 control-label">Right Shoulder Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_shoulder_y" id="right_shoulder_y" placeholder="Right Shoulder Y" value="<?= set_value('right_shoulder_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_shoulder_y" class="col-sm-2 control-label">Left Shoulder Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_shoulder_y" id="left_shoulder_y" placeholder="Left Shoulder Y" value="<?= set_value('left_shoulder_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_elbow_y" class="col-sm-2 control-label">Right Elbow Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_elbow_y" id="right_elbow_y" placeholder="Right Elbow Y" value="<?= set_value('right_elbow_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_elbow_y" class="col-sm-2 control-label">Left Elbow Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_elbow_y" id="left_elbow_y" placeholder="Left Elbow Y" value="<?= set_value('left_elbow_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_wrist_y" class="col-sm-2 control-label">Right Wrist Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_wrist_y" id="right_wrist_y" placeholder="Right Wrist Y" value="<?= set_value('right_wrist_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_wrist_y" class="col-sm-2 control-label">Left Wrist Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_wrist_y" id="left_wrist_y" placeholder="Left Wrist Y" value="<?= set_value('left_wrist_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_hip_y" class="col-sm-2 control-label">Right Hip Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_hip_y" id="right_hip_y" placeholder="Right Hip Y" value="<?= set_value('right_hip_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_hip_y" class="col-sm-2 control-label">Left Hip Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_hip_y" id="left_hip_y" placeholder="Left Hip Y" value="<?= set_value('left_hip_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_knee_y" class="col-sm-2 control-label">Right Knee Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_knee_y" id="right_knee_y" placeholder="Right Knee Y" value="<?= set_value('right_knee_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_knee_y" class="col-sm-2 control-label">Left Knee Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_knee_y" id="left_knee_y" placeholder="Left Knee Y" value="<?= set_value('left_knee_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="right_ankle_y" class="col-sm-2 control-label">Right Ankle Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="right_ankle_y" id="right_ankle_y" placeholder="Right Ankle Y" value="<?= set_value('right_ankle_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="left_ankle_y" class="col-sm-2 control-label">Left Ankle Y 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="left_ankle_y" id="left_ankle_y" placeholder="Left Ankle Y" value="<?= set_value('left_ankle_y'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="nose_check" class="col-sm-2 control-label">Nose Check 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nose_check" id="nose_check" placeholder="Nose Check" value="<?= set_value('nose_check'); ?>">
                                <small class="info help-block">
                                <b>Input Nose Check</b> Max Length : 1.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="eye_check" class="col-sm-2 control-label">Eye Check 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="eye_check" id="eye_check" placeholder="Eye Check" value="<?= set_value('eye_check'); ?>">
                                <small class="info help-block">
                                <b>Input Eye Check</b> Max Length : 1.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ear_check" class="col-sm-2 control-label">Ear Check 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ear_check" id="ear_check" placeholder="Ear Check" value="<?= set_value('ear_check'); ?>">
                                <small class="info help-block">
                                <b>Input Ear Check</b> Max Length : 1.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="shoulder_check" class="col-sm-2 control-label">Shoulder Check 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="shoulder_check" id="shoulder_check" placeholder="Shoulder Check" value="<?= set_value('shoulder_check'); ?>">
                                <small class="info help-block">
                                <b>Input Shoulder Check</b> Max Length : 1.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="elbow_check" class="col-sm-2 control-label">Elbow Check 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="elbow_check" id="elbow_check" placeholder="Elbow Check" value="<?= set_value('elbow_check'); ?>">
                                <small class="info help-block">
                                <b>Input Elbow Check</b> Max Length : 1.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="wrist_check" class="col-sm-2 control-label">Wrist Check 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="wrist_check" id="wrist_check" placeholder="Wrist Check" value="<?= set_value('wrist_check'); ?>">
                                <small class="info help-block">
                                <b>Input Wrist Check</b> Max Length : 1.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="hip_check" class="col-sm-2 control-label">Hip Check 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="hip_check" id="hip_check" placeholder="Hip Check" value="<?= set_value('hip_check'); ?>">
                                <small class="info help-block">
                                <b>Input Hip Check</b> Max Length : 1.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="knee_check" class="col-sm-2 control-label">Knee Check 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="knee_check" id="knee_check" placeholder="Knee Check" value="<?= set_value('knee_check'); ?>">
                                <small class="info help-block">
                                <b>Input Knee Check</b> Max Length : 1.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="foot_check" class="col-sm-2 control-label">Foot Check 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="foot_check" id="foot_check" placeholder="Foot Check" value="<?= set_value('foot_check'); ?>">
                                <small class="info help-block">
                                <b>Input Foot Check</b> Max Length : 1.</small>
                            </div>
                        </div>
                                                
                        
                                                <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                           <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
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
<!-- Page script -->
<script>
    $(document).ready(function(){

                          
      $('#btn_cancel').click(function(){
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
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/form_workoutstep';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_form_workoutstep = $('#form_form_workoutstep');
        var data_post = form_form_workoutstep.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/form_workoutstep/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('.steps li').removeClass('error');
          $('form').find('.error-input').remove();
          if(res.success) {
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
          } else {
            if (res.errors) {
                
                $.each(res.errors, function(index, val) {
                    $('form #'+index).parents('.form-group').addClass('has-error');
                    $('form #'+index).parents('.form-group').find('small').prepend(`
                      <div class="error-input">`+val+`</div>
                      `);
                });
                $('.steps li').removeClass('error');
                $('.content section').each(function(index, el) {
                    if ($(this).find('.has-error').length) {
                        $('.steps li:eq('+index+')').addClass('error').find('a').trigger('click');
                    }
                });
            }
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
 
       

      
    
    
    }); /*end doc ready*/
</script>