<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sns</title>
</head>
<body>

    <style></style>

    <h1>掲示板App</h1>
    <h2>投稿フォーム</h2>

    <form action="" method="post">

        <input type="text" name="name" placeholder="名前" required><br><br>
        
        <textarea name="message" id="" cols="30" rows="10" placeholder="内容" required></textarea><br><br>
        <input type="submit" value="投稿する" name="entry">
    </form>

    <form action="" method="post">
        <input type="submit" value="削除する" name="remove">
    </form>

    <h2>スレッド</h2>

    <?php

        // 保存file名
        const FILE_NAME = "date.txt";

        // date.txtがなければ作成
        function filecreate(){
            if( !file_exists( FILE_NAME )){
                touch( FILE_NAME );
            }
        }

        // ファイル読み込み
        function filerelod(){
            echo file_get_contents( FILE_NAME );
        }

        // ファイル変更
        function fileAction( $value ){
            if( isset( $value )){
                $fp = fopen( FILE_NAME, "a" );
                fwrite( $fp, $value );
                fclose( $fp );
            } else {
                file_put_contents( FILE_NAME, "" );
            }
        }

        // 投稿ボタンイベント
        if( isset( $_POST['entry'] )){
            date_default_timezone_set('Asia/Tokyo');
            $value = '<hr>'.'投稿日時:'.date("Y/m/d H:i:s").'<br>'.'投稿者:'.$_POST['name'].'<br>'.'内容:'.'<br>'.$_POST['message'];

            filecreate();
            fileAction( $value );
        } else if( isset( $_POST['remove'] )){

            fileAction();
        }

        filerelod();
    ?>

</body>
</html>