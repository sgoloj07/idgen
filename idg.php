<?php
// page.php

// Suppose you have received some data from the address bar using $_GET
if (isset($_GET['name'])) {
	$name = $_GET['name'];
} else {	
	$name = '';
}
if (isset($_GET['cardNumber'])) {
	$cardNumber = $_GET['cardNumber'];
} else {
	$cardNumber = '';
}
if (isset($_GET['location'])){
	$location = $_GET['location'];
} else {
	$location = '';
}
if (isset($_GET['jobTitle'])){
	$jobTitle = $_GET['jobTitle'];
} else {
	$jobTitle = '';
}
if(isset($_GET['address'])){
	$address = $_GET['address'];
} else {
	$address = '';
}
if(isset($_GET['SSSnumber'])){
	$SSSnumber = $_GET['SSSnumber'];
} else {
	$SSSnumber = '';
}
if(isset($_GET['PHICnumber'])){
	$PHICnumber = $_GET['PHICnumber'];
} else {$PHICnumber = '';}
if(isset($_GET['birthday'])){
	$birthday = $_GET['birthday'];
} else {
	$birthday = '';
}
if(isset($_GET['cpicname'])){
	$cpicname = $_GET['cpicname'];
} else {
	$cpicname = '';
}
if(isset($_GET['cpicnumber'])){
	$cpicnumber = $_GET['cpicnumber'];
} else {
	$cpicnumber = '';
}
if(isset($_GET['validity'])){
    $validity = $_GET['validity'];
} else {
    $validity = '';
}
?>


