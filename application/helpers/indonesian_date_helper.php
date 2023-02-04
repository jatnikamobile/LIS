<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function id_month($month = NULL) {

	$months = [
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	];

	return $month === NULL ? $months : $months[(Int) $month];
}

function id_day($day = NULL) {

	$days = [
		'Minggu',
		'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jum\'at',
		'Sabtu'
	];

	return $day === NULL ? $days : $days[(Int) $day];
}

function id_date_format($format = 'medium', $time = NULL) {

	if($time === NULL) {
		$time = time();
	}
	elseif(is_string($time)) {
		$time = strtotime($time);
	}

	$dt = getdate($time);

	switch ($format) {
		case 'long':
			return id_day($dt['wday']).', '.$dt['mday'].' '.id_month($dt['mon']).' '.$dt['year'];
			break;

		case 'short':
			return $dt['mday'].' '.substr(id_month($dt['mon']), 0, 3).' '.$dt['year'];
			break;

		case 'medium':
			return $dt['mday'].' '.id_month($dt['mon']).' '.$dt['year'];
			break;
	}
}

function id_getdate($time = NULL) {
	$dt = getdate($time === NULL ? time() : $time);

	$dt['weekday'] = id_day($dt['wday']);
	$dt['month'] = id_month($dt['mon']);

	return $dt;
}

function change_format($date, $format) {
	return empty($date) ? NULL : date($format, strtotime($date));
}

function current_timestamp() {
	return date('Y-m-d H:i:s.v');
}

function roman_month($month) {
	return [
		1 =>
		'I',
		'II',
		'III',
		'IV',
		'V',
		'VI',
		'VII',
		'VIII',
		'IX',
		'X',
		'XI',
		'XII',
	]
	[(Int) $month];
}


