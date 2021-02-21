/**
 * @file
 * Global utilities.
 *
 */
(function($, Drupal) {

  'use strict';

  Drupal.behaviors.job_theme = {
    attach: function(context, settings) {


    }
  };

  Drupal.behaviors.backButton = {
    attach: function (context, settings) {
      $('.js-back').bind('click', function () {
        parent.history.back();
        return false;
      });
    }
  };

})(jQuery, Drupal);
