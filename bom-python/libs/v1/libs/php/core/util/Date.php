<?php 

class Date {    
    private $shortDateFormat = "F j, Y"; 
    private $longDateFormat = "F j, Y, g:i a"; 
    private $timestamp = 0; 
    
 
    function __construct($timestamp = 0) { 
        $this->timestamp = $timestamp; 
    } 
    
    public function getTime() { 
        return (int) $this->timestamp; 
    } 
    
    public function long() { 
        if ( $this->timestamp > 0 ) 
        { 
            return date ( $this->longDateFormat , $this->timestamp ); 
        } 
        else 
        { 
            return ""; 
        } 
    }
 
    public function short() { 
        if ( $this->timestamp > 0 ) 
        { 
            return date ( $this->shortDateFormat , $this->timestamp ); 
        } 
        else 
        { 
            return ""; 
        } 
    } 
    
    public function __toString() { 
        return $this->timestamp; 
    } 
    
} 
?>