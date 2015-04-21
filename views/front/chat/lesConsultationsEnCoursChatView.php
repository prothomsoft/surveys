<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
require_once("model/components/translator.inc.php");
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
$objTopic = $event->getArg("objTopic");
$objUser = $objAppSession->getSession("User");
$UserId = $objUser->getUserId();
$TopicId = $event->getArg("id1");
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
    border:1px solid #ACD8F0;
    overflow:auto; }
  
#usermsg {
    width:60%;
    border:1px solid #ACD8F0; }
    
#wrapper {
    margin:0 auto;
    padding:25px 0px 25px 0px;
    background:#EBF4FB;
    width:100%;
    border:1px solid #ACD8F0; }
  
#submit { width: 60px; }

.msgln {color: #000;}
.msglnAdmin {color: #FF0000;}    
</style>

<!-- Begin Main -->
<div role="main" class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-posts single-post">
                    <article class="post post-large blog-single-post" style="text-align: center;">
                            <h3><?=$oT->gL("txtTopic")?>: <?=$objTopic->getQuestion();?></h3>
                            <div class="post-content">
                                <div id="wrapper">
                                    <div id="chatbox"></div>
                                    <?=$oT->gL("txtYourMessage")?>:
                                        <input name="usermsg" type="text" id="usermsg" />
                                        <input name="submitmsg" type="submit"  id="submitmsg" value="<?=$oT->gL("txtSend")?>" />
                                    </div>
                                </div>
                    </article>                          
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