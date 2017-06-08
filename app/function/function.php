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
	
	function sanitizeTitle($string) {
        if(!$string) return false;
        $utf8 = array(
                'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                'd'=>'đ|Đ',
                'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
                'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
                );
        foreach($utf8 as $ascii=>$uni) $string = preg_replace("/($uni)/i",$ascii,$string);
        $string = utf8Url($string);
        return $string;
    }
 
    function utf8Url($string){        
        $string = strtolower($string);
        $string = str_replace( "ß", "ss", $string);
        $string = str_replace( "%", "", $string);
        $string = preg_replace("/[^_a-zA-Z0-9 -]/", "",$string);
        $string = str_replace(array('%20', ' '), '-', $string);
        $string = str_replace("----","-",$string);
        $string = str_replace("---","-",$string);
        $string = str_replace("--","-",$string);
        return $string;
    }    

    function getUsername($name){
    	$name = sanitizeTitle(trim($name));
        $name = explode("-", $name);
        $count = count($name);
        $username = $name[$count-1];
        for($i = 0; $i < $count - 1; $i++){
            $temp = substr($name[$i], 0, 1);
            $username .= $temp;
        }
        return $username;
    }
?>