<script>

function clear_upload(){

$("#dt").val('');
$("#acode").val('');
$("#fn").val('');
$("#description").val('');
$("#type").val('');
$("#file").val('');
}

function validate(){
if(issued==""){
alert("Please select date");
return false;}

else if(code==""){
alert("Please enter related asset codes!");
return false;}

else if(filename==""){
alert("Please upload file!");
return false;}

else if(atype==""){
alert("Please select type of allocation!");
return false;}

else if(afile==""){
alert("Please select name of physical file !");
return false;}
}


function upload()
{
//declare variables
var issued  = $("#dt").val();
var code = $("#acode").val();
var ref=  $("#dt").val();
var fimg = $("#img").val();
var filename= $("#fn").val();
var desc = $("#description").val();
var atype = $("#type").val();
var afile = $("#file").val();
/**********************************************************************************************/
if(issued==""){
alert("Please select date");
return false;}

else if(code==""){
alert("Please enter related asset codes!");
return false;}

else if(filename==""){
alert("Please upload file!");
return false;}

else if(atype==""){
alert("Please select type of allocation!");
return false;}

else if(afile==""){
alert("Please select name of physical file !");
return false;}

else if(atype==""){
alert("Please select name of physical file !");
return false;}

else if(afile==""){
alert("Please select name of physical file !");
return false;}
/**********************************************************************************************/
else{


if(confirm("Submit new record?") ){

$.ajax({
   type: "POST",
   url: "upload.php",
   data: {date:issued, records:code, filep:filename,description:desc,type:atype,file:afile},
   success: function(result){
   alert(result);
   clear_upload()  
}
});
}/*end else */
}
}
/* end of main*/


</script>

