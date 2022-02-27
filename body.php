<style>
	body {
	min-width: 520px;
	}
	.column {
	width: 50%;
	float: left;
	padding-bottom: 100px;
	}
	.portlet {
	margin: 0 1em 1em 0;
	padding: 0.3em;
	}
	.portlet-header {
	padding: 0.2em 0.3em;
	margin-bottom: 0.5em;
	position: relative;
	}
	.portlet-toggle {
	position: absolute;
	top: 50%;
	right: 0;
	margin-top: -8px;
	}
	.portlet-content {
	padding: 0.4em;
	}
	.portlet-placeholder {
	border: 1px dotted black;
	margin: 0 1em 1em 0;
	height: 50px;
	}
</style>
<script>
	$( function() {

	var showOrHide = <?php
		$sQuery =
		"
			SELECT config_portail_etat,config_portail_section_1,config_portail_section_2
			FROM uda_utils
			WHERE seq_utils 				= " . fncSetInt($_SESSION["seq_utils"])	. ";
		";
		$oRecordset = fncQueryPg($sQuery);	
		if(!empty($oRecordset[0]["config_portail_etat"]["VALUE"]))
		{
			echo($oRecordset[0]["config_portail_etat"]["VALUE"]);
		} 
		else
		{
			if(!empty($oRecordset[0]["config_portail_section_1"]["VALUE"]))
			{
				$portlet = explode("|", $oRecordset[0]["config_portail_section_1"]["VALUE"]);
			}
			if(!empty($oRecordset[0]["config_portail_section_2"]["VALUE"]))
			{
				$portlet_section_2 = explode("|", $oRecordset[0]["config_portail_section_2"]["VALUE"]);
				for($z=0; $z<sizeof($portlet_section_2); $z++)
				{
					array_push($portlet,$portlet_section_2[$z]);
				}	
			}
			for($z=0; $z<sizeof($portlet); $z++)
			{
				$key = str_replace('portlet_','portlet-content-',$portlet[$z]);
				$aPortlet[$key] = 1;
			}	
			echo(json_encode($aPortlet));
		} ?>;
	
	$( ".column" ).sortable({		
		connectWith: ".column",
		handle: ".portlet-header",
		cancel: ".portlet-toggle",
		placeholder: "portlet-placeholder ui-corner-all",
        update: function (event, ui) {
			var list =  $(this).sortable("toArray").join("|");
			var data = { 
						'section': this.id,              
						'components': list
						}
			$.ajax({
				data: data,
				type: 'POST',
				url: '<?php echo(S_FILE_PORTLET_UPDATE); ?>'
			}); 
		}
	});
	$( ".portlet" )
		.addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
		.find( ".portlet-header" )
		.addClass( "ui-widget-header ui-corner-all" )
		.prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
	$( ".portlet-toggle" ).on( "click", function() {
		var icon = $( this );
		icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
		icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
		var x = icon.closest( ".portlet" ).find( ".portlet-content" ).attr("id"); 

		if ( showOrHide[x] == 1 ) 
		{
			showOrHide[x] = 0;
		} 
		else if ( showOrHide[x] == 0 ) 
		{
			showOrHide[x] = 1;
		}		

		var data = { 
						'etat' : JSON.stringify(showOrHide)					
					}
		$.ajax({
			data: data,
			type: 'POST',
			url: '<?php echo(S_FILE_PORTLET_UPDATE); ?>'
		}); 		
	});
	$(window).ready(function()
	{
		for (var k in showOrHide)
		{
			if (showOrHide.hasOwnProperty(k)) 
			{
				if (showOrHide[k] == 1 ) 
				{
					$('#' + k).show();
				} 
				else if (showOrHide[k] == 0 ) 
				{
					$('#' + k).hide();
				}
			}
		}
	});
	});
</script>

<div class="column" id="section-1">
<?php
	$sQuery =
	"
		SELECT config_portail_section_1,config_portail_section_2
		FROM uda_utils
		WHERE seq_utils 				= " . fncSetInt($_SESSION["seq_utils"])	. ";
	";
	$oRecordset = fncQueryPg($sQuery);
	$section_1 = $oRecordset[0]["config_portail_section_1"]["VALUE"];
	$section_2 = $oRecordset[0]["config_portail_section_2"]["VALUE"];

	if(!empty($section_1))
	{
		$portlet = explode("|", $section_1);
		for($z=0; $z<sizeof($portlet); $z++)
		{
			require_once($portlet[$z] . ".php");
		}
	}
	
?>
</div>
<div class="column" id="section-2">
<?php
	if(!empty($section_2))
	{
		$portlet = explode("|", $section_2);
		for($z=0; $z<sizeof($portlet); $z++)
		{
			require_once($portlet[$z] . ".php");
		}
	}
?>
</div>


