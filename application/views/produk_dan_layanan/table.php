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
                <h3><?php echo $kategori; ?></h3>
                <div class="line"></div>
                <div class="mt20">
                
                    <?php foreach($produk as $row): ?>
                        <?php 
                        $summary = substr(strip_tags($row['deskripsi']), 0, 200) . '...';
                        $href = base_url('produk-dan-layanan/'. url_title($kategori, '-', TRUE) . '/' . url_title($row['nama_produk'], '-', TRUE));
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <a href="<?php echo $href; ?>" title="<?php echo $row['nama_produk']; ?>"><strong><?php echo $row['nama_produk']; ?></strong></a>
                                <div><?php echo $summary; ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                
                </div>
            </div>
        </div>
    </div>
</div>
<div class="line"></div>