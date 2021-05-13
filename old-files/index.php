<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<style type="text/css">
		.resbut{
			margin: 20px;
		}

		#maincontainer {
			margin-top: 50px;
		}

		#file {
			margin-bottom: 20px;
		}

		#btn1 {
			margin-right: 10px;
		}
	</style>
</head>
<body>



<div class="container" id="maincontainer">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Tastypill</h5>
                <div class="card-body">
                    <h5 class="card-title" id="card-title">Upload .apk or .ipa file here</h5>
                    	<div id="inputs">
							<input type="file" class="form-control-file" name="file" id="file" accept=".apk,.ipa">
							<button id="botun" class="btn btn-primary">Upload Game</button>
						</div>

						<div>
							<span class="result"></span>
							<img src='ajax-loader.gif' class="loader" style="display: none;">	
						</div>
                </div>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript">

$("#botun").click(function(){



var file_data = $('#file').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    $("#inputs").toggle();
    $(".loader").toggle();
    $("#card-title").html("Uploading file");
    $.ajax({
        url: 'uploadRequest.php',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
        	
            dataParsed = JSON.parse(php_script_response);
		    job = dataParsed["job"];
		    $("#card-title").html("Creating URL");
		    
		    
			completed = false;
	      	$.post("statusRequest.php",
		    {
		  		job: job
			},
			function(data2,status){
				data2Parsed = JSON.parse(data2);
				$("#card-title").html("Result");
				if(data2Parsed["status"] == 4000){
					$(".result").html(data2Parsed["message"]);
				}else {
					$(".result").html("<a class='btn btn-primary' id='btn1' href='"+data2Parsed["link"]+"'>Game Link</a><a class='btn btn-secondary' href='/'>Upload another game</a>");	
				}
				
				$(".loader").toggle();
			});
        }
    });
});



</script>
</body>
</html