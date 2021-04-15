<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>


<section>
<div class="container">
<div class="row" style="margin-top:45px">
    <h3>Sign Up</h3>

    <form action="<?= base_url('auth/save'); ?>" method="post">
    <?= csrf_field(); ?>
    <?php if(!empty(session()->getFlashdata('fail'))) : ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('fail');?></div>
    <?php endif ?>
    <?php if(!empty(session()->getFlashdata('success'))) : ?>
      <div class="alert alert-success"><?= session()->getFlashdata('success');?></div>
    <?php endif ?>
    <div class="form-group">
        <label for="">Name </label>
        <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
        <span class="text-danger">  <?php if(!empty($validation)){
              echo $error = $validation->getError('name'); }?></span>
    </div>
    <div class="form-group">
        <label for="">Email </label>
        <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
        <span class="text-danger">  <?php if(!empty($validation)){
              echo $error = $validation->getError('email'); }?></span>
    </div>
    <div class="form-group">
        <label for="">Password </label>
        <input type="text" class="form-control" name="password" placeholder="Enter Your Password">
        <span class="text-danger">  <?php if(!empty($validation)){
              echo $error = $validation->getError('password'); }?></span>
    </div>
    <div class="form-group">
        <label for="">Confirm Password </label>
        <input type="text" class="form-control" name="cpassword" placeholder="Enter Confirm Password">
        <span class="text-danger">  <?php if(!empty($validation)){
              echo $error = $validation->getError('cpassword'); }?></span>
    </div>
    <div class="form-group">
       <button class="btn btn-primary btn-block" type="submit">Sign Up </button>
    </div>
    <a href="<?php echo base_url('/auth')?>">Already Sign Up</a>

    </form>

</div>
</div>
</section>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
