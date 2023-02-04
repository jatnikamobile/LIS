<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom" id="tab-irj">
            <ul class="nav nav-tabs">
                <!-- <li class="active"><a href="#list_trn" id="href-list_trn" data-toggle="tab">List Registrasi</a></li> -->
            </ul>
        
            <div class="tab-content">
            <div class="col-xs-12 col-sm-12"><hr></div>
           
            <div class="col-xs-12 col-sm-12">
                <form id="formFilterListKonsul" method="get" action="">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label class="col-sm-3 control-label">Tanggal Transaksi :</label>
                        <div class="col-sm-3">
                            <input type="date" name="tgl_awal"  class="form-control input-sm" value="">
                        </div>
                        <label class="col-sm-1 control-label">s/d</label>
                        <div class="col-sm-3">
                            <input type="date" name="tgl_akhir" id="tgl_awal" class="form-control input-sm" value="">
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label class="col-sm-3 control-label">RM / Nama:</label>
                        <div class="col-sm-7">
                            <input type="text" name="rm_nama" id="rm_nama" class="form-control input-sm" value="" placeholder="RM / NAMA PASIEN">
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-3 col-lg-3">
                        <div class="col-sm-4">
                            <button class="btn btn-success btn-sm" type="submit" id="btnCariTable"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-12"><hr></div>
                <div class="tab-pane active row" id="list_trn">
                    <div id="targetTable" class="col-xs-12" style="overflow:auto;">
                        <table class="table table-bordered table-hover" id="table-list-antrian">
                            <thead>
                                <tr class="success">
                                    <th style="width:5%;">No</th>
                                    <th>Tgl. Konsul</th>
                                    <th>No. Reg</th>
                                    <th>No. RM</th>
                                    <th>Nama</th>
                                    <th>Poli</th>
                                    <th>Dokter Awal</th>
                                    <th>Poli Tujuan</th>
                                    <th>Dokter Tujuan</th>
                                    <th>Diagnosa</th>
                                    <th>Hal</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;foreach($data as $key=>$d):?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$d->TanggalKonsul?></td>
                                    <td><?=$d->Regno?></td>
                                    <td><?=$d->Medrec?></td>
                                    <td><?=$d->Firstname?></td>
                                    <td><?=$d->PoliAsal?></td>
                                    <td><?=$d->DokterAsal?></td>
                                    <td><?=$d->PoliTujuan?></td>
                                    <td><?=$d->DokterTuju?></td>
                                    <td><?=$d->KdICD?> - <?=$d->DIAGNOSA?></td>
                                    <td>
                                        <?php if ($d->Status === '1'): ?>
                                            <span class="label label-success arrowed-in arrowed-in-right">Disetujui<span>
                                        <?php elseif ($d->Status === '2'): ?>
                                            <span class="label label-danger arrowed">Ditolak<span>
                                        <?php else: ?>
                                            <span class="label label-info arrowed-right arrowed-in">On Progress<span>
                                        <?php endif; ?></td>
                                    <td><?=$d->Keterangan?></td>
                                </tr>
                                <?php $no++;endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // get_table(tanggal,rm_nama,dokter);
    });
    // setInterval(() => {
    //     table.ajax.reload();
    // }, 30000);
</script>