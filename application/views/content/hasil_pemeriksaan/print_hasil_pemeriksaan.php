<link rel="stylesheet" href="<?=base_url('assets/new/css/bootstrap.min.css')?>" />
<style type="text/css">
  *{
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
  }

  .top-header {
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    text-align: left;
    width: 220pt;
    margin-bottom: 15px;
  }

  .box1 {
    padding: 5px;
    border: 1px solid black;
    border-radius: 5px;
    height: 135px;
  }

  .box2 {
    padding: 5px;
    border: 1px solid black;
    border-radius: 5px;
    height: 135px;
  }

  #tablePemeriksaan {
    width: 95%;
    border-bottom: 1px black solid;
  }

  .data-tambahan {
    height: 300px;
  }

  .data-tambahan2 {
    height: 100px;
  }

  .desc-table td {
    vertical-align: top;
  }
</style>
    
<div class="top-header">
  DINAS KESEHATAN PROV. KEP. RIAU<br>
  <u>RSUD RAJA AHMAD TABIB</u>
</div>
<div class="main-content">
  <div class="main-content-inner">
    <div class="page-content">
      <div class="row">
        <div class="col-xs-12">
          <div class="col-xs-6">
            <div class="box1">
              <table class="desc-table">
                <tr>
                  <td style="width: 80px;">Nama Pasien</td>
                  <td>:</td>
                  <td><b><?= $head->Firstname ?></b></td>
                </tr>
                <tr>
                  <td>Nomor RM</td>
                  <td>:</td>
                  <td><?= $head->MedRec ?></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td>:</td>
                  <td><?= date("d-m-Y", strtotime($head->Bod)) ?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td><?= $head->Sex ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td><?= $head->Address ?></td>
                </tr>
                <tr><td></td><td></td><td></td></tr>
              </table>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="box2">
              <table class="desc-table">
                <tr>
                  <td>No. Lab</td>
                  <td>:</td>
                  <td><b><?= $head->Nolab ?></b></td>
                </tr>
                <tr>
                  <td>No. Transaksi</td>
                  <td>:</td>
                  <td><?= $head->Notran ?></td>
                </tr>
