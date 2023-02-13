<?php
//Start session
session_start();
//Check whether the session variable is present or not
if ((isset($_SESSION['username']) != "") && ($_SESSION['categorySession']) != "") {
 if ($_SESSION['categorySession'] == 1) {
  header("Location: ../admin");
  exit;
 }
 if ($_SESSION['categorySession'] == 0) {
  header("Location: ../staff");
  exit;
 }
}
