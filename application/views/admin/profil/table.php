<?php 
$current = array();
foreach($profil as $row)
{
    if($row['judul'] == $judul)
    {
        $current = $row;
        break;
    }
}
?>

<div class="row">
    <div class="col-xs-3">
        <?php $this->load->content('listgroup_menu'); ?>
    </div>
    <div class="col-xs-9">
    
        <h3 class="mp00"><?php echo $judul; ?></h3>
        <div class="line"></div>
        
        <?php $flashdata = $this->session->flashdata('flashdata'); ?>
        <?php if($flashdata != ''): ?>
            <div class="alert alert-info"><?php echo $flashdata; ?></div>
        <?php endif; ?>
        
        <form method="post" role="form" class="form-horizontal" action="<?php echo admin_url('profil/simpan'); ?>">
            <div class="form-group">
                <label for="judul" class="col-sm-2 control-label">
                    <?php echo $active_listgroup_menu == 'tambah' ? 'Judul' : 'Ganti Judul'; ?>
                </label>
                <div class="col-sm-10">
                    <?php $default_value = $active_listgroup_menu == 'tambah' ? '' : $judul; ?>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo set_value('judul', $default_value); ?>" placeholder="Judul" />
                    <?php echo form_error('judul', '<span class="help-block" style="color:#D00">', '</span>'); ?>
                </div>
            </div>        
            <div class="row">
                <div class="col-sm-12">
                    <textarea class="form-control use-mce" id="konten" name="konten" rows="10"><?php echo set_value('konten', @$current['konten']); ?></textarea>
                    <?php echo form_error('konten', '<span class="help-block" style="color:#D00">', '</span>'); ?>
                </div>
            </div>
            <div class="clearfix mb15"></div>
            <div class="form-group">
                <div class="col-sm-10">
                    <?php if($active_listgroup_menu == 'tambah'): ?>
                        <input type="hidden" name="id" value="tambah" />
                        <button type="submit" class="btn btn-danger">Simpan</button>
                    <?php else: ?>
                        <input type="hidden" name="id" value="<?php echo @$current['id']; ?>" />
                        <button type="submit" class="btn btn-danger">Simpan Perubahan</button>
                    <?php endif; ?>
                </div>
            </div>
        </form>
        
    </div>
</div>
