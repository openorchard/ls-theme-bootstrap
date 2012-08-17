<?php
    if (strlen(trim($product->description)) > 0)
        {
            echo $product->description;
        }
    else
        {
            echo '<p>Sorry, but no description is currently available for this product.</p>';
        }
?>
