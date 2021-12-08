<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Pembayaran</th>
            <th>Nominal</th>
            <th>Tanggal diterima</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembayaran as $row)
            <tr>
                <td>{{ $loop->iteration }}
                </td>
                <td>{{ $row->siswa->nama }}</td>
                <td>{{ $row->siswa->kelas->nama_kelas }}</td>
                <td>{{ $row->siswa->kelas->kompetensi_keahlian }}</td>
                <td>{{ $row->bulan_dibayar }}</td>
                <td>Rp. {{ $row->total_bayar }}</td>
                <td>{{ $row->tanggal_bayar }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
