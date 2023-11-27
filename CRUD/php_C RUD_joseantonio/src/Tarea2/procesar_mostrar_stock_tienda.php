<?php

require_once '../db_config/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $store_id = isset($_POST["store_id"]) ? $_POST["store_id"] : null;
    $stock_quantity = isset($_POST["stock_quantity"]) ? intval($_POST["stock_quantity"]) : null;

    try {
        if ($store_id !== null && $stock_quantity !== null) {
            $database = Database::getInstance();
            $conn = $database->getConnection();

            // Obtener el id_product correspondiente (por ejemplo, el primer producto)
            $sql_get_product_id = "SELECT id FROM Products LIMIT 1";
            $result_product_id = $conn->query($sql_get_product_id);

            if ($result_product_id->num_rows > 0) {
                $row = $result_product_id->fetch_assoc();
                $id_product = $row['id'];

                // Verificar si ya existe un registro para la tienda en Stores_Products
                $sql_check_existing = "SELECT stock_quantity FROM Stores_Products WHERE id_store=? AND id_product=?";
                $stmt_check_existing = $conn->prepare($sql_check_existing);
                $stmt_check_existing->bind_param('ii', $store_id, $id_product);
                $stmt_check_existing->execute();
                $stmt_check_existing->bind_result($existing_stock);
                $stmt_check_existing->fetch();
                $stmt_check_existing->close();

                if ($existing_stock === null) {
                    // Si no hay stock existente, insertar un nuevo registro
                    $sql_insert_stock = "INSERT INTO Stores_Products (id_store, id_product, stock_quantity) VALUES (?, ?, ?)";
                    $stmt_insert_stock = $conn->prepare($sql_insert_stock);
                    $stmt_insert_stock->bind_param('iii', $store_id, $id_product, $stock_quantity);
                    $stmt_insert_stock->execute();
                    $stmt_insert_stock->close();
                } else {
                    // Si hay stock existente, actualizar el stock
                    $new_stock_quantity = $existing_stock + $stock_quantity;

                    $sql_update_stock = "UPDATE Stores_Products SET stock_quantity=? WHERE id_store=? AND id_product=?";
                    $stmt_update_stock = $conn->prepare($sql_update_stock);
                    $stmt_update_stock->bind_param('iii', $new_stock_quantity, $store_id, $id_product);
                    $stmt_update_stock->execute();
                    $stmt_update_stock->close();
                }

                // Redirigir a la página de lista de tiendas después de la actualización
                header("Location: index2.php");
                exit;
            } else {
                echo "Error: No se encontró ningún producto.";
            }
        } else {
            echo "Error: Datos incompletos.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar la conexión a la base de datos
        $conn->close();
    }
} else {
    echo "Error: Método de solicitud no válido.";
}
