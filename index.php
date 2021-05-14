<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tasty Pill</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="./plugins/dist/min/dropzone.min.js"></script>
    <script src="./js/html2canvas.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Styles -->
    <link href="./plugins/dist/min/dropzone.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat';
        }

        #bodyBorder {
            border-style: dashed; 
            border-color: #667093;
            border-radius: 5px;
            border-width: 3px;
        }

        #previewFile {
            border-style: dashed; 
            border-color: #667093;
            border-radius: 5px;
            border-width: 3px;
        }

        #errorContainer {
            background-color: #E6BABC;
            border-style: dashed; 
            border-color: #BC2023;
            border-radius: 5px;
            border-width: 3px;
            opacity: 1;
        }

        .padding-100 {
            padding: 100px;
            background-color: #625775;
        }

        .submit-btn {
            width: 260px; 
            height: 60px; 
            background-color: #807790;
        }

        .btn-text {
            font-size: 24px; 
            font-weight: bolder;
        }

        .btn-style {
            background-color: #625775; 
            border-color: #625775; 
            color: white;
        }

        .input-prepend {
            border: none; 
            background-color: #EEF1FC; 
            border-right: solid #CCD1E2 4px;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .input-button {
            border: none; 
            background-color: #EEF1FC; 
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .input-style {
            height: 50px; 
            background-color: #EEF1FC; 
            border: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white p-4">
            <div class="container">
                <a class="navbar-brand" href="https://build.tastypill.com/tasty-pill">
                    <img src="./images/logo.jpeg" width="200">
                </a>
            </div>
        </nav>

        <main>
            <div class="row padding-100">
                <div class="col-6 m-auto" id="dropzone">
                    <div class="card p-3 text-center" id="previewTemplate" style="background-color: #F7F6F8">
                        <div class="card-body" id="bodyBorder">
                            <img class="img-fluid mt-4 default-img" src="./images/body.png">
                        </div>

                        <div class="card-body" id="previewFile" style="display: none;">
                        </div>

                        <div class="card-body" id="errorContainer" style="display: none;">
                            <img class="img-fluid mt-4" src="./images/error.png">
                        </div>
                    </div>
                </div>

                <div class="col-8 m-auto" id="success" style="display: none">
                    <div class="card p-3" style="background-color: #F7F6F8">
                        <div class="row" id="container">
                            <div class="col-7 p-5">
                                <h3 style="color: #695E7C; font-size: 20px; font-weight: bolder;">
                                    <span class="fa fa-chevron-left" ></span> <a href="https://build.tastypill.com/tasty-pill" style="color: #695E7C;"> BACK</a>
                                </h3>

                                <h4 class="mt-5">Your App is ready</h4>

                                <div class="input-group mb-1 mt-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text p-3 input-prepend" id="basic-addon1"><span class="fa fa-link"></span></span>
                                    </div>

                                    <input type="text" class="form-control input-style" id="link-input" aria-describedby="basic-addon1">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-button">
                                            <button class="btn btn-info btn-style" id="copy-btn">Copy</button>
                                        </span>
                                    </div>
                                </div>

                                <span style="color: #8089A6">Copy this link and send it to anyone.</span>
                            </div>

                            <div class="col-5 text-center" id="qrContainer">
                                <section>;
                                    <img id="qrImage" class="img-fluid" src="https://www.diawi.com/qrcode/link/ZykMAZ">

                                    <a class="btn mt-4 btn-style" id="qrLink" href="#">DOWNLOAD PNG
                                    </a>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center p-4" id="btnContainer">
                    <button class="btn btn-secondary btn-xl submit-btn btn-text" id="submit" disabled>
                        UPLOAD GAME
                    </button>
                </div>
            </div>

            <div id="tpl" style="display: none; visibility: hidden;">
                <div class="dz-preview dz-file-preview" style="padding: 100px;">
                    <div class="dz-details">
                        <div class="dz-filename" style="text-align: left; font-size: 15px; margin-bottom: 10px;">
                            <span data-dz-name style="font-weight: bolder;"></span>
                        </div>
                    </div>

                    <div>
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="margin-bottom: 10px;">
                            <div class="progress-bar progress-bar-success bg-success" style="width:0%;" data-dz-uploadprogress>  
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 text-left" style="font-size: 13px;">
                                <p class="dz-size" data-dz-size></p>
                            </div>
                            <div class="col-8 text-right" style="font-size: 15px;">
                                <p class="progress-text text-right"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>    
        Dropzone.autoDiscover = false;

        var processing = false;

        var myDropzone = new Dropzone("#dropzone", { 
            url: "https://build.tastypill.com/tasty-pill/uploadRequest.php",
            autoProcessQueue: false,
            clickable: '#previewTemplate',
            previewsContainer: "#previewFile",
            previewTemplate: document.querySelector('#tpl').innerHTML,
            maxFilesize: 50,
            timeout: 360000,
            maxFiles: 1,
            acceptedFiles: ".apk, .ipa",
        });

        document.getElementById("submit").addEventListener("click", function() {
            myDropzone.processQueue();

            var x = document.getElementsByClassName("dz-hidden-input")[0];

            x.disabled = true;
        });

        document.getElementById("qrLink").addEventListener("click", function(ev) {
            ev.preventDefault();

            html2canvas(document.body, {allowTaint: true, useCORS: true}).then(function(canvas) {
                var link = document.createElement("a");
                document.body.appendChild(link);
                link.download = "qrcode.jpg";
                link.href = canvas.toDataURL("image/jpg");
                link.target = '_blank';
                link.click();
            });
        });

        document.getElementById("copy-btn").addEventListener("click", function() {
            var copyText = document.getElementById("link-input");

            copyText.select();
            copyText.setSelectionRange(0, 99999);

            document.execCommand("copy");

            document.getElementById("copy-btn").innerHTML = "Copied";
            document.getElementById("copy-btn").style.backgroundColor = "#4BB541";
            document.getElementById("copy-btn").style.borderColor = "#4BB541";
        });

        myDropzone.on("addedfile", function(file) {
            let rawFile = file.name;
            let extension = rawFile.split('.').pop();
            let element;

            if ( extension != "apk" && extension != "ipa" ) {
                document.getElementById("bodyBorder").style.display = "none";
                document.getElementById("previewFile").style.display = "none";
                document.getElementById("errorContainer").style.display = "block";
                myDropzone.removeFile(file);
            } else {
                document.getElementById("bodyBorder").style.display = "none";
                document.getElementById("errorContainer").style.display = "none";
                document.getElementById("previewFile").style.display = "block";
                document.getElementById("submit").disabled = false;
            }
        });

        myDropzone.on("processing", function(file) {
            document.getElementById("submit").disabled = true;
            document.getElementById("submit").innerHTML = "Processing...";

            processing = true;
        });

        myDropzone.on("error", function(file, errorMessage, xhr) {
            var els = document.getElementsByClassName('dz-error');

            for(var i = 0; i < els.length; i++) { 
                els[i].style.display='none'
            }

            if ( els.length <= 1 && !processing ) {
                document.getElementById("bodyBorder").style.display = "none";
                document.getElementById("previewFile").style.display = "none";
                document.getElementById("errorContainer").style.display = "block";
                myDropzone.removeFile(file);
            }

            if ( processing ) {
                alert('Something went wrong with the upload, please refresh the page.')
            }
        });

        myDropzone.on("success", function(file, response) {
            document.getElementById("dropzone").style.display = "none";
            document.getElementById("success").style.display = "block";
            document.getElementById("btnContainer").style.display = "none";

            let data = JSON.parse(response);

            document.getElementById("link-input").value = data.link;
            document.getElementById("qrLink").href = data.qrcode;
            document.getElementById("qrLink").download = data.qrcode;
            document.getElementById("qrImage").src = data.qrcode;
        })

        myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("token", "eTtlCMcFDVP8IOzSmywWMa92WBKTbsJsZ79SWhWGKL");
        });

        myDropzone.on("uploadprogress", function(file, progress, bytesSent) {
            progress = progress.toFixed(0)

            document.querySelector(".progress-bar").style.width = progress + "%";
            $(".progress-text").text("uploading " + progress + "%");

            if ( progress == 100 ) {
                $(".progress-text").text(progress + "% Complete");
                $(".progress-text").css("color", "#4CB543");
            }
        })

    </script>
</body>
</html>
