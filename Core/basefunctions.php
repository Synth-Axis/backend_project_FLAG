<?php

function dd($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die;
}

function showMessage ($message){
    if( isset($message)){
        echo '<p role="alert">' .$message. '</p>';
        } 
}

function goback()
{
	header("Location: {$_SERVER['HTTP_REFERER']}");
}