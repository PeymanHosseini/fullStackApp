var check = function() {
  if (
    document.getElementById("password").value ==
    document.getElementById("confirm_password").value
  ) {
    document.getElementById("message").style.color = "green";
    document.getElementById("message").innerHTML = "matching";
    document.getElementById("submit").disabled = false;
  } else {
    document.getElementById("message").style.color = "red";
    document.getElementById("message").innerHTML = "not matching";
    document.getElementById("submit").disabled = true;
  }
};
var emptyfield = function() {
  if (
    document.getElementById("password").value == "" ||
    document.getElementById("confirm_password").value == ""
  )
    document.getElementById("submit").disabled = true;
  document.getElementById("message").style.color = "red";
  document.getElementById("message").innerHTML = "Empty Field!!!";
};
