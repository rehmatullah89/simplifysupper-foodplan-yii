<?php

/**
 * This is the model class for table "coupon".
 *
 * The followings are the available columns in table 'coupon':
 * @property string $id
 * @property string $coupon_code
 * @property string $coupon_title
 * @property string $coupon_details
 * @property string $url
 * @property string $photo
 * @property string $date_from
 * @property string $date_to
 * @property string $coupon_type
 * @property double $discount
 * @property string $status
 * @property string $viewed
 * @property string $clicked
 * @property string $created_at
 * @property integer $created_by
 * @property string $modified_at
 * @property string $modified_by
 *
 * The followings are the available model relations:
 * @property Members $createdBy
 * @property CouponsCategory[] $couponsCategories
 */
class Coupon extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Coupon the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'coupon';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('coupon_code, coupon_title, coupon_details, url, date_from, date_to, discount', 'required'),
            array('created_by', 'numerical', 'integerOnly' => true),
            array('discount', 'numerical'),
            array('coupon_code', 'length', 'max' => 16),
            array('coupon_title, photo', 'length', 'max' => 255),
            array('coupon_type', 'length', 'max' => 10),
            array('status', 'length', 'max' => 8),
            array('date_to', 'checkDates'),
            array('viewed, clicked, modified_by', 'length', 'max' => 20),
            array('created_at, modified_at', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, coupon_code, coupon_title, coupon_details, url, photo, date_from, date_to, coupon_type, discount, status, viewed, clicked, created_at, created_by, modified_at, modified_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'createdBy' => array(self::BELONGS_TO, 'Members', 'created_by'),
            'couponsCategories' => array(self::HAS_MANY, 'CouponsCategory', 'coupon_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'coupon_code' => 'Coupon Code',
            'coupon_title' => 'Coupon Title',
            'coupon_details' => 'Coupon Details',
            'url' => 'Url',
            'photo' => 'Photo',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'coupon_type' => 'Coupon Type',
            'discount' => 'Discount',
            'status' => 'Status',
            'viewed' => 'Viewed',
            'clicked' => 'Clicked',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('coupon_code', $this->coupon_code, true);
        $criteria->compare('coupon_title', $this->coupon_title, true);
        $criteria->compare('coupon_details', $this->coupon_details, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('photo', $this->photo, true);
        $criteria->compare('date_from', $this->date_from, true);
        $criteria->compare('date_to', $this->date_to, true);
        $criteria->compare('coupon_type', $this->coupon_type, true);
        $criteria->compare('discount', $this->discount);
        $criteria->compare('status', $this->status); //removed true for filtering purpose
        $criteria->compare('viewed', $this->viewed, true);
        $criteria->compare('clicked', $this->clicked, true);
        $criteria->compare('created_at', $this->created_at, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_at', $this->modified_at, true);
        $criteria->compare('modified_by', $this->modified_by, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /*
     * write function to show categories on coupon creation and update
     * filter where parent is 0 ie parent category
     * and filter using categories having type of recipe and ingredient
     */

    public static function getRecipeforcoupon() {
        $criteria = new CDbCriteria();
        $criteria->select = 'cat_name , cat_type, parent'; // select fields which you want in output
        $criteria->condition = 'parent=:parent AND cat_type=:category1 OR cat_type=:category2';
        $criteria->params = array(':category1' => 'Recipe', ':category2' => 'Ingredient', ':parent' => 0);
        $categories = Category::model()->findAll($criteria);
        $category = array();
        foreach ($categories as $cat) {
            $category[$cat->cat_name] = $cat->cat_name;
            //array_push($category, $cat->cat_name);
        }
        if (empty($category)) {
            array_push($category, 'No Category Exists');
        }
        return $category;
    }

    /*
     * Model to check whether start date is smaller than end date
     */

    public function checkDates() {
        $date_to = strtotime($this->date_to);
        $date_from = strtotime($this->date_from);
        if ($date_from > $date_to) {
            $this->addError('date_to', 'Coupon end date cannot be before than start date');
        }
    }

    /*
     * Use this funciton on update 
     * Get all selected categories form coupons categoryt table \
     * and get their name from main category table
     */

    public static function getCouponCatNames($id) {
        $criteria = new CDbCriteria;
        $criteria->select = 'cat_id,coupon_id'; // select fields which you want in output
        $criteria->condition = 'coupon_id = "' . $id . '"';
        $categories = CouponsCategory::model()->findAll($criteria);
        $category = array();
        foreach ($categories as $cat) {
           
            $category_info=  Category::model()->findbyPk($cat['cat_id']);
            
            array_push($category, $category_info->cat_name);
        }
        return $category;
    }

    /*
     * Here we get Categorie where cat_type is Recipe or Ingredient
     * And parent=0 ie it is parent Category 
     */

    public static function getCategories() {
        $criteria = new CDbCriteria;
        $criteria->select = 'cat_name , cat_type, parent'; // select fields which you want in output
        $criteria->condition = 'cat_type = "Recipe"';
        $categories = Category::model()->findAll($criteria);
        $category = array();
        foreach ($categories as $cat) {
            array_push($category, $cat->cat_name);
//            $category[$cat->cat_name] = $cat->cat_name; 
        }
        if (empty($category)) {
            array_push($category, 'No Category Exists');
        }
        return $category;
    }

}