<!--       				  <tr>
      					  <td>Tanggal Registrasi</td>
      					  <td>:</td>
      					  <td>
      						  <?= date("d-m-Y", strtotime($head->RegDate)) ?> /
      						  <?= $head->Jam ? date("H:i", strtotime($head->Jam)) : date('H:i') ?>
      					  </td>
      				  </tr> -->
                <tr>
                  <td>Tanggal Hasil</td>
                  <td>:</td>
                  <td>
                    <?php echo  $head->Tglhasil != null ?  date("d-m-Y", strtotime($head->Tglhasil)) : date("d-m-Y", strtotime($head->TglInput)) ?> /
                    <?php echo $head->Jamhasil != null ? date("H:i", strtotime($head->Jamhasil)) : date('H:i', strtotime($head->TglInput)) ?>
                  </td>
                </tr>
                <tr>
                  <td>Poli/Ruang</td>
                  <td>:</td>
                  <td><b style="font-size: 10px;"><?= $head->KdBangsal == '' ? $head->NMPoli : $head->NmBangsal.'/'.$head->NMkelas ?></b></td>
                </tr>
                <tr>
                  <td>Unit Pelayanan</td>
                  <td>:</td>
                  <td><?= $head->KdTuju == 'RI' ? 'Rawat Inap' : 'Rawat Jalan' ?></td>
                </tr>
                <tr>
                  <td>Dokter Pengirim</td>
                  <td>:</td>
                  <td><?= $head->NmDoc ?></td>
                </tr>
                <tr><td></td><td></td><td></td></tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-12" style="margin-top: 50px;">
          <div class="top-header">
            <h4>HASIL PEMERIKSAAN</h4>
          </div>
          <div class="data-pemeriksaan">
            <table id="tablePemeriksaan">
              <thead style="border-top: 1px black solid; border-bottom: 1px black solid;">
                <tr>
                  <th style="font-size: 14px;">NAMA PEMERIKSAAN</th>
                  <th style="font-size: 14px;">HASIL</th>
                  <th style="font-size: 14px;">SATUAN</th>
                  <th style="font-size: 14px;">NILAI RUJUKAN</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i=0; $i < count($detail); $i++):?>
                  <tr>
                    <td style="font-size: 13px;"><b><?= $detail[$i]['nmgroup'] ?></b></td>
                  </tr>
                  <?php foreach ($detail[$i]['detail'] as $d): ?>
                    <?php if (($d->Hasil != '' && $d->KdInput != '4') || ($d->KdInput == '4' && $d->Hasil == '')): ?>
                    <tr>
                      <?php if (strlen($d->KDDetail) <= 5): ?>
                        <td style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp; <?= $d->NMDetail ?></td>
                      <?php else: ?>
                        <td style="font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$d->NMDetail?></td>
                      <?php endif ?>
                        <td style="width: 30%; font-size: 13px;">
                          <?php $hasil = $d->Hasil; ?>
                          <?php if(!empty($d->nhasila) || !empty($d->nhasilb)): ?>
                            <?php $hasil .= $d->nhasila > $d->Hasil || $d->Hasil > $d->nhasilb ? '*' : ''; ?>
                          <?php else: ?>
                            <?php $hasil .= strtolower($d->NilaiNormal) != strtolower($d->Hasil) ? '*' : ''; ?>
                          <?php endif; ?>
                          <?= $hasil ?>
                        </td>
                        <td style="font-size: 13px;"><?= $d->Satuan ?></td>
                        <td style="font-size: 13px;"><?= $d->NilaiNormal ?></td>
                      </tr>
                    <?php endif; ?>
                  <?php endforeach?>
                <?php endfor?>
              </tbody>
            </table>
          </div>
          <?php if($infocvd19 == 'show'):?>
          <div class="data-tambahan">
            <p>Catatan: <?=$head->Catatan ?></p>
            <p><i>Hasil berupa angka menggunakan sistem desimal dengan separator titik<br>
            Tanda * menunjukan nilai diatas atau dibawah nilai rujukan</i></p>
            <br>
            <p><i>Keterangan Hasil Rapid Test Covid-19: <br><br>
            1. Hasil Non-Reaktif belum dapat menyingkirkan kemungkinan adanya infeksi, sehingga masih beresiko menularkan ke orang lain.
            Hasil Non-Reaktif dapat terjadi karena beberapa kondisi : Window period ( terinfeksi namun antibody belum terbentuk ), 
            terdapat gangguan pembentukan antibody (immunocompromised) atau kadar antibody dibawah deteksi alat. <br>
            2. Lakukan pemeriksaan ulang anti SARS-CoV-2 10 Hari kemudian apabila baru pertama kali melakukan pemeriksaan. <br>
            3. Hasil pemeriksaan antibody tidak digunakan sebagai dasar untuk mendiagnosa infeksi SARS-CoV-2, Status Pasien, atau keputusan klinis. <br>
            4. Lakukan karantina mandiri dengan menuggunakan masker, cuci tangan sesering mungkin menggunakan sabun, jaga jarak dan hindari keramaian serta berperilaku hidup sehat.</i></p><br>
          </div>
          <?php else: ?>
            <div class="data-tambahan2">
              <p>Catatan: <?=$head->Catatan ?></p>
              <p><i>Hasil berupa angka menggunakan sistem desimal dengan separator titik<br>
              Tanda * menunjukan nilai diatas atau dibawah nilai rujukan</i></p>
            </div>
            <?php endif?>
          <table id="tablePemeriksaan">
            <tr>
              <td style="padding-bottom: 50px; text-align: center; width: 30%;">Dokter</td>
              <td></td>
              <td style="padding-bottom: 50px; text-align: center; width: 30%;"> Pemeriksa</td>
            </tr>
            <tr>
              <td style="text-align: center; width: 30%;">(dr.Primatia.S, Sp.PK)</td>
              <td></td>
              <td style="text-align: center; width: 30%;">(<?= $head->dokterPemeriksa ?>)</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
