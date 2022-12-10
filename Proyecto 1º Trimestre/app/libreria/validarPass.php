<?php

function validarpass($pass)
{
    $a = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}";
    if (preg_match("/$a/", $pass)) {
        return true;
    } else {
        return false;
    }
}
