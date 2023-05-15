<footer class="footer pt-5 pb-3 bg-tertiary">
      <div class="container-fluid">
       
            <p class=" text-sm mb-0 text-center text-capitalize"> &copy 2022-2023 | Designed By Kim Ilagan</p>
          
      </div>
</footer>

  
  <script src="assets/js/jquery-3.6.4.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="assets/js/custom.js"></script>

  
  
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(".sidebar ul li").on('click', function(){
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');

    });

    $('.open-btn').on('click', function (){
            $('.sidebar').addClass('active');
            
       
    });

    $('.close-btn').on('click', function (){
            $('.sidebar').removeClass('active');
            
       
    });

  </script>

  <script> 
    <?php 

    if(isset($_SESSION['message'])) 
    { 
    ?>
      alertify.set('notifier','position', 'top-center');
      alertify.success('<?= $_SESSION['message'] ?>');
    
    <?php 
      unset($_SESSION['message']);
    }
    ?>

  </script>

</body>
</html>