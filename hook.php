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

        $success['event']=$_POST['event'];                          $txt = "Event:=".$success['event'];
        $success['thrivecart_account']=$_POST['thrivecart_account'];$txt = $txt." thrivecart_account:=".$success['thrivecart_account'];
        $success['thrivecart_secret']=$_POST['thrivecart_secret'];  $txt = $txt." thrivecart_secret:=".$success['thrivecart_secret'];
        $success['base_product']=$_POST['base_product'];            $txt = $txt." base_product:=".$success['base_product'];
        $success['order_id']=$_POST['order_id'];                    $txt = $txt." order_id:=".$success['order_id'];
        $success['currency']=$_POST['currency'];                    $txt = $txt." currency:=".$success['currency'];
        $success['customer_id']=$_POST['customer_id'];              $txt = $txt." Event:=".$success['event'];
        $success['customer_identifier']=$_POST['customer_identifier'];$txt = $txt." customer_id:=".$success['customer_id'];
        $success['customer']=$_POST['customer'];                    $txt = $txt." customer:=".$success['customer'];
        $success['order']=$_POST['order'];                          $txt = $txt." order:=".$success['order'];
        $success['purchases']=$_POST['purchases'];                  $txt = $txt." purchases:=".$success['purchases'];
        $success['purchase_map']=$_POST['purchase_map'];            $txt = $txt." purchase_map:=".$success['purchase_map'];
        $success['purchase_map_flat']=$_POST['purchase_map_flat'];  $txt = $txt." purchase_map_flat:=".$success['purchase_map_flat'];
        $success['fulfillment']=$_POST['fulfillment'];              $txt = $txt." fulfillment:=".$success['fulfillment'];

        $myfile = file_put_contents('file.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
  
        echo json_response($success);


?>