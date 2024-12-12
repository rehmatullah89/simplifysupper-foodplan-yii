<div class="modal-body" id="test_modal" style="display: none;  ">    

    <h4>Set Recipe</h4>

    <?php
    $recipeModel = new Recipe();
    $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm', array(
        'id' => 'verticalForm',
        'htmlOptions' => array('class' => 'well'), // for inset effect
            )
    );
    $modelCat = new Category();
    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'model' => $modelCat,
        'name' => 'recipe_title',
        'source' => Yii::app()->request->baseUrl . '/Recipe/getsearchrecipes',
        'options' => array(
            'minLength' => '1',
        ),
        'htmlOptions' => array(
            'style' => 'height:20px;',
        ),
    ));
    $this->widget(
            'bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => 'Search', 'id' => 'searchrecid')
    );


    $this->endWidget();
    ?>
    <div id="showmsgonsetrecipe" style="display:none;"><strong>Recipe Set Successfully</strong></div>
    <div>
        
        <ul id="recipies123">
            
        </ul>
    </div>

    <div>
        <ul id="testadditions">
        </ul>
    </div>
</div>

<p id="getdatevalue" style="display:none;"></p>

<table id="calendar">
    <thead>
        <tr class="month-year-row">
            <th class="previous-month"><?php echo CHtml::link('<<', $this->previousLink); ?></th>
            <th colspan="5"><?php echo $this->monthName . ', ' . $this->year; ?></th>
            <th class="next-month"><?php echo CHtml::link('>>', $this->nextLink); ?></th>
        </tr>
        <tr class="weekdays-row">
            <?php foreach (Yii::app()->locale->getWeekDayNames('narrow') as $weekDay): ?>
                <th><?php echo $weekDay; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $daysStarted = false;
            $day = 1;
            for ($i = 1; $i <= $this->daysInCurrentMonth + $this->firstDayOfTheWeek; $i++) {
                if (!$daysStarted)
                    $daysStarted = ($i == $this->firstDayOfTheWeek + 1);
                $year = $this->year;
                $month = $this->month;
                $myDate = $year . '-' . $month . '-' . $day;
                ?>
                <td id ="<?php echo $myDate; ?>" <?php if ($day == $this->day) echo 'class="calendar-selected-day"'; ?>>
                    <?php if ($daysStarted && $day <= $this->daysInCurrentMonth): ?>
                        <?php
                        $myGetId = $this->getDayLink($day);
                        $new_get_id = explode("?", $myGetId);
                        $new_get_id1 = explode("=", $new_get_id[1]);
                        $mtemp = explode('&', $new_get_id1[2]);
                        $m = $mtemp[0];
                        $mday = explode('&', $new_get_id1[3]);
                        $d = $mday[0];
                        $ytemp = explode('&', $new_get_id1[1]);
                        $y = $ytemp[0];
                        $datehere = $y . '.' . $m . '.' . $d;
                        echo $day;
                        echo '<br>';
                        //2014-04-08 // year-month-date
                        echo CHtml::link(
                                'Set Recipe', '', array(
                            'class' => 'testclass', 'id' => $datehere));
                        echo '<br>';
                        //---------------------------        
                        $month = $this->monthName;
                        if ($month == 'January')
                            $month = 01;
                        if ($month == 'February')
                            $month = 02;
                        if ($month == 'March')
                            $month = 03;
                        if ($month == 'April')
                            $month = 04;
                        if ($month == 'May')
                            $month = 05;
                        if ($month == 'June')
                            $month = 06;
                        if ($month == 'July')
                            $month = 07;
                        if ($month == 'August')
                            $month = 08;
                        if ($month == 'September')
                            $month = 09;
                        if ($month == 'October')
                            $month = 10;
                        if ($month == 'November')
                            $month = 11;
                        if ($month == 'December')
                            $month = 12;

                        $year = $this->year;
                        $finalDate = $year . '-' . $month . '-' . $day;
                        $myrec = RecipesOfDay::model()->findAllbyAttributes(array('rod_day' => $finalDate));

                        $key = 1;

                        foreach ($myrec as $value2) {
                            $value2->recipeid;
                            $myrec2 = Recipe::model()->findAllbyAttributes(array('id' => $value2->recipeid));

                            $total_recipes=count($myrec);
                           
                            foreach ($myrec2 as $mainrecipe) {
                                $myPath = Yii::app()->request->getBaseUrl(TRUE) . '/recipe/' . $value2->recipeid;
                                echo CHtml::link($mainrecipe->title, $myPath, array('class' => 'link'));
                                echo "<br/>";

                                if($key===$total_recipes)
                                {

                                echo CHtml::image(Yii::app()->request->baseUrl . '/images/' . $mainrecipe->photo, "", array("width" => "50px", "height" => "50px"));

                                }
                                $key++;
                            }
                        }
                        $day++;
                        $modelCat = new Category;
                    endif;
                    ?>
                </td>
                    <?php if ($i % 7 == 0): ?>
                </tr><tr>
                    <?php
                endif;
            }
            ?>
        </tr>

    </tbody>
</table>

<style>

    #calendar th, #calendar td {
        border: 1px solid #808080;
        text-align: center;
    }

    .submitbutton.btn {
        margin-left: 5px;
    }

    .testclass{
        cursor:pointer;
    }
    .ui-dialog .ui-dialog-titlebar-close span {
        display: block;
        text-indent: 9999px;
    }
    #searchrecid {
        margin-left: 9px;
        margin-top: -10px;
    }
</style>
<script>

    $(document).ready(function() {
        $('#searchrecid').click(function(event) {
            var recipe_title = $('#recipe_title').val();
            var selected_recipes = $("#recipies123").html();


            selected_recipes =
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo Yii::app()->createAbsoluteUrl("recipe/getrecipesbycat"); ?>',
                        //$.param({first: asChar, second: doesntHave});
                        data: $.param({recipe_title: recipe_title, selected_recipes: selected_recipes}),
                        success: function(data) {

                            $('#recipies123').html(data);
                        },
                        error: function(data) { // if error occured
                            alert("Error occured.please try again");
                            alert(data);
                        },
                        dataType: 'html'
                    });
            event.preventDefault();
        });
        $(".testclass").click(function(event) {

            var date_value = $(this).attr("id");

            $("#getdatevalue").html(date_value);

            var date_recipes = date_value.split(".").join('-');

            var selected_for_day = $("#" + date_recipes).find("a[class=link]");
//            alert("test");
//            return false;

            if (selected_for_day.length > 0)
            {
                var selected_for_day_href = $("#" + date_recipes).find("a[class=link]").attr("href").match(/[\d]+$/);

                for (var i = 0; i < selected_for_day.length; i++)
                {
                    $('#recipies123').append(selected_for_day[i]);
                    $('#recipies123').append("</br>");

                }
            }

            $('#test_modal').dialog({
                width: 650,
                height: 550,
                show: 'fade',
                hide: 'fade',
                modal: true,
                close: function() {
                    $("#search-results").remove();
                    $("#recipe_title").val("");
                    var selections = $("#chosen-recipes").text();
                    var calendar_day = $("#getdatevalue").text();
                    var recipe_date_array = calendar_day.split(".").join('-');
                    ///ssb/backend/www/recipe/calendar/?year=2014&month=4&day=3
                    $("#" + recipe_date_array).append(selections);
                },
            });
            $("modal-body").fadeTo("slow", .5);
            $('#test_modal').css('display', 'block');
            //==================
            event.preventDefault();
        });
    });
</script>