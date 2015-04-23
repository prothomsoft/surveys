<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
$arrTopics = $event->getArg("arrTopics");
?>

<!-- Begin Main -->
        <div role="main" class="main">
        
            <!-- Begin page top -->
            <?/*?><section class="page-top-md">             
            </section>
            <?*/?>
            <!-- End page top -->
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-posts single-post">
                            <article class="post post-large blog-single-post" style="text-align: center;">
                                    <h3><?=$oT->gL("txtPleaseSelectATopic")?></h3>
                                    <div>&nbsp;</div>
                                    <div class="post-content">
                                        <?if($arrTopics) {?>
                                            <?foreach($arrTopics as $objTopic) {?>
                                                <a style="font-size:16px;" href="<?=$SN?>lesConsultationsEnCoursChat/<?=$objTopic->getTopicId();?>.html">
                                                <div style="padding:10px; background: #F6F6F6; border: 1px solid #D6D6D6;">
                                                    <?=$objTopic->getQuestion();?>
                                                </div></a>
                                                <div>&nbsp;</div>
                                            <?}?>
                                        <?}?>
                                    </div>
                            </article>                          
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!-- End Main -->