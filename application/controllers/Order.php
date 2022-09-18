<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {


public function index()
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
        'label'		=> 'Order',
        'content'	=>  $res
        );
    curl_close($curl);
    $this->load->view('layout/wrapper',$data); 		
}

public function form()
{
    $travels = $this->GetListTravel();
    $trav = json_decode($travels, true);
    $ex_travel = $trav["data"];

    $customers = $this->GetListCustomer();
    $cust = json_decode($customers, true);
    $ex_customer = $cust["data"];

    $data = array(
        'isi' 		    => 'components/order/form',
        'title'		    => 'Page Add Order',
        'label'		    => 'Customer',
        'listTravel'    => $ex_travel,
        'listCustomer'  => $ex_customer,
        
        );
    $this->load->view('layout/wrapper',$data); 		
    
}

function GetListTravel()
{
    $curl = curl_init(); //Initializes curl
    curl_setopt($curl, CURLOPT_URL, 'http://localhost:1337/api/travelpackages');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]); // Sets header information for authenticated requests
    $res = curl_exec($curl);
    curl_close($curl);
    return $res;
}

function GetListCustomer()
{
    $curl = curl_init(); //Initializes curl
    curl_setopt($curl, CURLOPT_URL, 'http://localhost:1337/api/customers');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]); // Sets header information for authenticated requests
    $res = curl_exec($curl);
    curl_close($curl);
    return $res;
    
}

function GetTravelPriceById($id)
{
    $output = 0;
    $url = "http://localhost:1337/api/travelpackages/$id";
    $curl = curl_init(); 
    //Initializes curl
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]); // Sets header information for authenticated requests
    $res = curl_exec($curl);
    
    $trav = json_decode($res, true);
    $ex_travel = $trav["data"];
    curl_close($curl);
    return $ex_travel["attributes"]["Price"];
    
    
}

function GetLatestInvoiceId()
{
    $total;
    $y=1;
    $url = "http://localhost:1337/api/orders";
    $curl = curl_init(); 
    //Initializes curl
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]); // Sets header information for authenticated requests
    $res = curl_exec($curl);
    curl_close($curl);
    $trav = json_decode($res, true);
    $ex_travel = $trav["meta"];
    $total = $ex_travel["pagination"]["total"];
    if($total == 0){
        $total = 1;
    }
    return $total+=$y;    
}

public function add()
{
    $i =0;
    $amount      = $this->input->post('amountOrder');
    $idTravel    = $this->input->post('idTravel');
    $idCustomer  = $this->input->post('idCustomer');
    $priceTravel = $this->GetTravelPriceById($idTravel);
    $totalPrice  = $amount * $priceTravel;
    $latestInv   = "INV"." - ".$this->GetLatestInvoiceId();
    
    $dataOrder = array(
        'data' => [
            'InvoiceNumber'     => $latestInv,
            'TravelPackageId'   => $idTravel,
            'Price'			    => $priceTravel,
            'Amount'			=> $amount
            
        ]
    );
    
    $dataInvoice = array(
        'data' => [
            'InvoiceNumber'			=> $latestInv,
            'CustomerId'			=> $idCustomer,
            'TotalPrice'			=> $totalPrice
            
        ]
    );

      
   

    //    // Initializes a new cURL session
      $curl = curl_init();

      curl_setopt($curl, CURLOPT_URL, 'http://localhost:1337/api/order-details');

      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      // Set the CURLOPT_POST for POST request
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dataOrder));

      curl_setopt($curl, CURLOPT_HTTPHEADER, [
          'Content-Type: application/json'
      ]);
      $res = curl_exec($curl);
      curl_close($curl);
            //  redirect('Order');
    //////////////////////////////////////////////////////////////////////////////
      $curl = curl_init();

      curl_setopt($curl, CURLOPT_URL, 'http://localhost:1337/api/orders');

      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      // Set the CURLOPT_POST for POST request
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dataInvoice));

      curl_setopt($curl, CURLOPT_HTTPHEADER, [
          'Content-Type: application/json'
      ]);
      $res = curl_exec($curl);
      curl_close($curl);

      redirect('Order');
           
    
}

function getInvoiceNumberFromOrderDetail($id)
{
    $url = "http://localhost:1337/api/orders/$id";
    $curl = curl_init(); 
    //Initializes curl
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]); // Sets header information for authenticated requests
    $res = curl_exec($curl);
    $trav = json_decode($res, true);
    $dataInvoice = $trav["data"];
    curl_close($curl);
    return $dataInvoice["attributes"]["InvoiceNumber"];
}

public function delete($id)
{
        $invoiceNumber = $this->getInvoiceNumberFromOrderDetail($id);
        $url ="http://localhost:1337/api/order-details/$invoiceNumber";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($curl, CURLOPT_HTTPHEADER, [
		 'Content-Type: application/json'
		 ]);
			 
		 $res = curl_exec($curl);
		 curl_close($curl);

        
}


}
?>