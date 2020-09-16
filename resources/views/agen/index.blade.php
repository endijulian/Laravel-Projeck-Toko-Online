@extends('layouts.template')

@section('title')
    Data Agen
@endsection

@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>


    <div class="row">
        <div class="col-md-12">
            <div class="small-box">

                <div class="box-header">

                </div>

                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Toko</th>
                                <th>Nama Pemilik</th>
                                <th>Alamat</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agen as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->nama_toko }}</td>
                                    <td>{{ $item->nama_pemilik }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->latitude }}</td>
                                    <td>{{ $item->longitude }}</td>
                                    <td><img class="img-thumbnail" src="{{asset('public/uploads/'.$item->gambar_toko)}}" width="100px;"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$agen->links()}}
 
                    <div id="map" style="width:100%; height:400px;"></div>

                        <script>
                            var locations = <?php echo $hasil_lat_long; ?>;
                            var map = L.map('map').setView([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}], 18);
                            mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';
                            L.tileLayer(
                                'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; ' + mapLink + ' Contributors',
                                maxZoom: 18,
                                }).addTo(map);

                            for (var i = 0; i < locations.length; i++) {
                                marker = new L.marker([locations[i][1],locations[i][2]])
                                    .bindPopup(locations[i][0])
                                    .addTo(map);
                            }

                    </script>
                </div>

            </div>
        </div>
    </div>

@endsection
