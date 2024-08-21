<?php require_once('./head.php'); ?>

<div class="popupcover" id="popupcover" onClick="closeAll()"></div>
<div class="popup" id="hint">
    <h2>Hinweis</h2>
    <p>Burkhart ist heute 57 Jahre alt und sein Geburtstag war ein Ostersonntag.</p>
    <input type="button" value="OK" onclick="togglePopup('hint', 'none')" />
</div>

<div class="popup" id="guess">
    <h2>Deine Lösung prüfen</h2>
    <p>Gib Deine Lösung ein</p>
    <input id="guessText" onKeyUp="resetGuessResult() "/>
    <div id="guessCorrect">
        <p>Das ist korrekt! Gratulation.</p>
        <p><strong>Genieß die Party an, um oder auf Tisch 34.</strong></p>
    </div>
    <p id="guessWrong">Das ist leider noch nicht korrekt. Checke noch mal den Hinweis und rechne nach.</p>
    <input type="button" value="OK" onclick="checkSolution(34)" />
</div>

<div class="popup" id="tell">
    <h2>Die korrekte Lösung</h2>
    <p>Burkhart kam am 26.03.1967 zur Welt.<br />
        2+6+3+1+9+6+7 = 34
    </p>
    <p><strong>Deine Tischnummer ist die 34.</strong></p>
    <input type="button" value="OK" onclick="togglePopup('tell', 'none')" />
</div>

<section id="page">
    <div class="container">
        <div class="heading" style="padding-bottom: 10px" data-scroll-reveal>
            <h2>Tischrätsel BDSMler</h2>
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
            Christoph & Maren <br />
            Sven<br />
            Tobias & Antje<br />
        </td>
        <td style="text-align: center;" width="50%">
            Josha & Antje<br />
            Arne
        </td>
    </tr>
    </tbody>
</table>
<p style="margin-top: 20px; text-align:center"><strong>So findest Du Deine Tischnummer:</strong><br/>
    Finde Burkharts Geburtsdatum (mit 4-stelliger Jahreszahl)<br />heraus und berechne die Quersumme.
</p>
<form class="knopf-container" style="text-align:center">
    <button type="button" onclick="togglePopup('hint', 'block')">Hinweis</button><br/>
    <button type="button" onClick="togglePopup('guess', 'block')">Meine Lösung prüfen</button><br/>
    <button type="button" onClick="togglePopup('tell', 'block')">Lösung anzeigen</button>
</form>

<?php require_once('./foot.php'); ?>
