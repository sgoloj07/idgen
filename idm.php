<?php
// page.php

// Fetch GET parameters with fallback values
$name = isset($_GET['name']) ? $_GET['name'] : '';
$cardNumber = isset($_GET['cardNumber']) ? $_GET['cardNumber'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$jobTitle = isset($_GET['jobTitle']) ? $_GET['jobTitle'] : '';
$address = isset($_GET['address']) ? $_GET['address'] : '';
$SSSnumber = isset($_GET['SSSnumber']) ? $_GET['SSSnumber'] : '';
$PHICnumber = isset($_GET['PHICnumber']) ? $_GET['PHICnumber'] : '';
$birthday = isset($_GET['birthday']) ? $_GET['birthday'] : '';
$cpicname = isset($_GET['cpicname']) ? $_GET['cpicname'] : '';
$cpicnumber = isset($_GET['cpicnumber']) ? $_GET['cpicnumber'] : '';
$validity = isset($_GET['validity']) ? $_GET['validity'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>GVM ID Card Generator</title>
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #f4f4f4;
            padding: 1em;
            text-align: center;
        }
        .container {
            padding: 1em;
        }
        .form-element {
            margin-bottom: 1em;
        }
        .form-label {
            display: block;
            margin-bottom: 0.5em;
        }
        .form-element input {
            width: 100%;
            padding: 0.5em;
            box-sizing: border-box;
        }
        button {
            padding: 0.5em 1em;
            margin: 0.5em 0;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 0.25em;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .id-card-container {
            margin-top: 1em;
        }
        .card-wrapper {
            position: relative;
            width: 100%;
            max-width: 432px;
            margin: 0 auto;
        }
        .card-container {
            width: 100%;
            height: auto;
        }
        .card-wrapper img {
            width: 100%;
            height: auto;
        }
        @media (max-width: 600px) {
            .card-wrapper {
                width: 100%;
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            // Function to generate the ID card with the updated values
            function generateCard() {
                var name = $('#name').val();
                var cardNumber = $('#cardNumber').val();
                var location = $('#location').val();
                var jobTitle = $('#jobTitle').val();
                var address = $('#address').val();
                var SSSnumber = $('#SSSnumber').val();
                var PHICnumber = $('#PHICnumber').val();
                var birthday = $('#birthday').val();
                var cpicname = $('#cpicname').val();
                var cpicnumber = $('#cpicnumber').val();
                var validity = $('#validity').val();

                $('.name').text(name);
                $('.cardNumber').text(cardNumber);
                $('.location').text(location);
                $('.jobTitle').text(jobTitle);
                $('.address').text(address);
                $('.SSSnumber').text(SSSnumber);
                $('.PHICnumber').text(PHICnumber);
                $('.birthday').text(birthday);
                $('.cpicname').text(cpicname);
                $('.cpicnumber').text(cpicnumber);
                $('.validity').text(validity);
            }

            // Bind generateCard function to input changes
            $('#name, #cardNumber, #location, #jobTitle, #address, #SSSnumber, #PHICnumber, #birthday, #cpicname, #cpicnumber, #validity').on('input', generateCard);

            // Save button functionalities
            $('#btnSave2').on('click', function() {
                var captureElem = $('#gencardF')[0];
                var originalBackground = captureElem.style.backgroundImage;
                captureElem.style.backgroundImage = "url('./images/canvas.png')";
                html2canvas(captureElem).then(function(canvas) {
                    captureElem.style.backgroundImage = originalBackground;
                    var link = document.createElement('a');
                    var textValue = $('#cardNumber').val();
                    link.download = textValue + "_front.png";
                    link.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                    link.click();
                });
            });

            $('#btnSave1').on('click', function() {
                var captureElem = $('#gencardB')[0];
                var originalBackground = captureElem.style.backgroundImage;
                captureElem.style.backgroundImage = "url('./images/back.png')";
                html2canvas(captureElem).then(function(canvas) {
                    captureElem.style.backgroundImage = originalBackground;
                    var link = document.createElement('a');
                    var textValue = $('#cardNumber').val();
                    link.download = textValue + "_back.png";
                    link.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                    link.click();
                });
            });

            $('#btnSave3').on('click', function() {
                html2canvas($('#gencardFB')[0]).then(function(canvas) {
                    var link = document.createElement('a');
                    var textValue = $('#cardNumber').val();
                    link.download = textValue + "_both.png";
                    link.href = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                    link.click();
                });
            });

            // Initialize the form with existing data
            generateCard();
        });
    </script>
</head>
<body>
    <header>
        <h1>GVM ID Card Generator</h1>
        <input type="button" value="E-PER ID" onclick="window.location.href='id2.php'" class="button">
    </header>
    <div class="container">
        <div class="section-container">
            <div class="text-center">Input Form</div>
            <form onsubmit="return false">
                <table style="width: 100%; border-spacing: 1em;">
                    <tr>
                        <td>
                            <div class="form-element">
                                <label class="form-label">Enter Name:</label>
                                <input type="text" id="name" value="<?php echo htmlspecialchars($name); ?>"/>
                            </div>
                            <div class="form-element">
                                <label class="form-label">Enter ID No:</label>
                                <input type="text" id="cardNumber" value="<?php echo htmlspecialchars($cardNumber); ?>"/>
                            </div>
                            <div class="form-element">
                                <label class="form-label">Enter Company Assignment:</label>
                                <input type="text" id="location" value="<?php echo htmlspecialchars($location); ?>"/>
                            </div>
                            <div class="form-element">
                                <label class="form-label">Enter Job Title:</label>
                                <input type="text" id="jobTitle" value="<?php echo htmlspecialchars($jobTitle); ?>"/>
                            </div>
                            <div class="form-element">
                                <label class="form-label">Address:</label>
                                <input type="text" id="address" value="<?php echo htmlspecialchars($address); ?>"/>
                            </div>
                            <button onclick="generateCard()">Generate Card</button>
                        </td>
                        <td>
                            <div class="form-element">
                                <label class="form-label">SSS No.:</label>
                                <input type="text" id="SSSnumber" value="<?php echo htmlspecialchars($SSSnumber); ?>"/>
                            </div>
                            <div class="form-element">
                                <label class="form-label">PHIC No.:</label>
                                <input type="text" id="PHICnumber" value="<?php echo htmlspecialchars($PHICnumber); ?>"/>
                            </div>
                            <div class="form-element">
                                <label class="form-label">Validity:</label>
                                <input type="text" id="validity" value="<?php echo htmlspecialchars($validity); ?>"/>
                            </div>
                            <div class="form-element">
                                <label class="form-label">Date of Birth:</label>
                                <input type="text" id="birthday" value="<?php echo htmlspecialchars($birthday); ?>"/>
                            </div>
                            <div class="form-element">
                                <label class="form-label">Name of ID Picture:</label>
                                <input type="text" id="cpicname" value="<?php echo htmlspecialchars($cpicname); ?>"/>
                            </div>
                            <div class="form-element">
                                <label class="form-label">ID Picture No.:</label>
                                <input type="text" id="cpicnumber" value="<?php echo htmlspecialchars($cpicnumber); ?>"/>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="button" id="btnSave2" value="Save Front" />
                            <input type="button" id="btnSave1" value="Save Back" />
                            <input type="button" id="btnSave3" value="Save Front & Back" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="id-card-container">
        <div id="gencardF" class="card-wrapper">
            <div class="card-container">
                <img src="./images/cardfront.png" alt="Card Front" />
                <div class="name"></div>
                <div class="cardNumber"></div>
                <div class="location"></div>
                <div class="jobTitle"></div>
                <div class="address"></div>
                <div class="SSSnumber"></div>
                <div class="PHICnumber"></div>
                <div class="birthday"></div>
                <div class="cpicname"></div>
                <div class="cpicnumber"></div>
                <div class="validity"></div>
            </div>
        </div>
        <div id="gencardB" class="card-wrapper">
            <div class="card-container">
                <img src="./images/cardback.png" alt="Card Back" />
                <!-- Additional content for the back of the card -->
            </div>
        </div>
        <div id="gencardFB" class="card-wrapper">
            <div class="card-container">
                <img src="./images/cardfront.png" alt="Card Front" />
                <!-- Content for combined front and back -->
                <img src="./images/cardback.png" alt="Card Back" />
            </div>
        </div>
    </div>
</body>
</html>
