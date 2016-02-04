<?
require_once("model/components/session.inc.php");
require_once("model/components/MenuBuilderChat.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
$objTopic = $event->getArg("objTopic");
$objUser = $objAppSession->getSession("User");
$UserId = $objUser->getUserId();
$TopicId = $event->getArg("id1");
$arrTopics = $event->getArg("arrTopics");
?>

<style>

#chatbox {
    text-align:left;
    margin:0 auto;
    margin-bottom:25px;
    padding:10px;
    background:#fff;
    height:270px;
    width:95%;
    border:1px solid #004378;
    overflow:auto; }
  
#usermsg {
    width:60%;
    border:1px solid #004378; }
    
#wrapper {
    margin:0 auto;
    padding:25px 0px 25px 0px;
    background:#004378;
    width:100%;}
  
#submit { width: 80px;}

#submitmsg {
    background:#E50043;
    color: #FFF;
    border: 1px solid #E50043;
    width: 80px;
}

.msgln {color: #000;}
.msglnAdmin {color: #E50043;}    
</style>

<!-- Begin Main -->
<div role="main" class="main">
    <div class="container">
        <div class="row">
        
            <div class="col-sm-6 col-md-6 col-lg-6">
                <article class="post post-large blog-single-post" style="text-align:center">
                        <h3><?=$oT->gL("txtPleaseSelectATopic")?></h3>
                        <div style="clear:both">&nbsp;</div>
                        <div>
                            <div class="sidebar">
                                <nav class="sidebar-nav">
                                <?$menu = new MenuBuilderChat();
                                  $id1 = $event->getArg("id1");
                                 echo $menu->get_menu_html(0, $id1);?>
                                 </nav>
                            </div>
                        </div>
                </article>
            </div>
            
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="blog-posts single-post">
                    <?if($event->getArg("id1") != "") {?>
                        <article class="post post-large blog-single-post" style="text-align: center;">
                                <h3><?=$oT->gL("txtTopic")?>: <?=$objTopic->getQuestion();?></h3>
                                <br/>
                                <div class="post-content">
                                    <div id="wrapper">
                                        <div id="chatbox"></div>
                                        <span style="color:#FFFFFF;"><?=$oT->gL("txtYourMessage")?>:</span>
                                            <input name="usermsg" type="text" id="usermsg" />
                                            <input name="submitmsg" type="submit"  id="submitmsg" value="<?=$oT->gL("txtSend")?>" />
                                        </div>
                                    </div>
                                </div>
                                
                                <?/*
                                <div id="menu1">
                                    <nav class="navbar navbar-default navbar-main-user navbar-main-slide" role="navigation" style="z-index: 1;">
                                        <div class="collapse navbar-collapse menu2">
                                            <ul class="nav navbar-nav">
                                                <li>
                                                <a href="<?=$SN;?>lesConsultationsEnCours.html"><?=$oT->gL("txtGoBackToTopicList")?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                                <div><p>&nbsp;</p></div>
                                 
                                 */?>
                                
                        </article>
                    <?}?>                          
                </div>
            </div>
        </div>  
    </div>
</div>
<!-- End Main -->
     
<script>
    $(document).ready(function() {
        loadLog();
        $("#usermsg").focus();
        
        $("#usermsg").keyup(function(event){
            if(event.keyCode == 13){
                $("#submitmsg").click();
            }
        });
        
        $("#submitmsg").click(function() {
            var clientmsg = $("#usermsg").val();
            $.ajax({
                url: "<?=$SN?>index.php?event=saveTopicMessage",
                method: "POST",
                dataType: "json",
                data: { 'TopicId': <?=$TopicId;?>,
                        'UserId': <?=$UserId?>,
                        'Message': clientmsg},
                cache: false,
                success: function(data) {
                    $("#usermsg").val("");
                    $("#usermsg").focus();
                    loadLog();
                    return false;
                }
            });
        }); 
        
        function loadLog(){     
            var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            $.ajax({
                url: "<?=$SN?>index.php?event=findTopicMessagesByTopicId",
                dataType: "json",
                data: {'id1': <?=$event->getArg("id1")?>},
                cache: false,
                success: function(data) {
                    var $html = "";
                    $.each(data.TopicMessage, function() {
                        var $msgln = "msgln";
                        if(this.UserId == 3) {
                            $msgln = "msglnAdmin";    
                        }
                        
                        $html = $html + "<div class=\"" + $msgln + "\">(" + this.CreateDateTime  + ") <b>" + this.Email + "</b>: " + this.Message + "<br></div>"
                    });
                    $("#chatbox").html($html);
                },
            });
        }
        
        setInterval (loadLog, 5000);
    });
</script>