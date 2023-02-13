<?php
session_start();
$username = $_SESSION['username'];
if ($_SESSION['categorySession'] == 1) {
 header("Location: ../admin");
 exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>
  ODORME ENTERPRISE
  </title>
  <?php include '../includes/header.php';?>

<body>
  <?php include '../includes/navfixed.php';?>
    <div class="container-fluid">
    <div class="row-fluid">
      <div class="span2">
        <div class="well sidebar-nav">
          <ul class="nav nav-list">
            <li class="active"><a href="#"><i class="icon-dashboard icon-2x" style="color:#29D87E"></i> Dashboard </a>
            </li>
            <li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"
                  style="color:#DB691C"></i>
                Sales</a> </li>
            <li><a href=" products.php"><i class="icon-list-alt icon-2x" style="color:blue"></i> Products</a> </li>
            <li><a href=" customer.php"><i class="icon-group icon-2x" style="color:green"></i> Customers</a> </li>
            <li><a href=" supplier.php"><i class="icon-group icon-2x" style="color:yellow"></i> Suppliers</a> </li>
            <li><a href=" salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x" style="color:#fff"></i> Sales
                Report</a> </li>
            <br><br><br><br><br><br>
            <li>
              <div class=" hero-unit-clock">

                <form name="clock">
                  <font color="#ffffff">Time: <br></font>&nbsp;<input style="width:150px;color:#00B294;" type="
                    submit" class="trans" name="face" value="">
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
          <i class="icon-dashboard" style="color:#29D87E"></i> Dashboard
        </div>
        <ul class="breadcrumb">
          <li class="active"></li>
        </ul>
        <font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#c66a1e;">
          <center>ODORME ENTERPRISE</center>
        </font>
        <div id="mainmain">

          <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"
              style="color:#DB691C"></i><br>
            Sales</a>
          <a href="products.php"><i class="icon-list-alt icon-2x" style="color:blue"></i><br> Products</a>
          <a href="customer.php"><i class="icon-group icon-2x" style="color:green"></i><br> Customers</a>
          <a href="supplier.php"><i class="icon-group icon-2x" style="color:#ffbf00"></i><br> Suppliers</a>
          <a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x" style="color:#2B313D"></i><br> Sales
            Report</a>
          <a href="../">
            <font color="red"><i class="icon-off icon-2x"></i></font><br> Logout
          </a>
          <?php
?>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include '../includes/footer.php';?>

</html>