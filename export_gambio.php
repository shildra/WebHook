<<<<<<< HEAD
<?php
/*
 *
 * CREATE TABLE gambio_csv_field (

    id int NOT NULL AUTO_INCREMENT,
    field_name varchar(255),
	PRIMARY KEY (id)
);

INSERT INTO	gambio_csv_field (field_name) VALUES ("XTSOL"),("p_id"),("p_model"),("p_stock"),("p_sorting"),("p_startpage"),("p_startpage_sort"),("p_shipping"),("p_tpl"),("p_opttpl"),("p_manufacturer"),("p_fsk18"),("p_priceNoTax"),("p_priceNoTax.1"),("p_priceNoTax.2"),("p_priceNoTax.3"),("p_tax"),("p_status"),("p_weight"),("p_ean"),("code_isbn"),("code_upc"),("code_mpn"),("code_jan"),("brand_name"),("p_disc"),("p_date_added"),("p_last_modified"),("p_date_available"),("p_ordered"),("nc_ultra_shipping_costs"),("gm_show_date_added"),("gm_show_price_offer"),("gm_show_weight"),("gm_show_qty_info"),("gm_price_status"),("gm_min_order"),("gm_graduated_qty"),("gm_options_template"),("p_vpe"),("p_vpe_status"),("p_vpe_value"),("p_image.1"),("p_image.2"),("p_image.3"),("p_image"),("p_name.en"),("p_desc.en"),("p_shortdesc.en"),("p_checkout_information.en"),("p_meta_title.en"),("p_meta_desc.en"),("p_meta_key.en"),("p_meta_desc.de"),("p_keywords.en"),("p_url.en"),("gm_url_keywords.en"),("rewrite_url.en"),("p_name.de"),("p_desc.de"),("p_shortdesc.de"),("p_checkout_information.de"),("p_meta_title.de"),("p_meta_key.de"),("p_keywords.de"),("p_url.de"),("gm_url_keywords.de"),("rewrite_url.de"),("p_cat.en"),("p_cat.de"),("google_export_availability"),("google_export_condition"),("google_category"),("p_img_alt_text.en"),("p_img_alt_text.1.en"),("p_img_alt_text.2.en"),("p_img_alt_text.3.en"),("p_img_alt_text.de"),("p_img_alt_text.1.de"),("p_img_alt_text.2.de"),("p_img_alt_text.3.de"),("p_group_permission.0"),("p_group_permission.1"),("p_group_permission.2"),("p_group_permission.3"),("specials_qty"),("specials_new_products_price"),("expires_date"),("specials_status"),("gm_priority"),("gm_changefreq"),("gm_sitemap_entry"),("p_qty_unit_id"),("p_type"),("Eigenschaft: Größe.de [1]"),("Eigenschaft: Farbe.de [2]"),("products_properties_combis_id"),("combi_sort_order"),("combi_model"),("combi_ean"),("combi_quantity"),("combi_shipping_status_id"),("combi_weight"),("combi_price"),("combi_price_type"),("combi_image"),("combi_vpe_id"),("combi_vpe_value");
 */

include "my_connection.php";
$csv_row ='';
$query = "SELECT * FROM gambio_csv_field";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_row($result)) {
    $csv_row .= '"' . $row[1] . '"|';
}
$csv_row=rtrim($csv_row,"| ");
$csv_row .= "\n";

$query = "SELECT * FROM tbl_csv";
if(isset($_POST['submit_export_gambio1'])) {
    $query = "SELECT * FROM tbl_csv where sel=1 ;";
}

$result = mysqli_query($con, $query);

