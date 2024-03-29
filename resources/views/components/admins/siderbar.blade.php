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
                        <li><a href="{{ route('admin.about.villages.index') }}">Informasi Desa</a></li>
                        <li><a href="#">Selayang Pandang</a></li>
                        <li><a href="{{ route('admin.about.info.index') }}">Motto, Visi & Misi</a></li>
                        <li><a href="{{ route('admin.about.organization.index') }}">Struktur Organisasi</a></li>
                        <li><a href="{{ route('admin.apparatus.index') }}">Keadaan Aparatur</a></li>
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
                        <span>Statistik Desa</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @foreach ($listOfStatistics as $statistic)
                        <li><a href="{{ route('admin.village.general') }}">Data {{ str($statistic->title)->title() }}</a></li>
                        @endforeach
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
                        <li><a href="{{ route('admin.cultures.index') }}">Budaya</a></li>
                        <li><a href="{{ route('admin.documentation.index') }}">Dokumentasi</a></li>
                        <li><a href="{{ route('admin.activities.index') }}">Kegiatan</a></li>
                        <li><a href="{{ route('admin.info-graphic.index') }}">Informasi Grafis</a></li>
                        <li><a href="{{ route('admin.file.index') }}">Kumpulan Berkas Media</a></li>
                    </ul>
                </li>
                <li class="menu-title">Lainnya</li>
                <li>
                    <a href="{{ route('admin.master-statistics.index') }}" class="waves-effect">
                        <i class="mdi mdi-folder"></i>
                        <span>Master Statistik Desa</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi mdi-spin mdi-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.settings.running-text.index') }}">Running Teks</a></li>
                        <li><a href="{{ route('admin.settings.logo.index') }}">Ubah logo</a></li>
                        <li><a href="{{ route('admin.settings.carousels.index') }}">Gambar Hal. Depan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
