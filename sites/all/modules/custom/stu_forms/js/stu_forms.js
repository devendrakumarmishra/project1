(function($) {
  Drupal.behaviors.stu_forms = {
    attach: function (context, settings) {
      $("#treatment input[name=treatment_type[und]]:radio").click(function () {
        var action = $(this).val();
        window.location.href = Drupal.settings.basePath + 'node/add/surgeon/' + action.toLowerCase();
      });
    }
  };
})(jQuery);
