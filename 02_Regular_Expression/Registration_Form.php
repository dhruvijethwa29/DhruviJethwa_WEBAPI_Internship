<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // First Name
    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
    } else {
        $fname = trim($_POST["fname"]);
        if (!preg_match("/^[A-Za-z]{2,30}$/", $fname)) {
            $fnameErr = "Invalid First Name";
        }
    }

    // Last Name
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
    } else {
        $lname = trim($_POST["lname"]);
        if (!preg_match("/^[A-Za-z]{2,30}$/", $lname)) {
            $lnameErr = "Invalid Last Name";
        }
    }

    // City
    if (empty($_POST["city"])) {
        $cityErr = "City is required";
    } else {
        $city = trim($_POST["city"]);
        if (!preg_match("/^[A-Za-z ]{2,50}$/", $city)) {
            $cityErr = "Invalid City";
        }
    }

    // Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid Email";
        }
    }

    // Mobile
    if (empty($_POST["contact"])) {
        $contactErr = "Mobile Number is required";
    } else {
        $contact = trim($_POST["contact"]);
        if (!preg_match("/^[6-9]\d{9}$/", $contact)) {
            $contactErr = "Invalid Mobile Number";
        }
    }

    // Aadhaar
    if (empty($_POST["aadhaar"])) {
        $aadhaarErr = "Aadhaar Number is required";
    } else {
        $aadhaar = trim($_POST["aadhaar"]);
        if (!preg_match("/^[2-9]{1}[0-9]{11}$/", $aadhaar)) {
            $aadhaarErr = "Invalid Aadhaar Number";
        }
    }

    // PAN
    if (empty($_POST["pan"])) {
        $panErr = "PAN Number is required";
    } else {
        $pan = strtoupper(trim($_POST["pan"]));
        if (!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/", $pan)) {
            $panErr = "Invalid PAN Number";
        }
    }

    // Username
    if (empty($_POST["username"])) {
        $userErr = "Username is required";
    } else {
        $username = trim($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9_]{4,20}$/", $username)) {
            $userErr = "Invalid Username";
        }
    }

    // Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/", $password)) {
            $passwordErr = "Weak Password";
        }
    }

    // Confirm Password
    if (empty($_POST["cpassword"])) {
        $cpasswordErr = "Confirm Password is required";
    } else {
        $cpassword = $_POST["cpassword"];
        if ($password != $cpassword) {
            $cpasswordErr = "Passwords do not match";
        }
    }

    // Success Message
    if (
        empty($fnameErr) &&
        empty($lnameErr) &&
        empty($cityErr) &&
        empty($emailErr) &&
        empty($contactErr) &&
        empty($aadhaarErr) &&
        empty($panErr) &&
        empty($userErr) &&
        empty($passwordErr) &&
        empty($cpasswordErr)
    ) {
        $successMSG = "Registration Successful!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration Portal</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background-color: #0F766E;

    padding:30px;
}

.container{
    width:1200px;
    max-width:100%;
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:40px;
}

.left-section{
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.tag{
    width:max-content;
    padding:10px 20px;
    background:rgba(255,255,255,0.15);
    border-radius:30px;
    backdrop-filter:blur(10px);
    margin-bottom:20px;
}

.left-section h1{
    font-size:60px;
    line-height:1.1;
    margin-bottom:20px;
}

.left-section p{
    font-size:18px;
    line-height:1.8;
    opacity:0.9;
    margin-bottom:30px;
}

.feature{
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(15px);
    padding:18px;
    border-radius:12px;
    margin-bottom:15px;
    border-left:4px solid #fff;
}

.form-card{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,0.2);
    border-radius:25px;
    padding:35px;
    color:white;
}

.form-card h2{
    margin-bottom:5px;
}

.form-card p{
    margin-bottom:25px;
    opacity:0.8;
}

.form-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:15px;
}

.input-group{
    display:flex;
    flex-direction:column;
}

.input-group label{
    margin-bottom:6px;
    font-size:14px;
}

.input-group input{
    padding:12px;
    border:none;
    outline:none;
    border-radius:10px;
}

.full{
    grid-column:span 3;
}

.gender{
    display:flex;
    gap:20px;
    margin-top:10px;
}

.btn-group{
    display:flex;
    gap:15px;
    margin-top:25px;
}

.btn{
    flex:1;
    padding:14px;
    border:none;
    border-radius:10px;
    font-size:16px;
    cursor:pointer;
    font-weight:600;
}

.register{
    background:#f97316;
    color:white;
}

.reset{
    background:#e5e7eb;
}

