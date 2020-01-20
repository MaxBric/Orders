INSERT INTO orders.customer (id, name, email, active, subscription_id, created_at, updated_at) VALUES (1, 'lala', 'lala@lala.com', 1, 1, '2020-01-20 20:04:22', '2020-01-20 20:04:47');
INSERT INTO orders.customer (id, name, email, active, subscription_id, created_at, updated_at) VALUES (2, 'toto', 'toto@toto.com', 1, 2, '2020-01-20 20:04:34', '2020-01-20 20:05:06');
INSERT INTO orders.customer (id, name, email, active, subscription_id, created_at, updated_at) VALUES (4, 'jeje', 'jeje@jeje.com', 1, 4, '2020-01-20 21:05:18', '2020-01-20 21:28:19');

INSERT INTO orders.subscription (id, customer_id, start_date, nextorder_date, day_iteration, active, created_at, updated_at) VALUES (1, 1, '2020-01-20', '2020-02-19', 20, 1, '2020-01-20 20:04:47', '2020-01-20 22:23:05');
INSERT INTO orders.subscription (id, customer_id, start_date, nextorder_date, day_iteration, active, created_at, updated_at) VALUES (2, 2, '2020-01-23', '2020-02-12', 20, 1, '2020-01-20 20:05:06', '2020-01-20 20:05:50');
INSERT INTO orders.subscription (id, customer_id, start_date, nextorder_date, day_iteration, active, created_at, updated_at) VALUES (4, 4, '2020-01-20', '2020-02-19', 30, 1, '2020-01-20 21:28:19', '2020-01-20 21:28:42');

INSERT INTO orders.`order` (id, customer_id, subscription_id, status, total, paid_date, created_at, updated_at) VALUES (1, 1, 1, 'paid', 13, '2020-01-20', '2020-01-20 20:05:43', '2020-01-20 20:05:43');
INSERT INTO orders.`order` (id, customer_id, subscription_id, status, total, paid_date, created_at, updated_at) VALUES (2, 1, 1, 'paid', 16, '2020-02-19', '2020-01-20 20:05:46', '2020-01-20 20:05:46');
INSERT INTO orders.`order` (id, customer_id, subscription_id, status, total, paid_date, created_at, updated_at) VALUES (3, 1, 1, 'paid', 93, '2020-02-19', '2020-01-20 20:05:47', '2020-01-20 20:05:47');
INSERT INTO orders.`order` (id, customer_id, subscription_id, status, total, paid_date, created_at, updated_at) VALUES (4, 2, 2, 'paid', 92, '2020-01-23', '2020-01-20 20:05:50', '2020-01-20 20:05:50');
INSERT INTO orders.`order` (id, customer_id, subscription_id, status, total, paid_date, created_at, updated_at) VALUES (5, 2, 2, 'paid', 62, '2020-02-12', '2020-01-20 20:05:51', '2020-01-20 20:05:51');
INSERT INTO orders.`order` (id, customer_id, subscription_id, status, total, paid_date, created_at, updated_at) VALUES (6, 2, 2, 'paid', 91, '2020-02-12', '2020-01-20 20:05:54', '2020-01-20 20:05:54');
INSERT INTO orders.`order` (id, customer_id, subscription_id, status, total, paid_date, created_at, updated_at) VALUES (7, 2, 2, 'paid', 85, '2020-02-12', '2020-01-20 20:05:55', '2020-01-20 20:05:55');
INSERT INTO orders.`order` (id, customer_id, subscription_id, status, total, paid_date, created_at, updated_at) VALUES (8, 2, 2, 'paid', 15, '2020-02-12', '2020-01-20 20:05:59', '2020-01-20 20:05:59');
INSERT INTO orders.`order` (id, customer_id, subscription_id, status, total, paid_date, created_at, updated_at) VALUES (9, 4, 4, 'paid', 100, '2020-01-20', '2020-01-20 21:28:42', '2020-01-20 21:28:42');

INSERT INTO orders.delivery (id, order_id, status, delivery_date, created_at, updated_at) VALUES (1, 1, 'shipped', '2020-01-20', '2020-01-20 21:52:20', '2020-01-20 21:52:20');
INSERT INTO orders.delivery (id, order_id, status, delivery_date, created_at, updated_at) VALUES (2, 1, 'shipped', '2020-01-20', '2020-01-20 21:53:15', '2020-01-20 21:53:15');
INSERT INTO orders.delivery (id, order_id, status, delivery_date, created_at, updated_at) VALUES (3, 1, 'shipped', '2020-01-20', '2020-01-20 21:54:33', '2020-01-20 21:54:33');
