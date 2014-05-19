<?php 
$json = $this->load->view('default/navigation_json', '', TRUE);
$navs = json_decode($json, TRUE);
?>
<div class="a-footer">
    <div class="line"></div>
    <div class="container">
        <div class="row show-grids">
            
            <div class="col-xs-3">
                <ul class="list-group">
                    <li class="list-group-header">Navigasi</li>
                    <?php foreach($navs as $nav): ?>
                        <?php if(! preg_match('/(beranda|profil|produk)/i', $nav['class'])): ?>
                            <li class="list-group-item">
                                <a href="<?php echo base_url($nav['class']); ?>"><?php echo $nav['caption']; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        
            <div class="col-xs-3">
                <ul class="list-group">
                    <li class="list-group-header">Produk Simpanan</li>
                    <?php foreach($navs[2]['children'][0]['children'] as $nav): ?>
                        <li class="list-group-item">
                            <a href="<?php echo base_url($nav['class']); ?>"><?php echo $nav['caption']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        
            <div class="col-xs-3">
                <ul class="list-group">
                    <li class="list-group-header">Produk Pinjaman</li>
                    <?php foreach($navs[2]['children'][1]['children'] as $nav): ?>
                        <li class="list-group-item">
                            <a href="<?php echo base_url($nav['class']); ?>"><?php echo $nav['caption']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        
            <div class="col-xs-3">
                <ul class="list-group">
                    <li class="list-group-header">Profil CUCT</li>
                    <?php foreach($navs[1]['children'] as $nav): ?>
                        <li class="list-group-item">
                            <a href="<?php echo base_url($nav['class']); ?>"><?php echo $nav['caption']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        
        </div>
    </div>

    <div class="a-copyright">
        <div class="pull-left">
            <div class="a-copyright-text">
            &copy; 2014 - CU Cindelaras Tumangkar - All Rights Reserved
            </div>
        </div>
        <div class="pull-right">
            <div class="a-quick-contact">
                <a href="#mail"><i class="fa fa-envelope"></i></a>
                <a href="#fb"><i class="fa fa-facebook"></i></a>
                <a href="#twitter"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>