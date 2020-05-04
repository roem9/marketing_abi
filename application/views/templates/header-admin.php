<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    

    <!-- Custom fonts for this template-->
    <link href="<?= base_url()?>assets/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- <link href="<?= base_url()?>assets/css/simple-sidebar.css" rel="stylesheet"> -->
    
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/style3.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <title><?= $title?></title>
</head>

<body>
    
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="list-group list-group-flush mt-3">
            <a href="<?= base_url()?>admin/materimarketing" class="list-group-item list-group-item-action <?php if($title == 'Materi Marketing'){echo 'bg-primary text-light';}else{echo 'bg-light text-dark';}?>"><i class="fa fa-book mr-2"></i>Materi Marketing</a>
            <a href="<?= base_url()?>admin/materiproduk" class="list-group-item list-group-item-action <?php if($title == 'Materi Produk'){echo 'bg-primary text-light';}else{echo 'bg-light text-dark';}?>"><i class="fa fa-book mr-2"></i>Materi Produk</a>
            <a href="<?= base_url()?>admin/marketing" class="list-group-item list-group-item-action <?php if($title == 'List Marketing'){echo 'bg-primary text-light';}else{echo 'bg-light text-dark';}?>"><i class="fa fa-users mr-2"></i>List Marketing</a>
            <a href="<?= base_url()?>admin/konfirmmarketing" class="list-group-item list-group-item-action <?php if($title == 'Konfirmasi Marketing'){echo 'bg-primary text-light';}else{echo 'bg-light text-dark';}?>"><i class="fa fa-user-check mr-2"></i>Konfirmasi Marketing</a>
            <a href="<?= base_url()?>login/logout" class="list-group-item list-group-item-action" onclick="return confirm('Yakin akan keluar?')"><i class="fa fa-sign-out-alt mr-2"></i>Logout</a>
        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <div class="sticky-top navbar-ku">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container">
                    <a id="sidebarCollapse" class="btn btn-sm"><i class="fa fa-bars text-light mr-3"></i><span class="text-light"><b><?= $title?></b></span></span></a>
                </div>
            </nav>
            <?php if($title == 'List Marketing'):?>
                <!-- <div class="col-12 col-md-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="nama_marketing" placeholder="nama marketing" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <a href="#" class="input-group-text" id="btnSearch"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div> -->
            <?php endif;?>
        </div>
