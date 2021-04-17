<link rel="stylesheet" href="<?= BASE_ASSET; ?>jquery-switch-button/jquery.switchButton.css">
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/user/add';
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
      <?= cclang('user'); ?>
      <small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?= cclang('home'); ?></a></li>
      <li class="active"><?= cclang('user'); ?></li>
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
                        <?php is_allowed('user_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', cclang('user')); ?> (Ctrl+a)" href="<?= site_url('administrator/user/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', cclang('user')); ?></a>
                        <?php }) ?>
                        <?php is_allowed('user_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export', 'Excel '.cclang('user')); ?>" href="<?= site_url('administrator/user/export'); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export', 'Excel '.cclang('user')); ?></a>
                        <?php }) ?>
                        <?php is_allowed('user_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export', 'PDF User'); ?>" href="<?= site_url('administrator/user/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export', 'PDF'); ?></a>
                        <?php }) ?>

                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username"><?= cclang('user'); ?></h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', cclang('user')); ?> <i class="label bg-yellow"><?= $user_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_user" id="form_user" action="<?= base_url('administrator/user/index'); ?>">
                  
                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                           <th data-field="full_name" data-sort="1"><?= cclang('user') ?></th>
                           <th data-field="username" data-sort="1"><?= cclang('username') ?></th>
                           <th data-field="status" data-sort="1"><?= cclang('status') ?></th>
                           <th><?= cclang('action') ?></th>
                        </tr>
                     </thead>
                     <tbody id="tbody_user">
                     <?php foreach($users as $user): ?>
                        <tr>
                           <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $user->id; ?>">
                           </td>
                           <td>

                              <div class="chip">
                                <?php if (is_file(FCPATH . 'uploads/user/' . $user->avatar)): ?>
                                <?php $img_url = BASE_URL . 'uploads/user/' . $user->avatar; ?>
                                <?php else: ?>
                                <?php $img_url = BASE_URL . 'uploads/user/default.png'; ?>
                                <?php endif; ?>
                                <a class="fancybox" rel="group" href="<?= $img_url; ?>">
                                  <img src="<?= $img_url; ?>" alt="Person" width="50" height="50">
                                </a>
                                <?= _ent($user->full_name); ?>
                              </div>
                           </td>
                           <td><?= _ent($user->username); ?></td>
                           <td>
                              
                           <input type="checkbox" name="status" data-user-id="<?= $user->id; ?>" class="switch-button" <?= $user->banned ?:'checked'; ?> >
                           </td>
                           <td width="200">
                              <?php is_allowed('user_view', function() use ($user){?>
                                <a href="<?= site_url('administrator/user/view/' . $user->id); ?>" class="label-default"><i class="fa  fa-newspaper-o "></i> <?= cclang('view_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('user_update', function() use ($user){?>
                              <a href="<?= site_url('administrator/user/edit/' . $user->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('user_delete', function() use ($user){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/user/delete/' . $user->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                              <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($user_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           <?= cclang('data_is_not_avaiable', cclang('user')); ?>
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
                           <option value=""><?= cclang('bulk') ?></option>
                           <option value="delete"><?= cclang('delete'); ?></option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat"  name="apply" id="apply" value="Apply" title="<?= cclang('apply_bulk_action', 'User'); ?>"><?= cclang('apply_button', 'User'); ?></button>
                     </div>
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value=""><?= cclang('all'); ?></option>
                           <option <?= $this->input->get('f') == 'id' ? 'selected' :''; ?> value="id">ID</option>
                           <option <?= $this->input->get('f') == 'username' ? 'selected' :''; ?> value="username">Username</option>
                           <option <?= $this->input->get('f') == 'full_name' ? 'selected' :''; ?> value="full_name">Full Name</option>
                           <option <?= $this->input->get('f') == 'email' ? 'selected' :''; ?> value="email">Email</option>
                        </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                        <?= cclang('filter') ?>
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/user'); ?>" title="<?= cclang('reset_filter'); ?>">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  <?= form_close(); ?>
                  <div class="col-md-4">
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
  $(document).ready(function() {
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });

    $('.switch-button').switchButton({
        labels_placement: 'right',
        on_label: '<?= cclang('active'); ?>',
        off_label: '<?= cclang('inactive'); ?>'
    });

    $(document).on('change', 'input.switch-button', function() {
        var status = 'inactive';
        var id = $(this).attr('data-user-id');
        var data = [];

        if ($(this).prop('checked')) {
            status = 'active';
        }

        data.push({
            name: csrf,
            value: token
        });
        data.push({
            name: 'status',
            value: status
        });
        data.push({
            name: 'id',
            value: id
        });

        $.ajax({
                url: BASE_URL + '/administrator/user/set_status',
                type: 'POST',
                dataType: 'JSON',
                data: data,
            })
            .done(function(data) {
                if (data.success) {
                    toastr['success'](data.message);
                } else {
                    toastr['warning'](data.message);
                }

            })
            .fail(function() {
                toastr['error']('Error update status');
            });
    });

    $('.remove-data').click(function() {
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
                 function(isConfirm) {
                     if (isConfirm) {
                          document.location.href = url;
                     }
                 }); 

        return false;
    });

    $('#apply').click(function() {

        var bulk = $('#bulk');
        var serialize_bulk = $('#form_user').serialize();

        if (bulk.val() == 'delete') {

            <?php if ($this->aauth->is_allowed('user_delete')): ?>
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
                 function(isConfirm) {
                     if (isConfirm) {
                          document.location.href = url;
                     }
                 }); <?php endif; ?>

            return false;

        } else if (bulk.val() == '') {
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

    }); /*end appliy click*/

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

    checkboxes.on('ifChanged', function(event) {
        if (checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });
    initSortable('user', $('table.dataTable'));

}); /*end doc ready*/
</script>