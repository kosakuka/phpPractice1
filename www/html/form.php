<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>こんにちは</h1>
    <p>内容は以下の通りです</p>
    <?php
    // $blog = $_POST;
    // $blog = [];//これがあると増えない
    if($blog == null){
        $blog = array();
    }
    array_push($blog, $_POST["title1"]);
    
    var_dump($blog);
    ?>
    <p>フォームです</p>
    <!--フォームから送信された値はpostなら $_POST、getなら $_GETという連想配列に入って送られるらしい  -->
    <!-- <form action="blog.php" method="get"> -->
    <form action="form.php" method="post">
        <input type="text" name="title1">
        <!-- <input type="text" name="title2">
        <input type="text" name="title3"> -->
        <input type="submit" value="送信">
    </form>
</body>
</html>