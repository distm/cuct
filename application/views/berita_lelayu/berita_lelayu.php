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
                <h3>Kabar</h3>
                <div class="line"></div>
                <div>
                    <?php echo $paging; ?>
                    <?php foreach($berita_lelayu as $row): ?>
                        <?php 
                        $summary = substr(strip_tags($row['konten']), 0, 200) . '...';
                        $href = base_url('berita-lelayu/baca/'. $row['id'] .'/'. url_title($row['judul']));
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <a href="<?php echo $href; ?>" title="<?php echo $row['judul']; ?>"><strong><?php echo $row['judul']; ?></strong></a>
                                <div style="font-size:12px;margin-bottom:5px;"><?php echo print_date($row['tanggal_input'], array('format'=>'d F Y H:i')); ?></div>
                                <div><?php echo $summary; ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php echo $paging; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="line"></div>