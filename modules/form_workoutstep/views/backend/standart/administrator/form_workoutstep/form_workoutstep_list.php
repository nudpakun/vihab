
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Form_workoutstep/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function assets() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function assets() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      <?= cclang('form_workoutstep') ?><small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= cclang('form_workoutstep') ?></li>
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
                     <div class="row pull-right">
                        <?php is_allowed('form_workoutstep_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', [cclang('form_workoutstep')]); ?>  (Ctrl+a)" href="<?=  site_url('administrator/form_workoutstep/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', [cclang('form_workoutstep')]); ?></a>
                        <?php }) ?>
                        <?php is_allowed('form_workoutstep_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> <?= cclang('form_workoutstep') ?> " href="<?= site_url('administrator/form_workoutstep/export?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('form_workoutstep_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf <?= cclang('form_workoutstep') ?> " href="<?= site_url('administrator/form_workoutstep/export_pdf?q='.$this->input->get('q').'&f='.$this->input->get('f')); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('form_workoutstep') ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('form_workoutstep')]); ?>  <i class="label bg-yellow"><?= $form_workoutstep_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_form_workoutstep" id="form_form_workoutstep" action="<?= base_url('administrator/form_workoutstep/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                                                     <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                                                    <th data-field="workout_id"data-sort="1" data-primary-key="0"> <?= cclang('workout_id') ?></th>
                           <th data-field="step_id"data-sort="1" data-primary-key="0"> <?= cclang('step_id') ?></th>
                           <th data-field="nose_x"data-sort="1" data-primary-key="0"> <?= cclang('nose_x') ?></th>
                           <th data-field="right_eye_x"data-sort="1" data-primary-key="0"> <?= cclang('right_eye_x') ?></th>
                           <th data-field="left_eye_x"data-sort="1" data-primary-key="0"> <?= cclang('left_eye_x') ?></th>
                           <th data-field="right_ear_x"data-sort="1" data-primary-key="0"> <?= cclang('right_ear_x') ?></th>
                           <th data-field="left_ear_x"data-sort="1" data-primary-key="0"> <?= cclang('left_ear_x') ?></th>
                           <th data-field="right_shoulder_x"data-sort="1" data-primary-key="0"> <?= cclang('right_shoulder_x') ?></th>
                           <th data-field="left_shoulder_x"data-sort="1" data-primary-key="0"> <?= cclang('left_shoulder_x') ?></th>
                           <th data-field="right_elbow_x"data-sort="1" data-primary-key="0"> <?= cclang('right_elbow_x') ?></th>
                           <th data-field="left_elbow_x"data-sort="1" data-primary-key="0"> <?= cclang('left_elbow_x') ?></th>
                           <th data-field="right_wrist_x"data-sort="1" data-primary-key="0"> <?= cclang('right_wrist_x') ?></th>
                           <th data-field="left_wrist_x"data-sort="1" data-primary-key="0"> <?= cclang('left_wrist_x') ?></th>
                           <th data-field="right_hip_x"data-sort="1" data-primary-key="0"> <?= cclang('right_hip_x') ?></th>
                           <th data-field="left_hip_x"data-sort="1" data-primary-key="0"> <?= cclang('left_hip_x') ?></th>
                           <th data-field="right_knee_x"data-sort="1" data-primary-key="0"> <?= cclang('right_knee_x') ?></th>
                           <th data-field="left_knee_x"data-sort="1" data-primary-key="0"> <?= cclang('left_knee_x') ?></th>
                           <th data-field="right_ankle_x"data-sort="1" data-primary-key="0"> <?= cclang('right_ankle_x') ?></th>
                           <th data-field="left_ankle_x"data-sort="1" data-primary-key="0"> <?= cclang('left_ankle_x') ?></th>
                           <th data-field="nose_y"data-sort="1" data-primary-key="0"> <?= cclang('nose_y') ?></th>
                           <th data-field="right_eye_y"data-sort="1" data-primary-key="0"> <?= cclang('right_eye_y') ?></th>
                           <th data-field="left_eye_y"data-sort="1" data-primary-key="0"> <?= cclang('left_eye_y') ?></th>
                           <th data-field="right_ear_y"data-sort="1" data-primary-key="0"> <?= cclang('right_ear_y') ?></th>
                           <th data-field="left_ear_y"data-sort="1" data-primary-key="0"> <?= cclang('left_ear_y') ?></th>
                           <th data-field="right_shoulder_y"data-sort="1" data-primary-key="0"> <?= cclang('right_shoulder_y') ?></th>
                           <th data-field="left_shoulder_y"data-sort="1" data-primary-key="0"> <?= cclang('left_shoulder_y') ?></th>
                           <th data-field="right_elbow_y"data-sort="1" data-primary-key="0"> <?= cclang('right_elbow_y') ?></th>
                           <th data-field="left_elbow_y"data-sort="1" data-primary-key="0"> <?= cclang('left_elbow_y') ?></th>
                           <th data-field="right_wrist_y"data-sort="1" data-primary-key="0"> <?= cclang('right_wrist_y') ?></th>
                           <th data-field="left_wrist_y"data-sort="1" data-primary-key="0"> <?= cclang('left_wrist_y') ?></th>
                           <th data-field="right_hip_y"data-sort="1" data-primary-key="0"> <?= cclang('right_hip_y') ?></th>
                           <th data-field="left_hip_y"data-sort="1" data-primary-key="0"> <?= cclang('left_hip_y') ?></th>
                           <th data-field="right_knee_y"data-sort="1" data-primary-key="0"> <?= cclang('right_knee_y') ?></th>
                           <th data-field="left_knee_y"data-sort="1" data-primary-key="0"> <?= cclang('left_knee_y') ?></th>
                           <th data-field="right_ankle_y"data-sort="1" data-primary-key="0"> <?= cclang('right_ankle_y') ?></th>
                           <th data-field="left_ankle_y"data-sort="1" data-primary-key="0"> <?= cclang('left_ankle_y') ?></th>
                           <th data-field="nose_check"data-sort="1" data-primary-key="0"> <?= cclang('nose_check') ?></th>
                           <th data-field="eye_check"data-sort="1" data-primary-key="0"> <?= cclang('eye_check') ?></th>
                           <th data-field="ear_check"data-sort="1" data-primary-key="0"> <?= cclang('ear_check') ?></th>
                           <th data-field="shoulder_check"data-sort="1" data-primary-key="0"> <?= cclang('shoulder_check') ?></th>
                           <th data-field="elbow_check"data-sort="1" data-primary-key="0"> <?= cclang('elbow_check') ?></th>
                           <th data-field="wrist_check"data-sort="1" data-primary-key="0"> <?= cclang('wrist_check') ?></th>
                           <th data-field="hip_check"data-sort="1" data-primary-key="0"> <?= cclang('hip_check') ?></th>
                           <th data-field="knee_check"data-sort="1" data-primary-key="0"> <?= cclang('knee_check') ?></th>
                           <th data-field="foot_check"data-sort="1" data-primary-key="0"> <?= cclang('foot_check') ?></th>
                           <th>Action</th>                        </tr>
                     </thead>
                     <tbody id="tbody_form_workoutstep">
                     <?php foreach($form_workoutsteps as $form_workoutstep): ?>
                        <tr>
                                                       <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $form_workoutstep->id; ?>">
                           </td>
                                                       
                           <td><?= _ent($form_workoutstep->workout_id); ?></td> 
                           <td><?= _ent($form_workoutstep->step_id); ?></td> 
                           <td><?= _ent($form_workoutstep->nose_x); ?></td> 
                           <td><?= _ent($form_workoutstep->right_eye_x); ?></td> 
                           <td><?= _ent($form_workoutstep->left_eye_x); ?></td> 
                           <td><?= _ent($form_workoutstep->right_ear_x); ?></td> 
                           <td><?= _ent($form_workoutstep->left_ear_x); ?></td> 
                           <td><?= _ent($form_workoutstep->right_shoulder_x); ?></td> 
                           <td><?= _ent($form_workoutstep->left_shoulder_x); ?></td> 
                           <td><?= _ent($form_workoutstep->right_elbow_x); ?></td> 
                           <td><?= _ent($form_workoutstep->left_elbow_x); ?></td> 
                           <td><?= _ent($form_workoutstep->right_wrist_x); ?></td> 
                           <td><?= _ent($form_workoutstep->left_wrist_x); ?></td> 
                           <td><?= _ent($form_workoutstep->right_hip_x); ?></td> 
                           <td><?= _ent($form_workoutstep->left_hip_x); ?></td> 
                           <td><?= _ent($form_workoutstep->right_knee_x); ?></td> 
                           <td><?= _ent($form_workoutstep->left_knee_x); ?></td> 
                           <td><?= _ent($form_workoutstep->right_ankle_x); ?></td> 
                           <td><?= _ent($form_workoutstep->left_ankle_x); ?></td> 
                           <td><?= _ent($form_workoutstep->nose_y); ?></td> 
                           <td><?= _ent($form_workoutstep->right_eye_y); ?></td> 
                           <td><?= _ent($form_workoutstep->left_eye_y); ?></td> 
                           <td><?= _ent($form_workoutstep->right_ear_y); ?></td> 
                           <td><?= _ent($form_workoutstep->left_ear_y); ?></td> 
                           <td><?= _ent($form_workoutstep->right_shoulder_y); ?></td> 
                           <td><?= _ent($form_workoutstep->left_shoulder_y); ?></td> 
                           <td><?= _ent($form_workoutstep->right_elbow_y); ?></td> 
                           <td><?= _ent($form_workoutstep->left_elbow_y); ?></td> 
                           <td><?= _ent($form_workoutstep->right_wrist_y); ?></td> 
                           <td><?= _ent($form_workoutstep->left_wrist_y); ?></td> 
                           <td><?= _ent($form_workoutstep->right_hip_y); ?></td> 
                           <td><?= _ent($form_workoutstep->left_hip_y); ?></td> 
                           <td><?= _ent($form_workoutstep->right_knee_y); ?></td> 
                           <td><?= _ent($form_workoutstep->left_knee_y); ?></td> 
                           <td><?= _ent($form_workoutstep->right_ankle_y); ?></td> 
                           <td><?= _ent($form_workoutstep->left_ankle_y); ?></td> 
                           <td><?= _ent($form_workoutstep->nose_check); ?></td> 
                           <td><?= _ent($form_workoutstep->eye_check); ?></td> 
                           <td><?= _ent($form_workoutstep->ear_check); ?></td> 
                           <td><?= _ent($form_workoutstep->shoulder_check); ?></td> 
                           <td><?= _ent($form_workoutstep->elbow_check); ?></td> 
                           <td><?= _ent($form_workoutstep->wrist_check); ?></td> 
                           <td><?= _ent($form_workoutstep->hip_check); ?></td> 
                           <td><?= _ent($form_workoutstep->knee_check); ?></td> 
                           <td><?= _ent($form_workoutstep->foot_check); ?></td> 
                           <td width="200">
                            
                                                              <?php is_allowed('form_workoutstep_view', function() use ($form_workoutstep){?>
                                 <a href="<?= site_url('administrator/form_workoutstep/single_pdf/' .$form_workoutstep->id); ?>" class="label-default"><i class="fa fa-file-pdf-o"></i> <?= cclang('PDF') ?>
                              <a href="<?= site_url('administrator/form_workoutstep/view/' . $form_workoutstep->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('form_workoutstep_update', function() use ($form_workoutstep){?>
                              <a href="<?= site_url('administrator/form_workoutstep/edit/' . $form_workoutstep->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('form_workoutstep_delete', function() use ($form_workoutstep){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/form_workoutstep/delete/' . $form_workoutstep->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?>

                           </td>                        </tr>
                      <?php endforeach; ?>
                      <?php if ($form_workoutstep_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Form Workoutstep data is not available
                           </td>
                         </tr>
                      <?php endif; ?>

                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                                                     <option value="delete">Delete</option>
                                                  </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                     </div>
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value=""><?= cclang('all'); ?></option>
                            <option <?= $this->input->get('f') == 'workout_id' ? 'selected' :''; ?> value="workout_id">Workout Id</option>
                           <option <?= $this->input->get('f') == 'step_id' ? 'selected' :''; ?> value="step_id">Step Id</option>
                           <option <?= $this->input->get('f') == 'nose_x' ? 'selected' :''; ?> value="nose_x">Nose X</option>
                           <option <?= $this->input->get('f') == 'right_eye_x' ? 'selected' :''; ?> value="right_eye_x">Right Eye X</option>
                           <option <?= $this->input->get('f') == 'left_eye_x' ? 'selected' :''; ?> value="left_eye_x">Left Eye X</option>
                           <option <?= $this->input->get('f') == 'right_ear_x' ? 'selected' :''; ?> value="right_ear_x">Right Ear X</option>
                           <option <?= $this->input->get('f') == 'left_ear_x' ? 'selected' :''; ?> value="left_ear_x">Left Ear X</option>
                           <option <?= $this->input->get('f') == 'right_shoulder_x' ? 'selected' :''; ?> value="right_shoulder_x">Right Shoulder X</option>
                           <option <?= $this->input->get('f') == 'left_shoulder_x' ? 'selected' :''; ?> value="left_shoulder_x">Left Shoulder X</option>
                           <option <?= $this->input->get('f') == 'right_elbow_x' ? 'selected' :''; ?> value="right_elbow_x">Right Elbow X</option>
                           <option <?= $this->input->get('f') == 'left_elbow_x' ? 'selected' :''; ?> value="left_elbow_x">Left Elbow X</option>
                           <option <?= $this->input->get('f') == 'right_wrist_x' ? 'selected' :''; ?> value="right_wrist_x">Right Wrist X</option>
                           <option <?= $this->input->get('f') == 'left_wrist_x' ? 'selected' :''; ?> value="left_wrist_x">Left Wrist X</option>
                           <option <?= $this->input->get('f') == 'right_hip_x' ? 'selected' :''; ?> value="right_hip_x">Right Hip X</option>
                           <option <?= $this->input->get('f') == 'left_hip_x' ? 'selected' :''; ?> value="left_hip_x">Left Hip X</option>
                           <option <?= $this->input->get('f') == 'right_knee_x' ? 'selected' :''; ?> value="right_knee_x">Right Knee X</option>
                           <option <?= $this->input->get('f') == 'left_knee_x' ? 'selected' :''; ?> value="left_knee_x">Left Knee X</option>
                           <option <?= $this->input->get('f') == 'right_ankle_x' ? 'selected' :''; ?> value="right_ankle_x">Right Ankle X</option>
                           <option <?= $this->input->get('f') == 'left_ankle_x' ? 'selected' :''; ?> value="left_ankle_x">Left Ankle X</option>
                           <option <?= $this->input->get('f') == 'nose_y' ? 'selected' :''; ?> value="nose_y">Nose Y</option>
                           <option <?= $this->input->get('f') == 'right_eye_y' ? 'selected' :''; ?> value="right_eye_y">Right Eye Y</option>
                           <option <?= $this->input->get('f') == 'left_eye_y' ? 'selected' :''; ?> value="left_eye_y">Left Eye Y</option>
                           <option <?= $this->input->get('f') == 'right_ear_y' ? 'selected' :''; ?> value="right_ear_y">Right Ear Y</option>
                           <option <?= $this->input->get('f') == 'left_ear_y' ? 'selected' :''; ?> value="left_ear_y">Left Ear Y</option>
                           <option <?= $this->input->get('f') == 'right_shoulder_y' ? 'selected' :''; ?> value="right_shoulder_y">Right Shoulder Y</option>
                           <option <?= $this->input->get('f') == 'left_shoulder_y' ? 'selected' :''; ?> value="left_shoulder_y">Left Shoulder Y</option>
                           <option <?= $this->input->get('f') == 'right_elbow_y' ? 'selected' :''; ?> value="right_elbow_y">Right Elbow Y</option>
                           <option <?= $this->input->get('f') == 'left_elbow_y' ? 'selected' :''; ?> value="left_elbow_y">Left Elbow Y</option>
                           <option <?= $this->input->get('f') == 'right_wrist_y' ? 'selected' :''; ?> value="right_wrist_y">Right Wrist Y</option>
                           <option <?= $this->input->get('f') == 'left_wrist_y' ? 'selected' :''; ?> value="left_wrist_y">Left Wrist Y</option>
                           <option <?= $this->input->get('f') == 'right_hip_y' ? 'selected' :''; ?> value="right_hip_y">Right Hip Y</option>
                           <option <?= $this->input->get('f') == 'left_hip_y' ? 'selected' :''; ?> value="left_hip_y">Left Hip Y</option>
                           <option <?= $this->input->get('f') == 'right_knee_y' ? 'selected' :''; ?> value="right_knee_y">Right Knee Y</option>
                           <option <?= $this->input->get('f') == 'left_knee_y' ? 'selected' :''; ?> value="left_knee_y">Left Knee Y</option>
                           <option <?= $this->input->get('f') == 'right_ankle_y' ? 'selected' :''; ?> value="right_ankle_y">Right Ankle Y</option>
                           <option <?= $this->input->get('f') == 'left_ankle_y' ? 'selected' :''; ?> value="left_ankle_y">Left Ankle Y</option>
                           <option <?= $this->input->get('f') == 'nose_check' ? 'selected' :''; ?> value="nose_check">Nose Check</option>
                           <option <?= $this->input->get('f') == 'eye_check' ? 'selected' :''; ?> value="eye_check">Eye Check</option>
                           <option <?= $this->input->get('f') == 'ear_check' ? 'selected' :''; ?> value="ear_check">Ear Check</option>
                           <option <?= $this->input->get('f') == 'shoulder_check' ? 'selected' :''; ?> value="shoulder_check">Shoulder Check</option>
                           <option <?= $this->input->get('f') == 'elbow_check' ? 'selected' :''; ?> value="elbow_check">Elbow Check</option>
                           <option <?= $this->input->get('f') == 'wrist_check' ? 'selected' :''; ?> value="wrist_check">Wrist Check</option>
                           <option <?= $this->input->get('f') == 'hip_check' ? 'selected' :''; ?> value="hip_check">Hip Check</option>
                           <option <?= $this->input->get('f') == 'knee_check' ? 'selected' :''; ?> value="knee_check">Knee Check</option>
                           <option <?= $this->input->get('f') == 'foot_check' ? 'selected' :''; ?> value="foot_check">Foot Check</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/form_workoutstep');?>" title="<?= cclang('reset_filter'); ?>">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  </form>                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        <?= $pagination; ?>
                     </div>
                  </div>
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
   
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

      swal({
          title: "<?= cclang('are_you_sure'); ?>",
          text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
          cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_form_workoutstep').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
            cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/form_workoutstep/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "<?= cclang('please_choose_bulk_action_first'); ?>",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
    initSortable('form_workoutstep', $('table.dataTable'));
  }); /*end doc ready*/
</script>