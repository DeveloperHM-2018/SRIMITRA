<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Srimitras
            </div>
        </div>
    </div>
</footer>

<script>
     window.setTimeout(function() {
         $(".alert").fadeTo(200, 0).slideUp(200, function() {
             $(this).remove();
         });
     }, 4000);</script>