<?php
class News{
 var $title=null;
 var $Text=null;
 var $date="2021-09-17";
 public function __contrust()
 {

 }
//  hiển thị sanh sách tinh túc mới nhất
 public function selectNews($limt)
 {
     $select ="select *from news order by id DESC limit $limt";
     $db = new connect();
     $results = $db->getList($select);
     return $results;
 }
//  đếm số bài viết
public function countid()
{
    $db = new connect();
    $results = $db->getInstance("select count(id) from news");
    return  $results ;
}
// tất cả bài viếc
 public function selectNewsall($st,$limit)
 {
    $db = new connect();
    $start= ($st - 1) * $limit;
     $select ="select *from news order by id DESC limit $start,$limit";
     $results = $db->getList($select);
     return $results;
 }
//  tìm 1 bài viết
 public function selectNewsone($id)
 {
     $select ="select *from news where id='$id'";
     $db = new connect();
     $results = $db->getInstance($select);
     return $results;
 }
//  hiển thị tin tức liên quan
public function selectNewslq($loai,$limit)
{
    $select ="select *from news where loai='$loai' order by id DESC limit $limit";
    $db = new connect();
    $results = $db->getList($select);
    return $results;
}
}
?>