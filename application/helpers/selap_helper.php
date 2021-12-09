<?php 

function cek_login_admin() 
{
	$ci = get_instance();
	$id = $ci->session->userdata('id_user');

	if( $id != 17 )  {
		redirect ('index.php/auth/blok');
	} 
}

function cek_login_penyedia() 
{

	$ci = get_instance();

	if(!$ci->session->userdata('nohp_penyedia')) {
		redirect ('index.php/auth');
	} 
}

function cek_login_user()
{
	$ci = get_instance();

	if (!$ci->session->userdata('nohp_user')) {
		redirect ('index.php/auth');
	}

}
