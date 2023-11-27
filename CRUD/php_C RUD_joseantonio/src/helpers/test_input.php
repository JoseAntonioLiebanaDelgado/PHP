<?php

function test_input($data)
{
    if ($data === null) {
        return null;
    }

    $data = trim($data); // Strip whitespace (or other characters) from the beginning and end of a string
    $data = stripslashes($data); // Un-quotes a quoted string
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}
