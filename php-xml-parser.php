<?php
$xmlUrl = "10577-xml.xml";
$xmlStr = file_get_contents($xmlUrl);
$xmlStr = SimpleXMLElement($xmlStr);
?>

<html>
<head>
<body>

<section>
    <?php
    foreach ($xmlStr->document_container->product_components_item_pages_container as $page_container){
        echo $page_container->product_page_title."shid";
    }
    ?>

</section>
<section>

</section>

</body>
</head>
</html>
