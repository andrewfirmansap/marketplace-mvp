<?php
session_start();

if (isset($_SESSION['email'])) {
    $username = $_SESSION['email'];
} else {
    header("Location: login.php");
}

?>

<?php include "Template/Dashboard/DashboardHeader.php"; ?>
<div class="content">
    <div class="row">
        <div class="col-md-8">
            <?php include "Dashboard/Shop/PageContent.php"; ?>
        </div>
        <div class="col-md-4">
        <?php include "Dashboard/Chart/ChartContent.php"; ?>
        </div>
    </div>
</div>

<?php include "Template/Dashboard/DashboardFooter.php"; ?>
