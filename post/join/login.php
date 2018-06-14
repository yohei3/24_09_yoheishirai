<?php
require('dbconnect.php');
session_start();

if($_COOKIE['email'] !==''){
    $_POST['email'] = $_COOKIE['email'];
    $_POST['password'] = $_COOKIE['password'];
    $_POST['save'] = 'on';
}

if(!empty($_POST)){
    //ログインの処理
    if($_POST['email'] != ''&& $_POST['password'] !=''){
        $login = $db->prepare('SELECT * FROM members WHERE email=? AND password=?');
        $login->execute(array
        ($_POST['email'],
        shal($_POST['password'])
        ));
    $member = $login->fetch();

    if($member){
        //ログイン成功
        $_SESSION['id']=$member['id'];
        $_SESSION['time']=$member['time'];

        //ログイン情報を記録する
        if($_POST['save']=='on'){
            setcookie('email', $_POST['email'],time()+60*60*24*14);
            setcookie('password', $_POST['password'],time()+60*60*24*14);
        }

        header('location: index.php'); exit();
    } else {
        $error['login']='failed';
    }
    }else{
        $error['login']='blank';
    } 
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログインする</title>
</head>
<body>
    <div id="lead">
    <p>メールアドレスとパスワードを記入してログインしてください</p>
    <p>アカウント作成はこちらからどうぞ</p>
    <p>&laquo;<a href ="join/">アカウントを新規作成する</a></p>
    </div>
    <form action="" method="post">
        <dl>
        <dt>メールアドレス</dt>
        <dd>
        <input type="text" name="email" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['mail'],ENT_QUOTES);?>"/>
        <?php if ($error['login']=='blank'):?>
        <p class="error">* メールアドレスとパスワードをご記入ください</p>
        <?php endif; ?>
        <?php if ($error['login']=="failed"):?>
        <p class="error">* ログインに失敗しました。正しくご記入ください</p>
        <?php endif; ?>
        </dd>
        <dt>パスワード<span class="required">必須</span></dt>
        <dd>
        <input type="password" name="password" size="10" maxlength="20" value="<?php echo htmlspecialchars($_POST['password'],ENT_QUOTES);?>"/>
        </dt>
        <dt>ログイン情報の記録</dt>
        <dd>
        <input type="save" type="checkbox" name="save" value="on">
        <label for="save">次回からは自動でログインする</label>
        </dd>
        </dl>
        <div><input type="submit" value="ログインする" /></div>
    </form>


</body>
</html>