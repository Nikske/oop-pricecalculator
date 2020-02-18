<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Price calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">

</head>
<body>
    <?php require 'includes/header.php'?>
    <section>
        <h4>Hello</h4>

        <!-- Customers -->
        <label for="customer">Customer:</label>
        <select name="customer" id="customer">
            <?php foreach ($customers as $customer) {
                echo '<option value="' . $customer->getId() . '">' . $customer->getName() . '</option>';
            } ?>
        </select>
        <!-- Products -->
        <label for="products">Products:</label>
        <select name="products" id="products">
            <?php foreach ($products as $product) {
                echo '<option value="' . $product->getId() . '">' . $product->getName() . '</option>';
            } ?>
        </select>
        <button type="submit" name="run" class="btn btn-dark">Search</button>

       </section>
    <?php require 'includes/footer.php'?>

</body>
</html>