.error{
    color:#ffb4b4;
    font-size:12px;
    margin-top:4px;
}

@media(max-width:900px){

.container{
    grid-template-columns:1fr;
}

.left-section h1{
    font-size:40px;
}

.form-grid{
    grid-template-columns:1fr;
}

.full{
    grid-column:span 1;
}
}

</style>
</head>
<body>

<div class="container">

<div class="left-section">

<div class="tag">
🎓 Student Career Portal
</div>

<h1>Launch Your Future Career</h1>

<p>
Create your professional profile and unlock internship
opportunities to kickstart your career journey.
</p>

<div class="feature">✅ Internship Registration</div>
<div class="feature">✅ Professional Profile Creation</div>
<div class="feature">✅ Career Development Platform</div>
<div class="feature">✅ Industry Ready Account Setup</div>

</div>

<div class="form-card">

<h2>Create Account</h2>
<p>Please fill all required details</p>

<form id="regForm">

<div class="form-grid">

<div class="input-group">
<label>First Name</label>
<input type="text" id="fname">
<span class="error" id="fnameErr"></span>
</div>

<div class="input-group">
<label>Middle Name</label>
<input type="text" id="mname">
</div>

<div class="input-group">
<label>Last Name</label>
<input type="text" id="lname">
<span class="error" id="lnameErr"></span>
</div>

<div class="input-group">
<label>City</label>
<input type="text" id="city">
<span class="error" id="cityErr"></span>
</div>

<div class="input-group">
<label>Email</label>
<input type="email" id="email">
<span class="error" id="emailErr"></span>
</div>

<div class="input-group">
<label>Contact</label>
<input type="text" id="contact">
<span class="error" id="contactErr"></span>
</div>

<div class="full">
<label>Gender</label>
<div class="gender">
<label><input type="radio" name="gender"> Male</label>
<label><input type="radio" name="gender"> Female</label>
<label><input type="radio" name="gender"> Other</label>
</div>
</div>

<div class="input-group">
<label>Aadhaar Number</label>
<input type="text" id="aadhaar">
<span class="error" id="aadhaarErr"></span>
</div>

<div class="input-group">
<label>PAN Number</label>
<input type="text" id="pan">
<span class="error" id="panErr"></span>
</div>

<div class="input-group">
<label>Username</label>
<input type="text" id="username">
<span class="error" id="userErr"></span>
</div>

<div class="input-group full">
<label>Password</label>
<input type="password" id="password">
<span class="error" id="passErr"></span>
</div>

<div class="input-group full">
<label>Confirm Password</label>
<input type="password" id="cpassword">
<span class="error" id="cpassErr"></span>
</div>

</div>

<div class="btn-group">
<button type="submit" class="btn register">
Register
</button>

<button type="reset" class="btn reset">
Reset
</button>
</div>

</form>

</div>

</div>

<script>
document.getElementById("regForm").addEventListener("submit",function(e){

e.preventDefault();

let valid=true;

const nameRegex=/^[A-Za-z]{2,30}$/;
const cityRegex=/^[A-Za-z ]{2,50}$/;
const emailRegex=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,}$/;
const mobileRegex=/^[6-9]\d{9}$/;
const aadhaarRegex=/^[2-9]{1}[0-9]{11}$/;
const panRegex=/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
const userRegex=/^[a-zA-Z0-9_]{4,20}$/;
const passRegex=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;

function check(id,errorId,regex,msg){

let value=document.getElementById(id).value.trim();

if(!regex.test(value)){
document.getElementById(errorId).innerText=msg;
valid=false;
}
else{
document.getElementById(errorId).innerText="";
}
}

check("fname","fnameErr",nameRegex,"Invalid First Name");
check("lname","lnameErr",nameRegex,"Invalid Last Name");
check("city","cityErr",cityRegex,"Invalid City");
check("email","emailErr",emailRegex,"Invalid Email");
check("contact","contactErr",mobileRegex,"Invalid Mobile Number");
check("aadhaar","aadhaarErr",aadhaarRegex,"Invalid Aadhaar Number");
check("pan","panErr",panRegex,"Invalid PAN Number");
check("username","userErr",userRegex,"Invalid Username");
check("password","passErr",passRegex,"Weak Password");

let pass=document.getElementById("password").value;
let cpass=document.getElementById("cpassword").value;

if(pass!==cpass){
document.getElementById("cpassErr").innerText="Passwords do not match";
valid=false;
}
else{
document.getElementById("cpassErr").innerText="";
}

if(valid){
alert("Registration Successful!");
}

});

</script>

</body>
</html>
