<p><u>Pemeriksaan Pasien</u></p>
<table class="table table-bordered table-striped mb-0" id="histori-baru">
    <thead>
        <tr class="info">
            <th>Tanggal</th>
            <th>No Transaksi</th>
            <th>No LAB</th>
            <th>Pemeriksaan</th>
            <th>Hasil</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($histori_new as $key => $l):?>
            <tr>
                <td><?= date("d-m-Y", strtotime(@$l->Tanggal)) ?></td>
                <td><?=@$l->NoTran?></td>
                <td><?=@$l->NoLab?></td>
                <td><?=@$l->NMDetail?></td>
                <td><?=@$l->Hasil?></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
<!-- <table class="table table-bordered table-striped mb-0" id="histori-lama">
    <thead>
        <tr class="info">
            <th>Tanggal</th>
            <th>Pemeriksaan</th>
            <th>Hasil</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($histori_old as $key => $l):?>
            <tr>
                <td><?= date("d-m-Y", strtotime(@$l->tglmsk))?></td>
                <td><?=@$l->nm_pem?></td>
                <td><?=@$l->hasil?></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table> -->