<?php
require_once('../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT b.*,s.name as storage, s.description as storage_description,s.thumbnail_path from `booking_list` b inner join `storage_list` s on b.storage_id = s.id where b.id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    $meta_qry = $conn->query("SELECT * FROM `booking_details` where booking_id = '{$id}'");
    if($meta_qry->num_rows > 0){
        while($row = $meta_qry->fetch_assoc()){
            ${$row['meta_field']} = $row['meta_value'];
        }
    }
    }
}
?>
<div class="container-fluid">
    <form action="" id="update_status_form">
        <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : "" ?>">
        <div class="form-group">
            <label for="status" class="control-label text-navy">Status</label>
            <select name="status" id="status" class="form-control form-control-border" required>
                <option value="0" <?= isset($status) && $status == 0 ? "selected" : "" ?>>Pending</option>
                <option value="1" <?= isset($status) && $status == 1 ? "selected" : "" ?>>Confirmed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="remarks" class="control-label text-navy">Remarks</label>
            <textarea name="remarks" id="remarks" rows="3" class="form-control form-control-sm rounded-0" style="resize:none" placeholder="Write your remarks here."><?= isset($remarks) ? $remarks : '' ?></textarea>
        </div>
    </form>
</div>
<script>
    $(function(){
        $('#update_status_form').submit(function(e){
            e.preventDefault()
            start_loader()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            $.ajax({
                url:_base_url_+"classes/Master.php?f=update_status",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("An error occured while saving the data,", "error")
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        location.reload()
                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    end_loader();
                }
            })
        })
    })
</script>