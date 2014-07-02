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
                <h3><?php echo $inspirasi['judul']; ?></h3>
                <div class="line"></div>
                <div><?php echo print_date($inspirasi['tanggal_input'], array('format'=>'d F Y H:i')); ?></div>
                <div class="mt20"><?php echo $inspirasi['konten']; ?></div>
                
                <div class="clear mb20"></div>
                <div class="line"></div>
                <button class="btn btn-default" onclick="self.history.go(-1)"><i class="fa fa-chevron-left"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>
<div class="line"></div>