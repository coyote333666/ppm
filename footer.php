<?php

		if(((($currentPage-1)*$linesPerPage)+$linesPerPage) > $recCount[0]["Count"]["VALUE"])
		{
			$lineCount = $recCount[0]["Count"]["VALUE"]-(($currentPage-1)*$linesPerPage);
		}
		else
		{
			$lineCount = $linesPerPage;
		}
		echo("<p>Results : from " . ((($currentPage-1)*$linesPerPage)+1) . " to " . ((($currentPage-1)*$linesPerPage)+$lineCount) . ", of " . $recCount[0]["Count"]["VALUE"] . " (" . fncGetLoadTime() . ")</p>");
		echo paginate($_GET, "&currentPage=", $pageCount, $currentPage);
		echo('<br>');

	
?>
