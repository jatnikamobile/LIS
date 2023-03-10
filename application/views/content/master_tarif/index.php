<style type="text/css">
    .pemeriksaan-tarif {
        max-height: 500px;
        overflow: auto;
        background-color: transparent;
    }

    .nama-tarif {
        font-size: 9px;
    }
</style>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <ul class="nav nav-tabs nav-justified nav-success" role="tablist">
            <li role="presentation" class="active"><a href="#pemeriksaan" aria-controls="pemeriksaan" role="tab" data-toggle="tab"><b>Nama Pemeriksa</b></a></li>
            <li role="presentation"><a href="#tarif-lab" aria-controls="tarif-lab" role="tab" data-toggle="tab"><b>Tarif Labolatorium</b></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active row" id="pemeriksaan">
                <div class="col-sm-3 col-md-3">
                    <p><u>Pemeriksaan</u></p>
                    <div class="table-responsive pemeriksaan-tarif">
                        <table class="table table-sm table pemeriksaan-tarif">
                            <thead>
                                <tr class="success">
                                    <th style="width:5%;">Kode</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($group_lab as $key => $l):?>
                                    <?php 
                                    // echo '<pre>'; print_r($l); ?>
                                    <tr data-id='<?=$l->KDGroup ?>' data-json='<?= json_encode($l) ?>'>
                                        <td><?=@$l->KDGroup?></td>
                                        <td><a href="#" id="<?=@$l->KDGroup?>" onclick="load_detail(this.id)"><?=@$l->NmGroup?></a></td>
                                    </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade row" id="tarif-lab">
                <div id="halaman" class="col-sm-3 col-md-3">
                        <label for="KDDetail">Pemeriksaan</label>
                        <select id="KDDetail" name="KDDetail" class="form-control input-sm" required style="width:100%;">
                            <option value="">-= Cari Pemeriksaan =-</option>
                        </select>
                        <br>
                        <button id="btnCari" class="btn btn-info btn-sm btn-round"><i class="fa fa-search"></i></button>
                        <button id="btnReset" class="btn btn-warning btn-sm btn-round"><i class="fa fa-refresh"></i></button>
                        <br>
                        <br>
                    <p><u>Keterangan</u></p>
                    <div class="table-responsive pemeriksaan-tarif">
                        <table class="table table-sm table pemeriksaan-tarif">
                            <thead>
                                <tr class="success">
                                    <th>Kode</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pemeriksaan as $key => $l):?>
                                    <tr data-id='<?=$l->KDDetail ?>' data-json='<?= json_encode($l) ?>'>
                                        <td><p class="nama-tarif"><?=@$l->KDDetail?></p></td>
                                        <td><a href="#" id="<?=@$l->KDDetail?>" onclick="load_tarif(this.id)"><?=@$l->NMDetail?></a></td>
                                    </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-9 col-md-9">
                    <p><u>Detail Tarif</u></p>
                    <div class="detail-tarif">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        
    });

    window.load_tarif = function(node)
    {
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/show_tarif') ?>",
            data:{kddetail:node},
            dataType:'html',
            beforeSend:function(){
                $('.detail-tarif').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(resp){
                // $('#btnBackGroup').show().fadeIn(3000);
                $('.detail-tarif').html(resp);
                $('#create-tarif-lab [name=kddetail]').val(node);
            }
        });
    }

    $("#btnCari").on("click",function(){
        Kddetail = $("#KDDetail").val();
        load_tarif(0,Kddetail);
    });

    $("#btnReset").on("click",function(){
        $("#KDDetail").val(null).trigger('change');
        load_tarif(0);
    });

    $("#KDDetail").select2({
        allowClear: true,
        ajax: {
            type:"POST",
            url: "<?=base_url('Api/pemeriksaan')?>",
            dataType: 'json',
            data: function(params) {
                return {
                    q: params.term,
                    offset: (params.page || 0) * 20
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data,
                    pagination: {
                        more: data.has_next
                    }
                }
            },
        },
        templateResult: function(item) {
            //console.log(item);
            if(item.loading) {
                return item.text;
            }
            return `
                <p>
                    <small>${item.KDDetail}</small><br>
                    ${item.NMDetail}<br>
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

    
   
</script>
