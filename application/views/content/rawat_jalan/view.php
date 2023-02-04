<div class="row">
    <div class="col-md-12">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="profile-user-info profile-user-info-striped" style="font-size:15px;">
                <div class="profile-info-row">
                    <div class="profile-info-name"></div>
                    <div class="profile-info-value" style="text-align:center;">
                        <span>INFO PASIEN</span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> NOMOR RM </div>
                    <div class="profile-info-value">
                        <span><?=($pasien->Medrec ?? '-')?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> NAMA PASIEN </div>
                    <div class="profile-info-value">
                        <span><?=($pasien->Firstname ?? '-')?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> TTL / USIA</div>
                    <div class="profile-info-value">
                        <span><?=($pasien->Pod ?? '-')?>, <?=(isset($pasien->Bod) ? date('d/m/Y',strtotime($pasien->Bod)) : '-')?>&emsp;(<?=($pasien->UmurThn ?? '-')?> Thn)</span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> KATEGORI </div>
                    <div class="profile-info-value">
                        <span><?=($pasien->NmKategori ?? '-')?></span>
                    </div>
                </div>
                <?php if (isset($pasien->Kategori) && $pasien->Kategori == '2'):?>
                <div class="profile-info-row">
                    <div class="profile-info-name"> NOMOR KARTU </div>
                    <div class="profile-info-value">
                        <span><?=($pasien->NoPeserta ?? '-')?></span>
                    </div>
                </div>
                <?php endif?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="profile-user-info profile-user-info-striped" style="font-size:15px;">
                <div class="profile-info-row">
                    <div class="profile-info-name"></div>
                    <div class="profile-info-value" style="text-align:center;">
                        <span>STATUS PEMERIKSAAN</span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> NOMOR REGISTRASI </div>
                    <div class="profile-info-value">
                        <span><?=($pasien->Regno ?? '-')?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> DOKTER POLI</div>
                    <div class="profile-info-value">
                        <span><?=($pasien->NmDoc ?? '-')?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> TANGGAL PENDAFTARAN </div>
                    <div class="profile-info-value">
                        <span><?=(date('d-m-Y',strtotime($pasien->Regdate)) ?? '-')?></span>
                    </div>
                </div>
                <div class="profile-info-row">
                    <div class="profile-info-name"> NOMOR URUT </div>
                    <div class="profile-info-value">
                        <span><?=($pasien->NomorUrut ?? '-')?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12"><hr></div>
        <div class="col-sm-12 col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified nav-success" role="tablist">
                <li role="presentation" class="active"><a href="#info-pasien" aria-controls="info-pasien" role="tab" data-toggle="tab"><b>Riwayat Pasien</b></a></li>
                <li role="presentation"><a href="#tindakan" aria-controls="tindakan" role="tab" data-toggle="tab"><b>Tindakan</b></a></li>
                <li role="presentation"><a href="#diagnosa" aria-controls="diagnosa" role="tab" data-toggle="tab"><b>Diagnosa</b></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active row" id="info-pasien">
                    <div id="targetDetail" class="col-sm-12 col-md-12">
                        <?php $this->load->view('content/rawat_jalan/riwayat_kunjungan',['set'=>'riwayat','regno'=>$regno,'medrec'=>($pasien->Medrec ?? '')]);?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade row" id="tindakan">
                    <div id="targetRiwayatBiling" class="col-sm-12 col-md-12"></div>
                    <div id="targetFormBiling" class="col-sm-12 col-md-12"></div>
                </div>
                <div role="tabpanel" class="tab-pane fade row" id="diagnosa">
                    <div id="targetFormDiagnosa" class="col-sm-12 col-md-12"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var regno = "<?= $regno ?? '' ?>";
    var medrec = "<?= $pasien->Medrec ?? ''?>";
    $(document).ready(function(){
        get_form_biling(regno);
        get_form_diagnosa(regno);
        get_riwayat_biling(regno);
    });

    $(".select2").select2();

    function get_form_biling(regno = '',kategori = '',notran = '',trg_lst=false){
        $.ajax({
            url:"<?=base_url('rawatjalan/form_biling')?>",
            type:"POST",
            data:{regno:regno,kategori:kategori,notran:notran},
            dataType:'html',
            beforeSend:function(){
                $('#targetFormBiling').html('<div class="alert alert-warning">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(resp){
                $('#targetFormBiling').html(resp);
            },
        });
    }

    function loadDataBiling(notran,way){
        $.ajax({
            url:"<?=base_url('rawatjalan/form_biling_detail')?>",
            type:'POST',
            data:{way:way,notran:notran},
            dataType:'html',
            beforeSend:function(){
                $("#target-detail-biling").html('<div class="alert alert-warning" role="alert"><h2>Memuat Data ... <i class="fa fa-spinner fa-pulse"></i></h2></div>');
            },
            success:function(resp){
                // node = node.parentNode.parentNode;
                // node.remove();
                $("#target-detail-biling").html(resp);
            }
        });
    }

    function get_form_diagnosa(regno = '',notran='',kategori='',trg_lst=false){
        $.ajax({
            url:"<?=base_url('rawatjalan/form_diagnosa')?>",
            type:"POST",
            data:{regno:regno,notran:notran,kategori:kategori},
            dataType:'html',
            beforeSend:function(){
                $('#targetFormDiagnosa').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(resp){
                $('#targetFormDiagnosa').html(resp);
            },
        });
    } 

    function loadDataDiagnosa(regno,way){
        $.ajax({
            url:"<?=base_url('rawatjalan/form_diagnosa_detail')?>",
            type:'POST',
            data:{way:way,regno:regno},
            dataType:'html',
            beforeSend:function(){
                $("#target-detail-diagnosa").html('<div class="alert alert-info" role="alert"><h2>Memuat Data ... <i class="fa fa-spinner fa-pulse"></i></h2></div>');
            },
            success:function(resp){
                // node = node.parentNode.parentNode;
                // node.remove();
                $("#target-detail-diagnosa").html(resp);
            }
        });
    }

    function get_riwayat_biling(regno,way){
        $.ajax({
            url:"<?=base_url("rawatjalan/form_biling_riwayat")?>",
            type:'POST',
            data:{way:way,regno:regno},
            dataType:'html',
            beforeSend:function(){
                $("#targetRiwayatBiling").html('<div class="alert alert-warning" role="alert"><h2>Memuat Data ... <i class="fa fa-spinner fa-pulse"></i></h2></div>');
            },
            success:function(resp){
                $("#targetRiwayatBiling").html(resp);
            }
        });
    }

</script>