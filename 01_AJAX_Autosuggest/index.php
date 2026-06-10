<!DOCTYPE html>
<html>
<head>
<title>Internship Search</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
}

.container{
    width:80%;
    margin:auto;
    background:white;
    padding:20px;
    margin-top:30px;
    box-shadow:0px 0px 10px gray;
}

h2{
    text-align:center;
}

select{
    padding:10px;
    width:250px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

table,th,td{
    border:1px solid black;
}

th,td{
    padding:10px;
    text-align:center;
}

</style>

<script>

function fetchData()
{
    var mode=document.getElementById("mode").value;

    var xhr=new XMLHttpRequest();

    xhr.open("POST","search.php",true);

    xhr.setRequestHeader("Content-type",
    "application/x-www-form-urlencoded");

    xhr.onreadystatechange=function()
    {
        if(xhr.readyState==4 && xhr.status==200)
        {
            document.getElementById("result").innerHTML=xhr.responseText;
        }
    };

    xhr.send("mode="+mode);
}

</script>

</head>

<body>

<div class="container">

<h2>Internship Search System</h2>

<select id="mode" onchange="fetchData()">
    <option value="">Select Mode</option>
    <option value="Online">Online</option>
    <option value="Onsite">Onsite</option>
    <option value="Hybrid">Hybrid</option>
</select>

<div id="result"></div>

</div>

</body>
</html>
