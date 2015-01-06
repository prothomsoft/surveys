<?
$objBookBean=$event->getArg("objBook");
$objSigma =  $event->getArg("objSigma");
?>

<div class="ui-widget" style="margin:-14px 0px 0px 0px;">
	<div class="ui-widget-header ui-corner-top center-header">
		News Comments			
	</div>
	
	<div class="ui-widget-content ui-corner-bottom center-content">
	
	<form id="formBook" name="formBook" action="<?=$SN?>index.php?event=showBookList" method="post">
		<fieldset style="margin-left:12px;">
			<label for="formBookFirstName">Blog Entry Title: <b><?=$objSigma->getName();?></b></label>
			<label for="formBookFirstName">First Name: <?=$objBookBean->getFirstName();?></label>
			<label for="formBookLastName">Last Name: <?=$objBookBean->getLastName();?></label>
			<label for="formBookEmail">Email: <?=$objBookBean->getEmail();?></label>
			<label for="formBookCompanyName">Comment: <?=$objBookBean->getCompanyName();?></label>
		</fieldset>
	
		
	<div class="ui-helper-clearfix spacer">
	</div>
		
	<div class="ui-widget formButtons">
		<input type="submit" value="Go back to the list..." class="wymupdate">		
	</div>
	</form>
	

	</div>
	
	
		
</div>