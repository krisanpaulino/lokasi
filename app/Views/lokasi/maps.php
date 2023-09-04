<?= $this->extend('layout'); ?>
<?= $this->section('content'); ?>
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('lokasi') ?>">Lokasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
    </ol>
</nav>
<?php if (session()->has('success')) : ?>
    <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
        <div class="text-white"><?= session('success') ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>
<?php if (session()->has('danger')) : ?>
    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
        <div class="text-white"><?= session('danger') ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Peta User</h6>
                <!-- <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                <!-- <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <td>Waktu</td>
                                <td>Lat</td>
                                <td>Long</td>
                                <td>Lokasi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lokasi as $l) : ?>
                                <tr>
                                    <td><?= $l->lokasi_created_at ?></td>
                                    <td><?= $l->lokasi_latitude ?></td>
                                    <td><?= $l->lokasi_longitude ?></td>
                                    <td><?= $l->lokasi_nama ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> -->

                <div class="content">
                    <!-- <div class="container mt-5">
                        <h3>Peta sebaran sekolah</h3>
                    </div> -->
                    <!--/#UNTUK PETA GOOGLE MAPS-->
                    <div class="container" style="margin-bottom: 50px; margin-top: 20px;">
                        <div id="map" style="width:100%;height:600px;"></div>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9CASihanCphq2R0nIAHMU1jpA_I9X2rk"></script>
                        <script>
                            function initialize() {
                                var mapOptions = {
                                    center: new google.maps.LatLng(-10.179780, 123.623475),
                                    zoom: 12
                                };
                                var mapElement = document.getElementById('map');
                                var map = new google.maps.Map(mapElement, mapOptions);
                                setMarkers(map, officeLocations);
                            }
                            var officeLocations = [
                                <?php
                                // $sql = mysqli_query($con, "SELECT * FROM sekolah");
                                foreach ($lokasi as $l) :

                                ?>[<?php echo $l->lokasi_id; ?>, '<?php echo $l->lokasi_nama; ?>', '<?php echo $l->lokasi_created_at; ?>', <?php echo $l->lokasi_latitude; ?>, <?php echo $l->lokasi_longitude; ?>],

                                <?php
                                endforeach;
                                ?>
                            ];

                            function setMarkers(map, locations) {

                                for (var i = 0; i < locations.length; i++) {

                                    var office = locations[i];
                                    var myLatLng = new google.maps.LatLng(office[3], office[4]);
                                    var infowindow = new google.maps.InfoWindow({
                                        content: contentString
                                    });

                                    var contentString =
                                        '<div id="content">' +
                                        '<div id="siteNotice">' +
                                        '</div>' +
                                        '<h4 align="center">' + office[1] + '</h4>' +
                                        '<p align="center">' + office[2] + '</p>' +
                                        '<div id="bodyContent">' +
                                        '<div class="card" style="width: 18rem;">' +
                                        '' +
                                        '<div class="">' +
                                        '' +
                                        '</div>' +
                                        '<center>' +
                                        '<a href=' + office[0] + '><h7><font color=grey></font></h7></a>' +
                                        '</center>' +
                                        '</div>' +
                                        '</div>' +
                                        '</div>';

                                    var marker = new google.maps.Marker({
                                        position: myLatLng,
                                        map: map,
                                        title: office[1]
                                    });

                                    google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
                                }
                            }

                            function getInfoCallback(map, content) {
                                var infowindow = new google.maps.InfoWindow({
                                    content: content
                                });
                                return function() {
                                    infowindow.setContent(content);
                                    infowindow.open(map, this);
                                };
                            }

                            initialize();
                        </script>
                    </div>
                    <!--/#UNTUK PETA GOOGLE MAPS-->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>