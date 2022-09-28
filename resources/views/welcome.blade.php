<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topo WebSites</title>
    <script src="https://kit.fontawesome.com/1bf0086160.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: open sans;
    }

    main {
        margin-top: 0px;
        padding-bottom: 100px;
    }

    main h1 {
        text-transform: uppercase;
        text-align: center;
        font-size: 60px;
        color: transparent;
        background-color: #b3b3b3;
        text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.8);
        -webkit-background-clip: text;
        -moz-background-clip: text;
        background-clip: text;
    }

    .container__box {
        max-width: auto;
        margin: auto;
        margin-top: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .box {
        width: 10%;
        height: 180px;
        background: #fff;
        margin: 1px;
        margin: 1%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        cursor: pointer;
        transition: all 700ms ease;
        position: relative;
    }

    .box:hover {
        transform: scale(1.1);
        box-shadow: 0px 0px 30px -15px rgba(0, 0, 0, 0.5);
        background: #FF771F;
        z-index: 1;
    }

    .box i {
        font-size: 60px;
        color: #FF771F;
    }

    .box:hover i {
        color: #242424;
    }

    .box h5 {
        margin-top: 20px;
        text-transform: uppercase;
        font-size: 14px;
        color: #777777;
    }

    .box:hover h5 {
        color: #242424;
        opacity: 0;
    }

    .box h4 {
        text-transform: uppercase;
        font-size: 18px;
        color: #fff;
        position: absolute;
        bottom: 50px;
        filter: blur(5px);
        opacity: 1;
    }

    .box:hover h4 {
        font-size: 14px;
        opacity: 1;
        filter: blur(0px);
        color: #242424;
        transition: all 700ms ease;
    }
</style>

<style>
    #gradient {
        width: 100%;
        height: 800px;
        padding: 0px;
        margin: 0px;
    }
</style>

<body>
    <div id="gradient" />
    <main>

        <h1>Plataformas Web</h1>

        <div class="container__box">

            <div class="box">
            <i class="fas fa-hard-hat"></i>
            <br>
                <h5>ALIMAK</h5>
                <h4>ALIMAK</h4>
            </div>
            <div class="box">
                <i class="fas fa-notes-medical"></i>
                <br>
                <h5>Seguridad</h5>
                <h4>Seguridad</h4>
            </div>
            <div class="box">
                <i class="fas fa-gas-pump"></i>
                <h5>Combustible</h5>
                <h4>Combustible</h4>
            </div>
            <div class="box">
                <i class="fas fa-box-open"></i>
                <h5>Almacen</h5>
                <h4>Almacen</h4>
            </div>
            <div class="box">
                <i class="fas fa-book"></i>
                <h5>IPER</h5>
                <h4>IPER</h4>
            </div>

        </div>

    </main>

</body>

<script>
    var colors = new Array(
        [255, 215, 146],
        [255, 174, 106],
        [255, 130, 67],
        [226, 106, 44],
        [198, 83, 20],
        [255, 128, 0]);

    // var colors = new Array(
    // [231, 92, 27],
    // [223, 89, 26],
    // [181, 74, 18],
    // [134, 55, 8],
    // [82, 32, 3],
    // [11, 4, 0]);

    var step = 0;
    //color table indices for: 
    // current color left
    // next color left
    // current color right
    // next color right
    var colorIndices = [0, 1, 2, 3];

    //transition speed
    var gradientSpeed = 0.007;

    function updateGradient() {

        if ($ === undefined) return;

        var c0_0 = colors[colorIndices[0]];
        var c0_1 = colors[colorIndices[1]];
        var c1_0 = colors[colorIndices[2]];
        var c1_1 = colors[colorIndices[3]];

        var istep = 1 - step;
        var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
        var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
        var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
        var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

        var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
        var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
        var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
        var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

        $('#gradient').css({
            background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
        }).css({
            background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"
        });

        step += gradientSpeed;
        if (step >= 1) {
            step %= 1;
            colorIndices[0] = colorIndices[1];
            colorIndices[2] = colorIndices[3];

            //pick two new target color indices
            //do not pick the same as the current one

            colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
            colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
        }
    }

    setInterval(updateGradient, 10);
</script>

</html>