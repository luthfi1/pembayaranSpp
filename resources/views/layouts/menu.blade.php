<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/home" class="nav-link active">
                    <i class="fa fa-home nav-icon"></i>
                    <p>Dashboard</p>
                </a>
                @if(Auth::user()->level=='administrator')
                    <a href="/petugas" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <p>Petugas</p>
                    </a>
                    <a href="/kelas" class="nav-link">
                        <i class="fas fa-tags nav-icon"></i>
                        <p>Kelas</p>
                    </a>
                    <a href="/siswa" class="nav-link">
                        <i class="fa fa-user-graduate    nav-icon"></i>
                        <p>Siswa</p>
                    </a>
                    <a href="/spp" class="nav-link">
                        <i class="fas fa-chart-line nav-icon"></i>
                        <p>Tahun Ajaran</p>
                    </a>

                    <a href="/pembayaran" class="nav-link">
                        <i class="fa fa-exchange-alt nav-icon"></i>
                        <p>Pembayaran</p>
                    </a>
                @else
                    <a href="/kelas" class="nav-link">
                        <i class="fas fa-tags nav-icon"></i>
                        <p>Kelas</p>
                    </a>
                    <a href="/siswa" class="nav-link">
                        <i class="fa fa-user-graduate    nav-icon"></i>
                        <p>Siswa</p>
                    </a>
                    <a href="/spp" class="nav-link">
                        <i class="fas fa-chart-line nav-icon"></i>
                        <p>Tahun Ajaran</p>
                    </a>

                @endif
            </li>
        </ul>
    </li>
</ul>