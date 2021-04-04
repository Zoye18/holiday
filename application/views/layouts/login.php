<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Holiday System</title>

        <?php if(isset($_SESSION['user']['theme_uri']) && $_SESSION['user']['theme_uri']!=null):?>
			<link href="<?php echo base_url() . 'assets/layouts/layout/css/themes/'. $_SESSION['user']['theme_uri'];?>" rel="stylesheet"  type="text/css" id="style_color" />
		<?php else:?>
			<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" id="style_color"/>
		<?php endif; ?>
        
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js"></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery.blockui.min.js"></script>
	  <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script>var base_url = '<?php echo base_url(); ?>';</script>
    </head>
    <body>

        <div class="container">
	    <?php $this->load->view($view); ?>
        </div>
    </body>
</html>
