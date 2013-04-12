$(function(){
	
	// variables for quiz results 
	
	var x = 1;
	var esatto = 0;
        var errato = 0;
        var count = $(".box").length;
	y = 0;
	$('.initialcount').html('1 / ' + count);	
	// animating the li options
	
	$('#options li').click(function(){
		$('#options li').removeClass('selected').addClass('question');
		$(this).removeClass('question').addClass('selected');
	});
	
	
	// changing questions
	
	$('#next').click(function(){
		$( ".hidden_page_part" ).next( ".box" ).fadeIn(1000).addClass( "hidden_page_part" ).removeClass( "box" );
		$( ".hidden_page_part" ).prev().removeClass( "hidden_page_part" ).fadeOut(700).addClass( "box" );
		$(this).hide();
		$('#submiterrors').html('');
		x++;
		$('.initialcount').html(x + ' / ' + count + ' <br/><img src="images/green.png" align="absmiddle" width="50px" height="50px"/>: '+esatto+ '<br/><img src="images/red.png" align="absmiddle" width="50px" height="50px"/>: '+errato);	
		$('#submit').show();
	});
	
	
	// submit click event 
	
	$('#submit').click(function(){
		var selected = $('.hidden_page_part').find('li.selected').html();
		var answer = $('.hidden_page_part').find('#answer').val();
		
		if($('.hidden_page_part li').hasClass('selected'))
		{
			if(selected == answer)
			{
				$('li.selected').addClass('success').removeClass('selected');
				$('#submiterrors').html('Risposta esatta.');
                                esatto++;
				y++;
				result = y * 100 / count;
				$('.meter span').css('width', + result + '%');
			}
			else
			{
				$('li.selected').addClass('error').removeClass('selected');
				$('#submiterrors').html('La risposta corretta &egrave; : ' + answer);
                                errato++;
			}
			$(this).hide();
			if(x == count)
			{
				$('#finish').show();
			}
			else
			{
				$('#next').show();		
			}
		}
		else
		{
			$('#submiterrors').html('Scegliere un opzione per proseguire');
		}
		
		
	});
	
	// finishing the quiz
	
	$('#finish').click(function(){
		$('.meter').fadeOut();
		$('#submit').hide();		
		$('#next').hide();
		$('#submiterrors').hide();
		$('.finished').addClass('hidden_page_part').removeClass('finished').fadeIn(700);
		$( ".hidden_page_part" ).prev().removeClass( "hidden_page_part" ).fadeOut(700).addClass( "box" );
		$(this).hide();
		
		marks = y * 100 / count;
		
		if(marks < 50)
		{
			var comment = 'Prestazione deludente. Puoi fare meglio!';
		}
		else
		{
			var comment = "Ottima prestazione. Bene cos&igrave;";
		}
		$('h2#score').html(comment + ', hai risposto correttamente al ' + marks + '% delle domande');
		$('.initialcount').html('Finished');
	});
	
	// restarting the quiz
	
	$('#quizend').click(function(){
		window.location.reload();
	});
});