<?php
@session_start();
//ini_set('display_errors',true);
include_once("../include/common.php");
?>
<?php  include('js_functions.php'); ?>

<?php
$errorMSG = "";
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("pdf","jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a PDF,JPEG or PNG file.";
         header("Refresh:5");
      }
      
     // if($file_size > 5097152) {
       //  $errors[]='File size must be excately 2 MB';
     // }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>

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

<div class="fileup">
<form action="" method="POST" enctype= "multipart/form-data">
<label>File: </label><input type="file" name="image" id="img"/><input type="submit" value="..upload file" id="uf" /><br><br>
</form>
</div>
<hr>
<br>
<label> Date: </label><input type="date" name="issued" id="dt" size="8"/>
<label for "type">Type:</label>
<select id="type">
<option value="Staff Allocation">Staff Allocation</option>
<option value="New Stock">New Stock</option>
<option value="N/A">NA</option>
<option value="" selected></option>
</select>

<label for "file">File:</label>
<select id="file">
<option value="New Equipment">New Equipment</option>
<option value="Laptops">Laptops</option>
<option value="N/A">N/A</option>
<option value="" selected></option>
</select>





<br><br>
<label>A/Code(s):</label><textarea id="acode" rows="2" cols="100" placeholder="0900000,0900001"></textarea><br><br>
<textarea id="description" rows="8" cols="100" placeholder="description" ></textarea>
<div class ="database">
<br><br>
<input type="submit" value="submit" id="subfile" onclick="upload()"/> <input type="reset" value="reset" id="clear" onclick="clear_upload()"/>
</div>

<hr>
</div>
<input type="text" size="150" value="<?php echo $_FILES['image']['name'];  ?>" id="fn"/>
<div class="foot">
<ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
</body>

</html>
