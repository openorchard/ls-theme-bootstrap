<?
    /*
        This partial will get check for properties in the database for the product.
        If there are properties then the table will display and then get each attribute
        in the sort order of the backend and display them as a row in the table.

        Note: If you are not going to use HTML tags in the names or values, wrap them in h().
              This will sanitize the output into plaintext for better security.  Ex. h($attribute->value)

        If there are no attributes, then we display a paragraph stating it so the user doesn't just see empty space.
    */
?>

<? if ($product->properties->count): ?>
  <table class="table table-bordered table-striped">
    <? foreach ($product->properties as $attribute): ?>
      <tr>
        <th><?= $attribute->name ?>:</th>
        <td><?= $attribute->value ?></td>
      </tr>
    <? endforeach ?>
  </table>
<? else: ?>
<p>Sorry, but there are no attributes currently available for this product.</p>
<? endif ?>
