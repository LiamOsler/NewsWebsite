<?php
function hello(){
    echo("hello");
}

function sanitizeData ($data){
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}
?>