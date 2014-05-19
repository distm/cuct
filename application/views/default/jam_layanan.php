<div class="widget">
    <div class="widget-header">
        <div class="widget-title">Jam Layanan</div>
    </div>
    <div class="widget-body">
    
        <ul class="a-list a-list-none">
            <li>
                <h1 class="text-center pm00" style="padding:5px 0 0;">
                    <span id="a-date-second"><?php echo date('H:i:s'); ?></span>
                </h1>
                <h4 class="text-center pm00" style="padding-bottom:15px;">
                    <?php 
                        print_date(array(
                            'format' => 'l, d F Y',
                            'locale' => TRUE
                        )); 
                    ?>
                </h4>
            </li>
            <li>
                <span class="pull-right label label-success">08.00-15.00 WIB</span>
                Senin-Jumat
            </li>
            <li>
                <span class="pull-right label label-success">08.00-13.00 WIB</span>
                Sabtu
            </li>
            <li>
                <span class="pull-right label label-danger">Tutup</span>
                Minggu/ Raya
            </li>
        </ul>
        
    </div>
</div>