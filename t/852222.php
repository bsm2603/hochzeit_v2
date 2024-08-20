<?php require_once('./head.php'); ?>

<section id="page">
	<div class="container">

		<div class="heading" data-scroll-reveal>
	<h2>Tischrätsel Familie</h2>	<p><span></span><i class="fa fa-question"></i><span></span></p></div>
		
						
				<table style="margin:0px" style="position: absolute">
<tbody>
<tr>
<td colspan="2" style="text-align: center;">Ich zeige Dir Deinen Platz.</td>
</tr>
<tr>
<td colspan="2" style="text-align: center;">&nbsp;</td>
</tr>
<tr>
<td style="text-align: center;" width="50%">Uwe<br />
Amy<br />
Amys Begleitung<br />
Christopher</td>
<td style="text-align: center;" width="50%">Nina<br />
Silvia<br />
Kevin<br />
Ann-Kathrin</td>
</tr>
</tbody>
</table>
<p style="margin-top: 20px; text-align:center"><strong>So findest Du Deine Tischnummer:</strong><br />
Seit wievielen Tagen sind Nicole und Burkhart heute bereits standesamtlich verheiratet?<br />Berechne von dieser Zahl die Quersumme (die Summe aller einzelnen Ziffern) und Du hast Deine Tischnummer.
</p>
<form class="knopf-container" style="text-align:center">
        <button type="button" onclick="alert('Die gefragte Quersumme ist durch 5 teilbar. Bedenke auch, dass 2024 ein Schaltjahr ist.');">Hinweis</button><br />
        <button type="button" onclick="if (prompt('Was ist Deine Lösung?') == 15) { alert('Sehr gut! Das ist korrekt.'); } else { alert('Leider falsch. Überleg noch mal und guck Dir vielleicht den Hinweis an.');}">Ich weiß schon</button><br />
        <button type="button" onclick="alert('Die Lösung ist 15.\n\nBurkhart und Nicole sind 366 Tage verheiratet.\n3+6+6=15')">Lösung</button><br />
    </form>
</div>
	</div>
</section>

<?php require_once('./foot.php'); ?>
