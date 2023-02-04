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
<div class="container">
    <div class="row">
        <a href="<?=base_url('rawatjalan/form_konsul/'.$pasien->Regno)?>" class="btn btn-info"> <i class="fa fa-book"></i> Konsul</a>
    </div>
</div>
<form id="DiagnosaIrj" method="post" action="">
    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>">
    <div class="row col-sm-12 col-md-6 col-lg-6" style="display:none;">
        <div class="col-sm-12 col-md-12 col-lg-12"><hr style="margin:10px 0;padding:0;"><b>Data Transaksi</b><hr style="margin:10px 0;padding:0;"></div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label for="Firstname" class="col-sm-4 control-label">No. Rekam Medik</label>
            <div class="col-sm-5">
                <input type="text" class="form-control input-sm" id="Medrec" name="Medrec" placeholder="Nomor RM" value="<?=@$pasien->Medrec?>" readonly>
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-4 control-label">Nomor Registrasi</label>
            <div class="col-sm-5">
                <input type="text" name="Regno" id="Regno" class="form-control input-sm" placeholder="Nomor Registrasi" value="<?=@$pasien->Regno?>">
            </div>
            <div class="col-sm-3">
                <button class="btn btn-info btn-sm" title="Cari Registrasi" type="button" id="btnCariDiagnosa"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-4 control-label">Tanggal Transaksi</label>
            <div class="col-sm-5">
                <input type="date" name="Tanggal" id="Tanggal" class="form-control input-sm"value="<?=date('Y-m-d')?>">
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-4 control-label">Tanggal Registrasi</label>
            <div class="col-sm-5">
                <input type="date" name="Regdate" id="Regdate" readonly class="form-control input-sm"value="<?=isset($pasien->Regdate) ? date('Y-m-d', strtotime($pasien->Regdate)) : ''?>">
            </div>
            <div class="col-sm-3">
                <input type="time" readonly class="form-control input-sm"value="<?=isset($pasien->RegTime) ? date('H:i:s', strtotime($pasien->RegTime)) : ''?>">
                <input type="hidden" name="RegTime" id="RegTime" readonly value="<?=isset($pasien->RegTime) ? $pasien->RegTime : ''?>">
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label for="Firstname" class="col-sm-4 control-label">Nama Pasien</label>
            <div class="col-sm-8">
                <input type="text" class="form-control input-sm" id="Firstname" name="Firstname" placeholder="Nama Pasien" value="<?=@$pasien->Firstname?>" readonly>
            </div>
        </div>
    </div>

    <div class="row col-sm-12 col-md-6 col-lg-6" style="display:none;">
        <div class="col-sm-12 col-md-12 col-lg-12"><hr style="margin:10px 0;padding:0;"><b>Status Perawatan</b><hr style="margin:10px 0;padding:0;"></div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-sm-3">
                <input type="text" name="KdSex" id="KdSex" class="form-control input-sm" placeholder="Kode" value="<?=@$pasien->KdSex?>" readonly>
            </div>
            <div class="col-sm-6">
                <input type="text" name="Sex" id="Sex" class="form-control input-sm" placeholder="Jenis Kelamin" value="<?=@$pasien->Sex?>" readonly>
            </div>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
            <div class="col-sm-4">
                <input type="date" name="Bod" id="Bod" readonly class="form-control input-sm"value="<?=isset($pasien->Bod) ? date('Y-m-d', strtotime($pasien->Bod)) : ''?>">
            </div>
            <label class="col-sm-2 control-label">Umur</label>
            <div class="col-sm-3">
                <?php
                    $diff = null;
                    if(isset($pasien->Bod)){
                        $diff = date_diff(date_create($pasien->Bod),date_create(date('Y-m-d')));
                    }
                ?>
                <input type="text" name="Umur" id="Umur" class="form-control input-sm" value="<?=@$diff->y?> thn <?=@$diff->m?> bln" readonly>
                <input type="hidden" name="UmurThn" id="UmurThn" value="<?=@$diff->y?>">
                <input type="hidden" name="UmurBln" id="UmurBln" value="<?=@$diff->m?>">
                <input type="hidden" name="UmurHari" id="UmurHari" value="<?=@$diff->d?>">
            </div>
        </div>
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
                <label class="col-sm-3 control-label">No SKP</label>
                <div class="col-sm-3">
                    <input type="text" name="NoSKP" id="NoSKP" class="form-control input-sm" placeholder="No SKP" value="<?=@$pasien->NoSKP?>" readonly>
                </div>
            </div>

        <input type="hidden" name="Shift" id="Shift" value="<?=$this->session->userdata('shift')?>" readonly>
        <input type="hidden" name="ValidUser" id="ValidUser" value="<?= $this->session->userdata('username').' '.date('d/m/Y H:i:s') ?>" readonly>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12">
        <hr style="margin:10px 0;padding:0;">
        <b>Diagnosa</b>
    </div>
    <!-- Input Data Tarif -->
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="col-xm-12 col-sm-5 col-md-4 col-lg-4 no-p">
            <label class="control-label">Diagnosa</label>
            <select type="text" name="KdICD" id="KdICD" class="form-control input-sm" style="width:100%;"></select>
        </div>
        <div class="col-xm-12 col-sm-5 col-md-4 col-lg-4 no-p">
            <label class="control-label">Tindakan</label>
            <select type="text" name="KdTindakan" id="KdTindakan" class="form-control input-sm" style="width:100%;"></select>
        </div>
        <div class="col-xm-12 col-sm-2 col-md-3 col-lg-3 no-p">
            <label class="control-label">Kasus</label>
            <select type="text" name="Kasus" id="Kasus" class="form-control input-sm">
                <option value="">--= Kasus =--</option>
                <option value="Lama">Lama</option>
                <option value="Baru">Baru</option>
            </select>
        </div>
        <div class="col-xm-12 col-sm-4 col-md-1 col-lg-1 no-p">
            <label class="control-label" style="padding:2.5px;"><br><br></label>
            <button id="btnAddDiagnosa" type="button" class="btn btn-sm btn-primary"><i class="fa fa-check"></i></button>
        </div>
    </div> <!-- Akhir Input Data Tarif -->
    <div class="col-sm-12 col-md-12 col-lg-12"><hr style="margin:10px 0;padding:0;"></div>
    <div class="col-sm-12 col-md-12 col-lg-12"><!-- List Data Tarif Yg Diinput -->
        <div id="target-detail-diagnosa"> @include('rawat-jalan.form-diagnosa-detail',['dataDetail'=>[],'pasien'=>@$pasien]) </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12"><hr style="margin:10px 0;padding:0;"></div>
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="btn-group" style="float:right;">
            <button type="submit" id="submitBtnDiagnosa" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-warning" id="btnBatalDiagnosa">Batal <i class="fa fa-remove"></i></button>
        </div>
    </div>
