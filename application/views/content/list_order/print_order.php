<?php
//  die_dump($form)
?>
<style>
    #form-pemeriksaan td.title {
        width: 30%;
        min-width: 225px;
        max-width: 40%;
        padding-top: 8px;
        padding-bottom: 8px;
        padding-right: 10px;
    }
    .noselect {
        -webkit-touch-callout: none;
        /* iOS Safari */
        -webkit-user-select: none;
        /* Safari */
        -khtml-user-select: none;
        /* Konqueror HTML */
        -ms-user-select: none;
        /* Internet Explorer/Edge */
        user-select: none;
        /* Non-prefixed version, currently supported by Chrome, Opera and Firefox */
    }

    #form-pemeriksaan {
        border-collapse: collapse;
        width: 100%;
    }

    #form-pemeriksaan td {
        border: 1px solid lightgray;
    }

    #form-pemeriksaan td.title {
        width: 30%;
        min-width: 225px;
        max-width: 40%;
        padding-top: 8px;
        padding-bottom: 8px;
        padding-right: 10px;
    }

    #form-pemeriksaan td.input {
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 10px;
        padding-right: 10px;
    }

    #form-pemeriksaan .input-text {
        padding: 2px;
    }
</style>
<div class="header-title">
    <img src="<?=base_url('assets/images/thumb/'.(INST_LOGO ?? ''))?>" alt="LOGO INST" width="60px">
    <div style="display: inline-block; vertical-align: top;">
        <b>DINAS KESEHATAN PROV. KEP. RIAU</b><br>
        <b>RSUD RAJA AHMAD TABIB</b><br>
        JL. W.R Supratman No. 100 Km. 8 Tanjungpinang Kepulauan Riau
JL. W.R Supratman No. 100 Km. 8 Tanjungpinang Kepulauan Riau
JL. W.R Supratman No. 100 Km. 8 Tanjungpinang Kepulauan Riau
JL. W.R Supratman No. 100 Km. 8 Tanjungpinang Kepulauan Riau<br>
        Telpon 0771-7335203<br>
        
    </div>
</div>
<table width='100%' cellspacing="0" cellpadding="7">
    <tr>
        <td style="border: 1px solid #000000; padding: 0in 0.08in 0in 0.08in;" width="50%" height="58">
            <p align="center"><span style="font-family: Arial, serif;"><span style="font-size: large;"><strong><b>FORMULIR PEMERIKSAAN LABORATORIUM</b></strong></span></span></p>
        </td>
        <td style="border: 1px solid #000000; padding: 0in 0.08in 0in 0.08in;" valign="top" width="342">
            <p style="margin-bottom: 0in;" align="justify">&nbsp;</p>
            <table>
                <tr>
                    <td style="width:20%;font-family: Arial, serif;">No. RM</td>
                    <td style="width:3px">:</td>
                    <td style="width:50%"><?= $register->Medrec ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $register->Firstname ?> (<?= $register->Sex ?>)</td>
                </tr>
                <tr>
                    <td>Tgl Lahir</td>
                    <td>:</td>
                    <td><?= $register->Bod ? date('d/m/Y', strtotime($register->Bod)) : '<i>(Belum diset)</i>' ?> (<?= preg_replace('/^(\d+ +tahun).*/i', '$1', $register->usia) ?> Tahun)</td>
                </tr>
            </table><br />
        </td>
    </tr>
    <tr>
        <td style="border-right: 1px solid;border-left: 1px solid; padding: 4px;">
            <span lang="id-ID">Poli / Ruang : <?= $register->NmBangsal ?? $register->NmPoli?></span>
        </td>
    </tr>
    <tr>
        <td style="border-right: 1px solid;border-left: 1px solid; padding: 4px;">
            <span lang="id-ID">Dokter Pengirim : <?=  $register->NmDoc?></span>
        </td>
        <td style="border-right: 1px solid;border-left: 1px solid; padding: 4px;">
            <span lang="id-ID">Telepon : <?= $register->Phone ?></span>
        </td>
    </tr>
    <tr>
        <td style="border-right: 1px solid; border-bottom: 1px solid; border-left: 1px solid; padding: 4px;">
            <span lang="id-ID">Diagnosa / Keterangan Klinis : <?= $register->DiagRanap ?? $register->DiagRajal ?> </span>
        </td>
        <td style="border-right: 1px solid; border-bottom: 1px solid; border-left: 1px solid; padding: 4px;">
            <span lang="id-ID">Tanggal Order : <?= date('d F Y', strtotime($register->Tanggal)) ?> </span>
        </td>
    </tr>
</table>
<table width="100%" style="border: 1px solid; padding: 4px;" >
    <tr>
        <td width="10%"></td>
        <td width="90%" style="text-align: center;">
            <table style="text-align: center;" border="1" width="90%">
                <thead>
                    <tr><th>No.</th><th>Pemeriksaan</th></tr>
                </thead>
                <tbody>
                    <?php $no=1;foreach ($detail as $row) { ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td style="text-align: left;"><?= $row->NmTarif ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>   
        </td>
    </tr>
           
    
</table>
