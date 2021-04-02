<!DOCTYPE html>
<html lang="ja">
<head>
<title>店舗一覧</title>
<meta charset="utf-8">
</head>
<body>
@extends('common.layout')
<h1>店舗一覧</h1>
@if (!empty($error)) <!-- errorが発生した場合の処理 -->
<p>{{ $error }}</p>
@else <!-- errorがなければ店舗一覧をテーブル表示 -->
<table border="1">
<tr>
<th>店舗名</th>
<th>アクセス</th>
<th>画像</th>
</tr>
@foreach ($shops as $shop)
<tr>
<td><a href="detail/{{ $shop->shop_id }}">{{ $shop->name }}</a></td> <!-- 店舗詳細へのリンク -->
<td>
<p>住所：{{ $shop->address }}</p>
<p>最寄駅：{{ $shop->station_name }}</p>
</td>
<td><img src="{{ $shop->logo_image }}"></td>
</tr>
@endforeach
</table>
{{ $shops->links() }} <!-- ページング用のリンク -->
@endif
<p><a href="{{ route('location') }}">最初に戻る</a></p>
</body>
</html>
