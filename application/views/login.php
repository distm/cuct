<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <title>Login</title>
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/todc/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/todc/css/todc-bootstrap.min.css'); ?>" />        
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/fa/css/font-awesome.min.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/style-login.css'); ?>" />
        
        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/style-ie.css'); ?>" />
        <![endif]-->
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="<?php echo assets_url('libs/html5shiv.js'); ?>"></script>
            <script src="<?php echo assets_url('libs/respond.min.js'); ?>"></script>
        <![endif]-->
        <script type="text/javascript">
            var App = {
                base_url: "<?php echo base_url(); ?>"
            };
        </script>
        <script type="text/javascript" src="<?php echo assets_url('jquery/jquery-1.11.1.min.js'); ?>"></script>
    </head>
    <body>
    
        <div class="a-login">
            <h3>CUCT Administrator</h3>
            <form role="form" method="post" action="<?php echo base_url('auth/check'); ?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                    <?php echo form_error('username', '<span class="help-block" style="color:red">', '</span>'); ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php echo form_error('password', '<span class="help-block" style="color:red">', '</span>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
        <script type="text/javascript" src="<?php echo assets_url('libs/todc/js/bootstrap.min.js'); ?>"></script>
    </body>
</html>