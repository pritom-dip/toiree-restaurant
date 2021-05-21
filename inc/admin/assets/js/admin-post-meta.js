/**
/*global jQuery:false */
/*global Adminobg:false */

window.Project = (function (window, document, $, undefined) {
    'use strict';

    var admin = {
        initialize: function () {
            admin.repeatableField();
            admin.dragNDropField();
            admin.gallaryDragNDropField();
            admin.menuListDragNDropField();
            
            $('.tt_upload_image_button').on('click', admin.imageUploadOnClick);

            $( document ).on( 'click', '#manage_gallery', admin.upload_gallery_button )
             .on( 'click', '#empty_gallery', admin.empty_gallery_button )
             .on( 'click', '.gallery-item .remove', admin.empty_single_image );

            Array.prototype.remove = function() {
                var what, a = arguments, L = a.length, ax;
                while (L && this.length) {
                    what = a[--L];
                    while ((ax = this.indexOf( what )) !== -1) {
                        this.splice( ax, 1 );
                    }
                }
                return this;
            };

        },
        upload_gallery_button: function(e){
            var $this = $( e.currentTarget );
            e.preventDefault();
            if ( ! $this.data( 'lockedAt' ) || + new Date() - $this.data( 'lockedAt' ) > 300) { // Doubleclick prevent.
                var $input_field = $( '#tr_gallery_input' );
                var ids = $input_field.val();
                var gallerysc = '[gallery ids="' + ids + '"]';
                wp.media.gallery.edit( gallerysc ).on('update', function(g) {
                    var id_array = [];
                    var url_array = [];
                    $.each(g.models, function(id, img){
                        url_array.push( img.attributes.url );
                        id_array.push( img.id );
                    });
                    var ids = id_array.join( "," );
                    ids = ids.replace( /,\s*$/, "" );
                    var urls = url_array.join( "," );
                    urls = urls.replace( /,\s*$/, "" );
                    $input_field.val( ids );
                    var html = '';
                    for (var i = 0 ; i < url_array.length; i++) {
                        html += '<div class="gallery-item" data-id="' + id_array[i] + '"><div class="remove">x</div><img src="' + url_array[i] + '"></div>';
                    }

                    $( '.gallery_images' ).html( '' ).append( html );
                });
            }
            $this.data( 'lockedAt', + new Date() );
        },
        empty_gallery_button: function(e){
            e.preventDefault();
            var $input_field = $( '#tr_gallery_input' );
            $input_field.val( '' );
            $( '.gallery_images' ).html( '' );
        },
        empty_single_image: function(e){
            e.preventDefault();
            var $this = $( this );
            var value = $this.parent().data( 'id' );
            var $this_image = $this.parent().find( 'img' );
            var $this_image_url = $this_image.attr( 'src' );
            var $input_field = $( '#tr_gallery_input' );
            var existing_values_arr = $input_field.val().split( ',' );
            var new_arr = existing_values_arr.remove( value.toString() );
            var replace_str = new_arr.join();
            $input_field.val( '' ).val( replace_str );
            $this.parent().remove();
        },
        repeatableField: function(){
            var repeater = $('.repeater-default').repeater({
                initval: 7,
                defaultValues: {
                    'image': ''
                }
            });
            repeater.on('click', '.tt_upload_image_button', admin.imageUploadOnClick);
        },
        dragNDropField:function(){
            jQuery(".drag").sortable({
                axis: "y",
                cursor: 'pointer',
                opacity: 0.5,
                placeholder: "row-dragging",
                delay: 150,
                update: function(event, ui) {
                  
                }    
            }).disableSelection();
        },
        gallaryDragNDropField:function(){

            var portfolioList = $('#portfolio-list');

            $(".portfolio-dragable").sortable({
                axis: "y",
                cursor: 'pointer',
                opacity: 0.5,
                placeholder: "row-dragging",
                delay: 150,
                update: function(event, ui) {

                    $.ajax({
                        type : "POST",
                        dataType : "json",
                        url : Adminobg.ajaxurl,
                        async: true,
                        cache: false,
                        data : {
                            action: 'portfolio_sortable', 
                            order: portfolioList.sortable('toArray').toString() 
                        },
                        success: function(response) {
                            
                        },
                        error: function(xhr,textStatus,e) {
                            
                        }
                    });
                }    
            }).disableSelection();
        },
        menuListDragNDropField:function(){

            var menuList = $('#menu-list');

            $(".menu_list-dragable").sortable({
                axis: "y",
                cursor: 'pointer',
                opacity: 0.5,
                placeholder: "row-dragging",
                delay: 150,
                update: function(event, ui) {

                    $.ajax({
                        type : "POST",
                        dataType : "json",
                        url : Adminobg.ajaxurl,
                        async: true,
                        cache: false,
                        data : {
                            action: 'menu_list_sortable', 
                            order: menuList.sortable('toArray').toString() 
                        },
                        success: function(response) {
                            
                        },
                        error: function(xhr,textStatus,e) {
                            
                        }
                    });
                }    
            }).disableSelection();
        },
        imageUploadOnClick: function(){
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button              = $(this);
            wp.media.editor.send.attachment = function(props, attachment) {
                $(button).children().attr('src', attachment.url);
                $(button).children('.tt-msg-image').val(attachment.id);
                wp.media.editor.send.attachment = send_attachment_bkp;
            };
            wp.media.editor.open(button);
            return false;
        }
    };
    $(document).ready(admin.initialize);

    return admin;
})(window, document, jQuery); 
