<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
require_once("model/components/paginator.inc.php");
require_once("model/BookGateway.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
$arrQueue = $event->getArg('arrQueue');
                        $pages = new Paginator;
                        $pages->items_total = count($arrQueue);
                        $pages->items_per_page =5;
                        $pages->sn = $SN."blog/";
                        $pages->labelPrevious = "";
                        $pages->labelNext = "";
                        $pages->paginate();       
?>


<!-- Begin Main -->
<div role="main" class="main">    
    <div class="container">
        <div class="row">
            
            <div class="col-md-9">
                <div class="blog-posts">
                    
                    
                    <?$arrSigmas = $event->getArg("arrSigmas");
                    if($arrSigmas[0]) {
                        foreach($arrSigmas as $objSigma) {
                            $sigmaId = $objSigma->getSigmaId();
                            $BookGatewayObj = new BookGateway();
                            $arrCount = $BookGatewayObj->findAllAuthorized($sigmaId);
                            if($arrCount) {
                                $counter = count($arrCount);
                            } else {
                                $counter = 0;
                            }?>
                            
                            <article class="post post-medium">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="post-image single">
                                            <?if ($objSigma->getImgDriveName() != "") {?>
                                                <a href="<?=$SN?>upload/<?=$objSigma->getImgDriveName();?>" class="photo anchor_link_1" rel="prettyPhoto" title="<?=htmlspecialchars_decode($objSigma->getName());?>"><img class="img-responsive" src="<?=$SN?>upload/<?=$objSigma->getImgDriveName();?>" alt="<?=htmlspecialchars_decode($objSigma->getName());?>"></a>
                                            <?} else {?>
                                                <a href="#" class="anchor_link_1"><img src="<?=$SN?><?=$SN?>images/blank.gif"></a>
                                            <?}?>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <h3><a href="<?=$SN?>blog_entry/<?=$objSigma->getSigmaId();?>/<?=$objSigma->getSeoName();?>.html"><?=htmlspecialchars_decode($objSigma->getName())?></a></h3>
                                        <div class="post-meta">
                                            <span>Par <?=$objSigma->getKeyword();?></span>
                                            <span><i class="fa fa-clock-o"></i> <?=$objSigma->getEventDate();?></span>
                                            <span><i class="fa fa-comment-o"></i> <?=$counter;?> Réactions</span>
                                        </div>
                                        
                                        <div class="post-content">
                                            <?=htmlspecialchars_decode($objSigma->getShortDescription())?>
                                            <a class="btn btn-sm" href="<?=$SN?>blog_entry/<?=$objSigma->getSigmaId();?>/<?=$objSigma->getSeoName();?>.html">Suite...</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?}
                    }?>
                   
                    <?if(count($arrQueue) > 5) {
                        echo $pages->display_pages();
                    }?>
                </div>
            </div>
            
            <div class="col-md-3">
                <aside class="sidebar">
                    <aside class="block">
                        <h4>Articles populaires</h4>
                        <div class="tab-content">
                            <div class="tab-pane active" id="popularPosts">
                                <ul class="list-unstyled simple-post-list">
                                    <?$arrSigmaLatest = $event->getArg("arrSigmaLatest");
                                      if($arrSigmaLatest[0]) {
                                        foreach($arrSigmaLatest as $objSigmaLatest) {
										$sigmaId = $objSigmaLatest->getSigmaId();
										$BookGatewayObj = new BookGateway();
										$arrCount = $BookGatewayObj->findAllAuthorized($sigmaId);
										if($arrCount) {
											$counter = count($arrCount);
										} else {
											$counter = 0;
										}?>
                                            <li>
                                                <div class="post-image">
                                                    <a href="<?=$SN?>upload/<?=$objSigma->getImgDriveName();?>" class="photo anchor_link_1" rel="prettyPhoto" title="<?=htmlspecialchars_decode($objSigma->getName());?>"><img class="img-responsive" src="<?=$SN?>upload/<?=$objSigma->getImgDriveName();?>" alt="<?=htmlspecialchars_decode($objSigma->getName());?>"></a>
                                                </div>
                                                <div class="post-info">
                                                    <a href="<?=$SN?>blog_entry/<?=$objSigmaLatest->getSigmaId();?>/<?=$objSigmaLatest->getSeoName();?>.html"><?=htmlspecialchars_decode($objSigmaLatest->getName())?></a><br/>
                                                    <span><i class="fa fa-comment-o"></i> <?=$counter;?> Réactions</span>                                                
                                                </div>
                                            </li>
                                        <?}
                                      }?>                                   
                                </ul>
                            </div>
                        </div>
                    </aside>
                </aside>
            </div>
        </div>  
    </div>    
</div>
<!-- End Main -->