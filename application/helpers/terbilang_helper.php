<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
function Terbilang($x) {
    $abil = array(
            '0' => "", 
            '1' => "satu", 
            '2' => "dua",
            '3' => "tiga", 
            '4' => "empat",
            '5' => "lima",
            '6' => "enam",
            '7' => "tujuh",
            '8' => "delapan",
            '9' => "sembilan",
            '10'=> "sepuluh",
            '11'=> "sebelas");
    
    if ($x < 12) {
        return "" . $abil[$x];
    } elseif ($x < 20) {
        return Terbilang($x - 10) . " belas ";
    } elseif ($x < 100) {
        return Terbilang($x / 10) . " puluh " . Terbilang($x % 10);
    } elseif ($x < 200) {
        return " seratus " . Terbilang($x - 100);
    } elseif ($x < 1000) {
        return Terbilang($x / 100) . " ratus " . Terbilang($x % 100);
    } elseif ($x < 2000) {
        return " seribu " . Terbilang($x - 1000);
    } elseif ($x < 1000000) {
        return Terbilang($x / 1000) . " ribu " . Terbilang($x % 1000);
    } elseif ($x < 1000000000) {
        return Terbilang($x / 1000000) . " juta " . Terbilang($x % 1000000);
    }
}
?>