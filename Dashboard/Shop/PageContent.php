<?php
include "Database.php";


$sql = "SELECT id, name, price FROM items";
$result = $conn->query($sql);


?>

<h2>Welcome to the Shop</h2>
<p>This is your shop's dashboard. Use the side navigation to manage your shop.</p>
<div class="row">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-3 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                        <p class="card-text">Description of <?php echo htmlspecialchars($row['name']); ?>.</p>
                        <h6 class="card-subtitle mb-2 text-muted">$<?php echo htmlspecialchars(number_format($row['price'], 2)); ?></h6>
                        <a href="#" class="btn btn-primary">Add to Chart</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No items found.</p>
    <?php endif; ?>
</div>