<!DOCTYPE html>
<html>
    <head>
        <title>Book Mart</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body{               
                background-repeat: no-repeat;
                background-size: cover;
                background-color: black;  
            }
            .txt{
                font-family: Georgia Black;
                text-indent:15%;
            }
            .container-fluid{
                background-size: cover;
                background-position: bottom;
            }
            .bgimg{
                background-image: url('title1.jpg');
                height: 250px;
            } 
            .checked {
                color: orange;
            }
            
            #points{
                width: 135px;
                padding: 8px;
                border-radius: 10px;
                border: 1px solid gray;
                margin: 0; 
            }
            .container{
                border:1px solid grey;
                box-shadow: 0.5px 0.5px 1px black;
                background-color: white;
            }
            hr{
                width:90%;
                border: 1px solid grey;
            }
            .image{
                height:210px;
                width: 100%;
                
            }
            .row{
                padding:12px;
            }
            .title{
                font-size:18px;
            }     
            .det{
                font-size:14px;
            }
            .affix {
      			top: 0;
      			width: 100%;
      			z-index: 9999 !important;
  			}
			.affix + .container-fluid {
     			padding-top: 70px;
 			}
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        

        <script>
        </script>
    </head>
    <body >    
        <div class="container-fluid bgimg"  >
            <br><br><br><br><br><br>
            <b><h1 class="txt">BOOKMART</h1> </b>
            <p class="txt">The biggest online book store!</p> 
        
        
            <nav id="navb" data-spy="affix" data-offset-top="225" class="navbar navbar-inverse" >
                <div class="container-fluid">
                    <span class="text-danger">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">BookMart</a>
                        </div>
                        <ul class="nav navbar-nav" style="text-indent:0%">
                            <li class=""><a href="home.html">Home</a></li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Thriller</a></li>
                                <li><a href="#">Classic</a></li>
                                <li><a href="#">Adventure</a></li>
                            </ul>
                            </li>
                            <li><a href="#">My Orders</a></li>
                            <li><a href="profile.html">Profile</a></li>
                        </ul>
                        <form class="navbar-form navbar-left" action="">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Search a book!">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>
                            </button>
                          </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li ><a>Username</a> </li>
                            <li ><a></a>
                            </li>
                        </ul>
                    </span>
                </div>
            </nav>       
        
            <div class="container" style="border-radius: 5px" >
                <div class="row ">
                    <br>
                    <div class="col-sm-2">     
                        <span><img class="img-responsive image" src = "https://www.booksofbuderim.com.au/wp-content/uploads/2016/05/Paper-Towns-MTI-Cover-521x710.jpg"></span>
                    </div>
                    <div class="col-sm-10">
                        <p class="title">Paper Towns</p>
                        <p class="det">John Green</p>
                        <p class="det">Tags: Classic, Novel</p>
                        <p class="det">Date of Purchase: 3<sup>rd</sup> April, 2018</p>
                        <p class="det">Delivery status : progress?</p>
                        <p class="det">Seller : seller1</p>
                        <p class="det">Price : Rs 348</p>

                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="col-sm-2">     
                        <span><img class="img-responsive image" src = "https://images-na.ssl-images-amazon.com/images/I/5114SGc8lmL._SX356_BO1,204,203,200_.jpg"></span>
                    </div>
                    <div class="col-sm-10">
                        <p class="title">Tom Sawyer</p>
                        <p class="det">Mark Twain</p>
                        <p class="det">Tags: Classic, Novel</p>
                        <p class="det">Date of Purchase: 3<sup>rd</sup> April, 2018</p>
                        <p class="det">Delivery status : progress?</p>
                        <p class="det">Seller : seller1</p>
                        <p class="det">Price : Rs 348</p>

                    </div>
                </div>
                <hr>
                <div class="row ">
                    <div class="col-sm-2">     
                        <span><img class="img-responsive image" src = "https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4722/9781472234353.jpg"></span>
                    </div>
                    <div class="col-sm-10">
                        <p class="title">Neverwhere</p>
                        <p class="det">Neil Gaiman</p>
                        <p class="det">Tags: Classic, Novel</p>
                        <p class="det">Date of Purchase: 3<sup>rd</sup> April, 2018</p>
                        <p class="det">Delivery status : progress?</p>
                        <p class="det">Seller : seller1</p>
                        <p class="det">Price : Rs 348</p>    
                    </div>    
                </div>
            <br>
            </div>
            <br>
        </div>
        
    </body>
</html>