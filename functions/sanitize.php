<?php
 /**
 * escape funcion - convert double quotes and use character set - West Europe.
 */ 
function escape($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
