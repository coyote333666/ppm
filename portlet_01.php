<?php

	$sQuery =
	"
		SELECT 	header
		FROM portlet
		WHERE portlet_name = 'portlet_01'
	";
	
	$oRecordset = fncQueryPg($sQuery);
	$header ='';
	if(sizeof($oRecordset) > 0)
	{
		$header = $oRecordset[0]["header"]["VALUE"];
	}
	
?>
	<div class="portlet" id="portlet_01">
		<div class="portlet-header" id="portlet-header-01"><?php echo($header); ?></div>
		<div class="portlet-content" id="portlet-content-01">
		<?php
			$sQuery = "SELECT 
				'<a href=''?" . S_PARAMETER_REDIRECTOR . S_FILE_LISTE_DEMANDE . "&seq_demnd=' || a.seq_demnd || '&oFiltrer=''><img src=''" . S_IMG_DEMANDE . "'' height=''" . I_HEIGHT_IMAGE . "'' title=''Demande''></a>'  AS lien				
				, CAST(a.dt_debut AS VARCHAR(10))	AS dt_debut
				, '<h4 style =''background-color:#' || coalesce(sa.coulr,'') || '''>' || coalesce(sa.libelle,'') || '</h4>' AS statut_action
				, d.no_client						AS no_client
				, e.nom								AS entrp	
				, '<h4 style =''background-color:#' || coalesce(sd.coulr,'') || '''>' || coalesce(sd.libelle,'') || '</h4>' AS statut_demnd
				, '<h4 style =''background-color:#' || coalesce(p.coulr,'')	|| '''>' || coalesce(p.nom,'') 		|| '</h4>' AS priorité				
				FROM uea_assgn						a
				LEFT JOIN uea_demnd					d		ON d.seq_demnd		= a.seq_demnd
				LEFT JOIN uea_entrp					e		ON e.seq_entrp		= d.seq_entrp
				LEFT JOIN uea_statt					sa		ON sa.seq_statt		= a.seq_statt
				LEFT JOIN uea_statt					sd		ON sd.seq_statt		= d.seq_statt
				LEFT JOIN uea_prirt					p		ON p.seq_prirt		= d.seq_prirt
				WHERE	a.dt_suppr		IS NULL
					AND d.dt_suppr		IS NULL
					AND a.dt_fin  		IS NULL
					AND a.seq_utils 	= " . $_SESSION["seq_utils"] . "
				ORDER BY d.no_client,CAST(a.dt_debut AS VARCHAR(10))
				";
				$oRsActionsOuvertes = fncQueryPg($sQuery);
				fncEchoArray($oRsActionsOuvertes);
		
		?>
		</div>
	</div>


?>