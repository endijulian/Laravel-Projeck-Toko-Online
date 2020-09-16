<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
        <a href="{{route('home')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>Home</p>
        </a>
    </li>

    <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
        <ul class="nav nav-treeview">

            @if(Auth::user()->level == 'admin')
                <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data User</p>
                </a>
                </li>
            @endif

            <li class="nav-item">
                <a href="{{ route('agen') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Agen</p>
                </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('supplier.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Supplier</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('pegawai.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pegawai</p>
            </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Kategori</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('produk.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Produk</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="{{route('transaksi_masuk.index')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>Transaksi Masuk</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('report_penjualan')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>Report Penjualan</p>
        </a>
    </li>
</ul>
