<!DOCTYPE html>
<html>
    <head>
        <title>Chat</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/chat.css'); ?>" />
    </head>
    <body>
        <div class="c-taskbar">
            <div class="c-taskbar-inner">
                <div class="c-floating">
                    <div class="c-right">
                        <div class="c-box">
                            <div class="c-box-tbar">
                                <span class="c-tbar-btn c-btn-minimize">&ndash;</span>
                                <span class="c-tbar-btn c-btn-close">&times;</span>
                            </div>
                            <div class="c-box-message"></div>
                            <div class="c-box-form">
                                <input type="text" class="c-input" />
                            </div>
                        </div>
                    </div>
                    <div class="c-clearfix"></div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="<?php echo assets_url('jquery/jquery-1.11.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo assets_url('jquery/jquery-migrate-1.2.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo assets_url('js/chat.js'); ?>"></script>
    </body>
</html>