</form>
<script type="text/javascript">
    var regno = '';
    $(document).ready(function(){
        regno = $("#Regno").val();
        if(regno != ''){
            (typeof loadData !== 'undefined')? loadData(regno,'loadDetail') : loadDataDiagnosa(regno,'loadDetail');
            $("#btnCariDiagnosa").hide();
        }else{
            $("#btnCariDiagnosa").show();
        }
    });
    $("#btnCariDiagnosa").on("click",function(){
        regno = $("#Regno").val();
        (typeof get_form !== 'undefined') ? get_form($("#Regno").val()) : get_form_diagnosa($("#Regno").val());
        (typeof loadData !== 'undefined') ? loadData(regno,'loadDetail') : loadDataDiagnosa(regno,'loadDetail');
    });
    $('#KdICD').select2({
        placeholder:'-= Diagnosa =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/icd10')?>",
            type:"POST",
            dataType: 'JSON',
            data: function(params) {
                return {
                    q: params.term,
                    offset: (params.page || 0) * 20
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data.map(function(item){
                        item.id = item.KDICD;
                        item.text = item.DIAGNOSA.trim();
                        return item;
                    }),
                    pagination: {
                        more: data.has_next
                    }
                }
            },
        },

        templateResult: function(item) {
            if(item.loading) {
                return item.text;
            }

            return `
                <p>
                    <span>Kode ICD : ${item.KDICD}</span> <br>
                    <span>Diagnosa : <i>${item.DIAGNOSA.trim()}</i><span>
                </p>
            `;
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateSelection: function(item) {
            return item.text;
        },
    });

    $('#KdTindakan').select2({
        placeholder:'-= Tindakan =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/icd9')?>",
            type:"POST",
            dataType: 'JSON',
            data: function(params) {
                return {
                    q: params.term,
                    offset: (params.page || 0) * 20
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data.map(function(item){
                        item.id = item.KDICD;
                        item.text = item.Diagnosa.trim();
                        return item;
                    }),
                    pagination: {
                        more: data.has_next
                    }
                }
            },
        },

        templateResult: function(item) {
            if(item.loading) {
                return item.text;
            }

            return `
                <p>
                    <span>Kode ICD : ${item.KDICD}</span> <br>
                    <span>Tindakan : <i>${item.Diagnosa.trim()}</i><span>
                </p>
            `;
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateSelection: function(item) {
            return item.text;
        },
    });
    
    $("#btnAddDiagnosa").on("click",function(){
        var regno = $("#Regno").val();
        if($('#KdICD').val() != ''){
            var send = {
                Regno       : $("#Regno").val(),
                Medrec      : $("#Medrec").val(),
                KdICD       : $('#KdICD').val(),
                KdTindakan  : $('#KdTindakan').val(),
                Kasus       : $('#Kasus').val(),
                ValidUser   : $('#ValidUser').val(),
            }
            // console.log(send);
            $.ajax({
                url:"<?= base_url('rawatjalan/form_diagnosa_detail') ?>",
                type:'POST',
                data:{way:'addDetail',regno:regno,sender:send},
                statusCode: {
                    404: function() {
                        alert( "Not Found" );
                    },
                    500: function() {
                        $("#target-detail-biling").html('<div class="alert alert-danger" role="alert"><h2>Kesalahan Internal Server!</h2></div>');
                    },
                },
                beforeSend:function(){
                    $('#target-detail-diagnosa').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
                },
                success:function(resp){
                    $('#KdICD').val(null).trigger("change");
                    $('#Kasus').val('');
                    $('#KdTindakan').val(null).trigger("change");
                    $('#target-detail-diagnosa').html(resp);
                }
            });
        }
    });

    $("#DiagnosaIrj").on("submit",function(e){
        e.preventDefault();
        regno = $("#Regno").val();
        if(regno != ''){
            $.ajax({
                url:"<?= base_url('rawatjalan/diagnosa_post') ?>",
                type:'POST',
                data:$(this).serialize(),
                dataType:'JSON',
                statusCode: {
                    404: function() {
                        alert( "Not Found" );
                    },
                    500: function() {
                        $("#target-detail-biling").html('<div class="alert alert-danger" role="alert"><h2>Kesalahan Internal Server!</h2></div>');
                    },
                },
                beforeSend:function(){
                    // $("#target-detail").html('<div class="alert alert-info" role="alert"><h2>Memuat Data ... <i class="fa fa-spinner fa-pulse"></i></h2></div>');
                },
                success:function(resp){
                    // console.log(resp);
                    if(resp.stat){
                        get_form_diagnosa(regno);
                        alert("Data Berhasil Disimpan.");
                        // get_table();
                    }else{
                        if(resp.inf == 1){
                            alert("Pastikan Anda memaasukan data tindakan dengan benar.");
                        }
                    }
                    // $("#target-detail").html(resp);
                }
            });
        }else{
            alert("Silahkan isi nomor registrasi terlebih dahulu dan tekan tomobol cari.");
        }
        
    });

    $("#btnBatalDiagnosa").on("click",function(){
        (typeof get_form !== 'undefined') ? get_form($("#Regno").val()) : get_form_diagnosa($("#Regno").val());
    });
    function removeDataDiagnosa(node,index,way){
        $.ajax({
            url:"<?= base_url('diagnosa.rawat-jalan.form-detail') ?>",
            type:'POST',
            data:{way:way,index:index},
            dataType:'html',
            statusCode: {
                404: function() {
                    alert( "Not Found" );
                },
                419: function() {
                    removeDataDiagnosa(node, index, way);
                },
                500: function() {
                    $("#target-detail-biling").html('<div class="alert alert-danger" role="alert"><h2>Kesalahan Internal Server!</h2></div>');
                },
            },
            beforeSend:function(){
                $("#target-detail-diagnosa").html('<div class="alert alert-info" role="alert"><h2>Memuat Data ... <i class="fa fa-spinner fa-pulse"></i></h2></div>');
            },
            success:function(resp){
                $("#target-detail-diagnosa").html(resp);
            }
        });
    }
</script>