<html>
    <head>
        <title>
            GVM ID Card generator
        </title>
        <link rel="stylesheet" href="./css/index.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
		<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/date-fns@2.27.0"></script>
		<link rel="stylesheet" href="css/pikaday.css">
		<script type="text/javascript">
		///////////FRONT//////////////
		$(document).ready(function() {
		  $('#btnSave2').on('click', function() {
			var captureElem = $('#gencardF')[0];
        
			// Temporarily set background image style
			var originalBackground = captureElem.style.backgroundImage;
			captureElem.style.backgroundImage = "url('./images/canvas.png')";

			html2canvas(captureElem).then(function(canvas) {
			  // Restore original background image style
			  captureElem.style.backgroundImage = originalBackground;
			  var link = document.createElement('a');
			  	var textValue = $('#cardNumberr').text();
				console.log(textValue);
				
			  link.download = textValue + ".png";
			  link.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
			  link.click();
			});
		  });
		});
			///////////BACK//////////////
		$(document).ready(function() {
		  $('#btnSave1').on('click', function() {
			var captureElem = $('#gencardB')[0];
        
			// Temporarily set background image style
			var originalBackground = captureElem.style.backgroundImage;
			captureElem.style.backgroundImage = "url('./images/back.png')";

			html2canvas(captureElem).then(function(canvas) {
			  // Restore original background image style
			  captureElem.style.backgroundImage = originalBackground;
			  var link = document.createElement('a');
			  	var textValue = $('#cardNumberr').text();
				console.log(textValue);
				
			  link.download = textValue + ".png";
			  link.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
			  link.click();
			});
		  });
		});
		///////////FRONTBACK//////////////
		$(document).ready(function() {
		  $('#btnSave3').on('click', function() {
			html2canvas($('#gencardFB')[0]).then(function(canvas) {
			  var link = document.createElement('a');
				var textValue = $('#cardNumberr').text();
				console.log(textValue);
				
			  link.download = textValue + ".png";
			  link.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
			  link.click();
			});
		  });
		});
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js">
		</script><script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

    </head>
    <body>		
        <header class="text-center">
                <h1>GVM ID Card generator</h1>
				<input type="button" value="E-PER ID" onclick="window.location.href='id2.php'" class="button"><br>
        </header>			
        <div class="container">
            <div class="section-container">

                <div class="text-center">
                    Input form
                </div>
                <form onsubmit="return false" action="page.php" method="GET">
				<table size="100%">
				<tr>
				<td>
                    <div class="form-element">
                        <label class="form-label">
                            Enter Name:
                        </label>
                        <input type="text" id="name" oninput="generateCard()" value="<?php echo htmlspecialchars($name); ?>"/>
                    </div>
                    <div class="form-element">
                        <label class="form-label">
                            Enter ID No:
                        </label>
                        <input type="text" id="cardNumber" oninput="generateCard()" value="<?php echo htmlspecialchars($cardNumber); ?>"/>
                    </div>
                    <div class="form-element">
                        <label class="form-label">
                            Enter Company Assignment:
                        </label>
                        <input type="text" id="location" oninput="generateCard()" value="<?php echo htmlspecialchars($location); ?>"/>
                    </div>
					<div class="form-element">
                        <label class="form-label">
                            Enter Job Title:
                        </label>
                        <input type="text" id="jobTitle" oninput="generateCard()" value="<?php echo htmlspecialchars($jobTitle); ?>"/>
                    </div>
					<div class="form-element">
                        <label class="form-label">
                            Address
                        </label>
                        <input type="text" id="address" oninput="generateCard()" value="<?php echo htmlspecialchars($address); ?>"/>
                    </div>
                    <button onclick="generateCard()">Generate Card</button>
				</td>
				<td>
					<div class="form-element">
                        <label class="form-label">
                            SSS No.
                        </label>
                        <input type="text" id="SSSnumber" oninput="generateCard()" value="<?php echo htmlspecialchars($SSSnumber); ?>"/>
                    </div>
					<div class="form-element">
                        <label class="form-label">
                            PHIC No.
                        </label>
                        <input type="text" id="PHICnumber" oninput="generateCard()" value="<?php echo htmlspecialchars($PHICnumber); ?>"/>
                    </div>
					<div class="form-element">
                        <label class="form-label">
                            Validity
                        </label>
                        <input type="text" id="validity" oninput="generateCard()" value="<?php echo htmlspecialchars($validity); ?>"/>
						
                    </div>
					<div class="form-element">
                        <label class="form-label">
                            Birthdate
                        </label>
                        <input type="text" id="birthday" oninput="generateCard()" value="<?php echo htmlspecialchars($birthday); ?>"/>
                    </div>
					<div class="form-element">
                        <label class="form-label">
                            Contact Person
                        </label>
                        <input type="text" id="cpicname" oninput="generateCard()" value="<?php echo htmlspecialchars($cpicname); ?>"/>
                    </div>
					<div class="form-element">
                        <label class="form-label">
                            Contact Person Number
                        </label>
                        <input type="text" id="cpicnumber" oninput="generateCard()" value="<?php echo htmlspecialchars($cpicnumber); ?>"/>
                    </div>
					
				</td>
				</tr>
				<tr>
				<td>
				<input type="button" id="btnSave2" value="Save Front" />
				<input type="button" id="btnSave1" value="Save Back" />
				<input type="button" id="btnSave3" value="Save Front/Back" />
				<button onclick="advanced1()"/>Print Front</button>
				<button onclick="advanced2()"/>Print Back</button>
				</td>
				</tr>
				</form>
				</table>
            </div> 
			
            <div class="section-container">
                <div class="id-card-container">
				<div id="collegeCard">
                    <div class="text-center">
                        Generated Card
                    </div>
					<table size="100%"  id="gencardFB">
					<tr>
					<td>
                    <div class="card-containerses">

						                        
						<div class="card-wrapper" style="width: 432px; height:739.2px;">
							<img src='./images/canvas.png' style='z-index:-1; position: absolute;'>   
							<div class="row" id="gencardF">
							<div class='cardcontainers' style='z-index:999;'>
							<span class=""></span>
							</div>
								<table border="0" style="margin-top:63px;">
								<tr>
									<td colspan="2" style="width:400px;height:70px;margin-left: 15px;margin-top:0px;"></td>
								</tr>
								<tr>
								<td colspan="2">
										<div class="user-card" style="width:180px;height:180px;">
										
										</div>
									</td>
									<td  style="height:155px;vertical-align: bottom;"></td>
								</tr>
								<tr>
									<td>
										<div class="user-card" style="width:145px;height:43px;margin-top:4px;margin-left:253px;">
											<span id="myIDNum" >
											<p  id="cardNumberr" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								<tr>
									<td  colspan="2" style="height:45px;vertical-align: bottom;"></td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td colspan="2">
										<div class="user-card" style="width:400px;height:55px;margin-left: 15px;margin-top:-15px;">
											<span >
											<p id="cardName" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								<tr>
									<td  colspan="2" style="height:30px;vertical-align: bottom;"></td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td colspan="2">
										<div class="user-card" style="width:400px;height:45px;margin-left: 15px;margin-top:-12px;">
											<span>
											<p id="cardjobTitle" style='font-size:22px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								<tr>
									<td  colspan="2" style="height:30px;vertical-align: bottom;"></td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td colspan="2">
										<div class="user-card" style="width:400px;height:55px;margin-left: 15px;margin-top:-15px;">
											<span>
											<p id="cardLocation" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								</table>								
							</div>
						</div>
                    </div>
					</td>
					<td>
					<div class="card-container" style="width: 432px; height:739.2px;" >
						                     
							
							<div class="card-wrapper" style="width: 432px; height:739.2px;">
							<img src='./images/back.png' style='z-index:-1; position: absolute;'>   
							<div class="row" id="gencardB">
							<div>
							<span class=""></span>
							</div>
								<table border="0" style="margin-top:63px;">
								<tr>
									<td colspan="2" style="width:400px;height:70px;margin-left: 15px;margin-top:0px;"></td>
								</tr>
								<tr>
								<td colspan="2">
										<div class="user-cards"  style="width:400px;height:50px;margin-left: 15px;margin-top:0px;">
											<span>
											<p id="cardSssdsSSnumber" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="width:400px;height:70px;margin-left: 15px;margin-top:0px;">
										<div class="user-cards" style="width:250px;height:40px;margin-left: 90px;margin-top:-4px;">
											<span>
											<p id="cardSSSnumber" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td colspan="2">
										<div class="user-cards" style="width:250px;height:40px;margin-left: 90px;margin-top:-10px;">
											<span>
											<p id="cardPHICnumber" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="user-cards" style="width:195px;height:40px;margin-left: 15px;margin-top:6px;">
											<span>
											<p id="cardvalidity" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
									<td>
										<div class="user-cards" style="width:195px;height:40px;margin-left: 0px;margin-top:6px;">
											<span>
											<p id="cardbirthday" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<div class="user-cards" style="width:400px;height:100px;margin-left: 15px;margin-top:10px;">
											<span>
											<p id="cardAddress" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								<tr>
									<td  colspan="2" style="height:25px;vertical-align: bottom;"></td>
								</tr>
								<tr>
									<td colspan="2">
										<div class="user-cards" style="width:400px;height:50px;margin-left: 15px;margin-top:10px;">
											<span>
											<p id="cardCPIC" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<div class="user-cards" style="width:320px;height:50px;margin-left: 55px;margin-top:5px;">
											<span>
											<p id="cardCPICNum" style='font-size:25px;text-align:center;'></p>
											</span>
										</div>
									</td>
								</tr>
								</table>
								<table>
								<div>
								<tr>
								</tr>
								<tr>
								</tr>
								</table>
								</div>
							</div>
						</div>
                    </div>
					</td>
					</tr>
					</table>
                </div>
				</div>
            </div>    
        </div>
        <script src="./js/index.js"></script>
		  <!-- printThis -->

  <script type="text/javascript" src="printThis.js"></script>

  <!-- demo -->
  <script>
	//front print
    function applyPrintStyles() {
      var element = document.getElementById('gencardF');
      element.classList.add('print-styles');
      return Promise.resolve();
    }

    function captureAndPrint() {
      var element = document.getElementById('gencardF');

      html2canvas(element).then(function(canvas) {
        var resizedCanvas = document.createElement('canvas');
        var resizedContext = resizedCanvas.getContext('2d');
        var scale = 0.49;

        resizedCanvas.width = canvas.width * scale;
        resizedCanvas.height = canvas.height * scale;

        resizedContext.drawImage(canvas, 0, 0, resizedCanvas.width, resizedCanvas.height);

        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write('<div style="display: flex;  justify-content: center;  align-items: center;margin-top:-7px;"><img src="' + resizedCanvas.toDataURL() + '"></div>');
        printWindow.document.close();

        element.classList.remove('print-styles');

        printWindow.onload = function() {
          printWindow.print();
		  printWindow.close();
        };
      });
    }

    function advanced1() {
      applyPrintStyles().then(function() {
        setTimeout(captureAndPrint, 100);
      });
    }
	//back print
	
	
    function applyPrintStyles2() {
      var element = document.getElementById('gencardB');
      element.classList.add('print-styles');
      return Promise.resolve();
    }

    function captureAndPrint2() {
      var element = document.getElementById('gencardB');

      html2canvas(element).then(function(canvas) {
        var resizedCanvas = document.createElement('canvas');
        var resizedContext = resizedCanvas.getContext('2d');
        var scale = 0.49;

        resizedCanvas.width = canvas.width * scale;
        resizedCanvas.height = canvas.height * scale;

        resizedContext.drawImage(canvas, 0, 0, resizedCanvas.width, resizedCanvas.height);

        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write('<div style="display: flex; margin-top:-4px;  justify-content: center;  align-items: center;"><img src="' + resizedCanvas.toDataURL() + '"></div>');
        printWindow.document.close();

        element.classList.remove('print-styles');

        printWindow.onload = function() {
          printWindow.print();
		  printWindow.close();
        };
      });
    }
	 function advanced2() {
      applyPrintStyles2().then(function() {
        setTimeout(captureAndPrint2, 100);
      });
    }
  
    $('#basic').on("click", function () {
      $('.demo').printThis({
        base: "index.php"
      });
    });
	
  </script>
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114774247-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-114774247-1');
  </script>
    </body>
</html>