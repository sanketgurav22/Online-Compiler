let editor;

window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/c_cpp");
}

function changeLanguage() {
    let language = $("#language").val();

    if (language == "c" || language == "cpp") editor.session.setMode("ace/mode/c_cpp");
    else if (language == "python") editor.session.setMode("ace/mode/python");
    else if (language == "node") editor.session.setMode("ace/mode/javascript");

}

function executecode() {
    debugger;
    $.ajax({
        url: "ide.php",
        method: "Post",
        data: {
            language: $("#language").val(),
            code: editor.getSession().getValue()
        },
        success: function(response) {
            debugger;
            $(".output").text(response)
        },
        error: function(reason) {
            debugger;
            $('.output').text(reason);
        }
    })
}