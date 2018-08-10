<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function stripHTMLtags($str) {
	$t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
	$t = htmlentities($t, ENT_QUOTES, "UTF-8");
	return $t;
}
/* Location: ./application/helpers/string.php */
?>