<?php

    ini_set('MAX_EXECUTION_TIME', -1);

    if(isset($_POST['submit_export'])){
        include "export.php";

    }
    if(isset($_POST['submit_export1'])){
        include "export.php";
    }
    if(isset($_POST['submit_export_gambio'])){
        include "export_gambio.php";
    }
    if(isset($_POST['submit_export_gambio1'])){
        include "export_gambio.php";
    }

    if(isset($_POST['Upload']) && !empty($_FILES['uploaded_file']))
    {
        $path = "upload/";
        $path = $path . basename( $_FILES['uploaded_file']['name']);
        $tag = sprintf("csv%03d", rand(0, 999));
        if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
            echo "The file ".  basename( $_FILES['uploaded_file']['name']).
                " has been uploaded";
        } else{
            echo "There was an error uploading the file, please try again!";
        }

    }

    unset($_POST['submit_export']);
    unset($_POST['submit_export1']);
    unset($_POST['submit_export_gambio']);
    unset($_POST['submit_export_gambio1']);
    unset($_POST['Upload']);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSV importer/exporter </title>
<link rel="stylesheet" href="dist/bootstrap.min.css" type="text/css" media="all">
<link href="dist/jquery.bootgrid.css" rel="stylesheet" />
<link href="dist/progress_bar.css" rel="stylesheet" />
<script src="dist/jquery-1.11.1.min.js"></script>
<script src="dist/bootstrap.min.js"></script>
<script src="dist/jquery.bootgrid.min.js"></script>



<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.js"></script>
-->

</head>
<body>

	<div class="">
      <div class="">
        <h1>Dear Berrer! Want more your requirement.</h1>
        <div class="col-sm-12">
		<div class="row">

            <div class="col-md-2 col-sm-6">
                <form enctype="multipart/form-data" method="POST">
                    <p>Upload your file</p>
                    <input type="file" name="uploaded_file"><br />
                    <input type="submit" name='Upload' id='Upload' value="Upload">
                </form>
            </div>

            <div class="col-md-3 col-sm-6">
                <div>
                    Import every

                    <input type="number" id="timer" style="width:50px;text-align: right" onchange="change_timer()" value="10" />
                    min.
                    <br/>
                    <br/>
                    Will import in <a id="remainTime"> sec.</a>
                </div>
                <div class="table-wrapper" style="max-height: 200px">
                <ul id="csv_list" class="list-group">

                </ul>

                </div>
                <div id="progressBar" class="progress" style="display:none;">
                    <div class="progress-bar" id="bar" style="width:0"></div>
                </div>
            </div>

            <div class="col-md-2 col-sm-6">
                <form enctype="multipart/form-data" method="POST">
                    <input type="submit" name='submit_export' id='submit_export' value="B2B CSV All">
                </form>
                <form enctype="multipart/form-data" method="POST">
                    <input type="submit" name='submit_export1' id='submit_export1' value="B2B CSV Sel">
                </form>
            </div>
            <div class="col-md-2 col-sm-6">
                <form enctype="multipart/form-data" method="POST">
                    <input type="submit" name='submit_export_gambio' id='submit_export_gambio' value="Gambio CSV All">
                </form>
                <form enctype="multipart/form-data" method="POST">
                    <input type="submit" name='submit_export_gambio1' id='submit_export_gambio1' value="Gambio CSV Sel">
                </form>
            </div>
        </div>

        <div class="table-responsive ">

		<table id="employee_grid" class="table table-hover table-bordered table-hover table-responsive-md table-condensed" cellspacing="0" data-toggle="bootgrid">
            <div>
                <input type="checkbox" id="scales" name="feature" onchange="checkAll(this)"
                       value="scales"  />
                <label for="scales">Select All</label>
                <button id="delAll" onclick="Remove_item(0)">Remove All</button>
                <button id="delSel" onclick="Remove_item(1)">Remove Sel</button>
                <button id="Post" onclick="PostItem()">Post Product</button>
                <button id="catchImg" style="display: none" onclick="Catch_image()">Catch Image</button>
            </div>
			<thead class="thead-dark">
				<tr style="background: #a6e1ec" class="thead-dark">
                    <th data-column-id="sel" data-type="sel" data-identifier="true">Sel</th>
					<th data-column-id="id" data-type="numeric" data-identifier="true">id</th>
					<th data-column-id="item1">Maincategorie</th>
                    <th data-column-id="item2">Subcategorie1</th>
                    <th data-column-id="item3">Subcategorie2</th>
                    <th data-column-id="item4">Subcategorie3</th>
                    <th data-column-id="item5">Brandname</th>
                    <th data-column-id="item6">Productname</th>
                    <th data-column-id="item7">Product</th>
                    <th data-column-id="item8">Product Code</th>
                    <th data-column-id="item9">Size1</th>
                    <th data-column-id="item10">Size2</th>
                    <th data-column-id="item11">Mainimage</th>
                    <th data-column-id="item12">Image1</th>
                    <th data-column-id="item13">Image2</th>
                    <th data-column-id="item14">Image3</th>
                    <th data-column-id="item15">Image4</th>
                    <th data-column-id="item16">Image5</th>
                    <th data-column-id="item17">Image6</th>
                    <th data-column-id="item18">Gender</th>
                    <th data-column-id="item19">Wholesale Price</th>
                    <th data-column-id="item20">Picturelink</th>
                    <th data-column-id="item21">Avaiability</th>
                    <th data-column-id="item22">Stock</th>
                    <th data-column-id="item23">EAN</th>
                    <th data-column-id="item24">Color</th>
                    <th data-column-id="item25">Article Number</th>
                    <th data-column-id="item26">Father</th>
                    <th data-column-id="item27">New</th>
                    <th data-column-id="item28">Official Retail Price</th>
                    <th data-column-id="item29">Material</th>
                    <th data-column-id="item30">White Picture</th>
                    <th data-column-id="item31">TitleSize</th>
                    <th data-column-id="item32">TitleColor</th>
                    <th data-column-id="item33">ProductNameWithSize</th>
                    <th data-column-id="item34">ProductIsReduced</th>
                    <th data-column-id="item35">Parent</th>
                    <th data-column-id="item36">Produkt ID</th>
                    <th data-column-id="item37">UVP</th>

					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
				</tr>
			</thead>
		</table>

    </div>
      </div>
    </div>


