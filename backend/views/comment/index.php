<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

 

if (is_file(Yii::getPathOfAlias('common.modules.usercomment') . DIRECTORY_SEPARATOR . 'UsercommentModule.php'))
{
    UsercommentModule::addcomments();   
}




$this->breadcrumbs=array(
	'Comments',
);

$this->menu=array(
	array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
