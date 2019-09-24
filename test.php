<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分页</title>
   <?php
 
//分页的函数
function news($pageNum = 1, $pageSize = 3)
{
    $array = array();
    
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from products limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($coon, $rs);
    while ($obj = mysqli_fetch_object($r)) {
        $array[] = $obj;
    }
    
    return $array;
}
 
//显示总页数的函数
function allNews()
{
    
    $rs = "select count(*) num from products"; //可以显示出总页数
    $r = mysqli_query($coon, $rs);
    $obj = mysqli_fetch_object($r);
    
    return $obj->num;
}
 
    @$allNum = allNews();
    @$pageSize = 3; //约定没页显示几条信息
    @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
    @$endPage = ceil($allNum/$pageSize); //总页数
    @$array = news($pageNum,$pageSize);
    ?>
</head>
<body>
<table border="1" style="text-align: center" cellpadding="0">
    <tr>
        <td>编号</td>
        <td>新闻标题</td>
        <td>来源</td>
        <td>点击率</td>
        
    </tr>
    <?php
    foreach($array as $key=>$values){
        echo "<tr>";
        echo "<td>{$values->product_id}</td>";
        echo "<td>{$values->product_kind}</td>";
        echo "<td>{$values->product_name}</td>";
        echo "<td>{$values->product_unitprice}</td>";
        
        echo "</tr>";
    }
    ?>
</table>
<div>
    <a href="?pageNum=1">首页</a>
    <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
    <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
    <a href="?pageNum=<?php echo $endPage?>">尾页</a>
 
</div>
 
</body>
</html>