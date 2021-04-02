<!DOCTYPE html>
<html lang="ja">
<head>
<title>検索結果</title>
<meta charset="utf-8">
</head>
<body>
@extends('common.layout')
<h1>飲食店詳細</h1>
@if (!empty($json->results->shop)) <!-- jsonデータがあれば店舗詳細をテーブル表示 -->
<table border="1" id="shops">
<tr>
<th>店名</th>
<th>住所</th>
<th>営業時間</th>
<th>店舗画像</th>
</tr>
@foreach ($json->results->shop as $shop)
<tr>
<td>{{ $shop->name }}</td> <!-- 店名 -->
<td>{{ $shop->address }}</td> <!-- 飲食店の住所 -->
<td>{{ $shop->open }}</td> <!-- 営業時間 -->
<td><img src="{{ $shop->photo->mobile->l }}"></td> <!-- 飲食店画像 -->
</tr>
@endforeach
</table>
<p><a href="{{ $shop->urls->pc }}">ホットペッパーサイトへ</a></p> <!-- ホットペッパーサイトURL -->
<p><a href="../map/{{ $shop->lat }}/{{ $shop->lng }}/">地図で見る</a></p> <!-- ホットペッパーサイトURL -->
@else <!-- jsonデータがなかった場合の処理 -->
<p>飲食店が見つかりませんでした。</p>
@endif
<p><a href="{{ route('location') }}">最初に戻る</a></p>
</body>
</html>
