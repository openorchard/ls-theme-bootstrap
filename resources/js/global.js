/* This script contains different optional JavaScript effects

  * It is originally written by the Lemonstand team and was used with
  * permission in this Bootstrap theme.  I will comment as best I can
  * but full accuracy is not guaranteed since I am not the original author.
  * I also removed some functions that are not used in this theme.
------------------------------------------------------------------------ */

/*
  Init_quantity_controls.
    This function handles the quantity control on the product page
    when adding a product to the cart so a user may add multiple
    items to the cart at initial addition compared to needing to
    edit the cart after adding the item.
*/

function init_quantity_controls() {
  $("a.arrow").click(function() {
      var $button = $(this);
      var oldValue = parseInt($button.parent().find("input").val());
      if (isNaN(oldValue))
        oldValue = 0;

      var newVal = oldValue;

      if ($button.hasClass('up'))
        newVal = oldValue + 1;
      else {
        if (oldValue >= 1)
          newVal = oldValue - 1;
      }

      $button.parent().find("input").val(newVal);
      update_product_price();
      return false;
  });
}

/*
  Init_carousel
    This function initializes the carousel for product images
    on the product page.
*/

function init_carousel() {
 jQuery(".carousel").jcarousel({
    scroll: 1,
    initCallback: function(carousel) {
      $('#carousel_next').bind('click', function() {
        carousel.next();
        return false;
      });

      $('#carousel_prev').bind('click', function() {
        carousel.prev();
        return false;
      });
    },
    itemVisibleInCallback: function(carousel, li, index, state) {
      $('#image_index').text(index);
      var cnt = $(li).parent().children('li').length;

      if (index == 1)
        $('#carousel_prev').addClass('disabled');
      else
        $('#carousel_prev').removeClass('disabled');

      if (index == cnt)
        $('#carousel_next').addClass('disabled');
      else
        $('#carousel_next').removeClass('disabled');
    },
    buttonNextHTML: null,
    buttonPrevHTML: null
 });
}

/*
  Init_fancybox
    Initailizes fancybox on the product page when an image is
    clicked for a larger view.
*/

function init_fancybox() {
  $("a.gallery_image").fancybox({
    titleShow: true
  });
}


/* Page load handler
------------------------------------------------------------------------ */

/*
  Init_effects
    This intializes many of the functions that have already been established
    in order to make one call when an update is needed compared to many.
*/

function init_effects() {
  init_quantity_controls();
  init_carousel();
  init_fancybox();
}

$(document).ready(function(){
  init_effects();
  $('input').livequery(function(){
    $(this).placeholder();
  });

});

/* Extend the Number class with the formatNumber method for formatting
   currency values
------------------------------------------------------------------------ */

Number.prototype.formatNumber = function(c, d, t)
{
  var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c,
  d = d == undefined ? "," : d,
  t = t == undefined ? "." : t,
  s = n < 0 ? "-" : "",
  i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
  j = (j = i.length) > 3 ? j % 3 : 0;

  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
