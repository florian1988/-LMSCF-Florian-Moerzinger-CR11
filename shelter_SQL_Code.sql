
CREATE DATABASE cr11_florian_shelter DEFAULT CHARACTER SET utf8; 


-- members table 
create table if not exists members (id_members int AUTO_INCREMENT, primary key(id_members),
                                     first_name varchar(50) not null,
                                     last_name varchar(50) not null,
                                     email varchar (100) not null,
                                     pass varchar (255) not null,
                                     status enum ('user', 'admin'),
                                     unique key email (email))
                                     Engine=InnoDB DEFAULT charset=utf8 AUTO_INCREMENT=1; 


create table shelter (id_shelter int AUTO_INCREMENT, PRIMARY KEY (id_shelter),
                      name varchar(100),
                      address varchar(100),
                      city varchar(100),
                      ZIP SMALLINT,
                      image varchar(300),
                      
                      
                      
                      
                     
                      



create table small (id_small int AUTO_INCREMENT, PRIMARY KEY (id_small),
                      name varchar(100),
                      image varchar(300),
                      description varchar(500),
                      age SMALLINT);
					  fk_shelter int not null,
					  foreign key(fk_shelter) REFERENCES shelter (id_shelter) ON DELETE CASCADE,


create table large (id_large int AUTO_INCREMENT, PRIMARY KEY (id_large),
                      name varchar(100),
                      image varchar(300),
                      description varchar(500),
                      age SMALLINT,
					  hobbies varchar(200));
					  fk_shelter int not null,
					  foreign key(fk_shelter) REFERENCES shelter (id_shelter) ON DELETE CASCADE);


create table old (id_old int AUTO_INCREMENT, PRIMARY KEY (id_old),
                      name varchar(100),
                      image varchar(300),
                      description varchar(500),
                      age SMALLINT,
					  hobbies varchar(200),
					  available date);
					  fk_shelter int not null,
					  foreign key(fk_shelter) REFERENCES shelter (id_shelter) ON DELETE CASCADE,


