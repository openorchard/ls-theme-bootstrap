    <ul id="tabs" class="nav nav-tabs">
        <li class="active"><a href="#" data-tab="tab1">Description</a></li>
        <li><a href="#" data-tab="tab2">Attributes</a></li>
    </ul>

    <script>
// On li click
$("#tabs li").click(function() {
  // Reset them
  $("#tabs li").removeClass("active");
  // Add to the clicked one only
  $(this).addClass("active");
});
    </script>


    <div id="content">
        <div id="tab1" class="wrapper">
            <!--Getting the product description to show.-->
            <?= $this->render_partial('product:description') ?>
        </div>
        <div id="tab2" class="wrapper">
            <?= $this->render_partial('shop:product_attributes') ?>
        </div>
    </div>

    <script>
    $(document).ready(function() {
    $("#content .wrapper").hide(); // Initially hide all content
    $("#tabs li:first").attr("id","current"); // Activate first tab
    $("#content .wrapper:first").fadeIn(); // Show first tab content

    $('#tabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return
        }
        else{
        $("#content .wrapper").hide(); //Hide all content
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
        $('#' + $(this).attr('data-tab')).fadeIn(); // Show content for current tab
        }
    });
});
    </script>
