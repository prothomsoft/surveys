<? 
$arrTab[1]="Opis";
//$arrTab[2]="Zdjęcia";
?>
<?for($i=1;$i<count($arrTab)+1;$i++) {?>
   <? if($event->getName()==strtolower('showGamaStep'.$i)){?>
   		<span class="wizardButtonOpen"><a href="#"><?=$arrTab[$i]?></a></span>
   <? }else{?>
   		<span class="wizardButtonCollapsed"><a href="javascript:$('#event').val('showGamaStep<?=$i?>');$('#GamaId').val('<?=$event->getArg("GamaId");?>');document.f1.submit();"><? echo $arrTab[$i]?></a></span>
   <? }?>
<?}?>