insert into old (name, image, description, age, hobbies, available)
	values(
		"dusty",
		"https://www.google.com/search?q=old+dog&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjW4ZXSqrvoAhVV5KYKHeMCCnYQ_AUoAXoECA0QAw#imgrc=jWLXJPtK2lB6XM",
		"Für Dusty wünschen wir uns ein Zuhause bei ruhigen, geduldigen Menschen, die ihm Zeit geben sich in Ruhe an sie zu gewöhnen. Idealerweise leben seine neuen Besitzer in ruhiger Umgebung, gerne mit Haus und Garten. Er fährt brav mit dem Auto mit und kann auch mehrere Stunden alleine bleiben. Andere Tiere und Kinder sollten nicht im selben Haushalt leben. Dusty hat bei uns zwar einen Hundefreund und mag Hunde prinzipiell auch, allerdings braucht er auch hier Zeit, um sich in Ruhe mit dem Hund anfreunden zu können. Zuhause wäre er jedoch gerne das einzige Tier. Dusty hat noch nicht viel kennen gelernt in seinem Leben und reagiert auf Vieles noch sehr gestresst und nervös. Wer sich für Dusty interessiert sollte bereit sein öfter zu kommen, um ihn in Ruhe kennen lernen zu können. Dann allerdings wird man mit einem sehr anhänglichen, kuschelbedürftigen Begleiter belohnt.",
		9,
		"playing ball",
		"2020-02-02"
		);


	insert into old (name, image, description, age, hobbies, available)
	values(
		"pedro",
		"https://www.google.com/search?q=shelter+dog&tbm=isch&ved=2ahUKEwjJ1Y_TqrvoAhULrhoKHcp9CJ8Q2-cCegQIABAA&oq=shelter+dog&gs_lcp=CgNpbWcQAzICCAAyAggAMgIIADICCAAyAggAMgIIADICCAAyAggAMgYIABAHEB4yBggAEAcQHjoECAAQQzoECAAQEzoICAAQBxAeEBNQhKsGWMu5BmCLzAZoAHAAeACAAW2IAe4FkgEDNi4ymAEAoAEBqgELZ3dzLXdpei1pbWc&sclient=img&ei=eUx-Xom1Covcasr7ofgJ#imgrc=2gDi-umE0ggCdM",
		"Ema ist eine kastrierte Staffordshire Terrier-Hündin.
		Menschen gegenüber ist sie anfangs etwas schüchtern und braucht ihre Zeit , bis sie jemandem ihr Vertrauen schenkt. Bei anderen Hunden entscheidet die Sympathie.
		Sie ist eine lustige und verspielte Hündin, die noch Erziehung braucht.
		Die hübsche Dame wird jedoch auch leicht gestresst, verbeißt sich dann in Gegenstände (bei uns v.a. in die Gittertür im Zwinger) und schreit. Sie sucht daher ein Zuhause in ruhiger Umgebung ohne Kinder und auch ohne Katzen oder Kleintiere. Ob sie sich als Zweithund eignet, müsste individuell getestet werden.
		Ema zieht nur leicht an der Leine und ist stubenrein. Bei Begegnungen mit Menschen reagiert sie allerdings sehr gestresst.
		Wegen Arthrosen in der Schulter erhält sie regelmäßig Schmerzmittel.",
		10,
		"plaing ball",
		"2020-06-06");


	insert into old (name, image, description, age, hobbies, available)
	values(
		"zeus",
		"https://s7d2.scene7.com/is/image/TWCNews/0613_lockhart_animalshelterdogpng",
		"Zeus ist ein sensibler American Staffordshire Terrier-Rüde. Bei Menschen ist Zeus sehr unsicher und braucht daher eine Kennenlernzeit; zu Kindern wird Zeus nicht vergeben. Der kastrierte Rüde versteht sich gut mit Hündinnen und mit Katzen, verteidigt jedoch sein Spielzeug gegenüber anderen Tieren. Laut Angaben der Vorbesitzer fährt er brav im Auto und auch in den Öffis mit. Außerdem geht Zeus brav an der Leine, ist stubenrein und konnte bei den Vorbesitzern bereits alleine bleiben. Da Zeus das Großstadtleben nicht kennt, suchen wir für ihn bevorzugt ein Zuhause in ruhigerer Umgebung, auch weil Zeus es nicht mag, wenn fremde Menschen sich rasch auf ihn zu bewegen. Zeus sucht Menschen mit viel Hundeerfahrung, er wird über eine Patenschaft mit Fixübernahme vergeben.",
		10,
		"palying ball",
		"2020-04-04");	





	insert into old (name, image, description, age, hobbies, available)
	values(
		"Butterkeks",
		"https://einfachtierisch.de/media/cache/article_main_image/cms/2018/04/Katze-sitzt-vor-Kabel-Shutterstock-OKcamera.jpg?464838",
		"Butterkeks kam 2016 als verwilderte Hauskatze zu uns in den WTV. Der selbstbewusste Kater ist durchaus zugänglich und genießt Streicheleinheiten, sobald er seine anfängliche Scheu abgelegt hat. Er möchte allerdings selbst bestimmen dürfen, wann er Zärtlichkeit einfordert. Ein auf dem Schoß sitzendes Schmusetier wird aus ihm jedoch nicht, da er es gar nicht mag, hochgehoben zu werden. Wird es ihm zu viel an Zärtlichkeit, so zieht er sich einfach zurück. Das sollten die Menschen dann auch respektieren. Er reagiert uns Zweibeinern gegenüber aber niemals aggressiv. Bei Artgenossen dagegen kann er schon einmal die Krallen ausfahren. Daher sollten sich im neuen Zuhause keine anderen Tiere befinden. Er braucht unbedingt die Möglichkeit auf Freigang, größere Kinder sind für den Katzenherrn kein Problem.",
		8,
		"looking around",
		"2020-08-08");



