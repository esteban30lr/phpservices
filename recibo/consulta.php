INSERT INTO recibo (id_producto, total, id_cliente, fecha, cantidad) VALUES (777, (SELECT precio FROM producto WHERE id_producto = 777), 6668, '2023-05-29', 1);

SELECT SUM(total) AS suma_total FROM recibo WHERE id_cliente = 6668;


