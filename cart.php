<?php
include 'top.php';
?>
<h1>Cart</h1>
<article>
    <?php
    $UVMStudentDiscount = 3;
    $seniorDiscount = 3;
    $centerPrice = 4;
    $totalPrice = $_SESSION["price" . $_SESSION["j"]] * $adult + ($_SESSION["price" . $_SESSION["j"]] - $UVMStudentDiscount) * $uvmstudent + ($_SESSION["price" . $_SESSION["j"]] - $seniorDiscount) * $senior + $centerPrice * ($uvmstudent + $senior + $adult);


    if ($_SESSION["j"] == 0) {
        print"<p>Your cart is empty.</p>";
    }

    print"<ol>";

    for ($j = 1; $j <= $_SESSION["j"]; $j++) {
        foreach ($records as $oneRecord) {

            if ($_SESSION["showId" . $j] == $oneRecord[0]) {
                print "<li><a href='show.php?id=" . $_SESSION["showId" . $j] . "'>" . '<img src="img/' . $oneRecord[8] . '">' . "</a></li>";

                print"<li>Time: " . $_SESSION["time" . $j] . "</li>";
                if ($_SESSION["adult" . $j] != "0") {
                    print"<li>" . $_SESSION["adult" . $j] . " Adult ticket(s)</li>";
                }
                if ($_SESSION["uvmstudent" . $j] != "0") {
                    print"<li>" . $_SESSION["uvmstudent" . $j] . " UVM Student ticket(s)</li>";
                }
                if ($_SESSION["senior" . $j] != "0") {
                    print"<li>" . $_SESSION["senior" . $j] . " Senior ticket(s)</li>";
                }
                print"<li>Prefer seat: " . $_SESSION["seat" . $j] . "</li>";
                $totalPrice = $_SESSION["price" . $_SESSION["j"]] * $adult + ($_SESSION["price" . $_SESSION["j"]] - $UVMStudentDiscount) * $uvmstudent + ($_SESSION["price" . $_SESSION["j"]] - $seniorDiscount) * $senior + $centerPrice * ($uvmstudent + $senior + $adult);
                echo $_SESSION["price" . $_SESSION["j"]];
                print"<li>Price : $  " .$totalPrice. "</li>";
                ?>
                <li>
                    <form action="cart.php"
                          method="post"
                          id="frmRemove">
                        <legend></legend>
                        <input type="submit" id="btnRemove" name="btnRemove" value="Remove from cart" tabindex="900" class="button">

                    </form>
                </li>
                <?php
            }
        }
        if (isset($_POST["btnRemove"])) {
            session_unset($_SESSION["j"]);
        }
    }
    print"</ol>";
    for ($j = 1; $j <= $_SESSION["j"]; $j++) {
        $total = $_SESSION["price $ " . $_SESSION["j"]] + $total;
    }
    if ($_SESSION["j"] != 0) {
        print"<p>Total amount is $ " . $total . "</p>";
    }
    ?>

</article>
</body>
<?php include "footer.php"; ?>
</html>
