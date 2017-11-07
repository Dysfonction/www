<?php 

function input ($label, $type, $name, $options = []){
	$constructor='';
	foreach ($options as $k => $value){
		$constructor.= " $k = '$v' ";
	}
	$html = "<div class='form-group'>";
	$html.=$label;
		$html.="<input type='$type' name='$name' id='$name' $constructor>";
	return $html;
}

function submit ($name, $value, $class='btn-default'){
	$html = "";
	return $html;
}

function select($label, $name, $values = []){
	$html = "<select class = 'form-control' name='$name' id='$name'>";
	foreach	($values as $value){
		$html .= "<option value='$value'>$value</option>";
	}
	$html .= "</select>";
	
	return $html;
}

function checkbox($label, $name, $values, $options = []){
	$constructor='';
	foreach ($options as $k => $value){
		$constructor.= " $k = '$v' ";
	}
	$html="<div class='checkbox'> $label";
		$html .= "<label>";
		$html .= "<input name='$name' $constructor id='$name' type='checkbox'>";
		$html .= "</label>";
	$html.="</div>";
	return $html;
}

function radio($label, $name, $values, $options = []){
	$constructor='';
	foreach ($options as $k => $value){
		$constructor.= " $k = '$v' ";
	}
	$html="<div class='radio'> $label";
		$html .= "<label>";
		$html .= "<input type='radio' $constructor name='$name' id='$name' value = '$value'>";
		$html .= $value;
		$html .= "</label>";
	$html.="</div>";
	return $html;
}
function dbConnect(){
	try{
		return new PDO('mysql:host=localhost;dbname=intranet;charset=utf8', "root", "");
	}catch(Exception $e){
		die("Erreur de connexion à la BDD :");
	}
}

?>