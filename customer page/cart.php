<?php

include '../backend/db.php';

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login_index.php");
    exit;
}

// Get user_id from session
$user_id = $_SESSION["id"];


if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
        $message[] = 'Product added to cart!';
    }
}

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:cart_index.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart_index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Ropa+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Ropa Sans', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .shopping-cart {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .heading {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 0.9em;
        }

        table th,
        table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        table th {
            background-color: #f9f9f9;
            font-weight: bold;
            text-transform: uppercase;
        }

        table td img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }

        table td form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table td form input[type="number"] {
            width: 60px;
            margin-right: 10px;
        }

        .option-btn,
        .delete-btn,
        .btn {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            font-size: 0.9em;
        }

        .option-btn {
            background-color: #5cb85c;
        }

        .delete-btn {
            background-color: #d9534f;
        }

        .btn {
            background-color: #0275d8;
            display: inline-block;
            text-align: center;
        }

        .btn.disabled,
        .delete-btn.disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .cart-btn {
            text-align: center;
        }

        .table-bottom {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="shopping-cart">
        <h1 class="heading">Shopping Cart</h1>

        <table>
            <thead class="thead">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $grand_total = 0;
                if (mysqli_num_rows($cart_query) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                ?>
                        <tr>
                            <td><img src="../product_images/<?php echo $fetch_cart['image']; ?>" alt=""></td>
                            <td><?php echo $fetch_cart['name']; ?></td>
                            <td>$<?php echo $fetch_cart['price']; ?>/-</td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                    <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                    <input type="submit" name="update_cart" value="Update" class="option-btn">
                                </form>
                            </td>
                            <td>$<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('Remove item from cart?');">Remove</a></td>
                        </tr>
                <?php
                        $grand_total += $sub_total;
                    }
                } else {
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                }
                ?>
                <tr class="table-bottom">
                    <td colspan="4">Grand Total :</td>
                    <td>$<?php echo $grand_total; ?>/-</td>
                    <td><a href="cart.php?delete_all" onclick="return confirm('Delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Delete All</a></td>
                </tr>
            </tbody>
        </table>

        <div class="cart-btn">
            <a href="bikes_index.php" role="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
            <a href="checkout.php" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Proceed to Checkout</a>
        </div>
    </div>
</body>

</html>