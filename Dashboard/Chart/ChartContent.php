<?php
// session_start();


// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = intval($_SESSION['user_id']);

include "Database.php";
$sql = "SELECT user_chart.id, items.name, items.price 
        FROM user_chart
        JOIN items ON user_chart.item_id = items.id
        WHERE user_chart.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>
<div class="chart-container">
    <h5>Chart</h5>
    <div class="item-list">
        <?php if ($result->num_rows > 0): ?>
            <ul class="list-group">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong><?php echo htmlspecialchars($row['name']); ?></strong><br>
                            <span>$<?php echo htmlspecialchars(number_format($row['price'], 2)); ?></span>
                        </div>
                        <form action="delete_from_chart.php" method="POST">
                            <input type="hidden" name="chart_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No items in your chart.</p>
        <?php endif; ?>
    </div>
</div>