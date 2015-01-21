<div class="ui-widget-header ui-corner-all center-header">
	Theme market - Poll definition
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
	<?php echo $event->getArg('PollWizardNavigation')?>
</div>

<div class="ui-helper-clearfix spacer"></div>


<form name="f1" method="post" action="index.php">
<input type="hidden" name="validation" id="validation" value="1">
<input type="hidden" name="event" id="event" value="showPollStep2">
<input type="hidden" name="PollId" id="PollId" value="<?=$event->getArg('PollId')?>">
<input type="hidden" name="Keyword" id="Keyword" value="<?=$event->getArg('Keyword')?>">
<input type="hidden" name="Description" id="Description" value="<?=$event->getArg('Description')?>">
<input type="hidden" name="LongDescription" id="LongDescription" value="<?=$event->getArg('LongDescription')?>">
<input type="hidden" name="ShortDescription" id="ShortDescription" value="<?=$event->getArg('ShortDescription')?>">

<div class="ui-widget-content ui-corner-all center-content">
	
	<div style="float:left; width:100%">
	
		<?if($event->getArg('PollOrder') != 0) {
			$maxPollOrder = $event->getArg("PollOrder");
		} else {
			$maxPollOrder = $event->getArg("maxPollOrder");
			$maxPollOrder = $maxPollOrder + 1;
		}?>	
	
		<fieldset >
			<label for="PollOrder">Order <font color="red">*</font></label>
			<input style="width:80px" type="text" name="PollOrder" id="PollOrder" value="<?=$maxPollOrder?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "PollOrder") echo "ui-state-error"?>" />
		</fieldset>
		
		<fieldset>
			<label for="Name">Status (only one poll can be open for votes in the time):</label>
				<select name="Status" id="Status" style="width:220px; padding:2px; border: 1px solid #DEDEDE;">
					<?if($event->getArg("Status") == 0) {?>
						<option value="0" selected>In development</option>
						<option value="1">Open for votes</option>
						<option value="2">Closed for votes</option>
					<?} else if($event->getArg("Status") == 1) {?>
						<option value="0">In development</option>
						<option value="1" selected>Open for votes</option>
						<option value="2">Closed for votes</option>
					<?} else {?>
						<option value="0">In development</option>
						<option value="1">Open for votes</option>
						<option value="2" selected>Closed for votes</option>
					<?}?>	
				</select>
		</fieldset>
		
		<fieldset>
			<p>Status description:</p>
			<p>In development - it means that you can change poll question and answers</p>
			<p>Open for votes - it means that poll appears for users and cannot be changed anymore</p>
			<p>Closed for votes - it means that poll was closed and archived</p>
			
		</fieldset>
	</div>
	<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
	
	<?if($event->getArg("Status") == "0") {?>
		<fieldset>
			<label for="Name">Open question</label>
			<input type="text" name="OpenQuestion" id="OpenQuestion" value="<?echo $event->getArg('OpenQuestion');?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "OpenQuestion") echo "ui-state-error"?>" />
		</fieldset>
			
		<fieldset>
			<label for="Name">Poll question and answers</label>
			<input type="text" name="Question" id="Question" value="<?echo $event->getArg('Question');?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Question") echo "ui-state-error"?>" />
		</fieldset>
		
		<div class="well" style="padding:10px;">
            <div id="answers">
            	<?$arrPollAnswers = $event->getArg("arrPollAnswers");?>
            	<?if ($arrPollAnswers) {?>
                <? foreach ($arrPollAnswers as $objPollAnswer) { ?>
            		<div id="answers-<?=$objPollAnswer->getPollAnswerOrder();?>" style="padding:5px 0px 5px 0px;"><input type="text" placeholder="Put your answers here" name="answers[<?=$objPollAnswer->getPollAnswerOrder();?>]" class="text ui-widget-content ui-corner-all" size="255" value="<?=htmlentities($objPollAnswer->getPollAnswer()); ?>"> <button type="button" onclick="removeAnswer(<?=$objPollAnswer->getPollAnswerOrder();?>);">X</button></div>
                <? } ?>
                <? } else {?>
                <div id="answers-0" style="padding:5px 0px 5px 0px;"><input type="text" placeholder="Put your answers here" name="answers[0]" class="text ui-widget-content ui-corner-all" size="255"> <button type="button" class="btn" onclick="removeAnswer(0);">X</button></div>
                <div id="answers-1" style="padding:5px 0px 5px 0px;"><input type="text" placeholder="Put your answers here" name="answers[1]" class="text ui-widget-content ui-corner-all" size="255"> <button type="button" class="btn" onclick="removeAnswer(1);">X</button></div>
                <div id="answers-2" style="padding:5px 0px 5px 0px;"><input type="text" placeholder="Put your answers here" name="answers[2]" class="text ui-widget-content ui-corner-all" size="255"> <button type="button" class="btn" onclick="removeAnswer(2);">X</button></div>
                <div id="answers-3" style="padding:5px 0px 5px 0px;"><input type="text" placeholder="Put your answers here" name="answers[3]" class="text ui-widget-content ui-corner-all" size="255"> <button type="button" class="btn" onclick="removeAnswer(3);">X</button></div>
                <?}?>
            </div>
            <button type="button" class="btn" onclick="addAnswer();">Add answer</button>
	    </div>
	<?} else {?>
		<div class="well" style="padding:10px;">
			<div style="padding:5px 0px 5px 0px;"><strong>Open question:</strong> <br/><br/><?echo $event->getArg('OpenQuestion');?></div>
		</div>
		
		<div class="well" style="padding:10px;">
			<div style="padding:5px 0px 5px 0px;"><strong>Open question and answers:</strong> <br/><br/><?echo $event->getArg('Question');?></div>
		</div>
		
		<div class="well" style="padding:10px;">
            <div id="answers">
            	<?$arrPollAnswers = $event->getArg("arrPollAnswers");?>
            	<?if (count($arrPollAnswers) > 0) {?>
                <? foreach ($arrPollAnswers as $objPollAnswer) { ?>
            		<div id="answers-<?=$objPollAnswer->getPollAnswerOrder();?>" style="padding:5px 0px 5px 0px;"><?=htmlentities($objPollAnswer->getPollAnswer()); ?></div>
                <? } ?>
                <? } else {?>
                <div id="answers-0" style="padding:5px 0px 5px 0px;"><input type="text" placeholder="Put your answers here" name="answers[0]" class="text ui-widget-content ui-corner-all" size="255"></div>
                <div id="answers-1" style="padding:5px 0px 5px 0px;"><input type="text" placeholder="Put your answers here" name="answers[1]" class="text ui-widget-content ui-corner-all" size="255"></div>
                <div id="answers-2" style="padding:5px 0px 5px 0px;"><input type="text" placeholder="Put your answers here" name="answers[2]" class="text ui-widget-content ui-corner-all" size="255"></div>
                <div id="answers-3" style="padding:5px 0px 5px 0px;"><input type="text" placeholder="Put your answers here" name="answers[3]" class="text ui-widget-content ui-corner-all" size="255"></div>
                <?}?>
            </div>            
	    </div>
	<?}?>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<?/*?><input type="submit" value="Add Picture" class="wymupdate"><?*/?>
	<span class="wizardButton"><a href="javascript:$('#event').val('executePollWizardClose');$('#PollId').val('<?=$event->getArg("PollId");?>');document.f1.submit();">Save Changes</a></span>
</div>
</form>

<script>
function addAnswer() {
    answers = $("#answers input").length
    $("#answers").append('<div id="answers-'+answers+'" style="padding:5px 0px 5px 0px;"><input type="text" placeholder="Put your answers here" name="answers['+answers+']" class="text ui-widget-content ui-corner-all" size="255">  <button type="button" class="btn" onclick="removeAnswer('+answers+');">X</div>')
}
function checkShow() {
    if ($("input[name=show_hide_results]:checked").val() == 0) {
        $("#result_orders").hide();
    } else {
        $("#result_orders").show();
    }
    if ($("input[name=vote_repeating]:checked").val() == 1) {
        $("#expire_cookie").show();
    } else {
        $("#expire_cookie").hide();
    }
}
function removeAnswer(id) {
    $("#answers-"+id).remove();
}
$(document).ready(function() {
    checkShow();
})
</script>