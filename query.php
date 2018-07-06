<?php
    if (isset($_GET["Text"])) { //отловить GET запрос на изменение URL
        // если был передан параметр NeedUrl, на изменение названия
        // по собственному желанию
        if (empty($_GET['NeedUrl']) == false) 
            // получить собственное название URL
            $randFileName = $_GET['NeedUrl'] . ".php";  
        else
            // иначе сгенерировать рандомный название URL
            $randFileName = substr(md5(microtime()), rand(0,21), 10) . ".php";
        // текст будет записан в файл для перехода на нужную страницу
        $text = "<?php header(\"Location:". $_GET["Text"] ."\"); ?>";
        $fp = fopen($randFileName, "w");
        fwrite($fp, $text);
        fclose($fp);
        // вернуть полное название URL клиенту
        echo $_SERVER['HTTP_HOST'] . "/" . $randFileName;
    }
?>