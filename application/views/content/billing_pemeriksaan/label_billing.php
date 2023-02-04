<style>
    * {
        font-size:18px;
        font-family: monospace;
    }

    @page {
        margin: 0mm;
    }

    .body {
        width: 21cm;
        height: 8.25cm;
    }

    .box {
        display: inline-block;
        width: 6cm;
        height: 3.6cm;
        padding-right: 30px; 
        padding-top: 6px;
    }

    p {
        width: 183.25pt;
        margin-left: 15pt;
    }
</style>
<body>
    <div class="body">
        <table style="width: 100%">
        </table>
        <?php
            if(isset($data) && $data != '') {
                for ($x = 0; $x < $looping; $x++) { 
                    ?>
                    <div class="box">
                        <p><b><?= $data->NoLab ?></b><br>
                        <?= $data->Firstname ?><br>
                        <?= $data->MedRec ?><br>
                        <?= date('d/m/Y',strtotime($data->Bod)) ?> <?= $data->UmurThn ?>thn<br>
                        </p>
                </div>
                    <?php
                }
            } else { 
        ?>
        <p class="label label-warning">Data Label Kosong</p>
        <?php } ?>
        <?= $image; ?>
        <p></p>
        <div style="page-break-after:always;"></div>
   </div>
</body>