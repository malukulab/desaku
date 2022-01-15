<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="badge rounded-pill bg-primary float-end">2</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a hhref="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span>Tentang Desa</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Informasi Desa</a></li>
                        <li><a href="#">Selayang Pandang</a></li>
                        <li><a href="#">Motto, Visi & Misi</a></li>
                        <li><a href="#">Struktur Organisasi</a></li>
                        <li><a href="#">Keadaan Aparatur</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="mdi mdi-information-outline"></i>
                                <span>Potensi desa</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.tours.index') }}">Destinasi Wisata</a></li>
                                <li><a href="{{ route('admin.products.index') }}">Produk Unggulan</a></li>
                                <li><a href="{{ route('admin.ukm.index') }}">UKM</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-supervisor"></i>
                        <span>Demografi Desa</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Data Umum</a></li>
                        <li><a href="#">Data Kewenangan</a></li>
                        <li><a href="#">Data Keuangan</a></li>
                        <li><a href="#">Data Kelembangaan</a></li>
                        <li><a href="#">Data Trantrib dan Bencana</a></li>
                        <li><a href="#">Data Penduduk</a></li>
                        <li><a href="#">Data Pendidikan</a></li>
                        <li><a href="#">Data Pekerjaan</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.news.index') }}" class="waves-effect">
                        <i class="mdi mdi-card-text"></i>
                        <span>Informasi Berita</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-folder-image"></i>
                        <span>Galleri dan Media</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Budaya</a></li>
                        <li><a href="#">Dokumentasi</a></li>
                        <li><a href="#">Kegiatan</a></li>
                        <li><a href="#">Informasi Grafis</a></li>
                        <li><a href="#">Kumpulan Berkas Media</a></li>
                    </ul>
                </li>


                <li class="menu-title">Lainnya</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi mdi-spin mdi-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                            <li><a href="#">Ubah logo</a></li>
                            <li><a href="#">Gambar Hal. Depan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
