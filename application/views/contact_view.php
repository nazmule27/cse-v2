<?php
$this->load->view('common/header');
$this->load->view('common/navbar');
?>

<div class="container padding-top-120">
    <div class="row">
        <div class=" col-lg-12 col-md-12 col-sm-12">
            <footer>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 contact-right">
                                <h4>Cotact Us</h4>
                                <b>Postal:</b>
                                <p>The Head,</p>
                                <p>Department of Computer Science and Engineering,</p>
                                <p>ECE Building, West Polashi,</p>
                                <p>Bangladesh University of Engineering and Technology,</p>
                                <p>Dhaka-1000, Bangladesh.</p>
                            </div>
                            <div class="col-md-6">
                                <h4>&nbsp;</h4>
                                <b>Digital:</b>
                                <p>Telephone: 880-2-9665612</p>
                                <p>PABX: 9665650-80 Ext: 6432</p>
                                <p>Fax: 880-2-9665612</p>
                                <p>E-mail: headcse@cse.buet.ac.bd</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
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
            </footer>
        </div>
    </div> <!--row end-->
<!-- /contact -->
<?php
$this->load->view('common/footer');
?>
