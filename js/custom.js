jQuery(function($) {

  $.ajax({
    url: 'http://film.zack.website/wp-json/wp/media/',
  }).done(function (posts) {
    console.log(posts);
  });



  var ApplicationRouter = Backbone.Router.extend({  
      initialize: function (el) { },

      routes: {
          '': function () {},
          '*else': function () {}
      }
  });

  // Kick off router
  var router = new ApplicationRouter($('#content'));

  // Use history API
  Backbone.history.start();
});
