<?php
session_start();
include '../includes/db_connect.php';
$username = $_SESSION['username'];
if ($_SESSION['categorySession'] == 0) {
 header("Location: ../staff");
 exit;
}
?>
<html>

<head>
  <title>Customers</title>
  <!-- js -->
  <link href="../static/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="../static/lib/jquery.js" type="text/javascript"></script>
  <script src="../static/src/facebox.js" type="text/javascript"></script>
  <script src="../static/js/application.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage: '../static/src/loading.gif',
      closeImage: '../static/src/closelabel.png'
    })
  })
  </script>
  <title> Sales </title>
  <?php
?>
  <link href="../static/vendors/uniform.default.css" rel="stylesheet" media="screen">
  <link href="../static/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../static/css/DT_bootstrap.css">
  <link rel="stylesheet" href="../static/css/font-awesome.min.css">
  <style type="text/css">
  body {
    padding-top: 60px;
    padding-bottom: 40px;
  }

  .sidebar-nav {
    padding: 9px 0;
  }
  </style>
  <link href="../static/css/bootstrap-responsive.css" rel="stylesheet">
  <!-- combosearch box-->
  <script src="../static/vendors/jquery-1.7.2.min.js"></script>
  <script src="../static/vendors/bootstrap.js"></script>
  <link href="../static/css/style.css" media="screen" rel="stylesheet" type="text/css" />
  <!--sa poip up-->
  <script language="javascript" type="text/javascript">
   <!-- Begin
  var timerID = null;
  var timerRunning = false;

  function stopclock() {
    if (timerRunning)
      clearTimeout(timerID);
    timerRunning = false;
  }

  function showtime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds()
    var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
    if (timeValue == "0") timeValue = 12;
    timeValue += ((minutes < 10) ? ":0" : ":") + minutes
    timeValue += ((seconds < 10) ? ":0" : ":") + seconds
    timeValue += (hours >= 12) ? " P.M." : " A.M."
    document.clock.face.value = timeValue;
    timerID = setTimeout("showtime()", 1000);
    timerRunning = true;
  }

  function startclock() {
    stopclock();
    showtime();
  }
  window.onload = startclock;
  // End -->
  </script>
</head>
<?php
function createRandomPassword()
{
 $chars = "003232303232023232023456789";
 srand((double) microtime() * 1000000);
 $i = 0;
 $pass = '';
 while ($i <= 7) {
  $num = rand() % 33;
  $tmp = substr($chars, $num, 1);
  $pass = $pass . $tmp;
  $i++;
 }
 return $pass;
}
$finalcode = 'RS-' . createRandomPassword();
?>

<body>
  <?php include '../includes/navfixed.php';?>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span2">
        <div class="well sidebar-nav">
          <ul class="nav nav-list">
            <li><a href="../staff"><i class="icon-dashboard icon-2x" style="color:#29D87E"></i> Dashboard </a>
            </li>
            <li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"
                  style="color:#DB691C"></i>
                Sales</a> </li>
            <li><a href=" products.php"><i class="icon-list-alt icon-2x" style="color:blue"></i>Products</a> </li>
            <li class="active"><a href=" customer.php"><i class="icon-group icon-2x" style="color:green"></i>
                Customers</a> </li>
            <li><a href=" supplier.php"><i class="icon-group icon-2x" style="color:yellow"></i> Suppliers</a> </li>
            <li><a href=" salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x" style="color:#fff"></i> Sales
                Report</a> </li>
            <li><a href="users.php"><i class="icon-group icon-2x" style="color:red"></i> Users</a> </li>
            <br><br><br><br><br><br>
            <li>
              <div class="hero-unit-clock">

                <form name="clock">
                  <font color="white">Time: <br></font>&nbsp;<input style="width:150px;color:#00B294;" type="submit"
                    class="trans" name="face" value="">
                </form>
              </div>
            </li>


          </ul>
        </div>
        <!--/.well -->
      </div>
      <!--/span-->
      <div class="span10">
        <div class="contentheader">
          <i class="icon-group" style="color:green"></i> Customers
        </div>
        <ul class="breadcrumb">
        </ul>

        <div style="margin-top: -19px; margin-bottom: 21px;">
          <?php
$result = $db->prepare("SELECT * FROM customer ORDER BY customer_id DESC");
$result->execute();
$rowcount = $result->rowcount();
?>
          <div style="text-align:center;">
            Total Number of Customers: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount; ?>
            </font>
          </div>
        </div>
        <input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search Customer..."
          autocomplete="off" />
        <a rel="facebox" href="addcustomer.php"><Button type="submit" class="btn btn-info"
            style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add
          Customer</button></a><br><br>

        <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
          <thead>
            <tr>
              <th width="17%"> Full Name </th>
              <th width="10%"> Address </th>
              <th width="10%"> Contact Number</th>
             
              <th width="9%"> Location </th>
              <th width="17%"> Note </th>
              <th width="14%"> Registration Date </th>
              <th width="4%"> Action </th>
            </tr>
          </thead>
          <tbody>

            <?php
$result = $db->prepare("SELECT * FROM customer ORDER BY customer_id DESC");
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
 ?>
            <tr class="record">
              <td><?php echo $row['customer_name']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td><?php echo $row['contact']; ?></td>
         
              <td><?php echo $row['membership_number']; ?></td>
              <td><?php echo $row['note']; ?></td>
              <td><?php echo $row['expected_date']; ?></td>

              <td><a title="Click To Edit Customer" rel="facebox"
                  href="editcustomer.php?id=<?php echo $row['customer_id']; ?>"><i class="icon-edit"
                    style="color:blue"></i></a>
                    <a href="deletecustomer.php" id="<?php echo $row['customer_id']; ?>" class="delbutton"
                  title="Click To Delete"><i class="icon-trash"></i> </a>

              </td>
            </tr>
            <?php
}
?>
          </tbody>
        </table>
        <div class="clearfix"></div>

      </div>
    </div>
  </div>
  <script src="js/jquery.js"></script>
  <script type="text/javascript">
  $(function() {
    $(".delbutton").click(function() {

      //Save the link in a variable called element
      var element = $(this);

      //Find the id of the link that was clicked
      var del_id = element.attr("id");

      //Built a url to send
      var info = 'id=' + del_id;
      if (confirm("Are you sure want to delete? There is NO undo!")) {

        $.ajax({
          type: "GET",
          url: "deletecustomer.php",
          data: info,
          success: function() {

          }
        });
        $(this).parents(".record").animate({
            backgroundColor: "#fbc7c7"
          }, "fast")
          .animate({
            opacity: "hide"
          }, "slow");

      }

      return false;

    });

  });
  </script>
</body>
<?php include '../includes/footer.php';?>

</html>