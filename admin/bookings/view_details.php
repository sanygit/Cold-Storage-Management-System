<?php
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
<div class="content py-3">
    <div class="card card-outline card-dark rounded-0">
        <div class="card-header rounded-0">
            <h5 class="card-title text-primary">Booking Details of <?= isset($book_code) ? $book_code : "" ?></h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div id="outprint">
                    
                    <style>
                        #thumb-img-storage{
                            width:50vw;
                            height:40vh;
                            object-fit:scale-down;
                            object-position:center center;
                        }
                    </style>
                    <div class="text-info">Booking Code</div>
                    <h4 class=""><b><?= isset($book_code) ? $book_code : "" ?></b></h4>
                    <hr class="">
                    <fieldset>
                        <legend class="text-info">Client's Information</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <dl>
                                    <dt class="text-muted">Full Name</dt>
                                    <dd class='pl-4 fs-4 fw-bold'><?= isset($client_name) ? $client_name : '' ?></dd>
                                    <dt class="text-muted">Gender</dt>
                                    <dd class='pl-4 fs-4 fw-bold'><?= isset($gender) ? $gender : '' ?></dd>
                                    <dt class="text-muted">Birthday</dt>
                                    <dd class='pl-4 fs-4 fw-bold'><?= isset($child_dob) ? date("M d, Y",strtotime($child_dob)) : '' ?></dd>
                                </dl>
                            </div>
                            <div class="col-md-6">
                                <dl>
                                    <dt class="text-muted">Contact #</dt>
                                    <dd class='pl-4 fs-4 fw-bold'><?= isset($contact) ? $contact : '' ?></dd>
                                    <dt class="text-muted">Email</dt>
                                    <dd class='pl-4 fs-4 fw-bold'><?= isset($email) ? $email : '' ?></dd>
                                    <dt class="text-muted">Address</dt>
                                    <dd class='pl-4 fs-4 fw-bold'><?= isset($address) ? $address : '' ?></dd>
                                </dl>
                            </div>
                        </div>
                    </fieldset>
                    <hr class="">
                    <fieldset>
                        <legend class="text-info">Booking Information</legend>
                        <hr>
                        <table class="table table-bordered">
                            <colgroup>
                                <col width="30%">
                                <col width="70%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th colspan="2" class="text-center"><b>Cold Storage</b></th>
                                </tr>
                                <tr>
                                    <th colspan='2' class="text-center">
                                        <img src="<?= validate_image(isset($thumbnail_path) ? $thumbnail_path :'') ?>" alt="Thumbnail" class="img-fluid bg-gradient-black" id="thumb-img-storage">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td><?= isset($storage) ? $storage : "" ?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?= isset($storage_description) ? html_entity_decode($storage_description) : "" ?></td>
                                </tr>
                                <tr>
                                    <th>Cost</th>
                                    <td class="text-right"><?= isset($cost) ? number_format($cost) : "" ?></td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center"><b>Schedule</b></th>
                                </tr>
                                <tr>
                                    <th>Date From</th>
                                    <td class="text-right"><?= isset($date_from) ? date("mm-d-Y",strtotime($date_from)) : "" ?></td>
                                </tr>
                                <tr>
                                    <th>Date To</th>
                                    <td class="text-right"><?= isset($date_to) ? date("mm-d-Y",strtotime($date_to)) : "" ?></td>
                                </tr> 
                                <tr>
                                    <th>Days</th>
                                    <td class="text-right"><?= isset($storing_days) ? number_format($storing_days) : "" ?></td>
                                </tr> 
                                <tr>
                                    <th colspan="2" class="text-center"><b>Payable Amount</b></th>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center"><b><?= isset($amount) ? number_format($amount,2) : 0.00 ?></b></th>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                    <hr class="">
                    <div class="text-muted">Status</div>
                    <div class="pl-4">
                        <?php
                            switch($status){
                                case '1':
                                    echo "<span class='badge badge-primary badge-pill'>Confirmed</span>";
                                    break;
                                case '0':
                                    echo "<span class='badge badge-secondary badge-pill'>Pending</span>";
                                    break;
                            }
                        ?>
                    </div>
                    <?php if(isset($remarks)): ?>
                    <div class="text-muted">Remarks</div>
                    <p class="pl-4"><?= $remarks ?></p>
                    <?php endif; ?>
                </div>
                <div class="rounded-0 text-center">
                        <button class="btn btn-sm btn-success btn-flat" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                        <button class="btn btn-sm btn-primary btn-flat" type="button" id="update_status"><i class="fa fa-edit"></i> Update Status</button>
                        <a class="btn btn-light border btn-flat btn-sm" href="./?page=bookings" ><i class="fa fa-angle-left"></i> Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#update_status').click(function(){
            uni_modal("Update <b><?= isset($book_code) ? $book_code : "" ?>\'s</b> Status","bookings/update_status.php?id=<?= isset($id) ? $id : "" ?>","mid-large")
        })
        $('#print').click(function(){
            var _h = $("head").clone()
            var _p = $('#outprint').clone()
            var el = $("<div>")
            start_loader()
            $('script').each(function(){
                if(_h.find('script[src="'+$(this).attr('src')+'"]').length <= 0){
                    _h.append($(this).clone())
                }
            })
            _h.find('title').text("booking's Details - Print View")
            _p.prepend("<hr class='border-navy '>")
            _p.prepend("<div class='mx-5 py-4'><h1 class='text-center'>Booking Details</h1>"
                        +"<h5 class='text-center'><?= isset($book_code) ? $book_code : "" ?></h5></div>")
            _p.prepend("<img src='<?= validate_image($_settings->info('logo')) ?>' id='print-logo' />")
            el.append(_h)
            el.append(_p)

            var nw = window.open("","_blank","height=800,width=1200,left=200")
                nw.document.write(el.html())
                nw.document.close()
                setTimeout(()=>{
                    nw.print()
                    setTimeout(() => {
                        nw.close()
                        end_loader()
                    }, 300);
                },300)
        })
    })
</script>