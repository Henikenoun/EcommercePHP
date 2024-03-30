</div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      avatar = document.getElementById('avatar');
      list = document.getElementById('list');
      avatar.addEventListener('click', () => {
        list.classList.toggle('invisible')
      } );
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <?php 
        if($link == 'admin.php')
          echo "<script src='assets/select2.js'></script>";
        else
            echo "<script src='../assets/select2.js'></script>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>