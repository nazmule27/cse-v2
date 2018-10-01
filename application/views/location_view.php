<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <h3 class="header-bg">Location:</h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p>
                <img class="location-width" src="<?=base_url();?>assets/img/ece_building2.jpg" alt="">
                The BUET campus is in the heart of the capital of Dhaka. It has a compact campus with halls of residences within walking distances of the academic buildings. At present the campus occupies 76.85 acres(31.1 hectares) of land. The academic area is defined by Shahid Sharani, Bakshi Bazar Road and Asian Highway.
            </p>
            <p>The Department of Computer Science and Engineering is located on the West wing of the New Academic Building (West Palashi) of BUET. It is a twelve storied building. The undergraduate class rooms occupy the first and second floors whereas the labs are located on the ground and fourth floors. The graduate class rooms and labs are located on the fifth floor. <a href="http://cse.buet.ac.bd/iac">Bangladesh Korea Information Access Center</a> is situated in the ground floor. The departmental office is located on the third floor. There is also a departmental library on the ground floor. </p>

            <div class="row">
                <div class="col-md-12">
                    <h4 class="pull-left">In Google map:</h4>
                    <div id="googleMap" style="width:100%;height:420px;"></div>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-NrPlnLQ1tODXaL0LyXypImYsI-NNXNA"></script>
                    <script type="text/javascript">
                        var locations = [
                            ['Department of Computer Science and Engineering', 23.7266571,90.3880373, 1]
                        ];
                        var map = new google.maps.Map(document.getElementById('googleMap'), {
                            zoom: 19,
                            center: new google.maps.LatLng(23.7265571,90.3881373),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });
                        var infowindow = new google.maps.InfoWindow();
                        var marker, i;
                        for (i = 0; i < locations.length; i++) {
                            marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                map: map
                            });
                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                    infowindow.setContent(locations[i][0]);
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                        }
                    </script>
                </div>
            </div>

        </div>
    </div> <!--row end-->

    <?php
    $this->load->view('common/footer');
    ?>
