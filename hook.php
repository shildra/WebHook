<?php
function json_response($message = null, $code = 200)
{
    // clear the old headers
    header_remove();
    // set the actual code
    http_response_code($code);
    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
    );
    // ok, validation error, or failure
    header('Status: '.$status[$code]);
    // return the encoded json
    return json_encode(array(
        'status' => $code < 300, // success or not?
        'message' => "OK",
        'Params'=>$message
    ));
}

		$success = array();

        $success['event']=$_POST['event'];
        $success['thrivecart_account']=$_POST['thrivecart_account'];
        $success['thrivecart_secret']=$_POST['thrivecart_secret'];
        $success['base_product']=$_POST['base_product'];
        $success['order_id']=$_POST['order_id'];
        $success['currency']=$_POST['currency'];
        $success['customer_id']=$_POST['customer_id'];
        $success['customer_identifier']=$_POST['customer_identifier'];
        $success['customer']=$_POST['customer'];
        $success['order']=$_POST['order'];
        $success['purchases']=$_POST['purchases'];
        $success['purchase_map']=$_POST['purchase_map'];
        $success['purchase_map_flat']=$_POST['purchase_map_flat'];
        $success['fulfillment']=$_POST['fulfillment'];


$my_file = 'file.txt';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //open file for writing ('w','r','a')...

fwrite($handle, $success['event']);

fclose($handle);

header("Content-Disposition: attachment; filename=\"" . basename($my_file) . "\"");
header("Content-Type: application/force-download");
header("Content-Length: " . filesize($my_file));
header("Connection: close");

        echo json_response($success);


?>