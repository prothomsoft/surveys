<?
require_once("model/components/session.inc.php");
require_once("model/components/translator.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
$oT = new Translator('template3',$sLang);
$openQuestionStatus = $event->getArg("openQuestionStatus");
$pollQuestionStatus = $event->getArg("pollQuestionStatus");
$objPoll = $event->getArg("objPoll");

$PollOpenAnswer = $event->getArg("PollOpenAnswer");
$PollAnswerId = $event->getArg("PollAnswerId");

$arrPollAnswers = $event->getArg("arrPollAnswers");
$totalNumberVotes = $event->getArg("totalNumberVotes");

/*echo "Open question status:".$openQuestionStatus."<br/>";
echo "Poll question status:".$pollQuestionStatus."<br/>";
if($objPoll){
	echo "PollId:".$objPoll->getPollId()."<br/>";	
}
echo "Open poll answer:".$PollOpenAnswer."<br/>";
echo "Close poll answer Id:".$PollAnswerId."<br/>";
echo "Total number votes:".$totalNumberVotes."<br/>";*/



?>
	<!-- Begin Main -->
	<div role="main" class="main">
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?if($pollQuestionStatus == 1){ ?>
						<h3 style="text-align:center"><?=$oT->gL("txtThemeMarket");?></h3>
						<p style="text-align: center"><?=$oT->gL("txtAlreadyVoted");?></p>
						
						<div class="well">
									<?$objPollVoteGateway = new PollVoteGateway(); ?>
								
									<h4><?=$objPoll->getQuestion();?></h4>
									<p style="padding-left:40px"><i class="fa fa-user"></i> <?=$totalNumberVotes;?> <?=$oT->gL("txtVoters")?></p>
									<?// get total number of votes $totalNumberVotes
									if($arrPollAnswers) {?>

										<ul style="list-style-type: none;">
										<?foreach ($arrPollAnswers as $objPollAnswer) {?>
											<li>
											<?
											$PollAnswerId = $objPollAnswer->getPollAnswerId();
											$PollId = $objPoll->getPollId();
											$arrAnswerNumberVotes = $objPollVoteGateway->findByPollAndPollAnswerId($PollId, $PollAnswerId);
											$answerNumberVotes = 0;
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
						
						
						<div style="text-align:center; padding:10px 0px 30px 0px;"><a class="btn btn-primary" href="<?=$SN;?>myAccountStart.html">MON COMPTE</a></div>
					<?} else if($objPoll){ ?>
						<form name="themeMarketForm" method="POST" action="<?=$SN?>executeThemeMarketAction.html">
							<h3 style="text-align:center"><?=$oT->gL("txtThemeMarket");?></h3>
								<div class="well">
								<h4><?=$objPoll->getOpenQuestion();?></h4>
								<div>
									<textarea name="PollOpenAnswer" id="PollOpenAnswer" rows="3" style="width:100%">Merci d'entrer votre réponse ici...</textarea>
								</div>
								</div>
							<div class="well">
								<h4><?=$objPoll->getQuestion();?></h4>
								<div style="padding:0px 20px 0px 20px">
									<?if($arrPollAnswers) {
										foreach ($arrPollAnswers as $objPollAnswer) {?>
											<label class="radio"><input type="radio" name="PollAnswerId" value="<?=$objPollAnswer->getPollAnswerId();?>"><?=$objPollAnswer->getPollAnswer();?></label>
										<?}
									}?>						    
					            </div>
				          </div>
				          <div style="text-align:center; padding:10px 0px 30px 0px;"><a href="javascript:document.themeMarketForm.submit();" class="btn btn-primary" role="button">Vote</a></div>
			           </form>
					<?} else {?>
						<h3 style="text-align:center"><?=$oT->gL("txtThemeMarket");?></h3>
						<p style="text-align: center"><?=$oT->gL("txtActivePollsWereNotFound");?></p>
						<div style="text-align:center; padding:10px 0px 30px 0px;"><a class="btn btn-primary" href="<?=$SN;?>myAccountStart.html">MON COMPTE</a></div>
					<?}?>

				</div>
			</div>	
		</div>
	</div>
	<!-- End Main -->
	
	<script>
		$(document).ready(function() {
			$("#PollOpenAnswer").focus(function() {
			   if($(this).val() == "<?=$oT->gL("txtPleaseEnterYourAnswerHere")?>") {
					$(this).val("");
			   }
			});

			$("#PollOpenAnswer").blur(function() {
				if($(this).val() == "") {
					$(this).val("<?=$oT->gL("txtPleaseEnterYourAnswerHere")?>");
				}
			});
		});
	</script>