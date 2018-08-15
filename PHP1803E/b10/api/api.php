<?php
// noi nay se xu ly lay du lieu tu api - service bang CURL PHP
function getDataFromAPI($nameCity){
    // can co api - service
    $urlApi = "http://api.openweathermap.org/data/2.5/forecast?q={$nameCity}&appid=073f342f34bacc8898356a523fa5b4f8&units=metric&lang=vi";
    // khoi tao CURL
    $ch = curl_init();
    // cau hinh CURL
    // toi mo ra - di vao service api
    curl_setopt($ch, CURLOPT_URL, $urlApi);
    // ket qua tra ve se hien thi o ham exec neu la true - nguoc lai ket qua se hien thi ngay khi api respone
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    // quy uoc thoi gian ma doi api tra ve ket qua
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    // thuc thi - lay du lieu ve
    $res = curl_exec($ch);
    // ngat ket noi
    curl_close($ch);

    $data = ($res !== null OR $res !== '') ? json_decode($res, true) : [];
    return $data;
}

?>