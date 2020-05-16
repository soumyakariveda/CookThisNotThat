drop database CookThisNotThatDB;
create database CookThisNotThatDB;
use CookThisNotThatDB;


create table Ingredients(
  ingredient_id int AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  is_selected tinyint(1),
  constraint pk_department PRIMARY KEY (ingredient_id)
);


create table Recipes(
  recipe_id int AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  directions varchar(1000) NOT NULL,
  cooking_time int NOT NULL,
  calories int,
  category varchar(30),
  verified tinyint(1),
  constraint pk_department PRIMARY KEY (recipe_id)
);


create table Comments(
  comment_id int AUTO_INCREMENT,
  recipe_id int,
  comment varchar(100),
  comment_date date,
  constraint pk_department PRIMARY KEY (comment_id)
);


create table RecipeIngredients(
  recipeingredient_id int AUTO_INCREMENT,
  recipe_id int,
  ingredient_id int,
  quantity varchar(50),
  constraint pk_department PRIMARY KEY (recipeingredient_id)
);