$num_column = mysqli_num_fields($result);
$rowNum = 0;
while($row = mysqli_fetch_row($result)) {
    $rowNum++;

    if($row[12] != "") {upload_image($row[12]); $row[12]= basename($row[12]);}
    if($row[13] != "") {upload_image($row[13]); $row[13]= basename($row[13]); }
    if($row[14] != "") {upload_image($row[14]); $row[14]= basename($row[14]);}
    if($row[15] != "") {upload_image($row[15]); $row[15]= basename($row[15]); }
    if($row[16] != "") {upload_image($row[16]); $row[16]= basename($row[16]); }
    if($row[17] != "") {upload_image($row[17]); $row[17]= basename($row[17]); }
    if($row[18] != "") {upload_image($row[18]); $row[18]= basename($row[18]); }
    if($row[21] != "") {upload_image($row[21]); $row[21]= basename($row[21]); }
    if($row[31] != "") {upload_image($row[31]); $row[31]= basename($row[31]); }

    for($i = 0; $i < 108; $i++){
        $tmpStr = '';
        switch($i){
            case 0: $tmpStr = 'XTSOL'; break;   //XTSOL
            case 1: $tmpStr = $rowNum; break;   //p_id
            case 2: $tmpStr = $row[37]; break;   //p_model = Produkt ID
            case 3: $tmpStr = '95'; break;  //p_stock
            case 4: $tmpStr = '0'; break;   //p_sorting
            case 5: $tmpStr = '1'; break;   //p_startpage
            case 6: $tmpStr = '0'; break;   //p_startpage_sort
            case 7: $tmpStr = '1'; break;   //p_shipping = 1
            case 8: $tmpStr = 'standard.html'; break;   //p_tpl = standard.html
            case 9: $tmpStr = 'product_options_dropdown.html'; break;   //p_opttpl =
            case 10: $tmpStr = '0'; break;  //p_manufacturer = 0
            case 11: $tmpStr = '0'; break;  //p_fsk18 = 0
            case 12: $tmpStr = $row[29]; break;    //p_priceNoTax=Official Retail Price
            case 13: $tmpStr = ''; break;
            case 14: $tmpStr = ''; break;
            case 15: $tmpStr = ''; break;
            case 16: $tmpStr = ''; break; //p_tax = 1
            case 17: $tmpStr = ''; break;   //p_status = 1
            case 18: $tmpStr = ''; break;   //p_weight = 1.0000
            case 19: $tmpStr = $row[24]; break;   //p_ean = EAN
            case 20: $tmpStr = ''; break;
            case 21: $tmpStr = ''; break;
            case 22: $tmpStr = ''; break;
            case 23: $tmpStr = ''; break;
            case 24: $tmpStr = $row[6]; break;  //brand_name = Brandname
            case 25: $tmpStr = '0'; break;  //p_disc = 0
            case 26: $tmpStr = '6/16/2018 13:15'; break;    //
            case 27: $tmpStr = '6/16/2018 15:10'; break;
            case 28: $tmpStr = '1000-01-01 00:00:00'; break;
            case 29: $tmpStr = '5'; break;
            case 30: $tmpStr = '4.9'; break;  ///nc_ultra_shipping_costs = 4.9000
            case 31: $tmpStr = '0'; break;  //gm_show_date_added=0
            case 32: $tmpStr = '0'; break;  ///gm_show_price_offer=0
            case 33: $tmpStr = '0'; break;  //gm_show_weight=0
            case 34: $tmpStr = '1'; break;  //gm_show_qty_info = 1
            case 35: $tmpStr = '0'; break;  //gm_price_status = 0
            case 36: $tmpStr = '1.0000'; break;  //gm_min_order = 1.0000
            case 37: $tmpStr = '1.000'; break;  //gm_graduated_qty = 1.0000
            case 38: $tmpStr = 'product_options_dropdown.html'; break;  //gm_options_template = product_options_dropdown.html
            case 39: $tmpStr = '0'; break; //p_vpe = 0
            case 40: $tmpStr = '0'; break;  //p_vpe_status = 0
            case 41: $tmpStr = '0.0000'; break;  //p_vpe_value = 0.0000
            case 42: $tmpStr = $row[13]; break;  //
            case 43: $tmpStr = $row[14]; break;  //
            case 44: $tmpStr = $row[15]; break;  //
            case 45: $tmpStr = $row[12]; break;  //
            case 46: $tmpStr = ''; break;
            case 47: $tmpStr = ''; break;
            case 48: $tmpStr = ''; break;
            case 49: $tmpStr = ''; break;
            case 50: $tmpStr = ''; break;
            case 51: $tmpStr = ''; break;
            case 52: $tmpStr = ''; break;
            case 53: $tmpStr = ''; break;
            case 54: $tmpStr = ''; break;
            case 55: $tmpStr = ''; break;
            case 56: $tmpStr = ''; break;
            case 57: $tmpStr = ''; break;
            case 58: $tmpStr = ''; break;
            case 59: $tmpStr = ''; break;
            case 60: $tmpStr = ''; break;
            case 61: $tmpStr = ''; break;
            case 62: $tmpStr = ''; break;
            case 63: $tmpStr = ''; break;
            case 64: $tmpStr = ''; break;
            case 65: $tmpStr = ''; break;
            case 66: $tmpStr = ''; break;
            case 67: $tmpStr = ''; break;
            case 68: $tmpStr = '[1]'; break; //p_cat_en = [1]
            case 69: $tmpStr = 'Jogginghose[1]'; break; //p_cat.de = Jogginghose[1]
            case 70: $tmpStr = 'auf lager'; break; //google_export_availability = auf Lager
            case 71: $tmpStr = 'neu'; break;    //google_export_condition = Neu
            case 72: $tmpStr = ''; break;
            case 73: $tmpStr = ''; break;
            case 74: $tmpStr = ''; break;
            case 75: $tmpStr = ''; break;
            case 76: $tmpStr = ''; break;
            case 77: $tmpStr = ''; break;
            case 78: $tmpStr = ''; break;
            case 79: $tmpStr = ''; break;
            case 80: $tmpStr = ''; break;
    //p_group_permission.0	p_group_permission.1	p_group_permission.2	p_group_permission.3 = 0
            case 81: $tmpStr = '0'; break;
            case 82: $tmpStr = '0'; break;
            case 83: $tmpStr = '0'; break;
            case 84: $tmpStr = '0'; break;
            case 85: $tmpStr = ''; break;
            case 86: $tmpStr = ''; break;
            case 87: $tmpStr = ''; break;
            case 88: $tmpStr = ''; break;
            case 89: $tmpStr = '0.0'; break;  //gm_priority = 0.0
            case 90: $tmpStr = 'always'; break; //gm_changefreq = always
            case 91: $tmpStr = '1'; break;  //gm_sitemap_entry = 1
            case 92: $tmpStr = ''; break;
            case 93: $tmpStr = '1'; break;  //p_tpye = 1
            case 94: $tmpStr = $row[11]; break; //Eigenschaft: GrÃ¶ÃŸe.de [1] = Size2
            case 95: $tmpStr = $row[25]; break;  //Eigenschaft: Farbe.de [2] = Color
            case 96: $tmpStr = $rowNum-1; break; // products_properties_combis_id = i dont know.. maybe also start from count 0

            case 97: $tmpStr = $rowNum-1; break; //combi_sort_order = start from 0 i think
            case 98: $tmpStr = $row[10]." ".$row[25]; break; //combi_model = Size+Color
            case 99: $tmpStr = ''; break;
            case 100: $tmpStr = $row[36]." ".$row[23]; break; //combi_quantity = childs Stock
            case 101: $tmpStr = '0'; break; //combi_shipping_status_id =0
            case 102: $tmpStr = '0.0000'; break; // combi_weight = 0.0000
            case 103: $tmpStr = '0.0000'; break; //combi_price = 0.0000
            case 104: $tmpStr = 'calc'; break;  //combi_price_type = calc
                //combi_image = empty
            case 106: $tmpStr = '0'; break;     //combi_vpe_id = 0
            case 107: $tmpStr = '0'; break;     //combi_vpe_value = 0.0000

            default: $tmpStr = '';    break;
        }

        $csv_row .= '"'.$tmpStr.'"|';
    }
    $csv_row=rtrim($csv_row,"| ");
    $csv_row .= "\n";
}

