<?$arrProductCategoriesObjs = $event->getArg('arrProductCategoriesObjs');?>
<?$adminCategoriesPath = $event->getArg('adminCategoriesPath')?>
<div class="ui-widget-header ui-corner-top center-header">
	Products - Product Categories
</div>
<div class="ui-widget-content ui-corner-bottom center-content">
	<form name="f1" action="index.php?event=showProductCategoriesList&categoryId=<?echo $event->getArg('categoryId')?>&categoryName=<?echo $event->getArg('categoryName')?>" method="POST">
		<input type="hidden" name="action" value="relist">
		
		<fieldset>
			<label for="Breadcrumb">
				<a href="index.php?event=showProductCategoriesList">Top</a> <?if($event->getArg('adminCategoriesPath')!= "") {echo "> ".$event->getArg('adminCategoriesPath');}?>
			 </label>
		</fieldset>
		
		<fieldset>
			<label for="Description">You can add new entry by filling last entry in this table. Remember to save your changes.</label>
		</fieldset>
		
		<fieldset>
			<table>
				<tr class="ui-widget ui-widget-header">
					<td width="10%">Del</td>
					<td width="10%">Explore</td>
					<td width="75%">Name</td>
					<td width="5%">Order</td>
				</tr>	
				<?if (count($arrProductCategoriesObjs) != 0) { ?>
					<?foreach ($arrProductCategoriesObjs as $objProductCategory) { ?>
						
						<tr>
							<?$objProductCategoryGateway = new ProductCategoryGateway();
							$arrProductCategoryObjs = $objProductCategoryGateway->findByFatherId($objProductCategory->getProductCategoryId());?>
							<?if (count($arrProductCategoryObjs) == 0) { // if no subcategories?>
								<td>
									<input style="width:13px; background-color: #FFFFFF; border: 0px;" type="checkbox" name="delete[]" value="<?echo $objProductCategory->getProductCategoryId()?>" />
								</td>
							<? } else {?>
								<td>
									<img src="../images/nodelete.jpg" width="12" height="12" alt="You cannot delete this category" />
								</td>
							<? } ?>
							<td>
								<a href="index.php?event=showProductCategoriesList&categoryId=<?echo $objProductCategory->getProductCategoryId()?>&categoryName=<?echo urlencode(stripslashes($objProductCategory->getName()))?>" />
								<img src="../images/plus.gif" border="0" alt="Browse Subcategories" /></a>
							</td>
							<td>
								<table>
									<tr>
										<td>Name: </td>
										<td>
											<input type="hidden" name="categories_id[]" value="<?echo $objProductCategory->getProductCategoryId()?>" />
											<input type="hidden" name="old_categories[]" value="<?echo stripslashes($objProductCategory->getName())?>" />
											<input type="text" name="categories[]" value="<?echo stripslashes($objProductCategory->getName())?>" style="width:450px;"/>
										</td>
									</tr>
									<tr>
										<td>Description: </td>
										<td>
											<input type="hidden" name="old_descr[]" value="<?echo stripslashes($objProductCategory->getDescr())?>" />
											<input type="text" name="descr[]" value="<?echo stripslashes($objProductCategory->getDescr())?>" style="width:450px;"/>
										</td>
									</tr>
								</table>
							</td>	
							<td>
								<input type="hidden" name="old_description[]" value="<?echo $objProductCategory->getListOrder()?>" />
								<input type="text" name="description[]" value="<?echo $objProductCategory->getListOrder()?>" style="width:20px;"/>
							</td>							
						</tr>
					<?}?>
				<?}?>
				
				<?if (!$event->isArgDefined('categoryId')) {
					$categoryId = 0;
					$event->setArg('categoryId',$categoryId);
				}?>
				
				<tr>
					<td colspan="2">
						Add ->
					</td>
					<td>
						<table>
							<tr>
								<td>Name: </td>
								<td>
									<input type="hidden" name="categoryId" value="<?echo $event->getArg('categoryId')?>" />
									<input type="hidden" name="categoryName" value="<?if ($event->isArgDefined('categoryName')) {echo $event->getArg('categoryName');}?>" />
									<input type="text" name="new_category" style="width:450px;" />
								</td>
							</tr>
							<tr>
								<td>Description: </td>
								<td>
									<input type="text" name="new_descr" style="width:450px;" />
								</td>
							</tr>
						</table>
					
						
					</td>
					<td>
						<input type="text" name="cat_description"  style="width:20px;"/>
					</td>					
				</tr>
			</table>
		</fieldset>
		<fieldset class="formButtons">
			<input type="submit" value="Save">			
		</fieldset>		
	</form>		
</div>
	