<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Price calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="../style.css">-->

</head>
<body>
    <?php require 'includes/header.php'?>
    <section>
        <h4>Please make your choice</h4>
            <form method="post">
                <!-- Customers -->
                <label for="inputCustomers">Customer:</label>
                <select name="inputCustomers" id="inputCustomers">
                    <?php foreach ($_SESSION['customers'] as $customer) {
                        echo '<option value="' . $customer->getId() . '">' . $customer->getName() . '</option>';
                    } ?>
                </select>
                <!-- Products -->
                <label for="inputProducts">Products:</label>
                <select name="inputProducts" id="inputProducts">
                    <?php foreach ($_SESSION['products'] as $product) {
                        echo '<option value="' . $product->getId() . '">' . $product->getName() . '</option>';
                    } ?>
                </select>
                <button type="submit" name="run" class="btn btn-dark">Start</button>
        </form>
    </section>
    <section>
        <p>Thank you <?php echo $_SESSION['customers'][$_POST['inputCustomers']]->getName()?> for placing your order </p>

        <p>Your chosen product is   <?php echo $_SESSION['products'][$_POST['inputProducts']]->getName()?> and will be shipped out as soon as possible </p>
        <p>The original price is: &#8364; <?php echo $_SESSION['products'][$_POST['inputProducts']]->getPrice() ?></p>
    </section>
    <?php require 'includes/footer.php'?>
</body>
</html>