function getElement() {
	var element = document.getElementById("get")
	navigator.geolocation.getCurrentPosition(positionSuccess, positionError); //GeolocationAPIにて位置情報を取得

	function positionSuccess(position) { //成功時の処理
		getmap = confirm("飲食店検索時に位置情報の利用を許可しますか？"); //取得開始のアラート
		if (getmap == true) {
			var lat = position.coords.latitude; //緯度
			var lng = position.coords.longitude; //経度
			if (lat && lng) {
				location.href="shop/search/" + lat + "/" + lng; //取得したらリダイレクト
			}
		} else {
			alert("またのご利用お待ちしています。");
		}
	}

	function positionError(error) { //失敗時の処理
		alert("位置情報が取得できません");
	}
}
