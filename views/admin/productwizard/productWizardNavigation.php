<? 
$arrTab[1]="Product Category";
$arrTab[2]="Product Details";
$arrTab[3]="Product Pictures";
$arrTab[4]="Product Preview";
?>
<?for($i=1;$i<count($arrTab)+1;$i++) {?>
   <? if($event->getName()==strtolower('showProductStep'.$i)){?>
   		<span class="wizardButtonOpen"><a href="#"><?=$arrTab[$i]?></a></span>
   <? }else{?>
   		<span class="wizardButtonCollapsed"><a href="javascript:$('#event').val('showProductStep<?=$i?>');$('#productId').val('<?=$event->getArg("productId");?>');document.f1.submit();"><? echo $arrTab[$i]?></a></span>
   <? }?>
<?}?>