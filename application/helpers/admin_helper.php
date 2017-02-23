<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    
    if(!function_exists('SimpleValidation')){
        function SimpleValidation($IdValue,$Msg){        
             $string = "
                var {$IdValue} = $(\"#{$IdValue}\").val();
                if(!/^[A-Za-z0-9 ]+$/.test({$IdValue})){
                    alert('{$Msg}');
                    $(\"#{$IdValue}\").focus();
                    return false;
                }
             ";
             return $string;
        }
    }
    
    if(!function_exists('SelectBoxValidation')){
        function TextareaValidation($IdValue,$Msg){        
             $string = "
                var {$IdValue} = $(\"#{$IdValue}\").val();
                if(!{$IdValue}){
                    alert('{$Msg}');
                    $(\"#{$IdValue}\").focus();
                    return false;
                }
             ";
             return $string;
        }
    }
    
    if(!function_exists('SelectBoxValidation')){
        function NonRequiredValidation($IdValue){        
             $string = "
                var {$IdValue} = $(\"#{$IdValue}\").val();
                
             ";
             return $string;
        }
    }
    
    function mssql_escape($str)
    {
        if(get_magic_quotes_gpc())
        {
            $str= stripslashes(nl2br($str));
        }
        return str_replace("'", "''", $str);
    }
     