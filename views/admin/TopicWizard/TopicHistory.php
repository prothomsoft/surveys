

<div class="ui-widget-header ui-corner-all center-header">
	Chat topics - Topic results
</div>

<div class="ui-helper-clearfix spacer"></div>
	
<div style="float:left; width:100%">
	<?$arrTopicMessage = $event->getArg("arrTopicMessage"); ?>
	<?// get total number of votes $totalNumberVotes
		if($arrTopicMessage) {?>
            <table width="860px" style="border: 1px solid #DEDEDE;">
                                			
    			<?foreach ($arrTopicMessage as $objTopicMessage) {?>
    			    <tr style="border: 1px solid #DEDEDE;">
    				<?$UserId = $objTopicMessage->getUserId();
                    $UserDao = new UserDao();
                    $objUserBean = $UserDao->read($UserId);
                    $UserEmail = $objUserBean->getEmail();
                    $TopicMessageId = $objTopicMessage->getTopicMessageId();
                    
                    $TopicId = $objTopicMessage->getTopicId();
                    $Message = $objTopicMessage->getMessage();
                    $CreateDateTime = $objTopicMessage->getCreateDateTime();
                    if($UserId == 3) {
                        echo "<td style=\"border: 1px solid #DEDEDE; color: #FF0000;\">";    
                    } else {
                        echo "<td style=\"border: 1px solid #DEDEDE; color: #000000;\">";
                    }
                    
                    echo "(".date("Y-m-d h:i A", strtotime($CreateDateTime)).")";?>
                    <strong><?=$UserEmail;?></strong>: <?=$Message;?>
                    <?echo "</td>";
                    echo "<td style=\"text-align:center;\">";?>
                        
                    <a href="index.php?event=executeRemoveTopicMessageAction&TopicMessageId=<?=$TopicMessageId;?>&TopicId=<?=$TopicId?>" onclick="return confirm('Are you sure you want to remove this record?')">Remove</a>
                    <?echo "</td>";?>
                    </tr>
    		    <?}?>
		          
            </table>

		<?}?>
</div>

<div class="ui-helper-clearfix spacer"></div>
<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<span class="wizardButton"><a href="index.php?event=showTopicsList">List of Topics</a></span>
</div>