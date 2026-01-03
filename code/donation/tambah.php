<?php
include "../config.php";
$campaign_id = $_GET['campaign_id'];
?>

<h2>Donasi</h2>
<form method="post">
    Jumlah Donasi <input type="number" name="amount"><br><br>
    <button name="donate">Donasi</button>
</form>

<?php
if (isset($_POST['donate'])) {
    mysqli_query($conn,
        "INSERT INTO donations VALUES(
            NULL,
            $campaign_id,
            '$_POST[amount]',
            NOW()
        )"
    );

    // update total dana campaign
    mysqli_query($conn,
        "UPDATE campaigns
         SET collected_amount = collected_amount + $_POST[amount]
         WHERE id = $campaign_id"
    );

    header("Location: ../index.php");
}
?>
