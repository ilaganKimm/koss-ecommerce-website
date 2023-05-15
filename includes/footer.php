
<script src ="assets/js/jquery-3.6.4.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/custom.js"></script>


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script> 

  alertify.set('notifier','position', 'top-center');  
    <?php 
      if(isset($_SESSION['message'])) 
      { 
      ?>
        alertify.success('<?= $_SESSION['message'] ?>');
      <?php 
        unset($_SESSION['message']);
      }
      ?>

  </script>

<script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>
<footer class="bg-dark p-3 mt-10 text-white text-center ">

    <p>&copy 2023 | Kim Ilagan. All rights reserved.</p>

</footer>
</html>