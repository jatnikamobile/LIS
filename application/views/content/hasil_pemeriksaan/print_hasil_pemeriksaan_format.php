<style>
   .a4{
   width: 210mm;
   height: 297mm;
   }
   .line{
   border-bottom: 2px solid #000;
   }
   .data-tambahan {
   height: 300px;
   }
   .footer{
   margin-top: 20px;
   display: block;
   bottom: 0;
   }
   pre{
   background: none;
   border: none;
   padding: 0;
   margin: 0;
   white-space: break-spaces;
   }
   .garis-kiri{
   border-collapse: collapse !important;
   border:1px solid black !important;
   border-top: none !important;
   border-bottom: none !important;
   font-size: 16px !important; 
   text-align:left !important;
   }
   .garis{
   border-collapse: collapse !important;
   border:1px solid black !important;
   border-top: none !important;
   border-bottom: none !important;
   font-size: 16px !important; 
   text-align:center !important;
   }
   @media print{
   .footer{
   position: absolute;
   display: block;
   bottom: 0;
   }
   }
</style>
<div class="a4">
   <img src="<?= base_url('assets/images/kop_surat.png')?>" style="width: 100%"/>
   <hr class="line"/>
   <div style="text-align: center; font-weight: bold; font-size: 24px; margin-bottom: 10px">HASIL PEMERIKSAAN LABORATORIUM</div>
   <table width="100%" style="font-size:18px">
      <tr>
         <td width="15%">Nama Pasien</td>
         <td>:</td>
         <td width="25%"><?= $head->Firstname ?></td>
         <td width="20%">Ruangan</td>
         <td>:</td>
         <td width="30%"><?= $head->KdBangsal == '' ? $head->NMPoli : $head->NmBangsal.'/'.$head->NMkelas ?></td>
      </tr>
      <tr>
         <td width="15%">Tanggal Lahir</td>
         <td>:</td>
         <td width="30%"><?= date("d-m-Y", strtotime($head->Bod)) ?></td>
         <td width="20%">Tgl. Permintaan</td>
         <td>:</td>
         <td width="30%">
            <?= date("d-m-Y", strtotime($head->RegDate)) ?> /
            <?= $head->Jam ? date("H:i", strtotime($head->Jam)) : date('H:i') ?>    
         </td>
      </tr>
      <tr>
         <td width="20%">No. RM</td>
         <td>:</td>
         <td width="30%"><?= $head->MedRec ?></td>
         <td width="20%">Tgl. Selesai</td>
         <td>:</td>
         <td width="30%">
            <?php echo  $head->Tglhasil != null ?  date("d-m-Y", strtotime($head->Tglhasil)) : date("d-m-Y", strtotime($head->TglInput)) ?> /
            <?php echo $head->Jamhasil != null ? date("H:i", strtotime($head->Jamhasil)) : date('H:i', strtotime($head->TglInput)) ?>    
         </td>
      </tr>
      <tr>
         <td width="20%">No. Lab</td>
         <td>:</td>
         <td width="30%"><?= $head->Nolab ?></td>
         <td width="20%">Dokter Pengirim</td>
         <td>:</td>
         <td width="30%"><?= $head->NmDoc ?></td>
      </tr>
      <tr>
         <td width="20%">Diagnosa</td>
         <td>:</td>
         <td width="35%">&nbsp;</td>
         <td width="20%">&nbsp;</td>
         <td>&nbsp;</td>
         <td width="35%">&nbsp;</td>
      </tr>
   </table>
   <br/>
   <table width="100%" border="1" cellpadding="5" cellspacing="0" style="font-size: 18px;">
      <thead>
         <tr style="border-bottom: 1px solid black;">
            <th width="25%" align=center>JENIS PEMERIKSAAN</th>
            <th width="15%" align=center>HASIL</th>
            <th width="15%" align=center>SATUAN</th>
            <th width="25%" align=center>NILAI NORMAL</th>
            <th width="20%" align=center>KETERANGAN</th>
         </tr>
      </thead>
      <tbody>
         <?php 
         // var_dump($detail[0]['detail']);die(); 
         // var_dump($detail);die(); 
         ?>
         <?php
            $catatan = $head->Catatan;
            $saran =  $head->Saran;
            $kesan = $head->Kesan;
            for ($i=0; $i < count($detail); $i++):?>
               <tr>
                  <td  class="garis-kiri"colspan="1" ><b><?= $detail[$i]['nmgroup'] ?></b></td>
                  <td  class="garis" align=center colspan="1" ></td>
                  <td  class="garis"colspan="1" ></td>
                  <td  class="garis"colspan="1" ></td>
                  <td  class="garis"colspan="1" ></td>
               </tr>
               <?php 
               $statHJ = 0; $a=0; $k=0;
               
               // var_dump($detail[$i]['detail']);die(); 

               foreach ($detail[$i]['detail'] as $d): ?>
               
               <?php if (($d->NoPrint)!='1') :?>
                  <?php if (($d->Hasil != '' && $d->KdInput != '4') || ($d->Hasil == '' && $d->KdInput == '4' )): ?> 
                     <?php 
                        $a++; 
                        if ($a % 2 == 0) {
                              $style = 'bgcolor="#D2D2CF"';
                           }else{
                              $style = '';
                           } 
                     ?>               
                     <tr  <?= $style?> >
                        <?php if (strlen($d->KDDetail) <= 5): ?>
                        <td class="garis-kiri" style="padding-left: 20px"><?= $d->NMDetail ?></td>
                        <?php else: ?>
                           <?php if($d->Satuan == null || $d->Satuan == ""):?>
                           <td class="garis-kiri" style="font-weight: bold; padding-left: 20px"><?= $d->NMDetail ?></td>
                           <?php else:?>
                           <td class="garis-kiri" style="padding-left: 30px"><?=$d->NMDetail?></td>
                           <?php endif?>
                        <?php endif ?>
                        <!-- <td class="garis" style="width: 30%; text-align:center"> -->
                              
                           <?php 
                              //var_dump($d->NilaiNormal, $d->KDDetail,$d->Hasil,$d->nhasila,$d->nhasilb);//die(); 
                              //var_dump($d->NilaiNormal);//die(); 
                              
                              //generate ulang nhasila as nhasilb
                              $nhasila=0; $nhasilb=0; $nilaiAcuan='kurangdari';
                              if (!empty($d->NilaiNormal)) {
                                 $nNormal=explode('-',$d->NilaiNormal);
                                 if(count($nNormal)>1){
                                    if(is_numeric(trim($nNormal[0]))) { 
                                       $nhasila=(float)($nNormal[0]);
                                    }
                                    if(is_numeric(trim($nNormal[1]))) { 
                                       $nhasilb=(float)($nNormal[1]);
                                    }
                                 } 
                                 // var_dump(substr_count($d->NilaiNormal,'>'));die(); 
                                 
                                 //nilai normal kurang dari: <
                                 if (substr_count($d->NilaiNormal,'<')>0) {
                                       $nhasila=0;
                                       $nhasilb=(float)(str_replace('<','',$d->NilaiNormal));
                                       $nilaiAcuan='kurangdari';
                                    }
                                 }

                                  //nilai normal lebih dari: >
                                  if (substr_count($d->NilaiNormal,'>')>0) {
                                    // var_dump($d->NilaiNormal);//die(); 
                                    $nhasila=(float)($d->nhasila);
                                    $nhasilb=(float)($d->nhasilb);
                                    $nilaiAcuan='lebihdari';
                                 }

                              ?>
                           
                           <?php //var_dump($d->NMDetail .' - '. $nhasila .' - '. $nhasilb);//die(); ?>

                           <?php 
                           
                              $hasil = $d->Hasil; 
                              
                              //hasil berupa angka saja
                              
                              if(is_numeric($hasil)) {         
                                 //nilai normal kurang dari: <   
                                 if ($nilaiAcuan=='kurangdari') {
                                    $hasil .= (float)$nhasila > (float)$hasil || (float)$hasil > (float)$nhasilb ? ' *' : '';
                                 } else {
                                    //nilai normal lebih dari: >   
                                    $hasil .= (float)$nhasila > (float)$hasil || (float)$hasil > (float)$nhasilb ? ' *' : '';
                                 }

                                 //hasil berupa angka range, untuk nilai Lekosit 0-3 
                              } elseif (substr_count($hasil,'-')>0) {  
                                 $dataHasil=explode('-',$hasil); 
                                 if(count($dataHasil)>1) {
                                    $nilaiRangeA=(float)$dataHasil[0]; 
                                    $nilaiRangeB=(float)$dataHasil[1]; 
                                    if(!empty($d->NilaiNormal)) {
                                       $hasil .= (float)$nhasila > (float)$nilaiRangeB || (float)$nilaiRangeB > (float)$nhasilb ? ' *' : '';
                                    } 
                                 }
                              
                                 //hasil berupa huruf
                              } else {                         
                                 if($hasil<>$d->NilaiNormal) {
                                    if(!empty($d->NilaiNormal)) {
                                    $hasil .=' *';
                                    }
                                 }
                              }

                           ?>

                           <?//= $hasil ?>

                           <?php
                              if ($d->Hasil == 'Indeterminate' && $d->KDDetail == '8056'){
                                 $catatan = "hasil Indeterminate bisa disebabkan pemakaian obat imunosupresan, pasien dengan kondisi <br> immunocompromise,  pasien dengan anemia, dan hipoalbumin karena proses inflamasi kronik";
                                 $saran = "Periksa ulang IGRA TB setelah faktor yang mempengaruhi hasil pemeriksaan teratasi";
                                 $kesan = "Infeksi M. tuberkulosis tidak dapat diinterpretasikan oleh karena hasil IGRA TB dalam range equivocal"; 
                              }elseif($d->Hasil == 'Positif' && $d->KDDetail == '8056'){
                                 $catatan = "";
                                 $saran = "- IGRA TB sebagai tambahan pemeriksaan untuk diagnosa klinis pasien dan hasil positif  <br> harus dikolerasikan dengan pemeriksaan klinis, riwayat penyakitn pasien dan hasil  <br> pemeriksaan lainnya seperti BTA, kultur dan radiologi  <br> - keterbatasan data pemeriksaan IGRA TB pada anak usia dibawah 5 Tahun";
                                 $kesan = "Kemungkinan infeksi M.  Tuberkulosisi namun tidak beisa dibedakan TB aktif atau laten"; 
                              }elseif($d->Hasil == 'Negatif' &&  $d->KDDetail == '8056'){
                                 $catatan = "";
                                 $saran = "- IGRA TB sebagai tambahan pemeriksaan untuk diagnosa klinis pasien dan harus dikorelasikan <br> dengan pemeriksaan klinis, riwayat pernyakit pasien dan hasil pemeriksaan lainnya <br>- hasil negatif tidak menyingkirkan kemungkinan infeksi tuberkulosis pada individu dengan <br> gangguan fungsi imun, mendapat terapi supresif atau baru terpapar dengan penderita TB <br>- keterbatasan data pemeriksaan IGRA TB pada anak usia dibawah 5 Tahun";
                                 $kesan = "Kemungkinan tidak terindeksi M Tuberkulosiss aktif atau laten"; 
                              }
                              ?>
                        
                        <?php if(!empty($hasil)) :?>
                           <td class="garis" style="width: 30%; text-align:center"><?=$hasil?></td>
                        <?php else:?>
                           <td class="garis" ></td>
                           <td class="garis" ></td>
                        <?php endif; ?>
                        <?php if(!empty($hasil)) :?>
                        <td class="garis" style="text-align:center"><?= $d->Satuan ?></td>
                        <?php endif; ?>
                        <td class="garis"  style="text-align:center"><?= $d->NilaiNormal ?></td>

                        <?php //DEBUG NILAI NORMAL ?>
                        <td class="garis"  style="text-align:center"><?= $nhasila .' - '. $nhasilb ?></td>


                        <td class="garis"  style="text-align:center">
                           <?php if ($d->NMDetail == 'PCT (Procalcitonin)'): ?>
                           <?='
                           Metode : Chemiluminescence
                           Konsentrasi : 
                           - 0.05 - 0.5 ng/ml : indikasi risiko rendah sepsis berat atau syok septik. Dapat terjadi pada infeksi lokal atau permulaan infeksi sistemik (<6 jam)
                           - 0.5-2.0 ng/ml : harus diinterpretasi bersamaan dengan riwayat klinis pasien
                           - >2.0 ng/ml : indikasi risiko tinggi sepsis berat atau septik syok
                           - hasil <2.0 ng/ml disarankan pemeriksaan ulang dalam waktu 6-24 jam kemudian
                           '?>
                           <?php endif ?>
                        </td>
                     </tr>
                  <?php endif; ?>
               <?php 
               endif;
               endforeach ?>
            <?php endfor ?>
      </tbody>
   </table>
   <br/>
   <?php if($infocvd19 == 'show'):?>
   <div class="data-tambahan">
      <p>Catatan: <?=$head->Catatan ?></p>
      <p><i>Hasil berupa angka menggunakan sistem desimal dengan separator titik<br>
         Tanda * menunjukan nilai diatas atau dibawah nilai rujukan</i>
      </p>
      <br>
      <p><i>Keterangan Hasil Rapid Test Covid-19: <br><br>
         1. Hasil Non-Reaktif belum dapat menyingkirkan kemungkinan adanya infeksi, sehingga masih beresiko menularkan ke orang lain.
         Hasil Non-Reaktif dapat terjadi karena beberapa kondisi : Window period ( terinfeksi namun antibody belum terbentuk ), 
         terdapat gangguan pembentukan antibody (immunocompromised) atau kadar antibody dibawah deteksi alat. <br>
         2. Lakukan pemeriksaan ulang anti SARS-CoV-2 10 Hari kemudian apabila baru pertama kali melakukan pemeriksaan. <br>
         3. Hasil pemeriksaan antibody tidak digunakan sebagai dasar untuk mendiagnosa infeksi SARS-CoV-2, Status Pasien, atau keputusan klinis. <br>
         4. Lakukan karantina mandiri dengan menuggunakan masker, cuci tangan sesering mungkin menggunakan sabun, jaga jarak dan hindari keramaian serta berperilaku hidup sehat.</i>
      </p>
      <br>
   </div>
   <?php else: ?>
   <div class="data-tambahan2">
      <table width="100%">
         <tr>
            <td valign="top" width="15%">Catatan</td>
            <td width="2%" valign="top">:</td>
            <td>
               <pre><?= $catatan?></pre>
            </td>
         </tr>
         <tr>
            <td valign="top" width="15%">Kesan</td>
            <td valign="top">:</td>
            <td height="60">
               <pre><?= $kesan?></pre>
            </td>
         </tr>
         <tr>
            <td valign="top" width="15%">Saran</td>
            <td valign="top">:</td>
            <td>
               <pre><?= $saran?></pre>
            </td>
         </tr>
      </table>
      <!--<p><i>Hasil berupa angka menggunakan sistem desimal dengan separator titik<br>
         Tanda * menunjukan nilai diatas atau dibawah nilai rujukan</i></p>-->
   </div>
   <?php endif?>
   <br/>
   <table width="100%" style="font-size: 18px;">
      <tr>
         <td width="50%">&nbsp;</td>
         <td width="50%">
            <div style="text-align: center">
               <p>Dr Penanggung Jawab Laboratorium</p>
               <p>RSUD RAJA AHMAD TABIB TANJUNG PINANG</p>
               <!-- <div style="height: 100px">&nbsp;</div> -->
               <img width="90px" height='90px'  src="<?php echo site_url('assets/qr/'.$qr); ?>"><br>
               (<?= $head->dokterPemeriksa ?>)<br>
               <?php if(!empty($head->C_PEGAWAI)) {echo 'NIP. ' . $head->C_PEGAWAI;}?>
            </div>
         </td>
      </tr>
   <!-- </table> -->
   <br/><br/><br/>
   <div class="footer mt-5">
      <table style="width: 210mm">
         <tr>
            <?php 
               // set default timezone
               date_default_timezone_set('Asia/Jakarta'); // CDT
               $current_date = date('d-m-Y H:i:s');
            ?>
            <td><small>Dicetak: <?=$current_date;?></small>
            <!-- <td><small>Dicetak: <?//= date('d-m-Y H:i:s')?></small> -->
            <td>
            <td>
               <div style="text-align: right"><small>* tanda bintang menunjukkan hasil di atas atau di bawah nilai referensi.</small></div>
            <td>
         </tr>
      </table>
   </div>
   </table>
</div>
<script>
   //window.print();
</script>