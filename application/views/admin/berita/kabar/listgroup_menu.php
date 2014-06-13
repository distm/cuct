<?php $active = (isset($active_listgroup_menu) && $active_listgroup_menu) ? $active_listgroup_menu : 'table'; ?>

<div class="a-navigation" role="navigation">
    <ul class="nav nav-pills nav-stacked">
        <li class="<?php echo($active == 'table' ? 'active' : ''); ?>"><a href="<?php echo admin_url("berita/kabar"); ?>" title="Daftar Kabar">Daftar Kabar</a></li>
        <li class="<?php echo($active == 'form'  ? 'active' : ''); ?>"><a href="<?php echo admin_url("berita/kabar/tambah"); ?>" title="Tambah Kabar">Tambah Kabar</a></li>
    </ul>
</div>