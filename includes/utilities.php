<?php
function createSelect($name, array $a, $selected_inquiry){
    $select = '<select id="'.$name.'" name="'.$name.'">';

    foreach($a as $key => $value){
        $select.="<option";
        if ($selected_inquiry == $value){
            $select.= ' selected="selected"';
        }
        $select.=">"."$value"."</option>";
    }
    $select.="</select>";
    return $select;
}

$lower = implode(range('a','z'));
$upper = implode(range('A','Z'));
$number = implode(range(0, 9));
$symbols='$***!@!';
$chars=$lower.$upper.$numbers.$symbols;

function random_char($string){
    $i = mt_rand(0,strlen($string) -1);
    return $string[$i];
}

function temp_password($length, $chars){
    $temp_pw = '';
    for($i = 0; $i < $length; $i++){
        $temp_pw .= random_char($chars);
    }
    return $temp_pw;
}

?>