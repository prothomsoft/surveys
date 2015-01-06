<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>

		<!-- PRODUCTS -->
        <section class="products">
            <div class="container">
                <div class="row">
                	<!-- .shop-navbar -->
                    <div class="col-md-3 hidden-xs hidden-sm">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="widget-box sidebar">                                    
                                    <ul class="wdgt-ul">
                                    <?$arrBetas = $event->getArg("arrBetas");?>
									<?if($arrBetas) {?>
										<?foreach($arrBetas as $objBeta) {?>
											<li>
	                                            <a href="<?=$SN?>products/<?=$objBeta->getBetaId();?>/<?=$objBeta->getSeoName();?>.html"><?=$objBeta->getName();?></a>                                            
	                                        </li>
										<?}?>						
									<?}?>                                      
                                    </ul>
                                </div>
                            </div>                                                   
                        </div>
                    </div>                                        
                    <!--/.shop-navbar-->
                    
                    <div class="col-md-9">
                        <div class="row">
                            <?$arrProducts = $event->getArg("arrProducts");?>
							<?if($arrProducts) {?>						
								<?foreach($arrProducts as $objProduct) {?>
									<div class="col-xs-6 col-sm-4 col-lg-4 col-md-4">
				                        <div class="thumbnail">
										      <div class="category_caption_header vertical-align">
												 <div class="width_help"><strong><?=$objProduct->getName();?> - <?=$objProduct->getExtName();?></strong></div>							        
										      </div>
										      <img src="<?=$SN?>upload/thumb/<?=$objProduct->getImgDriveName();?>">
										      <div class="category_caption_footer">
										      	<p>Pris: <?=$objProduct->getPrice();?> NOK</p>
										      	<div class="padding_help"><a href="<?=$SN?>product/<?=$objProduct->getSeoName();?>/<?=$objProduct->getProductId()?>/<?=$objProduct->getBetaId()?>.html" class="btn btn-default width_help" role="button">Les mer</a></div>
										      	<?if($objProduct->getInStock() > 0) {?>
										      		<div><a href="<?=$SN?>executeAddShoppingCartAction<?=$urlExtension?>/<?=$objProduct->getProductId()?>.html" class="btn btn-default width_help" role="button">Legg i Handlekurven</a></div>
										      	<?}?>									        
										      </div>
									    </div>
								    </div>
							    <?}?>
							<?}?>
		                </div>
                        
                        <?/*?>
                        <!-- begin pagination -->
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="pagination">
                                    <li class="pag-prev"><a href="#">&larr; prev</a>
                                    </li>
                                    <li class="active"><a href="#">1</a>
                                    </li>
                                    <li><a href="#">2</a>
                                    </li>
                                    <li><a href="#">3</a>
                                    </li>
                                    <li class="pag-next"><a href="#">next &rarr;</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--/.pagination-->
                        <?*/?>
                    </div>                    
                </div>
            </div>
            <!-- /.container -->
        </section>
        <!-- END DETAIL PRODUCT CONTENT -->