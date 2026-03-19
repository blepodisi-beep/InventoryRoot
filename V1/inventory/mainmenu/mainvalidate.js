$(document).ready(function(){
$("#custodianform").hide();
$("#inventoryform").show(1000);
}
);

function selectform()
{
var selected = document.getElementById("search").value;
//alert (selected);
$("#inventoryform").hide(1000);

if (selected=="inventory")
{
$("#custodianform").hide();
$("#inventoryform").show(1000);
}

else if (selected =="custodian")
{
$("#inventoryform").hide();
$("#custodianform").show(1000);
}

else 
{
alert (selected+ "form is not ready");
$("#custodianform").hide();
$("#inventoryform").show(1000);
} 
}