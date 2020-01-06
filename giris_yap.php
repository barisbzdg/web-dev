<?php
 require_once "config.php";
 

$loginURL = $gClient->createAuthUrl();

$error = NULL;
if(isset($_POST['submit'])){
    
    $mysqli = new MySQLi('localhost','id12115800_motorsports','666666','id12115800_66');
    
    $email = $mysqli->real_escape_string($_POST['email']);
    $parola = $mysqli->real_escape_string($_POST['parola']);
    $parola = md5($parola);
    
    $resultSet = $mysqli->query("SELECT * FROM kullanicilar WHERE email = '$email' AND parola = '$parola' LIMIT 1 ");
    
    if($resultSet->num_rows !=0){
        
        $row = $resultSet->fetch_assoc();
        $verified = $row['verified'];
        
         
        if($verified == 1){
                    $to      = $email; 
$subject = '2FA';  
$message = '
 
Giriş Yapmak için Linke Tıklayınız


http://motorsports.life/index.php?parola='.$parola.'
 
'; 
                     
$headers = 'From:noreply@motorsportslife.com' . "\r\n"; 
mail($to, $subject, $message, $headers); 
        }
       else{
            $error = '<span style="color:red; font-size:20px;">Üyelik Onaylanmadı';
        }
        
    }else{
        $error = '<span style="color:red; font-size:20px;">Bilgiler Yanlis';
    }
   
}
?>
<html>
<head>
    <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />
    <title>Giriş Yap</title>
    <style>
        body
{
    margin: 0;
    padding: 0;
    font-family: "consolas";
    background-image: url(img/test2.jpg);
    background-size: cover;
    background-position: center;
    color: black;
  
 
}
.uyelik{
    width: 400px;
    box-shadow: 0 0 3px 0 rgba(0,0,0,0.8);
    padding: 20px;
    margin: 5% auto 0;
    text-align: center;
    background: rgba(255,255,255,0.5);
    opacity: 2.3;
    position: absolute;
    top: 50.6%;
    left: 50%;
    transform: translate(-50%,-50%);
    
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
    width: 100%;
    padding: 10px;
    border-radius: 20px;
    font-size: 15px;
    margin: 10px 0;
    border: none;
    outline: none;
    cursor: pointer;
}
.google-btn{
    background-color: brown;
    width: 100%;
    padding: 10px;
    border-radius: 20px;
    font-size: 15px;
    margin: 10px 0;
    border: none;
    outline: none;
    cursor: pointer;
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
    width: 400px;
    box-shadow: 0 0 3px 0 rgba(0,0,0,0.8);
    padding: 20px;
    margin: 5% auto 0;
    background: rgba(255,255,255,0.3);
    opacity: 2.3;
    position: absolute;
    top: -23%;
    left: 50%;
    transform: translate(-50%,-50%);
    
}

    </style>
    </head>
    <body>
    <div class="uyelik">
        <div class="icon">
        <img src="img/icon123.png" height="55" width="70">
        <h1>Giriş Yapın</h1>
        <form method="post" action="giris_yap.php">
        <input type="email" class="input-box" name="email" placeholder="E-mailinizi giriiz." required/>
            <input type="password" class="input-box" name="parola" placeholder="Şifrenizi Girin." required/>
            
            <span><input type="checkbox" name="beni_hatirla" class="form-check-input"></span>Beni Hatırla<p></p><p></p><a href="http://motorsports.life/sifremiUnuttum/sifre.php">Şifrenizi mi unuttunuz?</a>
           
            <input type="SUBMIT" class="signup-btn" name="submit" value="Giriş Yap" required/>
              
               <hr>
            <p class="or"></p>
            <br/>
            <input type="button" class="facebook-btn" value="Facebook ile Giriş">
            <input type="button" onclick="window.location = '<?php echo $loginURL ?>';" class="google-btn" value ="Google ile Giriş">
           
            
             <div class="logo">
                <a href="index.html">
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
