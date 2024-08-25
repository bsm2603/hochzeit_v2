<?php require_once('./head.php'); ?>
<script type="text/javascript">
    let correctSolution = 65;
</script>
<div class="popupcover" id="popupcover" onClick="closeAll()"></div>
<div class="popup" id="hint">
    <h2>Hinweis</h2>
    <p>Kathrins Hausnummer ist 10 größer als Verenas. Die ist wieder 26 größer als Sarahs. Wenn Du eine kennst, kannst Du jetzt alle berechnen.</p>
    <input type="button" value="OK" onclick="togglePopup('hint', 'none')" />
</div>

<div class="popup" id="guess">
    <h2>Deine Lösung prüfen</h2>
    <p>Gib Deine Lösung ein</p>
    <input id="guessText" onKeyUp="checkEnter()" onFocus="this.select()" inputMode="numeric"/>
    <div id="guessCorrect">
        <p>Das ist korrekt! Gratulation.</p>
        <p><strong>Genieß die Party an, um oder auf Tisch 65.</strong></p>
    </div>
    <p id="guessWrong">Das ist leider noch nicht korrekt. Checke noch mal den Hinweis und rechne nach.</p>
    <input type="button" value="OK" onclick="checkSolution()" />
</div>

<div class="popup" id="tell">
    <h2>Die korrekte Lösung</h2>
    <p>Katrin wohnt in Hausnummer 37, Verena in der 27 und Sarah in der 1a.<br />37 + 27 + 1 = 65.</p>
    <p><strong>Deine Tischnummer ist die 65.</strong></p>
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

<p style="text-align:center"><strong>So findest Du Deine Tischnummer:</strong><br/>
    An diesem Tisch sitzen Katrin, Feitse,<br />
    Greta, Lina, Verena, Sarah und Michael.<br /><br />

    Drei Adressen, alle in Hondelage.<br />
    Addiere Eure Hausnummern.<br />
    <br />
    Das Ergebnis ist Eure Tischnummer.
</p>
<form class="knopf-container" style="text-align:center">
    <button type="button" onclick="togglePopup('hint', 'block')">Hinweis</button><br/>
    <button type="button" onClick="togglePopup('guess', 'block')">Meine Lösung prüfen</button><br/>
    <button type="button" onClick="togglePopup('tell', 'block')">Lösung anzeigen</button>
</form>

<?php require_once('./foot.php'); ?>
