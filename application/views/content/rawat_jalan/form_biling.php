<style>
    *{
        font-size:12px;
    }
    .no-pm{ padding:0px;margin:5px; }
    .no-p{ padding:0px; }
    .no-m{ margin:0px }
    .form-group{
        margin:2.5px;
    }
</style>
<form id="bilIrj" method="post">
    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">
    <div class="row col-sm-12 col-md-6 col-lg-6" style="display:none;">
        <div class="col-sm-12 col-md-12 col-lg-12"><hr style="margin:10px 0;padding:0;"><b>Data Transaksi</b><hr style="margin:10px 0;padding:0;"></div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-4 control-label">Nomor Transaksi</label>
            <div class="col-sm-5">
                <input type="text" name="NoTran" id="NoTran" class="form-control input-sm" placeholder="Nomor Transaksi" value="<?=@$notran?>" readonly>
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-4 control-label">Nomor Registrasi</label>
            <div class="col-sm-5">
                <input type="text" name="Regno" id="Regno" class="form-control input-sm" placeholder="Nomor Registrasi" value="<?=@$pasien->Regno?>">
            </div>
            <div class="col-sm-3">
                <button class="btn btn-info btn-sm" title="Cari Registrasi" type="button" id="btnCariBiling"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-4 control-label">Tanggal Registrasi</label>
            <div class="col-sm-5">
                <input type="date" name="Regdate" id="Regdate" readonly class="form-control input-sm"value="<?=isset($pasien->Regdate) ? date('Y-m-d', strtotime($pasien->Regdate)) : ''?>">
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-4 control-label">Tanggal Transaksi</label>
            <div class="col-sm-5">
                <input type="date" name="Tanggal" id="Tanggal" class="form-control input-sm"value="<?=date('Y-m-d')?>">
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label for="Firstname" class="col-sm-4 control-label">Nama Pasien</label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm" id="Medrec" name="Medrec" placeholder="Nomor RM" value="<?=@$pasien->Medrec?>" readonly>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control input-sm" id="Firstname" name="Firstname" placeholder="Nama Pasien" value="<?=@$pasien->Firstname?>" readonly>
            </div>
        </div>
    </div>
    <div class="row col-sm-12 col-md-6 col-lg-6" style="display:none;">
        <div class="col-sm-12 col-md-12 col-lg-12"><hr style="margin:10px 0;padding:0;"><b>Status Perawatan</b><hr style="margin:10px 0;padding:0;"></div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-3 control-label">Nama Dokter</label>
            <div class="col-sm-3">
                <input type="text" name="KdDoc" id="KdDokter" class="form-control input-sm" placeholder="Kode" value="<?=@$pasien->KdDoc?>" readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" name="NmDoc" id="NmDokter" class="form-control input-sm" placeholder="Nama Dokter" value="<?=@$pasien->NmDoc?>" readonly>
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-3 control-label">Nama Poli</label>
            <div class="col-sm-3">
                <input type="text" name="KdPoli" id="KdPoli" class="form-control input-sm" placeholder="Kode" value="<?=@$pasien->KdPoli?>" readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" name="NmPoli" id="NmPoli" class="form-control input-sm" placeholder="Nama Poli" value="<?=@$pasien->NMPoli?>" readonly>
            </div>
            <input type="hidden" name="KdTuju" id="KdTuju" value="<?=@$pasien->KdTuju?>" readonly>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-3 control-label">Penjamin</label>
            <div class="col-sm-3">
                <input type="text" name="" id="" class="form-control input-sm" placeholder="Kode" value="<?=@$pasien->KdJaminan?>" readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" name="" id="" class="form-control input-sm" placeholder="Penjamin" value="<?=@$pasien->NMJaminan?>" readonly>
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-3 control-label">Kategori</label>
            <div class="col-sm-3">
                <input type="text" name="KdKategori" id="KdKategori" class="form-control input-sm" placeholder="Kode" value="<?=@$pasien->Kategori?>" readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" name="Kategori" id="Kategori" class="form-control input-sm" placeholder="Kategori" value="<?=@$pasien->NmKategori?>" readonly>
            </div>
            <input type="hidden" name="KdJaminan" id="KdJaminan" value="<?=@$pasien->KdJaminan?>" readonly>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-3 control-label">Cara Bayar</label>
            <div class="col-sm-3">
                <input type="text" name="KdCbayar" id="KdCbayar" class="form-control input-sm" placeholder="Kode" value="<?=@$pasien->KdCbayar?>" readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" name="CaraBayar" id="CaraBayar" class="form-control input-sm" placeholder="Cara bayar" value="<?=@$pasien->NMCbayar?>" readonly>
            </div>
        </div>

        <input type="hidden" name="Shift" id="Shift" value="<?=$this->session->userdata('shift')?>" readonly>
        <input type="hidden" name="ValidUser" id="ValidUser" value="<?= $this->session->userdata('username').' '.date('d/m/Y H:i:s') ?>" readonly>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12">
        <hr style="margin:10px 0;padding:0;">
        <b>Perincian Biaya</b>
        <button type="button" id="btnListTindakan" class="btn btn-sm btn-primary" style="float:right;">
            Tambah Tindakan <i class="fa fa-plus"></i>
        </button>
        <hr style="margin-bottom:10px 0;padding:0;clear:both">
    </div>
    <!-- Input Data Tarif -->
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="col-xm-12 col-sm-6 col-md-6 col-lg-6 no-p">
            <div class="col-xm-12 col-sm-3 col-md-3 col-lg-3 no-p">
                <label class="control-label">Kode Tarif</label>
                <input type="text" name="KdTarif" id="KdTarif" class="form-control input-sm" placeholder="" value="" readonly>
            </div>
            <div class="col-xm-12 col-sm-5 col-md-9 col-lg-9 no-p">
                <label class="control-label">Keterangan</label>
                <input type="text" name="NmTarif" id="NmTarif" class="form-control input-sm" placeholder="" value="" readonly>
            </div>
        </div>
        <div class="col-xm-12 col-sm-6 col-md-6 col-lg-6 no-p">
            <div class="col-xm-12 col-sm-4 col-md-2 col-lg-2 no-p">
                <label class="control-label">Dokter</label>
                <input type="text" name="KdDocSet" id="KdDocSet" class="form-control input-sm" placeholder="" value="">
            </div>
            <div class="col-xm-12 col-sm-4 col-md-2 col-lg-2 no-p">
                <label class="control-label">Poli</label>
                <input type="text" name="KdPoliSet" id="KdPoliSet" class="form-control input-sm" placeholder="" value="">
            </div>
            <div class="col-xm-12 col-sm-4 col-md-1 col-lg-1 no-p">
                    <label class="control-label">Qty</label>
                    <input type="text" name="Qty" id="Qty" class="form-control input-sm" placeholder="" value="">
                </div>
            <div class="col-xm-12 col-sm-4 col-md-2 col-lg-2 no-p">
                <label class="control-label">Sarana</label>
                <input type="text" name="Sarana" id="Sarana" class="form-control input-sm" placeholder="" value="">
            </div>
            <div class="col-xm-12 col-sm-4 col-md-2 col-lg-2 no-p">
                <label class="control-label">Pelayanan</label>
                <input type="text" name="Pelayanan" id="Pelayanan" class="form-control input-sm" placeholder="" value="">
            </div>
            <div class="col-xm-12 col-sm-4 col-md-2 col-lg-2 no-p">
                <label class="control-label">Jumlah Biaya</label>
                <input type="text" name="JumlahBiayaSet" id="JumlahBiayaSet" class="form-control input-sm" placeholder="" value="">
            </div>
            <input type="hidden" name="JasaRs" id="JasaRs">
            <input type="hidden" name="JasaDokter" id="JasaDokter">
            <input type="hidden" name="JasaPerawat" id="JasaPerawat">
            <div class="col-xm-12 col-sm-4 col-md-1 col-lg-1 no-p">
                <label class="control-label" style="padding:2.5px;"><br><br></label>
                <button id="btnAddTindakan" type="button" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></button>
            </div>
        </div>
    </div> <!-- Akhir Input Data Tarif -->
    <div class="col-sm-12 col-md-12 col-lg-12"><hr style="margin:10px 0;padding:0;"></div>
    <div class="col-sm-12 col-md-12 col-lg-12"><!-- List Data Tarif Yg Diinput -->
        <div id="target-detail-biling"> <?php $this->load->view('content/rawat_jalan/form_biling_detail',['dataDetail'=>[],'pasien'=>@$pasien])?> </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12"><hr style="margin:10px 0;padding:0;"></div>
    <div class="form-group col-sm-12 col-md-12 col-lg-12">
        <label class="col-sm-9 control-label" style="text-align:right">Total : </label>
        <div class="col-sm-3">
            <input type="text" name="TotalTagihan" id="TotalTagihan" class="form-control input-sm" placeholder="0" value="<?=@$pasien->TotalTagihan?>" readonly>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12"><hr style="margin:10px 0;padding:0;"></div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="btn-group" style="float:right;">
            <button type="submit" id="submitBtnBiling" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-warning" onclick="get_form_biling($('#Regno').val())">Baru <i class="fa fa-refresh"></i></button>
        </div>
    </div>
