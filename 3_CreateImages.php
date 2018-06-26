// This Class Will Inherite from CalculateImages
<?php 
require('CalculateImages.php');
	
	class CreateImages extends CalculateImages 
	{


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


	$font = 'MyFiles/arial.ttf';
	
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

?>