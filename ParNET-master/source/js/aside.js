$(function () {
    let html="";
    $.post("controller/NoticiasController.php", 
        {flag:1},
        function (data) {
           data.data.forEach(element => {
                html += `
                <div class = "">
                    <p>${element.TITULO}</p>
                    <p>${element.TEXTO}</p>
                    <p>${element.AUTOR}</p>
                </div>`  
            });
            $("#noticias-content").html(html);
        },
        "JSON"
    );
});