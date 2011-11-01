<?php


require_once('recaptchalib.php');


if($_POST) {
	
	if($_POST['answer'] != '0' && $_POST['answer'] <= 0) {
		header('Content-type: text/plain; charset="utf-8"');
		echo 'erreur';
		exit();
	}
	
	$privateKey = '6LeTqMkSAAAAADnQSmaKhs62A6sgPAgR7gEAFwsW';
	$resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
	if (!$resp->is_valid) {
		header('Content-type: text/plain; charset="utf-8"');
		echo 'erreur';
		exit();
	}
	
	$db = include 'db.php';
	
	$db->insert('votes',array(
		'qid' => 1,
		'answer' => (int)$_POST['answer'],
		'ip' => $_SERVER['REMOTE_ADDR'],
		'useragent' => $_SERVER['HTTP_USER_AGENT'],
		'dateadded' => date('Y-m-d H:i:s')
	));
	header('Content-type: text/plain; charset="utf-8"');
	echo 'merci';
	exit();
		
}



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>

<link href="styles.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <div id="page">
    	<div id="inner">
        	<div id="header">
                <h1>Concours</h1>
                <ul>	
                    <li><a href="concours.php">Le concours</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                </ul>
            </div>
            
            <div id="content">
                <h2>Défi #2</h2>
                
                <form action="concours.php" method="post" class="contest">
                
                    <p>Qui aimeriez-vous avoir comme premier ministre du Québec?</p>
                    
                    <div class="field">
                    	<label><input type="radio" name="answer" value="1" /> Jean Charest</label>
                    </div>
                    <div class="field">
                        <label><input type="radio" name="answer" value="2" /> Pauline Marois</label>
                    </div>
                    <div class="field">
                        <label><input type="radio" name="answer" value="3" /> Amir Khadir</label>
                    </div>
                    <div class="field">
                        <label><input type="radio" name="answer" value="4" /> Gilles Duceppe</label>
                    </div>
                    <div class="field">
                        <label><input type="radio" name="answer" value="5" /> Mario Dumont</label>
                    </div>
                    <div class="field">
                        <label><input type="radio" name="answer" value="6" /> Gilbert Rozon</label>
                    </div>
                    <div class="field">
                        <label><input type="radio" name="answer" value="7" /> Gérald Tremblay</label>
                    </div>
                    <div class="field">
                        <label><input type="radio" name="answer" value="0" /> Aucune de ces réponses</label>
                    </div>
                    
                    <div class="field">
					<?=recaptcha_get_html('6LeTqMkSAAAAAJm-_K4XN2vk2T3edTxU6ceGiccR')?>
                    </div>
                    
                    <div class="buttons">
                    	<button type="submit" class="submit">Voter</button>
                    </div>
                
                </form>
                
                <h4>Instructions</h4>
                <p>Pour gagner, vous devez inscrire 10 000 votes pour une des réponses ci-dessus.<br/>
                Pour vous identifier, ajoutez un champ nommé «hacker» à l'envoi du formulaire, qui contient un surnom de votre choix.</p>
                
                <form action="concours.php" method="post" class="contest">
                	<p>Pour voir vos votes, entrez votre surnom ci-dessous:</p>
                	<div class="field"><input type="text" name="username" size="30" /> <button type="submit" class="submit">Voir les votes</button></div>
                </form>
            </div>
    	</div>
    </div>

</body>
</html>