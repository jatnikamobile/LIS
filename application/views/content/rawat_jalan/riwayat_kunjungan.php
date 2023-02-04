<div class="col-sm-12 col-md-12">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified nav-success" role="tablist">
        <li role="presentation" class="active"><a href="#riwayat-rawat-jalan" aria-controls="rriwayat-awat-jalan" role="tab" data-toggle="tab"><b>Rawat Jalan</b></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active row" id="riwayat-rawat-jalan">
            <div id="targetDetail" class="col-sm-12 col-md-12">
                <table class="table table-bordered table-hover" id="table-list-riwayat">
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
                            <?php if ($set == 'riwayat'):?>
                            <th>Tindakan</th>
                            <th>Diagnosa</th>
                            <?php endif;?>
                            <!-- <th></th> -->
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    table_riwayat = $('#table-list-riwayat').DataTable({
        lengthMenu: [[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]],
        scrollX:true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [], //Initial no order.
        language: {
            processing: '<i class="fa fa-refresh fa-spin fa-3x fa-fw" style="color:#fff"></i><span>Mohon Tunggu...</span>'
        },
        pageLength:10,
        // Load data for the table's content from an Ajax source
        ajax: {
            url: "<?=base_url('RawatJalan/ajax_list')?>",
            type: "POST",
            data: function(send){
                send.<?=$csrf['name']?> = '<?=$csrf['hash']?>';
                send.set  = 'riwayat';
                send.medrec = '<?=$medrec?>';
                send.regno = '<?=$regno?>';
            },
        },
        // fnDrawCallback:function(resp){
        //     // console.log(resp.json);
        //     pageTotal = resp.json.totalFromPage;
        //     dataTotal = resp.json.totalFromData;
        //     $("#pageTotal").html(pageTotal);
        //     $("#dataTotal").html(dataTotal);
        // },
        //Set column definition initialisation properties.
        columnDefs: [
            {
                targets: [ -1 ], //first column / numbering column
                orderable: false, //set not orderable
            },
        ],
    });

</script>