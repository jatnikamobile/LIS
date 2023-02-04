<a href="<?= base_url('billing/edit/'.$head->Notran) ?>" class="btn btn-success btn-xs btn-round">
<i class="fa  fa-check-circle-o"></i> Tambah pemeriksaan baru
</a>
<button type="submit" class="btn btn-success btn-xs btn-round" id="btnSaveHasil">
<i class="fa fa-save"></i> Simpan
</button>
<button type="button" class="btn btn-primary btn-xs btn-round" id="btnPrintHasil">
<i class="fa fa-print"></i> Print Hasil  
</button>
<button type="button" class="btn btn-primary btn-xs btn-round" id="btnPrintCustom">
<i class="fa fa-print"></i> Print Custom 
</button>
<button type="button" class="btn btn-warning btn-xs btn-round" id="btnResyncLIS">
<i class="fa fa-edit"></i> Duplo LIS
</button>
<did id="resync">
</div>
<table class="table table-bordered table-striped mb-0" id="detail-pemeriksaan" style="margin-top: 10px;">
   <thead>
      <tr class="info">
         <th>No</th>
         <th>Pemeriksaan</th>
         <th>Hasil</th>
         <th>Nilai Normal</th>
         <th>Nilai Kritis</th>
         <th>Satuan</th>
         <th>Histori</th>
      </tr>
   </thead>
   <tbody>
      <?php  if ($message != 'ada' && $message != ''): ?>
         alert(<?php echo $message; ?>);
      <?php endif ?>

      <?php $no=1;
      
      //var_dump($list);die(); 

      foreach ($list as $key => $l):?>
      <tr>
         <?php if (strlen($l->KDDetail) <= 5): ?>
            <td><?= $no++; ?></td>
            <td><?=@$l->NMDetail?></td>
         <?php else: ?>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;<?=@$l->NMDetail?></td>
         <?php endif ?>
         <?php //var_dump(substr(($l->KDDetail),0,1));die(); ?>
         <?php if ($l->KdInput == '4'): ?>
            <td></td>
            <td></td>
         <?php elseif ($l->KdInput == '2'): ?>
            <?php if ($l->KDDetail == '2012'): ?>
               <td>
                  <select name="hasil[<?=@$l->keyno?>]" id="hasil[<?=@$l->keyno?>]" class="form-control input-sm">
                     <option value="<?=@$l->Hasil?>" selected><?=@$l->Hasil?></option>
                     <option value="A/Positif">A/Positif</option>
                     <option value="B/Positif">B/Positif</option>
                     <option value="O/Positif">O/Positif</option>
                     <option value="AB/Positif">AB/Positif</option>
                     <option value="A/Negatif">A/Negatif</option>
                     <option value="B/Negatif">B/Negatif</option>
                     <option value="O/Negatif">O/Negatif</option>
                     <option value="AB/Negatif">AB/Negatif</option>
                  </select>
               </td>
               <td></td>               

            <?php elseif (substr(($l->KDDetail),0,1) == '3')  : ?>
               <td>
                  <select name="hasil[<?=@$l->keyno?>]" id="hasil[<?=@$l->keyno?>]" class="form-control input-sm">
                     <option value="<?=@$l->Hasil?>" selected><?=@$l->Hasil?></option>
                     <option value="NON REAKTIF">NON REAKTIF</option>
                     <option value="REAKTIF">REAKTIF</option>
                  </select>
               </td>
               <td></td>
            <?php else: ?>
               <td>
                  <select name="hasil[<?=@$l->keyno?>]" id="hasil[<?=@$l->keyno?>]" class="form-control input-sm">
                     <option value="<?=@$l->Hasil?>"><?=@$l->Hasil?></option>
                     <option value="Negatif">Negatif</option>
                     <option value="Positif">Positif</option>
                  </select>
               </td>
               <!-- <td></td> -->
            <?php endif ?>
         <?php elseif ($l->KDDetail == '3'): ?>
            <td><textarea name="hasil[<?=@$l->keyno?>]" id="hasil[<?=@$l->keyno?>]" class="form-control"><?=@$l->Hasil?></textarea></td>
            <td></td>
            <!-- <td><input type="text" name="hasil[<?//=@$l->keyno?>]" id="hasil[<?//=@$l->keyno?>]" value="<?//=@$l->Hasil?>"></td> -->
            <!-- <td><input type="text" name="hasil[<?//=@$l->keyno?>]" id="hasil[<?//=@$l->keyno?>]" value="<?//=@$l->Hasil?>"></td> -->
         <?php else: ?>
            <?php
                     $nilainormal=$l->NilaiNormal;

                     if ($pasien->Umurthn >='14') {
                        if ($JK == 'L') {
                           if (!empty($l->NilaiNormalPria)){
                           $nilainormal = $l->NilaiNormalPria;}else{$nilainormal = $l->NilaiNormalPria_p;}
                        }else{
                           if (!empty($l->NilaiNormalWanita)){
                           $nilainormal = $l->NilaiNormalWanita;}else{$nilainormal = $l->NilaiNormalWanita_p;}
                        }
                     }elseif($pasien->Umurthn < '14' && $pasien->Umurthn >= '8' ){
                        $nilainormal = ($l->NN8_13Y != '' ? $l->NN8_13Y : $l->NN8_13Y_p);
                     }elseif($pasien->Umurthn <= '7' && $pasien->Umurthn >= '4' ){
                        $nilainormal = ($l->NN4_7Y != '' ? $l->NN4_7Y :$l->NN4_7Y_p);
                     }elseif($pasien->Umurthn <= '3' && $pasien->Umurthn >= '1' ){
                        $nilainormal = ($l->NN1_3Y != '' ? $l->NN1_3Y :$l->NN1_3Y_p);
                     }elseif($pasien->Umurthn == '0' && $pasien->Umurbln >= '6' ){
                        $nilainormal = ($l->NN6_11M != '' ? $l->NN6_11M :$l->NN6_11M_p);
                     }elseif($pasien->Umurthn == '0' && $pasien->Umurbln <= '5' && $pasien->Umurbln >= '3' ){
                        $nilainormal = ($l->NN3_5M != '' ? $l->NN3_5M :$l->NN3_5M_p);
                     }elseif($pasien->Umurthn == '0' && $pasien->Umurbln <= '2' && $pasien->Umurbln >= '1' ){
                        $nilainormal = ($l->NN1_2M != '' ? $l->NN1_2M :$l->NN1_2M_p);
                     }elseif($pasien->Umurthn == '0' && $pasien->Umurbln == '0' && $pasien->Umurhari >= '15' &&  $pasien->Umurhari <= '30' ){
                        $nilainormal = ($l->NN15_30D != '' ? $l->NN15_30D :$l->NN15_30D_p);
                     }elseif($pasien->Umurthn == '0' && $pasien->Umurbln == '0' && $pasien->Umurhari >= '8' && $pasien->Umurhari <= '14' ){
                        $nilainormal = ($l->NN8_14D != '' ? $l->NN8_14D :$l->NN8_14D_p);
                     }elseif($pasien->Umurthn == '0' && $pasien->Umurbln == '0' && $pasien->Umurhari >= '5' && $pasien->Umurhari <= '7' ){
                        $nilainormal = ($l->NN5_7D != '' ? $l->NN5_7D :$l->NN5_7D_p);
                     }elseif($pasien->Umurthn == '0' && $pasien->Umurbln == '0' && $pasien->Umurhari >= '2' && $pasien->Umurhari <= '4' ){
                        $nilainormal = ($l->NN2_4D != '' ? $l->NN2_4D :$l->NN2_4D_p);
                     }elseif($pasien->Umurthn == '0' && $pasien->Umurbln == '0' && $pasien->Umurhari <= '1' ){
                        $nilainormal = ($l->NN0_1D != '' ? $l->NN0_1D :$l->NN0_1D_p);
                     }else{
                        $nilainormal=$l->NilaiNormalPria;
                     }


                     if ( $nilainormal=='' || empty($nilainormal) ) {
                        if ($JK == 'L') {
                           if (!empty($l->NilaiNormalPria)){
                           $nilainormal = $l->NilaiNormalPria;}else{$nilainormal = $l->NilaiNormalPria_p;}
                        }else{
                           if (!empty($l->NilaiNormalWanita)){
                           $nilainormal = $l->NilaiNormalWanita;}else{$nilainormal = $l->NilaiNormalWanita_p;}
                        }
                     }
                  ?>

            <?php if (!empty($api)): ?>
               
               <?php
               $tempvalue = '';
               $tempvalua = '';
               $namatind = $l->KdMappingHistori != '' ? $l->KdMappingHistori : ($l->param_lis != '' ? $l->param_lis : $l->NMDetail);
               foreach ($api as $hasil_lis){
                  // echo $hasil_lis->param.' = '.$hasil_lis->value.'<br>';
                  // echo $l->NMDetail.' == '.$hasil_lis->param.' : '.$hasil_lis->value.'<br>';                
                  if( strtoupper($namatind) == strtoupper($hasil_lis->param) ) {
                           $tempvalua = $hasil_lis->value;
                           $tempvalue = $tempvalua;
                  }

               }

                  //generate ulang nhasila as nhasilb
                     $nhasila=0; $nhasilb=0; $nilaiAcuan='kurangdari';
                     if (!empty($l->NilaiNormal)) {
                        $nNormal=explode('-',$l->NilaiNormal);
                        if(count($nNormal)>1){
                           if(is_numeric(trim($nNormal[0]))) { 
                              $nhasila=(float)($nNormal[0]);
                           }
                           if(is_numeric(trim($nNormal[1]))) { 
                              $nhasilb=(float)($nNormal[1]);
                           }
                        } 
                        // var_dump(substr_count($l->NilaiNormal,'>'));die(); 
                        
                        //nilai normal kurang dari: < 5 = 4 =  
                         if (substr_count($l->NilaiNormal,'<')>0) {
                              $nhasila=0;
                              $nhasilb=(float)(str_replace('<','',$l->NilaiNormal));
                              $nilaiAcuan='kurangdari';
                           }
                        //nilai normal lebih dari: >
                         if (substr_count($l->NilaiNormal,'>')>0) {
                           // var_dump($l->NilaiNormal);//die(); 
                           $nhasila=(float)(str_replace('>','',$l->NilaiNormal));
                           $nhasilb=0;
                           $nilaiAcuan='lebihdari';
                        }
                     }
                         
                        //hasil berupa angka saja
                              $off='';
                        if ( !empty($tempvalue)) {
                           if(is_numeric($tempvalue)) {         
                              //nilai normal kurang dari: <  
                                 $tempvalue .= (float)$nhasila > (float)$tempvalue || (float)$tempvalue > (float)$nhasilb ? ' *' : '';
                                 // $off= (float)$nhasila > (float)$tempvalue || (float)$tempvalue > (float)$nhasilb ? ' *' : '';
                             
                              //hasil berupa angka range, untuk nilai Lekosit 0-3 
                           } elseif (substr_count($tempvalue,'-')>0) {  
                              $dataHasil=explode('-',$tempvalue); 
                              if(count($dataHasil)>1) {
                                 $nilaiRangeA=(float)$dataHasil[0]; 
                                 $nilaiRangeB=(float)$dataHasil[1]; 
                                 if(!empty($l->NilaiNormal)) {
                                    $tempvalue .= (float)$nhasila > (float)$nilaiRangeB && (float)$nilaiRangeB > (float)$nhasilb ? ' *' : '';
                                    $off=(float)$nhasila > (float)$nilaiRangeB || (float)$nilaiRangeB > (float)$nhasilb ? ' *' : '';
                                 } 
                              }
                           
                              //hasil berupa huruf
                           } else {                         
                              if($tempvalue<>$l->NilaiNormal) {
                                 if(!empty($l->NilaiNormal)) {
                                 $tempvalue .=' *';
                                 $off ='*';
                                 }
                              }
                           }
                        }
                    
               if(!empty($tempvalue)) {
                  echo '
                  <td>
                     <input type="text" name="hasil['.$l->keyno.']" id="hasil['.$l->keyno.']" value="'.$tempvalue.'">
                     <input type="hidden" name="off['.$l->keyno.']" id="off['.$l->keyno.']" value="'.$off.'">
                  </td>';
               } else {
                  echo '
                  <td>
                     <input type="text" name="hasil['.$l->keyno.']" id="hasil['.$l->keyno.']" value="'.@$l->Hasil.'">
                  </td>';
               }
               ?>
               <td>
                     <input type="text" name="nilainormal[<?=$l->keyno?>]" id="nilainormal[<?=$l->keyno?>]" value="<?=@htmlentities($nilainormal)?>">
               </td>
               
            <?php else: ?>
               <td>
                  <input type="text" name="hasil[<?=@$l->keyno?>]" id="hasil[<?=@$l->keyno?>]" value="<?=@$l->Hasil?>">
               </td>

               <td>
                     <input type="text" name="nilainormal[<?=$l->keyno?>]" id="nilainormal[<?=$l->keyno?>]" value="<?=@htmlentities($nilainormal)?>">
               </td>

               <?php 
                  if (!empty($l->nilai_kritis) && !empty($tempvalue)) {
                  
                     $nilaikr = explode('&', $l->nilai_kritis);
                  
                     if ($tempvalue < $nilaikr[0] || $tempvalue  > $nilaikr[1] ) {?>
                        <script type="text/javascript">
                           myInterval = setInterval(openAlert, 2000);
                           function openAlert(){
                              alert("tes");
                              clearInterval(myInterval);
                           }
                        </script>
                     <?php }  
                  }
            
            endif;?>
         <?php endif ?>
         
         <td><?= $l->nilai_kritis ?></td>
         <td><?= $l->Satuan ?></td>
         <td><a href="#" class="btn btn-info btn-xs" id="<?=@$l->KDDetail?>" onclick="load_histori(this.id)">Histori <?= @$l->NMDetail ?></a></td>
      </tr>
      <?php endforeach?>
   </tbody>
