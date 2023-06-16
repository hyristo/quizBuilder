<?php if(file_exists('config.php')){ include_once( 'config.php' );}else{header("location: install.php");} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head> 
        <title><?=APP_NAME?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="<?=APP_NAME?>" />
        <meta name="keywords" content="<?=APP_NAME?>"/>
        <!-- The JavaScript -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <link rel="stylesheet" href="css/animate.css"></link>
        <script type="text/javascript" src="js/select-quiz.js"></script> 
        
        <link rel="stylesheet" href="css/style2.css"></link>
        <link rel="stylesheet" href="css/countdown.css"></link>
        
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
            
            function parteTempo(){
                $(".sound-player").remove();
                var now = new Date();
                now.setSeconds(now.getSeconds() + 30); // timestamp
                now = new Date(now); // Date object
                //countDownDate = new Date().getTime() +1000*60*60*0.0044;
                //countDownDate = new Date().getTime() +1000*60*60*0.0086;
                countDownDate = now;
                setInterval(updateTime, 10);
                var element = document.getElementById("countdown");
                element.classList.remove("hidden");
                $('#countdown').addClass('animated zoomInDown');
                $('#allquestions').addClass('animated zoomInDown');
                $('#submiterrors').addClass('hidden');
            }
            function stopTempo(){
                $(".sound-player").remove();
                var element = document.getElementById("countdown");
                element.classList.add("hidden");
            }
            function nascondiErrore(){
                $(".sound-player").remove();
                $('#submiterrors').addClass('hidden');
            }
            function stoppaSuono(){
                $(".sound-player").remove();
            }
            
            
            
        </script>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
        <style>
            *{
                padding:0;
                margin:0;
            }
            
            h1{
               font-size:50px;
               line-height:180px;
               text-transform: uppercase;
               color:#ffc800;
               position:absolute;
               text-shadow:0 1px 0 #000;
               top:-25px;
               margin-top: 23px;
               margin-left: 23px;
               white-space: nowrap;
               
               text-align: left;
            }
            h5{
               font-size:18px;
               line-height:180px;
               text-transform: uppercase;
               color:#FFFFFF;
               position:absolute;
               text-shadow:0 1px 0 #000;
               top:8px;
               margin-top: 23px;
               margin-left: 23px;
               white-space: nowrap;
               
               text-align: left;
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
    <body >
        <div>
            <h1 onclick="stoppaSuono()"><?=APP_NAME?></h1><!--Euntes docete 3.0-->
            <h5><?=POWERED_BY?></h5>
        </div>
        <div id="countdown" class="countdown hidden"></div><br/> 
        <script  src="js/countdown.js"></script>
        <div class="content">
            <div id="submiterrors" onclick="nascondiErrore()" class="hidden"></div>
            <div class="col-full">
                <div id="fake"> </div>
                
                <span class="initialcount"></span>
                <div class="bb">
                    <div class="start">
                        <div id="ui_element" class="m_wrapper">
                            <ul>
                            <?php include_once 'scripts/get-quiz.php' ;?>
                            </ul>
                            <div class="m_itemMain m_up">Scegli l'argomento</div><!-- class m -->
                        </div><!-- id ui-element -->  
                        <div class="quizstartdiv">
                            <input type="submit" name="startquiz" value="Inizia" id="startquiz"/>
                        </div>
                    </div>
                    <div id="allquestions"></div>
                </div>
                <div class="footer">
                    <div class="finished" id="finished">
                        <h2 id="initialcount"></h2>
                    </div><!-- end finished -->
                    <div class="meter"><span></span></div>             
                    

                    <div id="navigation">
                        <span id="submit" onclick="stopTempo()">Conferma</span>
                        <span id="next" onclick="parteTempo()">Continua</span>
                        <span id="finish">Fine</span>
                    </div><!-- end navigation -->  
                </div>
            </div>  <!-- end col-full -->
            
            
            
        </div><!-- end ocntent -->
        
    </body>
</html>