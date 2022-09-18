<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	// public function index()
	// {
	// 	$this->load->view('components/travel');
	// }

	public function travel()
	{
		$curl = curl_init(); //Initializes curl
        curl_setopt($curl, CURLOPT_URL, 'http://localhost:1337/api/travelpackages');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]); // Sets header information for authenticated requests

        $res = curl_exec($curl);	
		$data = array(
			'isi' 		=> 'components/travel/index',
			'title'		=> 'Halaman Travel Package',
			'label'		=> 'Travel Package',
			'content'	=>  $res
			);
		curl_close($curl);
		$this->load->view('layout/wrapper',$data); 		
	}

	public function customer()
	{
		$curl = curl_init(); //Initializes curl
        curl_setopt($curl, CURLOPT_URL, 'http://localhost:1337/api/customers');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]); // Sets header information for authenticated requests

        $res = curl_exec($curl);	
		$data = array(
			'isi' 		=> 'components/customer/index',
			'title'		=> 'Halaman Customer',
			'label'		=> 'Customer',
			'content'	=>  $res
			);
		curl_close($curl);
		$this->load->view('layout/wrapper',$data); 		
	}

	public function order()
	{
		$curl = curl_init(); //Initializes curl
        curl_setopt($curl, CURLOPT_URL, 'http://localhost:1337/api/orders');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]); // Sets header information for authenticated requests

        $res = curl_exec($curl);	
		$data = array(
			'isi' 		=> 'components/order/index',
			'title'		=> 'Halaman Order',
			'label'		=> 'Orders',
			'content'	=>  $res
			);
		curl_close($curl);
		$this->load->view('layout/wrapper',$data); 		
	}



	
}
