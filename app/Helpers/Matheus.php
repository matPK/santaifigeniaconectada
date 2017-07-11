<?php
function gen_slug($str, $store_id){
    # special accents
    $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
    $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
    return time()."-".strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
}

function lipsum(){
    return "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a eros eu est dignissim pulvinar nec sit amet massa. Etiam turpis erat, placerat ac vehicula non, sagittis sed purus. Duis vel augue ipsum. Morbi pharetra, lectus fermentum mattis convallis, massa dui suscipit eros, eget pretium nunc massa non dolor. Morbi dapibus gravida risus sed posuere. Praesent feugiat vestibulum eros, quis tincidunt sapien ornare ut. Vestibulum finibus metus a dictum auctor. Integer imperdiet feugiat ex eu pulvinar. Nunc dignissim risus sed risus ullamcorper, non sodales turpis vulputate. Mauris in lectus mauris. Duis posuere eros augue, sed dapibus tellus semper ac. Duis congue dolor at nulla faucibus, ut feugiat sem rhoncus. Quisque sit amet est sed nulla venenatis mollis vitae quis nunc. Phasellus sed turpis metus. Suspendisse tincidunt nec mauris non viverra. Phasellus et leo augue.
            Vivamus ac lacus in tortor lacinia egestas. Integer et neque pretium, dapibus nisl at, faucibus nibh. Nam in ultrices augue, eget sagittis mi. Phasellus iaculis ultricies sapien, at ullamcorper leo lacinia id. Vivamus laoreet tempus dui, eu bibendum tortor accumsan vel. Sed id dui sagittis, auctor risus id, laoreet est. Morbi ante arcu, efficitur ac dolor sit amet, consectetur malesuada ex. Phasellus malesuada mollis massa. Nulla tempus nibh lectus, nec fermentum odio tristique eget. Aenean tempus fermentum turpis id sollicitudin. Vestibulum gravida leo non nisi tincidunt mollis. Donec dapibus tellus neque, a viverra sem auctor nec.
            Integer lobortis sem at ante viverra, et tincidunt enim venenatis. Vestibulum id massa metus. Sed viverra id eros sit amet eleifend. Aenean mollis urna sed pretium maximus. Nam id mattis metus. Donec porttitor ullamcorper fringilla. Sed sit amet urna tincidunt, pharetra nunc at, bibendum metus. Nullam pharetra tortor id viverra pretium. Ut eu aliquet tortor, vitae commodo sem. Duis placerat tellus vel risus faucibus, id tempor lacus elementum. Nulla ac purus quis diam pharetra ultricies. Aenean sodales magna eget augue vestibulum, ac malesuada justo consectetur. Aenean accumsan dignissim sollicitudin.
            Phasellus suscipit ligula sed libero hendrerit semper nec ac leo. Integer quis sem urna. Pellentesque egestas ornare nulla, sit amet aliquet erat iaculis sit amet. Fusce viverra ac augue eget luctus. Vestibulum lobortis lectus eu odio viverra, sed dignissim ligula facilisis. Aenean fermentum lectus in condimentum cursus. Ut pellentesque vitae tellus sed laoreet. Aenean ultrices viverra nunc ac blandit. Integer tincidunt feugiat ex. Donec velit metus, accumsan a nulla id, accumsan feugiat ipsum. Vestibulum dictum sem eleifend, convallis ante vel, sollicitudin lacus.
            Suspendisse vel magna justo. Maecenas ac finibus risus. Quisque volutpat bibendum nulla. Duis gravida consectetur nisi. Cras quis tellus finibus, ullamcorper odio nec, ultrices quam. Nunc risus eros, elementum ut suscipit nec, euismod vitae enim. Nunc lacinia fringilla eros vel sodales.";
}

