<link href="<?php echo base_url('assets/fonts/dotsfont.eot'); ?>" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url('assets/fonts/dotsfont.svg'); ?>" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url('assets/fonts/dotsfont.ttf'); ?>" type="text/css" rel="stylesheet"/>
<style>
    .display-none-login{
        display: none;
    }
	.countdown { color: red;}
    @font-face {
	font-family: 'dotsfont';
	src: url('./assets/fonts/dotsfont.eot');
	src: url('./assets/fonts/dotsfont.eot?#iefix') format('embedded-opentype'),
	    url('./assets/fonts/dotsfont.woff') format('woff'),
	    url('./assets/fonts/dotsfont.ttf') format('truetype'),
	    url('./assets/fonts/dotsfont.svg#dotsfontregular') format('svg');
    }
    .hide-characters{
	font-family: 'dotsfont';
    }
	.email_list, .form-group.submit_code { padding: 0 10px !important;}
    #enter_code { padding-left: 10px;}
    .form-group.row {margin-bottom: 7px !important; }
    body.login-page {
        padding-top:150px;
        color: #9e9e9e;
    }
    div#bordered_login_container {
        border: 8px solid #cdcdcd;
        border-radius: 7px;
    }
    div.login_box {
        padding: 10px 20px;
    }
    label { font-weight: 200 !important;}
    div.login_header { width: 100%; text-align: center}
    div#forgot-remember { display: flex; width: 100%;}
 
    div.user_fields input{ 
        width: 100%;
        border: none;
        outline: none !important;
        border-bottom: 3px solid #cdcdcd;
        height: 40px;
    }
    .btn.btn-primary.toggle-on { background-color: #29B578 !important; }

    div.register_box { width: 100%;  text-align: center;}
    form#user_login_form { margin-bottom: 20px;}
    div.toggle.btn div label { padding-top: 0 !important; }
    div#submit_holder { margin-top: 30px;}
    button#user_login_button { width: 100%;
        background-color: #29B578;
        border-color: #29B578;
        text-transform: uppercase;
        height: 40px;
        border-radius: 20px;
        color: white;
    
    }
    .fake-input { -webkit-text-security:disc;}
    h3.login_title { color: #68757D;}
    div.form-element { margin-bottom: 15px; }
    #view_form {margin-right: 10px;}
    @media only screen and (max-width: 600px) {
      body.login-page {
        padding-top: 10px;
      }
        .navbar.navbar-default.navbar-fixed-bottom {
            display: none !important;
        }
        div.login_box { padding: 10px 5px !important;}
        .login_header h3 { margin-bottom: 20px !important;}
    }
</style>

<body class="forms-page">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12" id="list_forms">
          <div class="forms_box">
              <div class="form_header">
                  <h3 class="login_title"><?php echo strtoupper('Holiday Leave Forms');?></h3>
                  <div class="pull-right">
                    <a href="<?php echo base_url() . 'holiday/create_form' ;?>" id="create_new_form" class="col-lg-3 col-md-4 col-sm-12">Create New Form</a>
                  </div>
              </div>
              <div class="forms_body">
                   <div class="forms_tables" id="table_box">
                        <input type="hidden" id="user_id" data-value="<?php echo $user;?>"/>
                        <table class="table" id="form_table">
                            <thead id="form_head">
                                <tr>
                                    <th>Form ID</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="form_body">
                            <?php if(is_array($forms) && count($forms)> 0) { 
                                foreach($forms as $form) { ?>
                                    <tr class="form_data" id="<?php echo 'form_'. $form['id'];?>"> 
                                        <td><?php echo $form['id'];?></td>
                                        <td><?php echo $form['start_date'];?></td>
                                        <td><?php echo $form['end_date'];?></td>
                                <td><a href="javascript:void(0);" onclick="view_form('<?php echo $form['id'];?>')" id="view_form"><i class="fa fa-eye" aria-hidden="true"></i></a><?php if($form['active'] == 1 && $form['send']==0) :?><a href="javascript:void(0);" onclick="edit_form('<?php echo $form['id'];?>')" id="edit_form"><i class="fa fa-pencil" aria-hidden="true"></i></a><?php endif;?></td>
                                    </tr>
                            <?php } }?>

                            </tbody>
                        </table>
                   
                   </div>
              </div>
            </div>
        </div>
    </div>
    
</body>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/md5.min.js"></script>

<link type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datepicker/datepicker3.css">
<script src="<?php echo base_url(); ?>assets/global/plugins/datepicker/bootstrap-datepicker.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script type="text/javascript">

$('.date').each(function() {
    var date = new Date();
    date.setDate(date.getDate() + 1)
    date.toLocaleDateString();
    $("#startDate").datepicker({ format: 'dd/mm/yyyy' });
    $("#endDate").datepicker({ format: 'dd/mm/yyyy' });
    $(".date").datepicker( { format: 'dd/mm/yyyy' } );
    $("#startDate").datepicker("setDate",new Date());
    $("#endDate").datepicker('setDate', date);
    
    var minDate = new Date();
    minDate.setHours(0);
    minDate.setMinutes(0);
    minDate.setSeconds(0,0);

    var $picker = $(this);
    $picker.datepicker( { format: 'dd/mm/yyyy' });

    var pickerObject = $picker.data('datepicker');

    $picker.on('changeDate', function(ev){
        $picker.datepicker('hide');
    });
});


// $(function () {
//     var user_id = $("#user_id").data("value");
//    showForm(user_id);
// });

function edit_form(form_id) {

    window.location.href = base_url + 'holiday/create_form/'+form_id;

}


    

</script>