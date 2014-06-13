<div class="row show-grids">
    <div class="col-xs-3">
        <?php $this->load->content('listgroup_menu'); ?>
    </div>
    <div class="col-xs-9">
    
        <h3 class="mp00">Berita Lelayu</h3>
        <div class="line"></div>
        
        <?php 
        $flashdata = $this->session->flashdata('flashdata');
        $flashid = $this->session->flashdata('flashid');
        ?>
        
        <?php if($flashdata != ''): ?>
            <div class="alert alert-info"><?php echo $flashdata; ?></div>
        <?php endif; ?>
        
        <div class="row mt15 mb15">
            <div class="col-md-7 text-left"><?php echo $paging; ?></div>
            <div class="col-md-5 text-right"><?php $this->load->content('search'); ?></div>
        </div>
        
        <?php if(is_array($lelayu) && count($lelayu)): ?>
        
            <?php foreach($lelayu as $row): ?>
                <?php
                $tanggal_input = print_date($row['tanggal_input'], array('format'=>'d F Y H:i:s', 'sufix'=>'WIB', 'return'=>TRUE));
                $summary = strip_tags($row['konten']);
                if(strlen($summary) > 200)
                {
                    $summary = substr($summary, 0, strpos($summary, ' ', 190)).'...';
                }
                ?>
            
                <div class="panel panel-default a-panel <?php echo (md5($row['judul']) == $flashid ? 'panel-info' : ''); ?>" id="lelayu-<?php echo $row['id']; ?>">
                    <div class="panel-body">
                        <div class="a-panel-title"><strong><?php echo "#{$row['id']} - {$row['judul']}"; ?></strong></div>
                        <div class="a-panel-date"><?php echo $tanggal_input; ?></div>
                        <div class="a-panel-summary"><?php echo $summary ?></div>
                        <div class="a-panel-nav">
                            <div class="pull-right">
                                <a href="<?php echo admin_url('berita/lelayu/edit/'. $row['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="<?php echo admin_url('berita/lelayu/delete/'. $row['id']); ?>" class="btn btn-danger btn-sm" data-role="delete" data-ajax="false" data-confirm="Yakin akan menghapus data ini?">Hapus</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                
            <?php endforeach; ?>
            
        <?php else: ?>
            
            <div class="alert alert-warning">
                <?php if(isset($cari) && $cari != ''): ?>
                    Pencarian dengan kata kunci <strong><?php echo $cari; ?></strong> tidak menemukan apapun.
                <?php else: ?>
                    Tidak ada data yang dapat ditampilkan.
                <?php endif; ?>
            </div>
        
        <?php endif; ?>
        
        <?php echo $paging; ?>
        
    </div>
    
    <div class="clearfix mb15"></div>
    
</div>