</form>
<!-- Modal -->
<div class="modal fade" id="modal-tindakan" tabindex="-1" role="dialog" aria-labelledby="ModalGroupTindakan">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ModalGroupTindakan">Pemeriksaan</h4>
            </div>
            <div class="modal-body">
                <div id="target-pemeriksaan"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var notran = ''; var regno = ''; var kategori = '';
    $(document).ready(function(){
        notran = $("#NoTran").val();
        kategori = $("#KdKategori").val();
        $('#KdDocSet').val($('#KdDokter').val());
        $('#KdPoliSet').val($('#KdPoli').val());
        $("#btnCariBiling").hide().fadeOut(3000);
        if(notran != ''){
            loadDataBiling(notran,'loadDetail');
        }
    });
    $("#btnCari").on("click",function(){
        regno = $("#Regno").val();
        get_form_biling(regno,kategori,notran);
    });
    
    $("#btnListTindakan").on("click",function(){
        regno = $("#Regno").val();
        var xhr = $.ajax({
            url:"<?=base_url('rawatjalan/get_pemeriksaan')?>",
            type:'POST',
            data:{regno:regno,kategori:kategori},
            beforeSend:function(){
                $('#modal-tindakan').modal('show');
                $('#target-pemeriksaan').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(resp){
                $('#target-pemeriksaan').html(resp);
                $('#btnBackGroup').hide().fadeOut(3000);

            }
        });
    });

    $('#Qty').on("keyup",function(){
        // console.log(parseFloat($(this).val()))
        if(parseFloat($(this).val()) >= 0){
            jmlBy = parseFloat($(this).val()) * (parseFloat($('#Sarana').val()) + parseFloat($('#Pelayanan').val())); 
            $('#JumlahBiayaSet').val(jmlBy);
        }
    });
    
    $("#btnAddTindakan").on("click",function(){
        var regno = $("#Regno").val();
        if($('#KdTarif').val() != ''){
            var send = {
                'KdTarif'       : $('#KdTarif').val(),
                'NmTarif'       : $('#NmTarif').val(),
                'KdDoc'         : $('#KdDocSet').val(),
                'KdPoli'        : $('#KdPoliSet').val(),
                'Qty'           : $('#Qty').val(),
                'JasaRumahSakit': $('#JasaRs').val(),
                'JasaDokter'    : $('#JasaDokter').val(),
                'JasaPerawat'   : $('#JasaPerawat').val(),
                'Sarana'        : $('#Sarana').val(),
                'Pelayanan'     : $('#Pelayanan').val(),
                'JumlahBiaya'   : $('#JumlahBiayaSet').val()
            }
            // console.log(send);
            $.ajax({
                url:"<?=base_url('rawatjalan/form_biling_detail')?>",
                type:'POST',
                data:{way:'addDetail',regno:regno,sender:send},
                dataType:'html',
                beforeSend:function(){
                    $('#target-detail-biling').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
                },
                success:function(resp){
                    $('#KdTarif').val('');
                    $('#NmTarif').val('');
                    $('#Qty').val('');
                    $('#JasaRs').val('');
                    $('#JasaDokter').val('');
                    $('#JasaPerawat').val('');
                    $('#Sarana').val('');
                    $('#Pelayanan').val('');
                    $('#JumlahBiayaSet').val('');
                    $('#target-detail-biling').html(resp);
                }
            });
        }
    });

    $("#bilIrj").on("submit",function(e){
        e.preventDefault();
        regno = $("#Regno").val();
        kategori = $("#KdKategori").val();
        if(regno != ''){
            $.ajax({
                url:"<?=base_url('rawatjalan/biling_post')?>",
                type:'POST',
                data:$(this).serialize(),
                dataType:'JSON',
                beforeSend:function(){
                    // $("#target-detail").html('<div class="alert alert-info" role="alert"><h2>Memuat Data ... <i class="fa fa-spinner fa-pulse"></i></h2></div>');
                },
                success:function(resp){
                    // console.log(resp);
                    if(resp.stat){
                        $("#NoTran").val(resp.NoTran);
                        get_form_biling(regno);
                        get_riwayat_biling(regno);
                        alert("Data Berhasil Disimpan.");
                    }else{
                        if(resp.inf == 1){
                            alert("Pastikan Anda memaasukan data tindakan dengan benar.");
                        }
                    }
                }
            });
        }else{
            alert("Silahkan isi nomor registrasi terlebih dahulu dan tekan tomobol cari.");
        }
        
    });

    function removeDataBiling(node,index,way){
        // console.log(node);
        $.ajax({
            url:"<?=base_url('rawatjalan/form_biling_detail')?>",
            type:'POST',
            data:{way:way,index:index},
            dataType:'html',
            beforeSend:function(){
                $("#target-detail-biling").html('<div class="alert alert-info" role="alert"><h2>Memuat Data ... <i class="fa fa-spinner fa-pulse"></i></h2></div>');
            },
            success:function(resp){
                $("#target-detail-biling").html(resp);
            }
        });
    }

    function hapusDataTindakan(regno='', notran=''){
        $.ajax({
            url:"<?=base_url('rawatjalan/biling_delete')?>",
            type:'POST',
            data:{notran:notran},
            dataType:'html',
            success:function(resp){
                console.log(resp);
                if(resp){
                    get_riwayat_biling(regno);
                }
            }
        });
    }

    $("#btnCariBiling").on("click",function(){
        get_form_biling($("#Regno").val());
    });
</script>
