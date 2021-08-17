<?php
session_start();
include_once 'db_connect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: myprofile.php");
}
else if(isset($_SESSION['admin'])!="")
{
	header("Location: adminprofile.php");
}

if((isset($_POST['btn-reg'])))
{
	$fullname = $_POST['fullname'];
	$user_name = $_POST['username'];
	$password = $_POST['password'];
	$cpass = $_POST['c-password'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$ab=mysqli_query($bd,"INSERT INTO users(uid, full_name, uname, password, email_id, phone) VALUES('','$fullname','$user_name','$password','$email','$phone')");
	if(!$ab){echo mysqli_error($bd);}
	else 
	{
		?>
        <script>alert("Successfully Registered");
        window.location.href='login.php';</script>
        <?php
	}
}

include('navbar.php');
?>
<br><br>
<div class="form-bg">
    <h2>Registration Form</h2>
    <div class="login-form">
        <form method="post" name="regform">
            <label>Full Name</label><br><br>
            <input type="text" name="fullname" id="fname" placeholder="Enter Full Name" class="input" oninput="fnValidate()" required/>
            <br /><br><br>
            <label>Username</label><br><br>
            <input type="text" name="username" id="luname" placeholder="Enter Username" class="input" oninput="unValidate()" required />
            <br /><br><br>
            <label>Password</label><br><br>
            <input type="password" name="password" id="pw1" placeholder="Enter Password" class="input" oninput="passValidate()" required/>
            <!--<span id="demo"></span>-->
            <br><br><br>
            <label>Confirm Password</label><br><br>
            <input type="password" name="c-password" id="pw2" placeholder="Re-enter Password" class="input" oninput="passMatch()" required/><br><br><br>
            <label>Email ID</label><br><br>
            <input type="text" id="emval" name="email" placeholder="Enter Email ID" class="input" required  oninput="emailValidate()"  /><br><br><br>
            <label>Contact No</label><br><br>
            <input type="text" name="phone" id="phno" placeholder="Enter Phone No" class="input" oninput="phoneValidate()" required/><br><br><br>
            <input type="submit" name="btn-reg" class="btn-login" value="Register" id="regbtn" onClick="return checkAll()"/>
        </form>
    </div>
</div><br /><br>
<?php include('footer.php'); ?>
<script type="text/javascript">
function emailValidate()
{
	var eid = document.getElementById("emval");
	var eidval = eid.value;
	var atpos = eidval.indexOf("@");
	var dotpos = eidval.lastIndexOf(".");
	if(atpos<1 || (dotpos - atpos < 2) || dotpos==eidval.length-1)
	{
		eid.className+=" invalid";
		return false;	
	}
	else
	{
		eid.className="input";
		return true;
	}
}

function passValidate()
{
	var fpsw = document.getElementById("pw1");
	var fpswval = fpsw.value;
	if(fpswval.length<8)
	{
		fpsw.className+=" invalid";
		//document.getElementById("demo").innerHTML = "Hello JavaScript";
		return false;
	} 
	else 
	{
		fpsw.className="input";
		//document.getElementById("demo").innerHTML = "";
		return true;
	}
}

function passMatch()
{
	var ps1 = document.getElementById("pw1");
	var ps2 = document.getElementById("pw2");
	var ps2val = ps2.value;
	if(ps1.value!=ps2val || ps2val.length<8)
	{
		ps2.className+=" invalid";
		return false;
	} 
	else 
	{
		ps2.className="input";
		return true;
	}
}

function phoneValidate()
{
	var ph = document.getElementById("phno");
	var phval = ph.value;
	if(phval.length==10 && (/^\d{10}$/.test(phval)))
	{
		ph.className="input";
		return true;
	} 
	else 
	{
		ph.className+=" invalid";
		return false;
	}
}

function unValidate()
{
	var un = document.getElementById("luname");
	var unval = un.value;
	if(unval.length>4 && unval.length<10 && unval.charAt(0).match(/[a-z]/i) && unval.indexOf(" ")==-1)
	{
		un.className="input";
		return true;
	} 
	else 
	{
		un.className+=" invalid";
		return false;
	}
}

function fnValidate()
{
	var fn = document.getElementById("fname");
	var fnval = fn.value;
	if(/^[a-z' 'A-Z]+$/.test(fnval) && fnval.indexOf(" ")!=fnval.length-1 && fnval.indexOf(" ")!=0 && fnval.indexOf(" ")!=-1 )
	{
		fn.className="input";
		return true;
	} 
	else 
	{
		fn.className+=" invalid";
		return false;
	}
}

function checkAll()
{
	if(emailValidate() && passValidate() && passMatch() && phoneValidate() && unValidate() && fnValidate())
	{
		document.regform.submit();
		return true;
	}
	else
	{
		alert("Details not valid!");
		return false;
	}
}
</script>