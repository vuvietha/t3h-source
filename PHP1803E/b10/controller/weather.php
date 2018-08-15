<?php
require '../api/api.php';

$nameCity = $_POST['name'] ?? '';
$nameCity = strip_tags($nameCity);

$data = getDataFromAPI($nameCity);
$listWearther = isset($data['list']) ? $data['list'] : [];

require '../view/weather_view.php';
?>