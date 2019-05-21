<?php
$xmlUrl = "10577-xml.xml";
$xmlStr = simplexml_load_file($xmlUrl) or die("Error: Cannot create object");;
//$xmlStr = SimpleXMLElement($xmlStr);

$page_html =
'<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/php-parser.css">

</head>
<body>';
$page_html = $page_html.'<div class="components-webpage-container">';

 //   $page_html = $page_html.'<section class="standard-section product-components-items-section">';

        foreach ($xmlStr->components_webpage_container->component_images_section as $component_images_section ){
            $page_html = $page_html .'<div class="standard-container product-components-items-section">'.
                    '<div class="product-page-title"><h3 class="page-title">'.strtoupper($component_images_section->product_page_title).'</h3></div>'.
                    '<div class="category-box-group"><div class="category-box-border"><div class="category-box">'.$component_images_section->category_box_group->category_box.'</div></div></div>';
                    foreach ($component_images_section->components_images_container as $components_images_container) {
                        foreach ($components_images_container->product_page_subtitle as $subtitle) {
                            $page_html = $page_html.'<div class="product-page-subtitle"><h4>' . $subtitle . '</h4></div>';
                        }
                        foreach ($components_images_container->product_page_note as $note) {
                            $page_html = $page_html.'<div class="notice"><h4>' . $note . '</h4></div>';
                        }
                        $page_html = $page_html.'<div class="component-images-container">';
                            foreach ($components_images_container->component as $component) {
                                $image_src = str_replace("file:///Users/inyermanfonseca/indd-test/images/","images/", $component->callout_group->callout_image_container['href']);
                                $page_html = $page_html.'<div class="callout-group">'.
                                        '<div class="callout-letter">'.
                                               '<h4 class="callout-text">'.$component->callout_group->callout_letter.'</h4>'.
                                        '</div>'.
                                        '<div class="callout-img-container">'.
                                                '<img src="'.$image_src.'")>'.
                                        '</div>';
                                        foreach ($component->callout_group->callout_image_note as $image_note){
                                            $page_html = $page_html. '<div class="notice">'.$image_note.'</div>';
                                        }
                                $page_html = $page_html.'</div>';
                            }
                        $page_html = $page_html .'</div>';
                    }
            $page_html = $page_html.'</div>';
        }

 //   $page_html = $page_html.'</section>';

 //   $page_html = $page_html.'<section class="standard-section product-components-list-section">';
        foreach ($xmlStr->components_webpage_container->components_list_section as $component_list_section ){
            $page_html = $page_html .'<div class="standard-container product-components-list-section">'.
                '<div class="product-page-title"><h3 class="page-title">'.strtoupper($component_list_section->product_page_title).'</h3></div>'.
                '<div class="category-box-group"><div class="category-box-border"><div class="category-box">'.$component_list_section->category_box_group->category_box.'</div></div></div>';
                foreach ($component_list_section->component_list_container as $components_list_container) {
                    foreach ($components_list_container->product_page_subtitle as $subtitle) {
                        $page_html = $page_html.'<div class="product-page-subtitle"><h4>' . $subtitle . '</h4></div>';
                    }
                    foreach ($component_list_section->product_page_note as $note) {
                        $page_html = $page_html.'<div class="notice"><h4>' . $note . '</h4></div>';
                    }
                    $page_html = $page_html.'<div class="component-list-container">';
                    foreach ($components_list_container->components_table as $component_table) {
                        $page_html = $page_html.'<div class="centered-table">';
                            $page_html = $page_html .'<table class="table"><thead class="thead-dark"><tr>';
                                foreach ($component_table->table->tgroup->thead->row->entry as $thead_cell) {
                                        $page_html = $page_html.'<th>'.$thead_cell.'</th>';
                                }
                            $page_html = $page_html.'</tr></thead>';
                            $page_html = $page_html.'<tbody>';
                                foreach ($component_table->table->tgroup->tbody->row as $tbody_row){
                                    $page_html = $page_html.'<tr>';
                                        foreach ($tbody_row->entry as $tcell){
                                            $page_html = $page_html.'<td>'.$tcell.'</td>';
                                        }
                                    $page_html = $page_html.'</tr>';
                                }
                            $page_html = $page_html.'</tboody>';
                            $page_html=$page_html.'</table>';
                        $page_html = $page_html.'</div>';
                    }
                    $page_html = $page_html .'</div>';

                }

            $page_html = $page_html.'</div>';
        }
 //   $page_html = $page_html.'</section>';

$page_html = $page_html.'</div>';

$page_html = $page_html.'</body>
</html>';

$config = array(
    'indent'         => true,
    'output-xhtml'   => true,
    'wrap'           => 200);

// Tidy
$tidy = new tidy;
$tidy->parseString($page_html, $config, 'utf8');
$tidy->cleanRepair();
//$page_html = $tidy->html();

echo $page_html;
//echo $page_html;