
function contact_us(){
  var Contact_name = document.getElementById("Contact_name").value;
  var Contact_email = document.getElementById("Contact_email").value;
  var Contact_message = document.getElementById("Contact_message").value;

  if (Contact_name=="" || Contact_email==""){
    alert("Please fill your details");
    return false;
  }
  else{
    return true;
  }
}