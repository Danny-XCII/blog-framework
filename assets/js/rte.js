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

let form = document.querySelector( "#add-post-form" );
let amendedContent = false;
let hiddenContent = document.querySelector( "#hidden-content" );
let editor = document.querySelector( "#quill-editor" );

form.addEventListener( "submit", function ( e ) {

    if ( !amendedContent ) {

        e.preventDefault();

    }

    let html = editor.children[ 0 ].innerHTML;

    hiddenContent.value = html;
    amendedContent = true;

    form.submit();

});