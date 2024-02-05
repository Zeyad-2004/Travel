<?php 

$error = '';
$success = '';

function requiredInput($value)
{
    $str = trim($value);
    if(strlen($str) > 0)
    {
        return true;
    }
    return false;
}


//  sanitize string inputs
function sanitizeString($value)
{
    $str = trim($value);
    $str = strtolower($str);
    $str = htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    return $str;
}



//  sanitize email inputs
function santEmail($email)
{
    $email = trim($email);
    $email = strtolower($email);
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    return $email;
}



// minimum number 

function minInput($value,$min)
{
    if(strlen($value) < $min)
    {
        return false;
    }
    return true;
}

// maximum number 
function maxInput($value,$max)
{
    if(strlen($value) > $max)
    {
        return false;
    }
    return true;
}


// validate email 
function validEmail($email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    return false;
}


?>