<?php
function sanitizeData ($string){
    $sanitizedString = trim($string);
    $sanitizedString = htmlspecialchars($sanitizedString);
    $sanitizedString = stripslashes($sanitizedString);
    return $sanitizedString;
}
?>