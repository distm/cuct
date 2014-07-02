<div class="widget">
    <div class="widget-header">
        <div class="widget-title">Download</div>
    </div>
    <div class="widget-body">
    
        <ul class="a-list list-file">
            <?php 
            $server_path = SERVER_BASE_PATH . 'share/fm/download/';
            $files = get_dir_file_info($server_path);
            ?>
            <?php foreach($files as $file): ?>
                <?php 
                $size = round($file['size']/1024, 2) .' kb';
                $ext = substr($file['name'], strrpos($file['name'], '.')+1);
                $href = base_url('download/?s='. str_replace('=','', base64_encode($file['name'])));
                
                if(preg_match('/(doc|xls|pdf|txt|zip|rar|ppt|png|jpg|gif)/i', $ext)):
                ?>
                    <li>
                        <a href="<?php echo $href; ?>">
                            <span class="file-name"><?php echo $file['name']; ?></span><br />
                            <span class="file-size"><i class="fa <?php echo file_icon($ext); ?>"></i> <?php echo $size; ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    
    </div>
</div>
