<!DOCTYPE html>
<html lang="en">
<head>
    <title> CSUMB: Pet Shelter </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    
    <style>
        body {
            text-align: center;
        }
        .carousel {
            width: 500px;
            margin-left: auto; 
            margin-right: auto;
        }
        a {
            cursor: pointer;
        }
    </style>
</head>
        
   
    </head>
    <body onload="init()">
        
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">CSUMB Animal Shelter</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a id="home">Home</a></li>
                    <li><a id="adoptions">Adoptions</a></li>
                    <li><a id="about">About Us</a></li>
                </ul>
            </div>
        </nav>
        
        <div class="jumbotron">
          <h1> CSUMB Animal Shelter</h1>
          <h2> The "official" animal adoption website of CSUMB </h2>
        </div>
        
        <div id="mainActivity"></div>
        <div id="hidden"></div>
        
    </body>
    <script type="text/javascript" src="js/functions.js"></script>
</html>