<?php

require('others/simple_html_dom.php');

class GetData{


	 public function getFeedFromMercury($feed_url) {
     
      $curl = curl_init();
      curl_setopt ($curl, CURLOPT_URL, "https://mercury.postlight.com/parser?url=".$feed_url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'x-api-key: L1sqdO66qVg3nFaHEdHhk5Ps8a5uStEeT6wXCFoN'
      ));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      $result = curl_exec ($curl);
      curl_close ($curl);
 
    	return $result;
	}


	public function getTextBetweenTags($string, $tagname) {
    // Create DOM from string
    $html = str_get_html($string);
    $titles = array();
    // Find all tags 
     if (!empty($html)) {

	    foreach( $html->find($tagname) as $element) {
	        $titles[] = $element->plaintext;
	    }
	
	}

    return $titles;
	}


	public function getdatam($feed_url){
		
		$content = "";
	
		 $see = $this->getFeedFromMercury($feed_url);

		 
		 $data3 = json_decode($see,true);
		 $data4 = $data3['content'];
		 $data= $this->getTextBetweenTags($data4,'p');
		
			
		foreach ($data as $d => $datas) {
		 $content .= $datas;
		}
		
		
		return $content;

	}	



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


public function finalResult($feed_url){

	$imgsNumber=$this->CalculateImages($feed_url);
	$content = $this->getdatam($feed_url);
	$total = strlen($content);
	$length = 1280;
 	$wide=720;
	$split=80;
	$pictext=400;

	$s=0;
	$j=0;
	$i=0;
	$f=0;
	$m=1;

	
	 $Nimages=array();

	 while ( $i<= $imgsNumber) {

	 $Nimages[$i]=imagecreate($length, $wide);
	 $background = imagecolorallocate($Nimages[$i], 216,216 ,203 );
     $forground = imagecolorallocate($Nimages[$i], 0, 0, 0);
     $i=$i+1;
     
     }


	$font = 'Font/arial.ttf';
	
	$portions = str_split($content, $split);
	$cx=110;
	$s1=0;
	$mpl=4;

   foreach ($portions as $key => $value) {
   	$tcheck=$total-$s;
// 																	  	echo $tcheck . ' = tcheck <br>';
	   	if($s<=$total){
//																		   			echo $s . ' = s <br>';
	   		if($s==$pictext || $tcheck<=$split){
	   			$j=$j+1;
//																			   				echo $j . ' j = <br>';
	   			$s=0;
	   			$cx=110;
	   			$mpl=4;
	   		}	
	  			$s1=$mpl*($cx);
	  			$mpl=$mpl+1;						 		
	   // imagestring($Nimages[$j],5,90,$s1,$value,$forground);
	   imagettftext($Nimages[$j],20,0,90,$s1,$forground,$font,$value);


//fwrite($myfile, $value);

	     $cx=50;

	  		//echo $key . ' Value key = <br>';
																		//	  		echo $s1 . ' Value S1 = <br>';
	   	}

   		$s=$s+$split;
   }

//   header("Content-type: image/jpeg");
//   imagejpeg($Nimages[$s]);

	 $z=0;
	 while ( $z<= $j) {

  		imagejpeg($Nimages[$z], $z.' AZ.jpg');
  		imagedestroy($Nimages[$z]);	 
    	$z=$z+1;




	}


}



}


?>
