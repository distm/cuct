<div class="a-navigation" role="navigation">
    <ul class="nav nav-pills nav-stacked">
        <?php foreach($produk as $nama_kategori=>$daftar_produk): ?>
            <?php 
            $url_title = url_title($nama_kategori);
            $href = admin_url("produk/table/". $url_title);
            $is_active = ($url_title == @$active_listgroup_menu) ? 'active' : '';
            ?>
            <li class="<?php echo $is_active; ?>">
                <a href="<?php echo $href; ?>" title="<?php echo $nama_kategori; ?>"><?php echo $nama_kategori; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>