function hipsum(){
    return "Shabby chic ennui woke salvia shaman meditation portland artisan air plant messenger bag kitsch listicle selvage etsy coloring book. Paleo quinoa taiyaki, sriracha messenger bag thundercats chillwave skateboard forage glossier pinterest enamel pin hoodie snackwave ethical. Shabby chic cornhole put a bird on it selvage chartreuse franzen intelligentsia biodiesel pork belly listicle normcore polaroid tattooed vaporware four loko. Gentrify before they sold out chillwave kombucha copper mug microdosing. Poutine deep v microdosing actually etsy palo santo. Everyday carry direct trade organic, 8-bit polaroid slow-carb sustainable master cleanse tofu cardigan mixtape pug drinking vinegar man braid aesthetic. Tofu 3 wolf moon vape ugh distillery stumptown master cleanse bespoke tacos affogato chia austin. Af cred taiyaki trust fund. Synth +1 tousled coloring book literally. Fashion axe food truck organic snackwave, affogato letterpress polaroid yr thundercats enamel pin crucifix.
            Pinterest live-edge flannel, cold-pressed single-origin coffee affogato plaid blog tilde occupy marfa. Live-edge PBR&B art party snackwave offal tattooed kickstarter hella kinfolk paleo neutra. Waistcoat vaporware paleo, raclette ugh squid farm-to-table biodiesel small batch chia. Pinterest green juice tattooed meditation hashtag cardigan. Kinfolk microdosing banjo scenester ugh health goth fashion axe. Microdosing tumeric occupy plaid humblebrag trust fund hashtag deep v beard tofu wayfarers cronut forage disrupt pitchfork. Jianbing beard photo booth bushwick tilde normcore seitan you probably haven't heard of them. Af poke cardigan, flexitarian selfies blue bottle paleo cronut vinyl. Semiotics keytar master cleanse, 8-bit succulents try-hard skateboard hexagon butcher cloud bread. Typewriter marfa meggings selvage ennui food truck viral sustainable plaid mixtape shoreditch vegan hoodie microdosing man bun. Affogato chartreuse keffiyeh forage echo park crucifix vaporware air plant. Taxidermy man braid taiyaki cold-pressed synth twee williamsburg ramps small batch raw denim sartorial messenger bag. Gastropub cloud bread single-origin coffee viral cornhole, pork belly organic tumeric beard affogato portland.
            Snackwave whatever tumblr meditation echo park shaman neutra lumbersexual air plant cardigan ethical gastropub tousled. Ennui kogi distillery 8-bit schlitz poke. Banh mi tofu shoreditch gluten-free ugh polaroid street art freegan yuccie 90's gochujang. Man braid aesthetic pop-up four loko raw denim taiyaki austin ennui artisan tumblr retro synth chartreuse chambray narwhal. Edison bulb iceland hexagon art party, paleo gluten-free helvetica keffiyeh post-ironic vice hot chicken kitsch vinyl retro pug. Freegan ethical keffiyeh keytar heirloom yuccie pug. Locavore food truck lo-fi, flexitarian kogi distillery tbh. Brooklyn hoodie gochujang iPhone chambray microdosing umami mlkshk. Tacos vape yr adaptogen. Drinking vinegar cliche glossier kale chips. Chia iceland bitters 3 wolf moon, blog pork belly cred. Cred deep v fingerstache, glossier gentrify live-edge bicycle rights yr. Austin heirloom four loko YOLO pitchfork cloud bread selfies iPhone, migas health goth tacos 8-bit. Copper mug pinterest gastropub sartorial, heirloom iceland palo santo iPhone four dollar toast umami humblebrag waistcoat pitchfork. Cardigan godard ramps jean shorts raw denim chicharrones.
            Letterpress umami fanny pack bespoke jianbing woke unicorn cloud bread. Williamsburg four dollar toast marfa organic live-edge kickstarter. VHS cold-pressed meggings ugh kinfolk retro before they sold out drinking vinegar YOLO sartorial. Portland hammock umami, mustache meggings chia pork belly tousled chambray. Aesthetic fixie craft beer marfa, put a bird on it lomo typewriter. Shoreditch truffaut crucifix hell of hexagon meh normcore. Gochujang ennui stumptown 90's tousled poutine subway tile typewriter cred ugh XOXO. Enamel pin keytar schlitz coloring book air plant trust fund. Unicorn polaroid four loko, twee pour-over wolf helvetica seitan la croix. Etsy williamsburg jianbing master cleanse, cloud bread succulents cliche gochujang la croix keffiyeh twee waistcoat vice leggings. Godard tacos lumbersexual farm-to-table umami echo park swag narwhal shoreditch blog succulents irony health goth poutine. Pabst VHS banh mi, austin iceland flexitarian woke bushwick shabby chic occupy aesthetic normcore. Letterpress cray tattooed humblebrag yuccie, food truck tofu ethical palo santo pour-over brooklyn tumeric swag. Selfies keffiyeh chartreuse, food truck glossier single-origin coffee celiac try-hard. Woke taxidermy kombucha stumptown pok pok chillwave la croix twee enamel pin.
            Actually church-key wolf art party. Retro locavore kitsch organic green juice hot chicken. Pabst VHS knausgaard retro farm-to-table +1 cornhole thundercats. Pinterest bicycle rights tofu fashion axe gentrify hot chicken etsy neutra, beard pork belly organic VHS four loko green juice. Hella ugh marfa kitsch. Af cold-pressed keytar, hella vice shaman bicycle rights. Ramps vinyl banjo celiac unicorn pickled. Fanny pack blog chillwave, brunch man braid bespoke taiyaki freegan cardigan normcore chambray shaman gluten-free. Vinyl cold-pressed VHS neutra shabby chic mlkshk deep v quinoa. Poutine tattooed brooklyn authentic farm-to-table gastropub hexagon prism letterpress umami. Keffiyeh vice hella selfies distillery meh snackwave poutine cray unicorn dreamcatcher whatever. Sriracha raw denim messenger bag plaid, cardigan photo booth salvia fam. Typewriter four dollar toast hot chicken drinking vinegar direct trade banh mi sriracha. Synth hexagon umami, semiotics live-edge you probably haven't heard of them migas lomo retro truffaut mixtape echo park.";
}

