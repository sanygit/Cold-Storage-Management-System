<?php
require_once('../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `storage_list` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none !important;
    }
    #thumb-path{
        width:calc(100%);
        height:40vh;
        object-fit:scale-down;
        object-position:center center;
    }
</style>
<div class="container-fluid">
    <dl>
        <dt class="text-muted"></dt>
        <dd class="text-center">
            <img src="<?= validate_image($thumbnail_path ? $thumbnail_path : "") ?>" alt="Thumbnail Path" class="img-thumbnail bg-gradient-black" id="thumb-path">
        </dd>
        <dt class="text-muted">Name</dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($name) ? $name : '' ?></dd>
        <dt class="text-muted">Cost <i class="fa fa-tags"></i></dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($cost) ? number_format($cost,2) : '' ?></dd>
        <dt class="text-muted">Description</dt>
        <dd class='pl-4'>
            <p class=""><small><?= isset($description) ? html_entity_decode($description) : '' ?></small></p>
        </dd>
        <dt class="text-muted">Status</dt>
        <dd class='pl-4'>
            <?php
            if(isset($status)):
                switch($status){
                    case '1':
                        echo "<span class='badge badge-success badge-pill'>Availble</span>";
                        break;
                    case '0':
                        echo "<span class='badge badge-warning badge-pill'>Unavailable</span>";
                        break;
                }
            endif;
            ?>
        </dd>
    </dl>
    <div class="col-12 text-right">
        <button class="btn btn-flat btn-sm btn-dark" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>