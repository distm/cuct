<div class="row show-grids">
    <div class="col-xs-3">
        <?php $this->load->content('listgroup_menu'); ?>
    </div>
    <div class="col-xs-9">
    
        <h3 class="mp00">
            <?php echo isset($mode) ? 'Edit' : 'Tambah'; ?>
            <?php echo isset($parent) ? 'Sub' : ''; ?>
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
        <?php elseif($caption_produk != '' && @$mode != 'edit'): ?>
            <div class="alert alert-warning">
                <?php if(! isset($parent)): ?>
                    Produk dan Layanan akan disimpan dikategori <strong><?php echo $caption_produk; ?></strong>.
                <?php else: ?>
                    Sub Produk dan Layanan akan disimpan dikategori <strong><?php echo $caption_produk; ?></strong> dibawah <strong><?php echo $parent['nama_produk']; ?></strong>.
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <form class="form-horizontal" role="form" method="post" action="<?php echo admin_url('produk/simpan'); ?>">
            <div class="form-group">
                <label for="nama_produk" class="col-sm-2 control-label">Nama Produk</label>
                <div class="col-sm-10">
                    <?php $default_value = isset($parent) ? $parent['nama_produk'].'.' : @$detail['nama_produk']; ?>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo set_value('nama_produk', $default_value); ?>" placeholder="Nama Produk" />
                    <?php echo form_error('nama_produk', '<span class="help-block" style="color:#D00">', '</span>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="kategori" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-10">
                    <?php $default_value = isset($detail['kategori']) ? $detail['kategori'] : @$caption_produk; ?>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo set_value('kategori', $default_value); ?>" placeholder="Kategori" />
                    <?php echo form_error('nama_produk', '<span class="help-block" style="color:#D00">', '</span>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control use-mce" id="deskripsi" name="deskripsi" rows="10"><?php echo set_value('deskripsi', @$detail['deskripsi']); ?></textarea>
                    <?php echo form_error('deskripsi', '<span class="help-block" style="color:#D00">', '</span>'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <?php if(@$mode === 'edit'): ?>
                        <input type="hidden" name="id" value="<?php echo @$detail['id']; ?>" />
                        <input type="hidden" name="mode" value="<?php echo @$mode; ?>" />
                    <?php endif; ?>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </div>
        </form>
        
        <div class="clearfix"></div>
        
    </div>
</div>