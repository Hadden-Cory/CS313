<html><head>
    <title>TotallyNotAScam.com-Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="plants.css">
    <link rel="stylesheet" type="text/css" href="scam.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="plants.js"></script>
    <script src="scam.js"></script>
</head>

<body>
    <?php include("header.php"); ?>
    <Section>
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1>Cart</h1><br>
                    <p><?php echo $_POST["quantity"]; ?></p>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="/week03ponder/seeds.jpg" class="img-fluid img-thumbnail mx-auto d-block" alt="Seeds">
            </div>
            <div class="col-4">
                <div class="jumbotron">
                    <h1>Order Now<h1><br>
                            <form action="cart.php" method="post">
                                <div class="form-group">
                                    How Many<select name="quantity" class="form-control" id="quantity">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        </select><br>
                                        <button type="submit" class="btn-lg btn-info">Order</button>
                                        
                                </div>
                            </form>
                </div>
            </div>
            <div class="col-4">
                <img src="/week03ponder/gummy.jpg" class="img-fluid img-thumbnail mx-auto d-block" alt="Gummy Bears">
            </div>
        </div>
    </Section>
</body>

</html>