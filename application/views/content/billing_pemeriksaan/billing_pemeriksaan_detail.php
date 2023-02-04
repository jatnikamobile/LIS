<div class="row">
    <div class="col-sm-12 col-md-12" style="border: 1px solid grey; border-radius: 5px;">
        <form id="searchList">
            <span>Tanggal:</span>
            <input type="date" name="date1" id="date1" value="<?=date('Y-m-d')?>">
            <span>S/D</span>
            <input type="date" name="date2" id="date2" value="<?=date('Y-m-d')?>">
            <button type="submit" class="btn btn-success btn-xs btn-round" id="btnShowList"><i class="fa fa-search"></i>Cari</button>
        </form>
        <div class="col-sm-12" id="targetTable"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        console.log('Have a nice day:) by Mediantara');
        $('#btnShowList').click();
    });

    $('#searchList').submit(function(ev) {
        ev.preventDefault();
        $.ajax({
            url:"<?= base_url('billingpemeriksaan/list_billing')?>",
            type:'POST',
            data:{
                date1: $('#date1').val(),
                date2: $('#date2').val()
            },
            beforeSend:function(){
                $('#targetTable').html('<div class="alert alert-info">Memuat Data <span style="text-align:right"><i class="fa fa-spinner fa-pulse"></i></span></div>');
            },
            success:function(response){
                $('#targetTable').html(response);
            }
        });
    });

</script>