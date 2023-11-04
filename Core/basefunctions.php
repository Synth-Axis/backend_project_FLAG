<?php

function dd($var){
    var_dump($var);
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