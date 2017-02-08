@extends('layouts.layout')
@section('title', 'Helyszín')
@section('icon', 'map-marker')
@section('content')
    <h3>Schönherz Zoltán Kollégium Földszinti Nagyterme</h3>
    <div id="map"></div>
@endsection
@push('scripts')
    <script type="text/javascript">
        function initMap() {
            var locSch = { lat: 47.473018, lng: 19.053242 };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: locSch
            });

            new google.maps.Marker({
                position: locSch,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>
@endpush