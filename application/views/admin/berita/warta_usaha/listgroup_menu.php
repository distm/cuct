<?php $active = (isset($active_listgroup_menu) && $active_listgroup_menu) ? $active_listgroup_menu : 'table'; ?>

<div class="a-navigation" role="navigation">
    <ul class="nav nav-pills nav-stacked">
        <li class="<?php echo($active == 'table' ? 'active' : ''); ?>"><a href="<?php echo admin_url("berita/warta-usaha"); ?>" title="Daftar Warta Usaha">Daftar Warta Usaha</a></li>
        <li class="<?php echo($active == 'form'  ? 'active' : ''); ?>"><a href="<?php echo admin_url("berita/warta-usaha/tambah"); ?>" title="Tambah Warta Usaha">Tambah Warta Usaha</a></li>
    </ul>
</div>