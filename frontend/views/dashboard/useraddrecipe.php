<script>
    $(document).ready(function() {
        $("#e1").select2();
    });
</script>
<!--======= Main Block ======-->
<div id="main-block">
    <!--======= Shopping List ======-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <br/>
        <!-- //////// Title Bar Start //////// -->
        <h2 class="home-title">Add New Recipe</h2>


        <span class="title green">Recipe Details</span>


        <div class="form-group col-lg-7 col-md-7 row">

            <div class="form-row">
                
                

                <?php
//                $tags = array('Satu', 'Dua', 'Tiga');
//                echo CHtml::textField('test', '', array('id' => 'test', 'style' => 'width:300px;'));
//                $this->widget('ext.select2.ESelect2', array(
//                    'selector' => '#test',
//                    'options' => array(
//                        'tags' => $tags,
//                    ),
//                ));
                ?>





                <input type="text" data-role="tagsinput" id="categories" />
                <div id="suggessions" style="z-index: 9999; border: 1px solid gray; height: 100px; display:none;">
                </div>









            </div>
        </div>

        <div class="form-group col-lg-7 col-md-7 row">
            <div class="form-row">
                <label class="form-label">Sub Categories</label>
                <div class="form-inline">
                    <div class="checkbox col-lg-4">
                        <label><input type="checkbox"> For the Grill</label>
                    </div>
                    <div class="checkbox col-lg-4">
                        <label><input type="checkbox">Chicken Sandwich</label>
                    </div>
                    <div class="checkbox col-lg-4">
                        <label><input type="checkbox">Baked Chicken</label>
                    </div>
                    <div class="checkbox col-lg-4">
                        <label><input type="checkbox">Baked Chicken</label>
                    </div>
                    <div class="checkbox col-lg-4">
                        <label><input type="checkbox">Vegitable Rice</label>
                    </div>
                    <div class="checkbox col-lg-4">
                        <label><input type="checkbox">Boiled Chicken</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-lg-7 col-md-7 row">
            <div class="form-row">
                <label class="form-label">Recipe For</label>
                <div class="form-inline">
                    <div class="checkbox col-lg-4">
                        <label><input type="checkbox">Breakfast</label>
                    </div>
                    <div class="checkbox col-lg-4">
                        <label><input type="checkbox"> Lunch</label>
                    </div>
                    <div class="checkbox col-lg-4">
                        <label><input type="checkbox"> Dinner</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group col-lg-7 col-md-7 row">
            <div class="form-row">
                <label for="rep" class="form-label">Recipe Title</label>
                <input id="rep" type="text" />
            </div>
        </div>

        <div class="form-group col-lg-12 col-md-12 row">
            <div class="form-row">
                <label for="rep" class="form-label">Description</label>
                <img src="images/sh-text-edtier.jpg" class="img-responsive" /> <!-- CSS NEEN FOR THIS AREA -->
            </div>
        </div>

        <div class="form-group col-lg-7 col-md-7 row">
            <div class="form-row">
                <label for="rep01" class="form-label">Serving Size:</label>
                <input id="rep01" type="text" /> <!-- CSS NEEN FOR THIS AREA -->
            </div>
        </div>

        <div class="form-group col-lg-7 col-md-7 row">
            <div class="form-row">
                <label for="rep02" class="form-label">Recipe Video <span>(paste embed code)</span></label>
                <input id="rep02" type="text" />
            </div>
        </div>

        <div class="form-group col-lg-7 col-md-7 row">
            <div class="form-row">
                <label for="rep03" class="form-label">Recipe Video <span>(Kutv url)</span></label>
                <input id="rep03" type="text" />
            </div>
        </div>

        <div class="form-group col-lg-10 col-md-10 row">
            <div class="form-row">
                <label for="rep04" class="form-label">Description</label>
                <textarea id="rep04" rows="4"></textarea>
            </div>
        </div>

        <div class="form-group col-lg-10 col-md-10 row">
            <div class="form-row">
                <label for="rep05" class="form-label">Nutritional Information</label>
                <textarea rows="4" id="rep05"></textarea>
            </div>
        </div>

        <div class="form-group col-lg-10 col-md-10 row">
            <div class="col-lg-4 col-md-4 col-xs-12 ro">
                <div class="form-row">
                    <label class="form-label">Side Dish</label>
                    <div class="btn-group">
                        <div class="btn-group btn-group-sm"><button type="button" class="btn btn-default btn-on">Yes</button></div>
                        <div class="btn-group btn-group-sm"><button type="button" class="btn btn-default btn-off active">No</button></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 row">
                <div class="form-row">
                    <label class="form-label">Recipe Type</label>
                    <div class="btn-group">
                        <div class="radio-inline row radio-holder">
                            <div class="radio-inline col-lg-4">
                                <label class="form-label"><input type="radio"> Main</label>
                            </div>
                            <div class="radio-inline col-lg-4">
                                <label class="form-label"><input type="radio"> Sub</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12 ro">
                <label>&nbsp;</label><br />
                <div class="btn-group">
                    <div class="btn-group btn-group-sm"><button type="button" class="btn btn-default btn-on active">Yes</button></div>
                    <div class="btn-group btn-group-sm"><button type="button" class="btn btn-default btn-off">No</button></div>
                </div>
            </div>
        </div>

        <div class="form-group col-lg-10 col-md-10 row">
            <div class="form-row">
                <label for="sub-r" class="form-label">Sub Recipes</label>
                <textarea id="sub-r" rows="4"></textarea>
            </div>
        </div>

        <div class="form-group col-lg-7 col-md-7 row">
            <div class="form-row">
                <label class="form-label">Sub Recipes</label>
                <select class="select-Qty">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>



        <!--======= Featured Recipies ======-->

    </div>
    <h2 class="home-title">Add Ingrediants</h2>
    <table class="table table-data">
        <thead>
            <tr>
                <th>Amount</th>
                <th>Measurement</th>
                <th>Weight</th>
                <th>Ingredient</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" /></td>
                <td><input type="text" /></td>
                <td>
                    <input type="text">
                    <select>
                        <option>1</option>
                    </select>
                </td>
                <td>
                    <select>
                        <option>1 Cup Warm</option>
                        <option>1 Cup Warm</option>
                        <option>1 Cup Warm</option>
                    </select>
                </td>
                <td>(1) Bake at 350 for 30 - 35 minutes.</td>
                <td>
                    <a href="#" class="readmore"><span class="glyphicon glyphicon-plus"></span> Add</a>
                    <a href="#" class="readmore cancel"><span class="glyphicon glyphicon-trash"></span></span> Delete</a>
                </td>
            </tr>

            <tr>
                <td><input type="text" /></td>
                <td><input type="text" /></td>
                <td>
                    <input type="text" />
                    <select>
                        <option>1</option>
                    </select>
                </td>
                <td>
                    <select>
                        <option>1 Cup Warm</option>
                        <option>1 Cup Warm</option>
                        <option>1 Cup Warm</option>
                    </select>
                </td>
                <td>(1) Bake at 350 for 30 - 35 minutes.</td>
                <td>
                    <a href="#" class="readmore"><span class="glyphicon glyphicon-plus"></span> Add</a>
                    <a href="#" class="readmore cancel"><span class="glyphicon glyphicon-trash"></span></span> Delete</a>
                </td>
            </tr>

        </tbody>
    </table>
    <div class="btuns-holder">
        <a href="#" class="readmore pull-right text-center"></span>Save</a>&nbsp;
        <a href="#" class="readmore cancel pull-right text-center"></span>Cancel</a>
    </div>
</div>


<script>
    $(document).ready(function() {
        $("#categories").keypress(function() {
            var query = $(this).val();
            $.ajax({
                url: "<?php echo Yii::app()->request->baseUrl . '/dashboard/getcategories/' ?>",
                type: "post",
                async: false,
                data: "query=" + query,
                success: function(response) {
                    $("#suggessions").html(response);

                },
                error: function() {
                    alert('error');
                },
            });

        });
        $("#categories").focus(function() {

            $("#suggessions").show();

        });

    });
</script>