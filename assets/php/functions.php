<?php
    function returnError($event) {
        $return = [];

        switch($event) {
            case 'ILVUSR': # No user found or invalid password
                $return['code'] = 404;
                $return['errorcode'] = "ILVUSR";
                $return['message'] = "Email or password invalid. Please try again";
                break;
            case 'IVLDDTA': # Data missing
                $return['code'] = 404;
                $return['errorcode'] = "IVLDDTA";
                $return['message'] = "Please fill all required fields before continuing.";
                break;
            case 'USRNKOWN': # Email already being used.
                $return['code'] = 404;
                $return['errorcode'] = "USRNKOWN";
                $return['message'] = "This email is already being used by an other user. Please try again.";
                break;
            case 'PASSNTSAME': # Password not the same
                $return['code'] = 404;
                $return['errorcode'] = "PASSNTSAME";
                $return['message'] = "Make sure you use the same password!";
                break;
            default:       # Unknown error found.
                $return['code'] = 404;
                $return['errorcode'] = "UKWNERR";
                $return['message'] = "An unknown error occurred. Please try again later.";
                break;
        }

        return $return;
    }

    function test() {
    }
?>