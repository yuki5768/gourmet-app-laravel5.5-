<!DOCTYPE html>
<html lang="ja">
<head>
<title>現在地取得</title>
<meta charset="utf-8">
<script src="{{ asset('js/location.js') }}"></script> <!--jsファイル呼び出し -->
</head>
<body>
@extends('common.layout')
<h1>飲食店検索アプリ</h1>
<button onclick="getElement()" id="get">飲食店を検索する</button>
</body>
</html>
