<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;



$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Falk Werths Fotografie
    </title>

	<?= $this->Html->css('home/main.css') ?>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-55646381-1', 'auto');
	  ga('send', 'pageview');

	</script>

</head>
<body>

		<!-- Header -->
			<header id="header">

				<!-- Logo -->
					<h1 id="logo">Falk Werths Fotografie</h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><?= $this->Html->link('Galerie', '/pages') ?></li>
							<li><a href="#intro">Intro</a></li>
							<li><a href="#one">What I Do</a></li>
							<li><a href="#two">Who I Am</a></li>
							<li><a href="#work">My Work</a></li>
							<li><a href="#contact">Contact</a></li>
						</ul>
					</nav>

			</header>

		<!-- Intro -->
			<section id="intro" class="main style1 dark fullscreen">
				<div class="content container 75%">
					<header>
						<h2>Hey.</h2>
					</header>
					<p></p>
					<footer>
						<a href="#one" class="button style2 down">More</a>
					</footer>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="main style2 right dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>What I Do</h2>
					</header>
					<p>
						Vieles. 
						Neben Produkt- und Architekturfotografie, mache ich viel Freestyle. 
						Fotos von Menschen sind aufregend aber auch der Bereich Streetphotography macht mir viel Spaß.

						Wenn Sie Ihre Website, andere Onlinemedien oder Broschüre mit neuen Bildern auffrischen möchten, sprechen Sie mich gerne an.
						Auch Personenfotos mache ich gerne…
					</p>
				</div>
				<a href="#two" class="button style2 down anchored">Next</a>
			</section>

		<!-- Two -->
			<section id="two" class="main style2 left dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>Who I Am</h2>
					</header>
					<p>
						Als ich 8 Jahre alt war, schenkte mir mein Vater eine alte analoge Kamera vom Flohmarkt. 
						Nach der Entwicklung von mehreren Dutzend Filmen und einigen Fotos, die schlicht weg einfach nur schwarz waren, stieg ich mit einer Sony Alpha in die digitale Fotografie ein. 
						Mittlerweile fotografiere ich mit meiner Nikon D610 im Vollformat.

						Nun bin ich 26 Jahre alt und studiere Kommunikationswissenschaft in Münster, nebenbei arbeite ich als Fotograf für verschiedene Unternehmen wie „Essmann’s Backstube“ oder „Saint-Gobain Glass“ sowie kleinere Einzelhändler. 
					</p>
				</div>
				<a href="#work" class="button style2 down anchored">Next</a>
			</section>

		<!-- Work -->
			<section id="work" class="main style3 primary">
				<div class="content container">
					<header>
						<h2>My Work</h2>
						<p>
							Von Produktfotografie bis hin zu Streetphotography finden Sie hier kleine Beispiele meiner Arbeit als Fotograf. 
							<br />
							Meine Galerie findet ihr hier <?= $this->Html->link('... zur Galerie', '/pages') ?>
						</p>
					</header>

					<!-- Lightbox Gallery  -->
						<div class="container 75% gallery">
						
							<?php 
							$i = 1;
							foreach ($pictures as $picture): 

							?>
							
								<?php if($i % 3 == 1): ?>
									<div class="row 0% images">
								<?php endif; ?>
								
							
								<div class="6u 12u(mobile)">
									<a href="<?=h('img/' . $picture->path) ?>" class="image fit from-left">
										<?= $this->Html->image($picture->thumb, array('title' => $picture->title)) ?>
									</a>
								</div>
								
								<?php if($i % 3 == 0): ?>
									</div>
								<?php endif; ?>
							<?php 
							$i++;
							endforeach; ?>
						</div>

				</div>
			</section>

		<!-- Contact -->
		<section id="contact" class="main style3 secondary">
			<div class="content container">
				<header>
					<h2>Say Hello.</h2>
					<p>
						Wenn Sie Fragen, Wünsche oder Anregungen haben, schreiben Sie mir gerne oder rufen Sie mich an: <a href="tel:+4915773448510">+49 (0) 1577 3448 510</a>
						<br>
						Ich freue mich auf eine spannende Zusammenarbeit!
					</p>
				</header>
				<div class="box container 75%">

                <!-- Contact Form -->
<?= $this->Form->create($contact); ?>

						<form method="post" action="#">
							<div class="row 50%">
                                <div class="6u 12u(mobile)">
<?= $this->Form->input('name', array('required'=>true, 'placeholder'=>'Name')); ?>
                                </div>
                                <div class="6u 12u(mobile)">
<?= $this->Form->input('email', array('required'=>true, 'placeholder'=>'Email')); ?>
                                </div>
							</div>
							<div class="row 50%">
                            <div class="12u">
