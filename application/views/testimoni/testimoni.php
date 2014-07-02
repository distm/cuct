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
                <h3>Testimoni</h3>
                <div class="line"></div>
                <div>
                    <?php echo $paging; ?>
                    <?php foreach($testimoni as $row): ?>
                        <?php 
                        $summary = substr(strip_tags($row['konten']), 0, 200) . '...';
                        $href = base_url('testimoni/baca/'. $row['id'] .'/'. url_title($row['nama']));
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img src="<?php echo avatar_url($row['foto']); ?>" class="img-circle pull-right" style="margin:10px 0 0 30px;width:75px;" />
                                <a href="<?php echo $href; ?>" title="<?php echo $row['nama']; ?>"><strong><?php echo $row['nama']; ?></strong></a>
                                <div style="font-size:12px;margin-bottom:5px;"><?php echo print_date($row['tanggal_input'], array('format'=>'d F Y H:i')); ?></div>
                                <div><?php echo $summary; ?></div>
                                <div class="clearfix"></div>
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