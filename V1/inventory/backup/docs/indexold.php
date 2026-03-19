<?php
@session_start();
include_once("../include/common.php");
include("js_funtions.php");
?>


<!DOCType html>
<title>ORI Inventory  Upload</title>
</head>
<hr>
<script type="text/javascript" src="<?php echo $path; ?>javascripts/jQuery v1.11.1.js"></script>
</head>
<h1>upload documents</h1>

<body>
<h3>...(uploads documents into Inventory System)</h3>

<br></br>

<div>
<form action="upload.php" method= "POST" enctype= "multipart/form-data">
<label>File: </label><input type="file" name="image"/><br><br>
<label>Records:</label><input type="text" name="rrecords" size="100"><br>
<br>
<br>
<input type="submit"value="Submit" id="subfile" onclick="upload()"/> <input type="reset" value="Reset" id="clear"/>

<?php

echo "PATH= " .$path;
?>
<hr>
</form>
</div>
</body>
</html>
