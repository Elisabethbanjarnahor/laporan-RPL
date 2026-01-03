<?php include "../config.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pembayaran</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
    <h2>Data Pembayaran</h2>
    <a href="../donations/index.php" class="btn btn-blue">⬅ Kembali ke Donasi</a>
    <br><br>

    <table>
    <tr>
        <th>ID Payment</th>
        <th>Campaign</th>
        <th>Jumlah Donasi</th>
        <th>Metode</th>
        <th>Status</th>
    </tr>

    <?php
    $query = "
        SELECT payments.id,
               campaigns.title,
               donations.amount,
               payments.payment_method,
               payments.status
        FROM payments
        JOIN donations ON payments.donation_id = donations.id
        JOIN campaigns ON donations.campaign_id = campaigns.id
    ";

    $result = mysqli_query($conn, $query);

    while ($p = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?= $p['id']; ?></td>
        <td><?= $p['title']; ?></td>
        <td>Rp <?= number_format($p['amount'], 0, ',', '.'); ?></td>
        <td><?= $p['payment_method']; ?></td>
        <td>
            <?php if($p['status'] == "SUCCESS") { ?>
                <span class="status-active">SUCCESS</span>
            <?php } else { ?>
                <span class="status-closed"><?= $p['status']; ?></span>
            <?php } ?>
        </td>
    </tr>
    <?php } ?>
    </table>
</div>

</body>
</html>
