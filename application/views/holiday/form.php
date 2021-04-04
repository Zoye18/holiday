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

<body class="login-page">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 col-lg-offset-3 col-md-offset-2 col-sm-offset-1" id="bordered_login_container">
          <div class="login_box">
              <div class="login_header">
                  <h3 class="login_title"><?php echo strtoupper('Holiday Leave');?></h3>
              </div>
              <div class="login_body">
                    <div class="text-danger" id="show_error" ></div>
				    <div class="countdown"></div>
                    <div class="success_register text-success" id="successfully_register"></div>
                    <form id="holiday_form" action="<?php echo base_url() . 'holiday/save';?>" method="post" role="form" > 
                        
                        <div class="row">
                            <input type="hidden" id="form_id" value="<?php echo isset($form['id']) ? $form['id']: 0;?>" **/>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-element has-feedback user_fields" id="user_first_name">
                                <input name="user_firstname" id="user_firstname" type="text" class="" placeholder="First Name" minlength="2" maxlength="100" value="<?php echo isset($form['first_name']) ? $form['first_name'] : $user['user_first_name'];?>"/>
                                <span class="text-danger" id="first_name_text"><?php echo form_error('userFirstName');?></span>
                                
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-element has-feedback user_fields" id="user_last_name">
                                <input name="user_lastname" id="user_lastname" type="text" class="" placeholder="Last Name" minlength="2" maxlength="100" value="<?php echo isset($form['last_name']) ? $form['last_name'] : $user['user_last_name'];?>"/>
                                <span class="text-danger" id="last_name_text"><?php echo form_error('userLastName');?></span>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12 form-element has-feedback user_fields" id="user_email_box">
                                <input name="user_email" id="user_email" type="text" class="" placeholder="Email" value="<?php echo isset($form['email']) ? $form['email'] : $user['user_email'];?>" required/>
                                <span class="text-danger" id="user_email_text"><?php echo form_error('userEmail');?></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-element has-feedback user_fields" id="userphone_box">
                                <input name="user_phonenumber" id="user_phonenumber" type="tel" class="" placeholder="User Phone Number" value="<?php echo isset($form['phone_number']) ? $form['phone_number'] :'';?>" required pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" />
                                <span class="text-danger" id="user_phone_text"><?php echo form_error('userPhone');?></span>
                            </div>

                        </div>
                        <?php if(isset($form['start_date']) && isset($form['end_date'])) {
                            $start = $form['start_date'];
                            $start_date = substr($start, 0, strpos($start, ' '));
                            $startDate = str_replace('-', '/', $start_date);
                            $start_date =  date("d/m/Y", strtotime($startDate));
                            $start_time = substr($start, strpos($start, ' ')+1);

                            $end = $form['end_date'];
                            $end_date = substr($end, 0, strpos($end, ' '));
                            $endDate = str_replace('-', '/', $end_date);
                            $end_date =  date("d/m/Y", strtotime($endDate));
                            $end_time = substr($end, strpos($end, ' ')+1);

                        }?>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="title">Start Date</label>
                            <div class="row" style="display: flex;">
                                <div class="input-group date col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input class="form-control" placeholder="Start Date" name="startDate" id="startDate" type="text" value="<?php echo isset($form['start_date']) ? $start_date : date('Y-m-d');?>">
                                </div>
                                <div class="input-group time col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-group-addon" id="time"><i class="fa fa-clock-o"></i></div>
                                    <input class="form-control" placeholder="Start Time" name="startTime" id="startTime" data-toggle="tooltip" data-original-title="Enter time by in valid format HH:mm:ss" type="text" value="<?php echo (isset($start_time)) ? $start_time : '00-00-00';?>">
                                </div>
                                <span class="text-danger text-right"></span>
                            </div>
                            
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="title">End Date</label>
                            <div class="row" style="display: flex;">
                                <div class="input-group date col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-group-addon" id="to_date"><i class="fa fa-calendar"></i></div>
                                    <input class="form-control" placeholder="End Date" name="endDate" id="endDate" type="text" value="<?php echo isset($form['end_date']) ? $end_date : date('Y-m-d');?>">
                                </div>
                                <div class="input-group time col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                    <input class="form-control" placeholder="End Time" name="endTime" id="endTime" type="text" data-toggle="tooltip" data-original-title="Enter time by in valid format HH:mm:ss" value="<?php echo (isset($end_time)) ? $end_time : '00-00-00';?>">
                                </div>
                                <span class="text-danger text-right"></span>
                            </div>
                                
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-element has-feedback user_fields" id="user_remarks_box">
                                <textarea class="form-control" name="user_remarks" id="user_remarks" placeholder="Remarks" value="" style="width:100%; height:100px;" value="<?php echo isset($form['remarks']) ? $form['remarks'] :'';?>"></textarea>
                            </div>
                        </div>
                        </div>
                        
                        <div class="form-element row" id="submit_holder">
                            <div class="submit_button">
                            <?php if(isset($form)) { ?>
                                <button id="holiday_button" type="submit" class="btn btn-primary btn-flat"><?php echo strtoupper('Save');?> <i class="fa fa-chevron-right" data-loading-text="Please Wait..."></i></button>
                            <?php }else { ?>
                                <button id="holiday_button" type="submit" class="btn btn-primary btn-flat"><?php echo strtoupper('Send');?> <i class="fa fa-chevron-right" data-loading-text="Please Wait..."></i></button>
                            <?php } ?>
                            </div>
                        </div>
                    </form>
              </div>
            </div>
        </div>
    </div>
    <p class="login-box-msg"></p>
    <div class="row" id="login_success_redirect" style="display: none;">
        <div class="col-md-4 col-lg-offset-4">
            <div class="well background_white">
            </div>
        </div>
    </div>

    <div class="navbar navbar-default navbar-fixed-bottom" style="display: felx;">
        <div class="container">
           
            <div class="pull-right">
        	<p class="navbar-text"> </p>
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


