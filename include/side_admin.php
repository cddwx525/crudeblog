<!--侧边开始-->
<div id='side' class='container_div'>
    <div id='side_nav' class='normal_div'>
        <div id='operation'>
            <h1>操作</h1>
            <ul>
<?php
if ($_GET['class'] != '')
{
    echo "<li><a href='write.php?class=" . $_GET['class'] . "'>写文章</a></li>\n";
}
else
{
    echo "<li><a href='write.php'>写文章</a></li>\n";
}
?>
            </ul>
        </div>

        <div id='class_list'>
            <h1>文章分类</h1>
            <ul>
<?php
$sql = 'SELECT `id` FROM `article`';
$result = mysqli_query($connection, $sql);
if ($result == FALSE)
{
    echo "cannot query";
    exit();
}
$num_rows = mysqli_num_rows($result);
//echo $num_rows;
?>
        <li><a href="article_list.php">全部(<?php echo $num_rows; ?>)</a></li>
<?php
$sql = 'SELECT DISTINCT `class` FROM `article` ORDER BY `class`';

require($_SERVER['DOCUMENT_ROOT'] . '/include/sql_result_array.php');

//echo 'hello';
$i = 1;
$ii = count($object);
for($i =1; $i <= $ii; $i = $i + 1)
{
    $class  = $object[$i]['class'];

    $sql = 'SELECT `id` FROM `article` WHERE `class` = \'' . $class . '\'';
    $result = mysqli_query($connection, $sql);
    if ($result == FALSE)
    {
        echo "cannot query";
        exit();
    }
    $num_rows = mysqli_num_rows($result);
    //echo $num_rows;

    $class = htmlspecialchars($class);

    echo "<li><a href='article_list.php?class=" . $class . "'>". $class . '(' . $num_rows . ")</a></li>\n";
}

unset($object);
unset($class);
?>
            </ul>
        </div>

        <div id='archive'>
            <h1>文章归档</h1>
            <ul>
            </ul>
        </div>

    </div>
</div>
<!--侧边结束-->
