<?php 
$navs = array(
    array(
        'class' => 'beranda',
        'caption' => 'Beranda',
        'href' => base_url()
    ),
    array(
        'class' => 'profil',
        'caption' => 'Profil CUCT',
        'children' => array(
            array(
                'class' => 'profil',
                'method' => 'sejarah',
                'caption' => 'Sejarah'
            ),
            array(
                'class' => 'profil',
                'method' => 'visi-dan-misi',
                'caption' => 'Visi dan Misi'
            ),
            array(
                'class' => 'profil',
                'method' => 'struktur-organisasi',
                'caption' => 'Struktur Organisasi'
            ),
            array(
                'class' => 'profil',
                'method' => 'pengurus-dan-pengawas',
                'caption' => 'Pengurus dan Pengawas'
            )
        )
    ),
    array(
        'class' => 'produk-dan-layanan',
        'caption' => 'Produk dan Layanan',
        'children' => array(
            array(
                'class' => 'produk-dan-layanan',
                'method' => 'simpanan',
                'caption' => 'Simpanan',
                'children' => array(
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'simpanan',
                        'params' => 'saham',
                        'caption' => 'Simpanan Saham'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'simpanan',
                        'params' => 'sikendi',
                        'caption' => 'Simpanan Sikendi'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'simpanan',
                        'params' => 'pendidikan',
                        'caption' => 'Simpanan Pendidikan'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'simpanan',
                        'params' => 'siwaris',
                        'caption' => 'Simpanan Siwaris'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'simpanan',
                        'params' => 'ibadah',
                        'caption' => 'Simpanan Ibadah'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'simpanan',
                        'params' => 'properti',
                        'caption' => 'Simpanan Properti'
                    )
                )
            ),
            array(
                'class' => 'produk-dan-layanan',
                'method' => 'pinjaman',
                'caption' => 'Pinjaman',
                'children' => array(
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'pinjaman',
                        'params' => 'usaha-produktif',
                        'caption' => 'Pinjaman Usaha Produktif'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'pinjaman',
                        'params' => 'kesejahteraan',
                        'caption' => 'Pinjaman Kesejahteraan'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'pinjaman',
                        'params' => 'kapitalisasi',
                        'caption' => 'Pinjaman Kapitalisasi'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'pinjaman',
                        'params' => 'properti',
                        'caption' => 'Pinjaman Properti'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'pinjaman',
                        'params' => 'musiman',
                        'caption' => 'Pinjaman Musiman'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'pinjaman',
                        'params' => 'cikal',
                        'caption' => 'Cikal'
                    )
                )
            ),
            array(
                'class' => 'produk-dan-layanan',
                'method' => 'bantuan-dan-perlindungan',
                'caption' => 'Bantuan dan Perlindungan',
                'children' => array(
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'bantuan-dan-perlindungan',
                        'params' => 'solduka',
                        'caption' => 'Solduka'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'bantuan-dan-perlindungan',
                        'params' => 'sari',
                        'caption' => 'Sari'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'bantuan-dan-perlindungan',
                        'params' => 'bayi',
                        'caption' => 'Bayi CU'
                    ),
                    array(
                        'class' => 'produk-dan-layanan',
                        'method' => 'bantuan-dan-perlindungan',
                        'params' => 'jalinan',
                        'caption' => 'Jalinan',
                        'children' => array(
                            array(
                                'class' => 'produk-dan-layanan',
                                'method' => 'bantuan-dan-perlindungan',
                                'params' => 'jalinan/tunas',
                                'caption' => 'Tunas'
                            ),
                            array(
                                'class' => 'produk-dan-layanan',
                                'method' => 'bantuan-dan-perlindungan',
                                'params' => 'jalinan/lintang',
                                'caption' => 'Lintang'
                            )
                        )
                    )
                )
            )
        )
    ),
    array(
        'class' => 'kabar',
        'caption' => 'Kabar',
        'active_parent' => base_url('kabar')
    ),
    array(
        'class' => 'inspirasi',
        'caption' => 'Inspirasi',
        'active_parent' => base_url('inspirasi')
    ),
    array(
        'class' => 'warta-usaha',
        'caption' => 'Warta Usaha',
        'active_parent' => base_url('warta-usaha')
    ),
    array(
        'class' => 'berita-lelayu',
        'caption' => 'Berita Lelayu',
        'active_parent' => base_url('berita-lelayu')
    ),
    array(
        'class' => 'galeri',
        'active_parent' => base_url('galeri'),
        'caption' => 'Galeri'
    ),
    array(
        'class' => 'misc',
        'method' => 'agenda',
        'href' => base_url('misc/agenda'),
        'caption' => 'Agenda'
    ),
    array(
        'class' => 'misc',
        'method' => 'tempat-layanan',
        'href' => base_url('misc/tempat-layanan'),
        'caption' => 'Tempat Pelayanan'
    )
);

// override profil
$get_childs = $this->db->select('judul')->order_by('tanggal_input')->get('profil');
if($get_childs && $get_childs->num_rows()>0)
{
    $navs[1] = array(
        'class' => 'profil',
        'caption' => 'Profil CUCT',
        'active_parent' => base_url('profil')
    );
    foreach($get_childs->result_array() as $child)
    {
        $navs[1]['children'][] = array(
            'class' => 'profil',
            'method' => url_title($child['judul'], '-', TRUE),
            'caption' => $child['judul']
        );
    }
}

// override produk
$get_product = $this->db->select('nama_produk, kategori, has_child')->order_by('tanggal_input')->get('produk');
if($get_product && $get_product->num_rows()>0)
{
    $navs[2] = array(
        'class' => 'produk-dan-layanan',
        'active_parent' => base_url('produk-dan-layanan'),
        'caption' => 'Produk dan Layanan',
    );
    
    $parent_route = array();
    $products = array();
    foreach($get_product->result_array() as $produk)
    {
        $ctg = $produk['kategori'];
        if(strpos($produk['nama_produk'], '.') === FALSE)
        {
            $products[$ctg]['class'] = 'produk-dan-layanan';
            $products[$ctg]['method'] = url_title($ctg, '-', TRUE);
            $products[$ctg]['caption'] = $ctg;
            $products[$ctg]['children'][] = array(
                'class' => 'produk-dan-layanan',
                'method' => url_title($ctg, '-', TRUE),
                'params' => url_title($produk['nama_produk'], '-', TRUE),
                'caption' => $produk['nama_produk']
            );
            
            if($produk['has_child'] == 'Y')
            {
                $parent_route[$produk['nama_produk']] = $ctg.'|'.(count($products[$ctg]['children'])-1);
            }
        }
        else
        {
            $str = explode('.', $produk['nama_produk']);
            $route = explode('|', $parent_route[$str[0]]);
            $products[$route[0]]['children'][$route[1]]['children'][] = array(
                'class' => 'produk-dan-layanan',
                'method' => url_title($ctg, '-', TRUE),
                'params' => url_title(str_replace('.', '_', $produk['nama_produk']), '-', TRUE),
                'caption' => substr($produk['nama_produk'], strpos($produk['nama_produk'],'.')+1)
            );
        }
    }
    
    $navs[2]['children'] = array_values($products);
}

echo json_encode($navs);