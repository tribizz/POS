<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecustomer.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Customer</h4></center>
<hr>
<div id="ac">
<span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="Full Name" Required/><br>
<span>Address : </span><input type="text" style="width:265px; height:30px;" name="address" placeholder="Address"/><br>
<span>Contact : </span><input type="number" style="width:265px; height:30px;" name="contact" placeholder="Contact"/><br>

<span>Location: </span><input type="text" style="width:265px; height:30px;" name="memno" placeholder="Location"/><br>
<span>Note : </span><textarea style="height:60px; width:265px;" name="note"></textarea><br>
<span>Registration Date: </span><input type="date" style="width:265px; height:30px;" name="date" placeholder="Date"/><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>