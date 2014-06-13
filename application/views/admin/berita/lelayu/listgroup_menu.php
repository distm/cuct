<?php $active = (isset($active_listgroup_menu) && $active_listgroup_menu) ? $active_listgroup_menu : 'table'; ?>

<div class="a-navigation" role="navigation">
    <ul class="nav nav-pills nav-stacked">
        <li class="<?php echo($active == 'table' ? 'active' : ''); ?>"><a href="<?php echo admin_url("berita/lelayu"); ?>" title="Daftar Berita Lelayu">Daftar Berita Lelayu</a></li>
        <li class="<?php echo($active == 'form'  ? 'active' : ''); ?>"><a href="<?php echo admin_url("berita/lelayu/tambah"); ?>" title="Tambah Berita Lelayu">Tambah Berita Lelayu</a></li>
    </ul>
</div>