<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');

$objSigma = $event->getArg("objSigma");
?>

<?if ($event->getArg('message') != "") {?>
<div class="ui-helper-clearfix spacer">
	<div class="ui-state-error ui-corner-all" style="padding: 8px;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
		<font color="#FFF"><strong>Attention:</strong> <?=$event->getArg('message');?></font></p> 
	</div>
</div> <!-- end .ui-helper-clearfix spacer -->
<?}?>

<div class="spacer-15"></div>
<span style="font-family:Georgia; font-size: 20px; font-style:italic; color:#E11825; padding-left:0px;">Ajouter un commentaire</span>

<div class="ui-helper-clearfix spacer12"></div>

	<p>Vous commentez: <strong><?=$objSigma->getName();?></strong></p>

<div class="center-content">
	<table><tbody>
	    <tr>
	    <td valign="top">
		<form id="formBook" name="formBook" action="<?=$SN;?>blog_comment_save.html" method="post">
			<input type="hidden" name="id1" value="<?=$event->getArg("id1")?>">
			
			<fieldset style="margin-left:12px;">
				<label for="formBookFirstName">Votre prénom: <font color="red">*</font></label>
				<input style="width:250px" type="text" name="firstName" value="<?=$event->getArg("firstName")?>" id="formBookFirstName" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "firstName") echo "ui-state-error"?>" />
				<label for="formBookLastName">Votre nom: <font color="red">*</font></label>
				<input style="width:250px" type="text" name="lastName" value="<?=$event->getArg("lastName")?>" id="formBookLastName" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "lastName") echo "ui-state-error"?>" />
				<label for="formBookEmail">Adresse de messagerie:</label>
				<input style="width:250px" type="text" name="email" value="<?=$event->getArg("email")?>" id="formBookEmail" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "email") echo "ui-state-error"?>" />
				<label for="formBookCompanyName">Commentaire: <font color="red">*</font></label>
				<textarea style="width:450px" id="formBookCompanyName" name="companyName" cols="40" rows="8" class="text ui-widget-content  ui-corner-all"><?=$event->getArg("companyName")?></textarea>
				
			</fieldset>
	     </td>
	     </tr>
	     <tr>
		    <td>&nbsp;
		    </td>
	    </tr>
	    <tr>
		    <td>
			    <div style="text-align:center; padding: 20px 0px 20px 0px;">
		<span id="Book">
			<a href="javascript:document.formBook.submit();">Ajoutez mon commentaire</a>
		</span>
	</div>    
				
		    </td>
	    </tr>
	    </form>	    
    </tbody></table>
    
    
	
    