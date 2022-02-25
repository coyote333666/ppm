<?php
	/**
	 * pjp - PHP Jquery UI portal
	 *
	 * @see https://github.com/coyote333666/pjp The pjp GitHub project
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
	define("S_FILE_PORTLET_01"		, "portlet_01.php");
	define("S_FILE_PORTLET_02"		, "portlet_02.php");
	define("S_FILE_PORTLET_03"		, "portlet_03.php");
	define("S_FILE_PORTLET_UPDTE"	, "portlet_update.php");
	define("PARAMETER_REDIRECTOR"	, "page=");
	define("FILE_HEADER"			, "header.html");
	define("PG_SERVER"				, "localhost");
	define("PG_USERNAME"			, "test");
	define("PG_PASSWORD"			, "test");
	define("PG_DATABASE"			, "test");
	define("PG_PORT"				, "5432");						

	require_once(FILE_FUNCTION);

	require_once(FILE_HEADER);

	echo('</head>');
	echo('<body>');
	
	require(FILE_BODY);

	require(FILE_FOOTER);
	
	echo('</body>');
	echo('</html>');
?>
