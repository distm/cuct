<div class="a-navigation" role="navigation">
    <ul class="nav nav-pills nav-stacked">
        <?php foreach($profil as $menu): ?>
            <?php 
            $url_title = url_title($menu['judul']);
            $href = admin_url("profil/table/". $url_title);
            $is_active = ($url_title == @$active_listgroup_menu) ? 'active' : '';
            ?>
            <li class="<?php echo $is_active; ?>">
                <a href="<?php echo $href; ?>" title="<?php echo $menu['judul']; ?>"><?php echo $menu['judul']; ?></a>
            </li>
        <?php endforeach; ?>
        
        <li class="<?php echo ('tambah' == @$active_listgroup_menu) ? 'active' : ''; ?>">
            <a href="<?php echo admin_url('profil/tambah'); ?>" title="Tambah">+ Tambah</a>
        </li>
    </ul>
</div>