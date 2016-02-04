<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
require_once("model/BookGateway.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
$arrBooks = $event->getArg("arrBooks");
$SigmaId = $event->getArg("id1");

function getComments($row, $SN, $SigmaId) {
    echo "<li>";
    echo "<div class='comment'>";
    echo "<div class='comment-block'>";
    echo "<div class='img-circle'> <img class='avatar' width='50' alt='' src='".$SN."images/content/blog/avatar.png'> </div>";
    echo "<span class='comment-by'>".$row['FirstName']." ".$row['LastName']."</span>";
    echo "<span class='date'><small><i class='fa fa-clock-o'></i> ".$row['CreateDate']."</small></span>";
    echo "<p>".$row['CompanyName']."</p>";
    echo "<a href='#comment_form' class='reply' id='".$row['BookId']."'><i class='fa fa-reply'></i> Répondre</small></a>";
    echo "</div>";
    echo "</div>";
    $q = "SELECT * FROM Book WHERE SigmaId = ".$SigmaId." AND ParentId = ".$row['BookId']."";
    $r = mysql_query($q);
    if(mysql_num_rows($r)>0)
        {
        echo "<ul class='comments'>";
        while($row = mysql_fetch_assoc($r)) {
            getComments($row, $SN, $SigmaId);
        }
        echo "</ul>";
        }
    echo "</li>";
}
?>

    
   	
<div>

<!-- Begin Main -->
<div role="main" class="main">
    
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-posts single-post">
                    <article class="post post-large blog-single-post">
                        
                        <?$objSigma = $event->getArg("objSigma");?> 
    
                        <?// for each entry count number of comments
                            $sigmaId = $objSigma->getSigmaId();
                            $BookGatewayObj = new BookGateway();
                            $arrCount = $BookGatewayObj->findAllAuthorized($sigmaId);
                            if($arrCount) {
                                $counter = count($arrCount);
                            } else {
                                $counter = 0;
                            }
                        ?>
                        
                        <h3><?=htmlspecialchars_decode($objSigma->getName())?></h3>
                        <div class="post-meta">
                            <span>Par <?=htmlspecialchars_decode($objSigma->getKeyword())?></span>
                            <span><i class="fa fa-clock-o"></i> <?=$objSigma->getEventDate();?></span>
                            <span><i class="fa fa-comment-o"></i> <?=$counter;?> Réactions</span>
                        </div>
                        <?/*
                        <div class="post-image single">
                            <?if ($objSigma->getImgDriveName() != "") {?>
                                <a href="<?=$SN?>upload/<?=$objSigma->getImgDriveName();?>" class="photo anchor_link_1" rel="prettyPhoto" title="<?=htmlspecialchars_decode($objSigma->getName());?>"><img class="img-responsive" src="<?=$SN?>upload/<?=$objSigma->getImgDriveName();?>" alt="<?=htmlspecialchars_decode($objSigma->getName());?>"></a>
                            <?} else {?>
                                <a href="#" class="anchor_link_1"><img src="<?=$SN?><?=$SN?>images/hotel.jpg"></a>
                            <?}?>
                        </div>
                        */?>
                        <div class="post-content" style="padding-top:10px;">
                            <?=htmlspecialchars_decode($objSigma->getLongDescription());?>
                            <a class="btn btn-sm" href="<?=$SN?>blog.html">Retour...</a><br/><br/>
                        </div>
                        
                        
                        <?$arrSigmaPictures = $event->getArg("arrSigmaPictures");?>
                        <?if($arrSigmaPictures) {?>
                            <div class="related-posts">
                                <div class="row">
                                    <?foreach($arrSigmaPictures as $objSigmaPicture) {?>
                                    <div class="col-xs-4">
                                        <article class="post">
                                            <div class="post-image">
                                                <a href="<?=$SN?>upload/<?=$objSigmaPicture->getImgDriveName();?>" title="<?=$objSigmaPicture->getImgAltName();?>" rel="prettyPhoto[gallery<?=$objSigma->getSigmaId();?>]"><img class="img-responsive" src="<?=$SN?>upload/<?=$objSigmaPicture->getImgDriveName();?>" alt=""/></a>
                                            </div>
                                            <h4><?=$objSigmaPicture->getImgAltName();?></h4>
                                        </article>
                                    </div>
                                    <?}?>
                                </div>
                            </div>
                        <?}?>
              
                        <div class="post-block post-comments clearfix">
                            <?
                            $counter = 0;
                            if($arrBooks) {
                                $counter = count($arrBooks);
                            } 
                            ?>
                            <h3><?=$counter;?> Réactions</h3>
                            <ul class="comments">
                                <?php
                                $q = "SELECT * FROM Book WHERE SigmaId = ".$SigmaId." AND ParentId = 0";
                                $r = mysql_query($q);
                                while($row = mysql_fetch_assoc($r)):
                                    getComments($row, $SN, $SigmaId);
                                endwhile;
                                ?>
                            </ul>
                        </div>
                        
						<?if ($objAppSession->getSession("User") != "") {?>
							<div class="post-block post-leave-comment">
								<h3>Commentez ou réagissez à un commentaire</h3>
								
								<?if ($event->getArg('message') != "") {?>
									<p><small><?=$event->getArg('message');?></small></p>
								<?}?>
								
								
								<form id="formBook" name="formBook" action="<?=$SN;?>blog_comment_save.html" method="post">
									<input type="hidden" name="id1" value="<?=$event->getArg("id1")?>">
									<input type="hidden" name="id2" value="<?=$event->getArg("id2")?>">
									<input type="hidden" id="parentId" name="parentId" value="<?=$event->getArg("parentId")?>">
									<div class="form-group <?if ($event->getArg("missingField") == "firstName") echo "has-error"?>">
										<div class="row">
											<div class="col-xs-6">
												<label>Votre prénom *</label>
												<input type="text" value="<?=$event->getArg("firstName")?>" maxlength="100" name="firstName" id="firstName" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group <?if ($event->getArg("missingField") == "lastName") echo "has-error"?>">
										<div class="row">
											<div class="col-xs-6">
												<label>Votre nom *</label>
												<input type="text" value="<?=$event->getArg("lastName")?>" maxlength="100" class="form-control" name="lastName" id="lastName">
											</div>
										</div>
									</div>
									<div class="form-group <?if ($event->getArg("missingField") == "email") echo "has-error"?>">
										<div class="row">
											<div class="col-xs-6">
												<label>Adresse de messagerie</label>
												<input type="text" value="<?=$event->getArg("email")?>" maxlength="100" class="form-control" name="email" id="email">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												<label>Commentaire *</label>
												<textarea maxlength="5000" rows="10" class="form-control" name="companyName" id="companyName"><?=$event->getArg("companyName")?></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="submit" value="Publier" class="btn btn-sm" data-loading-text="Loading...">
										</div>
									</div>
								</form>
							</div>
						<?} else {?>
							
							<div class="row">
								<div class="col-md-12">
									<p>Merci de bien vouloir vous inscrire pour pouvoir commenter les articles.</p>
									<a class="btn btn-sm" href="<?=$SN;?>register.html">S'INSCRIRE</a>									
								</div>
							</div>
						<?}?>
							
                    </article>
                    
                </div>
            </div>
            <div class="col-md-3">
                <aside class="sidebar">
                    <aside class="block tabs">
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