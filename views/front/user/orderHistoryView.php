<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>

<div class="ui-widget-header ui-corner-top center-header">
	Historia zamówień
</div>				


<div class="ui-widget-content ui-corner-bottom center-content">
	<div id="divOrdersTable">
		<form>
			<input type="hidden" id="selectedRowId" name="selectedRowId" value="">
			<div id="container">
				<div id="dynamic">
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="idOrdersTable">
						<thead>
							<tr>
								<th width="10%">Nr zam.</th>
								<th width="15%">Data</th>
								<th width="15%">Imię i nazwisko</th>
								<th width="0%">Nazwisko</th>
								<th width="15%">Suma</th>
								<th width="15%">Zapłacone</th>
								<th width="10%">Wysłane</th>
								<th width="15%">Szczegóły</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="6" class="dataTables_empty">Wczytywanie danych...</td>
							</tr>
						</tbody>					
					</table>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->

<div class="ui-widget" style="text-align:center;">
	<span class="shoppingCartButton" style="line-height: 1em; letter-spacing: 0em;">
			<a href="<?=$SN?>fvr.html">Powrót do sklepu</a>
		</span>
</div>