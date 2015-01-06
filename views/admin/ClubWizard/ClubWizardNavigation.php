<? 
$arrTab[1]="Content";
//$arrTab[2]="Zdjęcia";
?>
<?for($i=1;$i<count($arrTab)+1;$i++) {?>
   <? if($event->getName()==strtolower('showClubStep'.$i)){?>
   		<span class="wizardButtonOpen"><a href="#"><?=$arrTab[$i]?></a></span>
   <? }else{?>
   		<span class="wizardButtonCollapsed"><a href="javascript:$('#event').val('showClubStep<?=$i?>');$('#ClubId').val('<?=$event->getArg("ClubId");?>');document.f1.submit();"><? echo $arrTab[$i]?></a></span>
   <? }?>
<?}?>