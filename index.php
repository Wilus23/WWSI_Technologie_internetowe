<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
</head>
<body>

    <header>

        <div class="logo">
            <a href="./index.html" target="_blank"><img src="./assets/logo.png" alt="logo"></a>
        </div>

        <div class="slogan">
            <h2>Pasibrzuch - Twój najedzony brzuszek</h2>
        </div>
    </header>

    <section class="hero">

        <div class="hero_text">
            <h1>Najlepsze jedzenie na Twoje wydarzenie</h1>
            <h2>Wybierz dania, wypełnij formularz, ustal datę, zjedz!</h2>
        </div>

        <div class="scroll-downs">
            <div class="mousey">
              <div class="scroller"></div>
            </div>
        </div>
    </section>
    
    <section class="przystawki">

        <h2 class="tytul">Przystawki</h2>
        <div class="divider"></div>
        <div class="container" style="width: 100%">
        <h2>Dodaj produkt</h2>
        <?php
    session_start();
    $database_name = "Product_details";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="index.php"</script>';
            }else{
                echo '<script>alert("Produkt dodany do koszyka")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product został usunięty...!")</script>';
                    echo '<script>window.location="index.php"</script>';
                }
            }
        }
    }
?>
        <?php
            $query = "SELECT * FROM product ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="">

                        <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["pname"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Dodaj do koszyka">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>  
        <?php
            $query = "SELECT * FROM product ORDER BY id ASC";
            $result = mysqli_query($con, $query)
        ?>

        <div>
            <form method="post" action="index.php?action=add&id=<?php echo $row["id"] ?>">
                    <div class="product">
                        <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                        <!-- <h5 class="text-info"><?php $row["pname"]; ?></h5>
                        <h5 class="text-danger"><?php $row["price"]; ?></h5> -->
                        <input type="text" name="quantity" class="form-controll" value="1">
                        <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                        <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
                    </div>
            </form>
        </div>


        <ul class="col col1">
            <li>
                <img src="./assets/1.jpg" alt="">
                <h3>Pizza</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus hic eaque minima neque magni.</p>
                <a href=""><button>Zamów</button></a>
            </li>
            <li>
                <img src="./assets/1.jpg" alt="">
                <h3>Pizza</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus hic eaque minima neque magni.</p>
                <a href=""><button>Zamów</button></a>
            </li>
            <li>
                <img src="./assets/1.jpg" alt="">
                <h3>Pizza</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus hic eaque minima neque magni.</p>
                <a href=""><button>Zamów</button></a>
            </li>
        </ul>

        <h2 class="tytul">Dania główne</h2>
        <div class="divider"></div>
        <ul class="col col2">
            <li>
                <img src="./assets/1.jpg" alt="">
                <h3>Pizza</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus hic eaque minima neque magni.</p>
                <a href=""><button>Zamów</button></a>
            </li>
            <li>
                <img src="./assets/1.jpg" alt="">
                <h3>Pizza</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus hic eaque minima neque magni.</p>
                <a href=""><button>Zamów</button></a>
            </li>
            <li>
                <img src="./assets/1.jpg" alt="">
                <h3>Pizza</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus hic eaque minima neque magni.</p>
                <a href=""><button>Zamów</button></a>
            </li>
        </ul>

        <h2 class="tytul">Koktajle i inne napoje</h2>
        <div class="divider"></div>
        <ul class="col col3">
            <li>
                <img src="./assets/1.jpg" alt="">
                <h3>Pizza</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus hic eaque minima neque magni.</p>
                <a href=""><button>Zamów</button></a>
            </li>
            <li>
                <img src="./assets/1.jpg" alt="">
                <h3>Pizza</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus hic eaque minima neque magni.</p>
                <a href=""><button>Zamów</button></a>
            </li>
            <li>
                <img src="./assets/1.jpg" alt="">
                <h3>Pizza</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus hic eaque minima neque magni.</p>
                <a href=""><button>Zamów</button></a>
            </li>
        </ul>
    </section>


    <section>



<script>async function validateForm() {
    var fname = document.forms["contactForm"]["fname"].value;
    var sname = document.forms["contactForm"]["sname"].value;
    var validate = document.forms["contactForm"]["validate"].value;

    if (fname == null || fname == "") {
        alert("Wypełnij nazwisko");
        return false;
    } else if (sname == null || sname == "") {
        alert("Wypełnij nazwisko");
        return false;
    } else if (validate != 6) {
        alert("Podaj poprawny wynik");
        return false;
    }
}</script>

<form name="contactForm" action="" onsubmit="return validateForm()" method="post">
  
  <label for="fname">Imię:</label> 
  <input type="text" name="fname" id="fname">
  <label for="sname">Nazwisko:</label> 
  <input type="text" name="sname" id="sname">
   <label for="validate">Ile jest 5+1?</label> 
  <input type="text" name="validate" id="validate">
  <input type="submit" value="Submit">
  
</form>


    </section>
    <footer>

        <div class="data">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1456.5896734550377!2d21.09123741798868!3d52.12191328204286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47192c52b663fbbd%3A0x63d89cc7c8123fcf!2sCuda%20Wianki!5e0!3m2!1spl!2spl!4v1644343062388!5m2!1spl!2spl" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <ul>
                <h3>Adres</h3>
                <li>Testowa 1</li>
                <li>00-000</li>
                <li>Warszawa</li>

                <h3>Dane kontaktowe</h3>
                <li>Adam Kowalski</li>
                <li>biuro@testowymail.com</li>
                <li>Tel. 123-456-789</li>
            </ul>
        </div>

        <div class="shortcuts">
            <ul>
                <h3>Na skróty</h3>
                <li><a href="">Strona główna</a></li>
                <li><a href="">Kontakt</a></li>
            </ul>
        </div>
    </footer>

</body>
</html>