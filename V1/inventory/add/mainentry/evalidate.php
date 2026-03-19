<script>

$(function(){
//clear form contents
//hide computer related elements for other devices
clear_form()

var datatype= "json";
var idval = document.getElementById("cid").innerHTML;

$.getJSON("add/mainentry/php_functions.php?f=populate_all&deviceid="+idval,function(data){
//---------------------------------------------------------------------------------------------------
var cat_value = $("#cat").html();

//append values to select box
 $('#category').append('<option value="' + data.scategory + '">' + data.scategory + '</option>');
 $('#model').append('<option value="' + data.mmodel + '">' + data.mmodel + '</option>');
 $('#office').append('<option value="' + data.ooffice + '">' + data.ooffice + '</option>');
 $('#project').append('<option value="' + data.pproject + '">' + data.pproject + '</option>');
//---------------------------------------------------------------------------------------------------

$("#equipment").val(data.equipment_type);
//$("#category").val(data.scategory);
$("#acode").val(data.asset_code);
$("#sno").val(data.serial_no);
$("#make").val(data.mmake);
//$("#model").val(data.mmodel);
$("#omodel").val(data.oomodel);
$("#issued").val(data.dissued);
$("#ram").val(data.rram);
$("#processor").val(data.pprocessor);
$("#cpuspeed").val(data.ccpuspeed);
$("#project").val(data.pproject);
$("#custodian").val(data.ccustodian);
$("#office option:selected").text(data.oofice);
//$("#office").val(data.oofice);
$("#device_name").val(data.dname);
$("#status").val(data.sstatus);
$("#comments").val(data.ccomments);
//hide elements 
if (data.equipment_type != "Computer"){ hide() }
});
});

//declare variables based on form data
function declare_variables()
{

var equipment = $("#equipment").val();
var category = $("#category").val();
var acode = $("#acode").val();
var sno = $("#sno").val();
var make = $("#make").val();
var model = $("#model").val();
var omodel = $("#omodel").val();
var issued = $("#issued").val();
var ram = $("#ram").val();
var processor = $("#processor").val();
var cpuspeed = $("#cpuspeed").val();
var project = $("#project").val();
var custodian = $("#custodian").val();
var office = $("#office").val();
var device_name = $("#device_name").val();
var status = $("#status").val();
var comments = $("#comments").val();
}

//hide/show other model textbox after model change 

function model_change()
{
var mod=$("#model").val();
if (mod=="Other")
{
show_omodel();
}else{
hide_omodel();
}
}
//end of new funtion 
function equiptype_onchange()
{
var equip=$("#equipment").val();
if (equip!="Computer")
{
hide();

}else{
show();
}
}

//data validation
//check asset code
function equipment_validate()
{
var equipment = $("#equipment").val();
var acode = $("#acode").val();
var cpuspeed = $("#cpuspeed").val();

if (equipment =="" || equipment ==null || acode.length!==7 || acode=="" || acode ==null || cpuspeed > 8)
{  
//alert("Please select device type and make sure asset code is valid!");
return false;
}
}

function populate_subcategory()
{
//populate category combo
var val = $('#equipment').val();
$("#category").val('');
$.get("add/mainentry/php_functions.php?f=populate_subcategory&equipment="+val, function(data){

$("#category").html(data);
});
}

//populate model
function populate_model()
{
//populate category combo
var devicetype = $('#equipment').val();
var category = $("#category option:selected").text();
var make = $('#make').val();
$.get("add/mainentry/php_functions.php?f=populate_model&devicetype="+devicetype+"&category="+category+"&make="+make, function(data){

$("#model").html(data);
});
}

//submit data
function equip_submit()
{ 
//declare variables
var equipment = $("#equipment").val();
var category = $("#category").val();
var acode = $("#acode").val();
var sno = $("#sno").val();
var make = $("#make option:selected").text();
var model = $("#model option:selected").text();
var omodel = $("#omodel").val();
var issued = $("#issued").val();
var ram = $("#ram option:selected").text();
var processor = $("#processor option:selected").text();
var cpuspeed = $("#cpuspeed").val();
var project = $("#project option:selected").text();
var custodian = $("#custodian option:selected").text();
var office = $("#office option:selected").text();
var device_name = $("#device_name").val();
var status = $("#status option:selected").text();
var comments = $("#comments").val();
//validate asset code
if (equipment_validate()==false)
{
alert("Invalid entry, please check the following: \n - Device type \n - Asset code \n - Make \n - CPU speed");
}
else{
//submit data
//confirm entry for new record
if(confirm("Submit new record?") )
$.post('add/mainentry/php_functions.php?f=submit&equipment='+equipment+'&category='+category+'&acode='+acode+'&sno='+sno+'&make='+make+'&model='+model+'&omodel='+omodel+'&issued='+issued+'&ram='+ram+'&processor='+processor+'&cpuspeed='+cpuspeed+'&project='+project+'&custodian='+custodian+'&office='+office+'&device_name='+device_name+'&status='+status+'&comments='+comments,function(result){

//display error message
alert(result);
//clear form contents
clear_form()
});
}
}

