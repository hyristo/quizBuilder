<?php if(file_exists('config.php')){ include_once( 'config.php' );}else{header("location: install.php");} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head> 
        <title>Euntes Docete 2.0</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Euntes Docete 2.0" />
        <meta name="keywords" content="jEuntes Docete 2.0"/>
        <!-- The JavaScript -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/select-quiz.js"></script>       
        <script type="text/javascript">
            $(function() {	
				//graceful degradation
				$('#ui_element').find('li').hide();
				
				$('#ui_element').find('.m_itemMain').toggle(
					function(){
						var $this 	= $(this);
						$this.addClass('m_down').removeClass('m_up');
						var $menu	= $this.prev();
						var t = 50;
						$($menu.find('li').get().reverse()).each(function(){
							var $li = $(this);
							var showmenu = function(){$li.show();};
							setTimeout(showmenu,t+=50);
						});
					},
					function(){
						var $this 	= $(this);
						$this.addClass('m_up').removeClass('m_down');
						var $menu	= $this.prev();
						var t = 50;
						$($menu.find('li').get().reverse()).each(function(){
							var $li = $(this);
							var hidemenu = function(){$li.hide();};
							setTimeout(hidemenu,t+=50);
						});
					}
				);
            });
        </script>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
        <style>
            *{
                padding:0;
                margin:0;
            }
             body{
                background-color:#f0f0f0;
                font-family:"Helvetica Neue",Arial,Helvetica,Geneva,sans-serif;
            }
            h1{
               font-size:180px;
               line-height:180px;
               text-transform: uppercase;
               color:#ddd;
               position:absolute;
               text-shadow:0 1px 0 #fff;
               top:-25px;
               margin-top: 23px;
               white-space: nowrap;
               width: 100%;
               text-align: center;
            }
            span.reference{
                position:fixed;
                left:10px;
                bottom:10px;
                font-size:11px;
            }
            span.reference a{
                color:#666;
                text-decoration:none;
                text-transform: uppercase;
                text-shadow:0 1px 0 #fff;
            }
            span.reference a:hover{
                color:#ccc;
            }
            .m_wrapper{
                margin-top:200px;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <h1 style="z-index: -1">Euntes<br/>Docete 2.0</h1>
            <div class="col-full">
                <div id="fake"> </div>
                <span class="initialcount"></span>
                <div class="start">
                    <h2>Euntes Docete 2.0</h2>
                    <div id="ui_element" class="m_wrapper">
                        <ul>
                        <?php include_once 'scripts/get-quiz.php' ;?>
                        </ul>
                        <div class="m_itemMain m_up">Scegli l'argomento</div><!-- class m -->
                    </div><!-- id ui-element -->  
                    <div class="quizstartdiv">
                        <input type="submit" name="startquiz" value="Inizia" id="startquiz"/>
                    </div>
                </div><!-- end end -->
                <div id="allquestions"></div><!-- end allquestions -->
                <div class="finished" id="finished">
                    <h2 id="initialcount"></h2>
                </div><!-- end finished -->
                <div class="meter"><span></span></div>             
                <div id="submiterrors"></div>
                <div id="navigation">
                    <span id="submit">Conferma</span>
                    <span id="next">Continua &#8250;</span>
                    <span id="finish">Fine</span>
                </div><!-- end navigation -->  
            </div>  <!-- end col-full -->
        </div><!-- end ocntent -->
    </body>
</html>