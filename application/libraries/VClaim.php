<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VClaim
{
	// Hardjo
	// public static $ppkPelayanan = '1205R002';
	// public static $namaPpkPelayanan = 'RSPAU dr. HARDJOLUKITO Kab. Bantul';

	// Esnawan
	public static $ppkPelayanan = '0903R005';
	public static $namaPpkPelayanan = 'RSUD RAJA AHMAD TABIB Kepulauan Riau';	

	/**
	 * Pencarian data diagnosa ICD-10
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @param  string $diagnosa Kode atau nama diagnosa
	 * @return object
	 */
	public static function get_diagnosa($diagnosa)
	{
		$url = config('vclaim.url').'referensi/diagnosa/'.urlencode($diagnosa);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data poli
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @param  string $poli Kode atau nama poli
	 * @return object
	 */
	public static function get_poli($poli)
	{
		$url = config('vclaim.url').'referensi/poli/'.urlencode($poli);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data fasilitas kesehatan
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @param string $jenis Jenis faskes (1. Faskes 1, 2. Faskes 2/RS)
	 * @param string $nama Nama atau kode faskes
	 * @return object
	 */
	public static function get_faskes($jenis, $nama)
	{
		$url = 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/referensi/faskes/'.urlencode($nama).'/'.urlencode($jenis);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data dokter DPJP
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @param  string $pelayanan Jenis pelayanan (1. Rawat inap, 2. Rawat jalan)
	 * @param  string $tanggal Tanggal pelayanan (format: yyyy-mm-dd)
	 * @param  string $spesialis Kode spesialis / subspesialis
	 * @return object
	 */
	public static function get_dokter_dpjp($pelayanan, $tanggal, $spesialis)
	{
		$url  = config('vclaim.url').'referensi/dokter/pelayanan/'.urlencode($pelayanan);
		$url .= '/tglPelayanan/'.urlencode($tanggal).'/Spesialis/'.urlencode($spesialis);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data propinsi
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @return object
	 */
	public static function get_propinsi()
	{
		$url = config('vclaim.url').'referensi/propinsi';
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data kabupaten
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @param  string $kode_propinsi Kode propinsi
	 * @return object
	 */
	public static function get_kabupaten($kode_propinsi)
	{
		$url = config('vclaim.url').'referensi/kabupaten/propinsi/'.urlencode($kode_propinsi);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data kecamatan
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @param  string $kode_kabupaten
	 * @return object
	 */
	public static function get_kecamatan($kode_kabupaten)
	{
		$url = config('vclaim.url').'referensi/kecamatan/kabupaten/'.urlencode($kode_kabupaten);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data procedure/tindakan ICD-9 CM (Hanya untuk Lembar Pengajuan Klaim)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @param  string $procedure Nama atau kode procedure
	 * @return [type]
	 */
	public static function get_tindakan($procedure)
	{
		$url = config('vclaim.url').'referensi/procedure/'.urlencode($procedure);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data kelas rawat (Hanya untuk Lembar Pengajuan Klaim)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @return object
	 */
	public static function get_kelas_rawat()
	{
		$url = config('vclaim.url').'referensi/kelasrawat';
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data dokter DPJP (Hanya untuk Lembar Pengajuan Klaim)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @param  string $dokter Nama dokter/DPJP
	 * @return object
	 */
	public static function get_dokter($dokter)
	{
		$url = config('vclaim.url').'referensi/dokter/'.urlencode($dokter);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data spesialistik (Hanya untuk Lembar Pengajuan Klaim)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @return object
	 */
	public static function get_spesialistik()
	{
		$url = config('vclaim.url').'referensi/spesialistik';
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data ruang rawat (Hanya untuk Lembar Pengajuan Klaim)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @return object
	 */
	public static function get_ruang_rawat()
	{
		$url = config('vclaim.url').'referensi/ruangrawat';
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data cara keluar (Hanya untuk Lembar Pengajuan Klaim)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @return object
	 */
	public static function get_cara_keluar()
	{
		$url = config('vclaim.url').'referensi/carakeluar';
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data pasca pulang (Hanya untuk Lembar Pengajuan Klaim)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Referensi
	 * @return object
	 */
	public static function get_pasca_pulang()
	{
		$url = config('vclaim.url').'referensi/pascapulang';
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data peserta BPJS Kesehatan berdasarkan Nomor Kartu BPJS
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Peserta
	 * @param  string $no_kartu Nomor Kartu BPJS
	 * @param  string $tanggal_sep Tanggal pelayanan/SEP (format: yyyy-mm-dd)
	 * @return object
	 */
	public static function get_peserta_bpjs($no_kartu)
	{
		$date = date('Y-m-d');
		$url = 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Peserta/nokartu/'.urlencode($no_kartu).'/tglSEP/'.urlencode($date);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data peserta BPJS Kesehatan berdasarkan NIK
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Peserta
	 * @param  string $nik Nomor Induk Kependudukan (NIK)
	 * @param  string $tanggal_sep Tanggal pelayanan/SEP (format: yyyy-mm-dd)
	 * @return object
	 */
	public static function get_peserta_nik($nik, $tanggal_sep)
	{
		$url = 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Peserta/nik/'.urlencode($nik).'/tglSEP/'.urlencode($tanggal_sep);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Insert SEP Versi 1.1
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/SEP
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function insert_sep($data)
	{
		$url = 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/SEP/1.1/insert';
		$response = self::send_curl($url, 'POST', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Update SEP Versi 1.1
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/SEP
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function update_sep($data)
	{
		$url = config('vclaim.url').'SEP/1.1/Update';
		$response = self::send_curl($url, 'PUT', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Hapus data SEP
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/SEP
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function delete_sep($data)
	{
		$url = config('vclaim.url').'SEP/Delete';
		$response = self::send_curl($url, 'DELETE', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Melihat data detail peserta
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/SEP
	 * @param  string $no_sep Nomor SEP
	 * @return object
	 */
	public static function get_sep($no_sep)
	{
		$url = 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/SEP/'.urlencode($no_sep);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data potensi SEP sebagai Suplesi Jasa Raharja
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/SEP
	 * @param  string $no_kartu
	 * @param  string $tanggal Tanggal pelayanan / SEP (format: yyyy-mm-dd)
	 * @return object
	 */
	public static function get_suplesi_jasa_raharja($no_kartu, $tanggal)
	{
		$url = config('vclaim.url').'sep/JasaRaharja/Suplesi/'.urlencode($no_kartu).'/tglPelayanan/'.urlencode($tanggal);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pengajuan SEP
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/SEP
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function pengajuan_sep($data)
	{
		$url = config('vclaim.url').'Sep/pengajuanSEP';
		$response = self::send_curl($url, 'POST', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Approval pengajuan SEP
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/SEP
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function approval_sep($data)
	{
		$url = config('vclaim.url').'Sep/aprovalSEP';
		$response = self::send_curl($url, 'POST', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Update tanggal pulang SEP
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/SEP
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function update_tanggal_pulang($data)
	{
		$url = config('vclaim.url').'Sep/updtglplg';
		$response = self::send_curl($url, 'PUT', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian No. SEP untuk aplikasi INA-CBG 4.1
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/SEP
	 * @param  string $no_sep Nomor SEP
	 * @return [type]
	 */
	public static function integrasi_inacbg($no_sep)
	{
		$url = config('vclaim.url').'sep/cbg/'.urlencode($no_sep);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data rujukan dari PCare maupun Rumah Sakit berdasarkan nomor rujukan
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Rujukan
	 * @param  string $no_rujukan Nomor Rujukan
	 * @param  boolean $rs Apakah pencarian dari rumah sakit (true) atau PCare (false)
	 * @return object
	 */
	public static function get_rujukan_by_nomor_rujukan($no_rujukan, $rs = false)
	{
		$url = 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Rujukan/'.($rs ? 'RS/' : '').$no_rujukan;

		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data rujukan dari PCare maupun Rumah Sakit berdasarkan nomor kartu
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Rujukan
	 * @param  string $no_kartu Nomor Kartu BPJS
	 * @param  boolean $rs Apakah pencarian dari rumah sakit (true) atau PCare (false)
	 * @return object
	 */
	public static function get_rujukan_by_nomor_kartu($no_kartu, $rs = false)
	{
		$url = 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Rujukan/'.($rs ? 'RS/' : '').'Peserta/'.$no_kartu;

		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data rujukan dari PCare maupun Rumah Sakit berdasarkan nomor kartu
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Rujukan
	 * @param  string $no_kartu Nomor Kartu BPJS
	 * @param  boolean $rs Apakah pencarian dari rumah sakit (true) atau PCare (false)
	 * @return object
	 */
	public static function get_rujukan_by_nomor_kartu_list($no_kartu, $rs = false)
	{
		$url = 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Rujukan/'.($rs ? 'RS/' : '').'List/Peserta/'.$no_kartu;

		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Membuat rujukan baru
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Rujukan
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function insert_rujukan($data)
	{
		$url = config('vclaim.url').'Rujukan/insert';

		$response = self::send_curl($url, 'POST', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Update data rujukan
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Rujukan
	 * @param  object $data Parameter yang akan dikirim
	 * @return [type]
	 */
	public static function update_rujukan($data)
	{
		$url = config('vclaim.url').'Rujukan/update';

		$response = self::send_curl($url, 'PUT', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Hapus data rujukan
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Rujukan
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function delete_rujukan($data)
	{
		$url = config('vclaim.url').'Rujukan/delete';

		$response = self::send_curl($url, 'DELETE', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Membuat Lembar Pengajuan Klaim (LPK)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/LembarPK
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function insert_lpk($data)
	{
		$url = config('vclaim.url').'LPK/insert';

		$response = self::send_curl($url, 'POST', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Update data Lembar Pengajuan Klaim (LPK)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/LembarPK
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function update_lpk($data)
	{
		$url = config('vclaim.url').'LPK/update';

		$response = self::send_curl($url, 'PUT', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Hapus data Lembar Pengajuan Klaim (LPK)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/LembarPK
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function delete_lpk($data)
	{
		$url = config('vclaim.url').'LPK/delete';

		$response = self::send_curl($url, 'DELETE', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Pencarian data peserta berdasarkan Nomor Induk Kependudukan (NIK)
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/LembarPK
	 * @param  string $tanggal_masuk Tanggal masuk (format: yyyy-mm-dd)
	 * @param  string $pelayanan Jenis pelayanan (1. Rawat inap, 2. Rawat jalan)
	 * @return object
	 */
	public static function get_lpk($tanggal_masuk, $pelayanan)
	{
		$url = config('vclaim.url').'LPK/TglMasuk/'.urlencode($tanggal_masuk).'/JnsPelayanan/'.urlencode($pelayanan);

		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Monitoring data kunjungan
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Monitoring
	 * @param  string $tanggal Tanggal SEP (format: yyyy-mm-dd)
	 * @param  string $pelayanan Jenis pelayanan (1. Rawat inap, 2. Rawat jalan)
	 * @return object
	 */
	public static function monitoring_kunjungan($tanggal, $pelayanan)
	{
		$url = config('vclaim.url').'Monitoring/Kunjungan/Tanggal/'.urlencode($tanggal).'/JnsPelayanan/'.urlencode($pelayanan);

		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Monitoring data klaim
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Monitoring
	 * @param  string $tanggal Tanggal SEP (format: yyyy-mm-dd)
	 * @param  string $pelayanan Jenis pelayanan (1. Rawat inap, 2. Rawat jalan)
	 * @param  string $status Status klaim (1. Proses verifikasi, 2. Pending verifikasi, 3. Klaim)
	 * @return object
	 */
	public static function monitoring_klaim($tanggal, $pelayanan, $status)
	{
		$url  = config('vclaim.url').'Monitoring/Klaim/Tanggal/'.urlencode($tanggal);
		$url .= '/JnsPelayanan/'.urlencode($pelayanan).'/Status/'.urlencode($status);

		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Histori pelayanan peserta
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Monitoring
	 * @param  string $no_kartu Nomor kartu BPJS
	 * @param  string $tanggal_mulai Tanggal mulai pencarian (format: yyyy-mm-dd)
	 * @param  string $tanggal_mulai Tanggal akhir pencarian (format: yyyy-mm-dd)
	 * @return object
	 */
	public static function histori_pelayanan_peserta($no_kartu, $tanggal_mulai, $tanggal_akhir)
	{
		$url  = 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/monitoring/HistoriPelayanan/NoKartu/'.urlencode($no_kartu);
		$url .= '/tglAwal/'.urlencode($tanggal_mulai).'/tglAkhir/'.urlencode($tanggal_akhir);
		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Monitoring data klaim Jasa Raharja
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Monitoring
	 * @param  string $tanggal_mulai Tanggal mulai pencarian (format: yyyy-mm-dd)
	 * @param  string $tanggal_mulai Tanggal akhir pencarian (format: yyyy-mm-dd)
	 * @return object
	 */
	public static function data_klaim_jasa_raharja($tanggal_mulai, $tanggal_akhir)
	{
		$url  = config('vclaim.url').'monitoring/JasaRaharja/tglMulai/'.urlencode($tanggal_mulai);
		$url .= '/tglAkhir/'.urlencode($tanggal_akhir);

		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Referensi kamar
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Kamar
	 * @return object
	 */
	public static function referensi_kamar()
	{
		$url  = config('vclaim.url').'aplicaresws/rest/ref/kelas';

		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Update ketersediaan tempat tidur
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Kamar
	 * @param  string $kode_ppk Kode PPK pelayanan
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function update_ketersediaan_tempat_tidur($kode_ppk, $data)
	{
		$url  = config('vclaim.url').'aplicaresws/rest/bed/update/'.urlencode($kode_ppk);

		$response = self::send_curl($url, 'POST', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Buat ruangan baru
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Kamar
	 * @param  string $kode_ppk Kode Faskes
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function insert_ruangan($kode_ppk, $data)
	{
		$url  = config('vclaim.url').'aplicaresws/rest/bed/create/'.urlencode($kode_ppk);

		$response = self::send_curl($url, 'POST', $data);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Melihat ketersediaan Kamar RS
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Kamar
	 * @param  string $kode_ppk Kode Faskes
	 * @param  integer $start Untuk paging, baris awal yang akan diambil
	 * @param  integer $limit Untuk paging, berapa baris yang akan diambil
	 * @return object
	 */
	public static function get_ketersediaan_kamar($kode_ppk, $start, $limit)
	{
		$url  = config('vclaim.url').'aplicaresws/rest/bed/read/'.urlencode($kode_ppk);
		$url .= '/'.urlencode($start).'/'.urlencode($limit);
		// dd($url);

		$response = self::send_curl($url);
		return $response ? json_decode($response) : null;
	}

	/**
	 * Hapus data ruangan
	 * Ref: https://new-api.bpjs-kesehatan.go.id/VClaim-Katalog/Kamar
	 * @param  string $kode_ppk Kode Faskes
	 * @param  object $data Parameter yang akan dikirim
	 * @return object
	 */
	public static function delete_ruangan($kode_ppk, $data)
	{
		$url  = config('vclaim.url').'aplicaresws/rest/bed/delete/'.urlencode($kode_ppk);
		$url .= '/'.urlencode($start).'/'.urlencode($limit);

		$response = self::send_curl($url, 'POST', $data);
		return $response ? json_decode($response) : null;
	}

	private static function create_curl_header() {
		// ESNAWAN
		$cons_id = '30982';
		$secret_key = '0vQ160D794';
		// HARDJO
		// $cons_id = '15486';
		// $secret_key = 'jppGgH22Eg2fJTg';

		date_default_timezone_set('UTC');
		$timestamp = time();
		$encodedSignature = base64_encode(hash_hmac('sha256', $cons_id.'&'.$timestamp, $secret_key, TRUE));

		$headers = [
			'X-cons-id: '.$cons_id,
			'X-timestamp: '.$timestamp,
			'X-signature: '.$encodedSignature,
		];

		return $headers;
	}

	private static function send_curl($url, $method = 'GET', $data = NULL) {

		$headers = self::create_curl_header();
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		if($method != 'GET')
		{
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			$headers[] =  'Content-Type: Application/x-www-form-urlencoded';
		}
		else
		{
			$headers[] =  'Content-Type: application/json; charset=UTF-8';
		}
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$data = curl_exec($ch);
		curl_close($ch);

		return $data;
	}
}