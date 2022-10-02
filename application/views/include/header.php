<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $title; ?></title>
</head>

<style>
    body{
        background-color: #EFEAD8;
    }

    nav{
        background-color: #5F7161;
    }

    .navbar button {
        background-color: #6D8B74;
    }


    .nav-link {
        color: white;
        background-color: #6D8B74;
    }

    .nav-link:hover {
        color: black;
    }

    nav .fa{
        color: white;
    }

    nav .fa:hover{
        color: black;
        background-color: #6D8B74;
    }
    
    footer{
        background-color: #5F7161;
    }

    .center{
        text-align: center;
    }

    .center .btn{
        width: 180px;
    }

    .photo{
        background-color: #D0C9C0;
    }

    .text{
        background-color: #5F7161;
    }

    .pads{
        padding: 20px;
    }

    #pills-text-tab{
        background-color: #5F7161 ;
    }
    #pills-photo-tab{
        background-color: #D0C9C0;
    }

    .card-header{
        background-color: #6D8B74;
        color: #EFEAD8;
    }

    .modal-header{
        background-color: #6D8B74;
        color: #EFEAD8;
    }

    .bd-placeholder-img{
        width: 300px;
        height:240px;
        border-radius: 20px;
        margin: 5px;
    }

    .input-group{
        border-radius: 5px;
        background-color: grey;
        padding: 2px;
    }

    .card-title-text{
        color:#EFEAD8;
    }

    
</style>
<body class="d-flex flex-column min-vh-100">