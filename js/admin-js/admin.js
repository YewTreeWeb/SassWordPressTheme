jQuery(document).ready(function($) {

  var mediaUploader;

  $( '#upload-profile' ).on('click',function(e) {
    e.preventDefault();
    if( mediaUploader ){
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Upload Profile Picture',
      button: {
        text: 'Choose Image'
      },
      multiple: false
    });

    mediaUploader.on('select', function(){
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $( '#submitted-picture' ).val(attachment.url);
    });

    mediaUploader.open();

  });

  var logoMediaUploader;

  $( '#logo-image' ).on('click',function(e) {
    e.preventDefault();
    if( logoMediaUploader ){
      logoMediaUploader.open();
      return;
    }

    logoMediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Upload Logo',
      button: {
        text: 'Choose Image'
      },
      multiple: false
    });

    logoMediaUploader.on('select', function(){
      attachment = logoMediaUploader.state().get('selection').first().toJSON();
      $( '#submitted-logo' ).val(attachment.url);
      $( 'logo-preview' ).css('background','url('+ attachment.url +')');
    });

    logoMediaUploader.open();

  });


});
