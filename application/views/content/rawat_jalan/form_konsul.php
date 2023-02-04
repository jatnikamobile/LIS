<div class="col-sm-12 col-md-12 col-lg-12">
    <hr style="margin:10px 0;padding:0;">
    <b>Form Konsul</b>
</div>
<form id="formSuratKonsul">
    <div style="background-color:#e8edf4;width:60%;margin:auto; padding:15px; padding-bottom: 150px;">
        <table style="width:100%;margin:auto">
            <tr>
                <th style="text-align:center;">SURAT KONSUL</th>
            </tr>
            <tr>
                <th style="text-align:center;">Nomor: <span id="trgNoSurat"><?=@$nosurat?>/<?=date('my')?></span><span> <?=@$data->NMPoli?></span></th>
            </tr>
            <tr>
                <th><hr></th>
            </tr>
        </table>
        <table style="width:100%;margin:auto">
            <tr>
                <td style="width:27%;">Nomor RM</td><td>: <?=@$data->Medrec?></td>
            </tr>
            <tr>
                <td>No Kartu Pasien</td><td>: <?= @$data->NoPeserta?></td>
            </tr>
            <tr>
                <td>Jenis Kepesertaan</td><td>: <?= @$data->GroupUnit?></td>
            </tr>
            <tr>
                <td>Nama Pasien</td><td>: <?=@$data->Firstname?></td>
            </tr>
            <tr>
                <td>Diagnosa</td>
                <td>
                    <select class="form-control select2" id="KdICD" name="dokdpjp" style="width:50%;">
                        <option value="<?=($data->KdICD ?? '')?>"><?=($data->Diagnosa ?? '-- Diagnosa --')?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Pasien Konsul </td><td><input type="date" style="width:70%;" class="form-control" id="TanggalKonsul" name="TanggalKonsul"></td>
            </tr>
            <tr>
                <td>Tanggal Surat Konsul</td><td>: <?= date('d-m-Y') ?></td>
            </tr>
        </table>
        <br>
        <table style="width:100%;margin:auto">
            <tr>
                <td>Terapi Yang Telah Diberikan:</td>
            </tr>
            <tr>
                <td>
                    <div class="form-inline">
                        <label> </label>
                        <input type="text" style="width:80%;" class="form-control" name="Terapi">
                    </div>
                </td>
            </tr>
        </table>
        <table style="width:100%;margin:auto">
            <tr>
                <td>Catatan:</td>
            </tr>
            <tr>
                <td>
                    <div class="form-inline">
                        <label> </label>
                        <input type="text" style="width:80%;" class="form-control" name="Catatan">
                    </div>
                </td>
            </tr>
        </table>
        <table style="width:100%;margin:auto">
            <tr>
                <td>Konsul ke Poli</td><td><select class="form-control select2" id="KdPoliTuju" name="KdPoliTuju" style="width:50%;"><option value="">-- Poli Tujuan --</option></select></td>
            </tr>
            <tr>
                <td>Dokter Tujuan</td><td> <select class="form-control select2" id="doktuju" name="doktuju" style="width:50%;"><option value="">-- Dokter Tujuan --</option></select></td>
            </tr>
        </table>
    </div>
    <div style="width:60%;margin:auto;">
        <hr>
        <div class="btn-group" style="">
            <input type="hidden" name="Regno" id="Regno" value="<?=@$data->Regno?>">
            <input type="hidden" name="NoSuratKonsul" id="NoSuratKonsul" value="<?=@$nosurat?>/<?=date('my')?>">
            <input type="hidden" name="tglsurat" id="tglsurat" value="<?=date('Y-m-d')?>">
            <input type="hidden" name="KdPoliAsal" id="KdPoliAsal" value="<?=@$data->KdPoli?>">
            <input type="hidden" name="Kategori" id="Kategori" value="<?=@$data->Kategori?>">
            <input type="hidden" name="Medrec" id="Medrec" value="<?=@$data->Medrec?>">
            <input type="hidden" name="Firstname" id="Firstname" value="<?=@$data->Firstname?>">
            <button type="submit" id="btn_input" class="btn btn-success"><i class="fa fa-save"></i>Buat Konsul</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
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
    $('#KdPoliTuju').select2({
        placeholder:'-= Poli =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/poli_tuju')?>",
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
                        item.id = item.KdPoli;
                        item.text = item.NMPoli.trim();
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
                    <span><i>${item.NMPoli.trim()}</i><span>
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
    $('#doktuju').select2({
        placeholder:'-= Dokter Tujuan =-',
        allowClear: true,
        ajax: {
            url:"<?=base_url('api/dokter')?>",
            type:"POST",
            dataType: 'JSON',
            data: function(params) {
                return {
                    kdpoli: $("#KdPoliTuju").val(),
                    q: params.term,
                    offset: (params.page || 0) * 20
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data.map(function(item){
                        item.id = item.KdDoc;
                        item.text = item.NmDoc.trim();
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
                    <span><i>${item.NmDoc.trim()}</i><span>
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
    $('#formSuratKonsul').on('submit', function(ev) {
        ev.preventDefault();
        let btn = $('#btn_input');
        let oldText = btn.html();
        btn.html('<i class="fa fa-spin fa-spinner"></i> ' + btn.text());
        btn.prop('disabled', true);
        $.ajax({
            url:"<?=base_url('rawatjalan/konsul_post')?>",
            type:"post",
            dataType:"json",
            data:{
                Regno: $('#Regno').val(),
                NoSuratKonsul: $('#NoSuratKonsul').val(),
                Firstname: $('#Firstname').val(),
                KdPoliAsal: $('#KdPoliAsal').val(),
                KdIcd: $('#KdICD').val(),
                TglSurat: $('#tglsurat').val(),
                Terapi: $('[name=Terapi]').val(),
                Catatan: $('[name=Catatan]').val(),
                KdTuju: $('#pengobatan').val(),
                KdPoliTuju: $('#KdPoliTuju').val(),
                KdDocTuju: $('#doktuju').val(),
                TanggalKonsul: $('#TanggalKonsul').val(),
                Kategori: $('#Kategori').val(),
                Medrec: $('#Medrec').val()
            },
            beforeSend(){
                btn.prop('disabled', true);
            },
            error: function(response){
                alert('Gagal menambahkan/server down, Silahkan coba lagi');
                btn.prop('disabled', false);
                btn.html(oldText);
            },
            success:function(response)
            {
                console.log(response);
                alert(response.message);
                btn.prop('disabled', false);
                btn.html(oldText);
            }
        });
    })
</script>