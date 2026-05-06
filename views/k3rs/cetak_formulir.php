<hr style="height: 3px">
<p class="text-center"><b>FORMULIR</b></p>
<p class="text-center"><b>PELAPORAN KEJADIAN KECELAKAAN DAN PAJANAN</b></p>
<h2>&nbsp;</h2>
<table class="table">
    <tr>
        <td style="width: 5%">I.</td>
        <td style="width: 15%">IDENTITAS</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>NAMA</td>
        <td>: <?=$data->namaTerlapor?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>UNIT KERJA</td>
        <td>: <?=$data->unit->nama?></td>
    </tr>
</table>
<table class="table">
    <tr>
        <td style="width: 5%">II.</td>
        <td colspan="3">RINCIAN KEJADIAN</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td style="width: 3%">1.</td>
        <td colspan="2">Tanggal dan waktu insiden</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="width: 15%">- Tanggal</td>
        <td>: <?=date("d-F-Y", strtotime($data->tglJamKejadian))?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>- Jam</td>
        <td>: <?=date("H:i", strtotime($data->tglJamKejadian))?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>2.</td>
        <td>Insiden</td>
        <td>: <?=$data->jenis->nama?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>3.</td>
        <td colspan="2">Kronologis Insiden</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><?=$data->kronologis?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>4.</td>
        <td colspan="2">Tindakan yang dilakukan setelah kejadian</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><?=$data->tindakanKejadian?></td>
    </tr>
</table>
<table class="table">
    <tr>
        <td style="width: 20%" class="table-bordered">Penerima Laporan</td>
        <td style="width: 20%" class="table-bordered"><?=$data->penerimaLaporan != '' ? $data->penerima->name : '-'?></td>
        <td>&nbsp;</td>
        <td style="width: 20%" class="table-bordered">Pembuat Laporan</td>
        <td style="width: 20%" class="table-bordered"><?=$data->createdBy?></td>
    </tr>
    <tr>
        <td style="padding-bottom: 10px; padding-top: 10px" class="table-bordered">Paraf</td>
        <td class="table-bordered">&nbsp;</td>
        <td>&nbsp;</td>
        <td class="table-bordered">Paraf</td>
        <td class="table-bordered">&nbsp;</td>
    </tr>
    <tr>
        <td class="table-bordered">Tgl Laporan</td>
        <td class="table-bordered"><?=$data->tglPenerima != '' ? date("d-F-Y", strtotime($data->tglPenerima)) : '-'?></td>
        <td>&nbsp;</td>
        <td class="table-bordered">Tgl Laporan</td>
        <td class="table-bordered"><?=date("d-F-Y", strtotime($data->createdDate))?></td>
    </tr>
</table>


