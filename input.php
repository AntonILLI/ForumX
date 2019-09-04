<?php
class input {

    function post( $user ){
        if( $user == ''){
            return false;
        }

        $n = ['fuck', 'nick', 'jack'];
        foreach ($n as $bad_name){
            if( $user == $bad_name){
                return false;
            }
        }
        return true;
    }

}