$(function () {
   
    $("#holiday_form").validate({
        
        errorElement: 'span', errorClass: 'help-block',
        rules: {
            user_firstname: {
                required:true,
                minlength: 2,
                maxlength: 100
            },
            user_lastname: {
                required: true,
                minlength: 2,
                maxlength: 100
            },
            user_email: {
                required: true
            },
            user_phonenumber: {
                required: true,
            },
            startDate: {
                required: true
            },
            startTime: {
                required:true
            },
            endDate: {
                required:true,
                greaterThan: "#StartDate"
            },
            endTime: {
                required:true
            }
        },
        messages: {
            user_firstname: {
                required:"<?php echo "This Field is Required";?>",
                minlength: "<?php echo "Filed should have at least 2 charcters";?>",
                maxlength: "<?php echo "Filed should have maximum 100 charcters";?>",
            },
            user_lastname: {
                required:"<?php echo "This Field is Required";?>",
                minlength: "<?php echo "Filed should have at least 2 charcters";?>",
                maxlength: "<?php echo "Filed should have maximum 100 charcters";?>",
            },
            user_email: {
                required: "<?php echo "This Field is Required";?>",
            },
            user_phonenumber: {
                required: "<?php echo "This Field is Required";?>",
            },
            startDate: {
                required: "<?php echo "This Field is Required";?>",
            },
            endDate: {
                required: "<?php echo "This Field is Required";?>",
                greaterThan: "<?php echo "This Field must be greater than startDate";?>"
            },
            user_login_password: {
                required:"<?php echo "This Field is Required";?>",
                minlength: "<?php echo "Filed should have at least 8 charcters";?>"
            },
           

        },
        invalidHandler: function (event, validator) {
            show_login_error();
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        success: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
            $(element).closest('.form-group').children('span.help-block').remove();
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.closest('.form-group'));
        },
       
        submitHandler: function (form) {
            
            var first_name = $("#user_firstname").val();
            var last_name = $("#user_lasttname").val();
            var user_email = $("#user_email").val();
            var phone = $("#user_phonenumber").val();
            var start_date = $("#startDate").val();
            var start_time = $("#startTime").val();
            var end_date = $("#endDate").val();
            var edn_time = $("#endTime").val();
            var remarks = $("#remarks").val();
            var form_id = $("#form_id").val();
           if(end_date >= start_date) {
            $("#show_error").html("End Date must be greater tnen Start Date");
           }else {
            $.post(base_url+'holiday/save', {user_firstname: first_name, user_lasttname: last_name,user_email:user_email, user_phonenumber: phone,  startDate:start_date, startTime: start_time, endDate: end_date, endTime: end_time, user_remarks: remarks, form_id: form_id }, function (data) {
                console.log(data);
                if(data.code==1){
                    $("#successfully_register").html(data.message);
                
                }else if(data.code == -1){
                
                    $("#show_error").html(data.data);
                
                    
                }else if(data.code == 0) {
                    $("#show_error").html(data.message);
                }
            
            })
           }
           
            
            
            
        }
    });
});


    

</script>