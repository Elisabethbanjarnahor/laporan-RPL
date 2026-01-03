<?php
include "../config.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM campaigns WHERE id=$id")
);
?>

<h2>Edit Campaign</h2>
<form method="post">
    Judul <input type="text" name="title" value="<?= $data['title'] ?>"><br><br>
    Target <input type="number" name="target" value="<?= $data['target_amount'] ?>"><br><br>
    Status <input type="text" name="status" value="<?= $data['status'] ?>"><br><br>
    <button name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($conn,
        "UPDATE campaigns SET
            title='$_POST[title]',
            target_amount='$_POST[target]',
            status='$_POST[status]'
         WHERE id=$id"
    );
    header("Location: ../index.php");
}
?>
