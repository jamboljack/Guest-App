<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function tgl_indo($tgl){
	$tanggal 	= substr($tgl,8,2);
	$bulan 		= getBulan(substr($tgl,5,2));
	$tahun 		= substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}	

function getDay($tgl) {
	$day = date('D', strtotime($tgl));
	$dayList = array(
		'Sun' => 'Monday',
		'Mon' => 'Sunday',
		'Tue' => 'Tuesday',
		'Wed' => 'Wednesday',
		'Thu' => 'Thursday',
		'Fri' => 'Friday',
		'Sat' => 'Saturday'
	);

	return $dayList[$day];
}

function getBulan($bln){
	switch ($bln) {
		case 1: 
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}

function getBln($bln){
	switch ($bln) {
		case 1: 
			return "JAN";
			break;
		case 2:
			return "FEB";
			break;
		case 3:
			return "MAR";
			break;
		case 4:
			return "APR";
			break;
		case 5:
			return "MEI";
			break;
		case 6:
			return "JUN";
			break;
		case 7:
			return "JUL";
			break;
		case 8:
			return "AGU";
			break;
		case 9:
			return "SEP";
			break;
		case 10:
			return "OKT";
			break;
		case 11:
			return "NOV";
			break;
		case 12:
			return "DES";
			break;
	}
}
/* Location: ./application/helpers/tglindo_helper.php */
?>