<div class="table-responsive pemeriksaan-tarif">
    <table class="table table-sm table pemeriksaan-tarif" id="table-tarif">
        <thead>
            <tr class="success">
                <th>Kode Tarif</th>
                <th>Group</th>
                <th>Kategori</th>
                <th>Kode Kelas</th>
                <th>Kelas</th>
                <th>Sarana(Rp)</th>
                <th>Pelayanan(Rp)</th>
                <th>Jumlah(Rp)</th>
                <th>Medis</th>
                <th>Para Medis</th>
                <th>Non Medis</th>
                <th>HAR</th>
                <th>MAT</th>
                <th>OPS</th>
                <th><button type="button" class="btn btn-success btn-xs btn-round" data-toggle="modal" data-target=".create-tarif-lab"><i class="fa fa-plus"></i></button></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tarif as $key => $l):?>
            <tr data-id='<?=$l->KDTarif ?>' data-json='<?= json_encode($l) ?>'>
                <td><?=@$l->KDTarif?></td>
                <td><?=@$l->KDDetail?></td>
                <td><?=@$l->Kategori?></td>
                <td><?=@$l->KdKelas?></td>
                <td><?=@$l->NmKelas?></td>
                <td><?= number_format(@$l->Sarana)?></td>
                <td><?= number_format(@$l->Pelayanan)?></td>
                <td><?= number_format(@$l->Pelayanan + @$l->Sarana)?></td>
                <td><?= number_format(@$l->JasaDokter)?></td>
                <td><?= number_format(@$l->JasaPerawat)?></td>
                <td><?= number_format(@$l->JasaRumahSakit)?></td>
                <td><?= number_format(@$l->JasaDokter1)?></td>
                <td><?= number_format(@$l->JasaPerawat1)?></td>
                <td><?= number_format(@$l->JasaRumahSakit1)?></td>
                <td><button type="button" class="btn btn-primary btn-xs btn-round btn-edit-tarif"><i class="fa fa-pencil"></i></button></td>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>
