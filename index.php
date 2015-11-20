<?php
include'top.php';
include 'mainNav.php';
?>
<h1>UVM Department of Theatre</h1>

<div class="flexslider">
    <ul class="slides">
        <?php
        
        foreach ($records as $oneRecord) {
            if ($oneRecord[1] == 'home_slide_pic') {

                for ($i = 2; $oneRecord[$i] != ""; $i++) {
                    //if ($oneRecord[$i] != "") {
                        print'<li>';
                        print'<img src="img/' . $oneRecord[$i] . '" alt="img_slide" >';
                        print'</li>';
                    //}
                }
            }
        }
        ?>
    </ul>
</div>

<h2 id ="PopularShow">Popular Show</h2>
<h2 id = "ComingSoon">Coming Soon</h2>

</body>
<?php
include 'footer.php';
?>
</html>
