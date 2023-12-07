<script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/themes/prism.css">

@php
    $search_bulan = request()->get('search_bulan');
    $search_bulan = $search_bulan ?? date('n');

    $search_tahun = request()->get('search_tahun');
    $search_tahun = $search_tahun ?? date('Y');

    $search_website = request()->get('search_website');
    $search_website = $search_website ?? '';
@endphp
<div class="sec_table">
    <h2>{{ $title }}</h2>
    <button class="sec_botton btn_primary" onclick="exportToPdf()">Export to PDF</button>
    <select id="search_bulan">
        <option value="1" {{ $search_bulan == '1' ? 'selected' : '' }}>January</option>
        <option value="2" {{ $search_bulan == '2' ? 'selected' : '' }}>February</option>
        <option value="3" {{ $search_bulan == '3' ? 'selected' : '' }}>Maret</option>
        <option value="4" {{ $search_bulan == '4' ? 'selected' : '' }}>April</option>
        <option value="5" {{ $search_bulan == '5' ? 'selected' : '' }}>Mei</option>
        <option value="6" {{ $search_bulan == '6' ? 'selected' : '' }}>Juni</option>
        <option value="7" {{ $search_bulan == '7' ? 'selected' : '' }}>Juli</option>
        <option value="8" {{ $search_bulan == '8' ? 'selected' : '' }}>Agustus</option>
        <option value="9" {{ $search_bulan == '9' ? 'selected' : '' }}>September</option>
        <option value="10" {{ $search_bulan == '10' ? 'selected' : '' }}>October</option>
        <option value="11" {{ $search_bulan == '11' ? 'selected' : '' }}>November</option>
        <option value="12" {{ $search_bulan == '12' ? 'selected' : '' }}>Desember</option>
    </select>
    <select id="search_tahun">
        <option value="2023" {{ $search_tahun == '2023' ? 'selected' : '' }}>2023</option>
        <option value="2024" {{ $search_tahun == '2024' ? 'selected' : '' }}>2024</option>
        <option value="2025" {{ $search_tahun == '2025' ? 'selected' : '' }}>2025</option>
        <option value="2026" {{ $search_tahun == '2026' ? 'selected' : '' }}>2026</option>
    </select>
    <select id="search_website">
        <option value="">semua website</option>
        <option value="arwanatoto" {{ $search_website == 'arwanatoto' ? 'selected' : '' }}>arwanatoto</option>
        <option value="jeeptoto" {{ $search_website == 'jeeptoto' ? 'selected' : '' }}>jeeptoto</option>
        <option value="doyantoto" {{ $search_website == 'doyantoto' ? 'selected' : '' }}>doyantoto</option>
        <option value="tstoto" {{ $search_website == 'tstoto' ? 'selected' : '' }}>tstoto</option>
        <option value="arta4d" {{ $search_website == 'arta4d' ? 'selected' : '' }}>arta4d</option>
        <option value="neon4d" {{ $search_website == 'neon4d' ? 'selected' : '' }}>neon4d</option>
        <option value="zara4d" {{ $search_website == 'zara4d' ? 'selected' : '' }}>zara4d</option>
        <option value="roma4d" {{ $search_website == 'roma4d' ? 'selected' : '' }}>roma4d</option>
        <option value="nero4d" {{ $search_website == 'nero4d' ? 'selected' : '' }}>nero4d</option>
        <option value="duogaming" {{ $search_website == 'duogaming' ? 'selected' : '' }}>duogaming</option>

    </select>
    <table>
        <tbody>
            <tr class="0">
                <th>NO</th>
                <th>USERID</th>
                <th>WEBSITE</th>
                <th>BULAN</th>
                <th>DOWNLINE</th>
                <th>TOTAL DOWNLINE</th>
                <th>NEW DEPO</th>
                <th>NEW MEMBER</th>
                <th>GAJI</th>
                <th>POTONGAN</th>
                <th>CASBON</th>
                <th>TOTAL</th>
            </tr>
            @php
                $totalGaji = 0; // Inisialisasi nilai awal
                $totalPotongan = 0; // Inisialisasi nilai awal
                $totalCasbon = 0; // Inisialisasi nilai awal
                $totalKeseluruhan = 0; // Inisialisasi nilai awal
                $totalDownline = 0;
                $totalAllDownline = 0;
                $totalNewDepo = 0;
                $totalNewMember = 0;
            @endphp
            @foreach ($data as $index => $d)
                <tr>
                    <td><span class="name">{{ $index + 1 }}</span></td>
                    <td><span class="name">{{ $d->userid_refferal }}</span></td>
                    <td><span class="name">{{ $d->website }}</span></td>
                    <td><span class="name">{{ $d->bulan }}</span></td>
                    <td><span class="name">{{ $d->downline }}</span></td>
                    <td><span class="name">{{ $d->totaldownline }}</span></td>
                    <td><span
                            class="name
                        @if ($d->website == 'arwana' && $d->total_newdepo < 20) red-text
                        @elseif ($d->website != 'arwana' && $d->total_newdepo < 15)
                            red-text @endif
                        ">{{ $d->total_newdepo }}</span>
                    </td>
                    <td><span class="name">{{ $d->total_newmember }}</span></td>
                    <td><span class="name">Rp. {{ number_format($d->gaji_refferal, 0, ',', '.') }}</span></td>
                    <td><span class="name">Rp. {{ number_format($d->total_potongan, 0, ',', '.') }}</span></td>
                    <td><span class="name">Rp. {{ number_format($d->total_casbon, 0, ',', '.') }}</span></td>
                    <td><span
                            class="name {{ $d->gaji_refferal - $d->total_potongan - $d->total_casbon < 0 ? 'red-text' : '' }}">Rp.
                            {{ number_format($d->gaji_refferal - $d->total_potongan - $d->total_casbon, 0, ',', '.') }}
                        </span>
                    </td>

                    @php
                        $totalDownline += $d->downline;
                        $totalAllDownline += $d->totaldownline;
                        $totalNewDepo += $d->total_newdepo;
                        $totalNewMember += $d->total_newmember;
                        $totalGaji += $d->gaji_refferal; // Penambahan nilai gaji pada setiap iterasi
                        $totalPotongan += $d->total_potongan; // Penambahan nilai potongan pada setiap iterasi // Penambahan nilai potongan pada
                        $totalCasbon += $d->total_casbon; // Penambahan nilai casbon pada setiap
                        $totalKeseluruhan += $d->gaji_refferal - $d->total_potongan - $d->total_casbon;
                    @endphp
                </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="4" align="right">Total Keseluruhan</td>
                <td class="col-gaji align-right">{{ $totalDownline }}</td>
                <td class="col-gaji align-right">{{ $totalAllDownline }}</td>
                <td class="col-gaji align-right">{{ $totalNewDepo }}</td>
                <td class="col-gaji align-right"> {{ $totalNewMember }} </td>
                <td class="col-gaji align-right">Rp. {{ number_format($totalGaji, 0, ',', '.') }}</td>
                <td class="col-potongan align-right">Rp. {{ number_format($totalPotongan, 0, ',', '.') }}</td>
                <td class="col-casbon align-right">Rp. {{ number_format($totalCasbon, 0, ',', '.') }}</td>
                <td class="col-casbon align-right">Rp. {{ number_format($totalKeseluruhan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    // Ambil nilai bulan dan tahun terpilih saat halaman dimuat
    var selectedMonth = {{ $search_bulan }};
    var selectedYear = {{ $search_tahun }};

    $('#search_bulan').on('change', function() {
        // Simpan nilai bulan terpilih saat perubahan terjadi
        selectedMonth = $(this).val();
        updateLaporan();
    });

    $('#search_tahun').on('change', function() {
        // Simpan nilai tahun terpilih saat perubahan terjadi
        selectedYear = $(this).val();
        updateLaporan();
    });

    $('#search_website').on('change', function() {
        updateLaporan();
    });

    function updateLaporan() {
        var url = '/xx88/laporan';
        var params = {
            search_bulan: selectedMonth, // Gunakan nilai bulan yang sudah disimpan
            search_tahun: selectedYear, // Gunakan nilai tahun yang sudah disimpan
            search_website: $('#search_website').val() // Ambil nilai website langsung dari select
        };

        url = url + '?' + $.param(params);

        // Muat ulang konten laporan dengan nilai bulan dan tahun yang sudah diperbarui
        $('.aplay_code').load(url, function() {
            adjustElementSize();
            localStorage.setItem('lastPage', url);
        });
    }

    function exportToPdf() {
        var url = '/xx88/exportlaporan';
        var params = {
            search_bulan: selectedMonth, // Gunakan nilai bulan yang sudah disimpan
            search_tahun: selectedYear, // Gunakan nilai tahun yang sudah disimpan
            search_website: $('#search_website').val() // Ambil nilai website langsung dari select
        };

        url = url + '?' + $.param(params);

        // Buka halaman ekspor PDF di jendela/tab baru (target _blank)
        window.open(url, '_blank');
    }
</script>
