<!DOCTYPE html>
<html lang="ja">
<head>
<title>店舗所在地</title>
<meta charset="utf-8">
<style>
#gmap {
  height: 400px;
  width: 600px;
}
</style>
</head>
<body>
@extends('common.layout')
<h1>店舗所在地</h1>
<div id="gmap"></div>
<script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={api_key}&callback=initMap" async defer></script> <!-- GoogleマップURL -->
<script>
var map;
function initMap() {
	var target = document.getElementById('gmap');
	var shop_location = {lat: {{ $shop_lat }}, lng: {{ $shop_lng }}};
	map = new google.maps.Map(target, {
		center: shop_location,
		zoom: 14
	});

	marker = new google.maps.Marker({
		position: shop_location,
		map: map
	});
}
</script>
<p><a href="{{ route('location') }}">最初に戻る</a></p>
</body>
</html>
