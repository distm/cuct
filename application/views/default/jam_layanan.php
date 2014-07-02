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
                        print_date('', array(
                            'format' => 'l, d F Y',
                            'locale' => TRUE
                        )); 
                    ?>
                </h4>
            </li>
            <li>
                <?php echo misc('Kotak Jam Layanan', FALSE); ?>
            </li>
        </ul>
        
    </div>
</div>