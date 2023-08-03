<script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.1"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.24.1/themes/prism.css">

@php
    $search_bulan = request()->get('search_bulan');
    $search_bulan = $search_bulan ?? date('n');
@endphp
<div class="sec_table">
    <h2>{{ $title }}</h2>
    <a class="btn btn-primary" onclick="exportToPdf()">Export to PDF</a>
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
    <table>
        <tbody>
            <tr class="0">
                <th>NO</th>
                <th>USERID</th>
                <th>BULAN</th>
                <th>DOWNLINE</th>
                <th>TOTAL DOWNLINE</th>
                <th>NEW DEPO</th>
                <th>NEW MEMBER</th>
                <th>GAJI</th>
                <th>POTONGAN</th>
                <th>CASBON</th>
            </tr>
            @foreach ($data as $index => $d)
                <tr>
                    <td><span class="name">{{ $index + 1 }}</span></td>
                    <td><span class="name">{{ $d->userid_refferal }}</span></td>
                    <td><span class="name">{{ $d->bulan }}</span></td>
                    <td><span class="name">{{ $d->downline }}</span></td>
                    <td><span class="name">{{ $d->totaldownline }}</span></td>
                    <td><span class="name">{{ $d->total_newdepo }}</span></td>
                    <td><span class="name">{{ $d->total_newmember }}</span></td>
                    <td><span class="name">{{ $d->gaji_refferal }}</span></td>
                    <td><span class="name">{{ $d->total_potongan }}</span></td>
                    <td><span class="name">{{ $d->total_casbon }}</span></td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $('#search_bulan').on('change', function() {
        var selectedValue = $(this).val();
        var url = '/laporan';
        var params = {
            search_bulan: selectedValue // Ganti 'bulan' menjadi 'search_bulan'
        };

        url = url + '?' + $.param(params);

        $('.aplay_code').load(url, function() {
            adjustElementSize();
            localStorage.setItem('lastPage', url);
        });
    });

    function exportToPdf() {
        alert('test');
        $('.aplay_code').load('/exportlaporan', function() {
            adjustElementSize();
            localStorage.setItem('lastPage', '/exportlaporan');
        });
    }
</script>
