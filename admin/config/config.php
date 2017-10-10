<?php
	$konek = new mysqli('localhost', 'root', '', 'kesehatan_pegawai_test');
	
	$url_master = "http://localhost/Skripsi_PLN_KMeansPlusPlus/";
	$url_login = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/login/";
	$url_pages = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages";
	
	
	$url_dashboard = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=dashboard";
	
	
	$url_user = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=user";
	$url_masukkan_user = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=user&&submenu=masukkan_user";
	$url_tampilkan_user = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=user&&submenu=tampilkan_user";
	$url_ubah_user = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=user&&submenu=ubah_user";
	$url_ubah_user_querystring = "?menu=user&&submenu=ubah_user";
	$url_ubah_user_form = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=user&&submenu=ubah_user_form";
	$url_hapus_user = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=user&&submenu=hapus_user";
	$url_hapus_user_proses = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/hapus_user_proses.php";
	
	
	$url_tindakan_preventif = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=tindakan_preventif&&submenu=masukkan_tindakan_preventif";
	$url_masukkan_tindakan_preventif = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=tindakan_preventif&&submenu=masukkan_tindakan_preventif";
	$url_tampilkan_tindakan_preventif = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=tindakan_preventif&&submenu=tampilkan_tindakan_preventif";
	$url_tampilkan_tindakan_preventif_detail = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=tindakan_preventif&&submenu=tampilkan_tindakan_preventif_detail";
	$url_ubah_tindakan_preventif = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=tindakan_preventif&&submenu=ubah_tindakan_preventif";
	$url_ubah_tindakan_preventif_detail = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=tindakan_preventif&&submenu=ubah_tindakan_preventif_detail";
	$url_hapus_tindakan_preventif = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=tindakan_preventif&&submenu=hapus_tindakan_preventif";
	$url_hapus_tindakan_preventif_proses = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/hapus_tindakan_preventif_proses.php";
	
	
	$url_bobot_atribut = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=bobot_atribut";
	$url_pemberian_bobot_atribut = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=bobot_atribut&&submenu=pemberian_bobot_atribut";
	$url_tampilkan_bobot_atribut = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=bobot_atribut&&submenu=tampilkan_bobot_atribut";
	$url_tampilkan_bobot_atribut_bermasalah = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=bobot_atribut&&submenu=tampilkan_bobotatributbermasalah";
	$url_form_bobot_atribut_bermasalah = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=bobot_atribut&&submenu=form_bobotatributbermasalah";
	$url_tampilkan_bobot_atribut_detail = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=bobot_atribut&&submenu=tampilkan_bobot_atribut_detail";
	$url_hapus_bobot_atribut = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=bobot_atribut&&submenu=hapus_bobot_atribut";
	$url_hapus_bobot_atribut_proses = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/hapus_bobot_atribut_proses.php";
	
	
	$url_data_kesehatan = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=data_kesehatan";
	$url_masukkan_data_kesehatan = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=data_kesehatan&&submenu=masukkan_data_kesehatan";
	$url_masukkan_data_kesehatan_utk_nilai_bobot_proses = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=data_kesehatan&&submenu=masukkan_data_kesehatan_proses";
	$url_cek_nilai_kolom = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=data_kesehatan&&submenu=cek_nilai_kolom";
	$url_tampilkan_data_kesehatan = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=data_kesehatan&&submenu=tampilkan_data_kesehatan";
	$url_tampilkan_data_kesehatan_detail = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=data_kesehatan&&submenu=tampilkan_data_kesehatan_detail";
	$url_hapus_data_kesehatan = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=data_kesehatan&&submenu=hapus_data_kesehatan";
	$url_hapus_data_kesehatan_proses = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/hapus_data_kesehatan_proses.php";
	
	
	$url_konversi_data_kesehatan = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=konversi_data_kesehatan";
	$url_tampilkan_konversi_data_kesehatan = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=konversi_data_kesehatan&&submenu=tampilkan_konversi_data_kesehatan";
	$url_tampilkan_konversi_data_kesehatan_detail  = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=konversi_data_kesehatan&&submenu=tampilkan_konversi_data_kesehatan_detail";
	
	
	$url_gold_standard = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=gold_standard";
	$url_cek_gold_standard = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=gold_standard&&submenu=cek_gold_standard";
	$url_cek_gold_standard_proses = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=gold_standard&&submenu=cek_gold_standard_proses";
	$url_tampilkan_gold_standard = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=gold_standard&&submenu=tampilkan_gold_standard";
	$url_tampilkan_gold_standard_detail = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=gold_standard&&submenu=tampilkan_gold_standard_detail";
	$url_hapus_gold_standard = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=gold_standard&&submenu=hapus_gold_standard";
	$url_hapus_gold_standard_proses = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/hapus_gold_standard_proses.php";
	
	
	$url_solusi = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=solusi";
	$url_tampilkan_solusi_yang_diberikan = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=solusi&&submenu=tampilkan_solusi_yang_diberikan";
	$url_tampilkan_solusi_yang_diberikan_detail = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=solusi&&submenu=tampilkan_solusi_yang_diberikan_detail";
	
	
	
	$url_clustering = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=clustering";
	$url_hitung_data_kesehatan_proses = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=clustering&&submenu=hitung_data_kesehatan_proses";
	$url_tampilkan_hasil_clustering_pegawai = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=clustering&&submenu=tampilkan_hasil_clustering_pegawai";
	$url_tampilkan_hasil_clustering_pegawai_detail = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=clustering&&submenu=tampilkan_hasil_clustering_pegawai_detail";
	$url_ubah_data_kesehatan = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=clustering&&submenu=ubah_data_kesehatan";
	$url_ubah_data_kesehatan_detail = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=clustering&&submenu=ubah_data_kesehatan_detail";
	$url_ubah_data_kesehatan_detail_form = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=clustering&&submenu=ubah_data_kesehatan_detail_form";
	$url_clustering_pegawai = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=clustering&&submenu=hitung_data_kesehatan";
	$url_clustering_pegawai_proses = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=clustering&&submenu=hitung_data_kesehatan_proses";
	$url_hapus_hasil_clustering_pegawai = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=clustering&&submenu=hapus_hasil_clustering_pegawai";
	$url_hapus_hasil_clustering_pegawai_proses = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/hapus_hasil_clustering_pegawai_proses.php";
	
	$url_tables = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=tables";
	$url_forms = "http://localhost/Skripsi_PLN_KMeansPlusPlus/admin/pages/?menu=forms";
	
?>