CREATE DATABASE toro_advertising;

USE toro_advertising;

GRANT ALL PRIVILEGES ON *.* TO 'toro_pizza'@'localhost' IDENTIFIED BY 'thebestpizzaontheuniverse';

CREATE TABLE ingredients(id_ingredient smallint unsigned NOT NULL AUTO_INCREMENT, name varchar(100) NOT NULL, cost decimal(5,2) unsigned NOT NULL, PRIMARY KEY(id_ingredient));

CREATE TABLE pizzas(id_pizza smallint unsigned NOT NULL AUTO_INCREMENT, name varchar(70) NOT NULL, cost decimal(5,2) unsigned NOT NULL, PRIMARY KEY(id_pizza));

CREATE TABLE recipes(id_pizza smallint unsigned NOT NULL, id_ingredient smallint unsigned NOT NULL, FOREIGN KEY(id_pizza) REFERENCES pizzas(id_pizza), FOREIGN KEY(id_ingredient) REFERENCES ingredients(id_ingredient));

INSERT INTO ingredients(name, cost) VALUES('Salsa de tomate', 0.5);
INSERT INTO ingredients(name, cost) VALUES('Pepperoni', 1.5);
INSERT INTO ingredients(name, cost) VALUES('Carne de cerdo', 2);
INSERT INTO ingredients(name, cost) VALUES('Queso mozzarella', 0.5);
INSERT INTO ingredients(name, cost) VALUES('Especias italianas', 0.5);
INSERT INTO ingredients(name, cost) VALUES('Salsa barbacoa', 0.5);
INSERT INTO ingredients(name, cost) VALUES('Carne de ternera', 2.5);
INSERT INTO ingredients(name, cost) VALUES('Bacon', 1);
INSERT INTO ingredients(name, cost) VALUES('Pollo', 1.5);
INSERT INTO ingredients(name, cost) VALUES('Cebolla en pluma', 0.5);
INSERT INTO ingredients(name, cost) VALUES('Jamon cocido', 1);
INSERT INTO ingredients(name, cost) VALUES('Pimiento verde', 0.5);
INSERT INTO ingredients(name, cost) VALUES('Champinones portobello', 1.5);
INSERT INTO ingredients(name, cost) VALUES('Tomate en rodajas', 0.5);
INSERT INTO ingredients(name, cost) VALUES('Aceitunas negras', 0.5);
INSERT INTO ingredients(name, cost) VALUES('Aceitunas verdes', 0.5);

INSERT INTO pizzas(name, cost) VALUES('Especial', 0);
INSERT INTO pizzas(name, cost) VALUES('Barbacoa', 0);
INSERT INTO pizzas(name, cost) VALUES('Carnivora', 0);
INSERT INTO pizzas(name, cost) VALUES('Vegetariana', 0);

INSERT INTO recipes(id_pizza, id_ingredient) VALUES(1, 1);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(1, 2);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(1, 3);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(1, 4);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(1, 5);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(1, 16);

INSERT INTO recipes(id_pizza, id_ingredient) VALUES(2, 6);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(2, 7);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(2, 8);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(2, 9);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(2, 10);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(2, 4);

INSERT INTO recipes(id_pizza, id_ingredient) VALUES(3, 1);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(3, 2);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(3, 11);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(3, 3);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(3, 8);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(3, 7);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(3, 4);

INSERT INTO recipes(id_pizza, id_ingredient) VALUES(4, 1);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(4, 10);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(4, 12);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(4, 15);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(4, 14);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(4, 13);
INSERT INTO recipes(id_pizza, id_ingredient) VALUES(4, 4);

UPDATE pizzas SET cost = (SELECT sum(cost)*1.5 from ingredients WHERE id_ingredient IN(SELECT id_ingredient from recipes WHERE id_pizza = 1)) WHERE id_pizza = 1;
UPDATE pizzas SET cost = (SELECT sum(cost)*1.5 from ingredients WHERE id_ingredient IN(SELECT id_ingredient from recipes WHERE id_pizza = 2)) WHERE id_pizza = 2;
UPDATE pizzas SET cost = (SELECT sum(cost)*1.5 from ingredients WHERE id_ingredient IN(SELECT id_ingredient from recipes WHERE id_pizza = 3)) WHERE id_pizza = 3;
UPDATE pizzas SET cost = (SELECT sum(cost)*1.5 from ingredients WHERE id_ingredient IN(SELECT id_ingredient from recipes WHERE id_pizza = 4)) WHERE id_pizza = 4;

