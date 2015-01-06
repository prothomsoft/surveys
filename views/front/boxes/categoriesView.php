<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>

<?$arrProductCategoryPlain = $event->getArg("arrProductCategoryPlain");?>

<div id="accordion" class="ui-accordion">
	
	<?if($arrProductCategoryPlain) {?>
		<?$counter = 0;?>
		<?foreach($arrProductCategoryPlain as $objProductCategoryPlain) {?>
			<?$isSubcategory = strpos($objProductCategoryPlain->getProductCategoryName(), "&nbsp;");?>
			<?if ($isSubcategory === false) {?>
					<?if ($counter >0) {?>
						<div class="menu_left">
						<?=$header;?>
							<?if($content != "") {?>
								<div class="accordion_content ui-accordion-content" style="display: block;">
									<?=$content;?>
								</div>
							<?}?>
						</div>
						<?$header="";?>
						<?$content="";?>
					<?}?>
					<?$counter = $counter + 1;?>
					
					<? // header construction
						$fatherCategory = $objProductCategoryPlain->getProductCategorySeoName();
						if($event->getArg('id1') == $fatherCategory) {
							$header = "<h3 class=\"ui-accordion-header\"  style=\"background: #666; font-weight: normal; font-size:12px;\"><a class=\"anchor_link\" href=\"".$SN."produkty/".$objProductCategoryPlain->getProductCategorySeoName().".html\">".$objProductCategoryPlain->getProductCategoryName()."</a></h3>";
						} else {
							$header = "<h3 class=\"ui-accordion-header\" style=\"background: #666; font-weight: normal;\"><a class=\"anchor_link\" href=\"".$SN."produkty/".$objProductCategoryPlain->getProductCategorySeoName().".html\">".$objProductCategoryPlain->getProductCategoryName()."</a></h3>";
						}
												
					?>
					
			<?} else {?>
				
				<? // content construction
					$productCategoryName = str_replace("&nbsp; &nbsp;","",$objProductCategoryPlain->getProductCategoryName());
					if($event->getArg('id1') == $fatherCategory) {
						if($event->getArg('id2') == $objProductCategoryPlain->getProductCategorySeoName()) {
							$content = $content."<p style=\"padding:7px 0px 7px 0px;\"><a href=\"".$SN."produkty/".$fatherCategory."/".$objProductCategoryPlain->getProductCategorySeoName().".html\">".$productCategoryName."</a></p>";
						} else {
							$content = $content."<p style=\"padding:7px 0px 7px 0px;\"><a  href=\"".$SN."produkty/".$fatherCategory."/".$objProductCategoryPlain->getProductCategorySeoName().".html\">".$productCategoryName."</a></p>";
						}
					} else {
						$content = "";
					}
				?>
					
			<?}?>
		<?}?>
	<?}?>
	
	<div class="menu_left">
	<?=$header;?>
		<?if($content != "") {?>
			<div class="accordion_content ui-accordion-content" style="display: block;">
				<?=$content;?>
			</div>
		<?}?>
	</div>
</div>