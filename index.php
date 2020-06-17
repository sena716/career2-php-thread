<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <input type="submit" value="削除する" name="remove" class="button">
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

        // ファイル書き込み　リセット
        function fileAction( $value ){
            if( isset( $value )){
                $fp = fopen( FILE_NAME, "a" );
                fwrite( $fp, $value );
                fclose( $fp );

                $redirect_url = $_SERVER['HTTP_REFERER'];
                header("Location: $redirect_url");
                exit;
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


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>