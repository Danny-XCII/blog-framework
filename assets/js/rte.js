var toolbarOptions = [

    [ { "header" : [ 1, 2, 3, 4, 5, 6, false ] } ],

    [ "bold", "italic", "underline" ],

    [ { "list" : "ordered" }, { "list" : "bullet" } ],

    [ "image", "code-block" ]

];

var quill = new Quill( "#quill-editor", {

    modules: {
        syntax: true,
        toolbar: toolbarOptions
    },
    theme: "snow"

});