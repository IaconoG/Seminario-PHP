<?php if (!empty($_SESSION['msg'])) { ?>
  <script>alert('<?php echo $_SESSION['msg']; ?>')</script>;
  <?php unset($_SESSION['msg']); ?>
<?php } ?>