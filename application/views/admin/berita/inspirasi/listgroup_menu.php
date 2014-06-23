<?php $active = (isset($active_listgroup_menu) && $active_listgroup_menu) ? $active_listgroup_menu : 'table'; ?>

<div class="a-navigation" role="navigation">
    <ul class="nav nav-pills nav-stacked">
        <li class="<?php echo($active == 'table' ? 'active' : ''); ?>"><a href="<?php echo admin_url("berita/inspirasi"); ?>" title="Daftar Inspirasi">Daftar Inspirasi</a></li>
        <li class="<?php echo($active == 'form'  ? 'active' : ''); ?>"><a href="<?php echo admin_url("berita/inspirasi/tambah"); ?>" title="Tambah Inspirasi">Tambah Inspirasi</a></li>
    </ul>
</div>