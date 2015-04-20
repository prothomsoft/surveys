<?if ($event->getArg('message') != "") {?>
	<div class="ui-state-error ui-corner-all" style="padding: 8px;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
		<strong>Warning:</strong> <?=$event->getArg('message');?></p> 
	</div>
	<div class="ui-helper-clearfix spacer"></div> 
<?}?>

<div class="ui-widget-header ui-corner-top center-header">
	Users - User Management
</div>

<div class="ui-widget-content ui-corner-bottom center-content" style="padding-right:20px;">
	<form id="formAddEditNewUserApproved" action="index.php?event=<?=$event->getArg("submitEvent").$urlExtension;?>" method="post">
		<input type="hidden" name="userId" value="<?=$event->getArg("userId")?>">
		<input type="hidden" name="nipPL" value="<?=$event->getArg("nipPL")?>">
		<input type="hidden" name="companyName" value="<?=$event->getArg("companyName")?>">
			
		<fieldset>
			<label for="email">Email: <br/><?=$event->getArg("email")?></label>			
		</fieldset>
		
		<div style="float:left; width:100%">
			<fieldset>
				<label for="nameFirst">Y compris vous-même, combien y a-t-il de salariés dans votre entreprise ?:<br/> <?=$event->getArg("phone1")?></label>
			</fieldset>
			<fieldset>
				<label for="nameFirst">Depuis combien d’années dirigez-vous votre entreprise ?:<br/> <?=$event->getArg("website1")?></label>
			</fieldset>
			<fieldset>
				<label for="nameFirst">Dans quelle région est située votre entreprise ?:<br/> <?=$event->getArg("phone2")?></label>
			</fieldset>
		</div>
		
		<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<span id="List"><a href="index.php?event=showUsersApprovedList">List of Users</a></span>
</div>
</form>
