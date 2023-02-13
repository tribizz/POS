<link href="../static/css/style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="save_user.php" method="post">
  <center>
    <h4><i class="icon-plus-sign icon-large"></i> Add User</h4>
  </center>
  <hr>
  <div id="ac">
    <span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="Full Name"
      Required /><br>
    <span>Username : </span><input type="text" style="width:265px; height:30px;" name="username" placeholder="Username"
      Required /><br>
    <span>Password : </span><input type="password" style="width:265px; height:30px;" name="pass" placeholder="password"
      Required /><br>
    <span>Contact : </span><input type="number" style="width:265px; height:30px;" name="contact"
      placeholder="Contact" /><br>
    <span>Email: </span><input type="email" style="width:265px; height:30px;" name="email" placeholder="Email" /><br>
    <span>Start Date: </span><input type="date" style="width:265px; height:30px;" name="date" placeholder="Date" /><br>
    <div style="float:right; margin-right:10px;">
      <button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i>
        Save</button>
    </div>
  </div>
</form>