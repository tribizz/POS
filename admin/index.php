<?php
session_start();

include '../includes/db_connect.php';
$username = $_SESSION['username'];
if ($_SESSION['categorySession'] == 0) {
 header("Location: ../staff");
 exit;
}
//suppliers count
$result = $db->prepare("SELECT count(*) FROM supliers");
$result->execute();
$num_rows = $result->fetchColumn();
//users count
$result1 = $db->prepare("SELECT count(*) FROM user");
$result1->execute();
$num_rows1 = $result1->fetchColumn();
//customers couunt
$result2 = $db->prepare("SELECT count(*) FROM customer");
$result2->execute();
$num_rows2 = $result2->fetchColumn();
//products count
$result3 = $db->prepare("SELECT count(*) FROM products");
$result3->execute();
$num_rows3 = $result3->fetchColumn();
//Transactions count
$result4 = $db->prepare("SELECT count(*) FROM sales");
$result4->execute();
$num_rows4 = $result4->fetchColumn();
//Sum sales today
$result5 = $db->prepare("SELECT SUM(amount) AS tot_amount FROM sales WHERE `date`= CURDATE()");
$result5->execute();
$num_rows5 = $result5->fetchColumn();
$tot_amount = formatMoney($num_rows5, true);
//Sum profit today
$result6 = $db->prepare("SELECT SUM(profit) AS tot_profit FROM sales WHERE `date`= CURDATE()");
$result6->execute();
$num_rows6 = $result6->fetchColumn();
$tot_amount1 = formatMoney($num_rows6, true);
// $db->close();
?>

<!DOCTYPE html>
<html>

<head>
  <title>DASHBOARD</title>
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
            <li><a href=" products.php"><i class="icon-list-alt icon-2x" style="color:blue"></i>Products</a> </li>
            <li><a href=" customer.php"><i class="icon-group icon-2x" style="color:green"></i> Customers</a> </li>
            <li><a href=" supplier.php"><i class="icon-group icon-2x" style="color:yellow"></i> Suppliers</a> </li>
            <li><a href=" salesreport.php"><i class="icon-bar-chart icon-2x" style="color:#fff"></i> Sales
                Report</a> </li>
            <li><a href="users.php"><i class="icon-group icon-2x" style="color:red"></i> Users</a> </li>
            <li><a href="../invoice/index.html"><i class="icon-list icon-2x" style="color:#fff"></i>Invoice</a> </li>
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
        <font style=" font:bold 44px 'Aleo'; color:#c66a1e;">
          <center>ODORME ENTERPRISE</center>
        </font>
        <div id="mainmain">

          <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"
              style="color:#DB691C"></i><br>
            Sales
          <a href="products.php"><i class="icon-list-alt icon-2x" style="color:blue"></i><br> Products <span
              class='badge badge-info'><?php echo $num_rows3 ?></span></a>
          <a href="customer.php"><i class="icon-group icon-2x" style="color:green"></i><br> Customers <span
              class='badge badge-info'><?php echo $num_rows2 ?></span></a>
          <a href="supplier.php"><i class="icon-group icon-2x" style="color:#ffbf00"></i><br> Suppliers <span
              class='badge badge-info'><?php echo $num_rows ?></span></a>
          <a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x" style="color:#2B313D"></i><br> Sales
            Report <span class='badge badge-info'><?php echo $num_rows4 ?></span></a>
          <a href="users.php"><i class="icon-group icon-2x" style="color:red"></i><br> Users <span
              class='badge badge-info'><?php echo $num_rows1 ?></span></a>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php
function formatMoney($number, $fractional = false)
{
 if ($fractional) {
  $number = sprintf('%.2f', $number);
 }
 while (true) {
  $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
  if ($replaced != $number) {
   $number = $replaced;
  } else {
   break;
  }
 }
 return $number;
}
include '../includes/footer.php';?>

</html>