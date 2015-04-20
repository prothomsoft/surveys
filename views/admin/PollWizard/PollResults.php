<?
$objPoll = $event->getArg("objPoll");
$PollOpenAnswer = $event->getArg("PollOpenAnswer");
$PollAnswerId = $event->getArg("PollAnswerId");
$arrPollAnswers = $event->getArg("arrPollAnswers");
$totalNumberVotes = $event->getArg("totalNumberVotes");
$arrPollVote = $event->getArg("arrPollVote");
?>

<div class="ui-widget-header ui-corner-all center-header">
	Theme market - Poll results
</div>

<div class="ui-helper-clearfix spacer"></div>
	
<div style="float:left; width:100%">
	<?$objPollVoteGateway = new PollVoteGateway(); ?>
	<h3><?=$objPoll->getQuestion();?></h3>
	<h4>Total number of votes: <?=$totalNumberVotes;?></h4>
	<?// get total number of votes $totalNumberVotes
		if($arrPollAnswers) {?>

			<ul style="list-style-type: none;">
			<?foreach ($arrPollAnswers as $objPollAnswer) {?>
				<li>
				<?
				$PollAnswerId = $objPollAnswer->getPollAnswerId();
				$PollId = $objPoll->getPollId();
				$arrAnswerNumberVotes = $objPollVoteGateway->findByPollAndPollAnswerId($PollId, $PollAnswerId);
				$answerNumberVotes  = 0;
				if($arrAnswerNumberVotes) {
					$answerNumberVotes = count($arrAnswerNumberVotes);
				}
				$percentage = $answerNumberVotes / $totalNumberVotes;
				
				$objPollAnswerDao = new PollAnswerDao();
				$objPollAnswerBean = $objPollAnswerDao->read($PollAnswerId);?>
				
				<?=htmlentities($objPollAnswerBean->getPollAnswer());?> - <?=number_format($percentage*100, 2)?>%
				(<?=number_format($answerNumberVotes)?>
				<?if($answerNumberVotes == 1) {
					echo "vote)";
				} else {
					echo "votes)";
				}?>
				<br/> 
				<div class="progress">
					<div class="bar" style="width: <?=number_format($percentage*100, 2); ?>%"></div>
				</div>
				</li>
				<?}?>
			</ul>
			<?}?>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div style="float:left; width:100%">
		<h4><?=$objPoll->getOpenQuestion();?></h4>
		<table style="border: 1px solid #666">
		<tr>
			<td width="30%" style="border: 1px solid #666"><strong>User Email</strong></td>
			<td width="70%" style="border: 1px solid #666"><strong>Answer</strong></td>
		</tr>
		<?if($arrPollVote) {?>
			<?foreach ($arrPollVote as $objPollVote) {?>
				<?if ($objPollVote->getPollAnswerId() == 0) {?>
					<?$UserDao = new UserDao();
					  $UserId = $objPollVote->getUserId();
					  $objUserBean = $UserDao->read($UserId);
					  
					  $pollAnswer = $objPollVote->getPollOpenAnswer();
					  if($pollAnswer == "Please enter Your answer here...") {
						$pollAnswer = "-";
					  }
					  ?>
					<tr>
						<td style="border: 1px solid #666"><?=$objUserBean->getEmail();?></td>
						<td style="border: 1px solid #666"><?=$pollAnswer;?></td>
					</tr>
				<?}?>
			
				
			<?}?>
		<?}?>
		</table>	
</div>

<div class="ui-helper-clearfix spacer"></div>
<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<span class="wizardButton"><a href="index.php?event=showPollsList">List of polls</a></span>
</div>