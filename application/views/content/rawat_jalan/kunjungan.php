<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom" id="tab-irj">
            <ul class="nav nav-tabs">
                <!-- <li class="active"><a href="#list_trn" id="href-list_trn" data-toggle="tab">List Registrasi</a></li> -->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active row" id="list_trn">
                    <div class="col-xs-12 col-sm-12">
                        <form id="formFilterListKasir">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label class="col-sm-3 control-label">Tanggal Transaksi :</label>
                                <div class="col-sm-7">
                                    <input type="date" name="TanggalTransaksi" id="TanggalTransaksi" class="form-control input-sm" value="">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                    <label class="col-sm-3 control-label">RM / Nama:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="rm_nama" id="rm_nama" class="form-control input-sm" value="" placeholder="RM / NAMA PASIEN">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label class="col-sm-3 control-label">Dokter:</label>
                                <div class="col-sm-7">
                                    <select name="dokter" id="dokter" class="form-control input-sm">
                                        <option value="">--= Dokter =--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3">
                                <div class="col-sm-4">
                                    <button class="btn btn-success btn-sm" type="button" id="btnCariTable"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-12"><hr></div>
                    <div id="targetTable" class="col-xs-12" style="overflow:auto;">
                        <table class="table table-bordered table-hover" id="table-list-kunjungan">
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
                                    <th>Tindakan</th>
                                    <th>Diagnosa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var tanggal = "";
    var rm_nama = "";
    var dokter = "";
    var kdpoli = "<?=$this->session->userdata('kd_poli') ?? ''?>";
    var table = '';
    $(document).ready(function(){
    });
    $('#dokter').select2({
        ajax: {
            // api/get_ppk
            url:"<?=base_url('api/dokter')?>",
            type:'post',
            dataType: 'json',
            data: function(params) {
                return {
                    q: params.term,
                    offset: (params.page || 0) * 20,
                    kdpoli:kdpoli
                };
            },
            processResults: function(data, params) {
                return {
                    results: data.data.map(function(item){
                        item.id = item.KdDoc;
                        item.text = item.NmDoc;
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
                   ${item.NmDoc}
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
    
    $('#btnCariTable').click(function(){
        table.ajax.reload();
    });

    table = $('#table-list-kunjungan').DataTable({
        lengthMenu: [[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]],
        scrollX:true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [], //Initial no order.
        language: {
            processing: '<i class="fa fa-refresh fa-spin fa-3x fa-fw" style="color:#fff"></i><span>Mohon Tunggu...</span>'
        },
        pageLength:15,
        // Load data for the table's content from an Ajax source
        ajax: {
            url: "<?=base_url('RawatJalan/ajax_list')?>",
            type: "POST",
            data: function(send){
                send.<?=$csrf['name']?>  = '<?=$csrf['hash']?>';
                send.set  = 'kunjungan';
                send.tanggal  = $('#TanggalTransaksi').val();
                send.rm_nama  = $("#rm_nama").val();
                send.dokter  = $("#dokter").val();
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


    function get_table(tanggal='',rm_nama='',dokter=''){
        $.ajax({
            url:"<?=base_url('rawatjalan/list')?>",
            type:"POST",
            data:{set:'list',rm_nama:rm_nama,tanggal:tanggal,dokter:dokter},
            dataType:'html',
            beforeSend:function(){
                $('#targetTable').html('<div class="alert alert-warning">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(resp){
                $('#targetTable').html(resp);
            },
        });
    }

    function loadData(notran,way){
        $.ajax({
            url:"<?=base_url()?>",
            type:'POST',
            data:{way:way,notran:notran},
            dataType:'html',
            beforeSend:function(){
                $("#target-detail").html('<div class="alert alert-warning" role="alert"><h2>Memuat Data ... <i class="fa fa-spinner fa-pulse"></i></h2></div>');
            },
            success:function(resp){
                $("#target-detail").html(resp);
            }
        });
    }
    
</script>