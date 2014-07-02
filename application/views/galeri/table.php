<div class="container">
    <div class="row">
        <!-- left -->
        <div class="col-xs-3">
            <?php echo $this->_data['navigation']; ?>
            
            <div class="clearfix mb20"></div>
            
            <?php $this->load->view('default/calculator'); ?>
            
            <div class="clearfix mb20"></div>
            
            <?php $this->load->view('default/online_support'); ?>
            
            <div class="clearfix mb20"></div>
            
            <?php $this->load->view('default/jam_layanan'); ?>
        </div>
        
        <!-- center -->
        <div class="col-xs-9">
            <div class="content">
                <?php 
                $path = trim(trim(str_replace('galeri', '', $current_path),'/'));
                if($path == ''):
                ?>
                    <h3>Galeri</h3>
                <?php else: ?>
                    <h3><a href="<?php echo base_url('galeri'); ?>">Galeri</a> &raquo; <?php echo $path; ?></h3>
                <?php endif; ?>
                
                <div class="line"></div>
                <div class="mt20">
                
                    <!-- Albums -->
                    <?php if(isset($dirs) && is_array($dirs)): ?>
                        <strong>Album</strong>
                        <ul class="a-list-thumb">
                        <?php foreach($dirs as $dir): ?>
                            <li class="album">
                                <a href="<?php echo $current_url_path . $dir['name']; ?>">
                                    <?php if(isset($dir['children']) && isset($dir['children'][0])): ?>
                                        <span class="layer-1"></span>
                                        <span class="layer-2"></span>
                                        <img src="<?php echo base_url('share/thumbs/galeri/'. $dir['name']) .'/'. $dir['children'][0]['name']; ?>" />
                                    <?php endif; ?>
                                    <span class="name"><?php echo $dir['name']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    
                    <!-- Pics -->
                    <?php if(isset($files) && is_array($files)): ?>
                        <?php if(isset($dirs) && is_array($dirs)): ?>
                            <div class="line" style="margin-bottom:20px"></div>
                        <?php endif; ?>
                        
                        <strong>Foto</strong>
                        <div class="gallery">
                        <ul class="a-list-thumb">
                        <?php foreach($files as $file): ?>
                            <?php 
                            $href = base_url('share/fm') .'/'. $current_path .'/'. $file['name'];
                            ?>
                            <li>
                                <a data-gallery="g1" data-parent="gallery" data-toggle="lightbox" href="<?php echo $href; ?>">
                                    <img src="<?php echo base_url('share/thumbs') .'/'. $current_path .'/'. $file['name']; ?>" />
                                </a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                        </div>
                    <?php endif; ?>
                
                </div>
            </div>
        </div>
    </div>
</div>
<div class="line"></div>