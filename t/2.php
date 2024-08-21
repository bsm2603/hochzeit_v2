<?php require_once('./head.php'); ?>

<div class="popupcover" id="popupcover" onClick="closeAll()"></div>
<div class="popup" id="hint">
    <h2>Hinweis</h2>
    <p>Die gefragte Quersumme ist durch 5 teilbar. Bedenke auch, dass 2024 ein Schaltjahr ist.</p>
    <input type="button" value="OK" onclick="togglePopup('hint', 'none')" />
</div>

<div class="popup" id="guess">
    <h2>Deine Lösung prüfen</h2>
    <p>Gib Deine Lösung ein</p>
    <input id="guessText" onKeyUp="resetGuessResult() "/>
    <div id="guessCorrect">
        <p>Das ist korrekt! Gratulation.</p>
        <p><strong>Genieß die Party an, um oder auf Tisch 15.</strong></p>
    </div>
    <p id="guessWrong">Das ist leider noch nicht korrekt. Checke noch mal den Hinweis und rechne nach.</p>
    <input type="button" value="OK" onclick="checkSolution(15)" />
</div>

<div class="popup" id="tell">
    <h2>Die korrekte Lösung</h2>
    <p>Burkhart und Nicole sind seit dem 31.08.2023 verheiratet. Da 2024 ein Schaltjahr ist, sind das 366 Tage. Die Quersumme davon ist 3+6+6 = 15.</p>
    <p><strong>Deine Tischnummer ist die 15.</strong></p>
    <input type="button" value="OK" onclick="togglePopup('tell', 'none')" />
</div>

<section id="page">
    <div class="container">
        <div class="heading" style="padding-bottom: 10px" data-scroll-reveal>
            <h2>Tischrätsel Familie</h2>
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
        <td style="text-align: center;" width="50%">Uwe<br/>
            Amy & Jolie<br/>
            Christopher
        </td>
        <td style="text-align: center;" width="50%">Nina<br/>
            Silvia<br/>
            Kevin & Ann-Kathrin
        </td>
    </tr>
    </tbody>
</table>
<p style="margin-top: 20px; text-align:center"><strong>So findest Du Deine Tischnummer:</strong><br/>
    Seit wie vielen Tagen sind Nicole und Burkhart heute bereits standesamtlich verheiratet?<br/>Berechne von
    dieser Zahl die Quersumme (die Summe aller einzelnen Ziffern) und Du hast Deine Tischnummer.
</p>
<form class="knopf-container" style="text-align:center">
    <button type="button" onclick="togglePopup('hint', 'block')">Hinweis</button><br/>
    <button type="button" onClick="togglePopup('guess', 'block')">Meine Lösung prüfen</button><br/>
    <button type="button" onClick="togglePopup('tell', 'block')">Lösung anzeigen</button>
</form>

<?php require_once('./foot.php'); ?>
