<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><i class="fa fa-file-o"></i> <?=$title?></h2>
                <!-- <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul> -->
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <!-- <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#umum" data-toggle="tab">Umum</a></li>
                </ul> -->

                <!-- Tab panes -->
                <!-- <div class="tab-content"> -->
                    <!-- start umum -->
                    <!-- <div role="tabpanel" class="tab-pane fade in active" id="umum"> -->

                        <hr style="clear: both;">
                        <div id="targetTblMesin" style="overflow:auto;"></div>
                        <table class="table table-bordered table-hover" id="tblMesin" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Mesin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" onclick="simpan_data()">Simpan</button>
                    <!-- </div> -->
                    <!-- end umum -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let table;
      $(function() {
          table = $('#tblMesin').DataTable({
            "columnDefs": [
              {
                "targets": [0, 1, 2],
                "orderable": false,
              },
            ],
            "processing": true,
            "serverSide": true,
            "ajax": {
              "url": "<?= site_url('BillingPemeriksaan/get_mesin') ?>",
              "type": "POST",
              "data": function (d) {
                    d.myKey = 'myValue';
                },
            },
            "lengthChange": false,
            "responsive": false,
            "language": 
                {          
                "processing": "<i class='fa fa-refresh fa-spin'></i>",
                }
          });
      });

    function simpan_data() {
        var selected = [];
        $('input[type=checkbox]').each(function() {
            if ($(this).is(":checked")) {
                selected.push($(this).attr('name'));
            }
        });
        if(selected.length > 0){
            var notrans = '<?=$data->NoTran;?>';
            var nolab = '<?=$data->NoLab;?>';
            $.ajax({
                type:'POST',
                url:'<?=base_url('BillingPemeriksaan/save_mesin')?>',
                data:{notrans: notrans ,nolab:nolab ,nmfunctions:selected},
                beforeSend:function(){
                    $('#targetTblMesin').html('<div class="alert alert-info"><h3>Menyimpan Data ... <i class="fa fa-spinner fa-pulse fa-lg" style="float:right;"></i></h3></div>');
                },
                success:function(data){
                   url = "<?php echo base_url('BillingPemeriksaan/print_label_billing')?>/"+notrans+"/"+nolab;
                   window.open(url, "_self");
                    // $('#targetTblMesin').html(data);

                }
            });
        } else {
            alert('pilih mesin terlebih dahulu');
        }
    }
</script>