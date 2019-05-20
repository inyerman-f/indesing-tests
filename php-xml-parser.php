<?php
$xmlUrl = "10577-xml.xml";
$xmlStr = simplexml_load_file($xmlUrl) or die("Error: Cannot create object");;
//$xmlStr = SimpleXMLElement($xmlStr);

?>

<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/php-parser.css">

</head>
<body>
<div class="document-container">

<section class="standard-section product-components-items-section">
    <?php

   foreach ($xmlStr->document_container->product_components_item_pages_container as $components_container){


            echo '<div class="row product-components-item-pages-container">'.
                    '<div class="product-page-title"><h3 class="page-title">'.$components_container->product_page_title.'</h3></div>';
                    foreach ($components_container->components_items_container as $component_items_container){
                        foreach ($component_items_container->product_page_subtitle as $subtitle){
                            echo '<div class="product-page-subtitle"><h4>'.$subtitle.'</h4></div>';
                        }

                        echo '<div class="components-items-container" style="display: flex">';
                            foreach ($component_items_container->component as $component){
                                $img_src = str_replace("file://lci-fileserve2/in39/DR-TP/Website-International/Steps/images/","/images/", $component->callout_group->call_out_image_container['href']);
                                echo
                                    '<div class="col-md-3 col-xs-6 callout-group">
                                        <div class="card">
                                            <div class="callout-img-container col-placeholder">
                                                <img class="card-img-top" src="'.$img_src.'">
                                            </div>
                                            <div class="callout-letter card-block">'.
                                                $component->callout_group->call_out_letter.
                                            '</div>
                                        </div>
                                    </div>';
                                    }
                            '</div>';
                    }
                 '</div>';

    }
    ?>

</section>

<section class="product-components-list-pages-container">

</section>
</div>
</body>

</html>
