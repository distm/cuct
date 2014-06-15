<?php 
$href_add = admin_url("produk/tambah/". @$active_listgroup_menu);
?>
<div class="row show-grids">
    <div class="col-xs-3">
        <?php $this->load->content('listgroup_menu'); ?>
    </div>
    <div class="col-xs-9">
    
        <h3 class="mp00">
            Produk dan Layanan
            <?php 
            echo (@$caption_produk ? "<small>{$caption_produk}</small>" : ''); 
            echo (@$caption_subproduk ? "<small> &raquo; {$caption_subproduk}</small>" : ''); 
            ?>
        </h3>
        <div class="line"></div>
        
        <?php 
        $flashdata = $this->session->flashdata('flashdata');
        $flashid = $this->session->flashdata('flashid');
        ?>
        
        <?php if($flashdata != ''): ?>
            <div class="alert alert-info"><?php echo $flashdata; ?></div>
        <?php endif; ?>
        
        <?php $daftar_produk = @$produk[$active_listgroup_menu]; ?>
        <?php if(is_array($daftar_produk) && count($daftar_produk)): ?>
        
            <div class="mb10">
                <a href="<?php echo $href_add; ?>" class="btn btn-primary">Tambah Produk</a>
            </div>
            
            <?php foreach($daftar_produk as $row): ?>
                <?php
                $tanggal_input = print_date($row['tanggal_input'], array('format'=>'d F Y H:i:s', 'sufix'=>'WIB', 'return'=>TRUE));
                $summary = strip_tags($row['deskripsi']);
                if(strlen($summary) > 200)
                {
                    $summary = substr($summary, 0, strpos($summary, ' ', 190)).'...';
                }
                ?>
            
                <div class="panel panel-default a-panel <?php echo (md5($row['nama_produk']) == $flashid ? 'panel-info' : ''); ?>" id="produk-<?php echo $row['id']; ?>">
                    <div class="panel-body">
                        <div class="a-panel-title"><strong><?php echo "{$row['nama_produk']}"; ?></strong></div>
                        <div class="a-panel-date"><?php echo $tanggal_input; ?></div>
                        <div class="a-panel-summary"><?php echo $summary ?></div>
                        <div class="a-panel-nav">
                            <div class="pull-right">
                                <a href="<?php echo admin_url("produk/edit/{$row['id']}/{$active_listgroup_menu}"); ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="<?php echo admin_url("produk/tambah-subproduk/{$row['id']}/{$active_listgroup_menu}"); ?>" class="btn btn-primary btn-sm">Tambah Sub-Produk</a>
                                <a href="<?php echo admin_url('produk/hapus/'. $row['id']); ?>" class="btn btn-danger btn-sm" data-role="delete" data-ajax="false" data-confirm="Yakin akan menghapus data ini?">Hapus</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        <!-- sub produk jika ada -->
                        <?php if(isset($row['childs']) && is_array($row['childs']) && count($row['childs'])): ?>
                            <div class="line"></div>
                            
                            <?php foreach($row['childs'] as $child): ?>
                                <?php
                                $tanggal_input = print_date($child['tanggal_input'], array('format'=>'d F Y H:i:s', 'sufix'=>'WIB', 'return'=>TRUE));
                                $summary = strip_tags($child['deskripsi']);
                                if(strlen($summary) > 200)
                                {
                                    $summary = substr($summary, 0, strpos($summary, ' ', 190)).'...';
                                }
                                ?>
                            
                                <div style="margin:3px 0" class="panel a-panel <?php echo (md5($child['nama_produk']) == $flashid ? 'panel-info' : 'panel-warning'); ?>" id="produk-<?php echo $child['id']; ?>">
                                    <div class="panel-body">
                                        <div class="a-panel-title"><strong><?php echo str_replace($row['nama_produk'].'.', '', $child['nama_produk']); ?></strong></div>
                                        <div class="a-panel-date"><?php echo $tanggal_input; ?></div>
                                        <div class="a-panel-summary"><?php echo $summary ?></div>
                                        <div class="a-panel-nav">
                                            <div class="pull-right">
                                                <a href="<?php echo admin_url("produk/edit/{$child['id']}/{$active_listgroup_menu}"); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="<?php echo admin_url('produk/hapus/'. $child['id']); ?>" class="btn btn-danger btn-sm" data-role="delete" data-ajax="false" data-confirm="Yakin akan menghapus data ini?">Hapus</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <!-- /.sub produk jika ada -->
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
        
        <div class="mb20">
            <a href="<?php echo $href_add; ?>" class="btn btn-primary">Tambah Produk</a>
        </div>
        <div class="clearfix"></div>
        
    </div>
</div>