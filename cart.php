<?php
include 'top.php';
?>
<h1>Cart</h1>
<article>
    <?php
    $UVMStudentDiscount = 3;
    $seniorDiscount = 3;
    $centerPrice = 4;

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
                if ($_SESSION["seat" . $j] != "Center"){
                $_SESSION["totalPrice" . $_SESSION["j"]] = $_SESSION["price" . $_SESSION["j"]] * $_SESSION["adult" . $_SESSION["j"]] 
                        + ($_SESSION["price" . $_SESSION["j"]] - $UVMStudentDiscount) * $_SESSION["uvmstudent" . $_SESSION["j"]]
                        + ($_SESSION["price" . $_SESSION["j"]] - $seniorDiscount) * $_SESSION["senior" . $_SESSION["j"]];
                } else {
                    $_SESSION["totalPrice" . $_SESSION["j"]] = $_SESSION["price" . $_SESSION["j"]] * $_SESSION["adult" . $_SESSION["j"]] 
                        + ($_SESSION["price" . $_SESSION["j"]] - $UVMStudentDiscount) * $_SESSION["uvmstudent" . $_SESSION["j"]]
                        + ($_SESSION["price" . $_SESSION["j"]] - $seniorDiscount) * $_SESSION["senior" . $_SESSION["j"]] 
                        + $centerPrice * ($_SESSION["uvmstudent" . $_SESSION["j"]] + $_SESSION["senior" . $_SESSION["j"]] 
                        + $_SESSION["adult" . $_SESSION["j"]]);
                }

                print"<li>Price: $  " . $_SESSION["totalPrice" . $_SESSION["j"]] . "</li>";

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
//            echo "It has been remove from cart.";
//            die();
        }
    }
    print"</ol>";
    $total = 0;
    for ($j = 1; $j <= $_SESSION["j"]; $j++) {
        $total = $_SESSION["totalPrice" . $_SESSION["j"]] + $total;
    }
    if ($_SESSION["j"] != 0) {
        print"<p>Total amount is $ " . $total . "</p>";
    }
    ?>

    <?php
    if (isset($_POST["btnPay"])) {
        $myFileName = "data/tickets";
        $fileExt = ".csv";
        $filename = $myFileName . $fileExt;
        $file = fopen($filename, 'a+');

        for ($j = 1; $j <= $_SESSION["j"]; $j++) {

            $ticket[] = $_SESSION["email" . $_SESSION["j"]];
            foreach ($records as $oneRecord) {
                if ($_SESSION["showId" . $j] == $oneRecord[0]) {
                    $ticket[] = $oneRecord[2];
                }
            }
            $ticket[] = $_SESSION["adult" . $_SESSION["j"]];
            $ticket[] = $_SESSION["uvmstudent" . $_SESSION["j"]];
            $ticket[] = $_SESSION["senior" . $_SESSION["j"]];
            $ticket[] = $_SESSION["seat" . $_SESSION["j"]];
            $ticket[] = $_SESSION["totalPrice" . $_SESSION["j"]];
        }
    }
    fputcsv($file, $ticket);
    fclose($file);
    ?>
    <form action="cart.php"
          method="post"
          id="frmPay">
        <legend></legend>
        <input type="submit" id="btnPay" name="btnPay" value="Pay" tabindex="900" class="button">

    </form>
</article>
</body>
<?php include "footer.php"; ?>
</html>
