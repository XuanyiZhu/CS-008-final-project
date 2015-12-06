<?php
include 'top.php';
?>
<h1>Cart</h1>
<article>

    <ol>
        <?php
        if ($_SESSION["j"] == 0) {
            print"<p>Your cart is empty.</p>";
        }

        print"<ol>";

        for ($j = 1; $j <= $_SESSION["j"]; $j++) {
            foreach ($records as $oneRecord) {

                if ($_SESSION["showId" . $j] == $oneRecord[0]) {
                    print "<li><a href='show.php?id=" . $_SESSION["showId" . $j] . "'>" . '<img src="img/' . $oneRecord[8] . '">' . "</a></li>";

                    print"<li>Time: " . $_SESSION["time" . $j] . "</li>";
//                    if ($_SESSION["adult" . $j] != "") {
                        print"<li>" . $_SESSION["adult" . $j] . " Adult ticket(s)</li>";
//                    }
//                    if ($_SESSION["uvmstudent" . $j] != "") {
                        print"<li>" . $_SESSION["uvmstudent" . $j] . " UVM Student ticket(s)</li>";
//                    }
//                    if ($_SESSION["senior" . $j] != "") {
                        print"<li>" . $_SESSION["senior" . $j] . " Senior ticket(s)</li>";
//                    }
                    print"<li>Prefer seat: " . $_SESSION["seat" . $j] . "</li>";
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
//            $_SESSION["j"] = $_SESSION["j"] - 1;
        }
        }
        print"</ol>";
//        if (isset($_POST["btnRemove"])) {
//            session_unset($_SESSION["j"]);
////            $_SESSION["j"] = $_SESSION["j"] - 1;
//        }
        ?>

</article>
</body>
<?php include "footer.php"; ?>
</html>
