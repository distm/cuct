<div class="a-navigation" role="navigation">
    <ul class="nav nav-pills nav-stacked">
        <li class="<?php echo ('table' == @$active_listgroup_menu) ? 'active' : ''; ?>">
            <a href="<?php echo admin_url('testimoni'); ?>" title="Daftar Testimoni">Daftar Testimoni</a>
        </li>
        <li class="<?php echo ('tambah' == @$active_listgroup_menu) ? 'active' : ''; ?>">
            <a href="<?php echo admin_url('testimoni/tambah'); ?>" title="Tambah testimoni">Tambah Testimoni</a>
        </li>
    </ul>
</div>