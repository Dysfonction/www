<?php 

function input ($type, $name){}

function submit ($name, $value, $class='btn-default'){
	$html = ""
}

function select($name, $values = []){
	$html = "<select class = 'form-control' name='$name' id='$name'>";
	foreach	($values as $value){
		$html .= "<option value='$value'>$value</option>";
	}
	$html .= "</select>";
	
	return $html;
}

function checkbox($name, $values = []){
	$html="<div class='checkbox'>";
		$html .= "<label>";
		$html .= "<input name='$name' id='$name' type='checkbox'> $label";
		$html .= "</label>";
	$html.="</div>"
	return $html;
}


?>