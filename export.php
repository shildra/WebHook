<?php
/*
 *
 * CREATE TABLE b2b_csv_field (

    id int NOT NULL AUTO_INCREMENT,
    field_name varchar(255),
	PRIMARY KEY (id)
);
INSERT INTO	b2b_csv_field (field_name) VALUES ("Maincategorie"),("Subcategorie1"),("Subcategorie2"),("Subcategorie3"),("Brandname"),("Productname"),("Product"),("Reference Code"),("Size1"),("Size2"),("Mainimage"),("Image1"),("Image2"),("Image3"),("Image4"),("Image5"),("Image6"),("Gender"),("Wholesale Price"),("Picturelink"),("Avaiability"),("Stock"),("EAN"),("Color"),("Article Number"),("Father"),("New"),("Official Retail Price"),("Material"),("White Picture"),("TitleSize"),("TitleColor"),("ProductNameWithSize"),("ProductIsReduced"),("Parent"),("Produkt ID"),("UVP");

 */
include "my_connection.php";
$query = "SELECT * FROM tbl_csv";
if(isset($_POST['submit_export1'])) {
    $query = "SELECT * FROM tbl_csv where sel=1 ;";
}

$result = mysqli_query($con, $query);

$num_column = mysqli_num_fields($result);

$txt = array();
$txt[1] = "Maincategorie";  $txt[2] = "Subcategorie1";   $txt[3] = "Subcategorie2";
$txt[4] = "Subcategorie3";  $txt[5] = "Brandname";       $txt[6] = "Productname";
$txt[7] = "Product";        $txt[8] = "Product Code";    $txt[9] = "Size1";
$txt[10] = "Size2";
$txt[11] = "Mainimage";     $txt[12] = "Image1";        $txt[13] = "Image2";
$txt[14] = "Image3";  $txt[15] = "Image4";       $txt[16] = "Image5";
$txt[17] = "Image6";        $txt[18] = "Gender";    $txt[19] = "Wholesale Price";
$txt[20] = "Picturelink";
$txt[21] = "Avaiability";  $txt[22] = "Stock";   $txt[23] = "EAN";
$txt[24] = "Color";  $txt[25] = "Article Number";       $txt[26] = "Father";
$txt[27] = "New";        $txt[28] = "Official Retail Price";    $txt[29] = "Material";
$txt[30] = "White Picture";
$txt[31] = "TitleSize";  $txt[32] = "TitleColor";   $txt[33] = "ProductNameWithSize";
$txt[34] = "ProductIsReduced";  $txt[35] = "Parent";
$txt[36] = "Produkt ID";        $txt[37] = "UVP";
$csv_row ='';

for ($i = 1; $i < 37; $i++){
    $csv_row .= '"' . $txt[$i] . '";';
}
$csv_row .= "\n";

while($row = mysqli_fetch_row($result)) {
    for($i=2;$i<$num_column;$i++) {
        if(($i>=12 && $i<=18) || $i == 21 || $i == 31){
            $row[$i]= basename($row[$i]);
        }

        $csv_row .= '"' . $row[$i] . '";';
    }
    $csv_row .= "\n";
}

/* Download as CSV File */
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=B2BStandard.csv');
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