<?php

echo Form::open(array('url'=>'/uploadfile','files'=>'true'));
echo "select the file to upload:  ";
echo Form::file('content');
echo "<br>";
echo "<br>";
echo Form::submit('Upload File');
echo "<br>";
echo Form::close();

?>