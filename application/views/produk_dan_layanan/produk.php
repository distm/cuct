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
                <h3><a href="<?php echo base_url('produk-dan-layanan/'. url_title($kategori, '-', TRUE)); ?>"><?php echo $kategori; ?></a> &raquo; 
                    <?php echo str_replace('.', ' &raquo; ', $produk['nama_produk']); ?></h3>
                <div class="line"></div>
                <div class="mt20"><?php echo $produk['deskripsi']; ?></div>
            </div>
        </div>
    </div>
</div>
<div class="line"></div>