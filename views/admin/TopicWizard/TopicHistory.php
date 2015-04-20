

<div class="ui-widget-header ui-corner-all center-header">
	Chat topics - Topic results
</div>

<div class="ui-helper-clearfix spacer"></div>
	
<div style="float:left; width:100%">
	<?$arrTopicMessage = $event->getArg("arrTopicMessage"); ?>
	<?// get total number of votes $totalNumberVotes
		if($arrTopicMessage) {?>
			<ul style="list-style-type: none;">
			<?foreach ($arrTopicMessage as $objTopicMessage) {?>
				<li>
				<?
				$UserId = $objTopicMessage->getUserId();
                $UserDao = new UserDao();
                $objUserBean = $UserDao->read($UserId);
                $UserEmail = $objUserBean->getEmail();
                $TopicId = $objTopicMessage->getTopicId();
                $Message = $objTopicMessage->getMessage();
                $CreateDateTime = $objTopicMessage->getCreateDateTime();
                
                echo date("Y-m-d H:i:s", strtotime($CreateDateTime));
                                
                ?>
                <strong><?=$UserEmail;?></strong> <?=$Message;?>
                </li>
		    <?}?>
			</ul>
		<?}?>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<span class="wizardButton"><a href="index.php?event=showTopicsList">List of Topics</a></span>
</div>