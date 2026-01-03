<?php include "config.php"; ?>
<h2>Daftar Campaign Donasi</h2>
<a href="campaigns/tambah.php">+ Tambah Campaign</a>
<link rel="stylesheet" href="style.css">

<table border="1" cellpadding="10">
<tr>
    <th>Judul</th>
    <th>Target</th>
    <th>Terkumpul</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
$q = mysqli_query($conn, "SELECT * FROM campaigns");
while ($c = mysqli_fetch_assoc($q)) {
?>
<tr>
    <td><?= $c['title'] ?></td>
    <td><?= $c['target_amount'] ?></td>
    <td><?= $c['collected_amount'] ?></td>
    <td><?= $c['status'] ?></td>
    <td>
        <a href="campaigns/edit.php?id=<?= $c['id'] ?>">Edit</a> |
        <a href="campaigns/hapus.php?id=<?= $c['id'] ?>">Hapus</a> |
        <a href="donations/tambah.php?campaign_id=<?= $c['id'] ?>">Donasi</a>
    </td>
</tr>
<?php } ?>
</table>
