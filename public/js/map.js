
const ag_longitude = $('#js-ag_longitude').data();
const ag_latitude = $('#js-ag_latitude').data();
const dish_longitude = $('#js-dish_longitude').data();
const dish_latitude = $('#js-dish_latitude').data();

console.log(ag_longitude.name);


var map;
var marker = [];
var infoWindow = [];
var markerData = [ // マーカーを立てる場所名・緯度・経度
{
   name: '農家',
   lat: parseFloat(ag_latitude.name),
   lng: parseFloat(ag_longitude.name),
   icon: '../img/ag.png' //
 }, {
   name: '飲食店',
   lat: parseFloat(dish_latitude.name),
   lng: parseFloat(dish_longitude.name),
   icon: '../img/restaurant.png' //
 }
];
function initMap() {
 // 地図の作成
 var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']});
// 緯度経度のデータ作成
map = new google.maps.Map(document.getElementById('mapSample'), {
// 地図の中心を指定
center: mapLatLng,
// 地図のズームを指定
zoom: 10 });
// マーカー毎の処理
// 緯度経度のデータ作成
for (var i = 0; i < markerData.length; i++) {
   markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']});
   marker[i] = new google.maps.Marker({ // マーカーの追加
   position: markerLatLng, // マーカーを立てる位置を指定
   map: map // マーカーを立てる地図を指定
   });
   infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
content: '<div class="mapSample">' + markerData[i]['name'] + '</div>'
   });
   marker[i].setOptions({// TAM 東京のマーカーのオプション設定
    icon: {
     url: markerData[i]['icon']// マーカーの画像を変更
   }
  });
   infoWindow[i].open(map, marker[i]); // 吹き出しの表示
 }
}





// var MyLatLng = new google.maps.LatLng(ag_latitude.name, ag_longitude.name); //座標を指定
// //マーカーの指定
// var marker = new google.maps.Marker({
//   position: MyLatLng,
//   map: map, 
// });
// var Options = {
//  zoom: 15, //地図の縮尺値を指定
//  center: MyLatLng, //地図の中心座標
//  mapTypeId: 'roadmap', //地図の種類を指定
//  mapTypeControl: false, //マップタイプコントロールの表示設定

// };
//  var map = new google.maps.Map(document.getElementById('map'), Options); //埋め込むMAPのidを指定

//  //マーカーの指定
// var marker = new google.maps.Marker({
//   position: MyLatLng,
//   map: map, 
// });