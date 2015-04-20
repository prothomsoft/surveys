<div class="ui-widget-header ui-corner-all center-header">
	Chat topics - Topic definition
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
	<?php echo $event->getArg('TopicWizardNavigation')?>
</div>

<div class="ui-helper-clearfix spacer"></div>


<form name="f1" method="post" action="index.php">
<input type="hidden" name="validation" id="validation" value="1">
<input type="hidden" name="Status" id="Status" value="1">
<input type="hidden" name="event" id="event" value="showTopicStep2">
<input type="hidden" name="TopicId" id="TopicId" value="<?=$event->getArg('TopicId')?>">
<input type="hidden" name="Keyword" id="Keyword" value="<?=$event->getArg('Keyword')?>">
<input type="hidden" name="Description" id="Description" value="<?=$event->getArg('Description')?>">
<input type="hidden" name="LongDescription" id="LongDescription" value="<?=$event->getArg('LongDescription')?>">
<input type="hidden" name="ShortDescription" id="ShortDescription" value="<?=$event->getArg('ShortDescription')?>">
<input type="hidden" name="OpenQuestion" id="OpenQuestion" value="<?=$event->getArg('OpenQuestion')?>">

<div class="ui-widget-content ui-corner-all center-content">
	
	<div style="float:left; width:100%">
	
		<?if($event->getArg('TopicOrder') != 0) {
			$maxTopicOrder = $event->getArg("TopicOrder");
		} else {
			$maxTopicOrder = $event->getArg("maxTopicOrder");
			$maxTopicOrder = $maxTopicOrder + 1;
		}?>	
	
		<fieldset>
			<label for="TopicOrder">Order <font color="red">*</font></label>
			<input style="width:80px" type="text" name="TopicOrder" id="TopicOrder" value="<?=$maxTopicOrder?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "TopicOrder") echo "ui-state-error"?>" />
		</fieldset>
		
		<fieldset>
            <label for="Name">Status (Open/Closed):</label>
                <select name="Status" id="Status" style="width:220px; padding:2px; border: 1px solid #DEDEDE;">
                    <?if($event->getArg("Status") == 0) {?>
                        <option value="0" selected>Open for discussion</option>
                        <option value="1">Closed for discussion</option>
                    <?} else {?>
                        <option value="0">Open for discussion</option>
                        <option value="1" selected>Closed for discussion</option>
                    <?}?>   
                </select>
        </fieldset>
        
        <fieldset>
            <p>Status description:</p>
            <p>Open for discussion - it means that topic appears for users</p>
            <p>Closed for discussion - it means that topic was closed and archived</p>            
        </fieldset>
		
	</div>
	<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
    <fieldset>
        <label for="Name">Topic title</label>
        <input type="text" name="Question" id="Question" value="<?echo $event->getArg('Question');?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Question") echo "ui-state-error"?>" />
    </fieldset>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<?/*?><input type="submit" value="Add Picture" class="wymupdate"><?*/?>
	<span class="wizardButton"><a href="javascript:$('#event').val('executeTopicWizardClose');$('#TopicId').val('<?=$event->getArg("TopicId");?>');document.f1.submit();">Save Changes</a></span>
</div>
</form>