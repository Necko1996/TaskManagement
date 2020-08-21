$(document).ready(function () {
   setTimeout(
       function()
       {
          $('#success-message').fadeOut("slow")
       }, 3000
   );
    setTimeout(
        function()
        {
            $('#error-message').fadeOut("slow")
        }, 5000
    );
});