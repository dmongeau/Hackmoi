<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                <h2>Défi #1</h2>
                
                <form action="concours.php" method="post" class="contest">
                
                    <p>Êtes-vous capable de pirater le résultat de ce concours?</p>
                    
                    <div class="field">
                    	<label><input type="radio" name="answer" value="1" /> Oui</label>
                    </div>
                    <div class="field">
                        <label><input type="radio" name="answer" value="0" /> Non</label>
                    </div>
                    
                    <div class="buttons">
                    	<button type="submit" class="submit">Voter</button>
                    </div>
                
                </form>
                
                <h4>Instructions</h4>
                <p>Pour gagner, vous devez inscrire 50 000 votes pour la réponse «Oui».<br/>
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