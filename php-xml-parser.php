<?php
$xmlUrl = "10577-xml.xml";
$xmlStr = simplexml_load_file($xmlUrl) or die("Error: Cannot create object");;
//$xmlStr = SimpleXMLElement($xmlStr);

$page_html =
'<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/php-parser.css">

</head>
<body>';
$page_html = $page_html.'<div class="components-webpage-container">';
    $page_html = $page_html.'<section class="standard-section product-components-items-section">';

        foreach ($xmlStr->components_webpage_container->component_images_section as $component_images_section ){

            $page_html = $page_html .'<div class="components-images-">'.
                    '<div class="product-page-title"><h3 class="page-title">'.$component_images_section->product_page_title.'</h3></div>';
                    foreach ($component_images_section->components_images_container as $components_images_container) {
                        foreach ($components_images_container->product_page_subtitle as $subtitle) {
                            echo '<div class="product-page-subtitle"><h4>' . $subtitle . '</h4></div>';
                        }
                        foreach ($components_images_container->product_page_note as $note) {
                            echo '<div class="product-page-subtitle"><h4>' . $subtitle . '</h4></div>';
                        }

                    }

        }

    $page_html = $page_html.'</section>';

$page_html = $page_html.'</div>';
$page_html = $page_html.'</body>
</html>';
