<div id="group-pemeriksaan">
    <div class="table-wrapper-scroll-y my-custom-scrollbar masuk">
        <table class="table table-bordered table-striped mb-0" id="pemeriksaan-lab">
            <thead>
                <tr class="info">
                    <th>Kode Group</th>
                    <th>Pemeriksaan</th>
                    <th>Satuan</th>
                    <th>Set Awal Pria</th>
                    <th>Set Akhir Pria</th>
                    <th>Set Awal Wanita</th>
                    <th>Set Awal Wanita</th>
                    <th>Nilai Normal Pria</th>
                    <th>Nilai Normal Wanita</th>
                    <th><button type="button" class="btn btn-success btn-xs btn-round" data-toggle="modal" data-target=".create-pemeriksaan-lab"><i class="fa fa-plus"></i></button></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pemeriksaan as $key => $l):?>
                <tr data-id='<?=$l->KDDetail ?>' data-json='<?= json_encode($l) ?>'>
                    <td><?=@$l->KDDetail?></td>
                    <td><a href="#" id="<?=@$l->KDDetail?>" onclick="load_pembanding(this.id)"><?=@$l->NMDetail?></td>
                    <td><?=@$l->Satuan?></td>
                    <td><?=@$l->NNAwalPria?></td>
                    <td><?=@$l->NNAkhirPria?></td>
                    <td><?=@$l->NNAwalWanita?></td>
                    <td><?=@$l->NNAkhirWanita?></td>
                    <td><?=@$l->NilaiNormalPria?></td>
                    <td><?=@$l->NilaiNormalWanita?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-xs btn-round btn-edit-pemeriksaan"><i class="fa fa-pencil"></i></button>
                        <a href="#" class="btn btn-xs btn-danger btndeleteSubPemeriksaan" onclick="delete_sub_pemeriksaan(this.id)" id="<?= @$l->KDDetail ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade edit-pemeriksaan-lab" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="edit-pemeriksaan-lab">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pemeriksaan Laboraturium</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kode:</label><br>
                        <input type="text" id="kddetail" name="kddetail" readonly>
                        <span>Kode Inputan</span>
                        <input type="text" id="kdmapping" name="kdmapping">
                        <span>Param  LIS</span>
                        <input type="text" id="param_lis" name="param_lis">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pemeriksaan:</label>
                        <input type="text" class="form-control" id="detail" name="detail">
                    </div>
                    <div class="form-group" style="border: 1px solid grey; border-radius: 5px; padding: 5px;">
                        <label for="message-text" class="col-form-label">Nilai Normal Pria:</label>
                        <input type="text" class="form-control" id="nilainormalpria" name="nilainormalpria">
                        <span>Nilai Awal Pria</span>
                        <input type="text" class="" id="NilaiAwalPria" name="NilaiAwalPria">
                        <span>S/D</span>
                        <input type="text" class="" id="NilaiAkhirPria" name="NilaiAkhirPria">
                    </div>
                    <div class="form-group" style="border: 1px solid grey; border-radius: 5px; padding: 5px;">
                        <label for="message-text" class="col-form-label">Nilai Normal Wanita:</label>
                        <input type="text" class="form-control" id="nilainormalwanita" name="nilainormalwanita">
                        <span>Nilai Awal Wanita</span>
                        <input type="text" class="" id="NilaiAwalWanita" name="NilaiAwalWanita">
                        <span>S/D</span>
                        <input type="text" class="" id="NilaiAkhirWanita" name="NilaiAkhirWanita">
                    </div>
                    <div class="form-group" style="border: 1px solid grey; border-radius: 5px; padding: 5px;">
                        <label for="message-text" class="col-form-label">Nilai Kritis:</label>
                        <input type="text" class="form-control" id="nilaikritis" name="nilaikritis">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pediatric:</label>
                        <div class="radio">
                            <input name="select_bayi" type="checkbox" onclick="selects_bayip()" id="select_bayi" value="1" />
                            <label for="select_bayi">YA</label>
                        </div>
                    </div>
                    <div class="form-group" id="form_bayi_p" style="border: 1px solid grey; border-radius: 5px; padding: 5px; display: none;" >
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 0-1 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi0_1harip" name="nilainormalbayi0_1harip">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 2-4 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi2_4harip" name="nilainormalbayi2_4harip">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 5-7 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi5_7harip" name="nilainormalbayi5_7harip">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 8-14 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi8_14harip" name="nilainormalbayi8_14harip">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 15-30 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi15_30harip" name="nilainormalbayi15_30harip">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 1-2 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi1_2bulanp" name="nilainormalbayi1_2bulanp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 3-5 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi3_5bulanp" name="nilainormalbayi3_5bulanp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 6-11 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi6_11bulanp" name="nilainormalbayi6_11bulanp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 1-3 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi1_3tahunp" name="nilainormalbayi1_3tahunp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 4-7 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi4_7tahunp" name="nilainormalbayi4_7tahunp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 8-13 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi8_13tahunp" name="nilainormalbayi8_13tahunp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Satuan:</label>
                        <input type="text" class="form-control" id="satuan" name="satuan">
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input name="KdInput" type="radio" class="ace" value="1"/>
                                <span class="lbl">&nbsp; Text</span>
                            </label>
                            <label>
                                <input name="KdInput" type="radio" class="ace" value="2"/>
                                <span class="lbl">&nbsp; Pilihan</span>
                            </label>
                            <label>
                                <input name="KdInput" type="radio" class="ace" value="3"/>
                                <span class="lbl">&nbsp; Text Area</span>
                            </label>
                            <label>
                                <input name="KdInput" type="radio" class="ace" value="4"/>
                                <span class="lbl">&nbsp; Kosong/Tidak diisi</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs btn-round" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-xs btn-round" id="btnPemeriksaanEdit">Ubah</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade create-pemeriksaan-lab" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="create-pemeriksaan-lab">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemeriksaan Laboraturium Baru</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pemeriksaan:</label>
                        <input type="hidden" class="form-control" id="kodegroup_input" name="kodegroup_input">
                        <input type="text" class="form-control" id="detail_input" name="detail_input">
                        <span>Kode Inputan</span>
                        <input type="text" id="kdmapping_input" name="kdmapping_input">
                        <span>Param LIS</span>
                        <input type="text" id="param_lis_input" name="param_lis_input">
                    </div>
                    <div class="form-group" style="border: 1px solid grey; border-radius: 5px; padding: 5px;">
                        <label for="message-text" class="col-form-label">Nilai Normal Pria:</label>
                        <input type="text" class="form-control" id="nilainormalpria_input" name="nilainormalpria_input">
                        <span>Nilai Awal Pria</span>
                        <input type="text" class="" id="NilaiAwalPria_input" name="NilaiAwalPria_input">
                        <span>S/D</span>
                        <input type="text" class="" id="NilaiAkhirPria_input" name="NilaiAkhirPria_input">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Nilai Normal Wanita:</label>
                        <input type="text" class="form-control" id="nilainormalwanita_input" name="nilainormalwanita_input">
                        <span>Nilai Awal Wanita</span>
                        <input type="text" class="" id="NilaiAwalWanita_input" name="NilaiAwalWanita_input">
                        <span>S/D</span>
                        <input type="text" class="" id="NilaiAkhirWanita_input" name="NilaiAkhirWanita_input">
                    </div>
                    <div class="form-group" style="border: 1px solid grey; border-radius: 5px; padding: 5px;">
                        <label for="message-text" class="col-form-label">Nilai Kritis:</label>
                        <input type="text" class="form-control" id="nilaikritis_input" name="nilaikritis_input">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pediatric:</label>
                            <input name="select_bayi" type="checkbox" class="form-control" onclick="selects_bayip()" id="select_bayi" value="1" />
                            <label for="select_bayi">YA</label>
                        </div>
                    </div>
                    <div class="form-group" id="form_bayi_p" style="border: 1px solid grey; border-radius: 5px; padding: 5px; display: none;" >
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 0-1 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi0_1hari_inputp" name="nilainormalbayi0_1hari_inputp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 2-4 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi2_4hari_inputp" name="nilainormalbayi2_4hari_inputp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 5-7 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi5_7hari_inputp" name="nilainormalbayi5_7hari_inputp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 8-14 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi8_14hari_inputp" name="nilainormalbayi8_14hari_inputp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 15-30 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi15_30hari_inputp" name="nilainormalbayi15_30hari_inputp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 1-2 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi1_2bulan_inputp" name="nilainormalbayi1_2bulan_inputp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 3-5 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi3_5bulan_inputp" name="nilainormalbayi3_5bulan_inputp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 6-11 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi6_11bulan_inputp" name="nilainormalbayi6_11bulan_inputp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 1-3 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi1_3tahun_inputp" name="nilainormalbayi1_3tahun_inputp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 4-7 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi4_7tahun_inputp" name="nilainormalbayi4_7tahun_inputp">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 8-13 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi8_13tahun_inputp" name="nilainormalbayi8_13tahun_inputp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Satuan:</label>
                        <input type="text" class="form-control" id="satuan_input" name="satuan_input">
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input name="KdInput_input" type="radio" class="ace" value="1" checked />
                                <span class="lbl">&nbsp; Text</span>
                            </label>
                            <label>
                                <input name="KdInput_input" type="radio" class="ace" value="2"/>
                                <span class="lbl">&nbsp; Pilihan</span>
                            </label>
                            <label>
                                <input name="KdInput_input" type="radio" class="ace" value="3"/>
                                <span class="lbl">&nbsp; Text Area</span>
                            </label>
                            <label>
                                <input name="KdInput_input" type="radio" class="ace" value="4"/>
                                <span class="lbl">&nbsp; Kosong/Tidak diisi</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs btn-round" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-xs btn-round" id="btnPemeriksaanCreate">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#pemeriksaan-lab').on("click", '.btn-edit-pemeriksaan', function(){
        let button = $(this);
        let tr = button.parents('tr');
        let data = JSON.parse(tr.attr('data-json'));
        console.log(data);
        $('#create-pemeriksaan-lab [name=kodegroup_input]').val(data.KdGroup);
        $('#edit-pemeriksaan-lab [name=kddetail]').val(data.KDDetail);
        $('#edit-pemeriksaan-lab [name=detail]').val(data.NMDetail);
        $('#edit-pemeriksaan-lab [name=satuan]').val(data.Satuan);
        $('#edit-pemeriksaan-lab [name=nilaikritis]').val(data.nilai_kritis);
        $('#edit-pemeriksaan-lab [name=kdmapping]').val(data.KdMapping);
        $('#edit-pemeriksaan-lab [name=param_lis]').val(data.param_lis);
        $('#edit-pemeriksaan-lab [name=nilainormalpria]').val(data.NilaiNormalPria);
        $('#edit-pemeriksaan-lab [name=NilaiAwalPria]').val(data.NNAwalPria);
        $('#edit-pemeriksaan-lab [name=NilaiAkhirPria]').val(data.NNAkhirPria);
        $('#edit-pemeriksaan-lab [name=nilainormalwanita]').val(data.NilaiNormalWanita);
        $('#edit-pemeriksaan-lab [name=NilaiAwalWanita]').val(data.NNAwalWanita);
        $('#edit-pemeriksaan-lab [name=NilaiAkhirWanita]').val(data.NNAkhirWanita);

        $('#edit-pemeriksaan-lab [name=nilainormalbayi0_1harip]').val(data.NN0_1D);
        $('#edit-pemeriksaan-lab [name=nilainormalbayi2_4harip]').val(data.NN2_4D);
        $('#edit-pemeriksaan-lab [name=nilainormalbayi5_7harip]').val(data.NN5_7D);
        $('#edit-pemeriksaan-lab [name=nilainormalbayi8_14harip]').val(data.NN8_14D);
        $('#edit-pemeriksaan-lab [name=nilainormalbayi15_30harip]').val(data.NN15_30D);
        $('#edit-pemeriksaan-lab [name=nilainormalbayi1_2bulanp]').val(data.NN1_2M);
        $('#edit-pemeriksaan-lab [name=nilainormalbayi3_5bulanp]').val(data.NN3_5M);
        $('#edit-pemeriksaan-lab [name=nilainormalbayi6_11bulanp]').val(data.NN6_11M);
        $('#edit-pemeriksaan-lab [name=nilainormalbayi1_3tahunp]').val(data.NN1_3Y);
        $('#edit-pemeriksaan-lab [name=nilainormalbayi4_7tahunp]').val(data.NN4_7Y);
        $('#edit-pemeriksaan-lab [name=nilainormalbayi8_13tahunp]').val(data.NN8_13Y);
        if (data.KdInput != '') {
            $("[name=KdInput][value=" + data.KdInput + "]").attr('checked', 'checked');
            // $('#edit-pemeriksaan-lab [name=KdInput]:checked').val(data.KdInput);
        }
        $('#edit-pemeriksaan-lab').modal('toggle');
    });

    $('#btnPemeriksaanCreate').on('click', function(ev){
        ev.preventDefault();
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/pemeriksaan_post') ?>",
            data:{
                kdgroup: $('#kodegroup_input').val(),
                detail: $('#detail_input').val(),
                satuan: $('#satuan_input').val(),
                nilai_kritis: $('#nilaikritis').val(),
                kdinput: $('input[name=KdInput_input]:checked').val(),
                nilainormalpria: $('#nilainormalpria_input').val(),
                nnawalpria: $('#NilaiAwalPria_input').val(),
                nnakhirpria: $('#NilaiAkhirPria_input').val(),
                nilainormalwanita: $('#nilainormalwanita_input').val(),
                nnawalwanita: $('#NilaiAwalWanita_input').val(),
                nnakhirwanita: $('#NilaiAkhirWanita_input').val(),
                kdmapping: $('#kdmapping_input').val(),
                param_lis: $('#param_lis_input').val(),
                NN0_1D: $('#nilainormalbayi0_1hari_inputp').val(),
                NN2_4D: $('#nilainormalbayi2_4hari_inputp').val(),
                NN5_7D: $('#nilainormalbayi5_7hari_inputp').val(),
                NN8_14D: $('#nilainormalbayi8_14hari_inputp').val(),
                NN15_30D: $('#nilainormalbayi15_30hari_inputp').val(),
                NN1_2M: $('#nilainormalbayi1_2bulan_inputp').val(),
                NN3_5M: $('#nilainormalbayi3_5bulan_inputp').val(),
                NN6_11M: $('#nilainormalbayi6_11bulan_inputp').val(),
                NN1_3Y: $('#nilainormalbayi1_3tahun_inputp').val(),
                NN4_7Y: $('#nilainormalbayi4_7tahun_inputp').val(),
                NN8_13Y: $('#nilainormalbayi8_13tahun_inputp').val()
            },
            success:function(resp){
                console.log(resp);
                if (resp.insert) {
                    load_detail(resp.kode);
                    alert(resp.message);
                } else{
                    alert(resp.message);
                }
            }
        });
    });

    $('#btnPemeriksaanEdit').on('click', function(ev){
        ev.preventDefault();
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/pemeriksaan_update') ?>",
            data:{
                id: $('#kddetail').val(),
                kdgroup: $('#kodegroup_input').val(),
                detail: $('#detail').val(),
                satuan: $('#satuan').val(),
                nilai_kritis: $('#nilaikritis').val(),
                kdinput: $('input[name=KdInput]:checked').val(),
                nilainormalpria: $('#nilainormalpria').val(),
                nnawalpria: $('#NilaiAwalPria').val(),
                nnakhirpria: $('#NilaiAkhirPria').val(),
                nilainormalwanita: $('#nilainormalwanita').val(),
                nnawalwanita: $('#NilaiAwalWanita').val(),
                nnakhirwanita: $('#NilaiAkhirWanita').val(),
                param_lis: $('#param_lis').val(),
                kdmapping: $('#kdmapping').val(),
                NN0_1D: $('#nilainormalbayi0_1harip').val(),
                NN2_4D: $('#nilainormalbayi2_4harip').val(),
                NN5_7D: $('#nilainormalbayi5_7harip').val(),
                NN8_14D: $('#nilainormalbayi8_14harip').val(),
                NN15_30D: $('#nilainormalbayi15_30harip').val(),
                NN1_2M: $('#nilainormalbayi1_2bulanp').val(),
                NN3_5M: $('#nilainormalbayi3_5bulanp').val(),
                NN6_11M: $('#nilainormalbayi6_11bulanp').val(),
                NN1_3Y: $('#nilainormalbayi1_3tahunp').val(),
                NN4_7Y: $('#nilainormalbayi4_7tahunp').val(),
                NN8_13Y: $('#nilainormalbayi8_13tahunp').val()
            },
            success:function(resp){
                console.log(resp);
                if (resp.insert) {
                    alert(resp.message);
                } else{
                    alert(resp.message);
                }
            }
        });
    });

    function selects_bayip() {
      // Get the checkbox
      var checkBox = document.getElementById("select_bayi");
      // Get the output text
      var text = document.getElementById("form_bayi_p");

      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }

    function delete_sub_pemeriksaan(kddetail) {
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/delete_sub_pemeriksaan') ?>",
            data:{
                kddetail: kddetail
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