<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Employee</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_add">
				<input type="hidden" value="add" name="action" id="action">
                  <div class="form-group">
                    <label for="name" class="control-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name"/>
                  </div>
                  <div class="form-group">
                    <label for="salary" class="control-label">Salary:</label>
                    <input type="text" class="form-control" id="salary" name="salary"/>
                  </div>
				  <div class="form-group">
                    <label for="salary" class="control-label">Age:</label>
                    <input type="text" class="form-control" id="age" name="age"/>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_add" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_edit">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Dialog</h4>
            </div>

            <div class="modal-body">

				<input type="hidden" value="edit" name="action" id="action">
                <input type="hidden" value="0" name="edit_id" id="edit_id">

                    <?php
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
                    ?>

                    <?php for($ii = 1; $ii <= 37; $ii++){
                        if(($ii<11 || $ii>17) && $ii != 20 && $ii !=30 ){
                        ?>
                  <div class="form-group">
                    <label for="item<?php echo $ii; ?>" class="control-label"><?php echo $txt[$ii]; ?></label>
                    <input type="text" class="form-control" id="item<?php echo $ii; ?>"
                            name="item<?php echo $ii; ?>">
                  </div>
                    <?php }} ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_edit" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
<input type="hidden" id="sel_rows" value="">
<input type="hidden" id="top_csv" value="">

<script type="text/javascript">
    var timerId;
