--TEST--
Connect to non existed DB
--FILE--
<?php ## ����������� � ��.
require_once dirname(__FILE__)."/../../../lib/config.php";
require_once "DbSimple/Generic.php";

// ������������ � ��.
$DATABASE = DbSimple_Generic::connect('mysql://test:test@localhost1/non-existed-db');

// ������������� ���������� ������.
$DATABASE->setErrorHandler('databaseErrorHandler');

// ��� ����������� ������ SQL.
function databaseErrorHandler($message, $info)
{
	// ���� �������������� @, ������ �� ������.
	if (!error_reporting()) return;
	$dir = dirname(__FILE__). '/';
	$rpath = str_replace($dir, '', $info['context']);
	echo "Error: ".$info['message']."\n";
	echo "Context: ".$rpath."\n";
	exit();
}
?>
--EXPECT--
Error: not connect
Context: 020_connect_nonex.php line 6
