<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <title><?php echo $page_title; ?></title>
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/todc/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/todc/css/todc-bootstrap.min.css'); ?>" />        
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/fa/css/font-awesome.min.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/select2/old/select2.css'); ?>" />        
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/style.css'); ?>" />
        
        <?php foreach((array)$css as $f): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $f; ?>" />
        <?php endforeach; ?>
        
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
    
        <div class="a-content">
            <div class="a-content-wrapper">
                <?php echo $header; ?>
                <?php echo $banner; ?>
                <?php echo $content; ?>
                <?php echo $footer; ?>
            </div>
        </div>
        
        <script type="text/javascript" src="<?php echo assets_url('libs/todc/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo assets_url('libs/select2/old/select2.min.js'); ?>"></script>
        
        <?php foreach((array)$js as $f): ?>
        <script type="text/javascript" src="<?php echo $f; ?>"></script>
        <?php endforeach; ?>
        
        <script type="text/javascript" src="<?php echo assets_url('js/app.js'); ?>"></script>
    </body>
</html>