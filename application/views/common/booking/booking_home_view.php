<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container padding-top-120">
    <h3 class="header-bg"> Room booking page</h3>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php echo $this->session->flashdata('flash_data'); ?>
            <form action="<?=base_url();?>booking/save_booking" method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Booking By *:</label>
                            <input type="text" name="booking_by" class="form-control" value="<?php echo $this->session->userdata('cse_username');?>" placeholder="Booking by *" required >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Booking Room*:</label>
                            <select name="booking_room" class="form-control" required>
                                <option value="IAC LAB">IAC LAB</option>
                                <option value="IAC SEMINAR ROOM">IAC SEMINAR ROOM</option>
                                <option value="GRADUATE SEMINAR ROOM">GRADUATE SEMINAR ROOM</option>
                                <option value="GRADUATE CLASS ROOM">GRADUATE CLASS ROOM</option>
                                <option value="SAMSUNG LAB">SAMSUNG LAB</option>
                                <option value="SEMINAR ROOM">SEMINAR ROOM</option>
                                <option value="KNUTH'S RESEARCH CORNER">KNUTH'S RESEARCH CORNER</option>
                                <option value="RICHIE'S TWEETING CORNER">RICHIE'S TWEETING CORNER</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Booking Detail *:</label>
                            <textarea name="booking_detail" placeholder="Booking detail *" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Booking Date*:</label>
                            <input type="text" name="booking_date" id="booking_date" pattern="\d{4}-\d{1,2}-\d{1,2}" class="form-control" placeholder="Booking date *" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-group">
                            <label>Booking From *:</label>
                            <input type="text" name="booking_from" id="booking_from" class="form-control" placeholder="Booking from *" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-group">
                            <label>Booking To *:</label>
                            <input type="text" name="booking_to" id="booking_to" class="form-control" placeholder="Booking to *" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right">Book Now</button>
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <center><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Show Booking</button></center>
                    <br>
                    <div id="demo" class="collapse">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Booked by</th>
                                <th>Room</th>
                                <th>Event Date</th>
                                <th>Time</th>
                                <th>Detail</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $k=1; for ($i = 0; $i < count($bookings); ++$i) {?>
                                    <tr>
                                        <td><?php echo $k?></td>
                                        <td><?php echo $bookings[$i]->bookingby?></td>
                                        <td><?php echo $bookings[$i]->room?></td>
                                        <td><?php echo $bookings[$i]->bookingdate?></td>
                                        <td><?php echo $bookings[$i]->bookingfrom.' - '.$bookings[$i]->bookingto?></td>
                                        <td><?php echo $bookings[$i]->details?></td>
                                        <?php
                                        $cls="";
                                        if($bookings[$i]->entryby!==$this->session->userdata('cse_username')){
                                            $cls="display-none";
                                        }
                                        ?>
                                        <td><a class="<?php echo $cls;?>" target="_blank" href="<?=base_url();?>booking/edit_booking/<?php echo $bookings[$i]->id?>">Edit</a></td>
                                    </tr>
                            <?php $k++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?=base_url();?>assets/js/datetimepicker/jquery.datetimepicker.js"></script>
        <script>
            $('#booking_date').datetimepicker({
                format:'Y-m-d',
                timepicker:false,
                dayOfWeekStart : 6,
                lang:'en',
                minDate: new Date(),
                step:10,
                closeOnDateSelect:true,
            });
            $('#booking_from').datetimepicker({
                format:'H:i:s',
                datepicker:false,
                closeOnTimeSelect:true,
                step:30,
                onShow:function( ct ){
                    this.setOptions({
                        maxTime:$('#booking_to').val().substr(0,8)?$('#booking_to').val().substr(0,8):false
                    })
                }
            });
            $('#booking_to').datetimepicker({
                format:'H:i:s',
                datepicker:false,
                closeOnTimeSelect:true,
                step:30,
                onShow:function( ct ){
                    this.setOptions({
                        minTime:$('#booking_from').val().substr(0,8)?$('#booking_from').val().substr(0,8):false
                    })
                }
            });
        </script>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
