<?
require_once("model/components/session.inc.php");
require_once("model/components/MenuBuilderChat.inc.php");
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
                                                     
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!-- End Main -->
        
