alter table Comments
  add constraint fk_recipe_id_comments FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id);
alter table RecipeIngredients
  add constraint fk_recipe_id_recipeingredients FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id),
  add constraint fk_ingredient_id_recipeingredients FOREIGN KEY (ingredient_id) REFERENCES Ingredients(ingredient_id);
