    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
        <li><a href="#attributes" data-toggle="tab">Attributes</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="description">
            <!--Getting the product description to show.-->
            <?= $this->render_partial('product:description') ?>
        </div>
        <div class="tab-pane" id="attributes">
            <?= $this->render_partial('shop:product_attributes') ?>
        </div>
    </div>

<script>
    $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    })

$(function () {
$('#myTab a:first').tab('show');
})
</script>
