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
  <title> Products </title>
  <?php include '../includes/header.php';?>
  <script src="../static/js/application.js"></script>

<body>
  <?php include '../includes/navfixed.php';?>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span2">
        <div class="well sidebar-nav">
          <ul class="nav nav-list">
            <li><a href="../admin"><i class="icon-dashboard icon-2x" style="color:#29D87E"></i> Dashboard </a>
            </li>
            <li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"
                  style="color:#DB691C"></i>
                Sales</a> </li>
            <li class="active"><a href=" products.php"><i class="icon-list-alt icon-2x"
                  style="color:blue"></i>Products</a> </li>
            <li><a href=" customer.php"><i class="icon-group icon-2x" style="color:green"></i> Customers</a> </li>
            <li><a href=" supplier.php"><i class="icon-group icon-2x" style="color:yellow"></i> Suppliers</a> </li>
            <li><a href=" salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x" style="color:#fff"></i> Sales
                Report</a> </li>
            <li><a href="users.php"><i class="icon-group icon-2x" style="color:red"></i> Users</a> </li>
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
      <div class="span10">
        <div class="contentheader">
          <i class="icon-group" style="color:blue"></i> products
        </div>
        <ul class="breadcrumb">
        </ul>
        <div style="margin-top: -19px; margin-bottom: 21px;">
          <?php
$result = $db->prepare("SELECT * FROM products ORDER BY qty_sold DESC");
$result->execute();
$rowcount = $result->rowcount();
$result = $db->prepare("SELECT * FROM products where qty < 4 ORDER BY product_id DESC");
$result->execute();
$rowcount123 = $result->rowcount();
?>
          <div style="text-align:center;">
            Total Number of Products: <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount; ?>]
            </font>
          </div>

          <div style="text-align:center;">
            <font style="color:rgb(255, 95, 66);; font:bold 22px 'Aleo';">[<?php echo $rowcount123; ?>]</font> Products
            are below QTY of 4
          </div>
        </div>


        <input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search Product..."
          autocomplete="off" />
        <a rel="facebox" href="addproduct.php"><Button type="submit" class="btn btn-info"
            style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add
          Product</button></a><br><br>
        <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
          <thead>
            <tr>
              <th width="12%">Product Name </th>
              <th width="15%">Brand Name </th>
              <th width="13%"> Description </th>
              <th width="3%"> Supplier </th>
              <th width="14%"> Date Received </th>
              <th width="15%"> Expiry Date </th>
              <th width="5%"> Original Price &#8373; </th>
              <th width="5%"> Selling Price &#8373; </th>
              <th width="6%"> QTY </th>
              <th width="5%"> Qty Left </th>
              <th width="5%"> Total&#8373; </th>
              <th width="8%"> Action </th>
            </tr>
          </thead>
          <tbody>

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
$result = $db->prepare("SELECT *, price * qty as total FROM products ORDER BY product_id DESC");
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
 $total = $row['total'];
 $availableqty = $row['qty'];
 if ($availableqty < 4) {
  echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
 } else {
  echo '<tr class="record">';
 }
 ?>


            <td><?php echo $row['product_code']; ?></td>
            <td><?php echo $row['gen_name']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['supplier']; ?></td>
            <td><?php echo $row['date_arrival']; ?></td>
            <td><?php echo $row['expiry_date']; ?></td>
            <td><?php
$oprice =  $row['o_price'];
 echo formatMoney($oprice, true);
 ?></td>
            <td><?php
$pprice = $row['price'];
 echo formatMoney($pprice, true);
 ?></td>
            <td><?php echo $row['qty_sold']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td>
              <?php
$total = $row['total'];
 echo formatMoney($total, true);
 ?>
            </td>
            <td><a rel="facebox" title="Click to edit the product" style="color:blue"
                href="editproduct.php?id=<?php echo $row['product_id']; ?>"><i class="icon-edit"></i></a>
              <a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click to Delete the product"
                style="color:red"><i class="icon-trash"></i></a></td>
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

  <script src="../static/js/jquery.js"></script>
  <script type="text/javascript">
  $(function() {


    $(".delbutton").click(function() {

      //Save the link in a variable called element
      var element = $(this);

      //Find the id of the link that was clicked
      var del_id = element.attr("id");

      //Built a url to send
      var info = 'id=' + del_id;
      if (confirm("Sure you want to delete this Product? There is NO undo!")) {

        $.ajax({
          type: "GET",
          url: "deleteproduct.php",
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
  <script>
  function sum() {
    var txtFirstNumberValue = document.getElementById('txt1').value;
    var txtSecondNumberValue = document.getElementById('txt2').value;
    var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
    if (!isNaN(result)) {
      document.getElementById('txt3').value = result;

    }

    var txtFirstNumberValue = document.getElementById('txt11').value;
    var result = parseInt(txtFirstNumberValue);
    if (!isNaN(result)) {
      document.getElementById('txt22').value = result;
    }

    var txtFirstNumberValue = document.getElementById('txt11').value;
    var txtSecondNumberValue = document.getElementById('txt33').value;
    var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
    if (!isNaN(result)) {
      document.getElementById('txt55').value = result;

    }

    var txtFirstNumberValue = document.getElementById('txt4').value;
    var result = parseInt(txtFirstNumberValue);
    if (!isNaN(result)) {
      document.getElementById('txt5').value = result;
    }

  }
  </script>
  <?php include '../includes/footer.php';?>
</body>

</html>