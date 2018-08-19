<?php

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

        http_response_code(200);

        echo $success;
?>