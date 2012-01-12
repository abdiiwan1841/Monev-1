<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// pengecekan sudah login apa belum
function is_adminlogin()
{
    $ci = & get_instance();
    if (!$ci->session->userdata('admin_ID') && !$ci->session->userdata('admin_username')
            && !$ci->session->userdata('user_jabid') && $ci->uri->segment(2) != 'login') :
        redirect('backend/login');
    elseif ($ci->session->userdata('user_id') && $ci->session->userdata('user_nama')
            && $ci->session->userdata('user_jabid') && $ci->uri->segment(2) == 'login') :
		redirect('backend');
    endif;
}
	
// pengecekan sudah login apa belum
function is_login($redirect=TRUE)
{
    $ci = & get_instance();
    if (!$ci->session->userdata('username') && !$ci->session->userdata('nama')
            && !$ci->session->userdata('jabatan') && $ci->uri->segment(2) != 'login') :
		if(!$redirect):
			return FALSE;
		else:
			redirect('login');
		endif;
    elseif ($ci->session->userdata('username') && $ci->session->userdata('nama')
            && $ci->session->userdata('jabatan') && $ci->uri->segment(2) == 'login') :
		redirect('dashboard');
    endif;
}

// untuk sanitize string
function sanitize_string($str)
{
	$str = strip_tags($str);
    $str = htmlentities($str, ENT_QUOTES);
    return $str;
}

// untuk ambil data penyerapan dari tb_penyerapan_anggaran
function get_penyerapan($thang="2011",$kddept=null,$kdunit=null,$kdprogram=null)
{
	$ci = & get_instance();
	$ci->load->database();
	$sql = 'select round(avg(p),2) as p
	from tb_penyerapan_anggaran
	where thang='.$thang.' ';
	
	if(isset($kddept)):
		$sql .= 'and kddept='.$kddept.' ';
	endif;
	if(isset($kdunit)):
		$sql .= 'and kdunit='.$kdunit.' ';
	endif;
	if(isset($kdprogram)):
		$sql .= 'and kdprogram='.$kdprogram.' ';
	endif;
	return $ci->db->query($sql)->row();
}

// untuk ambil data konsistensi dari tb_konsistensi
function get_konsistensi($thang="2011",$kddept=null,$kdunit=null,$kdprogram=null)
{
	$ci = & get_instance();
	$ci->load->database();
	
	$sql = 'select round(avg(k),2) as k
	from tb_konsistensi
	where thang='.$thang.' ';
	
	if(isset($kddept)):
		$sql .= 'and kddept='.$kddept.' ';
	endif;
	if(isset($kdunit)):
		$sql .= 'and kdunit='.$kdunit.' ';
	endif;
	if(isset($kdprogram)):
		$sql .= 'and kdprogram='.$kdprogram.' ';
	endif;
	return $ci->db->query($sql)->row();
}

// untuk ambil data keluaran dari tb_keluaran
function get_keluaran($thang="2011",$kddept=null,$kdunit=null,$kdprogram=null)
{
	$ci = & get_instance();
	$ci->load->database();
	$sql = 'select round(avg(pk),2) as pk
	from tb_keluaran
	where thang='.$thang.' ';
	
	if(isset($kddept)):
		$sql .= 'and kddept='.$kddept.' ';
	endif;
	if(isset($kdunit)):
		$sql .= 'and kdunit='.$kdunit.' ';
	endif;
	if(isset($kdprogram)):
		$sql .= 'and kdprogram='.$kdprogram.' ';
	endif;
	return $ci->db->query($sql)->row();
}

// untuk ambil data efisiensi dari tb_efisiensi
function get_efisiensi($thang="2011",$kddept=null,$kdunit=null,$kdprogram=null)
{
	$ci = & get_instance();
	$ci->load->database();
	$sql = 'select round(avg(e),2) as e
	from tb_efisiensi
	where thang='.$thang.' ';
	
	if(isset($kddept)):
		$sql .= 'and kddept='.$kddept.' ';
	endif;
	if(isset($kdunit)):
		$sql .= 'and kdunit='.$kdunit.' ';
	endif;
	if(isset($kdprogram)):
		$sql .= 'and kdprogram='.$kdprogram.' ';
	endif;
	return $ci->db->query($sql)->row();
}