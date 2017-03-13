<?php

	if ( ! function_exists('get_login_status')) {
    /**
     * Retrieve login status from current user, logged in or not.
     */
    function get_login_status() {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();

        // check whether the session has the user profile in it (has authorization)
        if($CI->session->userdata("username")) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

if ( ! function_exists('check_auth')) {
    /**
     * Not logged in -> kicked out to login page.
     * Logged in -> OK
     */
    function check_auth() {
//cek_maintance();
        // check whether the session has the user profile in it (has authorization)
        if(! get_login_status()) {

            redirect("login");
        }
    }
}


function cek_bro($dt){

        echo "<pre>";
        print_r($dt);
        echo "</pre>";
}