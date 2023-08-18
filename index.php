<?php
	/**
	 * ppm - PHP page manager
	 *
	 * @see https://github.com/coyote333666/ppm The ppm GitHub project
	 *
	 * @author    Vincent Fortier <coyote333666@gmail.com>
	 * @copyright 2021 Vincent Fortier
	 * @license   http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
	 * @note      This program is distributed in the hope that it will be useful - WITHOUT
	 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
	 * FITNESS FOR A PARTICULAR PURPOSE.
	 */

	session_start();

	define("FILE_FUNCTION"			, "function.php");
	define("FILE_BODY"				, "body.php");
	define("FILE_FOOTER"			, "footer.php");
	define("FILE_INDEX"				, "index.php");
	define("PARAMETER_REDIRECTOR"	, "page=");
	define("FILE_HEADER"			, "header.html");
	define("PG_SERVER"				, "localhost");
	define("PG_USERNAME"			, "test");
	define("PG_PASSWORD"			, "test");
	define("PG_DATABASE"			, "test");
	define("PG_PORT"				, "5432");						
	define("LOAD_START"				, microtime(true));

	// JQuery
	define("DIR_JQUERY"			, "../node_modules/jquery/dist/");
	define("FILE_JQUERY"			, DIR_JQUERY	. "jquery.min.js");

	// TableExport.js
	define("FILE_DIR_NODE_MODULES"		, "../node_modules/");		
	define("FILE_XLSX_JS"		, FILE_DIR_NODE_MODULES . "xlsx/dist/xlsx.full.min.js");	
	define("FILE_FILESAVER_JS"	, FILE_DIR_NODE_MODULES . "file-saverjs/FileSaver.min.js");	
	define("FILE_TABLEXPORT_JS"	, FILE_DIR_NODE_MODULES . "tableexport/dist/js/tableexport.min.js");	
	define("FILE_TABLEXPORT_CSS"	, FILE_DIR_NODE_MODULES . "tableexport/dist/css/tableexport.min.css");	


	$linesPerPage					= 5;
	$currentPage					= 1;

	if(!isset($_GET["oReset"]))
	{
		if(isset($_GET["linesPerPage"]))					{	$linesPerPage 			= $_GET["linesPerPage"];			}
		if(isset($_GET["currentPage"]))						{	$currentPage 				= $_GET["currentPage"];		}
	}

	require_once(FILE_FUNCTION);

	require_once(FILE_HEADER);

	echo('</head>');
	echo('<body>');

	$query =
	"SELECT *" . PHP_EOL . 
	"FROM test"  . PHP_EOL;

	if(isset($_GET["order"]))
	{
		$query .=	"ORDER BY " . $_GET["order"] ;
	}	
	else
	{
		$query .= "ORDER BY 1";
	}
	
	require(FILE_BODY);

	echo(fncDisplayTable($_GET, $recordset, 'test',FILE_INDEX, $linesPerPage));

	require(FILE_FOOTER);
	
	echo('</body>');
	echo('</html>');
?>
<script>
		var TabExp = document.getElementById('exptable');
    /* 
        $(TabExp).tableExport({
            headers: true,
            footers: true,
            formats: ['xlsx', 'csv', 'txt'],
            filename: 'id',
            bootstrap: true,
            position: 'bottom',
            ignoreRows: null,
            ignoreCols: null,
            ignoreCSS: '.tableexport-ignore',
            emptyCSS: '.tableexport-empty',
            trimWhitespace: false,
            RTL: false,
            sheetname: 'id'
        });
		*/
    $(TabExp).tableExport({
        });	
</script>
