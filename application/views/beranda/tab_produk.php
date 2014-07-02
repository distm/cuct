<div class="a-tab-home">
    <ul class="nav nav-tabs nav-justified home-tab">
        <li class="active"><a href="#p1">Simpanan</a></li>
        <li><a href="#p2">Pinjaman</a></li>
        <li><a href="#p3">Bantuan</a></li>
        <li><a href="#p4">Jalinan</a></li>
    </ul>
    
    <div class="a-tab-body tab-content">
        <div class="tab-pane active" id="p1">
            <?php 
            $get = $this->db->get_where('produk', array('kategori'=>'Simpanan'));
            if($get && $get->num_rows() > 0)
            {
                echo '<ul class="a-list">';
                foreach($get->result_array() as $row)
                {
                    $summary = substr(strip_tags($row['deskripsi']), 0, 60) . '...';
                    $href = base_url('produk-dan-layanan/simpanan/' . url_title($row['nama_produk'], '-', TRUE));
                    echo "<li><a href='{$href}'>{$row['nama_produk']}</a><br/>{$summary}</li>";
                }
                echo '</ul>';
            }
            else
            {
                echo '<div class="p10 text-center">Tidak ada data yang dapat ditapilkan.</div>';
            }
            ?>
        </div>
        <div class="tab-pane" id="p2">
            <?php 
            $get = $this->db->get_where('produk', array('kategori'=>'Pinjaman'));
            if($get && $get->num_rows() > 0)
            {
                echo '<ul class="a-list">';
                foreach($get->result_array() as $row)
                {
                    $summary = substr(strip_tags($row['deskripsi']), 0, 60) . '...';
                    $href = base_url('produk-dan-layanan/pinjaman/' . url_title($row['nama_produk'], '-', TRUE));
                    echo "<li><a href='{$href}'>{$row['nama_produk']}</a><br/>{$summary}</li>";
                }
                echo '</ul>';
            }
            else
            {
                echo '<div class="p10 text-center">Tidak ada data yang dapat ditapilkan.</div>';
            }
            ?>        
        </div>
        <div class="tab-pane" id="p3">
            <?php 
            $get = $this->db->not_like('nama_produk', 'jalinan', 'both')
                            ->where(array('kategori'=>'Bantuan dan Perlindungan'))
                            ->get('produk');
                            
            if($get && $get->num_rows() > 0)
            {
                echo '<ul class="a-list">';
                foreach($get->result_array() as $row)
                {
                    $summary = substr(strip_tags($row['deskripsi']), 0, 60) . '...';
                    $href = base_url('produk-dan-layanan/bantuan-dan-perlindungan/' . url_title($row['nama_produk'], '-', TRUE));
                    echo "<li><a href='{$href}'>{$row['nama_produk']}</a><br/>{$summary}</li>";
                }
                echo '</ul>';
            }
            else
            {
                echo '<div class="p10 text-center">Tidak ada data yang dapat ditapilkan.</div>';
            }
            ?>
        </div>
        <div class="tab-pane" id="p4">
            <?php 
            $get = $this->db->like('nama_produk', 'jalinan.', 'both')
                            ->get('produk');
                            
            if($get && $get->num_rows() > 0)
            {
                echo '<ul class="a-list">';
                foreach($get->result_array() as $row)
                {
                    $summary = substr(strip_tags($row['deskripsi']), 0, 60) . '...';
                    $href = base_url('produk-dan-layanan/bantuan-dan-perlindungan/' . url_title(str_replace('.', '_', $row['nama_produk']), '-', TRUE));
                    echo "<li><a href='{$href}'>". preg_replace('/(jalinan)\.?/i', '', $row['nama_produk']) ."</a><br/>{$summary}</li>";
                }
                echo '</ul>';
            }
            else
            {
                echo '<div class="p10 text-center">Tidak ada data yang dapat ditapilkan.</div>';
            }
            ?>        
        </div>
    </div>
</div>
