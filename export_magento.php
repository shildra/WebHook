<?php
/*
 *
 * CREATE TABLE magento_csv_field (

    id int NOT NULL AUTO_INCREMENT,
    field_name varchar(255),
	PRIMARY KEY (id)
);

INSERT INTO	magento_csv_field (field_name) VALUES ("sku"),("_store"),("_attribute_set"),("_type"),("_category"),("_root_category"),("_product_websites"),("color"),("cost"),("country_of_manufacture"),("created_at"),("custom_design"),("custom_design_from"),("custom_design_to"),("custom_layout_update"),("description"),("gallery"),("gift_message_available"),("has_options"),("image"),("image_label"),("manufacturer"),("media_gallery"),("meta_description"),("meta_keyword"),("meta_title"),("minimal_price"),("msrp"),("msrp_display_actual_price_type"),("msrp_enabled"),("name"),("news_from_date"),("news_to_date"),("options_container"),("page_layout"),("price"),("required_options"),("short_description"),("small_image"),("small_image_label"),("special_from_date"),("special_price"),("special_to_date"),("status"),("tax_class_id"),("thumbnail"),("thumbnail_label"),("updated_at"),("url_key"),("url_path"),("visibility"),("weight"),("qty"),("min_qty"),("use_config_min_qty"),("is_qty_decimal"),("backorders"),("use_config_backorders"),("min_sale_qty"),("use_config_min_sale_qty"),("max_sale_qty"),("use_config_max_sale_qty"),("is_in_stock"),("notify_stock_qty"),("use_config_notify_stock_qty"),("manage_stock"),("use_config_manage_stock"),("stock_status_changed_auto"),("use_config_qty_increments"),("qty_increments"),("use_config_enable_qty_inc"),("enable_qty_increments"),("is_decimal_divided"),("_links_related_sku"),("_links_related_position"),("_links_crosssell_sku"),("_links_crosssell_position"),("_links_upsell_sku"),("_links_upsell_position"),("_associated_sku"),("_associated_default_qty"),("_associated_position"),("_tier_price_website"),("_tier_price_customer_group"),("_tier_price_qty"),("_tier_price_price"),("_group_price_website"),("_group_price_customer_group"),("_group_price_price"),("_media_attribute_id"),("_media_image"),("_media_lable"),("_media_position"),("_media_is_disabled");
 */

include "my_connection.php";
$csv_row ='';
$query = "SELECT * FROM magento_csv_field";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_row($result)) {
    $csv_row .= $row[1] . ',';
}
$csv_row=rtrim($csv_row,", ");
$csv_row .= "\n";

$query = "SELECT * FROM tbl_csv";
if(isset($_POST['magento_csv_field1'])) {
    $query = "SELECT * FROM tbl_csv where sel=1 ;";
}

$result = mysqli_query($con, $query);

$num_column = mysqli_num_fields($result);
$rowNum = 0;

