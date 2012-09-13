window.site = jQuery.extend(true, window.site ? window.site : {}, {
  message: {
    remove: function() {
      $.removebar();
    },
    custom: function(message, params) {
      if(!message)
        return;

      var params = $.extend({
        position: 'top',
        removebutton: false,
        color: '#666',
        message: message,
        time: 5000,
        background_color: '#BBB'
      }, params || {});

      jQuery(document).ready(function($) {
        $.bar(params);
      });
    },
    addToCart: function(count) {
      site.message.custom(sprintf('%(count)s item%(plural)s been added to your cart!', {count: count, plural: count == 1 ? ' has' : 's have'}), {time: 3000});
    },
    addToCompare: function() {
      site.message.custom('Product has been added to your comparison list!', {time: 3000});
    },
    removeFromCompare: function() {
      site.message.custom('Product has been removed from your comparison list.', {time: 3000});
    },
    clearCompareList: function() {
      site.message.custom('Your compare list has been cleared!', {time: 3000});
    },
    deleteCartItem: function() {
      site.message.custom('Item has been removed from your cart!', {time: 3000});
    },
    updateCart: function() {
      site.message.custom('Your cart has been updated!', {time: 3000});
    },
    setCouponCode: function() {
      site.message.custom('Your coupon code has been set.', {time: 3000});
    },
    copyBilling: function() {
      site.message.custom('Your billing information has been copied to your shipping information!', {time: 3000});
    },
    updatePassword: function() {
      site.message.custom('Your password has been updated!', {time: 3000});
    },
    updateAccount: function() {
      site.message.custom('Your account information has been updated!', {time: 3000});
    },
    updateBilling: function() {
      site.message.custom('Your billing information has been updated!', {time: 3000});
    },
    updateShipping: function() {
      site.message.custom('Your shipping information has been updated!', {time: 3000});
    },
    updateShippingMethod: function() {
      site.message.custom('Your shipping method has been updated!', {time: 3000});
    },
    updateShippingEstimated: function() {
      site.message.custom('Your shipping has been estimated.', {time: 3000});
    },
    addProductReview: function() {
      site.message.custom('Thank you, your review has been successfully posted.', {time: 3000});
    }
  }
});

Phpr.showLoadingIndicator = function() {
  site.message.custom('Processing...', {background_color: '#f7c809', color: '#000', time: 999999});
};

Phpr.hideLoadingIndicator = function() {
  site.message.remove();
};

Phpr.response.popupError = function() {
  site.message.custom(this.html.replace('@AJAX-ERROR@', ''), {background_color: '#c32611', color: '#fff', time: 10000});
};

function custom_alert(text) {
  site.message.custom(text, {color: '#fff', time: 10000});
}
