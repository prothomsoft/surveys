<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');

$objSigma = $event->getArg("objSigma");
$deltaId = $objSigma->getDeltaId();
$DeltaDaoObj = new DeltaDao();
$objDelta = $DeltaDaoObj->read($deltaId);
$objSigmaPictureGateway = new SigmaPictureGateway(); 
$arrSigmaPictures = $objSigmaPictureGateway->getBySigmaObjAndId($objSigma->getSigmaId());
?>

<div class="cms subpage_head">
	<div>
		<h3><font color="#666">Nyheter</font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->


<div style="float:left; width:750px;">
		<?// for each entry count number of comments
		$sigmaId = $objSigma->getSigmaId();
		$BookGatewayObj = new BookGateway();
		$arrCount = $BookGatewayObj->findAllAuthorized($sigmaId);
		if($arrCount) {
			$counter = count($arrCount);
		} else {
			$counter = 0;
		}?>
		<div class="list-box ui-helper-clearfix">
			<div class="list-box-left">
				<?if ($objSigma->getImgDriveName() != "") {?>
					<a href="<?=$SN?>upload/proper/<?=$objSigma->getImgDriveName();?>" class="photo anchor_link_1" rel="prettyPhoto" title="<?=htmlspecialchars_decode($objSigma->getName());?>"><img src="<?=$SN?>upload/micro/<?=$objSigma->getImgDriveName();?>" alt="<?=htmlspecialchars_decode($objSigma->getName());?>"></a>
				<? } else { ?>
					<a href="#" class="anchor_link_1"><img src="<?=$SN?>images/hotel.jpg"></a>
				<?} ?>
			</div>
			<div class="list-box-right">
				<h3><a class="anchor_link_2" href="<?=$SN?>news_comment/<?=$objSigma->getSigmaId();?>.html"><?=htmlspecialchars_decode($objSigma->getName())?></a></h3>
				<p style="color:#666;"><?=htmlspecialchars_decode($objSigma->getKeyword())?> / <?=$objSigma->getEventDate();?> / <?=$counter;?> Comments</p>
				<?=htmlspecialchars_decode($objSigma->getLongDescription())?>
				<p><a class="anchor_link_2" href="<?=$SN?>news.html"><u>gå tilbake...</u></a>
				</p>
			</div>
		</div>
		<div class="ui-helper-clearfix list-box-spacer"></div>
</div>

<div>
<?$arrBooks = $event->getArg('arrBooks');?>
		<?if($arrBooks[0]) {?>
			<?foreach($arrBooks as $objBook) {?>
				<div class="list-box-comment ui-helper-clearfix">
					<div class="list-box-center">
						<h3><?=htmlspecialchars_decode($objBook->getFirstName())?> <?=htmlspecialchars_decode($objBook->getLastName())?></h3>
						<?// we need to parse the date
						$createDate = $objBook->getCreateDate();
						$year = substr($createDate, 0, 4);
						$month = substr($createDate, 5, 2);
						$day = substr($createDate, 8, 2);
						?>
						<p><?=$day.".".$month.".".$year?></p>
						<p><?=htmlspecialchars_decode($objBook->getCompanyName())?></p>
					</div>
				</div>
				<div class="ui-helper-clearfix spacer12"></div>
			<?}?>
		<?} else {?>
			<div style="padding:10px;">
				<p>No comments.<br/><br/></p>
			</div>
			<div class="ui-helper-clearfix spacer12"></div>
		<?}?>
</div>

<div class="cms subpage_head">
	<div>
		<h3><font color="#666">Add Your comment</font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->

<div>
	<?if ($event->getArg('message') != "") {?>
	<div class="ui-helper-clearfix spacer">
		<div class="ui-state-error ui-corner-all" style="padding: 8px;">
			<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
			<font color="#FFF"><strong>Warning:</strong> <?=$event->getArg('message');?></font></p> 
		</div>
	</div> <!-- end .ui-helper-clearfix spacer -->
	<?}?>

	<table><tbody>
	    <tr>
	    <td valign="top">
		<form id="formBook" name="formBook" action="<?=$SN;?>news_comment_save.html" method="post">
			<input type="hidden" name="id1" value="<?=$event->getArg("id1")?>">
			<fieldset>
				<label for="formBookFirstName">First Name: <font color="red">*</font></label>
				<input style="width:250px" type="text" name="firstName" value="<?=$event->getArg("firstName")?>" id="formBookFirstName" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "firstName") echo "ui-state-error"?>" />
				<label for="formBookLastName">Last Name: <font color="red">*</font></label>
				<input style="width:250px" type="text" name="lastName" value="<?=$event->getArg("lastName")?>" id="formBookLastName" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "lastName") echo "ui-state-error"?>" />
				<label for="formBookEmail">Email:</label>
				<input style="width:250px" type="text" name="email" value="<?=$event->getArg("email")?>" id="formBookEmail" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "email") echo "ui-state-error"?>" />
				<label for="formBookCompanyName">Comment: <font color="red">*</font></label>
				<textarea style="width:460px" id="formBookCompanyName" name="companyName" cols="40" rows="8" class="text ui-widget-content  ui-corner-all"><?=$event->getArg("companyName")?></textarea>
			</fieldset>
	     </td>
	     </tr>
	     
	    <tr>
		    <td>
			    <p style="text-align:left"><img id="captcha" src="<?=$SN?>/filters/securimage/securimage_show.php" alt="CAPTCHA Image" />
			    <br/>
			    <fieldset>
			    <label for="123">Enter text from the image:  <font color="red">*</font> (<a href="#" onclick="document.getElementById('captcha').src = '<?=$SN?>/filters/securimage/securimage_show.php?' + Math.random(); return false">Change the image</a>)</label>
			    <input style="width:250px" class="text ui-widget-content ui-corner-all" type="text" name="captcha_code" size="20" maxlength="16" />&nbsp;&nbsp;&nbsp;
			    </fieldset
				</p>
				
				<div style="text-align:left; padding: 20px 0px 20px 10px;">
				<span id="Book">
					<a href="javascript:document.formBook.submit();">Add new comment</a>
				</span>
	</div>    
				
		    </td>
	    </tr>
	    </form>	    
    </tbody></table>
   </div>
    
	
    