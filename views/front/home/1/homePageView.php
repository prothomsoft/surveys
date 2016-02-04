<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$arrSigmaThreeLatest = $event->getArg("arrSigmaThreeLatest");
?>

	    <section id="blog_caption">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-lg-12 col-md-12 animation animated fadeInUp">
						<div style="font-size:21px; font-weight:bold; color: #E50043; text-align:center;">LES DERNIERS ARTICLES PUBLIÉS SUR LE BLOG</div>
					</div>	
				</div>
			</div>
		</section>
	    <section id="blog">
			<div class="container">
				<div class="row">
				
				
				<?if($arrSigmaThreeLatest[0]) {
					foreach($arrSigmaThreeLatest as $objSigma) {
						$sigmaId = $objSigma->getSigmaId();
						$BookGatewayObj = new BookGateway();
						$arrCount = $BookGatewayObj->findAllAuthorized($sigmaId);
						if($arrCount) {
							$counter = count($arrCount);
						} else {
							$counter = 0;
				        }?>
				        <div class="col-sm-6 col-lg-4 col-md-4 animation animated fadeInUp">
							<div style="height:380px; color: #FFFFFF; background-color: #737373; border: 1px solid #DEDEDE; padding: 20px;">
			    			    <table>
									<tr>
										<td width="40%" style="vertical-align: top; padding-top:5px;">
											<?if ($objSigma->getImgDriveName() != "") {?>
	                                                <a href="<?=$SN?>blog_entry/<?=$objSigma->getSigmaId();?>/<?=$objSigma->getSeoName();?>.html" title="<?=htmlspecialchars_decode($objSigma->getName());?>"><img width="120px" src="<?=$SN?>upload/<?=$objSigma->getImgDriveName();?>" alt="<?=htmlspecialchars_decode($objSigma->getName());?>"></a>
	                                            <?}?>                                                
										</td>
										<td width="60%" style="vertical-align: top;">
											<p><a style="font-weight:bold; color: #FFF;" href="<?=$SN?>blog_entry/<?=$objSigma->getSigmaId();?>/<?=$objSigma->getSeoName();?>.html"><?=htmlspecialchars_decode($objSigma->getName())?></a> <br/><span><i class="fa fa-comment-o"></i> <?=$counter;?> Réactions</span></p>
										</td>
									</tr>
									<tr>
										<td colspan="2" width="100%">
										<p><?=htmlspecialchars_decode($objSigma->getShortDescription())?></p>
											<p><a style="color: #FFF;" href="<?=$SN?>blog_entry/<?=$objSigma->getSigmaId();?>/<?=$objSigma->getSeoName();?>.html"><u>Suite...<u></a></p>
										</td>
									</tr>
			    				 </table>
			    			</div>
			    			<div style="padding:10px"></div>
						</div>
                    	<?}
                    }?>
				</div>
			</div>
		</section>

		<!-- BEGIN PRODUCTS CATEGORIES -->
		<section id="portal">
			<div class="container">
				<div class="row">
				
				
					<?/* left */?>
					<div class="col-sm-6 col-lg-4 col-md-4 animation animated fadeInUp">
						<div style="font-size:21px; font-weight:bold; color: #E50043; text-align:center;">LE FIL DE L'ACTU ECONOMIQUE</div>
		    			<div style="height:auto; color: #FFFFFF; background-color: #004379; border: 1px solid #DEDEDE; padding: 20px;">
		    			    <table>
		    				<?$i = 0; // counter
                            $url = "http://www.latribune.fr/feed.xml"; // url to parse
                            $rss = simplexml_load_file($url); // XML parser
                            
                            // RSS items loop
                            foreach($rss->channel->item as $item) {
                                if ($i < 4) {
                                    //$pubDate= date("D, d M Y H:i:s T", strtotime($item->pubDate));
                                    $pubDate= date("d.m.Y", strtotime($item->pubDate));
                                    $url = $item->enclosure["url"];
                                    $mimetype = $item->enclosure["mimetype"];
                                    ?>
                                    
                                        <tr>
                                            <td width="35%" style="vertical-align: top; padding-top:5px;">
                                                <?if($url != "") {?>
                                                    <a href="<?=$item->link?>" target="_blank"><img src="<?=$url?>" width="100px"></a>
                                                <?} else {?>
                                                    <img src="<?=$SN?>images/blank.gif" width="80px">
                                                <?}?>
                                            </td>
                                            <td width="65%" style="vertical-align: top;">
                                                <p><a style="font-weight:bold;" href="<?=$item->link?>" target="_blank"><font color="#FFFFFF"><?=$item->title;?></font></a> <br/><?=$pubDate;?></p>        
                                            </td>
                                        </tr>
                                   
                                    
                                    <?/*
                                    <a style="font-weight:bold;" href="<?=$item->link?>" target="_blank"><img src="<?=$url?>" width="320px"></a>
                                    <br/><br/>
                                    <p><?=$item->description;?></p>
                                     */?>
                                <?}
                                $i++;
                            }?>
		    				 </table>
		    			</div>
		    			<div style="padding:10px"></div>
		    			<div style="font-size:21px; font-weight:bold; color: #E50043; text-align:center;">Les CCI de France​</div>
		    			<div class="product-thumb-info-image collect-item-thumb">
                            <span class="product-thumb-info-act">
                                <a class="view-product" href="http://www.cci.fr/web/presse" target="_blank">
                                    <span><i class="fa fa-external-link"></i></span>
                                </a>                                                
                            </span>
                            <img alt="" class="img-responsive" src="<?=$SN;?>images/surveys/consulaire_320.jpg">
                        </div>		    			
					</div>
					
					
					<?/* center */?>
					<div class="col-sm-6 col-lg-4 col-md-4 animation animated fadeInUp">
		    			<div style="font-size:21px; font-weight:bold; color: #E50043; text-align:center;">LES DERNIERES ETUDES PUBLIEES</div>
		    			<div class="product-thumb-info-image collect-item-thumb">
							<span class="product-thumb-info-act">
								<a class="view-product" href="http://grandeconsultation.fr/surveys_page/la-grande-consultation-des-entrepreneurs-sondages-opinionway-pour-cci-france-la-tribune-europe-1.html">
									<span><i class="fa fa-external-link"></i></span>
								</a>												
							</span>
							<img alt="" class="img-responsive" src="<?=$SN;?>images/homepage/etudes_1.jpg">
						</div>
		    			<div class="product-thumb-info-image collect-item-thumb">
							<span class="product-thumb-info-act">
								<a class="view-product" href="http://grandeconsultation.fr/surveys_page/observatoire-de-la-performance-des-pmeeti-banque-palatinechallengesitele.html">
									<span><i class="fa fa-external-link"></i></span>
								</a>												
							</span>
							<img alt="" class="img-responsive" src="<?=$SN;?>images/homepage/etudes_2.jpg">
						</div>
		    			<div class="product-thumb-info-image collect-item-thumb">
							<span class="product-thumb-info-act">
								<a class="view-product" href="http://grandeconsultation.fr/surveys_page/la-question-de-leco.html">
									<span><i class="fa fa-external-link"></i></span>
								</a>												
							</span>
							<img alt="" class="img-responsive" src="<?=$SN;?>images/homepage/etudes_3.jpg">
						</div>
		    		</div>
					
					
					<?/* right */?>
		    			<div class="product-thumb-info-image collect-item-thumb">
							<span class="product-thumb-info-act">
								<a class="view-product" href="<?=$SN;?>register.html"><span><i class="fa fa-external-link"></i></span></a>												
							</span>
							<img alt="" class="img-responsive" src="<?=$SN;?>images/homepage/rejones.jpg">
						</div>
					<div class="col-sm-6 col-lg-4 col-md-4 animation animated fadeInUp">
					    
					    <? if(!$_COOKIE['already_voted']) {?>
                            <div style="font-size:21px; font-weight:bold; color: #E50043; text-align:center;">La question d'actualité</div>
                            <div style="height:495px; font-size:17px; color: #FFFFFF;  line-height: 22px; background-color: #DEDEDE;">                              
                                <?$image = file($_SERVER['DOCUMENT_ROOT']."/poll/image.txt");
                                  $question = file($_SERVER['DOCUMENT_ROOT']."/poll/question.txt");?>
                                    <img src="<?=$SN?>images/poll/<?=$image[0];?>">
                                    
                                    <div id="pollContainer">  
                                        <h4 style="padding:15px 15px 0px 15px;"><?=$question[0];?></h4>
                                        <div style="padding:0px 20px 0px 20px">
                                            <label class="radio"><input type="radio" name="voteRadio" value="0" checked="true"><font color="#000000">Oui</font></label>
                                            <label class="radio"><input type="radio" name="voteRadio" value="1"><font color="#000000">Non</font></label>                                            
                                        </div>
                                        <div style="text-align:center; padding:10px 0px 30px 0px;"><a href="#" id="voteButton" class="btn btn-primary" role="button">Vote</a></div>
                                    </div>                                                  
                            </div>
                        <? } else {?>
                            <div style="font-size:21px; font-weight:bold; color: #E50043; text-align:center;">La question d'actualité</div>
                            <div style="height:95px; font-size:17px; color: #FFFFFF;  line-height: 22px; background-color: #DEDEDE;">
                                <div id="pollContainer">  
                                    <h4 style="padding:35px 0px 15px 15px; text-align:center;">Vous avez déjà voté</h4>
                                </div>
                            </div>
                        <?}?>
                        
                        <div style="padding:10px"></div>
                        
						<div style="font-size:21px; font-weight:bold; color: #E50043; text-align:center;">POURQUOI NOUS REJOINDRE ?</div>
		    			<div style="height:355px; font-size:17px; color: #FFFFFF;  line-height: 22px; background-color: #004379; border: 0px; padding: 12px;">
		    				<p align=center>Participer à la <i>communauté CCI des entrepreneurs</i>, c'est répondre à des enquêtes et échanger sur des thématiques d'actualité. </p><p align=center>La communauté est animée et modérée en permanence pour relancer les sujets, en proposer de nouveaux, vous interpeller sur les sujets que vous souhaitez voir abordés. </p><p align=center>Vous aurez accès aux résultats d'enquêtes et aux analyses, mais aussi à l'ensemble des communications issues de votre participation !</p>
		    			</div>
		    			<div style="padding:10px"></div>
		    			
                        <div class="product-thumb-info-image collect-item-thumb">
                            <span class="product-thumb-info-act">
                                <?if ($objAppSession->getSession("User") != "") {?>
                                    <a class="view-product" href="<?=$SN;?>lesConsultationsEnCours.html"><span><i class="fa fa-external-link"></i></span></a>
                                <?} else {?>
                                    <a class="view-product" href="<?=$SN;?>register.html"><span><i class="fa fa-external-link"></i></span></a>
                                <?}?>                                                
                            </span>
                            <img alt="" class="img-responsive" src="<?=$SN;?>images/homepage/consultations.jpg">
                        </div>
					</div> 			
				</div>
			</div>
		</section>
	    <!-- END PRODUCT CATEGORIES -->
	   
	    
	    
	    