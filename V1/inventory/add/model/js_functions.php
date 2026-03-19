<script>

function model_clear(){
$("#modelname").val('');
$("#mmake").val('');
$("#mequiptype").val('');
$("#mcategory").val('');
$("#description").val(''); 
}

function subcategory()
{
$("#mcategory").val('');
var val = document.getElementById('mequiptype').value;
$.get("add/model/php_functions.php?f=subcategory&mequiptype="+val, function(data){
$("#mcategory").html(data);
});
}

function model_submit()
{ 
//declare variables
var modelname = $("#modelname").val();
var mmake = $("#mmake option:selected").text();
var mequiptype = $("#mequiptype").val();
var mcategory = $("#mcategory option:selected").text();
var description = $("#description").val();

if (modelname =="" || modelname ==null || mequiptype =="" || mequiptype ==null ){
alert("Please fill details for model , device and category");
return false;
}
else{
//submit data
$.post('add/model/php_functions.php?f=model_submit&modelname='+modelname+'&mmake='+mmake+'&mequiptype='+mequiptype+'&mcategory='+mcategory+'&description='+description,function(result){
alert(result);
$("#modelname").val('');
$("#mmake").val('');
$("#mequiptype").val('');
$("#mcategory").val('');
$("#description").val('');
});
}
}
</script>
