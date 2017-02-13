<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LibraryPro | Registration & User management page</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/build/css/custom.min.css') ?>" rel="stylesheet">
    <!-- x-editable -->
    <link href="<?php echo base_url('assets/vendors/x-editable/bootstrap3-editable/css/bootstrap-editable.css') ?>" rel="stylesheet">
    <!-- select2 -->
    <link href="<?php echo base_url('assets/vendors/select2/prev/select2.css') ?>" rel="stylesheet">
    
    
    <!-- Datatable Stylesheet -->
    <link href="<?php echo base_url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Manually Add Style-->
    
    <style>
        th{
            text-align: center;
        }
        .ctr{
            text-align: center;
        }
    </style>
  
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

<?php $this->load->view('templates/menu-vertical');?>
        <!-- top navigation -->
<?php $this->load->view('templates/menu-horizontal');?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registration Menu</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?=$this->session->flashdata('messages')?>
                    <?php echo validation_errors(); ?>
                    <form id='demo-form2' action='<?php echo base_url('Authentication/RegistrationProcessing')?>' method='post' class="form-horizontal form-label-left" novalidate>
                      <span class="section">Personal Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datebirth">Date Of Birth  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name='dateofbirth' required="required" placeholder="yyyy-mm-dd" type="text"/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="example@domain.com">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email2" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12"  placeholder="example@domain.com">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">NPK/SIM/KTP <span class="required" >*</span>
                       </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="idnumber" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-sm-3 col-md-3">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"  placeholder="0813111111">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Level <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
			<select name='level' class="form-control required" name="dropdown">
				<option value="1">User</option>
				<option value="2">Pustakawan</option>
				<option value="3">Admin</option>
                                <option value="4">Super Admin</option>
			</select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="active">Active <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
			<select name='active' class="form-control required" name="dropdown">
				<option value="2">Not Active</option>
				<option value="1">Active</option>
			</select>
                        </div>
                      </div>
                      <!-- Additional Hidden Data -->
                      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                      <input type="hidden" name="owner" value="<?php echo $user['id']?>"/>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
                
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Member List <small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width='5%'>No</th>
                          <th width='20%'>Name</th>
                          <th width='20%'>Email</th>
                          <th width='15%'>Phone</th>
                          <th width='10%'>TTL</th>
                          <th width='10%'>Level</th>
                          <th width='10%'>Account</th>
                          <th width='10%'>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        foreach ($users_data as $u){ ?>
                          <tr>
                              <?php if($u->active == '1'){ $label='active label label-success';}else{$label='active label label-danger';} ?>
                              <?php if($u->level == '1'){ $labels ='level label label-success';}else if($u->level == '2'){$labels ='level label label-info';}else{$labels ='level label label-warning';} ?>
                              <td class='ctr'><?php echo $no++?></td>
                              <td><a href="#" class='name' id="name" data-type="text" data-pk="<?php echo $u->id ?>"><?php echo $u->name?></a></td>
                              <td><a href="#" class='email' id="email" data-type="email" data-pk="<?php echo $u->id ?>"><?php echo $u->email?></a></td>
                              <td><a href="#" class='phonenumber' id="phone_number" data-type="number" data-pk="<?php echo $u->id ?>"><?php echo $u->phone_number?></a></td>
                              <td><a href="#" class='birth_date' id="birth_date" data-type="date" data-pk="<?php echo $u->id ?>" data-url="<?php echo base_url('Authentication/updateUserdata')?>" data-title="Select date"> <?php echo $u->birth_date?> </a></td>
                              <td class='ctr'><a href="#" class='<?php echo $labels ?>' id="level" data-type="select2" data-pk="<?php echo $u->id ?>" data-value="<?php echo $u->level ?>" data-url="<?php echo base_url('Authentication/updateUserdata')?>" data-title="Select Level" style='text-decoration:none;'></a></td>
                              <td class='ctr'><a href="#" class='<?php echo $label ?>' id="active" data-type="select2" data-pk="<?php echo $u->id ?>" data-value="<?php echo $u->active ?>" data-url="<?php echo base_url('Authentication/updateUserdata')?>" data-title="Select Active" style='text-decoration:none;'></a></td>
                              <td class='ctr'>
                                  <a href="javascript:void(0)" title="Hapus" onclick="delete_user(<?php echo $u->id ?>)"><img src='<?php echo base_url('assets/uploads/icon/delete.png')?>'/></a>
                                  <a href="javascript:void(0)" title="Hapus" onclick="reset_user(<?php echo $u->id ?>)"><img src='<?php echo base_url('assets/uploads/icon/reset.png')?>'/></a>
                              </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
<?php $this->load->view('templates/footer');?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js') ?>"></script>
    <!-- validator -->
    <script src="<?php echo base_url('assets/vendors/validator/validator.js') ?>"></script>
    <!-- date arange picker -->
    <script src="<?php echo base_url('assets/additional/js/moment/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/additional/js/datepicker/daterangepicker.js') ?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js') ?>"></script>
    <!-- X-editable -->
    <script src="<?php echo base_url('assets/vendors/x-editable/bootstrap3-editable/js/bootstrap-editable.js') ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/vendors/select2/prev/select2.min.js') ?>"></script>
    
    <!-- Data tables -->
    <script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/jszip/dist/jszip.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/pdfmake/build/vfs_fonts.js') ?>"></script>
    
<script>   
 function delete_user(id)
  {
      if(confirm('Are you sure to delete this data?'))
      {
          // ajax delete data to database
          $.ajax({
              url : "<?php echo site_url('Authentication/DeleteUserDo')?>/" + id,
              type: "POST",
              dataType: "JSON",
              data: {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
              success: function(data)
              {
                  location.reload();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error deleting data');
              }
          });

      }
  }
  </script>
  
  <script>   
 function reset_user(id)
  {
      if(confirm('Are you sure to reset password this account!?'))
      {
          // ajax delete data to database
          $.ajax({
              url : "<?php echo site_url('Authentication/ResetUserDo')?>/" + id,
              type: "POST",
              dataType: "JSON",
              data: {'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
              success: function(data)
              {
                  location.reload();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error deleting data');
              }
          });

      }
  }
  </script>
    
    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->
  </body>
</html>
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        TableManageButtons.init();
      });
    </script>
    
    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4",
          format: 'YYYY-M-DD'
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->
    
    <script>
$.fn.editable.defaults.mode = 'popup';
$(function(){
    $('#datatable-buttons .level').editable({
        source: [
              {id: '1', text: 'User'},
              {id: '2', text: 'Admin'},
              {id: '3', text: 'Super Admin'}
           ],
        select2: {
           multiple: false,
           width :130
        }
    });
    });
    
$(function(){
    $('#datatable-buttons .active').editable({
        source: [
              {id: '1', text: 'Active'},
              {id: '2', text: 'Inactive'}
           ],
        select2: {
           multiple: false,
           width :130
        }
    });
    });
    
$(function(){
    $('#datatable-buttons .birth_date').editable({
        format: 'yyyy-mm-dd',    
        viewformat: 'dd/mm/yyyy',    
        datepicker: {
                weekStart: 1
           }
        });
});

$(function(){
    $('#datatable-buttons .email').editable({
        url: '<?php echo base_url('Authentication/updateUserdata')?>',
        title: 'Enter email'
    });
});

$(function(){
    $('#datatable-buttons .name').editable({
        url: '<?php echo base_url('Authentication/updateUserdata')?>',
        title: 'Enter Your Name'
    });
});

$(function(){
    $('#datatable-buttons .phonenumber').editable({
        url: '<?php echo base_url('Authentication/updateUserdata')?>',
        title: 'Enter Phone Number'
    });
});
 </script>
    