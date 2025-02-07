CREATE TABLE roles (
    id_roles SERIAL PRIMARY KEY,
    titre VARCHAR(100) NOT NULL
);

CREATE TABLE users (
    id_users SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role_id INT NOT NULL REFERENCES roles(id_roles)
);

CREATE TABLE repport (
    id_repport SERIAL PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    user_id INT NOT NULL REFERENCES users(id_users)
);

CREATE TABLE categories (
    id_categories SERIAL PRIMARY KEY,
    titre VARCHAR(100) NOT NULL
);

ALTER TABLE categories add column parent_id INT REFERENCES categories(id_categories);

CREATE TABLE produits (
    id_produits SERIAL PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    image VARCHAR(100) NOT NULL,
    rating DECIMAL(2, 1) NOT NULL,
    categorie_id INT NOT NULL REFERENCES categories(id_categories),
    user_id INT NOT NULL REFERENCES users(id_users)
);

insert into roles (titre) values ('admin'),('user'),('vendeur');

insert into users (nom,prenom,email,password,role_id) values ('admin','admin','admin@admin.com','$2y$10$t7eYREEKN0GptOEWoAh0rOwb2Gs4K0deHmQIzdkMNUKJqLI/VtEn2',1);
-- mot de passe : *MKg16bv4z*b!Xc0!hjq^U8F9JN%

insert into users (nom,prenom,email,password,role_id) values ('ven', 'deur', 'vendeur@vendeur.com', '$2y$10$iQfhYyqp/AFYbD.rWcycXepbC0ZhbbnYJHB/imSRNotMnplB/tXPu', 3);

insert into categories (titre) values ('cuisine'),('sport'),('jeux'),('informatique'),('vetements');

insert into categories (titre,parent_id) values ('couteaux',1),('ballons',2),('jeux de societe',3),('ordinateurs',4),('t-shirts',5);

insert into produits (titre,description,prix,image,rating,categorie_id,user_id) values
('couteau de cuisine','couteau de cuisine en acier inoxydable',10.00,'couteau.jpg',5.0,6,2),
('ballon de foot','ballon de foot en cuir',20.00,'ballon.jpg',4.0,7,2),
('monopoly','jeu de societe monopoly',30.00,'monopoly.jpg',3.0,8,2),
('macbook pro','ordinateur portable macbook pro',1000.00,'macbook.jpg',5.0,9,2),
('t-shirt blanc','t-shirt blanc en coton',10.00,'tshirt.jpg',5.0,10,2),
('t-shirt noir','t-shirt noir en coton',10.00,'tshirt.jpg',5.0,10,2);