function fitResult($text, $size, $searchTerm = null){
    if(is_null($searchTerm)){
        return substr($text, 0, $size).(strlen($text) > $size ? '...':'');
    }else{
        return str_replace($searchTerm, "<span style=\"background-color: yellow;\">{$searchTerm}</span>", substr($text, 0, $size).(strlen($text) > $size ? '...':''));
    }
}

function strip($text, $size){
    return substr(strip_tags($text), 0, $size).(strlen(strip_tags($text)) > $size ? '...':'');
}

function reais($valor){
    return number_format($valor, 2, ',', '.');
}

function fone($n){
	$l = strlen($n);
	//telefone sem ddd e sem ddi
	if(strlen($n) == 8){
		return substr($n, $l - 8, 4).'-'.substr($n, $l - 4, 4);
	//celular sem ddd e sem ddi
	}else if(strlen($n) == 9){
		return substr($n, $l - 9, 1).' '.substr($n, $l - 8, 4).'-'.substr($n, $l - 4, 4);
	//telefone com ddd
	}else if(strlen($n) == 10){
		return '('.substr($n, $l - 10, 2).') '.substr($n, $l - 8, 4).'-'.substr($n, $l - 4, 4);
	//celular com ddd
	}else if(strlen($n) == 11){
		return '('.substr($n, $l - 11, 2).') '.substr($n, $l - 9, 1).' '.substr($n, $l - 8, 4).'-'.substr($n, $l - 4, 4);
	//telefone com ddd e ddi
	}else if(strlen($n) == 12){
		return '+'.substr($n, $l - 12, 2).' ('.substr($n, $l - 10, 2).') '.substr($n, $l - 8, 4).'-'.substr($n, $l - 4, 4);
	//celular com ddd e ddi
	}else if(strlen($n) == 13){
		return '+'.substr($n, $l - 13, 2).' ('.substr($n, $l - 11, 2).') '.substr($n, $l - 9, 1).' '.substr($n, $l - 8, 4).'-'.substr($n, $l - 4, 4);
	}else{
		return $n;
	}
	
}