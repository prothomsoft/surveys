<?
require_once("model/components/session.inc.php");
require_once("model/components/RSSFeed.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');

$myfeed = new RSSFeed();
$myfeed->SetChannel('http://opinionlab.opinion-way.com/xml.rss',
          'OpinionLab by OpinionWay',
          '',
          'fr-FR',
          '',
          '',
          '');
      
      	$arrSigmaAll = $event->getArg("arrSigmas");
        if($arrSigmaAll) {
			foreach($arrSigmaAll as $objSigma) {
				
				if($objSigma->getBlog() == 1) {
					$url = $SN."blog_entry/".$objSigma->getSigmaId()."/".$objSigma->getSeoName().".html";
					$name = htmlspecialchars_decode($objSigma->getName());
					$phpdate = strtotime( $objSigma->getUpdateDate() );
					$date = date( 'd-m-Y h:i:s', $phpdate );
					$description = htmlspecialchars_decode($objSigma->getLongDescription());
					$description = strip_tags($description);
					if($description != "") {
						$description = preg_replace('/\s+?(\S+)?$/', '', substr($description,0,600)). "...";
					}
				}
				
				if($objSigma->getBlog() == 0 and strip_tags(htmlspecialchars_decode($objSigma->getLongDescription())) != "") {
					$url = $SN."opinionlab/".$objSigma->getDeltaId()."/".$objSigma->getSigmaId()."/".$objSigma->getSeoName().".html";
					
					$cmsCategoryId = $objSigma->getDeltaId();
					$objCmsCategoryDao = new CmsCategoryDao();
					
					if($cmsCategoryId != "") {
						$objCmsCategory = $objCmsCategoryDao->read($cmsCategoryId);
						$fatherCategoryId = $objCmsCategory->getFatherId();
						$objCmsFatherCategory = $objCmsCategoryDao->read($fatherCategoryId);
					}
					
					if(htmlspecialchars_decode($objCmsFatherCategory->getName()) != "") {$name = htmlspecialchars_decode($objCmsFatherCategory->getName())." / ";}
					$name .= htmlspecialchars_decode($objSigma->getName());
					
					$phpdate = strtotime( $objSigma->getUpdateDate() );
					$date = date( 'd-m-Y h:i:s', $phpdate );
					
					
					
					
					$description = htmlspecialchars_decode($objSigma->getLongDescription());
					$description = strip_tags($description);
					$description = preg_replace('/\s+?(\S+)?$/', '', substr($description,0,600)). "...";
				}
				
				
				
				$myfeed->SetImage('http://opinionlab.opinion-way.com/images/social/facebook.jpg');
		  		$myfeed->SetItem($url,$name, $description, $date);
			}
		}         
		echo $myfeed->output();
		?>





	