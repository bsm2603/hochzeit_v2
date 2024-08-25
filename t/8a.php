<?php require_once('./head.php'); ?>
<script type="text/javascript">
    let correctSolution = 45;
</script>
<div class="popupcover" id="popupcover" onClick="closeAll()"></div>
<div class="popup" id="hint">
    <h2>Hinweis</h2>
    <p>Frage einen der Coder, die können<br />Dir helfen. Die laufen hier <br />bestimmt irgendwo rum.<br /><br />(Oder zieh halt ein Ticket.)</p>
    <input type="button" value="OK" onclick="togglePopup('hint', 'none')" />
</div>

<div class="popup" id="guess">
    <h2>Deine Lösung prüfen</h2>
    <p>Gib Deine Lösung ein</p>
    <input id="guessText" onKeyUp="checkEnter()" onFocus="this.select()" inputMode="numeric"/>
    <div id="guessCorrect">
        <p>Das ist korrekt! Gratulation.</p>
        <p><strong>Genieß die Party an, um oder auf Tisch 45.</strong></p>
    </div>
    <p id="guessWrong">Das ist leider noch nicht korrekt. Checke noch mal den Hinweis und rechne nach.</p>
    <input type="button" value="OK" onclick="checkSolution()" />
</div>

<div class="popup" id="tell">
    <h2>Die korrekte Lösung</h2>
    <p>In der Variablen $x werden die Buchstaben C und O aneinander gehängt. In der Datenbankabfrage wird dann noch ein L angefügt. Anschließend fragen wir die CAS-ID des Kölner Campus ab, die 45.
    </p>
    <p><strong>Deine Tischnummer ist die 45.</strong></p>
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
    Was gibt folgendes PHP-Code-Snippet aus?
</p>

<pre style="width:95%; margin: auto">$x = 'C' . 'O';
dd(DB::select("SELECT id FROM campus
    WHERE code = '{$x}L'")[0]->id);</pre>

<p style="text-align:center">Das Ergebnis ist Deine Tischnummer.</p>

</p>
<form class="knopf-container" style="text-align:center">
    <button type="button" onclick="togglePopup('hint', 'block')">Hinweis</button><br/>
    <button type="button" onClick="togglePopup('guess', 'block')">Meine Lösung prüfen</button><br/>
    <button type="button" onClick="togglePopup('tell', 'block')">Lösung anzeigen</button>
</form>

<?php require_once('./foot.php'); ?>
