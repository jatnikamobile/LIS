<?php if ($status): ?>
    <p><u>Group Pemeriksaan</u></p>
    <table class="table table-bordered table-striped mb-0" id="group-lab">
        <thead>
            <tr class="info">
                <th style="width:5%;">Kode</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $key => $l):?>
                <tr data-id='<?=$l->KDGroup ?>' data-json='<?= json_encode($l) ?>'>
                    <td><?=@$l->KDGroup?></td>
                    <td><a href="#" id="<?=@$l->KDGroup?>" onclick="load_detail(this.id)"><?=@$l->NmGroup?></a></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
<?php else: ?>
    <p><u>Pemeriksaan</u></p>
    <table class="table table-bordered table-striped mb-0" id="group-lab">
        <thead>
            <tr class="info">
                <th style="width:5%;">Kode</th>
                <th>Pemeriksaan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $key => $l):?>
                <tr data-id='<?=$l->KDDetail ?>' data-json='<?= json_encode($l) ?>'>
                    <td><?=@$l->KDDetail?></td>
                    <td><a href="#" id="<?=@$l->KdMapping?>" onclick="add_pemeriksaan_pasien(this.id)"><?=@$l->NMDetail?></a></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
<?php endif ?>
<script type="text/javascript">
    function load_detail(kode) {
        $.ajax({
            url:"<?=base_url('billingpemeriksaan/show_group_pemeriksaan_lab')?>",
            type:'POST',
            data:{kdgroup:kode},
            beforeSend:function(){
                $('#modal-tindakan').modal('show');
                $('#target-pemeriksaan').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(resp){
                $('#target-pemeriksaan').html(resp);
                // $('#btnBackGroup').hide().fadeOut(3000);
            }
        });
    }

    function add_pemeriksaan_pasien(kddetail) {
        if ($('#Regno').val() == '') {
            alert('Isi terlebih dahulu no registrasi terlebih dahulu');
        } else {
            $.ajax({
                url:"<?=base_url('billingpemeriksaan/check_tarif_pemeriksaan')?>",
                type:'POST',
                data:{
                    kdmapping: kddetail, 
                    NomorTransaksi: $('#NoTran').val(), 
                    Regno: $('#Regno').val(),
                    KdPengirim: $('#DokterPengirim').val(),
                    NomorLab: $('#NoLab').val(),
                    TglTransaksi: $('#TglTransaksi').val(),
                    JamTransaksi: $('#JamTransaksi').val(),
                    TglSelesai: $('#TglSelesai').val(),
                    JamSelesai: $('#JamSelesai').val(),
                    Medrec: $('#Medrec').val(),
                    KdSex: $('input[name=KdSex]:checked').val(),
                    UmurThn: $('#UmurThn').val(),
                    UmurBln: $('#UmurBln').val(),
                    UmurHari: $('#UmurHari').val(),
                    KdBangsal: $('#KdRawat').val(),
                    KdKelas: $('#KdKelas').val(),
                    KdPoli: $('#KdPoli').val(),
                    KdCBayar: $('#KdCaraBayar').val(),
                    KdJaminan: $('#KdJaminan').val(),
                    JumlahBiaya: $('#total').val(),
                    Kategori: $('#KdKategori').val(),
                    Status: $('input[name=Status]:checked').val(),
                    Jenis: $('input[name=JenisPemeriksaan]:checked').val(),
                    Regdate: $('#Regdate').val(),
                    KdPemeriksa: $('#DokterPemeriksa').val(),
                },
                success:function(resp){
                    console.log(resp);
                    if (!resp.status) {
                        alert($('#KodeTindakan').val()+ ' - ' +resp.message);
                    } else {
                        alert(resp.message);
                    }
                    billingPemeriksaanPasien($('#NoTran').val());
                }
            });
        }
    }
</script>