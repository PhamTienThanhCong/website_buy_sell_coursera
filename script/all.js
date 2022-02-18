
$( "#project" ).autocomplete({
    minLength: 1,
    source: "../processing/livesearch.php",
    focus: function( event, ui ) {
        $( "#project" ).val( ui.item.label );
        return false;
    },
    select: function( event, ui ) {
        $( "#project" ).val( ui.item.label );
        $( "#project-id" ).val( ui.item.value );
        $( "#project-description" ).html( ui.item.desc );
        $( "#project-icon" ).attr( "src", "public/images/upload" + ui.item.icon );

        return false;
    }
})
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
    return $( "<li>" )
        .append( "<div>" + item.label + "<br>" + item.desc + "</div>" )
        .appendTo( ul );
};
} );
</script>
