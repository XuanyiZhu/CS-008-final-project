<!DOCTYPE html>
<html lang="en">
    <head>
        <title>UVM Theatre</title>
        <meta charset="utf-8">
        <meta name="author" content="Xuanyi Zhu">
        <meta name="description" content="Website for UVM theatre">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="img/x-icon" href="icon.ico" property='stylesheet'>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="stylesheet.css" type="text/css" media="screen">
        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
        <![endif]-->

        <?php
        // parse the url into htmlentites to remove any suspicous vales that someone
        // may try to pass in. htmlentites helps avoid security issues.
        $phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

        // break the url up into an array, then pull out just the filename
        $path_parts = pathinfo($phpSelf);
        ?>

        <!--########################Facebook share link##################################-->
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <!--########################twitter share link##################################-->
    <script>!function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + '://platform.twitter.com/widgets.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'twitter-wjs');</script>

    <!--########################slide pictures##################################-->
    <title>JQuery Slider Example</title>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>

    <script type="text/javascript">
        var flexsliderStylesLocation = "css/flexslider.css";
        $('<link rel="stylesheet" type="text/css" href="' + flexsliderStylesLocation + '" >').appendTo("head");
        $(window).load(function () {

            $('.flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 6000,
                animationSpeed: 1000
            });

        });
    </script>

    <!--########################read from csv file##################################-->
    <?php
// Sample code to open a plain text file

    $debug = false;

    if (isset($_GET["debug"])) {
        $debug = true;
    }

    $myFileName = "theatre";

    $fileExt = ".csv";

    $filename = $myFileName . $fileExt;

    if ($debug)
        print "\n\n<p>filename is " . $filename;

    $file = fopen($filename, "r");

// the variable $file will be empty or false if the file does not open
    if ($file) {
        if ($debug)
            print "<p>File Opened</p>\n";
    }
// the variable $file will be empty or false if the file does not open
    if ($file) {

        if ($debug)
            print "<p>Begin reading data into an array.</p>\n";

        // This reads the first row, which in our case is the column headers
        $headers[] = fgetcsv($file);

        if ($debug) {
            print "<p>Finished reading headers.</p>\n";
            print "<p>My header array<p><pre> ";
            print_r($headers);
            print "</pre></p>";
        }
        // the while (similar to a for loop) loop keeps executing until we reach 
// the end of the file at which point it stops. the resulting variable 
// $records is an array with all our data.

        while (!feof($file)) {
            $records[] = fgetcsv($file);
        }

        //closes the file
        fclose($file);

        if ($debug) {
            print "<p>Finished reading data. File closed.</p>\n";
            print "<p>My data array<p><pre> ";
            print_r($records);
            print "</pre></p>";
        }
    } // ends if file was opened
    ?>


</head>

<!-- ################ body section ######################### -->

<?php
print '<body id="' . $path_parts['filename'] . '">';
?>