</table>
<div class="modal fade" id="modal-histori-pemeriksaan" tabindex="-1" role="dialog" aria-labelledby="ModalHistoriPemeriksaan">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="ModalHistoriPemeriksaan">Histori Pasien</h4>
         </div>
         <div class="modal-body">
            <div id="target-histori-pemeriksaan"></div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   var value = 'hide';
   function load_histori(pemeriksaan) {
      $.ajax({
         url:"<?=base_url('hasilpemeriksaan/histori_pasien')?>",
         type:'get',
         data:{pemeriksaan: pemeriksaan, medrec: $('#Medrec').val()},
         beforeSend:function(){
            $('#modal-histori-pemeriksaan').modal('show');
            $('#target-histori-pemeriksaan').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
         },
         success:function(resp){
            $('#target-histori-pemeriksaan').html(resp);
            // $('#btnBackGroup').hide().fadeOut(3000);
         }
      });
   }
   
   const bulanList = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
   
    $('#btnPrintCustom').click(function(ev) {
      ev.preventDefault();
      let btn = $(this);
      let oldText = btn.html();
   
         // $('#modal-print-custom').modal('show');
      btn
        .attr('content-orig', btn.html())
        .html('<i class="fa fa-spin fa-spinner"></i> ' + 'tunggu...')
        .prop('disabled', true);
   
      $.get("<?= base_url('hasilpemeriksaan/get_list_custom_print/') ?>" + $('#NoTransaksi').val())
      .done(function(res) {
         if(res) {
            $('#modal-print-custom tbody').html('');
            if(res.bil && res.bil.length) {
   
            res.bil.forEach(function(item) {
               let d = new Date(item.Tanggal);
               $('#modal-print-custom tbody').append(`
                     <tr>
                        <td><input type="checkbox" name="kode_detail[]" kode-detail="${item.KDDetail}#${item.Tanggal}" value="${item.KDDetail}#${item.Tanggal}"></td>
                        <td>
                           ${ String(d.getDate()).padStart(2, '0') } ${bulanList[d.getMonth()]} ${d.getFullYear()} /
                           ${ String(d.getHours()).padStart(2, '0') }:${ String(d.getMinutes()).padStart(2, '0') }:${ String(d.getSeconds()).padStart(2, '0') }</td>
                        <td>${item.NMDetail}</td>
                     </tr>
                  `);
            });
            }
            $('#detail-pems').html('');
            if(res.pem && res.pem.length) {
               res.pem.forEach(function(item) {
   
                  $('#detail-pems').append(`<input kode-detail="${item.KDDetail}#${item.Tanggal}" type="checkbox" name="kode_detail[]" value="${item.KodeDetail}#${item.Tanggal}">`);
               });
            }
         }
         else {
            $('#modal-print-custom tbody').html('<tr><td colspan="100%" style="text-align: center; font-style: italic;">(Tidak ada data)</td></tr>');
         }
   
         $('#modal-print-custom').modal('show');
      })
      .always(function() {
        btn.html(btn.attr('content-orig')).prop('disabled', false);
      });
    });
   
    $('input[type=radio][name=infocvd19]').change(function(){
    value = $(this).val();
   
    });
   
    // $('#btnPrintHasil').on('click', function(ev) {
    //   ev.preventDefault();
    //   if ($('#NoTransaksi').val() == '') {
    //     alert('Nomor Transaksi Kosong');
    //   } else {
      
    //  var infoCovid19 = value;
    //     var xhr = $.ajax({

    //       type:'get',
    //       data:{TglHasil: $('#TglHasil').val(), notransaksi: $('#NoTransaksi').val(), infoCovid19:infoCovid19},
    //       beforeSend:function(){
    //         $('#modal-tindakan').modal('show');
    //         $('#target-pemeriksaan').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
    //       },
    //       success:function(resp){
    //         $('#target-pemeriksaan').html(resp);
    //         setTimeout(function () {
    //           $('#target-pemeriksaan').printElement();
    //         }, 1000);
    //       }
    //     });
    //   }
    // });

    $('#btnPrintHasil').on('click', function(ev) {
    ev.preventDefault();
      var notransaksi= $('#NoTransaksi').val();
    if ($('#NoTransaksi').val() == '') {
      alert('Nomor Transaksi Kosong');
    } else {
         window.open('<?= site_url('hasilpemeriksaan/print_hasil_pemeriksaan_pdf/')?>'+notransaksi);
    }
  });

    $('#btnResyncLIS').on('click', function(ev) {
      ev.preventDefault();
      if ($('#NoLaboratorium').val() == '') {
        alert('Nomor Laboratorium Kosong');
      } else {
         $nolab=$('#NoLaboratorium').val();
         window.open('<?= 'http://192.168.2.30:8080/api/mylis.php?alat=all&id='?>'+$nolab);
      }
    });
</script>
	