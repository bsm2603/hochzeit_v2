<?php require_once('./head.php'); ?>
<script type="text/javascript">
    let correctSolution = 84;
</script>
<div class="popupcover" id="popupcover" onClick="closeAll()"></div>
<div class="popup" id="hint">
    <h2>Hinweis</h2>
    <p>Wenn eine Ziffer doppelt so groß ist, wie die zweite, muss die kleinere ein Drittel der Summe von beiden sein.</p>
    <input type="button" value="OK" onclick="togglePopup('hint', 'none')" />
</div>

<div class="popup" id="guess">
    <h2>Deine Lösung prüfen</h2>
    <p>Gib Deine Lösung ein</p>
    <input id="guessText" onKeyUp="checkEnter()" onFocus="this.select()" inputMode="numeric"/>
    <div id="guessCorrect">
        <p>Das ist korrekt! Gratulation.</p>
        <p><strong>Genieß die Party an, um oder auf Tisch 84.</strong></p>
    </div>
    <p id="guessWrong">Das ist leider noch nicht korrekt. Checke noch mal den Hinweis und rechne nach.</p>
    <input type="button" value="OK" onclick="checkSolution()" />
</div>

<div class="popup" id="tell">
    <h2>Die korrekte Lösung</h2>
    <p>Wenn eine Zahl plus das Doppelte 12 sein sollen, müssen die beiden Zahlen 1/3 und 2/3 von 12 sein. Also 4 und 8. Die größere ist die Zehnerstelle.<br />So kommen wir auf 84.</p>
    <p><strong>Deine Tischnummer ist die 84.</strong></p>
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
    Deine Tischnummer ist eine zweistellige Zahl.<br />
    Ihre Zehnerstelle ist 2x die Einerstelle.<br />
    Die Summe ihrer Ziffern beträgt 12.
</p>
<form class="knopf-container" style="text-align:center">
    <button type="button" onclick="togglePopup('hint', 'block')">Hinweis</button><br/>
    <button type="button" onClick="togglePopup('guess', 'block')">Meine Lösung prüfen</button><br/>
    <button type="button" onClick="togglePopup('tell', 'block')">Lösung anzeigen</button>
</form>

<?php require_once('./foot.php'); ?>
