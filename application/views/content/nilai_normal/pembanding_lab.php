<div id="group-pembanding">
    <div class="table-wrapper-scroll-y my-custom-scrollbar-pembanding masuk">
        <table class="table table-bordered table-striped mb-0" id="pembanding-lab">
            <thead>
                <tr class="info">
                    <th>Kode</th>
                    <th>Pemeriksaan</th>
                    <th>Satuan</th>
                    <th>Set Awal Pria</th>
                    <th>Set Akhir Pria</th>
                    <th>Set Awal Wanita</th>
                    <th>Set Awal Wanita</th>
                    <th>Nilai Normal Pria</th>
                    <th>Nilai Normal Wanita</th>
                    <th><button type="button" class="btn btn-success btn-xs btn-round" data-toggle="modal" data-target=".create-pembanding-lab"><i class="fa fa-plus"></i></button></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pembanding as $key => $l):?>
                <tr data-id='<?=$l->KodeDetail ?>' data-json='<?= json_encode($l) ?>'>
                    <td><?=@$l->KodeDetail?></td>
                    <td><?=@$l->NamaDetail?></td>
                    <td><?=@$l->Satuan?></td>
                    <td><?=@$l->NNAwalPria?></td>
                    <td><?=@$l->NNAkhirPria?></td>
                    <td><?=@$l->NNAwalWanita?></td>
                    <td><?=@$l->NNAkhirWanita?></td>
                    <td><?=@$l->NilaiNormalPria?></td>
                    <td><?=@$l->NilaiNormalWanita?></td>
                    <td><button type="button" class="btn btn-primary btn-xs btn-round btn-edit-pembanding"><i class="fa fa-pencil"></i></button>
                        <a href="#" class="btn btn-xs btn-danger btndeletePemeriksaan" onclick="delete_detail_pemeriksaan(this.id)" id="<?= @$l->KodeDetail ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade edit-pembanding-lab" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="edit-pembanding-lab">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pembanding Laboraturium</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kode:</label>
                        <input type="text" class="form-control col-sm-3" id="kodedetail" name="kodedetail" readonly>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pemeriksaan:</label>
                        <input type="text" class="form-control" id="namadetail" name="namadetail">
                    </div>
                    <div class="form-group" style="border: 1px solid grey; border-radius: 5px; padding: 5px;">
                        <label for="message-text" class="col-form-label">Nilai Normal Pria:</label>
                        <input type="text" class="form-control" id="nilainormalpriapembanding" name="nilainormalpriapembanding">
                        <span>Nilai Awal Pria</span>
                        <input type="number" class="" id="NilaiAwalPriaPembanding" name="NilaiAwalPriaPembanding">
                        <span>S/D</span>
                        <input type="number" class="" id="NilaiAkhirPriaPembanding" name="NilaiAkhirPriaPembanding">
                    </div>
                    <div class="form-group" style="border: 1px solid grey; border-radius: 5px; padding: 5px;">
                        <label for="message-text" class="col-form-label">Nilai Normal Wanita:</label>
                        <input type="text" class="form-control" id="nilainormalwanitapembanding" name="nilainormalwanitapembanding">
                        <span>Nilai Awal Wanita</span>
                        <input type="number" class="" id="NilaiAwalWanitaPembanding" name="NilaiAwalWanitaPembanding">
                        <span>S/D</span>
                        <input type="number" class="" id="NilaiAkhirWanitaPembanding" name="NilaiAkhirWanitaPembanding">
                    </div>
                    
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pediatric:</label>
                        <div class="radio">
                            <input name="select_bayi" type="checkbox" onclick="selects_bayi()" id="select_bayi" value="1" />
                            <label for="select_bayi">YA</label>
                        </div>
                    </div>
                    <div class="form-group" id="form_bayi" style="border: 1px solid grey; border-radius: 5px; padding: 5px; display: none;" >
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 0-1 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi0_1hari" name="nilainormalbayi0_1hari">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 2-4 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi2_4hari" name="nilainormalbayi2_4hari">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 5-7 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi5_7hari" name="nilainormalbayi5_7hari">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 8-14 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi8_14hari" name="nilainormalbayi8_14hari">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 15-30 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi15_30hari" name="nilainormalbayi15_30hari">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 1-2 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi1_2bulan" name="nilainormalbayi1_2bulan">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 3-5 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi3_5bulan" name="nilainormalbayi3_5bulan">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 6-11 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi6_11bulan" name="nilainormalbayi6_11bulan">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 1-3 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi1_3tahun" name="nilainormalbayi1_3tahun">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 4-7 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi4_7tahun" name="nilainormalbayi4_7tahun">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 8-13 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi8_13tahun" name="nilainormalbayi8_13tahun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Satuan:</label>
                        <input type="text" class="form-control" id="satuanpembanding" name="satuanpembanding">
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input name="KdInputPembanding" type="radio" class="ace" value="1"/>
                                <span class="lbl">&nbsp; Text</span>
                            </label>
                            <label>
                                <input name="KdInputPembanding" type="radio" class="ace" value="2"/>
                                <span class="lbl">&nbsp; Pilihan</span>
                            </label>
                            <label>
                                <input name="KdInputPembanding" type="radio" class="ace" value="3"/>
                                <span class="lbl">&nbsp; Text Area</span>
                            </label>
                            <label>
                                <input name="KdInputPembanding" type="radio" class="ace" value="4"/>
                                <span class="lbl">&nbsp; Kosong/Tidak diisi</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs btn-round" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-xs btn-round" id="btnPembandingEdit">Ubah</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade create-pembanding-lab" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="create-pembanding-lab">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembanding Laboraturium Baru</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pemeriksaan:</label>
                        <input type="hidden" class="form-control" id="kodedetail_input" name="kodedetail_input">
                        <input type="text" class="form-control" id="detailpembanding_input" name="detailpembanding_input">
                    </div>
                    <div class="form-group" style="border: 1px solid grey; border-radius: 5px; padding: 5px;">
                        <label for="message-text" class="col-form-label">Nilai Normal Pria:</label>
                        <input type="text" class="form-control" id="nilainormalpriapembanding_input" name="nilainormalpriapembanding_input">
                        <span>Nilai Awal Pria</span>
                        <input type="number" class="" id="NilaiAwalPriaPembanding_input" name="NilaiAwalPriaPembanding_input">
                        <span>S/D</span>
                        <input type="number" class="" id="NilaiAkhirPriaPembanding_input" name="NilaiAkhirPriaPembanding_input">
                    </div>
                    <div class="form-group" style="border: 1px solid grey; border-radius: 5px; padding: 5px;">
                        <label for="message-text" class="col-form-label">Nilai Normal Wanita:</label>
                        <input type="text" class="form-control" id="nilainormalwanitapembanding_input" name="nilainormalwanitapembanding_input">
                        <span>Nilai Awal Wanita</span>
                        <input type="number" class="" id="NilaiAwalWanitaPembanding_input" name="NilaiAwalWanitaPembanding_input">
                        <span>S/D</span>
                        <input type="number" class="" id="NilaiAkhirWanitaPembanding_input" name="NilaiAkhirWanitaPembanding_input">
                    </div>
                    
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Pediatric:</label>
                            <input name="select_bayi" type="checkbox" class="form-control" onclick="selects_bayi()" id="select_bayi" value="1" />
                            <label for="select_bayi">YA</label>
                        </div>
                    </div>
                    <div class="form-group" id="form_bayi" style="border: 1px solid grey; border-radius: 5px; padding: 5px; display: none;" >
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 0-1 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi0_1hari_input" name="nilainormalbayi0_1hari_input">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 2-4 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi2_4hari_input" name="nilainormalbayi2_4hari_input">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 5-7 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi5_7hari_input" name="nilainormalbayi5_7hari_input">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 8-14 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi8_14hari_input" name="nilainormalbayi8_14hari_input">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 15-30 Hari:</label>
                            <input type="text" class="form-control" id="nilainormalbayi15_30hari_input" name="nilainormalbayi15_30hari_input">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 1-2 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi1_2bulan_input" name="nilainormalbayi1_2bulan_input">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 3-5 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi3_5bulan_input" name="nilainormalbayi3_5bulan_input">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 6-11 Bulan:</label>
                            <input type="text" class="form-control" id="nilainormalbayi6_11bulan_input" name="nilainormalbayi6_11bulan_input">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 1-3 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi1_3tahun_input" name="nilainormalbayi1_3tahun_input">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 4-7 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi4_7tahun_input" name="nilainormalbayi4_7tahun_input">
                        </div>
                        <div>
                            <label for="message-text" class="col-form-label">Nilai Normal Bayi 8-13 Tahun:</label>
                            <input type="text" class="form-control" id="nilainormalbayi8_13tahun_input" name="nilainormalbayi8_13tahun_input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Satuan:</label>
                        <input type="text" class="form-control" id="satuanpembanding_input" name="satuanpembanding_input">
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input name="KdInputPembanding_input" type="radio" class="ace" value="1" checked />
                                <span class="lbl">&nbsp; Text</span>
                            </label>
                            <label>
                                <input name="KdInputPembanding_input" type="radio" class="ace" value="2"/>
                                <span class="lbl">&nbsp; Pilihan</span>
                            </label>
                            <label>
                                <input name="KdInputPembanding_input" type="radio" class="ace" value="3"/>
                                <span class="lbl">&nbsp; Text Area</span>
                            </label>
                            <label>
                                <input name="KdInputPembanding_input" type="radio" class="ace" value="4"/>
                                <span class="lbl">&nbsp; Kosong/Tidak diisi</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs btn-round" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-xs btn-round" id="btnPembandingCreate">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#pembanding-lab').on("click", '.btn-edit-pembanding', function(){
        let button = $(this);
        let tr = button.parents('tr');
        let data = JSON.parse(tr.attr('data-json'));
        console.log(data);
        $('#edit-pembanding-lab [name=kodedetail]').val(data.KodeDetail);
        $('#edit-pembanding-lab [name=namadetail]').val(data.NamaDetail);
        $('#edit-pembanding-lab [name=satuanpembanding]').val(data.Satuan);
        $('#edit-pembanding-lab [name=nilainormalpriapembanding]').val(data.NilaiNormalPria);
        $('#edit-pembanding-lab [name=NilaiAwalPriaPembanding]').val(data.NNAwalPria);
        $('#edit-pembanding-lab [name=NilaiAkhirPriaPembanding]').val(data.NNAkhirPria);
        $('#edit-pembanding-lab [name=nilainormalwanitapembanding]').val(data.NilaiNormalWanita);
        $('#edit-pembanding-lab [name=NilaiAwalWanitaPembanding]').val(data.NNAwalWanita);
        $('#edit-pembanding-lab [name=NilaiAkhirWanitaPembanding]').val(data.NNAkhirWanita);
        $('#edit-pembanding-lab [name=nilainormalbayi0_1hari]').val(data.NN0_1D);
        $('#edit-pembanding-lab [name=nilainormalbayi2_4hari]').val(data.NN2_4D);
        $('#edit-pembanding-lab [name=nilainormalbayi5_7hari]').val(data.NN5_7D);
        $('#edit-pembanding-lab [name=nilainormalbayi8_14hari]').val(data.NN8_14D);
        $('#edit-pembanding-lab [name=nilainormalbayi15_30hari]').val(data.NN15_30D);
        $('#edit-pembanding-lab [name=nilainormalbayi1_2bulan]').val(data.NN1_2M);
        $('#edit-pembanding-lab [name=nilainormalbayi3_5bulan]').val(data.NN3_5M);
        $('#edit-pembanding-lab [name=nilainormalbayi6_11bulan]').val(data.NN6_11M);
        $('#edit-pembanding-lab [name=nilainormalbayi1_3tahun]').val(data.NN1_3Y);
        $('#edit-pembanding-lab [name=nilainormalbayi4_7tahun]').val(data.NN4_7Y);
        $('#edit-pembanding-lab [name=nilainormalbayi8_13tahun]').val(data.NN8_13Y);
        if (data.KdInput != '') {
            $("input[name=KdInputPembanding][value=" + data.KdInput + "]").attr('checked', 'checked');
            // $('#edit-pemeriksaan-lab [name=KdInputPembanding]:checked').val(data.KdInput);
        }
        $('#edit-pembanding-lab').modal('toggle');
    });

   

    $('#btnPembandingCreate').on('click', function(ev){
        ev.preventDefault();
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/pembandingan_post') ?>",
            data:{
                kddetail: $('#kodedetail_input').val(),
                detail: $('#detailpembanding_input').val(),
                satuan: $('#satuanpembanding_input').val(),
                kdinput: $('input[name=KdInputPembanding_input]:checked').val(),
                nilainormalpria: $('#nilainormalpriapembanding_input').val(),
                nnawalpria: $('#NilaiAwalPriaPembanding_input').val(),
                nnakhirpria: $('#NilaiAkhirPriaPembanding_input').val(),
                nilainormalwanita: $('#nilainormalwanitapembanding_input').val(),
                nnawalwanita: $('#NilaiAwalWanitaPembanding_input').val(),
                nnakhirwanita: $('#NilaiAkhirWanitaPembanding_input').val(),
                NN0_1D: $('#nilainormalbayi0_1hari_input').val(),
                NN2_4D: $('#nilainormalbayi2_4hari_input').val(),
                NN5_7D: $('#nilainormalbayi5_7hari_input').val(),
                NN8_14D: $('#nilainormalbayi8_14hari_input').val(),
                NN15_30D: $('#nilainormalbayi15_30hari_input').val(),
                NN1_2M: $('#nilainormalbayi1_2bulan_input').val(),
                NN3_5M: $('#nilainormalbayi3_5bulan_input').val(),
                NN6_11M: $('#nilainormalbayi6_11bulan_input').val(),
                NN1_3Y: $('#nilainormalbayi1_3tahun_input').val(),
                NN4_7Y: $('#nilainormalbayi4_7tahun_input').val(),
                NN8_13Y: $('#nilainormalbayi8_13tahun_input').val()
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

    $('#btnPembandingEdit').on('click', function(ev){
        ev.preventDefault();
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/pembanding_update') ?>",
            data:{
                id: $('#kodedetail').val(),
                nmdetail: $('#namadetail').val(),
                satuan: $('#satuanpembanding').val(),
                kdinput: $('input[name=KdInputPembanding]:checked').val(),
                nilainormalpria: $('#nilainormalpriapembanding').val(),
                nnawalpria: $('#NilaiAwalPriaPembanding').val(),
                nnakhirpria: $('#NilaiAkhirPriaPembanding').val(),
                nilainormalwanita: $('#nilainormalwanitapembanding').val(),
                nnawalwanita: $('#NilaiAwalWanitaPembanding').val(),
                nnakhirwanita: $('#NilaiAkhirWanitaPembanding').val(),
                NN0_1D: $('#nilainormalbayi0_1hari').val(),
                NN2_4D: $('#nilainormalbayi2_4hari').val(),
                NN5_7D: $('#nilainormalbayi5_7hari').val(),
                NN8_14D: $('#nilainormalbayi8_14hari').val(),
                NN15_30D: $('#nilainormalbayi15_30hari').val(),
                NN1_2M: $('#nilainormalbayi1_2bulan').val(),
                NN3_5M: $('#nilainormalbayi3_5bulan').val(),
                NN6_11M: $('#nilainormalbayi6_11bulan').val(),
                NN1_3Y: $('#nilainormalbayi1_3tahun').val(),
                NN4_7Y: $('#nilainormalbayi4_7tahun').val(),
                NN8_13Y: $('#nilainormalbayi8_13tahun').val()
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

    function selects_bayi() {
      // Get the checkbox
      var checkBox = document.getElementById("select_bayi");
      // Get the output text
      var text = document.getElementById("form_bayi");

      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }

    function delete_detail_pemeriksaan(kode) {
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/delete_detail_pemeriksaan') ?>",
            data:{
                kode: kode
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