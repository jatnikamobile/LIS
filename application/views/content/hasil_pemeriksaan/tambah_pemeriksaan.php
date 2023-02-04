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
                    <td><a href="#" id="<?=@$l->KDDetail?>" onclick="add_pemeriksaan_pasien(this.id)"><?=@$l->NMDetail?></a></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
<?php endif ?>
<script type="text/javascript">
    function load_detail(kode) {
        $.ajax({
            url:"<?=base_url('hasilpemeriksaan/show_group_pemeriksaan_lab')?>",
            type:'POST',
            data:{kdgroup:kode},
            beforeSend:function(){
                $('#modal-tindakan').modal('show');
                $('#target-pemeriksaan').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(resp){
                $('#target-pemeriksaan').html(resp);
            }
        });
    }

    function add_pemeriksaan_pasien(kddetail) {
        var table = document.getElementById('detail_pemeriksaan');
        if ($('#NoTransaksi').val() == '') {
            alert('Nomor Transaksi Kosong');
        } else {
            $.ajax({
                url:"<?=base_url('hasilpemeriksaan/post_pemeriksaan_baru')?>",
                type:'POST',
                data:{
                    kddetail:kddetail,
                    notran: $('#NoTransaksi').val(),
                    kdlab: $('#NoLaboratorium').val(),
                    regno: $('#Regno').val()
                },
                success:function(resp){
                    console.log(resp);
                }
            });
        }
    }

    function convertToRupiah(angka)
    {
        var rupiah = '';        
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
    }
</script>