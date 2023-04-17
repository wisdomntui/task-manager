(function (window, undefined) {
    "use strict";

  
    // Ajax setup (adds csrf token to all ajax requests)
    $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
  })(window);
  
