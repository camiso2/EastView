<link rel="stylesheet" type="text/css" href="css/preload.css">
<span id="loadPageM">
    <img src=".images/preload.gif" alt="">
    <p>Cargando...</p>
</span>

<script type="text/javascript">
    function preload() {
        document.getElementById("loadPageM").style.display = "block";
       /* setTimeout(() => {
            document.getElementById("loadPageM").style.display = "none";
        }, 1500);*/
        return true;
    }

</script>