-- this are the small once
insert into small (name, image, description, age)
	values(
		"Merlin",
		"https://thenypost.files.wordpress.com/2019/07/don-pit-bull-shelter-dog-animal-care-center-brooklyn-heat-exhaustion.jpg?quality=80&strip=all&w=618&h=410&crop=1",
		"Der junge Dobermann-Mischlingsrüde Merlin wurde bei uns abgegeben, weil seine ehemaligen Menschen überfordert mit ihm waren. Merlin dürfte in seinem bisherigen Leben nicht viel kennengelernt haben. Er ist ein freundlicher Hund - sowohl gegenüber Menschen, als auch gegenüber Hunden. Beim ersten Kontakt zeigt er sich ein wenig aufgeregt, kommt aber schnell wieder zur Ruhe. Bei direktem Hundekontakt (zB im Freilauf) zeigt sich Merlin nicht unverträglich, jedoch rüpelhaft. Durch Training mit souveränen Hunden kann dieses Verhalten durchaus verbessert werden. Beim Spazieren sind Hundebegegnungen mit geringem Abstand kein Problem, bei ruhigen Hunden/Hündinnen ist auch ein direkter Kontakt an der Leine problemlos möglich. Merlin lernt extrem schnell und hat großen Spaß sich neuen Herausforderungen zu stellen. Er gibt sich viel Mühe neu Erlerntes bestmöglich umzusetzen. Die Grundsignale beherrscht er mittlerweile, welche als gute Basis dienen um weiter auf diesen aufzubauen. Da Merlin seine Umwelt sehr gerne und intensiv mit der Nase erschnüffelt, würde er sich über Beschäftigung mit der Nase (zB einfache Suchspiele, Mantrailing, Geruchsunterscheidung) sehr freuen. Aufgrund seiner altersbedingten Energie, wird Merlin nicht zu kleinen Kindern vermittelt, da er auch stürmisch sein kann. Andere Tiere sollten auch nicht im selben Haushalt leben. Bei Spaziergängen an der Leine gibt es diesbezüglich jedoch kein Problem, da lässt er sich gut an anderen Tieren vorbeiführen. Der hübsche Rüde fährt auch brav mit dem Auto mit. Merlin sucht Menschen, die Erfahrung mit belohnungsorientiertem Hundetraining mitbringen. Merlin möchte unter anderem Selbstkontrolle weiter üben, sowie das Alleinebleiben in kleinen Schritten erlernen.",
		3
		);


insert into small (name, image, description, age)
values(
	"Emma",
	"https://d1wmhwtkksj55o.cloudfront.net/wp-content/uploads/2015/01/Shelter-dog-992x558.jpg",
	"Die junge Mischlingshündin Emma wurde von der Straße gerettet und wuchs bis zu ihrem 6. Lebensmonat mit ihren Geschwistern in einer Scheune auf bevor sie zu uns kam. Entsprechend hat sie in ihrem bisherigen Leben nichts kennen gelernt und reagiert auf alles, was sie nicht kennt sehr ängstlich! Mit Artgenossen ist sie gut verträglich, Menschen gegenüber ist sie jedoch furchtsam, lässt sich nicht angreifen oder anleinen. Erschwerend ist auch die Tatsache, dass Emma eine gute Kletterkünstlerin ist und Zäune daher keine Hindernisse für sie darstellen!",
	2
	);
insert into small (name, image, description, age)
values(
	"Arnold",
	"https://twistedsifter.files.wordpress.com/2017/08/reddit-fell-in-love-with-this-shelter-dog-and-he-just-found-his-forever-home-2.jpg",
	"Der kleine Dackel-Mischlingsrüde Arnold benötigt bei Menschen lange eine Kennenlernphase, um Vertrauen aufzubauen, da er vor fremden Menschen wie auch lauten Geräuschen Angst hat. Mit Hündinnen verträgt er sich sehr gut, bei Rüden entscheidet die Sympathie. Da Arnold sehr unsicher ist und ohne einen zweiten Hund an seiner Seite keinen Schritt macht, suchen wir für den hübschen Kerl ein ruhiges Zuhause mit Garten im ländlichen Raum an der Seite eines souveränen Zweithundes. Arnold lässt sich noch nicht angreifen, das Tragen eines Brustgeschirrs und einer Leine möchte er auch noch in kleinen Schritten lernen.",
	2
	);
insert into old (name, image, description, age)
values(
	"Leo",
	"https://www.pasadenastarnews.com/wp-content/uploads/2019/04/A473131_Patches_Aust_Cattle_Dog_B-1.jpg?w=467",
	"Der verspielte Labrador-Mischlingsrüde Leo ist sehr lieb zu Menschen und auch mit anderen Hunden gut verträglich. Der hübsche Kerl geht brav an der Leine und ist stubenrein. Leo lernt sehr rasch und gerne, ist in der Wohnung sehr brav und auch im Auto legt sich seine anfängliche Aufregung rasch. Zur Zeit erhält Leo noch Schmerzmedikamente und Physiotherapie, da sich sein Hinterbein nach einem Fenstersturz noch erholen muss! Sollte sein zukünftiges Zuhause in höheren Stockwerken sein oder über einen Balkon verfügen, so ist Vorsicht geboten. Optimaler wäre für Leo ein Zuhause mit Haus und Garten!",
	4

	);


