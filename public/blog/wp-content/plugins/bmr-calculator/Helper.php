<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author ilinca
 */
class Helper {

    public function convertSnakeToWords(string $string): string {
        return ucwords(str_replace('_', ' ', $string));
         }

}
