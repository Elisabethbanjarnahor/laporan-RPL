<?php include "../config.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Donasi</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
    <h2>Data Donasi</h2>
    <a href="../index.php" class="btn btn-blue">⬅ Kembali ke Campaign</a>
    <br><br>

    <table>
    <tr>
        <th>ID Donasi</th>
        <th>Campaign</th>
        <th>Jumlah Donasi</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

    <?php
    $query = "
        SELECT donations.id,
               campaigns.title,
               donations.amount,
               donations.donation_date
        FROM donations
        JOIN campaigns ON donations.campaign_id = campaigns.id
    ";

    $result = mysqli_query($conn, $query);

    while ($d = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?= $d['id']; ?></td>
        <td><?= $d['title']; ?></td>
        <td><?= number_format($d['amount']); ?></td>
        <td><?= $d['donation_date']; ?></td>
        <td>
            <a class="btn btn-orange" 
               href="../payments/tambah.php?donation_id=<?= $d['id']; ?>">
               Bayar
            </a>
        </td>
    </tr>
    <?php } ?>
    </table>

</div>

</body>
</html>