function other_model()
{
var other_model = prompt ("Enter other model");
$("#model").val(other_model);

///
  $(this).val(other_model);
} 



function clear_form()
{
//clear contents
$("#equipment").val('');
$("#category").val('');
$("#acode").val('');
$("#sno").val('');
$("#make").val('');
$("#model").val('');
$("#omodel").val('');
$("#issued").val('');
$("#ram").val('');
$("#processor").val('');
$("#cpuspeed").val('');
$("#project").val('');
$("#custodian").val('');
$("#office").val('');
$("#device_name").val('');
$("#status").val('');
$("#comments").val('');
}

//update record
function update()
{ 
//var deviceid = document.getElementById("cid").innerHTML;
var deviceid = $("#cid").html()
//alert(deviceid);
//declare variables
var equipment = $("#equipment").val();
var category = $("#category option:selected").text();
var acode = $("#acode").val();
var sno = $("#sno").val();
var make = $("#make option:selected").text();
var model = $("#model option:selected").text();
var omodel = $("#omodel").val();
var issued = $("#issued").val();
var ram = $("#ram").val();
var processor = $("#processor option:selected").text();
var cpuspeed = $("#cpuspeed").val();
var project = $("#project option:selected").text();
var custodian = $("#custodian option:selected").text();
var office = $("#office option:selected").text();
var device_name = $("#device_name").val();
var status = $("#status").val();
var comments = $("#comments").val();

//validate asset code
if (equipment_validate()==false)
{
alert("Please select device type and make sure asset code is valid!");
}
else{
	//submit data
if(confirm("are you sure you want to update this record?"))
$.post('add/mainentry/php_functions.php?f=update&deviceid='+deviceid+'&equipment='+equipment+'&category='+category+'&acode='+acode+'&sno='+sno+'&make='+make+'&model='+model+'&omodel='+omodel+'&issued='+issued+'&ram='+ram+'&processor='+processor+'&cpuspeed='+cpuspeed+'&project='+project+'&custodian='+custodian+'&office='+office+'&device_name='+device_name+'&status='+status+'&comments='+comments,function(result){

//display error message
alert(result);
//clear form contents
clear_form()
});
}
}

function del()
{
var deviceid = $("#cid").html()
if(confirm("Are you sure you want to delete record?") )

$.post('add/mainentry/php_functions.php?f=del&deviceid='+deviceid,function(result){
//display error message
alert(result);
});

//alert("Record deleted!");
}

//hide textboxes for non-computer equipment
function hide()
{
document.getElementById("ram").disabled=true;
document.getElementById("processor").disabled=true;
document.getElementById("cpuspeed").disabled=true;
document.getElementById("device_name").disabled=true;
}

//show computer related 
function show()
{
document.getElementById("ram").disabled=false;
document.getElementById("processor").disabled=false;
document.getElementById("cpuspeed").disabled=false;
document.getElementById("device_name").disabled=false;
}

function logs()
{
//populate category combo
var idval = document.getElementById("cid").innerHTML;
$("#logs").val('');
$.get('add/mainentry/php_functions.php?f=logs&deviceid='+idval,function(data){

//alert (data);
$("#logs").html(data);
});
}
//show other model textbox
function show_omodel()
{
document.getElementByID("omodel").disabled=false;
}
//hide other model textbox
function hide_omodel()
{
document.getElementById("omodel").disabled=true;
}
//populate \links

function populate_links()
{
var acode =$("#acode").val();
//alert(acode);
//$.get("../../docs/links.php?f=populate_links&acode="+acode,function(data){
$.get("add/mainentry/links.php?f=populate_links&acode="+acode,function(data){ 
//alert(data);
document.getElementById("dcs").innerHTML =data;
//$("dcs").html("123450977");
});
}


function test(){
alert("Oooops!");
}
</script>


