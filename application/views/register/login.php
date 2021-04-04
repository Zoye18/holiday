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
    /* input#user_login, input#user_login_password {  */
    div.user_fields input{ 
        width: 100%;
        border: none;
        outline: none !important;
        border-bottom: 3px solid #cdcdcd;
        height: 40px;
    }
    .btn.btn-primary.toggle-on { background-color: #29B578 !important; }

    a.forgot { text-decoration: underline !important; color: #8c8cd7; }
    div.forgot_link {width: 60%%; }
    div.memorize_switch { width: 45%; }
    div.memorize_switch  div{ float:right; }
    div.toggle.btn.btn-default, div.toggle.btn-primary, #memorize {
        height: 22px !important;
        min-height: 22px !important;
        padding-top: 1px !important;
    }
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
    a.register_link { text-decoration: underline;}
    #ga_token { display: flex;}
    #ga_token input { width: 60px;}
    #ga_token input#user_token_1 { margin-right: 10px;}
    #authModal div.modal-dialog { width: 360px !important;}
    #forgotModal div.modal-dialog { width: 500px;}
    .another_link { margin-top: 10px;}
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
        <div class="col-lg-4 col-md-4 col-sm-6 col-lg-offset-4 col-md-offset-4 col-sm-offset-3" id="bordered_login_container">
          <div class="login_box">
              <div class="login_header">
                  <h3 class="login_title"><?php echo strtoupper('Login');?></h3>
              </div>
              <div class="login_body">
                  <div class="text-danger" id="show_error" ></div>
				  <div class="countdown"></div>
                  <div class="success_register text-success" id="successfully_register"></div>
                  <!-- <form id="user_login_form" action="<?php echo base_url() . 'login/login';?>" method="post" role="form" > -->
                  <form id="user_login_form" action="" method="post" role="form" > 
                        <div class="form-element has-feedback user_fields" id="user_email_box">
                            <input name="user_email" id="user_email" type="text" class="" placeholder="Email" value=""/>
                            <span class="text-danger" id="user_email_text"><?php echo form_error('user_email');?></span>
                        </div>
                        <div class="form-element has-feedback user_fields" id="password_box">
                            <input value="" name="user_login_password" id="user_login_password"  type="password" class="" placeholder="Password"/>
                            <span class="text-danger" id="user_pass_text"><?php echo form_error('user_login_password');?></span>
                        </div>
                        
                        <div class="form-element row" id="submit_holder">
                            <div class="submit_button">
                                <button id="user_login_button" type="submit" class="btn btn-primary btn-flat"><?php echo strtoupper('Login');?> <i class="fa fa-chevron-right" data-loading-text="Please Wait..."></i></button>
                            </div>
                            <div class="another_link">
                                <span>No Account? <a href="<?php echo base_url() . 'register/index';?>" class="redirect_link">Register Now</a></span>
                            </div>
                        </div>
                    </form>
              </div>
            </div>
        </div>
    </div>
    <p class="login-box-msg"></p>
  
    

</div>
</body>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/md5.min.js"></script>

<script type="text/javascript">


$(function () {

    
    
    $("#user_login_form").validate({
        
        errorElement: 'span', errorClass: 'help-block',
        rules: {
            user_email: {
                required: true,
                minlength:10
            },
            user_login_password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            
            user_email: {
                required: "<?php echo "This Field is Required";?>",
                minlength: "<?php echo "Filed should have at least 10 charcters";?>"
            },
            user_login_password: {
                required:"<?php echo "This Field is Required";?>",
                minlength: "<?php echo "Filed should have at least 8 charcters";?>"
            }
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
          
            var user_email = $("#user_email").val();
            var password = $("#user_login_password").val();
          
            $.post(base_url+'login/login', {'user_email': user_email,'user_login_password': $("#user_login_password").val()}, function (data) {
         
                if(data.code==1){
                    $("#successfully_register").html(data.message);
                    window.location.href = base_url + 'holiday/index/'+ data.user;
                }else if(data.code == -1){
                   
                    $("#show_error").html(data.data);
                   
                    
                }else if(data.code == 0) {
                    $("#show_error").html(data.message);
                }
            })
        }
    });
});


    

</script>