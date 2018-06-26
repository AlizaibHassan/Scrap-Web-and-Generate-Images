<?php

include('1_GetData.php');		
	
class CalculateImages {
	
		public function CalculateImages($feed_url){

		$save = $this->getdatam($feed_url);
		
		$total = strlen($save);
		echo $total . " = Total Length is <br>";
		$split=80;
		$pictext=400;

		settype($imgsNumber, "int");
		return $imgsNumber = ceil($total/$pictext);
		//echo $imgsNumber . " = Number of Images Should be used <br>";

	 }	


}




?>