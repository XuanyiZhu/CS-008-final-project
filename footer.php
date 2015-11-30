<footer>
    <div class="footerph1">
        <div class="container">
            <div class="row">
                <div class="row1">
                    <h3 class="smallheading1">About Us</h3>
                    <?php
                    print "<ul>";
                    foreach ($records as $oneRecord) {
                        if ($oneRecord[1] == "about_us") {
                            if ($oneRecord[0] != "") {
                                print "\n\t<li>";
                                print "<a class='footerLink' href='about_us.php?id=" . $oneRecord[0] . "'>" . $oneRecord[2] . "</a>";
                                print "\n\t</li>";
                            }
                        }
                    }
                    print '<li><a class="footerLink" href="direction.php"</a>Direction & Parking</a></li>';
                    print '<li><a class="footerLink" href="contact.php"</a>Contact Us</a></li>';
                    print "</ul>"
                    ?>
                </div>
                <div class="row2">
                    <h3 class="smallheading2">Get Involve</h3>
                    <?php
                    print "<ul>";
                    foreach ($records as $oneRecord) {
                        if ($oneRecord[1] == "get_involve") {
                            if ($oneRecord[0] != "") {
                                print "\n\t<li>";
                                print "<a class='footerLink' href='getinvolve.php?id=" . $oneRecord[0] . "'>" . $oneRecord[2] . "</a>";
                                print "\n\t</li>";
                                
                            }
                        }
                    }
                    print '<li><a class="footerLink" href="sponsor.php">Our Sponsors</a></li>';
                    print "</ul>"
                    ?>
                </div>
                <div class="row3">
                    <h3 class="smallheading3">Photo</h3>
                    <ul class="list_footer_2">
                        <li><a class="footerLink" href="oldphoto.php"> Past Photos</a></li>
                        <li><a class="footerLink" href="newphoto.php">New Photos</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>

