<div class="row show-grids">
    <div class="col-xs-3">
        <?php $this->load->content('listgroup_menu'); ?>
    </div>
    <div class="col-xs-9">
    
        <h3 class="mp00"><?php echo isset($detail) ? 'Edit Testimoni' : 'Tambah Testimoni'; ?></h3>
        <div class="line"></div>
        
        <?php $flashdata = $this->session->flashdata('flashdata'); ?>
        <?php if($flashdata != ''): ?>
            <div class="alert alert-info"><?php echo $flashdata; ?></div>
        <?php endif; ?>
        
        <form role="form" class="form-horizontal" method="post" action="<?php echo admin_url('testimoni/simpan'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo set_value('nama', @$detail['nama']); ?>" />
                    <?php echo form_error('nama', '<span style="color:red">', '</span>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="foto" class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-5">
                    <?php if(isset($detail['foto'])): ?>
                        <div style="margin-bottom:5px">
                            <img style="border:1px solid #999; padding:1px" src="<?php echo avatar_url($detail['foto']); ?>" />
                        </div>
                    <?php endif; ?>
                    <input type="file" name="foto" id="foto" />
                </div>
            </div>
            <div class="form-group">
                <label for="konten" class="col-sm-2 control-label">Konten</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="konten" id="konten" rows="10"><?php echo set_value('konten', @$detail['konten']); ?></textarea>
                    <?php echo form_error('konten', '<span style="color:red">', '</span>'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-7 col-sm-offset-2">
                    <?php if(isset($detail)): ?>
                        <input type="hidden" name="mode" value="edit" />
                        <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" />
                    <?php endif; ?>
                    <button class="btn btn-primary" type="submit"><?php echo isset($detail) ? 'Simpan Perubahan' : 'Simpan'; ?></button>
                </div>
            </div>
        </form>
        
    </div>
</div>
