function FillerText(element, count = 50, text = "random text") {
    for (var i = 0; i < count; i++) {
        var size = 100 + (i * 1.5) + 1;
        var style = "style='font-size: " + size + "%'";
        element.innerHTML += "<p " + style + ">" + text + "</p>";
    }
}