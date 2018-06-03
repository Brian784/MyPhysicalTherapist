ClassicEditor
    .create( document.querySelector( '#editor' )
        , {
            removePlugins: [ 'Heading'],
            toolbar: [ 'bold', 'italic', 'link', 'blockQuote' ]
        })
    .then( editor => {
    console.log( editor );
} )
.catch( error => {
    console.error( error );
} );