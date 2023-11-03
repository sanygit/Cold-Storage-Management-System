<style>
    .storage-image-field{
        width:calc(100%);
        height:25vh;
    }
    .storage-image{
        transition:transform .2s ease-in;
        width:calc(100%);
        height:calc(100%);
        object-fit:cover;
        object-position:center center;
    }
    .storage-item{
        transition:transform .2s ease-in;
    }
    .storage-item:hover{
        transform:scale(1.029)
    }
    .storage-item:hover .storage-image{
        transform:scale(1.2)
    }
</style>
<div class="content py-3">
    <div class="container-fluid">
        <h3 class="text-center"><b>Our Storages</b></h3>
        <hr class="bg-navy">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="input-group mb-2">
                    <input type="search" id="search" class="form-control form-control-border" placeholder="Search storage here...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-sm border-0 border-bottom btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-xl-4 justify-content-center gx-3 gy-3">
            <?php 
            $storages = $conn->query("SELECT * FROM storage_list where status = 1 order by `name` asc");
            while($row = $storages->fetch_assoc()):
            ?>
                <a class="col storage-item text-decoration-none text-dark" href="javascript:void(0)" data-id="<?= $row['id'] ?>">
                    <div class="card rounded-0 shadow">
                        <div class="text-center overflow-hidden storage-image-field">
                            <img class="img-top bg-gradient-dark border-info storage-image" src="<?php echo validate_image($row['thumbnail_path']) ?>" alt="Storage Image">
                        </div>
                        <div class="card-body rounded-0">
                            <h4 class="text-center"><b><?= ($row['name']) ?></b></h4>
                            <h5 class="text-center"><small class="text-muted"><i class="fa fa-tag"></i> <?= number_format($row['cost'],2) ?></small></h5>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
            <?php if($storages->num_rows < 1): ?>
                <center><span class="text-muted">No Storage Listed Yet.</span></center>
            <?php endif; ?>
                <div id="no_result" style="display:none"><center><span class="text-muted">No Result.</span></center></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#search').on("input",function(e){
            var _search = $(this).val().toLowerCase()
            $('.storage-item').each(function(){
                var _txt = $(this).text().toLowerCase()
                if(_txt.includes(_search) === true){
                    $(this).toggle(true)
                }else{
                    $(this).toggle(false)
                }
                if($('.storage-item:visible').length <= 0){
                    $("#no_result").show('slow')
                }else{
                    $("#no_result").hide()
                }
            })
        })
        $('.storage-item').click(function(){
            uni_modal("Storage's Details","view_storage.php?id="+$(this).attr('data-id'),'mid-large')
        })
    })
    
</script>