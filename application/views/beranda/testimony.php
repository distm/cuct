<div class="a-testimony" style="min-height:130px">
    <div class="a-testimony-title">TESTIMONY</div>

    <div class="row a-testimony-body">
        <?php 
        $get = $this->db->order_by('tanggal_input', 'desc')
                        ->limit(8)
                        ->get('testimoni');
                        
        if($get && $get->num_rows() > 0)
        {
            $i = 0;
            foreach($get->result_array() as $row)
            {
                $i++;
                ?>
                
                <div class="col-xs-4">
                    <div class="a-testimony-item">
                        <div class="a-ti-photo">
                            <img src="<?php echo avatar_url($row['foto']); ?>" />
                        </div>
                        <div class="a-ti-info">
                            <div class="a-ti-info-name"><?php echo $row['nama']; ?></div>
                            <div class="a-ti-info-date"><?php print_date($row['tanggal_input'], array('format'=>'d M Y H:i')); ?></div>
                            <div class="a-ti-info-message">
                                <?php echo trim(substr($row['konten'], 0, 50)) .'...'; ?>
                                <a href="<?php echo base_url('testimoni/baca/'.$row['id'].'/'.url_title($row['nama'])); ?>">Selengkapnya &raquo;</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
                <?php
                if($i % 4 == 0)
                {
                    echo '<div class="clearfix"></div>';
                }
            }
        }
        else
        {
            echo '<div class="p10 text-center">Tidak ada data yang dapat ditapilkan.</div>';
        }
        ?>
        
        <div class="clearfix"></div>
    </div>
</div>