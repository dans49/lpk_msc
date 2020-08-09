<?php

/**
 *  Create By Nuzul
 */
class Lib_por
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function page($content, $data = null)
    {
        return $this->ci->load->view($content, $data);
    }

    public function portaluser($content, $data = null)
    {
        $datas = array(
            'header'  => $this->ci->load->view('_partial/header', $data, true),
            'footer'  => $this->ci->load->view('_partial/footer', $data, true),
            'content' => $this->ci->load->view($content, $data, true),
        );
        return $this->ci->load->view('_partial/page', $datas);
    }

    public function waktu_lalu($timestamp)
    {
        $selisih = time() - strtotime($timestamp);

        $detik  = $selisih;
        $menit  = round($selisih / 60);
        $jam    = round($selisih / 3600);
        $hari   = round($selisih / 86400);
        $minggu = round($selisih / 604800);
        $bulan  = round($selisih / 2419200);
        $tahun  = round($selisih / 29030400);

        if ($detik <= 60) {
            $waktu = $detik . ' detik yang lalu';
        } else if ($menit <= 60) {
            $waktu = $menit . ' menit yang lalu';
        } else if ($jam <= 24) {
            $waktu = $jam . ' jam yang lalu';
        } else if ($hari <= 7) {
            $waktu = $hari . ' hari yang lalu';
        } else if ($minggu <= 4) {
            $waktu = $minggu . ' minggu yang lalu';
        } else if ($bulan <= 12) {
            $waktu = $bulan . ' bulan yang lalu';
        } else {
            $waktu = $tahun . ' tahun yang lalu';
        }

        return $waktu;
    }

    public function TanggalIndo($date)
    {
        if ($date == null) {
            $date = date('Y-m-d');
        }
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);

        $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
        return ($result);
    }

  
}
