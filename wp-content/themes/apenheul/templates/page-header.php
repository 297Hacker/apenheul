<div class="page-header">
	<h1 class="entry-title" itemprop="name">
		<?php
		$title_of_page = apply_filters('kadence_page_title', kadence_title());
		if($title_of_page == "Locatie"){
			echo "<a class='kruimelspoor' href='/locatie'>Locatie</a>";
		}else if($title_of_page == "De st@art"){
			echo "<a class='kruimelspoor' href='/locatie/'>Locatie</a> / <a class='kruimelspoor' href='/de-start/'>De st@art</a>";
		} else if($title_of_page == "Kambizuri"){
			echo "<a class='kruimelspoor' href='/locatie/'>Locatie</a>  / <a class='kruimelspoor' href='/kambizuri'>Kambizuri</a>";
		} else if($title_of_page == "Catering"){
			echo "<a class='kruimelspoor' href='/catering'>Catering</a>";
		} else if($title_of_page == "Ontvangst"){
			echo "<a class='kruimelspoor' href='/catering'>Catering</a> / <a class='kruimelspoor' href='/ontvangst'>Ontvangst</a>";
		} else if($title_of_page == "Lunch"){
			echo "<a class='kruimelspoor' href='/catering'>Catering</a> / <a class='kruimelspoor' href='/lunch'>Lunch</a>";
		} else if($title_of_page == "Diner"){
			echo "<a class='kruimelspoor' href='/catering'>Catering</a> / <a class='kruimelspoor' href='/diner'>Diner</a>";
		} else if($title_of_page == "Borrel"){
			echo "<a class='kruimelspoor' href='/catering'>Catering</a> / <a class='kruimelspoor' href='/borrel'>Borrel</a>";
		} else if($title_of_page == "Mogelijkheden"){
			echo "<a class='kruimelspoor' href='/mogelijkheden'>Mogelijkheden</a>";
		} else if($title_of_page == "Vergadering of trainingsdag"){
			echo "<a class='kruimelspoor' href='/mogelijkheden'>Mogelijkheden</a> / <a class='kruimelspoor' href='/vergadering/'>Vergadering of Trainingsdag</a>";
		} else if($title_of_page == "Relatiedag of personeelsfeest"){
			echo "<a class='kruimelspoor' href='/mogelijkheden'>Mogelijkheden</a> / <a class='kruimelspoor' href='/relatiedag'>Relatiedag of Personeelsfeest</a>";
		} else if($title_of_page == "Congres of beursvloer"){
			echo "<a class='kruimelspoor' href='/mogelijkheden'>Mogelijkheden</a> / <a class='kruimelspoor' href='/congres'>Congres of Beursvloer</a>";
		} else if($title_of_page == "Bruiloften en familiedagen"){
			echo "<a class='kruimelspoor' href='/mogelijkheden'>Mogelijkheden</a> / <a class='kruimelspoor' href='/bruiloften'>Bruiloften en Familiedagen</a>";
		} else if($title_of_page == "Workshops"){
			echo "<a class='kruimelspoor' href='/mogelijkheden'>Mogelijkheden</a> / <a class='kruimelspoor' href='/workshops'>Workshops</a>";
		} else if($title_of_page == "Offerte"){
			echo "<a class='kruimelspoor' href='/contact'>Contact</a> / <a class='kruimelspoor' href='/offerte'>Offerte</a>";
		} else if($title_of_page == "Plattegrond"){
			echo "<a class='kruimelspoor' href='/contact'>Contact</a> / <a class='kruimelspoor' href='/plattegrond'>Plattegrond</a>";
		} else if($title_of_page == "Praktische Zaken"){
			echo "<a class='kruimelspoor' href='/contact'>Contact</a> / <a class='kruimelspoor' href='praktischezaken'>Praktische Zaken</a>";
		} else if($title_of_page == "Beeldmateriaal"){
			echo "<a class='kruimelspoor' href='/contact'>Contact</a> / <a class='kruimelspoor' href='/beeldmateriaal'>Beeldmateriaal</a>";
		}else if($title_of_page == "Het Team"){
			echo "<a class='kruimelspoor' href='/contact'>Contact</a> / <a class='kruimelspoor' href='/hetteam'>Het Team</a>";
		}else if($title_of_page == "Veelgestelde Vragen"){
			echo "<a class='kruimelspoor' href='/contact'>Contact</a> / <a class='kruimelspoor' href='veelgesteldevragen'>Veelgestelde Vragen</a>";
		}else if($title_of_page == "Beeldmateriaal De St@art"){
			echo "<a class='kruimelspoor' href='/contact'>Contact</a> / <a class='kruimelspoor' href='/beeldmateriaal'>Beeldmateriaal</a> / <a class='kruimelspoor' href='/beeldmateriaal-de-start'>Beeldmateriaal De St@art</a>";
		}else if($title_of_page == "Beeldmateriaal Kambizuri"){
			echo "<a class='kruimelspoor' href='/contact'>Contact</a> / <a class='kruimelspoor' href='/beeldmateriaal'>Beeldmateriaal</a> / <a class='kruimelspoor' href='/beeldmateriaal-kambizuri'>Beeldmateriaal Kambizuri</a>";
		}else{
			echo $title_of_page;
		}
		?>
	</h1>
   	<?php global $post; 
  	if(is_page()) {
  		$bsub = get_post_meta( $post->ID, '_kad_subtitle', true );
  		if(!empty($bsub)){
  			echo '<p class="subtitle"> '.$bsub.' </p>';
  		} 
	} else if(is_category()) { 
   		echo '<p class="subtitle">'.category_description().' </p>';
   	} ?>
</div>