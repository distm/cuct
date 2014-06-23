<div class="row show-grids">
    <div class="col-xs-3">
        <?php $this->load->content('listgroup_menu'); ?>
    </div>
    <div class="col-xs-9">
        <h3 class="mp00"><?php echo (@$mode == 'edit' ? 'Edit Inspirasi' : 'Tambah Inspirasi'); ?></h3>
        <div class="line"></div>
        
        <form method="post" action="<?php echo admin_url('berita/inspirasi/simpan'); ?>" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="judul" class="col-sm-2 control-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo set_value('judul', @$detail['judul']); ?>" placeholder="Judul" />
                    <?php echo form_error('judul', '<span class="help-block" style="color:#D00">', '</span>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="col-sm-2 control-label">Tags</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="tags" name="tags" value="<?php echo set_value('tags', @$detail['tags']); ?>" placeholder="Tags" />
                </div>
                <div class="col-sm-4">
                    <span class="help-block" style="margin-left:-20px;">Pisahkan dengan koma.</span>
                </div>
            </div>
            <div class="form-group">
                <label for="konten" class="col-sm-2 control-label">Isi</label>
                <div class="col-sm-10">
                    <textarea class="form-control use-mce" id="konten" name="konten" rows="10"><?php echo set_value('konten', @$detail['konten']); ?></textarea>
                    <?php echo form_error('konten', '<span class="help-block" style="color:#D00">', '</span>'); ?>
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
    </div>
</div>