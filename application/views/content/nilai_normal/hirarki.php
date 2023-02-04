<div class="row">
<h3>Pemeriksaan Labolatorium</h3>
    <div class="col-xs-12 col-sm-12">
        <p><u>Group Labolatorium</u></p>
        <div class="table-wrapper-scroll-y  masuk">
            <table class="table table-bordered table-striped mb-0" id="group-lab">
                <thead>
                    <tr class="success">
                        <th style="width:20%;">Pemeriksa</th>
                        <th>Hasil</th>
						<th>Satuan</th>
						<th>Nilai Rujukan</th>
                    </tr>
                </thead>
                <tbody>
					<?php foreach ($groups as $group):?>
						<tr>
							<td><?php echo $group->NmGroup?></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php if($group->pemeriksas):?>
							<?php foreach ($group->pemeriksas as $pemeriksa):?>
								<tr>
									<td><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', 2). $pemeriksa->NMDetail?></td>
									<td><?php echo $pemeriksa->NilaiNormalPria;?></td>
									<td><?php echo $pemeriksa->Satuan;?></td>
									<td>P : <?php echo $pemeriksa->NNAwalPria . ' > '.$pemeriksa->NNAkhirPria;?> W: <?php echo $pemeriksa->NNAwalWanita . ' > '.$pemeriksa->NNAkhirWanita;?> <?php echo $pemeriksa->Satuan;?></td>
								</tr>
								<?php if($pemeriksa->details):?>
									<?php foreach($pemeriksa->details as $detail):?>
										<tr>
											<td><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', 4). $detail->NamaDetail?></td>
											<td><?php echo $detail->NNAwalPria;?></td>
											<td><?php echo $detail->Satuan;?></td>
											<td>P : <?php echo $detail->NNAwalPria . ' > '.$detail->NNAkhirPria;?> W: <?php echo $detail->NNAwalWanita . ' > '.$detail->NNAkhirWanita;?> <?php echo $detail->Satuan;?></td>
										</tr>
									<?php endforeach;?>
								<?php endif;?>
							<?php endforeach?>
						<?php endif;?>
					<?php endforeach;?>
                </tbody>
            </table>
        </div>
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
