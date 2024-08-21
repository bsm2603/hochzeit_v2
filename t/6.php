<?php require_once('./head.php'); ?>

<div class="popupcover" id="popupcover" onClick="closeAll()"></div>
<div class="popup" id="hint">
    <h2>Hinweis</h2>
    <p>Wenn eine Ziffer doppelt so groß ist, wie die zweite, muss die kleinere ein Drittel der Quersumme sein.</p>
    <input type="button" value="OK" onclick="togglePopup('hint', 'none')" />
</div>

<div class="popup" id="guess">
    <h2>Deine Lösung prüfen</h2>
    <p>Gib Deine Lösung ein</p>
    <input id="guessText" onKeyUp="resetGuessResult() "/>
    <div id="guessCorrect">
        <p>Das ist korrekt! Gratulation.</p>
        <p><strong>Genieß die Party an, um oder auf Tisch 84.</strong></p>
    </div>
    <p id="guessWrong">Das ist leider noch nicht korrekt. Checke noch mal den Hinweis und rechne nach.</p>
    <input type="button" value="OK" onclick="checkSolution(84)" />
</div>

<div class="popup" id="tell">
    <h2>Die korrekte Lösung</h2>
    <p>Um 12 durch eine Zahl und ihr doppeltes zu erhalten, muss die kleinere Zahl 1/3 der Quersumme sein. Das ist 4. Die größere Zahl ist doppelt so groß, also 8.</p>
    <p><strong>Deine Tischnummer ist die 84.</strong></p>
    <input type="button" value="OK" onclick="togglePopup('tell', 'none')" />
</div>

<section id="page">
    <div class="container">
        <div class="heading" style="padding-bottom: 10px" data-scroll-reveal>
            <h2>Tischrätsel Freunde</h2>
            <p><span></span><i class="fa fa-question"></i><span></span></p>
        </div>
    </div>
</section>

<table style="margin:0px; max-width: 400px; margin: auto">
    <tbody>
    <tr>
        <td colspan="2" style="text-align: center;">Ich zeige Dir Deinen Platz.</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">&nbsp;</td>
    </tr>
    <tr>
        <td style="text-align: center;" width="50%">
            Jörn<br />
            Martina<br />
            Bianca<br />
            Tina
        <td style="text-align: center;" width="50%">
            Silke<br />
            Janina & Sven<br />
            Janine & Fabian
        </td>
    </tr>
    </tbody>
</table>
<p style="margin-top: 20px; text-align:center"><strong>So findest Du Deine Tischnummer:</strong><br/>
    Ich bin eine zweistellige Zahl.<br />
    Meine Zehnerstelle ist doppelt so groß wie meine Einerstelle.<br />
    Die Summe meiner Ziffern beträgt 12.
</p>
<form class="knopf-container" style="text-align:center">
    <button type="button" onclick="togglePopup('hint', 'block')">Hinweis</button><br/>
    <button type="button" onClick="togglePopup('guess', 'block')">Meine Lösung prüfen</button><br/>
    <button type="button" onClick="togglePopup('tell', 'block')">Lösung anzeigen</button>
</form>

<?php require_once('./foot.php'); ?>
