<?php
$error = NULL;
if(isset($_POST['submit'])){
    
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $kullaniciadi = $_POST['kullaniciadi'];
    $parola = $_POST['parola'];
    $parola2 = $_POST['parola2'];
    $email = $_POST['email'];
    
     
    if($parola != $parola2){
        $error = '<span style="color:white; font-size:20px;">Parolalar uyuşmuyor';
      
    }else{
        $mysqli = new MySQLi('localhost','id12115800_motorsports','666666','id12115800_66');
        $ad = $mysqli->real_escape_string($ad);
        $soyad = $mysqli->real_escape_string($soyad);
        $kullaniciadi = $mysqli->real_escape_string($kullaniciadi);
        $parola = $mysqli->real_escape_string($parola);
        $parola2 = $mysqli->real_escape_string($parola2);
        $email = $mysqli->real_escape_string($email);
        
        $code = md5(time().$kullaniciadi);
        
        $parola = md5($parola);
        $insert = $mysqli->query("INSERT IGNORE INTO kullanicilar(ad,soyad,kullanici_adi,parola,email,code) VALUES('$ad','$soyad','$kullaniciadi','$parola','$email','$code')");
        
         
            if($insert){
            $to      = $email; 
$subject = 'Uyelik Aktivasyonu'; 
$message = '
 
Kayıt Olduğunuz için Teşekkürler.
Kaydınızı Onaylamak için Linke Tıklayınız.
http://motorsports.life/index.php?&code='.$code.'
 
'; 
                     
$headers = 'From:noreply@motorsports.life' . "\r\n"; 
mail($to, $subject, $message, $headers); 
            
        }
        else {
            echo $mysqli->error;
        }
        
        }
    }
    


?>

<html>
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
    <title>Üyelik Formu</title>
    <style>
        body
{
    margin: 0;
    padding: 0;
    font-family: "consolas";
    background-image: url(img/mclaren.jpg);
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: black;
}
.uyelik{
    width: 380px;
    box-shadow: 0 0 3px 0 rgba(0,0,0,0.8);
    background: #fff;
    padding: 20px;
    margin: 5% auto 0;
    text-align: center;
    background: rgba(255,255,255,0.3);
    opacity: 2.3;
    position: absolute;
    top: 80%;
    left: 50%;
    transform: translate(-50%,-49%);
    
    
    
}
.uyelik h1 {
    color: indianred;
    margin-bottom: 30px;
}
.input-box{
    border-radius: 20px;
    padding: 10px;
    margin: 10px 0;
    width: 100%;
    border: 1px solid #999;
    outline: none;
    font-family: "consolas";
    
}
input[type=submit] {
    color: #fff;
    width: 100%;
    padding: 10px;
    border-radius: 20px;
    font-size: 15px;
    margin: 10px 0;
    border: none;
    outline: none;
    cursor: pointer;
    font-family: "consolas";
}
.signup-btn{
    background-color: indianred;
}
.facebook-btn{
    background-color: #4267B2;
}
.google-btn{
    background-color: brown;
}
a{
  text-decoration: none;  
}
hr{
    margin-top: 20px;
    width: 80%;
}
.or
{
    
    width: 50px;
    margin: -19px auto 10px; 
    
}
icon
{
    width: 70px;
    margin-top: -10px;
}
.logo {
    width: 380px;
    box-shadow: 0 0 3px 0 rgba(0,0,0,0.8);
    background: #fff;
    padding: 20px;
    margin: 5% auto 0;
    background: rgba(255,255,255,0.3);
    opacity: 2.3;
    position: absolute;
    top: -15.3%;
    left: 50%;
    transform: translate(-50%,-50%);
    
}


        
    </style>
    </head>
    <body>
        
    <div class="uyelik">
        
        <div class="icon">
        <img src="img/icon123.png" height="55" width="70">
        <h1>Kayıt Olun</h1>
        <form method="post" action="">
            <input type="text" class="input-box" name="ad" placeholder="Ad" required/>
            <input type="text" class="input-box" name="soyad" placeholder="Soyad" required/>
            <input type="text" class="input-box" name="kullaniciadi" placeholder="Kullanıcı Adı" required/>
            <input type="password" class="input-box" name="parola" placeholder="Şifre" required/>
            <input type="password" class="input-box" name="parola2" placeholder="Şifreyi tekrar giriniz" required/>
            <input type="email" class="input-box" name="email" placeholder="E-mail" required/>
             
            
            
            <a href="aktivasyon.php">
            <input type="submit" class="signup-btn" name="submit" value="Kayıt Ol" required/>
            </a>
           
            <p>Üyeliğin var mı ? <a href="http://motorsports.life/girisYap/giris_yap.php">Giriş Yap</a></p>
            <div class="logo">
                <a href="giris_yap.php">
            <img src="img/logos3kopya.png">
                </a>
            </div>
            
        
        
        </form>
            
            </div>
        </div>
          <center>
           <?php
           echo $error;
           ?>
       </center>
    </body>
</html>