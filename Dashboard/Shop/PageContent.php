<?php
include "Database.php";
$message = isset($_GET['message']) ? $_GET['message'] : '';

$sql = "SELECT id, name, price FROM items";
$result = $conn->query($sql);


?>

<h2>Welcome to the Shop</h2>
<?php
if ($message != "") {
?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Info!</strong>  <?php echo htmlspecialchars($message); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php
}
?>
<div class="row">

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-3 mt-2">
                <div class="card">


                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                        <p class="card-text">Description of <?php echo htmlspecialchars($row['name']); ?>.</p>
                        <h6 class="card-subtitle mb-2 text-muted">$<?php echo htmlspecialchars(number_format($row['price'], 2)); ?></h6>
                        <form action="add_to_chart.php" method="POST">
                            <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <button type="submit" class="btn btn-primary">Add to Chart</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No items found.</p>
    <?php endif; ?>
</div>