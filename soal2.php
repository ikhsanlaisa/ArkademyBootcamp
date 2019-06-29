<?php

function valdidation($email, $no_telp, $username, $password)
{
    if (preg_match("/^[a-zA-Z]w+(.w+)*@w+(.[0-9a-zA-Z]+)*.[a-zA-Z]{2,4}$/", $_POST[$email]) === 0) {
        return false;
    }
    if (preg_match("/^d{1}-d{3}-d{3}-d{4}$/", $_POST[$no_telp]) === 0) {
        return false;
    }
    if (preg_match("/^[A-Z][a-z]+$/", $_POST[$username]) === 0) {
        return false;
    }
    if (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST[$password]) === 0) {
        return false;
    }

    echo valdidation("ikhsanlaisa96@gmail.com", "+6281395978773", "ikhsanlaisa", "ikhsanlaisa96");
}
?>