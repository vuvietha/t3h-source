<?php
	//hoc ve mang trong php - trong js khong co kieu array, array chinh la object
	//Khai bao mang mot chieu - tuan tu
	$arr = array('Tao','Man',1,100);
	$arr2 = ['Tao','Man',1,100]; // Dung voi phien ban 5.4 tro len

	//Khai bao mang mot chieu - khong tuan tu
	//key => value
	$arr3 = ['mot' => 1, 'hai' => 2, 'ba' => 3];
	$arr4 = array('tao' => 'tao', 'man' => 'man');

	//khai bao mang da chieu
	$arr5 = [
		[
			'name' => 'NTT',
			'age' => 28
		],
		[
			'name' => 'NVA',
			'age' => 20,
			'work' => ['PHP','JS','HTML','CSS']
		],
		100,
		200
	];

	//truy cap vao mot phan tu trong mang

	// echo $arr3['ba'];
	// echo "<br>";
	// echo $arr5[1]['work'][1];
	// echo "<br>";

	//Khong su dung key
	foreach($arr as $v){
		// echo "value: ${v} ";
		// echo "<br>";

	}
	//su dung key
	foreach($arr as $k => $v){
		// echo "key: {$k} - value: ${v} ";
		// echo "<br>";

	}

	$infoEmployees = [
		[
			'mnv'=>1,
			'name' => 'Test',
			'address' => 'HN',
			'idRoom' => 101,
			'gender' => 1,
			'money' => 1000,
			'idRank' => 200
		],
		[
			'mnv'=>2,
			'name' => 'NVA',
			'address' => 'HCM',
			'idRoom' => 102,
			'gender' => 2,
			'money' => 800,
			'idRank' => 202
		],
		[
			'mnv'=>3,
			'name' => 'NVC',
			'address' => 'ĐN',
			'idRoom' => 103,
			'gender' => 1,
			'money' => 600,
			'idRank' => 201
		]
	];

	$inforRooms = [
		[
			'mp' => 101,
			'nameRoom' => 'To chuc'
		],
		[
			'mp' => 102,
			'nameRoom' => 'Ke toan'
		],
		[
			'mp' => 103,
			'nameRoom' => 'Nhan su'
		]
	];
	$ranks =[
		[
			'mcv' => 200,
			'nameRank' => 'Giam doc'
		],
		[
			'mcv' => 201,
			'nameRank' => 'Truong phong'
		],
		[
			'mcv' => 202,
			'nameRank' => 'Nhan vien'
		]
	];
	//Xu ly de lay ten phong sang bang nhan vien
	foreach ($infoEmployees as $key => $val) {
		foreach ($inforRooms as $k => $v) {
			if($val['idRoom'] == $v['mp']){

				//Kiem tra xem nhan vien thuoc phong nao 
				//Lay thong tin la ten phong gan sang mang nhan vien
				$infoEmployees[$key]['nameRoom'] = $v['nameRoom'];

			}
		}
		foreach($ranks as $kr => $vr){
			if($val['idRank'] == $vr['mcv'] ){
				$infoEmployees[$key]['nameRank']  = $vr['nameRank'];
			}
		}
	}
	// echo "<pre>";
	// print_r($infoEmployees);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo array</title>
</head>
<body>
	<table width="100%" border="1" cellpadding="0" cellspacing="0">
		<caption>Infor Employment</caption>
		<thead>
			<tr>
				<th>Ma NV</th>
				<th>Name</th>
				<th>Address</th>
				<th>Name room</th>
				<th>Rank</th>
				<th>Gender</th>
				<th>Money</th>
			</tr>
		</thead>
		<tbody>
			<?php $total = 0;?>
			<?php foreach($infoEmployees as $key => $item):?>
				<?php $total+= $item['money'];
				$style = ($key%2==0)? "style='background-color:pink'" : "style='background-color:yellow'" ;?>
			<tr <?php echo $style;?>>
				<td><?= $item['mnv'];?></td>
				<td><?= $item['name'];?></td>
				<td><?= $item['address'];?></td>
				<td><?= $item['nameRoom'] ??'';?></td>
				<td><?= $item['nameRank'] ??'';?></td>
				<td><?= ($item['gender']==1)? 'Nam': 'Nữ';?></td>
				<td><?= number_format($item['money']);?></td>
			</tr>
			<?php endforeach?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan ="6">Total money</td>
				<td><?= number_format($total);?></td>
			</tr>
		</tfoot>
	</table>
</body>
</html>