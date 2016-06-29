<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<link rel="stylesheet" media="screen,projection" type="text/css" href="comments/css/comments.css" />


<!--3rd Party Code-->
    <script type="text/javascript" src="comments/3RD Party Code/scripts/shCore.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushBash.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushCpp.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushCSharp.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushCss.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushPerl.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushDelphi.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushDiff.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushGroovy.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushJava.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushJScript.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushPhp.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushPlain.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushPython.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushRuby.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushScala.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushSql.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushVb.js"></script>
	<script type="text/javascript" src="comments/3RD Party Code/scripts/shBrushXml.js"></script>
	<link type="text/css" rel="stylesheet" href="comments/3RD Party Code/styles/shCore.css"/>
	<link type="text/css" rel="stylesheet" href="comments/3RD Party Code/styles/shThemeDefault.css"/>
	<script type="text/javascript">
		SyntaxHighlighter.config.clipboardSwf = 'comments/3RD Party Code/scripts/clipboard.swf';
		SyntaxHighlighter.all();
	</script>
	<!--3rd Party Code-->

<?php

/*
Author : Qazi Ishtiyaq Ahmad
URL : www.XtremeXtension.com

Copyright Qazi Ishtiyaq Ahmad
Licensed under the terms of the GNU General Public License.

Please feel free to pass the free version of this comment script on, at no cost, to others.
The comment script is protected by the copyright laws of the United States and international copyright treaties.
You may not rent, lease, or otherwise receive any compensation for this script...
*/

include("db.php");


