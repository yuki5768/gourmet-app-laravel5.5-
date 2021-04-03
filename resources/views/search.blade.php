<!DOCTYPE html>
<html lang="ja">
<head>
<title>グルメサーチ</title>
<meta charset="utf-8">
</head>
<body>
@extends('common.layout')
@if (!empty($lat) && !empty($lng)) <!-- $latと$lngがある場合の処理 -->
<h2>検索範囲を選択してください</h2>
<form method="POST" action="{{ route('shop_register') }}">
{{ csrf_field() }}
<p><input type="hidden" name="lat" value={{ $lat }}></p> <!-- {{ $lat }}を送信 -->
<p><input type="hidden" name="lng" value={{ $lng }}></p> <!-- {{ $lng }}を送信 -->
<p>※範囲を選択しない場合3000m以内の飲食店を自動的に検索します。</p>
<p>※最大25件まで検索できます。</p>
<select name="range">
<option value="5">検索範囲を選択</option>
<option value="1">300m以内</option>
<option value="2">500m以内</option>
<option value="3">1000m以内</option>
<option value="4">2000m以内</option>
<option value="5">3000m以内</option>
</select>
<p><input type="submit" value="検索"></p>
</form>
@else <!-- $latと$lngがない場合の処理 -->
<p>不正なアクセスです。</p>
@endif
<p><a href="{{ route('location') }}">最初に戻る</a></p>
</body>
</html>
