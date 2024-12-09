/**
 * Function to populate values in card from form input
 */
function generateCard() {
    // Get value of Eployee name from form input 
    const nameElement = document.getElementById("name");
    const nameValue = nameElement.value; 
    // Assign the value of student name to generated card
    const cardNameElement = document.getElementById("cardName");
    cardNameElement.innerHTML = "<b>" + nameValue + "</b>";

    // Get value of Id Number from form input 
    const cardNumberValue = document.getElementById("cardNumber").value;
    // Assign the value of college name to generated card
    document.getElementById("cardNumberr").innerHTML = "<b>" + cardNumberValue + "</b>";

    // Get value of Company Assignment name from form input 
    const locationValue = document.getElementById("location").value;
    // Assign the value of location name to generated card
    document.getElementById("cardLocation").innerHTML = "<b>" + locationValue + "</b>";

	    // Get value of Company Assignment name from form input 
    const jobTitleValue = document.getElementById("jobTitle").value;
    // Assign the value of location name to generated card
    document.getElementById("cardjobTitle").innerHTML = "<b>" + jobTitleValue + "</b>";

    // Get value of Job Title name from form input 
    const SSSnumberValue = document.getElementById("SSSnumber").value;
    // Assign the value of location name to generated card
    document.getElementById("cardSSSnumber").innerHTML = "<b>" + SSSnumberValue + "</b>";	

    // Get value of Job Title name from form input 
    const PHICnumberValue = document.getElementById("PHICnumber").value;
    // Assign the value of location name to generated card
    document.getElementById("cardPHICnumber").innerHTML = "<b>" + PHICnumberValue + "</b>";	

    // Get value of Job Title name from form input 
    const validityValue = document.getElementById("validity").value;
    // Assign the value of location name to generated card
    document.getElementById("cardvalidity").innerHTML = "<b>" + validityValue + "</b>";	

    // Get value of Job Title name from form input 
    const birthdayValue = document.getElementById("birthday").value;
    // Assign the value of location name to generated card
    document.getElementById("cardbirthday").innerHTML = "<b>" + birthdayValue + "</b></p>";	

    // Get value of Job Title name from form input 
    const CPICValue = document.getElementById("cpicname").value;
    // Assign the value of location name to generated card
    document.getElementById("cardCPIC").innerHTML = "<b>" + CPICValue + "</b></p>";	

    // Get value of Job Title name from form input 
    const AddressValue = document.getElementById("address").value;
    // Assign the value of location name to generated card
    document.getElementById("cardAddress").innerHTML = "<b>" + AddressValue + "</b></p>";	

    // Get value of Job Title name from form input 
    const CPICNum = document.getElementById("cpicnumber").value;
    // Assign the value of location name to generated card
    document.getElementById("cardCPICNum").innerHTML = "<b>" + CPICNum + "</b></p>";	
	
	// Get the value of Company Assignment name from the form input
    const barcValue = document.getElementById("barc").value;
    // Generate barcode with the entered text
    JsBarcode("#barcode", barcValue, { format: "CODE128", text: " ", fontSize: 6, height: 50, width: 3, font: "OCR-B"});
    document.getElementById("barCode").innerHTML = "<b>" + barcValue + "</b>";

    // Display final generated card to user     
    document.getElementById("collegeCard").setAttribute("style", "display: block;");
}

function generateCardss() {
  
  var element = document.getElementById("gencardF");
  if (element.style.backgroundImage === "none") {
    element.style.backgroundImage = "none";
  } else {
    element.style.backgroundImage = "url('../images/canvas.png')";;
  }
}
