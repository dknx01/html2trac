<?php

/**
 * Just an example page
 * @author erik
 */

/**
 * my auto loader
 * @param string $classname
 * @throws Exception
 */
function MyAutoloader($classname)
{
    $filename  = realpath(__DIR__)  . '/../classes/' . str_replace('_', '/', $classname);
    if (file_exists($filename . '.php')) {
        require_once $filename . '.php';
    } else {
        throw new Exception($filename . ' not found');
    }
}
spl_autoload_extensions(".php"); // comma-separated list
spl_autoload_register('MyAutoloader');
$input = file_get_contents('../test.html');
$html2trac = new html2trac($input)
?>
<hr>
<pre>
<?php    echo htmlentities($html2trac->transform());?>
</pre>
<hr>