function upload_image($url)
{
    $file = curl_init($url);
    if (!empty($url) && !empty($file)) {
        $filename = basename($url);
        $filename ="image/".$filename;
        if (!file_exists($filename)) {
            $myfile = fopen($filename, "wb") or die("Unable to open file!");
            curl_setopt($file, CURLOPT_FILE, $myfile);
            curl_setopt($file, CURLOPT_HEADER, 0);
            curl_exec($file);
            curl_close($file);
            fclose($myfile);
        }
    }
    return true;
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
=======
<?php
/*
 *
 * CREATE TABLE gambio_csv_field (

    id int NOT NULL AUTO_INCREMENT,
    field_name varchar(255),
	PRIMARY KEY (id)
);

INSERT INTO	gambio_csv_field (field_name) VALUES ("XTSOL"),("p_id"),("p_model"),("p_stock"),("p_sorting"),("p_startpage"),("p_startpage_sort"),("p_shipping"),("p_tpl"),("p_opttpl"),("p_manufacturer"),("p_fsk18"),("p_priceNoTax"),("p_priceNoTax.1"),("p_priceNoTax.2"),("p_priceNoTax.3"),("p_tax"),("p_status"),("p_weight"),("p_ean"),("code_isbn"),("code_upc"),("code_mpn"),("code_jan"),("brand_name"),("p_disc"),("p_date_added"),("p_last_modified"),("p_date_available"),("p_ordered"),("nc_ultra_shipping_costs"),("gm_show_date_added"),("gm_show_price_offer"),("gm_show_weight"),("gm_show_qty_info"),("gm_price_status"),("gm_min_order"),("gm_graduated_qty"),("gm_options_template"),("p_vpe"),("p_vpe_status"),("p_vpe_value"),("p_image.1"),("p_image.2"),("p_image.3"),("p_image"),("p_name.en"),("p_desc.en"),("p_shortdesc.en"),("p_checkout_information.en"),("p_meta_title.en"),("p_meta_desc.en"),("p_meta_key.en"),("p_meta_desc.de"),("p_keywords.en"),("p_url.en"),("gm_url_keywords.en"),("rewrite_url.en"),("p_name.de"),("p_desc.de"),("p_shortdesc.de"),("p_checkout_information.de"),("p_meta_title.de"),("p_meta_key.de"),("p_keywords.de"),("p_url.de"),("gm_url_keywords.de"),("rewrite_url.de"),("p_cat.en"),("p_cat.de"),("google_export_availability"),("google_export_condition"),("google_category"),("p_img_alt_text.en"),("p_img_alt_text.1.en"),("p_img_alt_text.2.en"),("p_img_alt_text.3.en"),("p_img_alt_text.de"),("p_img_alt_text.1.de"),("p_img_alt_text.2.de"),("p_img_alt_text.3.de"),("p_group_permission.0"),("p_group_permission.1"),("p_group_permission.2"),("p_group_permission.3"),("specials_qty"),("specials_new_products_price"),("expires_date"),("specials_status"),("gm_priority"),("gm_changefreq"),("gm_sitemap_entry"),("p_qty_unit_id"),("p_type"),("Eigenschaft: Größe.de [1]"),("Eigenschaft: Farbe.de [2]"),("products_properties_combis_id"),("combi_sort_order"),("combi_model"),("combi_ean"),("combi_quantity"),("combi_shipping_status_id"),("combi_weight"),("combi_price"),("combi_price_type"),("combi_image"),("combi_vpe_id"),("combi_vpe_value");
 */

include "my_connection.php";
$csv_row ='';
$query = "SELECT * FROM gambio_csv_field";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_row($result)) {
    $csv_row .= '"' . $row[1] . '"|';
}
$csv_row=rtrim($csv_row,"| ");
$csv_row .= "\n";