/*    var canClick = true;
    function click() {
        if (event.button==1) {
            if(canClick == false)
                alert('Please Wait while processing!');
        }
    }
    document.onMouseDown=click;
*/

    window.onload = function() {
        get_csv_list();
    };

    function get_csv_list(){

        $.ajax({
            type: "POST",
            url: "get_csv_list.php",
            dataType:"JSON", //or HTML, JSON, etc.
            success: function(res){
                document.getElementById("csv_list").innerHTML="";
                tmpStr = "";
                for(i=0; i < res.length; i++){
                    tmpStr += "<li class='list-group-item'>"+res[i];
                    tmpStr += "<button style='height: 20px; padding:0;' class='btn btn-info pull-right' onclick='import_csv(\""+res[i]+"\")'>Import</button>";
                    tmpStr += "</li>";
                }
                document.getElementById('top_csv').value = "";
                if(res.length > 0)
                    document.getElementById('top_csv').value = res[0];
                tmpStr += " <input type='hidden' name='import_filename' value='"+res[0]+"'>";

                document.getElementById("csv_list").innerHTML=tmpStr;
                change_timer();
                //alert(response[0]);
            },
            error: function(error){
                console.log(error);
            }
        });
//        remain_time = document.getElementById("timer").value*60;
        clearTimeout(timerId);
    }

    function submitForm() {
        console.log("submit event");
        var fname = document.getElementById('read_file').value;
        console.log(fname);
        if (fname == "")
            return false;

        var fd = new FormData(document.getElementById("fileinfo"));


        $.ajax({
            url: "upload.php",
            type: "POST",
            data: fd,
            processData: false,  // tell jQuery not to process the data
            contentType: false   // tell jQuery not to set contentType
        }).done(function( data ){

            console.log( data );
        });

        return false;
    }

    function change_timer(){
        clearTimeout(timerId);
        flag = false;
        filename = document.getElementById('top_csv').value;
        if(filename == "") return false;

        tt = document.getElementById('timer').value;
        if(tt < 1)
            return false;

        myTimer(tt*60);
    }

    function myTimer(remain_time){
        minutes = Math.floor(remain_time / 60);
        seconds = Math.floor(remain_time % 60);
        txt = "";
        if (minutes > 1){
            txt = minutes + " min.";
        }else{
            txt=seconds + " sec."
        }
        document.getElementById("remainTime").innerText = minutes+" min "+seconds+" sec.";

        if (remain_time > 0) {
            remain_time = remain_time - 1;
            timerId = setTimeout(this.myTimer.bind(null, remain_time), 1000);
        }
        else if(remain_time === 0){
            clearTimeout(timerId);
            import_csv("");
        }
    }
    function Refresh_Table(){
        $.ajax({
            type: "POST",
            url: "response.php",
            data: {},
            dataType: "json",
            success: function(response)
            {
                $("#employee_grid").bootgrid('reload');
            }
        });
    }
    function PostItem(){
        $.ajax({
            type: "POST",
            url: "facebook_share.php",
            data: {},
            dataType:'json', //or HTML, JSON, etc.
            success: function(response){
                console.log(response);
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    function Remove_item(sel){

        $.ajax({
            type: "POST",
            url: "del_item.php",
            data: {sel:sel},
            dataType:'json', //or HTML, JSON, etc.
            success: function(response){
                console.log(response);

            },
            error: function(error){
                console.log(error);
            }
        });

        Refresh_Table();

    }
    function Catch_image(sel){

        $.ajax({
            type: "POST",
            url: "catch_image.php",
            data: {},
            dataType:'json', //or HTML, JSON, etc.
            success: function(response){
                console.log(response);
                alert("Image import done!!!");
            },
            error: function(error){
                console.log(error);
            }
        });
    }


    function import_csv(filename){
        if(filename == "")
            filename = document.getElementById("top_csv").value;

        if(filename == "") return false;

        document.getElementById("csv_list").style.display="none";
        document.getElementById("progressBar").style.display="block";

        clearTimeout(timerId);
        canClick = false;

        process_unit = 100;
        $.ajax({
            type: "POST",
            url: "get_import_count.php",
            data: {import_file:filename},
            dataType:'json', //or HTML, JSON, etc.
            success: function(response){
                console.log(response);
                complete = true;
                for(i = 0; i < response.totalNum; i+=process_unit){


                    $.ajax({
                       type:"POST",
                       url: "import.php",
                       data:{import_file:filename,
                             total_num: response.totalNum,
                             from_num: i,
                             to_num: i+process_unit-1},
                        dataType:'json',
                        success:function(res){
                            console.log(res);
                            tmpNum = 100/response.totalNum*(res.to);
                            document.getElementById("bar").style.width=tmpNum+"%";
                            if(res.complete == "yes" ) {
                                canClick = true;
                                Refresh_Table();
                                document.getElementById("progressBar").style.display = "none";
                                document.getElementById("csv_list").style.display = "block";

                                console.log(response);
                                get_csv_list();
                            }
                        },
                        error: function(err){
                           complete = false;
                            console.log(err);
                        }
                    });
                }



            },
            error: function(error){
                document.getElementById("top_csv").value="";
                canClick = true;
//                alert("Sorry, Importing your csv failed.");
                console.log(error);
            }
        });
    }

    function SelectItem(cb, id){

        newValue = cb.checked;
        if(newValue == true)
            newValue = 1;
        else
            newValue = 0;

        $.ajax({
            type: "POST",
            url: "sel_item.php",
            data: {id:id, newValue:newValue},
            dataType:'json', //or HTML, JSON, etc.
            success: function(res) {
                console.log(res);
//                checkAll(cb);
            },
            error:function(err){
                console.log(err);
            }
        });
    }

    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');

        console.log("Select All function called");
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                    console.log(i+":true")
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                console.log(i);
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                    console.log(i+":false")
                }
            }
        }
        SelectItem(ele, -1);
    }


    $( document ).ready(function() {
        var grid = $("#employee_grid").bootgrid({
            ajax: true,
            rowSelect: true,
            post: function ()
            {
                /* To accumulate custom parameter with the request object */
                return {
                    id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
                };
            },

            url: "response.php",
            formatters: {

                "commands": function(column, row)
                {
                    return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " +
                        "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
                }
            }
        }).on("loaded.rs.jquery.bootgrid", function()
        {
            /* Executes after data is loaded and rendered */
            grid.find(".command-edit").on("click", function(e)
            {
                //alert("You pressed edit on row: " + $(this).data("row-id"));
                var ele =$(this).parent();
                var g_id = $(this).parent().siblings(':first').html();
                var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
                console.log(g_id);


                //console.log(grid.data());//
                $('#edit_model').modal('show');
                if($(this).data("row-id") >0) {

                    $('#edit_id').val(ele.siblings(':nth-of-type(2)').html()); // in case we're changing the key

                    // collect the data
                    for (i=1; i <= 37; i++){
                        if((i<11 || i>17) && i !== 20 && i !==30 ) {
                            k = i + 2;
                            $('#item' + i).val(ele.siblings(':nth-of-type(' + k + ')').html());
                        }
                    }

                } else {
                    alert('Now row selected! First select row, then click edit button');
                }
            }).end().find(".command-delete").on("click", function(e)
            {
                var conf = confirm('Delete ' + $(this).data("row-id") + ' items?');
                alert(conf);
                if(conf){
                    $.post('response.php', { id: $(this).data("row-id"), action:'delete'}
                        , function(){
                            // when ajax returns (callback),
                            $("#employee_grid").bootgrid('reload');
                        });
                    //$(this).parent('tr').remove();
                    //$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                }
            });
        });

        function ajaxAction(action) {
            data = $("#frm_"+action).serializeArray();
            console.log(data);
            $.ajax({
                type: "POST",
                url: "response.php",
                data: data,
                dataType: "json",
                success: function(response)
                {
                    $('#'+action+'_model').modal('hide');
                    $("#employee_grid").bootgrid('reload');
                }
            });
        }

        $( "#command-add" ).click(function() {
            $('#add_model').modal('show');
        });
        $( "#btn_add" ).click(function() {
            ajaxAction('add');
        });
        $( "#btn_edit" ).click(function() {
            ajaxAction('edit');
        });

    });
</script>

</body>
</html>