<?= $this->Form->textarea('message', array('required'=>true, 'placeholder'=>'Message', 'type'=>'text')); ?>
							</div>
							<div class="row">
								<div class="12u">
                                <ul class="actions">
                                    <li>
                                    <?= $this->Form->button(__('Send Message')) ?>
                                        </li>
									</ul>
								</div>
							</div>
<?= $this->Form->end() ?>

				</div>
			</div>
		</section>
		
		<section id="impressum" class="main style3 secondary">
		
            <h1>Impressum</h1>
            <address>
            <strong>Falk Werths</strong><br>Ewaldistr. 34<br>48155 Münster<br>
              <a href="mailto:info@falk-werths.de">info@falk-werths.de</a> <br>
              +49 1577 34 48 510
            </address> 
            <div class="impressum-text">
                <h3>Haftung für Inhalte</h3>
                <p>Die Inhalte unserer Seiten wurden mit größter Sorgfalt erstellt. Für die Richtigkeit, Vollständigkeit und Aktualität der Inhalte können wir jedoch keine Gewähr übernehmen. Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen. Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p>
            </div>
            <div class="impressum-text">
                <h3>Haftung für Links</h3>
                <p>Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p>
            </div>
            <div class="impressum-text">
                <h3>Urheberrecht</h3>
                <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.</p>
            </div>
            <div class="impressum-text">
                <h3>Datenschutz</h3>
                <p>Die Nutzung unserer Webseite ist in der Regel ohne Angabe personenbezogener Daten möglich. Soweit auf unseren Seiten personenbezogene Daten (beispielsweise Name, Anschrift oder eMail-Adressen) erhoben werden, erfolgt dies, soweit möglich, stets auf freiwilliger Basis. Diese Daten werden ohne Ihre ausdrückliche Zustimmung nicht an Dritte weitergegeben.</p>
                <p>Wir weisen darauf hin, dass die Datenübertragung im Internet (z.B. bei der Kommunikation per E-Mail) Sicherheitslücken aufweisen kann. Ein lückenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht möglich.</p>
                <p>Der Nutzung von im Rahmen der Impressumspflicht veröffentlichten Kontaktdaten durch Dritte zur Übersendung von nicht ausdrücklich angeforderter Werbung und Informationsmaterialien wird hiermit ausdrücklich widersprochen. Die Betreiber der Seiten behalten sich ausdrücklich rechtliche Schritte im Falle der unverlangten Zusendung von Werbeinformationen, etwa durch Spam-Mails, vor.</p>
            </div>
            <div class="impressum-text">
                <p><em>Quellverweis:&nbsp;<a href="http://www.e-recht24.de/muster-disclaimer.htm" target="_blank">Disclaimer</a>&nbsp;von eRecht24, dem Portal zum Internetrecht von Rechtsanwalt Sören Siebert,&nbsp;<a href="http://www.e-recht24.de/artikel/datenschutz/6590-facebook-like-button-datenschutz-disclaimer.html" target="_blank">eRecht24</a>.</em>
                </p>
            </div>

            <div class="impressum-text">
				<div class="row 50%">
					<div class="6u 12u(mobile)">
						<h3>Website</h3>
						<strong>Mark Warneke</strong> <br>
						<a href="mailto:warneke.mark@gmail.com">warneke.mark@gmail.com</a>
					</div>
					<div class="6u 12u(mobile)">
						<h3>Design</h3>
						<strong>HTMl5 UP</strong> <br>
						<a href="http://html5up.net/">html5up.net</a>
					</div>
				</div>
			</div>
        
		</section>

		<!-- Footer -->
			<footer id="footer">

				<!-- Icons -->
					<ul class="actions">
						<li><a href="https://www.facebook.com/pages/Falk-Werths/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="http://instagram.com/falk_we" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="https://www.flickr.com/people/123684537@N05/" class="icon fa-flickr"><span class="label">Flickr</span></a></li>
						<li><a href="mailto:info@falk-werths.de" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>

				<!-- Menu -->
				<ul class="menu">
					<li>&copy; Falk Werths.</li><li><?= $this->Html->link('Impressum', '/home#impressum') ?>.</li>
				</ul>

			</footer>

		<!-- Scripts -->
		<?= $this->Html->script('home/jquery.min.js') ?>
		<?= $this->Html->script('home/jquery.poptrox.min.js') ?>
		<?= $this->Html->script('home/jquery.scrolly.min.js') ?>
		<?= $this->Html->script('home/jquery.scrollex.min.js') ?>
		<?= $this->Html->script('home/skel.min.js') ?>
		<?= $this->Html->script('home/util.js') ?>
		<?= $this->Html->script('home/main.js') ?>
		

	</body>
</html>
