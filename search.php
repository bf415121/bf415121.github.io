<?php 
set_time_limit("600");
//獲取搜索關鍵字
$keyword=trim($_post["keyword"]);
//檢查是否為空
if($keyword==""){
echo"您要搜索的關鍵字不能為空";
exit;//結束程序
}
function listfiles($dir,$keyword,&$array){
$handle=opendir($dir);
while(false!==($file=readdir($handle))){
if($file!="."&&$file!=".."){
if(is_dir("$dir/$file")){
listfiles("$dir/$file",$keyword,$array);
}
else{
$data=fread(fopen("$dir/$file","r"),filesize("$dir/$file"));
if(eregi("<body([^>]+)>(.+)</body>",$data,$b)){
$body=strip_tags($b["2"]);
}
else{
$body=strip_tags($data);
}
if($file!="search.php"){
if(eregi("$keyword",$body)){
if(eregi("<title>(.+)</title>",$data,$m)){
$title=$m["1"];
}
else{
$title="沒有標題";
}
$array[]="$dir/$file $title";
}
}
}
}
}
}
$array=array();
listfiles(".","$keyword",$array);
foreach($array as $value){
//拆開
list($filedir,$title)=split("[ ]",$value,"2");
//輸出
echo "<a href=$filedir</a>"." ";
}
 ?>
