<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style>
        /* CSS untuk judul h3 */
        h3 {
            text-align: center;
        }

        /* CSS untuk judul table (th) */
        table th {
            text-align: center;
            font-weight: bold;
            background-color: rgb(206, 134, 0);
            padding: 5px;
            border: 1px solid black;
            /* Penambahan border 1 */
            color: white;
            font-size: 9px;
        }

        /* CSS untuk setiap baris (tr) dalam body */
        table tbody tr:nth-child(even) {
            background-color: lightorange;
        }

        table tbody tr:nth-child(odd) {
            background-color: pink;
        }

        /* CSS untuk mengatur seluruh table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* CSS untuk setiap sel (td) dalam body */
        table td {
            padding: 5px;
            border: 1px solid black;
            font-size: 7px;

        }

        /* CSS untuk baris total */
        .total-row {
            font-weight: bold;
            background-color: red;
            font-size: 9px;
            color: white;
        }

        /* CSS untuk mengatur align ke kanan pada kolom Gaji, Potongan, dan Casbon */
        .align-right {
            text-align: right;
        }

        /* CSS untuk mengatur rata tengah pada kolom DOWNLINE, TOTAL DOWNLINE, NEW DEPO, dan NEW MEMBER */
        .align-center {
            text-align: center;
        }

        /* CSS untuk mengatur lebar kolom Gaji, Potongan, dan Casbon */
        .col-gaji,
        .col-potongan,
        .col-casbon,
        .col-total {
            width: 100px;
        }

        /* CSS untuk mengurangi tinggi (height) dari elemen <tr> di dalam <tbody> */
        tbody tr {
            height: 10px;
            /* Anda dapat mengubah angka ini sesuai kebutuhan */
        }

        .red-text {
            color: red;
        }
    </style>
</head>

<body>
    <h3>{{ $title }}</h3>
    <h3>{{ $title2 }}</h3>
    <h3>{{ ucwords($title3) }}</h3>
    <p>{{ $content }}</p>
    <table border="1">
        <thead>
            <tr>
                <th>NO</th>
                <th>USERID</th>
                <th>WEBSITE</th>
                <th>BULAN</th>
                <th class="align-center">DOWNLINE</th>
                <th class="align-center">TOTAL DOWNLINE</th>
                <th class="align-center">NEW DEPO</th>
                <th class="align-center">NEW MEMBER</th>
                <th class="col-gaji">GAJI</th>
                <th class="col-potongan">POTONGAN</th>
                <th class="col-casbon">CASBON</th>
                <th class="col-total">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalGaji = 0;
                $totalPotongan = 0;
                $totalCasbon = 0;
                $totalKeseluruhan = 0;
                $totalDownline = 0;
                $totalAllDownline = 0;
                $totalNewDepo = 0;
                $totalNewMember = 0;
            @endphp
            @foreach ($data as $index => $d)
                <tr>
                    <td><span class="name">{{ $index + 1 . '.' }}</span></td>
                    <td><span class="name">{{ $d->userid_refferal }}</span></td>
                    <td><span class="name">{{ $d->website }}</span></td>
                    <td><span class="name">{{ $d->bulan }}</span></td>
                    <td class="align-center"><span class="name">{{ $d->downline }}</span></td>
                    <td class="align-center"><span class="name">{{ $d->totaldownline }}</span></td>
                    <td class="align-center"><span
                            class="name 
                        @if ($d->website == 'arwana' && $d->total_newdepo < 20) red-text
                        @elseif ($d->website != 'arwana' && $d->total_newdepo < 15)
                            red-text @endif
                        ">{{ $d->total_newdepo }}</span>
                    </td>
                    <td class="align-center"><span class="name">{{ $d->total_newmember }}</span></td>
                    <td class="col-gaji align-right"><span class="name">Rp.
                            {{ number_format($d->gaji_refferal, 0, ',', '.') }}</span></td>
                    <td class="col-potongan align-right"><span class="name">Rp.
                            {{ number_format($d->total_potongan, 0, ',', '.') }}</span>
                    </td>
                    <td class="col-casbon align-right"><span class="name">Rp.
                            {{ number_format($d->total_casbon, 0, ',', '.') }}</span></td>
                    <td
                        class="col-total align-right {{ $d->gaji_refferal - $d->total_potongan - $d->total_casbon < 0 ? 'red-text' : '' }}">
                        <span class="name">Rp.
                            {{ number_format($d->gaji_refferal - $d->total_potongan - $d->total_casbon, 0, ',', '.') }}</span>
                    </td>
                </tr>
                @php
                    $totalDownline += $d->downline;
                    $totalAllDownline += $d->totaldownline;
                    $totalNewDepo += $d->total_newdepo;
                    $totalNewMember += $d->total_newmember;
                    $totalGaji += $d->gaji_refferal; // Penambahan nilai gaji pada setiap iterasi
                    $totalPotongan += $d->total_potongan; // Penambahan nilai potongan pada
                    $totalCasbon += $d->total_casbon; // Penambahan nilai casbon pada setiap
                    $totalKeseluruhan += $d->gaji_refferal - $d->total_potongan - $d->total_casbon;
                @endphp
            @endforeach
            <!-- Baris total -->
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
</body>

</html>
