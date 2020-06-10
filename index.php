<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sns</title>
</head>
<body>
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
        // date.txtを作成
        function filecreate(){
            if( !file_exists('date.txt')){
                touch( 'date.txt' );
            }
        }

        // ファイル読み込み
        function filerelod(){
            echo file_get_contents( "date.txt" );
        }

        // 投稿ボタンイベント
        if( isset( $_POST['entry'] )){
            date_default_timezone_set('Asia/Tokyo');
            $value = '<hr>'.'投稿日時:'.date("Y/m/d H:i:s").'<br>'.'投稿者:'.$_POST['name'].'<br>'.'内容:'.'<br>'.$_POST['message'];

            filecreate();
            file_put_contents( "date.txt", $value );
            filerelod();

        } else if( isset( $_POST['remove'] )){

            $fp = fopen( "date.txt", "w" );
            fclose( $fp );
            filerelod();
        }
    ?>

</body>
</html>