--  this are the large one

insert into large (name, image, description, age, hobbies)
	values(
		"Asasha","https://www.cesarsway.com/wp-content/uploads/2015/11/You-to-the-rescue-Starting-your-own-shelter.jpg","Die stattliche Am. Staffordshire Terrier-Hündin Akasha ist menschenfreundlich, nur anfangs etwas schüchtern. An der Leine geht sie brav an Artgenossen vorbei ohne sich aufzuregen, im Freilauf ist sie mit anderen Hunden gut verträglich. Die hübsche Hundedame ist stubenrein und sehr lebhaft. Das Gehen an der lockeren Leine möchte sie noch in kleinen Schritten erlernen.",1,"palying ball"
		);
	insert into large (name, image, description, age, hobbies)
	values(
		"Casper","https://image.stern.de/9156004/16x9-940-529/d84aaf74ffcbcf84bb0e272390976980/sq/kleine-katze.jpg","Für den stattlichen Kater Casper suchen wir ein Zuhause bei Menschen mit Katzen-Erfahrung, da der hübsche Kerl eher ein Wildkater als eine Hauskatze ist. Casper lässt sich mittlerweile abends beim Spielen auch angreifen und streicheln, ansonsten ist dies aber nicht möglich, da er sehr verschreckt ist. Für ihn suchen wir ein Zuhause in Haus mit Garten. Ruhige, nette Katzen im neuen Zuhause stellen kein Problem dar, andere Tiere oder Kinder sollten jedoch nicht im selben Zuhause wohnen!",4,"looking around"
		);
	insert into large (name, image, description, age, hobbies)
	values(
		"Shiwa","https://d17fnq9dkz9hgj.cloudfront.net/uploads/2012/11/136634315-adoptable-pet-photo-tips-632x475.jpg","Die junge Am. Staffordshire Terrier - Malinois - Mischlingshündin Shiva benötigt bei fremden Menschen eine Kennenlernphase, zeigt sich dann sehr anhänglich und verschmust. Da sie andere Hunde (sowohl im direkten Kontakt als auch an der Leine) sehr stressen, suchen wir für die hübsche Hündin ein ruhiges, stressfreies Zuhause ohne Kinder außerhalb der Stadt. Shiva ist altersbedingt noch sehr stürmisch, das Gehen an der lockeren Leine zählt nicht zu ihren Stärken, aber Shiva lernt sehr gerne und sehr schnell. Da sie extrem anhänglich ist, sollte sie in ihrem neuen Zuhause nicht zu lange alleine sein, da ihr das sehr schwer fallen könnte!",2,"palying ball"
		);
	insert into large (name, image, description, age, hobbies)
	values(
		"Charlie","https://www.fressnapf.de/medias/katze-dick-400-214.jpg?context=bWFzdGVyfGltYWdlc3wzMjMxN3xpbWFnZS9qcGVnfGltYWdlcy9oNzQvaDcyLzk2NzE2MDQ4OTU3NzQuanBnfDQzMmQ5NjA3ZWZlMzcxOTU0MzkxMTY2NjJkYTIwOGE3Njk1M2ZlNjAwY2FhMmFlMmViZTRkNWIwYTgwYTYzNGM","Für den Kater Charlie suchen wir ein Zuhause bei Menschen mit Katzen-Erfahrung, da der hübsche Kerl eher ein Wildkater als eine Hauskatze ist. Charlie lässt sich mittlerweile abends beim Spielen auch angreifen und streicheln, ansonsten ist dies aber nicht möglich, da er sehr verschreckt ist. Für ihn suchen wir ein Zuhause in Haus mit Garten. Ruhige, nette Katzen im neuen Zuhause stellen kein Problem dar, andere Tiere oder Kinder sollten jedoch nicht im selben Zuhause wohnen!",3,"looking around"
		);


 -- for the different admin / user pages
 
	ALTER TABLE `members` CHANGE `status` `status` ENUM('user','admin') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'user';