<?php
$xmlUrl = "10577-xml.xml";
$xmlStr = simplexml_load_file($xmlUrl) or die("Error: Cannot create object");;
//$xmlStr = SimpleXMLElement($xmlStr);

$page_html =
'<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/php-parser.css">

</head>
<body>';
$page_html = $page_html.'<div class="components-webpage-container">';

 //   $page_html = $page_html.'<section class="standard-section product-components-items-section">';
/**
 * the following foreach, loops through the xml file to provide the components images with their corresponding callouts.
 */
        foreach ($xmlStr->component_images_section as $component_images_section ){
            $page_html = $page_html .'<div class="standard-container product-components-items-section">'.
                    '<div class="product-page-title"><h3 class="page-title">'.strtoupper($component_images_section->web_page_title).'</h3></div>'.
                    '<div class="category-box-group"><div class="category-box-border"><div class="category-box">'.$component_images_section->category_box_group->category_box.'</div></div></div>';
                    foreach ($component_images_section->components_images_container as $components_images_container) {
                        foreach ($components_images_container->web_page_subtitle as $subtitle) {
                            $page_html = $page_html.'<div class="product-page-subtitle"><h4>' . $subtitle . '</h4></div>';
                        }
                        foreach ($components_images_container->web_page_note as $note) {
                            $page_html = $page_html.'<div class="notice"><h4>' . $note . '</h4></div>';
                        }
                        $page_html = $page_html.'<div class="component-images-container">';
                            foreach ($components_images_container->component as $component) {
                                $image_src = '/images/'. basename( $component->callout_group->callout_image_container['href']);
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
        foreach ($xmlStr->components_list_section as $component_list_section ){
            $page_html = $page_html .'<div class="standard-container product-components-list-section">'.
                '<div class="product-page-title"><h3 class="page-title">'.strtoupper($component_list_section->web_page_title).'</h3></div>'.
                '<div class="category-box-group"><div class="category-box-border"><div class="category-box">'.$component_list_section->category_box_group->category_box.'</div></div></div>';
                foreach ($component_list_section->component_list_container as $components_list_container) {
                    foreach ($components_list_container->web_page_subtitle as $subtitle) {
                        $page_html = $page_html.'<div class="product-page-subtitle"><h4>' . $subtitle . '</h4></div>';
                    }
                    foreach ($components_list_container->web_page_note as $note) {
                        $page_html = $page_html.'<div class="notice"><h4>' . $note . '</h4></div>';
                    }
                    $page_html = $page_html.'<div class="component-list-container">';
                    foreach ($components_list_container->components_table as $component_table) {
                        $page_html = $page_html.'<div class="centered-table">';
                            $page_html = $page_html .'<table class="table"><thead class="thead-dark"><tr>';
                                foreach ($component_table->table->table_head_cell as $thead_cell) {
                                        $page_html = $page_html.'<th>'.$thead_cell.'</th>';
                                }
                            $page_html = $page_html.'</tr></thead>';
                            $page_html = $page_html.'<tbody>';
                                    $tcell_index =0;
                                foreach (   $component_table->table->table_callout as $tcallout){

                                    $page_html = $page_html.'<tr>';
                                            $tdescription = $component_table->table->table_description[$tcell_index];
                                            $tpart_num = $component_table->table->table_part_number[$tcell_index];
                                            $page_html = $page_html.'<td>'.$tcallout.'</td><td>'.$tpart_num.'</td><td>'.$tdescription.'</td>';
                                            $tcell_index++;

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

/**
 * tidy is being used to format the html output to make it more readable
 */
$config = array(
    'indent'         => true,
    'output-xhtml'   => true,
    'wrap'           => 200);

// Tidy
$tidy = new tidy;
$tidy->parseString($page_html, $config, 'utf8');
$tidy->cleanRepair();
$page_html = $tidy;
echo $page_html;
//echo $page_html;