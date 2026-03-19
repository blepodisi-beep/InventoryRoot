<?php
@session_start();
//set_include_path('/web/html/inventory')
ini_set('display_errors',1);
echo 'Include Path:' .get_include_path();
//ini_set('display_errors',true);
include_once("../include/common.php");
?>
<?php  include('js_functions.php'); ?>

<!DOCTYPE html>
<title>ORI Inventory  Upload</title>
<head>
<hr>
<script type="text/javascript" src="<?php echo $path; ?>javascripts/jQuery v1.11.1.js"></script>
</head>
<h1>upload documents</h1>

<body>
<h3>...(uploads documents into Inventory System)</h3>

<br></br>

<div>
<form action="file.php" method="POST" enctype= "multipart/form-data">
<label>File: </label><input type="file" name="image" id="img"/><br><br>
<input type="submit" value="..upload file" id="uf" /><br><br>
</form>
<labe> Date: </label><input type="date" name="issued" id="dt" size="8"/><br><br>
<label>Asset Code(s):</label><input type="text" name="rrecords" id="acode" size="100"/><br>


<br><br>
<input type="submit" value="submit" id="subfile" onclick="upload()"/> <input type="reset" value="reset" id="clear" onclick="clear_upload()"/>


<hr>
<label><? echo $file_name; ?></label>
</div>
</body>
</html>
