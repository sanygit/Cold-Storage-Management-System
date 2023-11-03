<div class="content py-3">
    <div class="container-fluid">
        <h3 class="text-center"><b>Application Form</b></h3>
        <hr class="bg-navy">
        <?php if($_settings->chk_flashdata('pop_msg')): ?>
            <div class="alert alert-success">
                <i class="fa fa-check mr-2"></i> <?= $_settings->flashdata('pop_msg') ?>
            </div>
            <script>
                $(function(){
                    $('html, body').animate({scrollTop:0})
                })
            </script>
        <?php endif; ?>
        <div class="card card-outline card-info rounded-0 shadow">
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <form action="" id="booking-form">
                        <input type="hidden" name="id" value="">
                        <fieldset>
                            <legend class="text-info">Client's Information</legend>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <input type="text" id="firstname" name="firstname" autofocus class="form-control form-control-sm form-control-border" placeholder="Firstname" required>
                                    <small class="text-muted px-4">First Name</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" id="middlename" name="middlename" class="form-control form-control-sm form-control-border" placeholder="(optional)">
                                    <small class="text-muted px-4">Middle Name</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" id="lastname" name="lastname" class="form-control form-control-sm form-control-border" placeholder="Last Name" required>
                                    <small class="text-muted px-4">Last Name</small>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-md-4 form-group">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <small class="text-muted">Gender</small>
                                        </div>
                                        <div class="form-group col-auto">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="genderMale" name="gender" value="Male" required checked>
                                                <label for="genderMale" class="custom-control-label">Male</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-auto">
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="genderFemale" name="gender" value="Female">
                                                <label for="genderFemale" class="custom-control-label">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <input type="date" id="dob" name="dob" class="form-control form-control-sm form-control-border" required>
                                    <small class="text-muted px-4">Date of Birthday</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <input type="text" id="contact" name="contact" class="form-control form-control-sm form-control-border" placeholder="Contact" required>
                                    <small class="text-muted px-4">Contact #</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" id="email" name="email" class="form-control form-control-sm form-control-border" placeholder="Email" required>
                                    <small class="text-muted px-4">Email</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <small class="text-muted">Address</small>
                                    <textarea name="address" id="address" rows="3" style="resize:none" class="form-control form-control-sm rounded-0" placeholder="Here Street, There City, Anywhere State, 2306"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="text-info">Booking Information</legend>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <small class="text-muted px-4">Cold Storage</small>
                                    <select name="storage_id" id="storage_id" class="form-control form-control-border select2" data-placeholder="Please Select Storage Here" required>
                                        <option value="" disabled selected></option>
                                        <?php 
                                        $storage_arr = [];
                                        $storage = $conn->query("SELECT * FROM `storage_list` where status =1 order by `name` asc ");
                                        while($row = $storage->fetch_assoc()):
                                            $row['description'] = addslashes(html_entity_decode($row['description']));
                                            $storage_arr[$row['id']] = $row;
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <small class="text-muted px-4">Type</small>
                                    <select name="type" id="type" class="form-control form-control-border select2" data-placeholder="Please Select Type Here" required>
                                        <option value="" disabled selected></option>
                                        <option>Fruits</option>
                                        <option>Grains</option>
                                        <option>Pulses</option>
                                        <option>Vegetables</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <input type="date" id="date_from" name="date_from" class="form-control form-control-sm form-control-border" placeholder="Date From" required>
                                    <small class="text-muted px-4">Date From</small>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="date" id="date_to" name="date_to" class="form-control form-control-sm form-control-border" placeholder="Date To" required>
                                    <small class="text-muted px-4">Date To</small>
                                </div>
                            </div>
                            <hr class="">
                            <table class="table table-bordered" id="other-info">
                                <colgroup>
                                    <col width="30%">
                                    <col width="70%">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th>Cold Storage Description </th>
                                        <td id="storage-description">-----</td>
                                    </tr>
                                    <tr>
                                        <th>Cold Storage Cost <small>(per day)</small><input type="hidden" name="cost"></th>
                                        <td id="storage-cost" class="text-right">--</td>
                                    </tr>
                                    <tr>
                                        <th>Days of Storing <input type="hidden" name="storing_days"></th>
                                        <td id="storage-days" class="text-right">--</td>
                                    </tr>
                                    <tr>
                                        <th>Total Payable Amount <input type="hidden" name="amount"></th>
                                        <td id="storage-amount" class="text-right">----</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <small class="text-muted">Other Information</small>
                                    <textarea name="other_info" id="other_info" rows="3" style="resize:none" class="form-control form-control-sm rounded-0" placeholder="Write the other information if any here."></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <hr class="bg-navy">
                        <center>
                            <button class="btn btn-sm bg-primary btn-flat mx-2 col-3">Submit Booking</button>
                            <a class="btn btn-sm btn-light border btn-flat mx-2 col-3" href="./">Cancel</a>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var storage = $.parseJSON('<?= json_encode($storage_arr) ?>');
    function calc_amount(){
        var days = $('input[name="storing_days"]').val()
        var cost = $('input[name="cost"]').val()
        var amount = 0
        if(days > 0 && cost > 0){
            amount = parseFloat(cost) * parseFloat(days)
        }
        $('#storage-amount').text(parseFloat(amount).toLocaleString('en-US',{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
        $('input[name="amount"]').val(amount)
    }
    function submit_booking(){
        var _this = $("#booking-form")
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_booking",
				data: new FormData($("#booking-form")[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
                success:function(resp){
                    if(resp.status == 'success'){
                        location.reload();
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
                    $('html, body').animate({scrollTop:0},'fast')
                    end_loader();
                }
            })
    }
    $(function(){
        $('.select2').each(function(){
            var _this = $(this)
            _this.select2({
                placeholder:_this.attr('data-placeholder') || 'Please Select Here',
                width:'100%'
            })
        })
        $('#storage_id').change(function(){
            var sid = $(this).val()
            if(!!storage[sid]){
                var data = storage[sid]
                $('#storage-description').html(data.description)
                $('#storage-cost').text(parseFloat(data.cost).toLocaleString('en-US',{style:'decimal',minimumFractionDigits:2,maximumFractionDigits:2}))
                $('input[name="cost"]').val(data.cost)
            }
            calc_amount()
        })
        $('#date_from,#date_to').change(function(){
            var date_from = $('#date_from').val()
            var date_to = $('#date_to').val()
            var days = 0;
            if(date_from != '' && date_to != ''){
                date_from = new Date(date_from)
                date_to = new Date(date_to)
                var diff = date_to.getTime() - date_from.getTime();
                days = Math.floor(diff / (1000 * 3600 * 24))
            }

            $('input[name="storing_days"]').val(days)
            $('#storage-days').text((days).toLocaleString('en-US'))
            calc_amount()
        })
        $('#booking-form').submit(function(e){
            e.preventDefault()
            _conf("Please make sure that you have reviewed the form before you continue to submit the booking.","submit_booking",[])
            
        })
    })
</script>