//Bbcode
function BBCode ($str) {  
    $str = htmlentities($str);  
  
    $simple_search = array(  
                //added line break  
                '/\[br\]/is',  
                '/\[b\](.*?)\[\/b\]/is',  
                '/\[i\](.*?)\[\/i\]/is',  
                '/\[u\](.*?)\[\/u\]/is',  
                '/\[url\=(.*?)\](.*?)\[\/url\]/is',  
                '/\[url\](.*?)\[\/url\]/is',  
                '/\[align\=(left|center|right)\](.*?)\[\/align\]/is',  
                '/\[img\](.*?)\[\/img\]/is',  
                '/\[mail\=(.*?)\](.*?)\[\/mail\]/is',  
                '/\[mail\](.*?)\[\/mail\]/is',  
                '/\[font\=(.*?)\](.*?)\[\/font\]/is',  
                '/\[size\=(.*?)\](.*?)\[\/size\]/is',  
                '/\[color\=(.*?)\](.*?)\[\/color\]/is',  
                  //added textarea for code presentation  
               '/\[codearea\](.*?)\[\/codearea\]/is',             
                //added paragraph  
              '/\[p\](.*?)\[\/p\]/is', 			  
			   //smilies
			   '/\:angry:/is',
			    '/\:angel:/is',
				 '/\:arrow:/is',
				  '/\:at:/is',
				   '/\:biggrin:/is',
				    '/\:blank:/is',
					 '/\:blush:/is',
					  '/\:confused:/is',
					   '/\:cool:/is',
					    '/\:dodgy:/is',
						 '/\:exclamation:/is',
						  '/\:heart:/is',
						   '/\:huh:/is',
						    '/\:lightbulb:/is',
							 '/\:my:/is',
							  '/\:rolleyes:/is',
							   '/\:sad:/is',
							    '/\:shy:/is',
								 '/\:sleepy:/is',
								  '/\:smile:/is',
								   '/\:tongue:/is',
								    '/\:undecided:/is',
									'/\:wink:/is',
									
									
									// For 3rd Party Code
									'/\[code\](.*?)\[\/code\]/is', 
									 '/\[php\](.*?)\[\/php\]/is',  
									  '/\[css\](.*?)\[\/css\]/is', 
									  	'/\[jscript\](.*?)\[\/jscript\]/is', 
										 '/\[sql\](.*?)\[\/sql\]/is', 
										  '/\[perl\](.*?)\[\/perl\]/is', 
 
                );  
  
    $simple_replace = array(  
				//added line break  
               '<br />',  
                '<strong>$1</strong>',  
                '<em>$1</em>',  
                '<u>$1</u>',  
				// added nofollow to prevent spam  
                '<a href="$1" rel="nofollow" title="$2 - $1">$2</a>',  
                '<a href="$1" rel="nofollow" title="$1">$1</a>',  
                '<div style="text-align: $1;">$2</div>',  
				//added alt attribute for validation  
                '<img src="$1" alt="" />',  
                '<a href="mailto:$1">$2</a>',  
                '<a href="mailto:$1">$1</a>',  
                '<span style="font-family: $1;">$2</span>',  
                '<span style="font-size: $1;">$2</span>',  
                '<span style="color: $1;">$2</span>',  
				//added textarea for code presentation  
				'<textarea class="code_container" rows="20" cols="65">$1</textarea>',  
				//added paragraph  
				'<p>$1</p>',  
				//smilies
				'<img src="comments/smilies/angry.gif" border="0" alt="" />',
				'<img src="comments/smilies/angel.gif" border="0" alt="" />',
				'<img src="comments/smilies/arrow.gif" border="0" alt="" />',
				'<img src="comments/smilies/at.gif" border="0" alt="" />',
				'<img src="comments/smilies/biggrin.gif" border="0" alt="" />',
				'<img src="comments/smilies/blank.gif" border="0" alt="" />',
				'<img src="comments/smilies/blush.gif" border="0" alt="" />',
				'<img src="comments/smilies/confused.gif" border="0" alt="" />',
				'<img src="comments/smilies/cool.gif" border="0" alt="" />',
				'<img src="comments/smilies/dodgy.gif" border="0" alt="" />',
				'<img src="comments/smilies/exclamation.gif" border="0" alt="" />',
				'<img src="comments/smilies/heart.gif" border="0" alt="" />',
				'<img src="comments/smilies/huh.gif" border="0" alt="" />',
				'<img src="comments/smilies/lightbulb.gif" border="0" alt="" />',
				'<img src="comments/smilies/my.gif" border="0" alt="" />',
				'<img src="comments/smilies/rolleyes.gif" border="0" alt="" />',
				'<img src="comments/smilies/sad.gif" border="0" alt="" />',
				'<img src="comments/smilies/shy.gif" border="0" alt="" />',
				'<img src="comments/smilies/sleepy.gif" border="0" alt="" />',
				'<img src="comments/smilies/smile.gif" border="0" alt="" />',
				'<img src="comments/smilies/tongue.gif" border="0" alt="" />',
				'<img src="comments/smilies/undecided.gif" border="0" alt="" />',
				'<img src="comments/smilies/wink.gif" border="0" alt="" />',
				
				// For 3rd Party Code
				'<pre class="brush: plain;">$1</pre>', 
				'<pre class="brush: php;">$1</pre>', 
				'<pre class="brush: css;">$1</pre>', 
				'<pre class="brush: jscript;">$1</pre>',
				'<pre class="brush: sql;">$1</pre>',
				'<pre class="brush: perl;">$1</pre>',  				
                );  
  
    // Do simple BBCode's  
    $str = preg_replace ($simple_search, $simple_replace, $str);   
    return $str;  
}  


