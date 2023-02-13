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
  <title> Users </title>
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
            <li><a href=" products.php"><i class="icon-list-alt icon-2x" style="color:blue"></i>Products</a> </li>
            <li><a href=" customer.php"><i class="icon-group icon-2x" style="color:green"></i> Customers</a> </li>
            <li><a href=" supplier.php"><i class="icon-group icon-2x" style="color:yellow"></i> Suppliers</a> </li>
            <li><a href=" salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x" style="color:#fff"></i> Sales
                Report</a> </li>
            <li class="active"><a href="users.php"><i class="icon-group icon-2x" style="color:red"></i> Users</a> </li>
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
          <i class="icon-group" style="color:red"></i> Users
        </div>
        <ul class="breadcrumb">

        </ul>

        <div style="margin-top: -19px; margin-bottom: 21px;">
          <?php
$result = $db->prepare("SELECT * FROM user ORDER BY id DESC");
$result->execute();
$rowcount = $result->rowcount();
?>
          <div style="text-align:center;">
            Total Number of Users: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount; ?></font>
          </div>
        </div>
        <input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search User..."
          autocomplete="off" />
        <a rel="facebox" href="add_user.php"><Button type="submit" class="btn btn-info"
            style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add
          User</button></a><br><br>

        <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
          <thead>
            <tr>
              <th width="17%"> Full Name </th>
              <th width="11%"> Username </th>
              <th width="10%"> Email </th>
              <th width="17%"> Mobile No.</th>
              <th width="19%"> Start Date</th>
              <th width="13%">Category</th>
              <th width="13%"> Status</th>
              <th width="14%"> Action </th>
            </tr>
          </thead>
          <tbody>

            <?php
$result = $db->prepare("SELECT * FROM user ORDER BY name DESC");
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
 ?>
            <tr class="record">
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['contact']; ?></td>
              <td><?php echo $row['date']; ?></td>
              <td> <?php if ($row['category'] == 0) {echo "Cashier";}
 if ($row['category'] == 1) {echo "Admin";}?>
              </td>
              <td>
                <?php echo ($row['stat'] == 0) ? "<span style='color:red'> Disabled </span>" : "<span style='color:green'> Active </span>"; ?>
              </td>
              <td><a title="Click To Edit Customer" style="color:blue" rel="facebox"
                  href="edit_user.php?id=<?php echo $row['id']; ?>"><i class="icon-edit"></i></a>
                <a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete"
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
      if (confirm("Are you sure want to DELETE ? ")) {

        $.ajax({
          type: "GET",
          url: "delete_user.php",
          data: info,
          success: function() {}
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