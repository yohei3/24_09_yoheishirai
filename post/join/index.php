<?php
require('../dbconnect.php');

session_start();
if(!empty($_POST)){
    if($_POST["name"]==''){
        $error['name']='blank';
    } 
    if($_POST["email"]==''){
        $error['email']='blank';
    }
    $fileName = $_FILES['image']['name'];
    if(!empty($filename)){
        $ext=substr($filename,-3);
        if($ext !='jpg' && $ext !='gif'){
            $error['image']='type';
        }
    }

    //重複アカウントのチェック
    if(empty($error)){
        $member = $db->prepare('SELECT COUNT(*) AS cnt FROM members WHERE email=?');
        $member->execute(array($_POST['email']));
        $record = $member->fetch();
        if($record['cnt']>0){
            $error['email']='duplicate';
        }
    }


    if(emoty($error)){
    $image=date('YmdHis') . $_FILES['images']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],'../member_picture' . $image);
    
    $_SESSION['join'] = $_POST;
    $_SESSION['join']['image'] = $image;
    header('location: check.php');
    exit();

}

if(!empty($filename)){
    $ext  = substr($filename,-3);
    if($ext !='jpg'&&ext !='gif'){

    }
}

    if(strlen($_POST['password'])<4){
        $error['password']='length';
    }
    if($_POST["password"]==''){
        $error['password']='blank';
    }
    if(empty($error)){
        $_SESSION['join']=$_POST;
        header('location: check.php');
        exit();
    }
}
if($_REQUEST['action']=='rewrite'){
    $_POST = $_SESSION['join'];
    $error = true;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員登録</title>
</head>
<body>



<p>次のフォームに必要事項を記入ください</p>
    <form action="" method="post" ecctype="multipart/form-data">
    <dl>
        <dt>ニックネーム<span class="required">必須</span></dt>
        <dd><input type="text" name="name" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['name'],ENT_QUOTES);?>"
        />
        <?php if($error['name']=='blank'):?>
            <p class="error">* ニックネームを入力してください</p>
            <?php endif; ?>
        </dd>
        <dt>メールアドレス<span class="required">必須</span></dt>
        <dd><input type="text" name="email" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['mail'],ENT_QUOTES);?>"/>
        <?php if($error['email']=='blank'):?>
            <p class="error">* メールアドレスを入力してください</p>
            <?php endif; ?>
            <?php if ($error['email']=='duplicate'): ?>
            <p class="error">* そのメールアドレスは既にご利用されています</p>
            <?php endif; ?>
        </dd>
        <dt>パスワード<span class="required">必須</span></dt>
        <dd><input type="password" name="password" size="10" maxlength="20" value="<?php echo htmlspecialchars($_POST['password'],ENT_QUOTES);?>"/>
        <?php if($error['password']=='blank'):?>
            <p class="error">* パスワードを入力してください</p>
            <?php endif;?>
        <?php if($error['password']=='length'):?>
            <p class="error">* パスワードは4文字以上で入力してください</p>
            <?php endif; ?>
        </dd>
        <dt>写真など</dt>
        <dd><input type="file" name="image" size="35"  />
        <?php if($error['image']=='type'):?>
        <p class="error">* 写真などは[.gif][.jpg]を指定してください</p>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
        <p class="error">* 恐れ入りますが、画像を改めて指定してください</p>
        <?php endif; ?>
        </dd>
    </dl>
    <div><input type="submit" value="入力内容を確認する"  /></div>
    </form>
</body>
</html>