function getComments($tutid){

if(isset($_SESSION["login_artist"]))
{		
$test='SELECT COUNT(*) AS verif_exist FROM comments WHERE name="'.$_SESSION["login_artist"].'" AND id_oeuvre="'.$_GET["ID"].'"';
$res_test = mysql_query($test);
$test_data = @mysql_fetch_array($res_test);
}

if(isset($_SESSION["login_public"]))
{		
$test='SELECT COUNT(*) AS verif_exist FROM comments WHERE name="'.$_SESSION["login_public"].'" AND id_oeuvre="'.$_GET["ID"].'"';
$res_test = mysql_query($test);
$test_data = @mysql_fetch_array($res_test);
}

	
	$id_oeuvre = $_GET["ID"];
//fetch all comments from database where the tutorial number is the one you are asking for
	$results = mysql_query("SELECT * FROM comments WHERE id_oeuvre='$id_oeuvre' ORDER BY id DESC") or die(mysql_error());
//find the number of comments
	$commentNum = mysql_num_rows($results);

		echo' <div class="post-bottom-section"> ';
		
		if($test_data['verif_exist'] < 1)
		{
		echo'    <h2> '.$commentNum.' avis (<a href="#post" title="post your own">Postez le votre</a>)</h2>
			 <div class="primary">
            	<ol class="commentlist">';
		}else {
			echo'    <h2> '.$commentNum.' avis (<b>Vous avez déjà posté un avis</b>)</h2>
			 <div class="primary">
            	<ol class="commentlist">';
		}

   $count = @mysql_numrows($results);
   $i = 0;
   while ($i < $count){

   
        
        $name = mysql_result($results,$i,"name");
        $description = mysql_result($results,$i,"description");		
        $url = mysql_result($results,$i,"url");
        $date = mysql_result($results,$i,"date");
		
		

		



		
		//heres our alternating hack
	    $css = "thread-alt depth-1"; 
		
	
       
						echo' <li class="'.$css.'">
							<div class="comment-info">
								
								<cite>
									<a href="'.$url.'" title="'.$name.'">'.$name.'</a> <br />
									<span class="comment-data">'.$date.'</span>
								</cite>
							</div>
							<div class="comment-text">
								<p>'.BBCode($description).'</p>							
							</div>							
								</li>';

        $i++;

        }
                     echo'</ol></div></div>';
                 }

?>



<?php

function submitComments($tutid2,$tuturl){
 
if(isset($_SESSION["login_artist"]))
{		

echo'

<a name="post">

         <div class="post-bottom-section">

		    
            <div class="primary">

            	<form action="oeuvre.php?ID='.$_GET['ID'].'" method="post" id="commentform">

               	    <div>
					    <label for="name" hidden>Name <span>*</span></label>
						<input hidden id="name" name="name" value="'.$_SESSION["login_artist"].'" type="text" tabindex="1" />
						<input hidden id="id_oeuvre" name="id_oeuvre" value="'.$_GET['ID'].'" type="text" tabindex="1" />
					</div>
                    
                    
                    <div>
						<label for="message">Votre avis <span>*</span></label>
						<textarea id="message" name="message" rows="10" cols="18" tabindex="4"></textarea>
					</div>
                    <div class="no-border">
					    <input class="button" type="submit" name="post" value="Envoyer" tabindex="5" title="Submit Comment" />
					</div>

					<input type="hidden" name="tuturl" value="'.$tuturl.'" />
                    <input type="hidden" name="tutid2" value="'.$tutid2.'" />
					
               </form>

            </div>

</div>';

}

if(isset($_SESSION["login_public"]))
{		

echo'

<a name="post">

         <div class="post-bottom-section">

		    
            <div class="primary">

            	<form action="oeuvre.php?ID='.$_GET['ID'].'" method="post" id="commentform">

               	    <div>
					    <label for="name" hidden>Name <span>*</span></label>
						<input hidden id="name" name="name" value="'.$_SESSION["login_public"].'" type="text" tabindex="1" />
						<input hidden id="id_oeuvre" name="id_oeuvre" value="'.$_GET['ID'].'" type="text" tabindex="1" />
					</div>
                    
                    
                    <div>
						<label for="message">Votre avis <span>*</span></label>
						<textarea id="message" name="message" rows="10" cols="18" tabindex="4"></textarea>
					</div>
                    <div class="no-border">
					    <input class="button" type="submit" name="post" value="Envoyer" tabindex="5" title="Submit Comment" />
					</div>

					<input type="hidden" name="tuturl" value="'.$tuturl.'" />
                    <input type="hidden" name="tutid2" value="'.$tutid2.'" />
					
               </form>

            </div>

</div>';

}

}
?>