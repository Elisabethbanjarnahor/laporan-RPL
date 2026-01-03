<?php
include "../config.php";
$donation_id = $_GET['donation_id'];
?>

<h2>Pembayaran</h2>
<form method="post">
    Metode
    <select name="method">
        <option>Transfer</option>
        <option>E-Wallet</option>
    </select><br><br>
    Status <input type="text" name="status" value="SUCCESS"><br><br>
    <button name="bayar">Bayar</button>
</form>

<?php
if (isset($_POST['bayar'])) {
    mysqli_query($conn,
        "INSERT INTO payments VALUES(
            NULL,
            $donation_id,
            '$_POST[method]',
            '$_POST[status]'
        )"
    );
    echo "Pembayaran berhasil";
}
?>
