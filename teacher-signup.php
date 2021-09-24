<!DOCTYPE html>
<html>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif; margin-left:25%;margin-right:25%;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  border-radius:25px;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: crimson;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  border-radius:25px;
}

button:hover {
  opacity:1;
}


.signupbtn {
  float: left;
  width: 100%;
}


.container {
  padding: 16px;
}


.clearfix::after {
  content: "";
  clear: both;
  display: table;
}


@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<script>
    function sendData() {
           
            var id = document.getElementById("id").value;
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var contact = document.getElementById("cno").value;
            var pass = document.getElementById("pass").value;
            var cpass = document.getElementById("cpass").value;
            
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var msg = this.responseText;
                    if(msg == "succes"){
                        location.replace("index.html");
                    }
                    else{
                        alert(msg);
                    }
                }
            };
            
            xhttp.open("POST", "teacher-signup-check.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id + "&name=" + name + "&email=" + email + "&contact-no=" + contact + "&psw=" + pass + "&psw-repeat=" + cpass);
           
        }

function confirmPassWord(pass) {
        console.log(pass);
            $pass = document.getElementById("pass").value;
            $cPass = document.getElementById("cpass").value;
            if ($cPass != $pass) {
                document.getElementById("cpass").style = "background-color:  crimson";
                document.getElementById("confirm-pass").innerHTML = "Not matched password & repeat password";
                document.getElementById("confirm-pass").style = "color : crimson";
            } else if ($cPass == $pass) {
                document.getElementById("cpass").style = "background-color:   #ddd";
                document.getElementById("confirm-pass").style = "display:none";
            }
        }



</script>
</head>
<body>

<form style="border:1px solid #ccc; border-radius:25px;">
  <div class="container">
    <h1 align="center" style="color:crimson;">Sign Up</h1>
   
    <hr>

    
    <input type="text" placeholder="Enter Id" name="id" id="id" required>

    
    <input type="text" placeholder="Enter Name" name="name" id="name" required>

   
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

 
    <input type="text" placeholder="Enter Contact No" name="contact-no" id="cno" pattern="[0-9]{10}" title="Please Enter 10 Digits For Contact No" required>

   
    <input type="password" placeholder="Enter Password" name="psw" id="pass"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"  required>

    
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="cpass" onkeyup="confirmPassWord(this.value)"  required>
    <p id="confirm-pass"></p>

    <div class="clearfix">
 
      <button type="submit" name="supsubmit" class="signupbtn" onclick="sendData() ">Sign Up</button>
    </div>
  </div>

    </form>
</body>
</html>
