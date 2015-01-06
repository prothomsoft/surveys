
<div class="ui-widget-header ui-corner-all center-header">
	CMS - Content
</div>

<?if ($event->getArg('message') != "") {?>
<div class="ui-helper-clearfix spacer"></div>
<div class="ui-state-error ui-corner-all" style="padding: 8px;">
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
	<strong>Warning:</strong> <?=$event->getArg('message');?></p> 
</div>
<?}?>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget">
	<?php echo $event->getArg('CmsContentWizardNavigation')?>
</div>

<div class="ui-helper-clearfix spacer"></div>


<form name="f1" method="post" action="index.php">
<input type="hidden" name="event" id="event" value="showCmsContentStep2">
<input type="hidden" name="CmsContentId" id="CmsContentId" value="<?=$event->getArg('CmsContentId')?>">
<input type="hidden" name="Status" id="Status" value="1">
<input type="hidden" name="CmsContentOrder" id="CmsContentOrder" value="1">
<input type="hidden" name="ShortDescription" id="ShortDescription" value="">
<input type="hidden" name="NameTransEN" id="NameTransEN" value="">
<input type="hidden" name="NameTransDE" id="NameTransDE" value="">
<input type="hidden" name="NameTransRU" id="NameTransRU" value="">
<input type="hidden" name="LongDescriptionTransEN" id="LongDescriptionTransEN" value="">
<input type="hidden" name="LongDescriptionTransDE" id="LongDescriptionTransDE" value="">
<input type="hidden" name="LongDescriptionTransRU" id="LongDescriptionTransRU" value="">
		
<div class="ui-widget-content ui-corner-all center-content">
	<fieldset>
		<label for="Name">Title</label>
		<input type="text" name="Name" id="Name" value="<?echo htmlspecialchars_decode($event->getArg('Name'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Name") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Keyword">Keyword</label>
		<input type="text" name="Keyword" id="Keyword" value="<?echo htmlspecialchars_decode($event->getArg('Keyword'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Keyword") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Description">Description</label>
		<input type="text" name="Description" id="Description" value="<?echo htmlspecialchars_decode($event->getArg('Description'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Description") echo "ui-state-error"?>" />
	</fieldset>
	
	<?/*
	<fieldset>
		<label for="ShortDescription">YouTube Code: http://www.youtube.com/embed/KjQEAb6VT-E</label>
		<input type="text" name="ShortDescription" id="ShortDescription" value="<?echo htmlspecialchars_decode($event->getArg('ShortDescription'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "ShortDescription") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="ShortDescriptionTransEN">YouTube Code: http://www.youtube.com/embed/KjQEAb6VT-E</label>
		<input type="text" name="ShortDescriptionTransEN" id="ShortDescriptionTransEN" value="<?echo htmlspecialchars_decode($event->getArg('ShortDescriptionTransEN'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "ShortDescriptionTransEN") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="ShortDescriptionTransDE">YouTube Code: http://www.youtube.com/embed/KjQEAb6VT-E</label>
		<input type="text" name="ShortDescriptionTransDE" id="ShortDescriptionTransDE" value="<?echo htmlspecialchars_decode($event->getArg('ShortDescriptionTransDE'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "ShortDescriptionTransDE") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="ShortDescriptionTransRU">YouTube Code: http://www.youtube.com/embed/KjQEAb6VT-E</label>
		<input type="text" name="ShortDescriptionTransRU" id="ShortDescriptionTransRU" value="<?echo htmlspecialchars_decode($event->getArg('ShortDescriptionTransRU'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "ShortDescriptionTransRU") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om1">Soundcloud embed object URL 1</label>
		<input type="text" name="Om1" id="Om1" value="<?echo htmlspecialchars_decode($event->getArg('Om1'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om1") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om2">Soundcloud embed object URL 2</label>
		<input type="text" name="Om2" id="Om2" value="<?echo htmlspecialchars_decode($event->getArg('Om2'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om2") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om3">Soundcloud embed object URL 3</label>
		<input type="text" name="Om3" id="Om3" value="<?echo htmlspecialchars_decode($event->getArg('Om3'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om3") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om4">Soundcloud embed object URL 4</label>
		<input type="text" name="Om4" id="Om4" value="<?echo htmlspecialchars_decode($event->getArg('Om4'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om4") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om5">Soundcloud embed object URL 5</label>
		<input type="text" name="Om5" id="Om5" value="<?echo htmlspecialchars_decode($event->getArg('Om5'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om5") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om6">Soundcloud embed object URL 6</label>
		<input type="text" name="Om6" id="Om6" value="<?echo htmlspecialchars_decode($event->getArg('Om6'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om6") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om7">Soundcloud embed object URL 7</label>
		<input type="text" name="Om7" id="Om7" value="<?echo htmlspecialchars_decode($event->getArg('Om7'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om7") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om8">Soundcloud embed object URL 8</label>
		<input type="text" name="Om8" id="Om8" value="<?echo htmlspecialchars_decode($event->getArg('Om8'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om8") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om9">Soundcloud embed object URL 9</label>
		<input type="text" name="Om9" id="Om9" value="<?echo htmlspecialchars_decode($event->getArg('Om9'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om9") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om10">Soundcloud embed object URL 10</label>
		<input type="text" name="Om10" id="Om10" value="<?echo htmlspecialchars_decode($event->getArg('Om10'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om10") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om11">Soundcloud embed object URL 11</label>
		<input type="text" name="Om11" id="Om11" value="<?echo htmlspecialchars_decode($event->getArg('Om11'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om11") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om12">Soundcloud embed object URL 12</label>
		<input type="text" name="Om12" id="Om12" value="<?echo htmlspecialchars_decode($event->getArg('Om12'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om12") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om13">Soundcloud embed object URL 13</label>
		<input type="text" name="Om13" id="Om13" value="<?echo htmlspecialchars_decode($event->getArg('Om13'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om13") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om14">Soundcloud embed object URL 14</label>
		<input type="text" name="Om14" id="Om14" value="<?echo htmlspecialchars_decode($event->getArg('Om14'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om14") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om15">Soundcloud embed object URL 15</label>
		<input type="text" name="Om15" id="Om15" value="<?echo htmlspecialchars_decode($event->getArg('Om15'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om15") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om16">Soundcloud embed object URL 16</label>
		<input type="text" name="Om16" id="Om16" value="<?echo htmlspecialchars_decode($event->getArg('Om16'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om16") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om17">Soundcloud embed object URL 17</label>
		<input type="text" name="Om17" id="Om17" value="<?echo htmlspecialchars_decode($event->getArg('Om17'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om17") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Om18">Soundcloud embed object URL 18</label>
		<input type="text" name="Om18" id="Om18" value="<?echo htmlspecialchars_decode($event->getArg('Om18'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Om18") echo "ui-state-error"?>" />
	</fieldset>
	 */?>
	 
	
</div>
	
<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
	    <fieldset style="width:750px;">
			<label for="LongDescription">Content</label>
				<textarea name="LongDescription" id="LongDescription" cols="91" rows="15" class="wymeditor"><?echo htmlspecialchars_decode($event->getArg('LongDescription'));?></textarea>						
		</fieldset>
</div>
<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<input type="submit" value="Add Pictures" class="wymupdate">
		<span class="wizardButton wymupdate"><a href="javascript:$('#event').val('executeCmsContentWizardClose');$('#CmsContentId').val('<?=$event->getArg("CmsContentId");?>');document.f1.submit();">Save Changes</a></span>
</div>
</form>				