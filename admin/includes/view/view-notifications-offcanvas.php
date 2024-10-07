<div class="offcanvas offcanvas-end" tabindex="-1" id="viewNotificationsOffcanvas" aria-labelledby="viewNotificationsOffcanvas">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="viewNotificationsOffcanvas">All <span class="fw-bold">Notifications</span></h5>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php
        $query = "SELECT * FROM transaction, origin WHERE status = 'departed' OR status = 'arrived' ORDER BY transaction_id DESC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($transaction = mysqli_fetch_assoc($result)) {
        ?>
                <div class="notification-item">
                    <h5><i class="fas fa-truck notification-icon"></i><?= $transaction['to_reference'] ?> has departed from <?= $transaction['origin_name'] ?></h5>
                    <small class="text-muted">Transaction ID: <?= $transaction['transaction_id'] ?></small>
                    <small class="text-muted float-end"><?= $transaction['created_at'] ?></small>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle mr-2"></i> No notifications at this time.
            </div>
        <?php
        }
        ?>
    </div>
</div>