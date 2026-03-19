<script>

function clear_upload(){

$("#dt").val('');
$("#acode").val('');
}


function upload()

{
//declare variables
var issued  = $("#dt").val();
var code = $("#acode").val();
var ref=  $("#dt").val();
var file = $("#img").val();
if (!file){
          alert("Please upload file");
          return false;
}
if(issued == ""||code==""){

alert("Please enter date issued and related records!");
return false;
}
else{
$.ajax({
   type: "POST",
   url: "upload.php",
   data: {reference:ref, date:issued, records:code},
   success: function(result){
   alert(result);
}
});
}/*end else */

}/*end of main  */
</script>

