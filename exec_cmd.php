<?php
//echo "exec_cmd.php: start";

//exec('echo "In exec_cmd.php" >> /tmp/php.log');

$results = array();

$cmd = '';
if( isset($_POST['cmd']) ) {
    $cmd = $_POST['cmd'];
}
else {
    $results['err'] = 'missing cmd';
    //exec('touch /tmp/missing_cmd');
    exit();
}

//exec('echo "Executing a command" >> /tmp/php.log');

$output = array();

//exec('pwd > D:\home\php_pwd.txt');
//exec('python --version > D:\home\python_version.txt');
exec($cmd, $output);

//echo json_encode([
//    'success' => 1,
//	'nyanko' => 123456
//]);

// Converts the array $output into a string.
// Each element of the array is separated by'\n' characters.
$single_line_string = implode('\n',$output);

echo json_encode([
    'success' => 1,
    'output' => $single_line_string
]);

?>
