<div itemprop="description">
<?php
/*
    Here we are checking for a description, if one is found display it, if not display a nice message saying it isn't available.

    We are simply doing the check by first trimming any beginning/ending whitespace then checking the lenght of the
    output string.  If it is greater than 0 (ie. a character that is not a space) then it will simply output the description.

    We are also setting up the itemprop for metadata to be pulled by search engines around this block.
*/
    if (strlen(trim($product->description)) > 0)
        {
            echo $product->description;
        }
    else
        {
            echo '<p>Sorry, but no description is currently available for this product.</p>';
        }
?>
</div>