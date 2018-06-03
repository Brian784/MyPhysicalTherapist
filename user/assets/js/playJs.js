var video = document.querySelector('video');
video.controls; // true
video.controlsList ["nodownload"];

video.getAttribute('controlsList');

$(document).ready(function() {
    $("video").bind("contextmenu",function(){
        return false;
    });
} );
