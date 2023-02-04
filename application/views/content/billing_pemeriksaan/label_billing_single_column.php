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

    .box-label{
        width: 50mm;
        height: 20mm;
        padding: 2px;
        border: 1px solid #ddd;
    }
    img{
        width: 90%;
    }
    table tr td{
        font-size: 8pt;
    }
</style>
<body>
    <div class="body">
        <div class="box-label">
            <table width="100%">
                <tr>
                    <td>
                    <div style="font-size: 11pt; white-space: nowrap; float: left; font-weight: bold"><?= $data->MedRec ?></div>
                    <div style="font-size: 11pt;  white-space: nowrap; position: absolute; text-align: right; font-weight: bold; width: 49mm"><?= substr($data->Firstname, 0, 12) ?> <br> </div>
                    </td>
                </tr>
                <?php if ($data->MedRec == ''): ?>
                <tr><td> &nbsp; </td></tr>
                <?php endif ?>
                <tr>
                    <td colspan="2" align="center"><?= $image; ?></td>
                </tr>
                <tr>
                    <td>
                    <div style="font-size: 11pt; white-space: nowrap; float: left; font-weight: bold">BLANGKO</div>
                    <div style="font-size: 11pt; white-space: nowrap; position: absolute; text-align: right; font-weight: bold; width: 49mm"><?= $data->NoLab ?></div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="page-break-after:always;"></div>
   </div>
</body>