<?php

function isAdminUri(){
    if(str_starts_with($_SERVER['REQUEST_URI'], '/admin'))
        return true;
    return false;
}
function isMemberUri(){
    if(str_starts_with($_SERVER['REQUEST_URI'], '/member'))
        return true;
    return false;
}

if(isAdminUri())
    require "admin/index.php";
elseif(isMemberUri())
    require "member/index.php";
else    
    require "home/index.php";
   