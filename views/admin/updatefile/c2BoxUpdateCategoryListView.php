<?$arrCmsUpdateCategoriesObjs = $event->getArg('arrUpdateCategoriesObjs');?>
<?$adminCategoriesPath = $event->getArg('adminCategoriesPath')?>
<div class="ui-widget-header ui-corner-top center-header">
    Edit Topic Tree
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
            <label for="Description">You can add new entry by filling last entry in this table. Remember to save your changes.<br/>
            Is Main Topic set to YES - means that no chat will be created for this and it must have subtopics with Is Main Topic set to NO.</label>
        </fieldset>
        
        <fieldset>
            <table border="1" style="border: 1px solid #999999;">
                
                <?if (count($arrCmsUpdateCategoriesObjs) != 0) { ?>
                    <?foreach ($arrCmsUpdateCategoriesObjs as $objUpdateCategory) { ?>
                        <input type="hidden" name="categories_id[]" value="<?echo $objUpdateCategory->getUpdateCategoryId()?>" />
                        <tr>
                            <?$objUpdateCategoryGateway = new UpdateCategoryGateway();
                            $arrUpdateCategoryObjs = $objUpdateCategoryGateway->findByFatherId($objUpdateCategory->getUpdateCategoryId());?>
                            <?if (count($arrUpdateCategoryObjs) == 0) { // if no subUpdateCategories?>
                                <td>
                                    <input style="width:13px" type="checkbox" name="delete[]" value="<?echo $objUpdateCategory->getUpdateCategoryId()?>" />
                                </td>
                            <? } else {?>
                                <td>
                                    <img src="../images/nodelete.jpg" width="12" height="12" alt="Nie możesz usunąć" />
                                </td>
                            <? } ?>
                            <td>
                                <a href="index.php?event=showUpdateCategoryList&categoryId=<?echo $objUpdateCategory->getUpdateCategoryId()?>&categoryName=<?echo urlencode(stripslashes($objUpdateCategory->getName()))?>" />
                                <img src="../images/plus.gif" border="0" alt="Browse SubUpdateCategories" /></a>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td>Topic title: </td>
                                        <td>
                                            <input type="hidden" name="old_categories[]" value="<?echo stripslashes($objUpdateCategory->getName())?>" />
                                            <input type="text" name="categories[]" value="<?echo stripslashes($objUpdateCategory->getName())?>" style="width:450px;"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is Main Topic: </td>
                                        <td>
                                            <input type="hidden" name="old_isModules[]" value="<?echo stripslashes($objUpdateCategory->getIsModule())?>" />
                                            <select name="isModules[]" style="width:70px; padding:2px; border: 1px solid #999999;">
                                                <?if($objUpdateCategory->getIsModule() == 0) {?>
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                <?} else {?>
                                                    <option value="0">No</option>
                                                    <option value="1" selected>Yes</option>
                                                <?}?>
                                            </select>                                           
                                        </td>
                                    </tr>
                                </table>                    
                            </td>
                            <td>
                                <input type="hidden" name="old_orders[]" value="<?echo $objUpdateCategory->getListOrder()?>" />
                                <input type="text" name="orders[]" value="<?echo $objUpdateCategory->getListOrder()?>" style="width:20px;"/>
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
                                <td>Topic title: </td>
                                <td>
                                    <input type="text" name="new_category" style="width:450px;" />
                                </td>
                            </tr>
                            <tr>
                                <td>Is Main Topic: </td>
                                <td>
                                    <select name="new_isModule" style="width:70px; padding:2px; border: 1px solid #999999;">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>   
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