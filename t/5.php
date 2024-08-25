<?php require_once('./head.php'); ?>

<div class="popupcover" id="popupcover" onClick="closeAll()"></div>
<div class="popup" id="hint">
    <h2>Hinweis</h2>
    <p>Die dunkelblauen Felder bedeuten dreifacher Buchstabenwert. Das pinke Feld bedeutet doppelter Wortwert.</p>
    <input type="button" value="OK" onclick="togglePopup('hint', 'none')" />
</div>

<div class="popup" id="guess">
    <h2>Deine Lösung prüfen</h2>
    <p>Gib Deine Lösung ein</p>
    <input id="guessText" onKeyUp="resetGuessResult() "/>
    <div id="guessCorrect">
        <p>Das ist korrekt! Gratulation.</p>
        <p><strong>Genieß die Party an, um oder auf Tisch 58.</strong></p>
    </div>
    <p id="guessWrong">Das ist leider noch nicht korrekt. Checke noch mal den Hinweis und rechne nach.</p>
    <input type="button" value="OK" onclick="checkSolution(58)" />
</div>

<div class="popup" id="tell">
    <h2>Die korrekte Lösung</h2>
    <p>U und P zählen jeweisl dreifach (3 und 12).<br />
        Mit allen anderen sind es 29.<br />
        Dann noch doppelter Wortwert:<br />
        2 x 29 = 58.</p>
    <p><strong>Deine Tischnummer ist die 58.</strong></p>
    <input type="button" value="OK" onclick="togglePopup('tell', 'none')" />
</div>

<section id="page">
    <div class="container">
        <div class="heading" style="padding-bottom: 10px" data-scroll-reveal>
            <h2>Deine Tischnummer</h2>
            <p><span></span><i class="fa fa-question"></i><span></span></p>
        </div>
    </div>
</section>

<p style="text-align:center;"><strong>So findest Du Deine Tischnummer:</strong><br/>
    Wieviele Punkte bekommt der Spieler, der gerade dieses Wort gelegt hat?<br />
    <img src="./buchspinat-scrabble-400.jpg" alt="Buchspinat" style="margin: 10px; width: 90%"/><br />
    (Ein sehr aufmerksamer Scrabble-Spieler wird anmerken, dass man dieses Wort nicht auf
    einmal legen kann, da man immer nur 8 Buchstaben zur Verfügung hat.
    Zähle hier und heute trotzdem alles Bonusfelder.)
</p>
<form class="knopf-container" style="text-align:center">
    <button type="button" onclick="togglePopup('hint', 'block')">Hinweis</button><br/>
    <button type="button" onClick="togglePopup('guess', 'block')">Meine Lösung prüfen</button><br/>
    <button type="button" onClick="togglePopup('tell', 'block')">Lösung anzeigen</button>
</form>

<?php require_once('./foot.php'); ?>
