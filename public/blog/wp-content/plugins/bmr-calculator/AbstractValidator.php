<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractValidator
 *
 * @author ilinca
 */
class AbstractValidator {

    /**
     * 
     * @param string $string
     */
   
   public function validateAge($string) {
    if (preg_match("/^[0-9]+$/", $string) || (!empty($string)) ) {
        return true;  
    }
    return false;
}
public function validateWeight($string) {
    if (preg_match("/^[0-9]+$/", $string)) {
        return true;  
    }
    return false;
}
public function validateHeight($string) {
    if (preg_match("/^[0-9]+$/", $string)) {
        return true;  
    }
    return false;
}

  public function validateGender($string) {
    if (!empty($string)) {
        return true;  
    }
    return false;
}
 public function validateActivity($string) {
    if (!empty($string)) {
        return true;  
    }
    return false;
}
 public function validateExercise($string) {
    if (!empty($string)) {
        return true;  
    }
    return false;
}

}
