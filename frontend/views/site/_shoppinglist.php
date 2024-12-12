<?php
if (Yii::app()->user->isGuest)
{
    $currentDate = date('y-m-d');
    $recipeOfDay = RecipesOfDay::model()->findAll(array(
        'condition' => 'rod_day >= :date',
        'params' => array(':date' => $currentDate),
            ), array('limit' => 7));
    ?>
    <ul class="shopping-list">
        <?php
        $categories = Category::model()->findAllByAttributes(array('cat_type' => 'Ingredient'));
        foreach ($categories as $category)
        {
            ?>
            <li class="shoppingcategory">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">

                    <span class="title green"><?php echo $category->cat_name; ?></span>
                    <ul class="shopping-inner">
                        <?php
                        $data = array();
                        foreach ($recipeOfDay as $recipe)
                        {
                            $recipe_ingredients = RecipeIngredient::model()->findAllByAttributes(array('recipe_id' => $recipe->recipeid, 'ingcat' => $category->id));
                            foreach ($recipe_ingredients as $key => $value)
                            {
                                $current_id = $value['ingredient_id'];
                                if (!isset($data[$current_id]['amount']))
                                    $data[$current_id]['amount'] = 0;
                                $data[$current_id]['ingredient_id'] = $current_id;
                                $data[$current_id]['amount'] += $value['amount'];
                            }
                        }
                        foreach ($data as $info)
                        {
                            $info['amount'];
                            $ingredient_information = Ingredient::model()->findByPk($info['ingredient_id']);
                            $ingredient_information->ingredient;
                            ?>
                            <li><?php echo $info['amount'] . ' ' . $value->measure->measurement . ' ' . $ingredient_information->ingredient; ?> </li>
                        <?php } ?>
                    </ul>

                </div>
            </li>
        <?php } ?>
    </ul>     


    <?php
} else
{
    $all_recipes = array();
    $currentDate = date('y-m-d');
    $admin_recipes = RecipesOfDay::model()->findAll(array(
        'condition' => 'rod_day >= :date',
        'params' => array(':date' => $currentDate),
            ), array('limit' => 7));

    $user_recipes = UserMeal::model()->findAll(array(
        'condition' => 'recipe_date >= :date',
        'condition' => 'member_id = ' . Yii::app()->user->id,
        'params' => array(':date' => $currentDate),
            ), array('limit' => 7));

    foreach ($user_recipes as $recipe)
    {
        $recipe = array(
            'recipeid' => $recipe['recipe_id'],
            'recipe_date' => $recipe['recipe_date'],
        );
        array_push($all_recipes, $recipe);
    }

    foreach ($admin_recipes as $recipe)
    {
        $recipe = array(
            'recipeid' => $recipe['recipeid'],
            'recipe_date' => $recipe['rod_day'],
        );
        array_push($all_recipes, $recipe);
    }
    ?>

    <ul class="shopping-list">
        <?php
        $categories = Category::model()->findAllByAttributes(array('cat_type' => 'Ingredient'));

        foreach ($categories as $category)
        {
            ?>
            <li class="shoppingcategory">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">

                    <span class="title green category-name" ><?php echo $category->cat_name; ?></span>
                    <ul class="shopping-inner">
                        <?php
                        $data = array();
                        foreach ($all_recipes as $recipe)
                        {

//            CVarDumper::dump($recipe,10,1);exit;
                            $recipe_ingredients = RecipeIngredient::model()->findAllByAttributes(array('recipe_id' => $recipe, 'ingcat' => $category->id));
                            foreach ($recipe_ingredients as $key => $value)
                            {
                                $current_id = $value['ingredient_id'];
                                if (!isset($data[$current_id]['amount']))
                                    $data[$current_id]['amount'] = 0;
                                $data[$current_id]['ingredient_id'] = $current_id;
                                $data[$current_id]['amount'] += $value['amount'];
                                // $data[$current_id]['unit']=$value['weight_unit'];
                            }
                        }
                        foreach ($data as $info)
                        {
                            $info['amount'];
                            $ingredient_information = Ingredient::model()->findByPk($info['ingredient_id']);
                            $ingredient_information->ingredient;
                            ?>
                            <li><?php echo $info['amount'] . ' ' . $value->measure->measurement . " " . $ingredient_information->ingredient; ?> </li>
                        <?php } ?>
                    </ul>

                </div>
            </li>
        <?php } ?>
    </ul>   

<?php } ?>