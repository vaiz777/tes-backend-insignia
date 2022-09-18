<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends CI_Controller {

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

	public function index()
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

    public function add()
    {
		$config['upload_path']          = './upload/travelImage/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['overwrite']            = true;
		$config['max_size']             = 1024; // 1MB

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('imageTravel')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			$uploaded_data = $this->upload->data();
			$name = $this->input->post('nameTravel');
			$descriptions = $this->input->post('descriptionTravel');
			$price = $this->input->post('priceTravel');
			$image = $this->upload->data("file_name");
			$table = array(
				'data' => [
						'id' =>  $this->input->post('idTravel'),
						'Name' 			=> $name,
						'Description'	=> $descriptions,
						'Price'			=> $price,
						'Image'			=> $image
				]
			);
			 $curl = curl_init();

			 curl_setopt($curl, CURLOPT_URL, 'http://localhost:1337/api/travelpackages');
	   
			 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	   
			 // Set the CURLOPT_POST for POST request
			 curl_setopt($curl, CURLOPT_POST, true);
			 curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($table));
	   
			 curl_setopt($curl, CURLOPT_HTTPHEADER, [
				 'Content-Type: application/json'
			 ]);
			 $res = curl_exec($curl);
			 curl_close($curl);
			 redirect('Travel');
		}

    }

    public function edit()
    {
		$config['upload_path']          = './upload/travelImage/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['overwrite']            = true;
		$config['max_size']             = 1024; // 1MB

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('imageTravelE')) {
			$data['error'] = $this->upload->display_errors();
			print_r($data['error']);
		} else {
			$uploaded_data = $this->upload->data();
			$id = $this->input->post('idTravelE');
			$name = $this->input->post('nameTravelE');
			$descriptions = $this->input->post('descriptionTravelE');
			$price = $this->input->post('priceTravelE');
			$image = $this->upload->data("file_name");
			$table = array(
				'data' => [
						'Name' 			=> $name,
						'Description'	=> $descriptions,
						'Price'			=> $price,
						'Image'			=> $image
						
				]
			);
		$url ="http://localhost:1337/api/travelpackages/$id";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($table));
		curl_setopt($curl, CURLOPT_HTTPHEADER, [
			'Content-Type: application/json'
		]);
		
		$res = curl_exec($curl);
		curl_close($curl);
		redirect('Travel');
    	}
	}

    public function delete($id)
    {
		$url ="http://localhost:1337/api/travelpackages/$id";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($curl, CURLOPT_HTTPHEADER, [
		'Content-Type: application/json'
		]);
			 
		$res = curl_exec($curl);
		curl_close($curl);
		redirect('Travel');
    }
	
}
