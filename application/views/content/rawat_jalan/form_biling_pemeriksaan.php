<?php if ($KdGroup == ''):?>
<div id="group-pemeriksaan">
    <table class="table table-bordered table-hover" id="tbl-group">
        <thead>
            <tr class="info">
                <th>Kode Group</th>
                <th>Nama Group</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $key => $l):?>
            <tr data-regno="<?=@$regno?>" data-kdgroup="<?=@$l->KdGroup?>" data-kategori="<?=@$kategori?>" id="group_<?=@$l->KdGroup?>" onclick="get_pemeriksaan('#'+this.id)" style="cursor:pointer;">
                <td><?=@$l->KdGroup?></td>
                <td><?=@$l->NmGroup?></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>
<div>
    <button id="btnBackGroup" class="btn btn-sm btn-warning"><i class="fa fa-angle-left"></i> Kembali</button>
    <hr style="margin:10px 0;padding:0;">
</div>
<?php else:?>
<table class="table table-bordered table-hover" id="tbl-detail">
    <thead>
        <tr class="info">
            <th>Kode Detail</th>
            <th>Kode Tarif</th>
            <th>Nama Detail</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $key => $l):?>
        <tr data-regno="<?=@$regno?>" data-tarif='<?=json_encode($l)?>' id="detail_<?=@$l->KDTarif?>" onclick="set_tindakan('#'+this.id)" style="cursor:pointer;">
            <td><?=@$l->KDDetail?></td>
            <td><?=@$l->KDTarif?></td>
            <td><?=@$l->NMDetail?></td>
            <td><?=@$l->Keterangan?></td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
<?php endif ?>

<div id="detail-pemeriksaan"></div>

<script>
    var KdGroup = "<?=$KdGroup?>";
    $(function(){
        if(KdGroup == ''){
            $('#tbl-group').dataTable({
                "paging":false,
            });
        }else{
            $('#tbl-detail').dataTable({
                "paging":false,
            });
        }
    });
    $('#btnBackGroup').on("click",function(){
        $('#group-pemeriksaan').show().fadeIn(3000);
        $('#detail-pemeriksaan').empty();
        $('#btnBackGroup').hide().fadeOut(3000);
    });
    
    function set_tindakan(node){
        // console.log($(node).data('tarif'));
        var DataTarif = $(node).data('tarif');
        var Regno = $(node).data('regno');
        $('#KdTarif').val(DataTarif.KDTarif);
        $('#NmTarif').val(DataTarif.NMDetail);
        $('#Qty').val(1);
        $('#JasaRs').val(parseFloat(DataTarif.JasaRumahSakit));
        $('#JasaDokter').val(parseFloat(DataTarif.JasaDokter));
        $('#JasaPerawat').val(parseFloat(DataTarif.JasaPerawat));
        $('#Sarana').val(parseFloat(DataTarif.Sarana));
        $('#Pelayanan').val(parseFloat(DataTarif.Pelayanan));
        jmlBy = parseFloat($('#Qty').val()) * (parseFloat(DataTarif.Pelayanan) + parseFloat(DataTarif.Sarana));
        $('#JumlahBiayaSet').val(jmlBy);
        $('#modal-tindakan').modal('hide');
        $('#target-pemeriksaan').empty();
    }

    function get_pemeriksaan(node){
        var KdGroup = $(node).data('kdgroup');
        var Regno = $(node).data('regno');
        var Kategori = $(node).data('kategori');
        var xhr = $.ajax({
            type:'POST',
            url:"<?= base_url('rawatjalan/get_pemeriksaan') ?>",
            data:{KdGroup:KdGroup,regno:Regno,kategori:Kategori},
            dataType:'html',
            beforeSend:function(){
                $('#group-pemeriksaan').hide().fadeOut(3000);
                $('#detail-pemeriksaan').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(resp){
                $('#btnBackGroup').show().fadeIn(3000);
                $('#detail-pemeriksaan').html(resp);
            }
        });
    }
</script>