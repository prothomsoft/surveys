<? 
$arrTab[1]="Content";
$arrTab[2]="Pictures";
?>
<?for($i=1;$i<count($arrTab)+1;$i++) {?>
   <? if($event->getName()==strtolower('showDeltaStep'.$i)){?>
   		<span class="wizardButtonOpen"><a href="#"><?=$arrTab[$i]?></a></span>
   <? }else{?>
   		<span class="wizardButtonCollapsed"><a href="javascript:$('#event').val('showDeltaStep<?=$i?>');$('#DeltaId').val('<?=$event->getArg("DeltaId");?>');document.f1.submit();"><? echo $arrTab[$i]?></a></span>
   <? }?>
<?}?>