
  <footer class="text-center">
    <h2>Developed By <a href="https:tinyurl.com/mars-tech" target="_blank">MARs Tech</a></h2>
  </footer>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery371.js"></script>
    <script src="../js/sweetalert.js"></script>
    <script src="js/script.js?s=<?= time(); ?>"></script>
  </body>
</html>
<style>
  footer{
    background: #1a252f;
    padding: 20px;
    /*width: 100%;*/
    bottom: 0;
    margin-bottom: -20px;
    /*position: sticky;*/
    color: goldenrod;
  }
  footer h2 a{
    color: white;
    /*text-decoration: none;*/
  }
</style>

<script>
    $(document).ready(function() {
    $('#profileImage').on('click', function() {
        $('#dropdownMenu').toggle();
    });

    // Close the dropdown if the user clicks outside of it
    $(window).on('click', function(event) {
        if (!$(event.target).closest('.dropdown').length) {
            $('#dropdownMenu').hide();
        }
    });
});

</script>