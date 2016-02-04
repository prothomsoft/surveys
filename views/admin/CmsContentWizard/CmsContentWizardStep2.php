<div class="ui-widget-header ui-corner-all center-header">
	CMS - Pictures
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

<div class="ui-widget-content ui-corner-all center-content">
	<form>
        <div id="queue" style="padding-bottom:10px;"></div>
        <input id="file_upload" name="file_upload" type="file" multiple="true">        
    </form>
    
    <div class="ui-helper-clearfix spacer"></div>
    <div id="filesUploaded"></div>
	<div class="ui-helper-clearfix spacer"></div>
	
	<form name="f1" method="post" action="index.php">
		<input type="hidden" name="event" id="event" value="">
	    <input type="hidden" name="CmsContentId" id="CmsContentId" value="<?=$event->getArg('CmsContentId')?>">
	</form>
	
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<span class="wizardButton"><a href="javascript:$('#event').val('executeCmsContentWizardClose');$('#CmsContentId').val('<?=$event->getArg("CmsContentId");?>');document.f1.submit();">Save Changes</a></span>
</div>