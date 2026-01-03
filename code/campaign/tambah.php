<?php
include "../config.php";

if (isset($_POST['simpan'])) {
    mysqli_query($conn,
        "INSERT INTO campaigns VALUES(
            NULL,
            '$_POST[title]',
            '$_POST[description]',
            '$_POST[target]',
            0,
            '$_POST[status]'
        )"
    );

    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Campaign</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
    <h2>Tambah Campaign</h2>

    <form method="post">
        Judul
        <input type="text" name="title">

        Deskripsi
        <textarea name="description"></textarea>

        Target
        <input type="number" name="target">

        Status
        <select name="status">
            <option value="Active">Active</option>
            <option value="Closed">Closed</option>
        </select>

        <button name="simpan">Simpan</button>
    </form>
</div>

</body>
</html>
