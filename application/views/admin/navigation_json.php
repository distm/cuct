[
    {"class":"profil", "caption":"Profil CUCT", "active_parent":"<?php echo admin_url('profil'); ?>"},
    {"class":"produk", "caption":"Produk dan Layanan", "active_parent":"<?php echo admin_url('produk'); ?>"},
    
    {"class":"berita", "caption":"Berita", 
        "active_parent":"<?php echo admin_url('berita'); ?>",
        "children": [
            {"class":"berita", "method":"kabar",         "caption":"Kabar"},
            {"class":"berita", "method":"warta-usaha",   "caption":"Warta Usaha"},
            {"class":"berita", "method":"inspirasi",     "caption":"Inspirasi"},
            {"class":"berita", "method":"lelayu",        "caption":"Berita Lelayu"}
        ]
    },
    
    {"class":"folder", "method":"banner", "active_parent":"<?php echo admin_url('folder'); ?>", "caption":"Banner"},
    {"class":"folder", "method":"banner-slide", "active_parent":"<?php echo admin_url('folder'); ?>", "caption":"Banner Slide"},
    {"class":"folder", "method":"galeri", "active_parent":"<?php echo admin_url('folder'); ?>", "caption":"Galeri"},
    {"class":"folder", "method":"download", "active_parent":"<?php echo admin_url('folder'); ?>", "caption":"Download"},
    {"class":"testimoni", "caption":"Testimoni"},
    {"class":"misc", "caption":"Lain-lain", "active_parent":"<?php echo admin_url('misc'); ?>"}
]