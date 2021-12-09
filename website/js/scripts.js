function showUserResult(str) {
    if (str.length==0) {
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState == XMLHttpRequest.DONE) {
          console.log(xmlhttp.responseText);
          if(xmlhttp.responseText.includes("Username is already taken")){
              document.getElementById("validationUsername").setCustomValidity("Username is already in use");
          }
          if(xmlhttp.responseText.includes("Username is valid")){
              document.getElementById("validationUsername").setCustomValidity('');
          }
      }
  
    }
    xmlhttp.open("GET","inc/components/checkusername.php?username="+str, true);
    xmlhttp.send();
  }
  
  function showEmailResult(str) {
    if (str.length==0) {
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState == XMLHttpRequest.DONE) {
          console.log(xmlhttp.responseText);
          if(xmlhttp.responseText.includes("Email is already taken")){
              document.getElementById("validationEmail").setCustomValidity("Email is already in use");
          }
          if(xmlhttp.responseText.includes("Email is valid")){
              document.getElementById("validationEmail").setCustomValidity('');
          }
      }
  
    }
    xmlhttp.open("GET","inc/components/checkuseremail.php?email="+str, true);
    xmlhttp.send();
  }
  
  //Functions for calling modals (should be refactored):
function openLoginModal(){
  $('#loginModal').modal('toggle');
}