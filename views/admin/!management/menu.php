<?$arrEventsAllowedForLevel = $event->getArg('arrEventsAllowedForLevel'); ?>
<div id="accordion">

	<?if (in_array('startadmin', $arrEventsAllowedForLevel)) {?>
	<div>
		<h3><a href="#">Admin Panel</a></h3>
		<div class="accordion_content">
			<?$activeStyle = "";
			if ($event->getArg('event') == 'startAdmin') {
				echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 0 );}</script>";
				$activeStyle = "style=\"font-weight:bold\""; 
			}?>
			<p><a <?=$activeStyle?> href="index.php?event=startAdmin">Start</a></p>
			<p><a href="../index.php?event=executelogout">Logout</a></p>
		</div>
	</div>
	<?}?>
	
	<?if (in_array('changepassword', $arrEventsAllowedForLevel)) {?>
	    <div>
            <h3><a href="#">Mes Informations</a></h3>
            <div class="accordion_content">
            <?$arrHighligths = array(
                  changePassword,
                  executeChangePassword,
                  changePasswordConfirmation);
                $currentEvent = $event->getArg('event');
                $activeStyle = "";
                if (in_array($currentEvent, $arrHighligths)) {
                    echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 1 );}</script>";
                    $activeStyle = "style=\"font-weight:bold\"";
                }?>
                <p <?=$activeStyle?>><a href="index.php?event=changePassword">Modifier son mot de passe</a></p>
                <?$arrHighligths = array(
                  changeDetails,
                  executeChangeDetails,
                  changeDetailsConfirmation);
                $currentEvent = $event->getArg('event');
                $activeStyle = "";
                if (in_array($currentEvent, $arrHighligths)) {
                    echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 1 );}</script>";
                    $activeStyle = "style=\"font-weight:bold\"";
                }?>
                <p <?=$activeStyle?>><a href="index.php?event=changeDetails">Modifier ses informations</a></p>
                <?/*<?$arrHighligths = array(
                  removeAccount,
                  executeRemoveAccount,
                  removeAccountConfirmation);
                $currentEvent = $event->getArg('event');
                $activeStyle = "";
                if (in_array($currentEvent, $arrHighligths)) {
                    echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 1 );}</script>";
                    $activeStyle = "style=\"font-weight:bold\"";
                }?>
                <p <?=$activeStyle?>><a href="index.php?event=removeAccount">Supprimer son compte</a></p>*/?>
                        
            </div>
        </div>
	    
	<?}?>
	
	<?if (in_array('showcmscategorieslist', $arrEventsAllowedForLevel)) {?>
		<div>
			<h3><a href="#">CMS</a></h3>
			<div class="accordion_content">
			<?$arrHighligths = array(showCmsCategoriesList);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
		      		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 1 );}</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showCmsCategoriesList">Edit Menu</a></p>	
				<?$arrHighligths = array(
				  showCmsContentsList,
	      		  showCmsContentStep1,
				  showCmsContentStep2,
				  executeCmsContentWizardClose,
				  executeRemoveCmsContentAction);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
		      		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 1 );}</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showCmsContentsList">Edit Page</a></p>		
			</div>
		</div>
	<?}?>
	
	<?if (in_array('getpolltabledata', $arrEventsAllowedForLevel)) {?>
		<div>
			<h3><a href="#">Theme market</a></h3>
			<div class="accordion_content">
			<?$arrHighligths = array(showPollsList, executeRemovePollsAction, executeSavePollsAction, showPollResults);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
		      		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 2 );}</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showPollsList">List of Polls</a></p>
			<?$arrHighligths = array(
	      		  showPollStep1,
				  showPollStep2,				  
				  executePollWizardClose,
				  executeRemovePollAction);
	      			$currentEvent = $event->getArg('event'); 
	      			$activeStyle = "";
	      			if (in_array($currentEvent, $arrHighligths)) {
		      			echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 2 );}</script>";
		      			$activeStyle = "style=\"font-weight:bold\"";
	      			}?>
	      			<p <?=$activeStyle?>><a href="index.php?event=showPollStep1">Add Poll</a></p>
			</div>
		</div>
	<?}?>
	<?if (in_array('gettopictabledata', $arrEventsAllowedForLevel)) {?>
        <div>
            <h3><a href="#">Chat topics</a></h3>
            <div class="accordion_content">
            <?$arrHighligths = array(showUpdateCategoryList);
                $currentEvent = $event->getArg('event');
                $activeStyle = "";
                if (in_array($currentEvent, $arrHighligths)) {
                    echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 3 );}</script>";
                    $activeStyle = "style=\"font-weight:bold\"";
                }?>
                <p <?=$activeStyle?>><a href="index.php?event=showUpdateCategoryList">Edit Topic Tree</a></p>
            <?$arrHighligths = array(showTopicsList, executeRemoveTopicsAction, executeSaveTopicsAction, showTopicHistory);
                $currentEvent = $event->getArg('event');
                $activeStyle = "";
                if (in_array($currentEvent, $arrHighligths)) {
                    echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 3 );}</script>";
                    $activeStyle = "style=\"font-weight:bold\"";
                }?>
                <p <?=$activeStyle?>><a href="index.php?event=showTopicsList">List of Topics</a></p>
            <?$arrHighligths = array(
                  showTopicStep1,
                  showTopicStep2,                 
                  executeTopicWizardClose,
                  executeRemoveTopicAction);
                    $currentEvent = $event->getArg('event'); 
                    $activeStyle = "";
                    if (in_array($currentEvent, $arrHighligths)) {
                        echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 3 );}</script>";
                        $activeStyle = "style=\"font-weight:bold\"";
                    }?>
                    <p><a href="../index.php?event=lesConsultationsEnCours">Join as Admin</a></p>                    
            </div>
        </div>
    <?}?>
	
	<?/*if (in_array('getbetatabledata', $arrEventsAllowedForLevel)) {?>
		<div>
			<h3><a href="#">Product Categories</a></h3>
			<div class="accordion_content">
			<?$arrHighligths = array(showBetasList, executeRemoveBetasAction, executeSaveBetasAction);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
		      		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 3 ); }</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showBetasList">List of Product Categories</a></p>
			<?$arrHighligths = array(
	      		  showBetaStep1,
				  showBetaStep2,
				  executeBetaWizardClose,
				  executeRemoveBetaAction);
	      			$currentEvent = $event->getArg('event'); 
	      			$activeStyle = "";
	      			if (in_array($currentEvent, $arrHighligths)) {
		      			echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 3 );}</script>";
		      			$activeStyle = "style=\"font-weight:bold\"";
	      			}?>
	      			<p <?=$activeStyle?>><a href="index.php?event=showBetaStep1">Add/Edit Category</a></p>
			</div>
		</div>
	<?}*/?>
	
	
	
	<?/*if (in_array('getalfatabledata', $arrEventsAllowedForLevel)) {?>
		<div>
			<h3><a href="#">Magazines</a></h3>
			<div class="accordion_content">
			<?$arrHighligths = array(showAlfasList, executeRemoveAlfasAction, executeSaveAlfasAction);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
		      		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 6 ); }</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showAlfasList">List of Magazines</a></p>
			<?$arrHighligths = array(
	      		  showAlfaStep1,
				  showAlfaStep2,
				  executeAlfaWizardClose,
				  executeRemoveAlfaAction);
	      			$currentEvent = $event->getArg('event'); 
	      			$activeStyle = "";
	      			if (in_array($currentEvent, $arrHighligths)) {
		      			echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 6 );}</script>";
		      			$activeStyle = "style=\"font-weight:bold\"";
	      			}?>
	      			<p <?=$activeStyle?>><a href="index.php?event=showAlfaStep1">Add/Edit Magazine</a></p>
			</div>
		</div>
	<?}*/?>
	
	
	
	
	<?/*if (in_array('showproductcategorieslist', $arrEventsAllowedForLevel)) {?>
		<div>
			<h3><a href="#">Products</a></h3>
			<div class="accordion_content">
			<?$arrHighligths = array(showProductsList, executeRemoveProductsAction, executeSaveProductsAction);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
		      		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 4 );}</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showProductsList">List of Products</a></p>
			<?$arrHighligths = array(
	      		  showProductStep1,
				  showProductStep2,
				  showProductStep3,
				  showProductStep4,
				  executeWizardClose,
				  executeRemoveProductAction);
	      			$currentEvent = $event->getArg('event'); 
	      			$activeStyle = "";
	      			if (in_array($currentEvent, $arrHighligths)) {
		      			echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 4 );}</script>";
		      			$activeStyle = "style=\"font-weight:bold\"";
	      			}?>
	      			<p <?=$activeStyle?>><a href="index.php?event=showProductStep1">Add Product</a></p>
			</div>
		</div>
	<?}*/?>
	
	<?/*if (in_array('showorderslist', $arrEventsAllowedForLevel)) {?>
		<div>
			<h3><a href="#">Orders</a></h3>
			<div class="accordion_content">
				<?$arrHighligths = array(
				showOrdersList, 
				showOrderView, 
				showEditOrderForm,
	      		executeRemoveOrdersAction, 
	      		executeEditOrderAction);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
	          		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 5 );}</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showOrdersList">List of Orders</a></p>
			</div>
		</div>
	<?}*/?>
	
	<?if (in_array('showsigmaslist', $arrEventsAllowedForLevel)) {?>
        <div>
            <h3><a href="#">Blog</a></h3>
            <div class="accordion_content">
            <?$arrHighligths = array(showSigmasList,executeRemoveSigmasAction, executeSaveSigmasAction);
                $currentEvent = $event->getArg('event');
                $activeStyle = "";
                if (in_array($currentEvent, $arrHighligths)) {
                    echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 4 );}</script>";
                    $activeStyle = "style=\"font-weight:bold\"";
                }?>
                <p <?=$activeStyle?>><a href="index.php?event=showSigmasList">List of Blog Entries</a></p>
            <?$arrHighligths = array(
                  showSigmaStep1,
                  showSigmaStep2,
                  executeSigmaWizardClose,
            	  executeSigmaWizardCloseByUser,
                  executeRemoveSigmaAction,
            	  executeRemoveSigmaActionByUser);
                    $currentEvent = $event->getArg('event'); 
                    $activeStyle = "";
                    if (in_array($currentEvent, $arrHighligths)) {
                        echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 4 );}</script>";
                        $activeStyle = "style=\"font-weight:bold\"";
                    }?>
                    <p <?=$activeStyle?>><a href="index.php?event=showSigmaStep1">Add Blog Entry</a></p>
            </div>
        </div>
    <?}?>
	
	
	<?if (in_array('showsigmaslistbyuser', $arrEventsAllowedForLevel)) {?>
        <div>
            <h3><a href="#">Blog</a></h3>
            <div class="accordion_content">
            <?$arrHighligths = array(showSigmasListByUser, executeRemoveSigmasAction, executeSaveSigmasAction);
                $currentEvent = $event->getArg('event');
                $activeStyle = "";
                if (in_array($currentEvent, $arrHighligths)) {
                    echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 4 );}</script>";
                    $activeStyle = "style=\"font-weight:bold\"";
                }?>
                <p <?=$activeStyle?>><a href="index.php?event=showSigmasListByUser">List of Blog Entries</a></p>
            <?$arrHighligths = array(
                  showSigmaStep1,
                  showSigmaStep2,
                  executeSigmaWizardClose,
            	  executeSigmaWizardCloseByUser,
                  executeRemoveSigmaAction,
            	  executeRemoveSigmaActionByUser);
                    $currentEvent = $event->getArg('event'); 
                    $activeStyle = "";
                    if (in_array($currentEvent, $arrHighligths)) {
                        echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 4 );}</script>";
                        $activeStyle = "style=\"font-weight:bold\"";
                    }?>
                    <p <?=$activeStyle?>><a href="index.php?event=showSigmaStep1">Add Blog Entry</a></p>
            </div>
        </div>
    <?}?>
            
    <?/*if (in_array('getdeltatabledata', $arrEventsAllowedForLevel)) {?>
        <div>
            <h3><a href="#">Blog Categories</a></h3>
            <div class="accordion_content">
            <?$arrHighligths = array(showDeltasList, executeRemoveDeltasAction, executeSaveDeltasAction);
                $currentEvent = $event->getArg('event');
                $activeStyle = "";
                if (in_array($currentEvent, $arrHighligths)) {
                    echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 5 );}</script>";
                    $activeStyle = "style=\"font-weight:bold\"";
                }?>
                <p <?=$activeStyle?>><a href="index.php?event=showDeltasList">List of Blog Categories</a></p>
            <?$arrHighligths = array(
                  showDeltaStep1,
                  showDeltaStep2,
                  executeDeltaWizardClose,
                  executeRemoveDeltaAction);
                    $currentEvent = $event->getArg('event'); 
                    $activeStyle = "";
                    if (in_array($currentEvent, $arrHighligths)) {
                        echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 5 );}</script>";
                        $activeStyle = "style=\"font-weight:bold\"";
                    }?>
                    <p <?=$activeStyle?>><a href="index.php?event=showDeltaStep1">Add Blog Category</a></p>
            </div>
        </div>
    <?}*/?>
    
    
    <?if (in_array('getbooktabledata', $arrEventsAllowedForLevel)) {?>
        <div>
            <h3><a href="#">Blog Comments</a></h3>
            <div class="accordion_content">
            <?$arrHighligths = array(showBookList, showBookView, executeRemoveBookAction);
                $currentEvent = $event->getArg('event');
                $activeStyle = "";
                if (in_array($currentEvent, $arrHighligths)) {
                    echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 5 );}</script>";
                    $activeStyle = "style=\"font-weight:bold\"";
                }?>
                <p <?=$activeStyle?>><a href="index.php?event=showBookList">List of Blog Comments</a></p>
            </div>
        </div>
    <?}?>
    
	
	
	<?if (in_array('showusersapprovedlist', $arrEventsAllowedForLevel)) {?>
		<div>
			<h3><a href="#">Users</a></h3>
			<div class="accordion_content">
				<?$arrHighligths = array(showUsersApprovedList, showUserApprovedView, showEditUserApprovedForm,
	      								 executeRemoveUsersApprovedAction, executeEditUserApprovedAction);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
		      		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 6 );}</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showUsersApprovedList">List of Users</a></p>
				<?$arrHighligths = array(showCreateUserApprovedForm,
								   executeCreateUserApprovedAction );
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
	      		 	echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 6 );}</script>";
	      		 	$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showCreateUserApprovedForm">Add User</a></p>
			</div>
		</div>
	<?}?>
	
	<?/*if (in_array('showupdatecategorylist', $arrEventsAllowedForLevel)) {?>
		<div>
			<h3><a href="#">File Manager</a></h3>
			<div class="accordion_content">
				<?$arrHighligths = array(showUpdateCategoryList);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
		      		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 5 );}</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showUpdateCategoryList">Manage Files</a></p>
			</div>
		</div>
	<?}*/?>
	
	<?/*if (in_array('getnewslettertabledata', $arrEventsAllowedForLevel)) {?>
		<div>
			<h3><a href="#">Newsletter</a></h3>
			<div class="accordion_content">
			<?$arrHighligths = array(showNewsletterList, showNewsletterView);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
		      		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 7 );}</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showNewsletterList">Lista of Emails</a></p>
			</div>
		</div>
	<?}*/?>	
	
	<?/*if (in_array('getsigmatabledata', $arrEventsAllowedForLevel)) {?>
		<div>
			<h3><a href="#">Newsletter</a></h3>
			<div class="accordion_content">
			<?$arrHighligths = array(showSigmasList, executeRemoveSigmasAction, executeSaveSigmasAction);
	      		$currentEvent = $event->getArg('event');
	      		$activeStyle = "";
	      		if (in_array($currentEvent, $arrHighligths)) {
		      		echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 8 );}</script>";
		      		$activeStyle = "style=\"font-weight:bold\"";
	      		}?>
				<p <?=$activeStyle?>><a href="index.php?event=showSigmasList">List of Emails</a></p>
			<?$arrHighligths = array(
	      		  showSigmaStep1,
				  showSigmaStep2,
				  executeSigmaWizardClose,
				  executeSigmaWizardCloseByUser,
				  executeRemoveSigmaAction,
				  executeRemoveSigmaActionByUser);
	      			$currentEvent = $event->getArg('event'); 
	      			$activeStyle = "";
	      			if (in_array($currentEvent, $arrHighligths)) {
		      			echo "<script>function initStartAdmin() {\$(\"#accordion\").accordion( \"option\", \"active\", 8 );}</script>";
		      			$activeStyle = "style=\"font-weight:bold\"";
	      			}?>
	      			<p <?=$activeStyle?>><a href="index.php?event=showSigmaStep1">Add/Edit Email Entry</a></p>
			</div>
		</div>
	<?}*/?>
		

</div>