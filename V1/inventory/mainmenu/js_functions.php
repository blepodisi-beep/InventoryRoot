<script>

function search()
{

var search_id = $("#search").val();

$.get("mainmenu/php_functions.php?f=search&assetid="+search_id, function(data){

var final_id = data;
var len = final_id.length;
//alert(len);
//alert(final_id);

var tab_id = "inventory";

if (final_id == 0)
{
alert ("No matching records found!");
}

else
{

window.location.assign("index.php?id="+final_id);
window.location.assign("index.php?id="+final_id+"&tab_id="+tab_id);
}

});
}

</script>
