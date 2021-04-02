<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller {


	public function location() {
		return view('location');
	}

	public function search($lat, $lng) {
		return view('search', compact('lat', 'lng'));
	}

	public function shopsRegister(Request $request) {
		$lat = $request->input('lat'); //緯度
		$lng = $request->input('lng'); //経度
		$range = $request->input('range'); //検索範囲
		$url = "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key={api_key}&lat=" . $lat . "&lng=" . $lng . "&range=" . $range . "&order=4&count=25" . "&format=json"; //検索URL

		$ch = curl_init();  //ホットペッパーAPIから飲食店情報を取得
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$results = curl_exec($ch);
		$json = json_decode(file_get_contents($url));
		curl_close($ch);

		$now = date("Y-m-d H:i:s"); //現在時刻取得
		$token = rand(0, 100) . uniqid(); //トークン生成
		$count = count($json->results->shop); //飲食店の数を取得

		if ($count > 0) { //飲食店の数が1件以上あればDBへ登録
			foreach ($json->results->shop as $shop) { //飲食店をループ処理でDBへ登録
				$params = [
					'shop_id' => $shop->id, //店舗ID
					'name' => $shop->name,//店舗名
					'address' => $shop->address, //店舗住所
					'station_name' => $shop->station_name, //最寄駅
					'logo_image' => $shop->logo_image, //画像URL
					'token' => $token, //トークン
					'created_at' => $now,
					'updated_at' => $now,
				];
				DB::table('shops')->insert($params);
			}

			$key = $request->session()->put('key', $token); //セッションキーにトークンにする
		}
		return view('shops_register', compact('count'));
	}

	public function result() {
		if (!empty(session('key'))) { //セッションkeyの存在チェック
			$token = session('key'); //セッションkeyを変数へ代入
			if (DB::table('shops')->where('token', $token)->exists()) { //DBにトークンに対応するデータがあれば取得
				$shops = DB::table('shops')->select('shop_id', 'name', 'address', 'station_name', 'logo_image')->where('token', $token)->simplePaginate(5); //DBから飲食店情報を5件ずつ取得
				return view('result', compact('shops'));
			} else { //DBに飲食店情報がなかった場合
				$error = '飲食店が見つかりませんでした。';
				return view('result', compact('error'));
			}
		} else { //セッションkeyがない場合locationへリダイレクト
			return redirect()->route('location');
		}
	}

	public function detail($shop_id) {
		$url = "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key={api_key}&id=" . $shop_id . "&format=json"; //検索URL
		$ch = curl_init(); //ホットペッパーAPIから飲食店情報を取得
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$results = curl_exec($ch);
		$json = json_decode(file_get_contents($url));
		curl_close($ch);
		return view('detail', compact('json'));
	}

	public function map($shop_lat, $shop_lng) {
		return view('map', compact('shop_lat', 'shop_lng'));
	}
}
