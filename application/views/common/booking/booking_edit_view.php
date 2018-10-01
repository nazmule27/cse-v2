<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>
<div class="container padding-top-120">
    <h3 class="header-bg"> Room booking page</h3>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?php echo $this->session->flashdata('flash_data'); ?>
            <form action="<?=base_url();?>booking/update_booking/<?php echo $booking[0]->id;?>" method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Booking By *:</label>
                            <input type="text" name="booking_by" class="form-control" value="<?php echo $this->session->userdata('cse_username');?>" placeholder="Booking by *" required readonly>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Booking Room*:</label>
                            <select name="booking_room" class="form-control" required>
                                <option <?php if($booking[0]->room=="IAC LAB") echo " selected ";?> value="IAC LAB">IAC LAB</option>
                                <option <?php if($booking[0]->room=="IAC SEMINAR ROOM") echo " selected ";?> value="IAC SEMINAR ROOM">IAC SEMINAR ROOM</option>
                                <option <?php if($booking[0]->room=="GRADUATE SEMINAR ROOM") echo " selected ";?> value="GRADUATE SEMINAR ROOM">GRADUATE SEMINAR ROOM</option>
                                <option <?php if($booking[0]->room=="GRADUATE CLASS ROOM") echo " selected ";?> value="GRADUATE CLASS ROOM">GRADUATE CLASS ROOM</option>
                                <option <?php if($booking[0]->room=="SAMSUNG LAB") echo " selected ";?> value="SAMSUNG LAB">SAMSUNG LAB</option>
                                <option <?php if($booking[0]->room=="SEMINAR ROOM") echo " selected ";?> value="SEMINAR ROOM">SEMINAR ROOM</option>
                                <option <?php if($booking[0]->room=="KNUTH'S RESEARCH CORNER") echo " selected ";?> value="KNUTH'S RESEARCH CORNER">KNUTH'S RESEARCH CORNER</option>
                                <option <?php if($booking[0]->room=="RICHIE'S TWEETING CORNER") echo " selected ";?> value="RICHIE'S TWEETING CORNER">RICHIE'S TWEETING CORNER</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>Booking Detail *:</label>
                            <textarea name="booking_detail" placeholder="Booking detail *" class="form-control" required><?php echo $booking[0]->details;?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Booking Date*:</label>
                            <input type="text" name="booking_date" id="booking_date" pattern="\d{4}-\d{1,2}-\d{1,2}" class="form-control" value="<?php echo $booking[0]->bookingdate;?>" placeholder="Booking date *" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-group">
                            <label>Booking From *:</label>
                            <input type="text" name="booking_from" id="booking_from" class="form-control" value="<?php echo $booking[0]->bookingfrom;?>" placeholder="Booking from *" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="form-group">
                            <label>Booking To *:</label>
                            <input type="text" name="booking_to" id="booking_to" class="form-control" value="<?php echo $booking[0]->bookingto;?>" placeholder="Booking to *" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right">Update Booking</button>
            </form>
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
