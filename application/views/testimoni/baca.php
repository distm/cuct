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
                <h3><?php echo $testimoni['nama']; ?></h3>
                <div class="line"></div>
                <div><?php echo print_date($testimoni['tanggal_input'], array('format'=>'d F Y H:i')); ?></div>
                
                <div class="mt20">
                    <img src="<?php echo avatar_url($testimoni['foto']); ?>" class="img-circle pull-left" style="margin:0 30px 10px 0;" />
                    <?php echo $testimoni['konten']; ?>
                    <div class="clearfix"></div>
                </div>
                
                <div class="clear mb20"></div>
                <div class="line"></div>
                <button class="btn btn-default" onclick="location.href='<?php echo base_url('testimoni'); ?>'"><i class="fa fa-chevron-left"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>
<div class="line"></div>