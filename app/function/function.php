<?php
	// $array_old = array(1, 2, 3, 6, 7);
	// $array_new = array(1, 3, 4, 5);

	// echo "<pre>";
	// print_r($arraynew);
	// echo "</pre>";

	// Mở composer.json
	// Thêm vào trong "autoload" chuỗi sau
	// "files": [
	//         "app/function/function.php"
	// ]

	// Chạy cmd : composer  dumpautoload
	function checkArrayold($array_old, $array_new){
		if(!empty($array_new)){
		foreach ($array_new as $keynew => $value_new) {
			foreach ($array_old as $keyold => $value_old) {
				if($value_new == $value_old){
					unset($array_old[$keyold]);
				}
			}
		}
	}
		return $array_old;
	}

	function checkArraynew($array_old, $array_new){
		if(!empty($array_new)){
			foreach ($array_new as $keynew => $value_new) {
				foreach ($array_old as $keyold => $value_old) {
					if($value_new == $value_old){
						unset($array_new[$keynew]);
					}
				}
			}
		}
		return $array_new;
	}
	
?>