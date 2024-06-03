// functio to toggle sidebar
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    
    if (sidebar.style.transform === 'translateX(0px)') {
        sidebar.style.transform = 'translateX(-250px)';
        mainContent.style.marginLeft = '0';
        mainContent.style.width = '100%';
    } else {
        sidebar.style.transform = 'translateX(0px)';
        mainContent.style.marginLeft = '250px';
        mainContent.style.width = 'calc(100% - 250px)';
    }
}

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
    showSweetAlert(); // call sweetalert function on page loads
    $('.addBtn').on('click', function () {
      $('.viewDiv').slideUp();
      $('.addDiv').slideDown();
   });

   $('.cancelBtn').on('click', function () {
      $('.viewDiv').slideDown();
      $('.addDiv').slideUp();
      $('.addForm')[0].reset();
   })


   // dynamically update the update order form
   $('#updateOrderMdl').on('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = $(event.relatedTarget);
           
        var oid = button.data('oid');

      // alert(order id);
      $('#updateOrderMdl #oid').val(oid);
   });

    // remove url get variables
    if (window.history.replaceState) {
        var url = window.location.href;
        var indexOfQuery = url.indexOf('?');
        if (indexOfQuery !== -1) {
            var newUrl = url.substring(0, indexOfQuery);
            window.history.replaceState(null, null, newUrl);
        }
    }

    // delete user with sweetalert
    $('.userDelBtn').on('click', function() {
        var itemId = $(this).data('sid'); // Get the ID of the item to delete

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure you want to delete this User?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with the deletion by creating and submitting a form
                var form = $('<form>', {
                    'method': 'POST',
                    'action': 'process/user_del.pro.php'
                }).append($('<input>', {
                    'type': 'hidden',
                    'name': 'sid',
                    'value': itemId
                }));

                $('body').append(form);
                form.submit();
            }
        });
    });

    // delete admin with sweetalert
    $('.adminDelBtn').on('click', function() {
        var itemId = $(this).data('aid'); // Get the ID of the item to delete

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure you want to delete this Admin?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with the deletion by creating and submitting a form
                var form = $('<form>', {
                    'method': 'POST',
                    'action': 'process/admin_del.pro.php'
                }).append($('<input>', {
                    'type': 'hidden',
                    'name': 'aid',
                    'value': itemId
                }));

                $('body').append(form);
                form.submit();
            }
        });
    });

    // delete menu with sweetalert
    $('.menuDelBtn').on('click', function() {
        var itemId = $(this).data('mid'); // Get the ID of the item to delete

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure you want to delete this Menu?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with the deletion by creating and submitting a form
                var form = $('<form>', {
                    'method': 'POST',
                    'action': 'process/menu_del.pro.php'
                }).append($('<input>', {
                    'type': 'hidden',
                    'name': 'mid',
                    'value': itemId
                }));

                $('body').append(form);
                form.submit();
            }
        });
    });

    // dynamically update the edit hall form
   $('.editBtn').click(function () {
      $('.viewDiv').slideUp();
      $('.editDiv').slideDown();

      var button = $(this)

      var mid = button.data('emid');
      var dish = button.data('edish');
      var desc = button.data('edesc');
      var price = button.data('eprice');

      // alert(name);
      $('#menuEditForm #emid').val(mid);
      $('#menuEditForm #edish').val(dish);
      $('#menuEditForm #edesc').val(desc);
      $('#menuEditForm #eprice').val(price);
   });

   $('.editCancelBtn').on('click', function () {
      $('.viewDiv').slideDown();
      $('.editDiv').slideUp();
      $('.editForm')[0].reset();
   });
});
