        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url('assets/assets_shop/') ?>js/scripts.js"></script>
        <script src="<?php echo base_url('assets/assets_shop/') ?>js/vanilla-tilt.min.js"></script>
        <script type="text/javascript">
            VanillaTilt.init(document.querySelectorAll(".box"), {
                max: 25,
                speed: 400
            });
            
            //It also supports NodeList
            VanillaTilt.init(document.querySelectorAll(".your-element"));
        </script>
    </body>
</html>