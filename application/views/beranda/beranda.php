<div class="container">
    <div class="row show-grids">
        <!-- left -->
        <div class="col-xs-3">
            <?php echo $this->_data['navigation']; ?>
            
            <div class="clearfix mb20"></div>
            
            <?php $this->load->view('default/download'); ?>
            
            <div class="clearfix mb20"></div>
            
            <?php $this->load->view('default/jam_layanan'); ?>
        </div>
        
        <!-- center -->
        <div class="col-xs-6">
            <?php $this->load->content('quote'); ?>
            <?php $this->load->view('default/banner-slide'); ?>
            <?php $this->load->content('tab_content'); ?>
            
            <div class="clearfix mb20"></div>
            
            <?php $this->load->content('tab_produk'); ?>
        </div>
        
        <!-- right -->
        <div class="col-xs-3">
            <?php $this->load->view('default/calculator'); ?>
            
            <div class="clearfix mb20"></div>
            
            <?php $this->load->view('default/online_support'); ?>
            
            <div class="clearfix mb20"></div>
            
            <?php $this->load->view('default/external_links'); ?>
            
            <div class="clearfix mb20"></div>
            
            <?php $this->load->view('default/statistik'); ?>
        </div>
    </div>
    
    <div class="clearfix mb10"></div>
    
    <?php $this->load->content('testimony'); ?>
</div>