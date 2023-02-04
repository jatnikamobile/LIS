<table class="table table-bordered table-hover" id="table-list">
    <thead>
        <tr class="success">
            <th style="width:5%;">No</th>
            <th>Tgl. Reg</th>
            <th>No. Reg</th>
            <th>No. RM</th>
            <th>Nama</th>
            <th>Nama Dokter</th>
            <th>Poli</th>
            <th>Nomor Urut</th>
            <th>Kategori</th>
            <th>Valid User</th>
            <?php if ($set == 'kunjungan'):?>
            <th>Tindakan</th>
            <th>Diagnosa</th>
            <?php endif;?>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr data-regno="" id="trans_$l->Regno" ondblclick="edit_data('#'+this.id)" style="cursor:pointer;">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if ($set == 'kunjungan'):?>
            <td>
                <span class="label label-warning">Sudah</span>
                <span class="label label-info">Belum</span>
            </td>
            <td>
                <span class="label label-warning">Sudah</span>
                <span class="label label-info">Belum</span>
            </td>
            <?php endif;?> 
            <td>
                <a href="" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
            </td>
        </tr>
    </tbody>
</table>
<script>
    var set_data = "<?=$set ?? ''?>"; 
    function edit_data(node){
        var data = $(node).data();
        get_form(data.regno);
    }

    function delete_data(node){
        var data = $(node).data();
        conf = confirm("Apakah Anda Yakin Akan Menghapus Data Tersebut?");
        if(conf){
            $.ajax({
                url:"<?=base_url()?>",
                type:"POST",
                data:{regno:data.regno},
                dataType:"JSON",
                beforeSend:function(){
                },
                success:function(resp){
                    get_table();
                },
            });
        }
    }
</script>