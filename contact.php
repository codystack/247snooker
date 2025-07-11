<?php
include "./components/header.php";
include "./components/navbardark.php";
?>

    <section class="py-15 py-xl-15">
        <div class="container mt-5 mt-lg-10">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1>Contact us! <br>Leave Us a Message</h1>
                    <p>Need support?<br>Have a question?<br>Running into a problem?<br>We’re here to help. <br>Our support team is on hand to take your queries and offer prompt resolutions.</p>
                    <hr class="my-4 fw-25 ml-0">
                    <ul class="list-group list-group-minimal">
                        <li class="list-group-item d-flex align-items-center">
                        <span class="w-25 text-muted">Address</span>
                        Abazillion Hotel, 6 Obagi Street GRA Phase 2, PHC.<br>
                        Brick Rock Hotel & Suites, 100 Ada-George Road, PHC.
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                        <span class="w-25 text-muted">Email</span>
                        snookerspotball247@gmail.com
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                        <span class="w-25 text-muted">Phone</span>
                        +234 901 387 0726
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                        <span class="w-25 text-muted">Instagram</span>
                        @247snookerng
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="media equal-1-1">
                        <div id="map1" class="map"></div>
                    </div>
                    <div class="card bg-black text-white">
                        <div class="card-body">
                            <h5>Abazillion Hotel, 6 Obagi Street GRA Phase 2, PHC.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function initMap() {
        var latlng = new google.maps.LatLng(4.82501, 6.99518);

        var myOptions = {
            zoom: 18,
            center: latlng,
            disableDefaultUI: true,
            styles: [
            {
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#f5f5f5"
                }
                ]
            },
            {
                "elementType": "labels.icon",
                "stylers": [
                {
                    "visibility": "off"
                }
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "color": "#616161"
                }
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                {
                    "color": "#f5f5f5"
                }
                ]
            },
            {
                "featureType": "administrative.land_parcel",
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "color": "#bdbdbd"
                }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#eeeeee"
                }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "color": "#757575"
                }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#e5e5e5"
                }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "color": "#9e9e9e"
                }
                ]
            },
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#ffffff"
                }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "color": "#757575"
                }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#dadada"
                }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "color": "#616161"
                }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "color": "#9e9e9e"
                }
                ]
            },
            {
                "featureType": "transit.line",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#e5e5e5"
                }
                ]
            },
            {
                "featureType": "transit.station",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#eeeeee"
                }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                {
                    "color": "#c9c9c9"
                }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels.text.fill",
                "stylers": [
                {
                    "color": "#9e9e9e"
                }
                ]
            }
            ]
        };

        var map = new google.maps.Map(document.getElementById("map1"), myOptions);

        map.panBy(-100, -40);

        var myMarker = new google.maps.Marker(
            {
            position: latlng,
            map: map,
            icon: 'assets/images/svg/pin.svg'
            });
        }
    </script>


<?php include "./components/footer.php" ?>