<div class="modal fade edit-tarif-lab" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit-tarif-lab">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tarif Laboraturium</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="col-sm-3">
                        <label for="message-text" class="col-form-label">Kode Tarif:</label>
                        <input type="text" class="form-control" id="kodetarif" name="kodetarif" readonly>
                        <input type="hidden" class="form-control" id="kelastext" name="kelastext">
                    </div>
                    <div class="col-sm-12">
                        <label for="message-text" class="col-form-label">Pemeriksaan:</label>
                        <select type="text" name="kodepemeriksaan" id="kodepemeriksaan" style="width:100%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                            <option value="">-= Pemeriksaan =-</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="message-text" class="col-form-label">Kategori:</label>
                        <select type="text" name="kategori" id="kategori" style="width:100%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                            <option value="">-= Kategori =-</option>
                            <?php foreach ($kategori as $key => $k):?>
                                <option value="<?=$k->KdKategori?>"><?= $k->NmKategori?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="message-text" class="col-form-label">Kelas:</label>
                        <select type="text" name="kelas" id="kelas" style="width:100%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                            <option value="">-= Kelas =-</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Sarana:</label>
                                    <input type="number" class="form-control col-sm-3" id="sarana" name="sarana">
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Jasa Medis:</label>
                                    <input type="number" class="form-control col-sm-3" id="jasamedis" name="jasamedis">
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">HAR:</label>
                                    <input type="number" class="form-control col-sm-3" id="har" name="har">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Pelayanan:</label>
                                    <input type="number" class="form-control col-sm-3" id="pelayanan" name="pelayanan">
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Jasa Para Medis:</label>
                                    <input type="number" class="form-control col-sm-3" id="jasaparamedis" name="jasaparamedis">
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">MAT:</label>
                                    <input type="number" class="form-control col-sm-3" id="mat" name="mat">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Jumlah:</label>
                                    <input type="text" class="form-control col-sm-3" id="jumlah" name="jumlah" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Jasa Non Medis:</label>
                                    <input type="number" class="form-control col-sm-3" id="jasanonmedis" name="jasaparamedis">
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">OPS:</label>
                                    <input type="number" class="form-control col-sm-3" id="ops" name="ops">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs btn-round" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success btn-xs btn-round" id="btnTarifUpdate">Ubah</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade create-tarif-lab" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="create-tarif-lab">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tarif Laboraturium Baru</h5>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="kddetail" name="kddetail">
                    <div class="col-sm-12">
                        <label for="message-text" class="col-form-label">Pemeriksaan:</label>
                        <input type="hidden" class="form-control" id="kodepemeriksaanbarutext" name="kodepemeriksaanbarutext">
                        <select type="text" name="kodepemeriksaanbaru" id="kodepemeriksaanbaru" style="width:100%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                            <option value="">-= Pemeriksaan =-</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="message-text" class="col-form-label">Kategori:</label>
                        <input type="hidden" class="form-control" id="kategoribarutext" name="kategoribarutext">
                        <select type="text" name="kategoribaru" id="kategoribaru" style="width:100%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                            <option value="">-= Kategori =-</option>
                            <?php foreach ($kategori as $key => $k):?>
                                <option value="<?=$k->KdKategori?>"><?= $k->NmKategori?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label for="message-text" class="col-form-label">Kelas:</label>
                        <input type="hidden" class="form-control" id="kelasbarutext" name="kelasbarutext">
                        <select type="text" name="kelasbaru" id="kelasbaru" style="width:100%;" class="form-control select2 input-sm col-xs-6 col-sm-6">
                            <option value="">-= Kelas =-</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Sarana:</label>
                                    <input type="number" class="form-control col-sm-3" id="saranabaru" name="saranabaru">
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Jasa Medis:</label>
                                    <input type="number" class="form-control col-sm-3" id="jasamedisbaru" name="jasamedisbaru">
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">HAR:</label>
                                    <input type="number" class="form-control col-sm-3" id="harbaru" name="harbaru">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Pelayanan:</label>
                                    <input type="number" class="form-control col-sm-3" id="pelayananbaru" name="pelayananbaru">
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Jasa Para Medis:</label>
                                    <input type="number" class="form-control col-sm-3" id="jasaparamedisbaru" name="jasaparamedisbaru">
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">MAT:</label>
                                    <input type="number" class="form-control col-sm-3" id="matbaru" name="matbaru">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Jumlah:</label>
                                    <input type="text" class="form-control col-sm-3" id="jumlahbaru" name="jumlahbaru" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">Jasa Non Medis:</label>
                                    <input type="number" class="form-control col-sm-3" id="jasanonmedisbaru" name="jasanonmedisbaru">
                                </div>
                                <div class="col-sm-3">
                                    <label for="recipient-name" class="col-form-label">OPS:</label>
                                    <input type="number" class="form-control col-sm-3" id="opsbaru" name="opsbaru">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xs btn-round" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success btn-xs btn-round" id="btnTarifBaru">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

    });

    $('#table-tarif').on("click", '.btn-edit-tarif', function(){
        let button = $(this);
        let tr = button.parents('tr');
        let data = JSON.parse(tr.attr('data-json'));
        console.log(data);
        $('#edit-tarif-lab [name=kodetarif]').val(data.KDTarif);
        $('#edit-tarif-lab [name=kelastext]').val(data.NmKelas);
        var $pemeriksaan = $("<option selected></option>").val(data.KDDetail).text(data.NMDetail);
        $('#edit-tarif-lab [name=kodepemeriksaan]').append($pemeriksaan).trigger('change');
        $('#edit-tarif-lab [name=kategori]').val(data.Kategori);
        var $kelas = $("<option selected></option>").val(data.KdKelas).text(data.NmKelas);
        $('#edit-tarif-lab [name=kelas]').append($kelas).trigger('change');
        $('#edit-tarif-lab [name=sarana]').val(Number(data.Sarana));
        $('#edit-tarif-lab [name=pelayanan]').val(Number(data.Pelayanan));
        $('#edit-tarif-lab [name=jumlah]').val(Number(data.Pelayanan) + Number(data.Sarana));
        $('#edit-tarif-lab [name=jasamedis]').val(data.JasaDokter);
        $('#edit-tarif-lab [name=har]').val(data.JasaDokter1);
        $('#edit-tarif-lab [name=jasaparamedis]').val(data.JasaPerawat);
        $('#edit-tarif-lab [name=mat]').val(data.JasaPerawat1);
        $('#edit-tarif-lab [name=jasanonmedis]').val(data.JasaRumahSakit);
        $('#edit-tarif-lab [name=ops]').val(data.JasaRumahSakit1);
        $('#edit-tarif-lab').modal('toggle');
    });

    $('#kelasbaru').select2({
        placeholder:'-= Kelas =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/kelas')?>",
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
                        item.id = item.KDKelas;
                        item.text = `${item.NMKelas}`;
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
                    <span>${item.KDKelas} - ${item.NMKelas}</span><br>
                    <span>Ruangan : <i>${item.NmBangsal}</i><span>
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

    $('#kelas').select2({
        placeholder:'-= Kelas =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/kelas')?>",
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
                        item.id = item.KDKelas;
                        item.text = `${item.NMKelas}`;
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
                    <span>${item.KDKelas} - ${item.NMKelas}</span><br>
                    <span>Ruangan : <i>${item.NmBangsal}</i><span>
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

    $('#kodepemeriksaan').select2({
        placeholder:'-= Pemeriksaan =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/pemeriksaan')?>",
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
                        item.id = item.KDDetail; //item.KdGroup;
                        item.text = `${item.NMDetail}`;
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
                    <span>${item.KDDetail} - ${item.NMDetail}</span>
                </p>
            `;
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateSelection: function(item) {
            return item.id+' - '+item.text;
        },
    });

    $('#kodepemeriksaanbaru').select2({
        placeholder:'-= Pemeriksaan =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/pemeriksaan')?>",
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
                        item.id = item.KDDetail; //item.KdGroup;
                        item.text = `${item.NMDetail}`;
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
                    <span>${item.KDDetail} - ${item.NMDetail}</span>
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

    $('#kodepemeriksaanbaru').on("change",function(){
        text = $("#kodepemeriksaanbaru option:selected").text();
        $("#kodepemeriksaanbarutext").val(text);
    });

    $('#kelasbaru').on("change",function(){
        text = $("#kelasbaru option:selected").text();
        $("#kelasbarutext").val(text);
    });

    $('#kelas').on("change", function(){
        text = $("#kelas option:selected").text();
        $("#kelastext").val(text); 
    });

    $('#saranabaru').keyup(function(){
        var sarana = $('#saranabaru').val();
        var pelayanan = $('#pelayananbaru').val();
        var sum = Number(sarana) + Number(pelayanan);
        $('#jumlahbaru').val('Rp. ' + sum);
    });

    $('#pelayananbaru').keyup(function(){
        var sarana = $('#saranabaru').val();
        var pelayanan = $('#pelayananbaru').val();
        var sum = Number(sarana) + Number(pelayanan);
        $('#jumlahbaru').val('Rp. ' + sum);
    });

    $('#pelayanan').keyup(function(){
        var sarana = $('#sarana').val();
        var pelayanan = $('#pelayanan').val();
        var sum = Number(sarana) + Number(pelayanan);
        $('#jumlah').val('Rp. ' + sum);
    });

    $('#sarana').keyup(function(){
        var sarana = $('#sarana').val();
        var pelayanan = $('#pelayanan').val();
        var sum = Number(sarana) + Number(pelayanan);
        $('#jumlah').val('Rp. ' + sum);
    });

    $('#btnTarifBaru').on('click', function(ev){
        ev.preventDefault();
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/tarif_post') ?>",
            data:{
                kddetail: $('#kddetail').val(),
                kdkategori: $('#kategoribaru').val(),
                kdkelas: $('#kelasbaru').val(),
                nmkelas: $('#kelasbarutext').val(),
                saranabaru: $('#saranabaru').val(),
                pelayananbaru: $('#pelayananbaru').val(),
                jasamedisbaru: $('#jasamedisbaru').val(),
                harbaru: $('#harbaru').val(),
                jasaparamedisbaru: $('#jasaparamedisbaru').val(),
                matbaru: $('#matbaru').val(),
                jasanonmedisbaru: $('#jasanonmedisbaru').val(),
                opsbaru: $('#opsbaru').val(),
            },
            success:function(resp){
                console.log(resp);
                if (resp.insert) {
                    alert(resp.message);
                    window.load_tarif($('#kddetail').val());
                } else{
                    alert(resp.message);
                }
            }
        });
    });

    $('#btnTarifUpdate').on('click', function(ev){
        ev.preventDefault();
        $.ajax({
            type:'POST',
            url:"<?= base_url('mastertarif/tarif_update') ?>",
            data:{
                kdtarif: $('#kodetarif').val(),
                kodepemeriksaan: $('#kodepemeriksaan').val(),
                kdkategori: $('#kategori').val(),
                kdkelas: $('#kelas').val(),
                nmkelas: $('#kelastext').val(),
                sarana: $('#sarana').val(),
                pelayanan: $('#pelayanan').val(),
                jasamedis: $('#jasamedis').val(),
                har: $('#har').val(),
                jasaparamedis: $('#jasaparamedis').val(),
                mat: $('#mat').val(),
                jasanonmedis: $('#jasanonmedis').val(),
                ops: $('#ops').val(),
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

</script>