<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {


public function index()
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

public function add()
{
    $name    = $this->input->post('nameCustomer');
	$phone   = $this->input->post('phoneCustomer');
	$email   = $this->input->post('emailCustomer');
	$address = $this->input->post("addressCustomer");

    $table = array(
        'data' => [
                'Name' 		=> $name,
                'Phone'	    => $phone,
                'Email'		=> $email,
                'Address'   => $address
        ]
    );
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, 'http://localhost:1337/api/customers');

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

     // Set the CURLOPT_POST for POST request
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($table));

    curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
    ]);
    $res = curl_exec($curl);
    curl_close($curl);
    redirect('Customer');
}

public function edit()
{
    $name    = $this->input->post('nameCustomerE');
	$phone   = $this->input->post('phoneCustomerE');
	$email   = $this->input->post('emailCustomerE');
	$address = $this->input->post('addressCustomerE');
    $id      = $this->input->post('idCustomerE');

    $table = array(
        'data' => [
                'Name' 		=> $name,
                'Phone'	    => $phone,
                'Email'		=> $email,
                'Address'   => $address
        ]
    );
    $curl = curl_init();
    $url = "http://localhost:1337/api/customers/$id";
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($table));
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    
    $res = curl_exec($curl);
    curl_close($curl);
    redirect('Customer');
}

public function delete($id)
{
    $url ="http://localhost:1337/api/customers/$id";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
    ]);         
    $res = curl_exec($curl);
    curl_close($curl);
    redirect('Customer');
}


}