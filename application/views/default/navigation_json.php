[
    {"class":"beranda", "caption":"Beranda", "href":"<?php echo base_url(); ?>"},
    {"class":"profil", "caption":"Profil CUCT", 
        "children": [
            {"class":"profil", "method":"sejarah", "caption":"Sejarah"},
            {"class":"profil", "method":"visi-dan-misi", "caption":"Visi dan Misi"},
            {"class":"profil", "method":"struktur-organisasi", "caption":"Struktur Organisasi"},
            {"class":"profil", "method":"pengurus-dan-pengawas", "caption":"Pengurus dan Pengawas"}
        ]
    },
    {"class":"produk-dan-layanan", "caption":"Produk dan Layanan",
        "children": [
            {"class":"produk-dan-layanan", "method":"simpanan", "caption":"Simpanan",
                "children": [
                    {"class":"produk-dan-layanan", "method":"simpanan", "params":"saham", "caption":"Simpanan Saham"},
                    {"class":"produk-dan-layanan", "method":"simpanan", "params":"sikendi", "caption":"Simpanan Sikendi"},
                    {"class":"produk-dan-layanan", "method":"simpanan", "params":"pendidikan", "caption":"Simpanan Pendidikan"},
                    {"class":"produk-dan-layanan", "method":"simpanan", "params":"siwaris", "caption":"Simpanan Siwaris"},
                    {"class":"produk-dan-layanan", "method":"simpanan", "params":"ibadah", "caption":"Simpanan Ibadah"},
                    {"class":"produk-dan-layanan", "method":"simpanan", "params":"properti", "caption":"Simpanan Properti"}
                ]
            },
            {"class":"produk-dan-layanan", "method":"pinjaman", "caption":"Pinjaman",
                "children": [
                    {"class":"produk-dan-layanan", "method":"pinjaman", "params":"usaha-produktif", "caption":"Pinjaman Usaha Produktif"},
                    {"class":"produk-dan-layanan", "method":"pinjaman", "params":"kesejahteraan", "caption":"Pinjaman Kesejahteraan"},
                    {"class":"produk-dan-layanan", "method":"pinjaman", "params":"kapitalisasi", "caption":"Pinjaman Kapitalisasi"},
                    {"class":"produk-dan-layanan", "method":"pinjaman", "params":"properti", "caption":"Pinjaman Properti"},
                    {"class":"produk-dan-layanan", "method":"pinjaman", "params":"musiman", "caption":"Pinjaman Musiman"},
                    {"class":"produk-dan-layanan", "method":"pinjaman", "params":"cikal", "caption":"Cikal"}
                ]
            },
            {"class":"produk-dan-layanan", "method":"bantuan-dan-perlindungan", "caption":"Bantuan dan Perlindungan",
                "children": [
                    {"class":"produk-dan-layanan", "method":"bantuan-dan-perlindungan", "params":"solduka", "caption":"Solduka"},
                    {"class":"produk-dan-layanan", "method":"bantuan-dan-perlindungan", "params":"sari", "caption":"Sari"},
                    {"class":"produk-dan-layanan", "method":"bantuan-dan-perlindungan", "params":"bayi", "caption":"Bayi CU"},
                    {"class":"produk-dan-layanan", "method":"bantuan-dan-perlindungan", "params":"jalinan", "caption":"Jalinan",
                        "children": [
                            {"class":"produk-dan-layanan", "method":"bantuan-dan-perlindungan", "params":"jalinan/tunas", "caption":"Tunas"},
                            {"class":"produk-dan-layanan", "method":"bantuan-dan-perlindungan", "params":"jalinan/lintang", "caption":"Lintang"}
                        ]
                    }
                ]
            }            
        ]
    },
    {"class":"kabar", "caption":"Kabar"},
    {"class":"kabar", "method":"inspirasi", "caption":"Inspirasi"},
    {"class":"kabar", "method":"warta-usaha", "caption":"Warta Usaha"},
    {"class":"kabar", "method":"berita-lelayu", "caption":"Berita Lelayu"},
    {"class":"galeri", "caption":"Galeri"},
    {"class":"agenda", "caption":"Agenda"},
    {"class":"kontak", "caption":"Tempat Pelayanan"}
]