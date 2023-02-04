<style type="text/css">
    .tab-table-custom {
        max-height: 500px;
        overflow: auto;
        background-color: transparent;
    }

    .nama-tarif {
        font-size: 9px;
    }
</style>
<div class="row">
<h3>Pemeriksaan Labolatorium  <a href="<?php echo base_url('mastertarif/hirarki');?>"><i class="fa fa-eye"></i></a></h3>
    <div class="col-xs-3 col-sm-3">
        <p><u>Group Labolatorium</u></p>
        <div class="table-responsive tab-table-custom">
            <table class="table table-bordered table-striped mb-0" id="group-lab">
                <thead>
                    <tr class="success">
                        <th style="width:5%;">Kode</th>
                        <th>Keterangan</th>
                        <th><button type="button" class="btn btn-success btn-xs btn-round" data-toggle="modal" data-target=".create-group-lab"><i class="fa fa-plus"></i></button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($group_lab as $key => $l):?>
                        <tr data-id='<?=$l->KDGroup ?>' data-json='<?= json_encode($l) ?>'>
                            <td><?=@$l->KDGroup?></td>
                            <td><a href="#" id="<?=@$l->KDGroup?>" onclick="load_detail(this.id)"><?=@$l->NmGroup?></a></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs btn-round btn-edit"><i class="fa fa-pencil"></i></button>
                                <a href="#" class="btn btn-xs btn-danger btnDeleteGroup" onclick="delete_group_pemeriksaan(this.id)" id="<?= @$l->KDGroup ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
    <p><u>Sub Pemeriksaan</u></p>
    <div class="col-xs-9 col-sm-9">
        <div id="target-pemeriksaan-lab"></div>
    </div>
</div>
<div class="row">
    <p><u>Detail Pemeriksaan</u></p>
    <div class="col-md-12 batas-pembanding">
        <div id="target-pembanding-lab"></div>
    </div>
</div>

<div class="modal fade edit-group-lab" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="edit-group-lab">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Group Labolatorium</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kode:</label>
                        <input type="text" class="form-control col-sm-3" id="KdGroup" name="KdGroup" readonly>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Keterangan:</label>
                        <input type="text" class="form-control" id="NmGroup" name="NmGroup">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs btn-round" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-xs btn-round" id="btnGroupEdit">Ubah</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade create-group-lab" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Group Labolatorium</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Keterangan:</label>
                        <input type="text" class="form-control" id="nmgroup_plus">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs btn-round" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-xs btn-round" id="btnGroupNew">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#dtVerticalScrollExample').DataTable({
            "scrollY": "50vh"
        });
        $('.dataTables_length').addClass('bs-select');
    });

    function load_detail(node)
    {
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/lab_pemeriksaan') ?>",
            data:{kdpemeriksaan:node},
            dataType:'html',
            beforeSend:function(){
                $('target-pemeriksaan-lab').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(resp){
                // $('#btnBackGroup').show().fadeIn(3000);
                $('#target-pemeriksaan-lab').html(resp);
                $('#create-pemeriksaan-lab [name=kodegroup_input]').val(node);
            }
        });
    }

    function load_pembanding(node)
    {
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/lab_pembanding') ?>",
            data:{kdpembanding:node},
            dataType:'html',
            beforeSend:function(){
                $('target-pembanding-lab').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(resp){
                // $('#btnBackGroup').show().fadeIn(3000);
                $('#target-pembanding-lab').html(resp);
                $('#create-pembanding-lab [name=kodedetail_input]').val(node);
            }
        });
    }

    $('#group-lab').on("click", '.btn-edit', function(){
        let button = $(this);
        let tr = button.parents('tr');
        let data = JSON.parse(tr.attr('data-json'));
        console.log(data);
        $('#edit-group-lab [name=KdGroup]').val(data.KDGroup);
        $('#edit-group-lab [name=NmGroup]').val(data.NmGroup);
        $('#edit-group-lab').modal('toggle');
    });

    $('#btnGroupNew').on('click', function(ev){
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/lab_group_post') ?>",
            data:{NmGroup: $('#nmgroup_plus').val()},
            success:function(resp){
                console.log(resp);
                if (resp.insert) {
                    alert(resp.message);
                    window.location.reload();
                } else{
                    alert(resp.message);
                }
            }
        });
    });

    $('#btnGroupEdit').on('click', function(ev){
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/lab_group_update') ?>",
            data:{id: $('#KdGroup').val(), NmGroup: $('#NmGroup').val()},
            success:function(resp){
                console.log(resp);
                if (resp.cek) {
                    alert(resp.message);
                    window.location.reload();
                } else{
                    alert(resp.message);
                }
            }
        });
    });

    function delete_group_pemeriksaan(kdgroup) {
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/delete_group_pemeriksaan') ?>",
            data:{
                kdgroup: kdgroup
            },
            success:function(resp){
                console.log(resp);
                if (resp.status) {
                    alert(resp.message);
                } else{
                    alert(resp.message);
                }
            }
        });
    }
</script>
