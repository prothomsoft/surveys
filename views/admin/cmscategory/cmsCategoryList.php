	<?$arrCmsCategoriesObjs = $event->getArg('arrCmsCategoriesObjs');?>
<?$adminCategoriesPath = $event->getArg('adminCategoriesPath')?>
<div class="ui-widget-header ui-corner-top center-header">
	CMS - Edit Menu
</div>
<div class="ui-widget-content ui-corner-bottom center-content">
	<form name="f1" action="index.php?event=showCmsCategoriesList&categoryId=<?echo $event->getArg('categoryId')?>&categoryName=<?echo $event->getArg('categoryName')?>" method="POST">
		<input type="hidden" name="action" value="relist">
		<?if (!$event->isArgDefined('categoryId')) {
			$categoryId = 0;
			$event->setArg('categoryId',$categoryId);
		}?>
		<input type="hidden" name="categoryId" value="<?echo $event->getArg('categoryId')?>" />
		<input type="hidden" name="categoryName" value="<?if ($event->isArgDefined('categoryName')) {echo $event->getArg('categoryName');}?>" />
		
		<fieldset>
			<label for="Breadcrumb">
				<a href="index.php?event=showCmsCategoriesList">Start</a> <?if($event->getArg('adminCategoriesPath')!= "") {echo "> ".$event->getArg('adminCategoriesPath');}?>
			 </label>
		</fieldset>
		
		<fieldset>
			<label for="Description">You can add new entry by filling last entry in this table. Remember to save your changes.</label>
		</fieldset>
		
		<fieldset>
			<table border="1" style="border: 1px solid #999999;">
				
				<?if (count($arrCmsCategoriesObjs) != 0) { ?>
					<?foreach ($arrCmsCategoriesObjs as $objCmsCategory) { ?>
						<input type="hidden" name="categories_id[]" value="<?echo $objCmsCategory->getCmsCategoryId()?>" />
						<tr>
							<?$objCmsCategoryGateway = new CmsCategoryGateway();
							$arrCmsCategoryObjs = $objCmsCategoryGateway->findByFatherId($objCmsCategory->getCmsCategoryId());?>
							<?if (count($arrCmsCategoryObjs) == 0) { // if no subcategories?>
								<td>
									<input style="width:13px" type="checkbox" name="delete[]" value="<?echo $objCmsCategory->getCmsCategoryId()?>" />
								</td>
							<? } else {?>
								<td>
									<img src="../images/nodelete.jpg" width="12" height="12" alt="Nie możesz usunąć" />
								</td>
							<? } ?>
							<td>
								<a href="index.php?event=showCmsCategoriesList&categoryId=<?echo $objCmsCategory->getCmsCategoryId()?>&categoryName=<?echo urlencode(stripslashes($objCmsCategory->getName()))?>" />
								<img src="../images/plus.gif" border="0" alt="Browse Subcategories" /></a>
							</td>
							<td>
								<table>
									<tr>
										<td>Title: </td>
										<td>
											<input type="hidden" name="old_categories[]" value="<?echo stripslashes($objCmsCategory->getName())?>" />
											<input type="text" name="categories[]" value="<?echo stripslashes($objCmsCategory->getName())?>" style="width:450px;"/>
										</td>
									</tr>
									<tr>
										<td>Page URL: </td>
										<td>http://grandeconsultation.fr/surveys_page/<?echo stripslashes($objCmsCategory->getSeoName())?>.html</td>
									</tr>
									<tr>
										<td>Is Component: </td>
										<td>
											<input type="hidden" name="old_isModules[]" value="<?echo stripslashes($objCmsCategory->getIsModule())?>" />
											<select name="isModules[]" style="width:70px; padding:2px; border: 1px solid #999999;">
												<?if($objCmsCategory->getIsModule() == 0) {?>
													<option value="0" selected>No</option>
													<option value="1">Yes</option>
												<?} else {?>
													<option value="0">No</option>
													<option value="1" selected>Yes</option>
												<?}?>
											</select>											
										</td>
									</tr>
									<tr>
										<td>Component URL: </td>
										<td>
											<input type="hidden" name="old_urls[]" value="<?echo stripslashes($objCmsCategory->getUrl())?>" />
											<input type="text" name="urls[]" value="<?echo stripslashes($objCmsCategory->getUrl())?>" style="width:450px;"/>
										</td>
									</tr>
								</table>					
							</td>
							<td>
								<input type="hidden" name="old_orders[]" value="<?echo $objCmsCategory->getListOrder()?>" />
								<input type="text" name="orders[]" value="<?echo $objCmsCategory->getListOrder()?>" style="width:20px;"/>
							</td>							
						</tr>
					<?}?>
				<?}?>
				
				
				
				<tr>
					<td colspan="2" align="center">
						Add
					</td>
					<td>
						<table>
							<tr>
								<td>Title: </td>
								<td>
									<input type="text" name="new_category" style="width:450px;" />
								</td>
							</tr>
							<tr>
								<td>Is Component: </td>
								<td>
									<select name="new_isModule" style="width:70px; padding:2px; border: 1px solid #999999;">
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select>	
								</td>
							</tr>
							<tr>
								<td>Component URL: </td>
								<td>
									<input type="text" name="new_url" style="width:450px;" />
								</td>
							</tr>
						</table>
					</td>
					<td>						
						<input type="text" name="new_order" style="width:20px;" />
					</td>					
				</tr>				
			</table>
		</fieldset>
		
		<fieldset class="formButtons">
			<input type="submit" value="Save">			
		</fieldset>		
	</form>		
</div>
	