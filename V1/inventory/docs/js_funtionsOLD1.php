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
$.post('upload.php?f=upload&ref='+ref+'&dates='+issued+'&codes='+code,function(result){
alert(result);
$("#dt").val('');
$("#acode").val('');
});
}
}/*end of main  */



</script>

