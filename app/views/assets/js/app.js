/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
var SMP = {
  // All pages
  common: {
    init: function(){

      $(document).keydown(function(e) {
        //console.log(e.keyCode);
        if(e.keyCode == 72) {
          $("#term").focus();
        }
        if(e.shiftKey && e.keyCode == 191) {
          e.preventDefault();
          $('#helper-modal').load('/smp/help/keys',function(){
            $(this).modal();
          }).modal('show');
        }
    });

    }
  },
  home: {
    init: function() {

      var staff = new Bloodhound({
        datumTokenizer: function(d) { return d.tokens; },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        limit: 10,
        prefetch: '/smp/api/dir.json'
      });
      staff.initialize();

      $('#search .typeahead').typeahead(null, {
        name: 'staff',
        minLength: 2,
        source: staff.ttAdapter(),
        templates: {
          suggestion: Handlebars.compile([
            '<p class="staff-name">',
            '<img src="/smp/content/avatar/{{avatar}}" class="img-responsive staff-search pull-left" height="50" width="50">',
            '<strong>{{display_name}}</strong>',
            '<small>{{position}}</small>',
            '<small><span class="glyphicon glyphicon-envelope"></span> {{email}}</small>',
            '<small><span class="glyphicon glyphicon-phone-alt"></span> {{telephone}}</small>',
            '</p>'
          ].join(''))
        }
      }).on('typeahead:selected', function(e, data) {
        //$('#search').submit();
        //window.location.replace('/smp/' + data.slug);
        // similar behavior as clicking on a link
        window.location.href = '/smp/' + data.slug;
      });
    },

  },
  // Home page
  admin: {
    init: function() {
      // JavaScript to be fired on the home page
    },

    staffs: function() {

      //console.log('Admin::Staff');

      $( "#first_name, #last_name" ).keyup(function(e) {
        var input = $('#first_name').val() + ' ' + $('#last_name').val();
        console.log( input);
        $('#display_name').prop('value', input);
      });

      $('#account').on('click', function () {
        var disabled = ($(this).is(":checked")) ? false : true;
        $('#accountAuth').prop('disabled', disabled);
      });

      $('#role').on('click', function (e) {
        e.preventDefault();
        var checked = ($(this).val() === 'administrator') ? true : false;
        $('#division-role input').prop('checked', checked);
      });

      // branch
      var branchs = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        limit: 10,
        prefetch: {
          url: '/smp/admin/api/branch.json',
          filter: function(list) {
            return $.map(list, function(item) { return { name: item }; });
          }
        }
      });

      branchs.initialize();

      $('#branch-prefetch .typeahead').typeahead(null, {
        name: 'branchs',
        displayKey: 'name',
        source: branchs.ttAdapter()
      });

      // sector
      var sectors = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        limit: 10,
        prefetch: {
          url: '/smp/admin/api/sector.json',
          filter: function(list) {
            return $.map(list, function(item) { return { name: item }; });
          }
        }
      });

      sectors.initialize();

      $('#sector-prefetch .typeahead').typeahead(null, {
        name: 'sectors',
        displayKey: 'name',
        source: sectors.ttAdapter()
      });

      // unit
      var units = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        limit: 10,
        prefetch: {
          url: '/smp/admin/api/unit.json',
          filter: function(list) {
            return $.map(list, function(item) { return { name: item }; });
          }
        }
      });

      units.initialize();

      $('#unit-prefetch .typeahead').typeahead(null, {
        name: 'units',
        displayKey: 'name',
        source: units.ttAdapter()
      });

    },

    users: function() {
      SMP.admin.staffs();
      //console.log('Admin::Users');
    },
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = SMP;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    var bodyId = document.body.id;
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
      UTIL.fire(classnm,bodyId);

    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
