<?php require_once('./head.php'); ?>

<div class="popupcover" id="popupcover" onClick="closeAll()"></div>
<div class="popup" id="hint">
    <h2>Hinweis</h2>
    <p>Islandpferde sind dafür bekannt, dass sie den Tölt beherrschen. Nicht vergessen, zur richtigen Lösung noch 6 zu addieren.</p>
    <input type="button" value="OK" onclick="togglePopup('hint', 'none')" />
</div>

<div class="popup" id="guess">
    <h2>Deine Lösung prüfen</h2>
    <p>Gib Deine Lösung ein</p>
    <input id="guessText" onKeyUp="resetGuessResult() "/>
    <div id="guessCorrect">
        <p>Das ist korrekt! Gratulation.</p>
        <p><strong>Genieß die Party an, um oder auf Tisch 11.</strong></p>
    </div>
    <p id="guessWrong">Das ist leider noch nicht korrekt. Checke noch mal den Hinweis und rechne nach.</p>
    <input type="button" value="OK" onclick="checkSolution(11)" />
</div>

<div class="popup" id="tell">
    <h2>Die korrekte Lösung</h2>
    <p>Islandpferde können außer den normalen Gangarten noch passen und tölten. Man nennt sie deshalb auch 5-Gänger.<br /><br />Zähle zur 5 noch 6 hinzu und Du kommst auf 11.</p>
    <p><strong>Deine Tischnummer ist die 11.</strong></p>
    <input type="button" value="OK" onclick="togglePopup('tell', 'none')" />
</div>

<section id="page">
    <div class="container">
        <div class="heading" style="padding-bottom: 10px" data-scroll-reveal>
            <h2>Tischrätsel Kid & Teens (Mädchen)</h2>
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
            Mila<br />
            Alina<br />
            Merja
        </td>
        <td style="text-align: center;" width="50%">
            Miriam<br />
            Martha<br />
            Frida
        </td>
    </tr>
    </tbody>
</table>
<p style="margin-top: 20px; text-align:center"><strong>So findest Du Deine Tischnummer:</strong><br/>
    Wie viele Gangarten kann ein Islandpferd? Rechne zum Ergebnis 6 hinzu.<br /><br />
    3: Schritt, Trab und Galopp<br />
    4: Schritt, Trab, Pass und Galopp<br />
    5: Schritt, Trab, Pass, Tölt und Galopp<br />
    6: Schritt, Trab, Pass, Tölt, Galopp und Schleich
</p>
<form class="knopf-container" style="text-align:center">
    <button type="button" onclick="togglePopup('hint', 'block')">Hinweis</button><br/>
    <button type="button" onClick="togglePopup('guess', 'block')">Meine Lösung prüfen</button><br/>
    <button type="button" onClick="togglePopup('tell', 'block')">Lösung anzeigen</button>
</form>

<?php require_once('./foot.php'); ?>
