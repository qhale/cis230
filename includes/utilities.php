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



?>