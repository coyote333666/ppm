<?php
	
	if(isset($_POST["components"]) && isset($_POST["section"]))
	{
		$sListePortlet = preg_replace('/\|+/', '|', trim($_POST["components"],'|'));
		if($_POST["section"] == 'section-1')
		{
			$sQuery =
			"
				UPDATE uda_utils
				SET config_portail_section_1	= " . fncSetString($sListePortlet) . "
				WHERE seq_utils 				= " . fncSetInt($_SESSION["seq_utils"])	. ";
			";
			fncQueryPg($sQuery);
		}
		if($_POST["section"] == 'section-2')
		{
			$sQuery =
			"
				UPDATE uda_utils
				SET config_portail_section_2	= " . fncSetString($sListePortlet) . "
				WHERE seq_utils 				= " . fncSetInt($_SESSION["seq_utils"])	. "
			";
			fncQueryPg($sQuery);
		}
	}
	if(isset($_POST["etat"]))
	{
		$sQuery =
		"
			UPDATE uda_utils
			SET config_portail_etat			= " . fncSetString($_POST["etat"]) . "
			WHERE seq_utils 				= " . fncSetInt($_SESSION["seq_utils"])	. ";
		";
		fncQueryPg($sQuery);
	}
?>