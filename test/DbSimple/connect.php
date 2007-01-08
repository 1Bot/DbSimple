<?php ## ����������� � ��.
require_once "../../lib/config.php";
require_once "DbSimple/DSN.php";

// �������� ������ ��� ������� � �� �� �������� �����, 
// ����� �� �������������.
@include "{$_SERVER['DOCUMENT_ROOT']}/../forum/dbconfig.php";
if (!empty($dbpasswd)) {
    // ��� ��������� ����������� ��� dklab.
    $dsn = "mysql://$dbuser:$dbpasswd@localhost/$dbname";
} else {
    // � ��� - ��� ���. �� �� �� dklab...
    $dsn = "mysql://�����:������@����/����";
} 

// ������������ � ��.
$DATABASE = DbSimple_DSN::connect($dsn);

// ������������� ���������� ������.
$DATABASE->set_error_handler('databaseErrorHandler');

// �������� ����� ����������.
$DB = $DATABASE->transaction();

// ��� ����������� ������ SQL.
function databaseErrorHandler($message, $info)
{
	// ���� �������������� @, ������ �� ������.
	if (!error_reporting()) return;
	// ������� ��������� ���������� �� ������.
	echo "SQL Error: $message<br><pre>"; 
	print_r($info);
	echo "</pre>";
	exit();
}
?>
