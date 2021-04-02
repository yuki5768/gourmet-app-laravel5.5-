<!DOCTYPE html>
<html lang="ja">
<head>
<title>検索結果</title>
<meta charset="utf-8">
</head>
<body>
@extends('common.layout')
<h1>検索結果</h1>
@if ($count > 0) <!-- 飲食店が1件以上見つかった場合の処理 -->
<p>飲食店が{{ $count }}件見つかりました。</p>
<p><a href="{{ route('result') }}">店舗一覧へ</a></p>
@else <!-- 飲食店が見つからない場合の処理 -->
<p>飲食店が見つかりませんでした</p>
@endif
<p><a href="{{ route('location') }}">最初に戻る</a></p>
</body>
</html>
