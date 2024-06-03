// Function to show SweetAlert modal based on GET parameters
function showSweetAlert() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const msg = urlParams.get('msg') || ''; // Get custom message if available

    if (status === 'success') {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: msg
            // text: msg || 'Your order has been placed successfully!'
        });
    } else if (status === 'error') {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: msg
            // text: msg || 'There was an issue with your order. Please try again.'
        });
    }
}

$(document).ready(function() {

    showSweetAlert();
    // remove url get variables
   if (window.history.replaceState) {
      var url = window.location.href;
      var indexOfQuery = url.indexOf('?');
      if (indexOfQuery !== -1) {
          var newUrl = url.substring(0, indexOfQuery);
          window.history.replaceState(null, null, newUrl);
      }
   }

   // dynamically update the update order form
   $('#updateOrderMdl').on('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = $(event.relatedTarget);
           
        var oid = button.data('oid');

      // alert(order id);
      $('#updateOrderMdl #oid').val(oid);
   });



    $('.menu-toggle').click(function() {
        $('.nav-list').toggleClass('active');
    });
});