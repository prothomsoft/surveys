<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>

<div class="spacer-15"></div>
<span style="font-family:Georgia; font-size: 20px; font-style:italic; color:#E11825; padding-left:10px;">Add new comment confirmation</span>

<div class="center-content">
<table width="600px"><tbody>
    <tr>
    <td>
		<form id="formForgotPasswordConfirm" onsubmit="return false;" action="">  
		<fieldset style="margin-left:0px;">
			<label>Merci, votre commentaire a bien été envoyé. Il sera en ligne dès qu'il aura été validé par le modérateur du blog.<br/><br/><a href="<?=$SN?>blog.html">Revenir...</a>.</label>
		</fieldset>
		</form>
	</td></tr>
	</tbody></table>
		<div class="ui-helper-clearfix spacer"></div>
</div>




