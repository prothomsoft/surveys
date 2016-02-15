<div class="ui-widget">
    <div class="ui-widget-header ui-corner-top center-header">
        MODIFIEZ VOTRE MOT DE PASSE           
    </div>
    
    <div class="ui-widget-content ui-corner-bottom center-content">
    
        <div class="container">
                <div class="starter-template">
                    <div class="form-register">
                        <?if ($event->getArg('message') != "") {?>
                            <div id="loginerror" style="padding:10px 5px 10px 5px;"><p style="color: red">
                                <strong>Attention: </strong>
                                <?if($event->getArg("message") != "") {
                                    echo $event->getArg("message");
                                }?>
                                </p>
                            </div>
                        <?}?>
                         <form name="registerForm" action="index.php?event=executeChangePassword" method="POST">
                            <div class="form-group">
                                <label for="inputNewPassword">Votre nouveau mot de passe</label>
                                <input type="text" class="form-control" id="inputNewPassword" name="newPassword" value="<?=$event->getArg("newPassword");?>">
                            </div>
                            <div class="form-group">
                                <label for="inputRepeatNewPassword">Confirmez votre nouveau mot de passe</label>
                                <input type="text" class="form-control" id="inputRepeatNewPassword" name="repeatNewPassword" value="<?=$event->getArg("repeatNewPassword");?>">
                            </div>
                            <div style="text-align:left; padding-top:10px;">
                                <button type="submit" class="wymupdate">Enregistrer</button>
                            </div>
                            <div style="padding-bottom:10px;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>