$query = "SELECT * FROM tbl_csv";
if(isset($_POST['submit_export_gambio1'])) {
    $query = "SELECT * FROM tbl_csv where sel=1 ;";
}

$result = mysqli_query($con, $query);

$num_column = mysqli_num_fields($result);
$rowNum = 0;
while($row = mysqli_fetch_row($result)) {
    $rowNum++;

    if($row[12] != "") {upload_image($row[12]); $row[12]= basename($row[12]);}
    if($row[13] != "") {upload_image($row[13]); $row[13]= basename($row[13]); }
    if($row[14] != "") {upload_image($row[14]); $row[14]= basename($row[14]);}
    if($row[15] != "") {upload_image($row[15]); $row[15]= basename($row[15]); }
    if($row[16] != "") {upload_image($row[16]); $row[16]= basename($row[16]); }
    if($row[17] != "") {upload_image($row[17]); $row[17]= basename($row[17]); }
    if($row[18] != "") {upload_image($row[18]); $row[18]= basename($row[18]); }
    if($row[21] != "") {upload_image($row[21]); $row[21]= basename($row[21]); }
    if($row[31] != "") {upload_image($row[31]); $row[31]= basename($row[31]); }

    for($i = 0; $i < 108; $i++){
        $tmpStr = '';
        switch($i){
            case 0: $tmpStr = 'XTSOL'; break;   //XTSOL
            case 1: $tmpStr = $rowNum; break;   //p_id
            case 2: $tmpStr = $row[37]; break;   //p_model = Produkt ID
            case 3: $tmpStr = '95'; break;  //p_stock
            case 4: $tmpStr = '0'; break;   //p_sorting
            case 5: $tmpStr = '1'; break;   //p_startpage
            case 6: $tmpStr = '0'; break;   //p_startpage_sort
            case 7: $tmpStr = '1'; break;   //p_shipping = 1
            case 8: $tmpStr = 'standard.html'; break;   //p_tpl = standard.html
            case 9: $tmpStr = 'product_options_dropdown.html'; break;   //p_opttpl =
            case 10: $tmpStr = '0'; break;  //p_manufacturer = 0
            case 11: $tmpStr = '0'; break;  //p_fsk18 = 0
            case 12: $tmpStr = $row[29]; break;    //p_priceNoTax=Official Retail Price
            case 13: $tmpStr = ''; break;
            case 14: $tmpStr = ''; break;
            case 15: $tmpStr = ''; break;
            case 16: $tmpStr = ''; break; //p_tax = 1
            case 17: $tmpStr = ''; break;   //p_status = 1
            case 18: $tmpStr = ''; break;   //p_weight = 1.0000
            case 19: $tmpStr = $row[24]; break;   //p_ean = EAN
            case 20: $tmpStr = ''; break;
            case 21: $tmpStr = ''; break;
            case 22: $tmpStr = ''; break;
            case 23: $tmpStr = ''; break;
            case 24: $tmpStr = $row[6]; break;  //brand_name = Brandname
            case 25: $tmpStr = '0'; break;  //p_disc = 0
            case 26: $tmpStr = '6/16/2018 13:15'; break;    //
            case 27: $tmpStr = '6/16/2018 15:10'; break;
            case 28: $tmpStr = '1000-01-01 00:00:00'; break;
            case 29: $tmpStr = '5'; break;
            case 30: $tmpStr = '4.9'; break;  ///nc_ultra_shipping_costs = 4.9000
            case 31: $tmpStr = '0'; break;  //gm_show_date_added=0
            case 32: $tmpStr = '0'; break;  ///gm_show_price_offer=0
            case 33: $tmpStr = '0'; break;  //gm_show_weight=0
            case 34: $tmpStr = '1'; break;  //gm_show_qty_info = 1
            case 35: $tmpStr = '0'; break;  //gm_price_status = 0
            case 36: $tmpStr = '1.0000'; break;  //gm_min_order = 1.0000
            case 37: $tmpStr = '1.000'; break;  //gm_graduated_qty = 1.0000
            case 38: $tmpStr = 'product_options_dropdown.html'; break;  //gm_options_template = product_options_dropdown.html
            case 39: $tmpStr = '0'; break; //p_vpe = 0
            case 40: $tmpStr = '0'; break;  //p_vpe_status = 0
            case 41: $tmpStr = '0.0000'; break;  //p_vpe_value = 0.0000
            case 42: $tmpStr = $row[13]; break;  //
            case 43: $tmpStr = $row[14]; break;  //
            case 44: $tmpStr = $row[15]; break;  //
            case 45: $tmpStr = $row[12]; break;  //
            case 46: $tmpStr = ''; break;
            case 47: $tmpStr = ''; break;
            case 48: $tmpStr = ''; break;
            case 49: $tmpStr = ''; break;
            case 50: $tmpStr = ''; break;
            case 51: $tmpStr = ''; break;
            case 52: $tmpStr = ''; break;
            case 53: $tmpStr = ''; break;
            case 54: $tmpStr = ''; break;
            case 55: $tmpStr = ''; break;
            case 56: $tmpStr = ''; break;
            case 57: $tmpStr = ''; break;
            case 58: $tmpStr = ''; break;
            case 59: $tmpStr = ''; break;
            case 60: $tmpStr = ''; break;
            case 61: $tmpStr = ''; break;
            case 62: $tmpStr = ''; break;
            case 63: $tmpStr = ''; break;
            case 64: $tmpStr = ''; break;
            case 65: $tmpStr = ''; break;
            case 66: $tmpStr = ''; break;
            case 67: $tmpStr = ''; break;
            case 68: $tmpStr = '[1]'; break; //p_cat_en = [1]
            case 69: $tmpStr = 'Jogginghose[1]'; break; //p_cat.de = Jogginghose[1]
            case 70: $tmpStr = 'auf lager'; break; //google_export_availability = auf Lager
            case 71: $tmpStr = 'neu'; break;    //google_export_condition = Neu
            case 72: $tmpStr = ''; break;
            case 73: $tmpStr = ''; break;
            case 74: $tmpStr = ''; break;
            case 75: $tmpStr = ''; break;
            case 76: $tmpStr = ''; break;
            case 77: $tmpStr = ''; break;
            case 78: $tmpStr = ''; break;
            case 79: $tmpStr = ''; break;
            case 80: $tmpStr = ''; break;
    //p_group_permission.0	p_group_permission.1	p_group_permission.2	p_group_permission.3 = 0
            case 81: $tmpStr = '0'; break;
            case 82: $tmpStr = '0'; break;
            case 83: $tmpStr = '0'; break;
            case 84: $tmpStr = '0'; break;
            case 85: $tmpStr = ''; break;
            case 86: $tmpStr = ''; break;
            case 87: $tmpStr = ''; break;
            case 88: $tmpStr = ''; break;
            case 89: $tmpStr = '0.0'; break;  //gm_priority = 0.0
            case 90: $tmpStr = 'always'; break; //gm_changefreq = always
            case 91: $tmpStr = '1'; break;  //gm_sitemap_entry = 1
            case 92: $tmpStr = ''; break;
            case 93: $tmpStr = '1'; break;  //p_tpye = 1
            case 94: $tmpStr = $row[11]; break; //Eigenschaft: GrÃ¶ÃŸe.de [1] = Size2
            case 95: $tmpStr = $row[25]; break;  //Eigenschaft: Farbe.de [2] = Color
            case 96: $tmpStr = $rowNum-1; break; // products_properties_combis_id = i dont know.. maybe also start from count 0

            case 97: $tmpStr = $rowNum-1; break; //combi_sort_order = start from 0 i think
            case 98: $tmpStr = $row[10]." ".$row[25]; break; //combi_model = Size+Color
            case 99: $tmpStr = ''; break;
            case 100: $tmpStr = $row[36]." ".$row[23]; break; //combi_quantity = childs Stock
            case 101: $tmpStr = '0'; break; //combi_shipping_status_id =0
            case 102: $tmpStr = '0.0000'; break; // combi_weight = 0.0000
            case 103: $tmpStr = '0.0000'; break; //combi_price = 0.0000
            case 104: $tmpStr = 'calc'; break;  //combi_price_type = calc
                //combi_image = empty
            case 106: $tmpStr = '0'; break;     //combi_vpe_id = 0
            case 107: $tmpStr = '0'; break;     //combi_vpe_value = 0.0000

            default: $tmpStr = '';    break;
        }

        $csv_row .= '"'.$tmpStr.'"|';
    }
    $csv_row=rtrim($csv_row,"| ");
    $csv_row .= "\n";
}

function upload_image($url)
{
    $file = curl_init($url);
    if (!empty($url) && !empty($file)) {
        $filename = basename($url);
        $filename ="image/".$filename;
        if (!file_exists($filename)) {
            $myfile = fopen($filename, "wb") or die("Unable to open file!");
            curl_setopt($file, CURLOPT_FILE, $myfile);
            curl_setopt($file, CURLOPT_HEADER, 0);
            curl_exec($file);
            curl_close($file);
            fclose($myfile);
        }
    }
    return true;
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
>>>>>>> ff099208e932b5ae689a46b4f4a23971b9b0ceb3
*/