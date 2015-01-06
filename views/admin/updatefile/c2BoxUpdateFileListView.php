<?require_once("../model/UpdateFileGateway.inc.php");?>
	
<?if ($event->getArg('categoryId') != "0") {?>
	
	<script language="javascript" type="text/javascript">
		function startUpload(){
		      document.getElementById('f1_upload_process').style.visibility = 'visible';
		      return true;
		}
	</script>
	
	<div class="ui-helper-clearfix spacer">
		</div> <!-- end .ui-helper-clearfix spacer -->
	
<div class="ui-widget-header ui-corner-top center-header">
	CMS File Manager
</div>
	
	<?
	$categoryId = $event->getArg('categoryId');
	$objUpdateFileGateway = new UpdateFileGateway();
	$arrUpdateFile = $objUpdateFileGateway->findByUpdateCategoryId($categoryId);
	?>
	<br/>
<div class="sectionFrame">
	<div id="sectionRegisterUser" class="section">
	<table id="listTable" border="1">							
		<tr class="listTableColumnHeaders">			
			<td class="listTableColumnHeadersCenter">File Name</td>
			<td class="listTableColumnHeadersCenter">Description</td>
			<td class="listTableColumnHeadersCenter">URL</td>
			<td class="listTableColumnHeadersCenter">Action</td>
		</tr>
		<? 	if ($arrUpdateFile['0']) { ?>
			 <? foreach($arrUpdateFile as $objUpdateFile) { ?>
					<tr class="listTableRowData">
					  	<td class="listTableRowDataCenteredItem"><? echo stripslashes($objUpdateFile->getFileName());?></td>
					  	<td class="listTableRowDataCenteredItem"><? echo stripslashes($objUpdateFile->getFileDescription());?></td>
					  	<td class="listTableRowDataCenteredItem"><? echo "/dokumenty/".stripslashes($objUpdateFile->getDriveName());?></td>
					  	<td class="listTableRowDataCenteredItemAction">
					  		<a href="index.php?event=remove&categoryId=<?echo $event->getArg('categoryId')?>&categoryName=<?echo $event->getArg('categoryName')?>&UpdateFileId=<?=$objUpdateFile->getUpdateFileId()?>"><font color="black">Remove</font></a>
					  	</td>
				   	</tr>
			<? } ?>
		<?} else {?>
			<tr class="listTableRowData">	
			 	<td colspan="6" class="listTableRowDataCenteredItem"><br />
			 		<p>No files in the folder.</p>			 		
			 	</td>
			 </tr>
		<? } ?>
	</table>		
	</div>
	
	<div id="sectionRegisterUser" class="section" style="padding-left:10px;">
		<br/>You can insert this file into CMS page using editor in HTML view. The file will be inserted by placing following code (you need to remove dots from the example):<br/>
		<.a href="URL pliku" target="_blank">Name of the file<./a><br/>
		where URL and File Name can be taken directly from table.<br/><br/>
		
		<font color="red">Warning:</font> Please do not use french characters and replace spaces with sign "_" in file names. Names of the files must be short.<br/>
		Recommended format for files is <strong>.pdf</strong> because user does not have to have Excela, Worda, Power Point to see them.
	</div>
	
</div>
<br/>
<div class="sectionFrame">
	<div id="sectionRegisterUser" class="section">
	<form name="f2" action="index.php?event=upload&categoryId=<?echo $event->getArg('categoryId')?>&categoryName=<?echo $event->getArg('categoryName')?>" method="post" enctype="multipart/form-data" onsubmit="startUpload();" >
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
        	<tr>
				<td width="100%" colspan="3">
				&nbsp;
				</td>
			</tr>
			<tr>
				<td width="40%" align="right">
				File name: &nbsp;&nbsp;&nbsp;&nbsp;
				</td>
				<td width="60%">
					<input size="100" type="text" name="FileName" id="FileName" value="<?echo $event->getArg('FileName');?>" accesskey="" tabindex="" maxlength="100" style="width:400px;"/>
				</td>
			</tr>
			<tr>
				<td align="right">
				Description: &nbsp;&nbsp;&nbsp;&nbsp;
				</td>
				<td>
					<input size="100" type="text" name="FileDescription" id="FileDescription" value="<?echo $event->getArg('FileDescription');?>" accesskey="" tabindex="" 	maxlength="100" style="width:400px;"/>
				</td>
			</tr>					
			<tr>
				<td align="right" valign="middle">
				File: &nbsp;&nbsp;&nbsp;&nbsp;
				</td>
				<td>
					<input type="file" name="myfile" size="30"/><br/>
				</td>
			</tr>
			<tr>
				<td width="100%" colspan="3">
				&nbsp;
				</td>
			</tr>
		</table>
	</form>
	</div>
</div>

<div class="sectionFrame">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td width="100%">&nbsp;
		</td>
	</tr>
	<tr>
		<td width="100%" align="center">
		
			<span class="wizardButton"><a href="javascript:startUpload();document.f2.submit();">Save Changes</a></span>
			
		</td>
	</tr>
</table>
</div>

<div class="sectionFrame">	
	<p id="f1_upload_process" style="visibility:hidden; text-align:center;"><br/><br/>File is sending to the server. Please wait...<br/><img src="../images/loader.gif" /><br/></p>
</div>
	
 <?}?>