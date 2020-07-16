<?php $v->layout("_themeAdmin"); ?>

<div id="pgAtual">
    <img src="https://png.icons8.com/material-sharp/25/000000/settings.png" align="left">
    <h4 id="namePage">Dashboard</h4>
</div>

<div class="dash" style="background: #21a09d;border-color: #187573;">
    <img class="iconDash" src="https://png.icons8.com/material-rounded/45/21a09d/gender-neutral-user.png" align="left">
    <p><b>1</b> <br> Usuarios</p>
</div>

<div class="dash" style="background: #365a9e;border-color: #284375;">
    <img class="iconDash" src="https://png.icons8.com/material-rounded/45/365a9e/edit.png" align="left">
    <p><b>1</b> <br> Post do Blog</p>
</div>

<div class="dash" style="background: #0088db;border-color: #0067A6;">
    <img class="iconDash" src="https://png.icons8.com/ios-glyphs/45/0088db/wrench.png" align="left">
    <p><b>1</b> <br> Portifólio</p>
</div>

<div class="dash" style="background: #986f96;border-color: #7A5979;">
    <img class="iconDash" src="https://png.icons8.com/material-sharp/45/986f96/briefcase.png" align="left">
    <p><b>1</b> <br> Serviços</p>
</div>


<div class="dash" style="background: #d94c25;border-color: #A63A1C;">
    <img class="iconDash" src="https://png.icons8.com/material-rounded/45/d94c25/youtube-play.png" align="left">
    <p><b>1</b> <br> Vídeos</p>
</div>

<div class="dash" style="background: #174c85;border-color: #113761;">
    <img class="iconDash" src="https://png.icons8.com/material/45/174c85/megaphone.png" align="left">
    <p><b>1</b> <br> Depoimentos</p>
</div>

<div class="dash" style="background: #f36233;border-color: #C44F29;">
    <img class="iconDash" src="https://png.icons8.com/material-sharp/45/f36233/briefcase.png" align="left">
    <p><b>1</b> <br> Parceiros</p>
</div>

<div class="dash" style="background: #ffba38;border-color: #CF972D;">
    <img class="iconDash" src="https://png.icons8.com/android/45/ffba38/picture.png" align="left">
    <p><b>1</b> <br> Slides</p>
</div>


<div class="dash" style="background: #dbc6d8;border-color: #AD9DAB;">
    <img class="iconDash" src="https://png.icons8.com/material-rounded/45/dbc6d8/conference-call.png" align="left">
    <p><b>1</b> <br> Equipe</p>
</div>

<div class="dash" style="background: #0088db;border-color: #0067A6;">
    <img class="iconDash" src="https://png.icons8.com/material/45/0088db/facebook-f.png" align="left">
    <p><b>1</b> <br> Rede Social</p>
</div>

<div class="dash" style="background: #5eafa7;border-color: #498781;">
    <img class="iconDash" src="https://png.icons8.com/material-rounded/45/5eafa7/add-user-male.png" align="left">
    <p><b>1</b> <br> Cadastros</p>
</div>

<div class="dash" style="background: #365aa0;border-color: #253E6E;">
    <img class="iconDash" src="https://png.icons8.com/material-rounded/45/365aa0/new-post.png" align="left">
    <p><b>1</b> <br> Mensagens</p>
</div>


<div id="date">
    <img id="calendar" src="../media/images/calendar.png">
    <h3 id="month"><?= date("M"); ?></h3>

    <h3 id="data_Ano">
        <?= date("D"); ?>,
        <?= date("d"); ?><br><br>

        <?= date("Y"); ?>
    </h3>
</div>

</body>

<?php $v->start("scripts"); ?>
<script type="text/javascript">
    var widthMonth = document.getElementById("month").offsetWidth;
    var centerWidth = widthMonth / 2;

    document.getElementById("month").style.marginLeft = "-" + centerWidth + "px";


    var widthMonth = document.getElementById("data_Ano").offsetWidth;
    var centerWidth = widthMonth / 2;

    document.getElementById("data_Ano").style.marginLeft = "-" + centerWidth + "px";
</script>
<?php $v->end(); ?>

</html>
