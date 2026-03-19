<!DOCTYPE html>
<html lang="en">
<title>barcode scanner</title>
<div id="interactive" class="viewport">
<script src="https://cdn.rawgit.com/serratus/quaggaJS/0420d5e0/dist/quagga.min.js">



Quagga.init({           
        inputStream : {
	            name : "Live",
			                type : "LiveStream",
					            target: document.querySelector('#barcode-scanner'), 
             constraints: {
	                     width: 520,
				                     height: 400,                  
						                     facingMode: "user"  //"environment" for back camera, "user" front camera
								                     }               
	        },                         
		        decoder : {
			            readers : ["code_128_reader","code_39_reader"]
					            }

    }, function(err) {
        if (err) {
            esto.error = err;
            console.log(err);
                return
        }

        Quagga.start();

        Quagga.onDetected(function(result) {                              
                var last_code = result.codeResult.code;                   
                    console.log("last_code "); 
             });
    });

</script>
</div>
</html>