while($row = mysqli_fetch_row($result)) {
    $rowNum++;
    for($i = 0; $i < 94; $i++){
        $tmpStr = '';
        switch($i){
            case 0: $tmpStr = ''; break;   //sku
            case 1: $tmpStr = 'XTSOL'; break;   //_store
            case 2: $tmpStr = 'XTSOL'; break;   //_attribute_set
            case 3: $tmpStr = ''; break;   //_type
            case 4: $tmpStr = $row[2]; break;   //_category
            case 5: $tmpStr = $row[3]; break;   //_root_category
            case 6: $tmpStr = ''; break;   //_product_websites
            case 7: $tmpStr = $row[25]; break;   //color
            case 8: $tmpStr = ''; break;   //cost
            case 9: $tmpStr = ''; break;   //country_of_manufacture
            case 10: $tmpStr = ''; break;   //created_at
            case 11: $tmpStr = ''; break;   //custom_design
            case 12: $tmpStr = ''; break;   //custom_design_from
            case 13: $tmpStr = ''; break;   //custom_design_to
            case 14: $tmpStr = ''; break;   //custom_layout_update
            case 15: $tmpStr = ''; break;   //description
            case 16: $tmpStr = ''; break;   //gallery
            case 17: $tmpStr = ''; break;   //gift_message_available
            case 18: $tmpStr = ''; break;   //has_options
            case 19: $tmpStr = $row[12]; break;   //image
            case 20: $tmpStr = ''; break;   //image_label
            case 21: $tmpStr = ''; break;   //manufacturer
            case 22: $tmpStr = ''; break;   //media_gallery
            case 23: $tmpStr = ''; break;   //meta_description
            case 24: $tmpStr = ''; break;   //meta_keyword
            case 25: $tmpStr = ''; break;   //meta_title
            case 26: $tmpStr = ''; break;   //minimal_price
            case 27: $tmpStr = ''; break;   //msrp
            case 28: $tmpStr = ''; break;   //msrp_display_actual_price_type
            case 29: $tmpStr = ''; break;   //msrp_enabled
            case 30: $tmpStr = ''; break;   //name
            case 31: $tmpStr = ''; break;   //news_from_date
            case 32: $tmpStr = ''; break;   //news_to_date
            case 33: $tmpStr = ''; break;   //options_container
            case 34: $tmpStr = ''; break;   //page_layout
            case 35: $tmpStr = ''; break;   //price
            case 36: $tmpStr = ''; break;   //required_options
            case 37: $tmpStr = ''; break;   //short_description
            case 38: $tmpStr = ''; break;   //small_image
            case 39: $tmpStr = ''; break;   //small_image_label
            case 40: $tmpStr = ''; break;   //special_from_date
            case 41: $tmpStr = ''; break;   //special_price
            case 42: $tmpStr = ''; break;   //special_to_date
            case 43: $tmpStr = ''; break;   //status
            case 44: $tmpStr = ''; break;   //tax_class_id
            case 45: $tmpStr = ''; break;   //thumbnail
            case 46: $tmpStr = ''; break;   //thumbnail_label
            case 47: $tmpStr = ''; break;   //updated_at
            case 48: $tmpStr = ''; break;   //url_key
            case 49: $tmpStr = ''; break;   //url_path
            case 50: $tmpStr = ''; break;   //visibility
            case 51: $tmpStr = ''; break;   //weight
            case 52: $tmpStr = ''; break;   //qty
            case 53: $tmpStr = ''; break;   //min_qty
            case 54: $tmpStr = ''; break;   //use_config_min_qty
            case 55: $tmpStr = ''; break;   //is_qty_decimal
            case 56: $tmpStr = ''; break;   //backorders
            case 57: $tmpStr = ''; break;   //use_config_backorders
            case 58: $tmpStr = ''; break;   //min_sale_qty
            case 59: $tmpStr = ''; break;   //use_config_min_sale_qty
            case 60: $tmpStr = ''; break;   //max_sale_qty
            case 61: $tmpStr = ''; break;   //use_config_max_sale_qty
            case 62: $tmpStr = ''; break;   //is_in_stock
            case 63: $tmpStr = ''; break;   //notify_stock_qty
            case 64: $tmpStr = ''; break;   //use_config_notify_stock_qty
            case 65: $tmpStr = ''; break;   //manage_stock
            case 66: $tmpStr = ''; break;   //use_config_manage_stock
            case 67: $tmpStr = ''; break;   //stock_status_changed_auto
            case 68: $tmpStr = ''; break;   //use_config_qty_increments
            case 69: $tmpStr = ''; break;   //qty_increments
            case 70: $tmpStr = ''; break;   //use_config_enable_qty_inc
            case 71: $tmpStr = ''; break;   //enable_qty_increments
            case 72: $tmpStr = ''; break;   //is_decimal_divided
            case 73: $tmpStr = ''; break;   //_links_related_sku
            case 74: $tmpStr = ''; break;   //_links_related_position
            case 75: $tmpStr = ''; break;   //_links_crosssell_sku
            case 76: $tmpStr = ''; break;   //_links_crosssell_position
            case 77: $tmpStr = ''; break;   //_links_upsell_sku
            case 78: $tmpStr = ''; break;   //_links_upsell_position
            case 79: $tmpStr = ''; break;   //_associated_sku
            case 80: $tmpStr = ''; break;   //_associated_default_qty
            case 81: $tmpStr = ''; break;   //_associated_position
            case 82: $tmpStr = ''; break;   //_tier_price_website
            case 83: $tmpStr = ''; break;   //_tier_price_customer_group
            case 84: $tmpStr = ''; break;   //_tier_price_qty
            case 85: $tmpStr = ''; break;   //_tier_price_price
            case 86: $tmpStr = ''; break;   //_group_price_website
            case 87: $tmpStr = ''; break;   //_group_price_customer_group
            case 88: $tmpStr = ''; break;   //_group_price_price
            case 89: $tmpStr = ''; break;   //_media_attribute_id
            case 90: $tmpStr = ''; break;   //_media_image
            case 91: $tmpStr = ''; break;   //_media_lable
            case 92: $tmpStr = ''; break;   //_media_position
            case 93: $tmpStr = ''; break;   //_media_is_disabled
            default: $tmpStr = '';    break;
        }

        $csv_row .= $tmpStr.',';
    }
    $csv_row=rtrim($csv_row,", ");
    $csv_row .= "\n";
}

/* Download as CSV File */
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=Gambio_gx3.csv');
echo $csv_row;
exit;
?>

/*
    $csv_filename = 'db_export_'.date('Y-m-d').'.csv';
    $csv_row ='';


    $headers = array();
    for ($i = 1; $i <= 37; $i++) {
        $headers[] = $txt[$i];
    }

    $csv_export = '';

    while($row = mysqli_fetch_row($result)) {
        // create line with field values
        for($i = 2; $i <= 38; $i++) {
            $csv_export.= '"'.$row[$i].'";';
            $sql = "INSERT INTO mylog (tmp, php) VALUES ('".$i-2."=".$csv_export."', 'export')";
            mysqli_query($con,$sql);
        }
        $csv_export.= '
    ';
    }
    // Export the data and prompt a csv file for download
    header("Content-type: text/x-csv");
    header("Content-Disposition: attachment; filename=".$csv_filename."");
    echo($csv_export);
*/