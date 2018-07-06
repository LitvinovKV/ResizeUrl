<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Задание 2</title>
</head>

<body>
    <form>
        <p>Введите URL: <input type="text" id="TextUrl"> </p>
        <p>(Не обязательно) Введите собственный сокращенный URL: <input type="text" id="NeededUrl"> </p>
        <p><input type="button" onclick="ResizeUrl()" value="Сократить" ></p>
    </form>
</body>


 <script>
    function ResizeUrl(Text = document.getElementById("TextUrl").value, NeedUrl = document.getElementById("NeededUrl").value) {
        if (Text.length == 0) alert("Введите url");
        else {
            let XHR = new XMLHttpRequest();
            if (NeedUrl.length != 0)
                XHR.open("GET", "query.php?Text=" + Text + "&NeedUrl=" + NeedUrl, false);
            else
                XHR.open("GET", "query.php?Text=" + Text, false);
            XHR.send();
            if (XHR.status == 200) {
                alert(XHR.responseText);
                let newDiv = document.createElement("p");
                newDiv.innerHTML = "Сокращенный URL: " + XHR.responseText;
                document.body.appendChild(newDiv);
            }
        }
    }
</script>

</html>