<div class="a-tab-home">
    <ul class="nav nav-tabs nav-justified home-tab">
        <li class="active"><a href="#c1">Kabar Terkini</a></li>
        <li><a href="#c2">Inspirasi</a></li>
        <li><a href="#c3">Tempat Pelayanan</a></li>
        <li><a href="#c4">Agenda</a></li>
        <li><a href="#c5">Persyaratan</a></li>
    </ul>
    
    <div class="a-tab-body tab-content">
        <div class="tab-pane active" id="c1">
            <?php 
            $get = $this->db->limit(5)
                            ->order_by('tanggal_input', 'desc')
                            ->get('kabar');
            if($get && $get->num_rows()>0)
            {
                echo '<ul class="a-list">';
                foreach($get->result_array() as $row)
                {
                    $href = base_url('kabar/baca/'. $row['id'] .'/'. url_title($row['judul']));
                    echo "<li><a href='{$href}'>{$row['judul']}</a></li>";
                }
                echo '</ul>';
            }
            else
            {
                echo '<div class="p10 text-center">Tidak ada data yang dapat ditampilkan</div>';
            }
            ?>
        </div>
        <div class="tab-pane" id="c2">
            <?php 
            $get = $this->db->limit(5)
                            ->order_by('tanggal_input', 'desc')
                            ->get('inspirasi');
            if($get && $get->num_rows()>0)
            {
                echo '<ul class="a-list">';
                foreach($get->result_array() as $row)
                {
                    $href = base_url('inspirasi/baca/'. $row['id'] .'/'. url_title($row['judul']));
                    echo "<li><a href='{$href}'>{$row['judul']}</a></li>";
                }
                echo '</ul>';
            }
            else
            {
                echo '<div class="p10 text-center">Tidak ada data yang dapat ditampilkan</div>';
            }
            ?>
        </div>
        <div class="tab-pane" id="c3">
            <?php echo misc('Tab Home Tempat Layanan', FALSE); ?>
        </div>
        <div class="tab-pane" id="c4">
            <?php echo misc('Tab Home Agenda', FALSE); ?>
        </div>
        <div class="tab-pane" id="c5">
            <?php echo misc('Tab Home Persyaratan', FALSE); ?>
        </div>
    </div>
</div>
