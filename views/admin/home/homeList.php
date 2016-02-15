<?$arrEventsAllowedForLevel = $event->getArg('arrEventsAllowedForLevel'); ?>
    

<div class="ui-widget-header ui-corner-top center-header">
	Admin Panel - Start
</div>			

<div class="ui-widget-content ui-corner-bottom center-content">
		
		<?if (in_array('isadministrator', $arrEventsAllowedForLevel)) {?>
    		
    		<div class="ui-widget-content ui-corner-all center-header">
    			<p>Welcome in administration panel. You are logged in as Administrator</p>
    		</div>
    		
    		<div class="ui-helper-clearfix spacer">
    		</div>
    		
    		<div class="ui-widget-content ui-corner-all center-header">
    			<p>Content Management System (CMS)</p>
    			<p>&nbsp;</p>
    			<span class="wizardButton"><a href="index.php?event=showCmsCategoriesList">Edit Menu</a><span>
    			<span class="wizardButton"><a href="index.php?event=showCmsContentsList">Edit Page</a><span>			
    		</div>
    				
    		<div class="ui-helper-clearfix spacer">
    		</div>
    		
    		
    		<div class="ui-widget-content ui-corner-all center-header">
    			<p>Theme market</p>
    			<p>&nbsp;</p>
    			<span class="wizardButton"><a href="index.php?event=showPollsList">List of Polls</a><span>
    			<span class="wizardButton"><a href="index.php?event=showPollStep1">Add Poll</a><span>			
    		</div>
    		
    		<div class="ui-helper-clearfix spacer">
    		</div>
    		
    		<div class="ui-widget-content ui-corner-all center-header">
                <p>Chat topics</p>
                <p>&nbsp;</p>
                <span class="wizardButton"><a href="index.php?event=showUpdateCategoryList">Edit Topic Tree</a><span>
                <span class="wizardButton"><a href="index.php?event=showTopicsList">List of Topics</a><span>
                <span class="wizardButton"><a href="../index.php?event=lesConsultationsEnCours">Join as Admin</a><span>
            </div>
            
            <div class="ui-helper-clearfix spacer">
            </div>
    		
    		<div class="ui-widget-content ui-corner-all center-header">
                <p>Blog</p>
                <p>&nbsp;</p>
                <span class="wizardButton"><a href="index.php?event=showSigmasList">List of Blog Entries</a><span>
                <span class="wizardButton"><a href="index.php?event=showSigmaStep1">Add Blog Entry</a><span>            
            </div>
                    
            <div class="ui-helper-clearfix spacer">
            </div>
            
            <div class="ui-widget-content ui-corner-all center-header">
                <p>Blog Comments</p>
                <p>&nbsp;</p>
                <span class="wizardButton"><a href="index.php?event=showBookList">List of Blog Comments</a><span>                       
            </div>
            
            <div class="ui-helper-clearfix spacer">
            </div>
    		
    		<div class="ui-widget-content ui-corner-all center-header">
    			<p>Users</p>
    			<p>&nbsp;</p>
    			<span class="wizardButton"><a href="index.php?event=showUsersApprovedList">List of Users</a><span>
    			<span class="wizardButton"><a href="index.php?event=showCreateUserApprovedForm">Add User</a><span>			
    		</div>
    		
    		<div class="ui-helper-clearfix spacer">
    		</div>
		
		<?}?>		
		
		<?if (in_array('isuser', $arrEventsAllowedForLevel)) {?>
		    <div class="ui-widget-content ui-corner-all center-header">
                <p>Welcome in administration panel. You are logged in as Content Manager.</p>
            </div>
            
            <div class="ui-helper-clearfix spacer">
            </div>
            
            <div class="ui-widget-content ui-corner-all center-header">
                <p>Mes Informations</p>
                <p>&nbsp;</p>
                <span class="wizardButton"><a href="index.php?event=changePassword">Modifier son mot de passe</a><span>
                <span class="wizardButton"><a href="index.php?event=changeDetails">Modifier ses informations</a><span>
                <?/*<span class="wizardButton"><a href="index.php?event=removeAccount">Supprimer son compte</a><span>*/?>
            </div>  
            
            <div class="ui-helper-clearfix spacer">                
            </div>
            
            <div class="ui-widget-content ui-corner-all center-header">
                <p>Blog</p>
                <p>&nbsp;</p>
                <span class="wizardButton"><a href="index.php?event=showSigmasListByUser">List of Blog Entries</a><span>
                <span class="wizardButton"><a href="index.php?event=showSigmaStep1">Add Blog Entry</a><span>            
            </div>
                    
            <div class="ui-helper-clearfix spacer">
            </div>
		<?}?>
</div>
