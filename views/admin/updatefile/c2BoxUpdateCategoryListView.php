<?$arrUpdateCategoriesObjs = $event->getArg('arrUpdateCategoriesObjs');?>
<?$adminCategoriesPath = $event->getArg('adminCategoriesPath')?>



<div class="ui-widget-header ui-corner-top center-header">
	CMS File Manager
</div>

<div class="ui-widget-content ui-corner-bottom center-content">
	<form name="f1" action="index.php?event=showUpdateCategoryList&categoryId=<?echo $event->getArg('categoryId')?>&categoryName=<?echo $event->getArg('categoryName')?>" method="POST">
		<input type="hidden" name="action" value="relist">
		<?if (!$event->isArgDefined('categoryId')) {
			$categoryId = 0;
			$event->setArg('categoryId',$categoryId);
		}?>
		<input type="hidden" name="categoryId" value="<?echo $event->getArg('categoryId')?>" />
		<input type="hidden" name="categoryName" value="<?if ($event->isArgDefined('categoryName')) {echo $event->getArg('categoryName');}?>" />
		
		<fieldset>
			<label for="Breadcrumb">
				<a href="index.php?event=showUpdateCategoryList">Start</a> <?if($event->getArg('adminCategoriesPath')!= "") {echo "> ".$event->getArg('adminCategoriesPath');}?>
			 </label>
		</fieldset>
		
		<fieldset>
			<label for="Description">You can add new entry by filling last entry in this table. Remember to save your changes.</label>
		</fieldset>
		



		<fieldset>
			<table border="1" style="border: 1px solid #999999;">
		
		<tr class="listTableColumnHeaders">
			<td class="listTableColumnHeadersCenter">&nbsp;&nbsp;</td>
			<td class="listTableColumnHeadersCenter">&nbsp;Remove&nbsp;</td>
			<td class="listTableColumnHeadersCenter">&nbsp;Explore&nbsp;</td>
			<td class="listTableColumnHeadersCenter">Folder</td>
			<td class="listTableColumnHeadersCenter">Order</td>
			
		<tr>
		<?if (count($arrUpdateCategoriesObjs) != 0) { ?>
			<?foreach ($arrUpdateCategoriesObjs as $objUpdateCategory) { ?>
			
				<?$objUpdateCategoryGateway = new UpdateCategoryGateway();
				$arrUpdateCategoryObjs = $objUpdateCategoryGateway->findByFatherId($objUpdateCategory->getUpdateCategoryId());
				if (count($arrUpdateCategoryObjs) != 0) {
					$hassubs = 1;
				} else {
					$hassubs = 0;
				}?>
				
				<tr class="listTableRowData">
					<td class="listTableColumnHeadersCenter">&nbsp;&nbsp;</td>
					<?if ( $hassubs == 0 ) { // if no subcategories?>
						<td class="listTableRowDataCenteredItem">
							<input style="width:13px; background-color: #FFFFFF; border: 0px;" type="checkbox" name="delete[]" value="<?echo $objUpdateCategory->getUpdateCategoryId()?>" />
						</td>
					<? } else {?>
						<td class="listTableRowDataCenteredItem">
							<img src="../images/nodelete.jpg" width="12" height="12" alt="Nie możesz usunąć tego folderu" />
						</td>
					<? } ?>
							
					<td class="listTableRowDataCenteredItem">
						<a href="index.php?event=showUpdateCategoryList&categoryId=<?echo $objUpdateCategory->getUpdateCategoryId()?>&categoryName=<?echo urlencode(stripslashes($objUpdateCategory->getName()))?>" />
						<img src="../images/plus.gif" border="0" alt="Eksploruj folder" />
						</a>
					</td>
				
					<td class="listTableRowDataCenteredItem">
						<input type="hidden" name="categories_id[]" value="<?echo $objUpdateCategory->getUpdateCategoryId()?>" />
						<input type="hidden" name="old_categories[]" value="<?echo stripslashes($objUpdateCategory->getName())?>" />
						<input style="width:480px" type="text" name="categories[]" value="<?echo stripslashes($objUpdateCategory->getName())?>" size="25" />
					</td>
					<td class="listTableRowDataCenteredItem">
						<input type="hidden" name="old_description[]" value="<?echo $objUpdateCategory->getListOrder()?>" />
						<input style="width:15px" type="text" name="description[]" value="<?echo $objUpdateCategory->getListOrder()?>" size="2" />
					</td>					
				</tr>
			<?}?>
		<?}?>
		
		<tr class="listTableRowData">
			<td class="listTableColumnHeadersCenter">&nbsp;&nbsp;</td>
			<td class="listTableRowDataCenteredItem" colspan="2">
				Add ->
			</td>
			<td class="listTableRowDataCenteredItem">
				
				<input style="width:480px" type="text" name="new_category" size="25" />
			</td>
			<td class="listTableRowDataCenteredItem">
				<input style="width:15px" type="text" name="cat_description" size="2">
			</td>			
		</tr>
		</table>
		
	</fieldset>
		
		<fieldset class="formButtons">
			<span class="wizardButton"><a href="javascript:document.f1.submit();">Save Changes</a></span>						
		</fieldset>		
	</form>		
</div>