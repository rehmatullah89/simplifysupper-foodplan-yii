<?php 

class CommentWidget extends CWidget {

//    public $listNews;
// public function init(){
//  $this->listNews = News::model()->hot()->findAll();
// }
// public function getData(){
//  return $this->listNews;
// }
 public function run(){
  $this->render('view_commentwidget');
 }
}

?>