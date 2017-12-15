<?php

    $objCatalogue = new Catalogue();
    $cats = $objCatalogue->getCategories();
    $objBusiness = new Business();
    $business = $objBusiness->getBusiness();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sklep</title>
        <!-- bootstrap  -->
        <link rel="stylesheet" type="text/css" href="style/core.css">
    </head>

    <body>

        <div id="header">
            <div id="header_in">
                <h5><a href="/"><?php echo $business['name']; ?></a> </h5>
            </div>
        </div>
        <div id="outer">
            <div id="wrapper">
                <div id="left">
                    <?php require_once('basket_left.php'); ?>
                    <?php if (!empty($cats)) { ?>
                        <h2>Kategorie</h2>
                        <ul id="navigation">
                            <?php
                            foreach($cats as $cat) {
                                echo "<li><a href=\"/?page=catalogue&amp;category=".$cat['id']."\"";
                                echo Helper::getActive(array('category' => $cat['id']));
                                echo ">";
                                echo Helper::encodeHtml($cat['name']);
                                echo "</a></li>";
                            }
                            ?>
                        </ul>
                    <?php } ?>

                </div>
                <div id="right">

