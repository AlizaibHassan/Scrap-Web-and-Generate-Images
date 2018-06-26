<?php

require('4_RequireFiles.php');


	  $feed_url="http://www.bbc.com/news/world-asia-44092143";


 $GetData = new GetData;
 $save = $GetData->getdatam($feed_url);
 $GetData->CalculateImages($feed_url);
 $GetData->finalResult($feed_url);

 // $caldata = new CalculateImages;
 // $caldata->CalculateImages();




