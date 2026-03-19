//submit details
$(document).ready(function(){

//clear form contents
$("#reset").click(function(){
$("#custodian_id").val('');
$("#title").val('');
$("#fname").val('');
$("#surname").val('');
$("#type").val('');
$("#depart_id").val('');
});

//code goes here
$("#csubmit").click(function(){

//declare variables


var uname = $("#custodian_id").val();
var usertitle = $("#title").val();
var firstname = $("#fname").val();
var lastname = $("#surname").val();
var ctype = $("#type").val();
var department = $("#depart_id").val();

var datastring = 'uname1=' +uname+ '&usertitle1=' +usertitle+ '&firstname1=' +firstname+ '&lastname1=' +lastname+ '&ctype1=' +ctype+ '&department1=' +department;

//validate username
if (uname=="" || uname==null || department =="" || department==null)
{
alert("Please enter usernamme / department!");
return false;
} else {


$.ajax({
type:"POST",
url:"add/custodian/csubmit.php",
data:datastring,
cache:false,
success:function(result){

alert(result);
//clear contents of the form
//$("#submit").click(function(){
$("#custodian_id").val('');
$("#title").val('');
$("#fname").val('');
$("#surname").val('');
$("#type").val('');
$("#depart_id").val('');

//close above form
//});
}
});
}
});
});

//data validation
//check asset code **/
function cust_id_validate()
{
var cust_id = $("#custodian_ID").val();
if (cust_id=="" || cust_id==null)
{
alert("Please enter usernamme!");
return false;
}

}


