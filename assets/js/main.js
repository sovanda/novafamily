
(function($)
{
	
  /*--------------------------------------------------------------------------------------*/
  /*  Primary navigation
  /*--------------------------------------------------------------------------------------*/
  $( 'ul.primary-nav li' ).each(function(){
    var submenu = $(this).find('ul:first');
    $(this).hover(function(){
      submenu.stop().slideDown(250, function(){
                                      $(this).css({overflow:"visible", height:"auto"});
                                    });
    }, function(){
      submenu.stop().slideUp(250, function(){ 
                                      $(this).css({overflow:"hidden", display:"none"});
                                    });
    });
  });

  /*--------------------------------------------------------------------------------------*/
  /*  Set default welcome section         
  /*--------------------------------------------------------------------------------------*/
  /*var headerHeight = $('#header').height(),
  windowHeight = $(window).height(),
  welcomeHeight = $('#welcome').height();
  if ( windowHeight >= 680 ){
    
    $('#welcome, #contacts, .preloading').height($(window).height());

    $('#work').waypoint(function(direction) {
      if ( direction == 'down' ) {
        $('html, body').animate({scrollTop: $('#work').offset().top}, 1000, 'easeOutExpo');
      }
    }, {
      offset: '99.5%'
    });

  }*/

  //Work Scroll Down
  $('#scroll-down-work').click(function(event){
    event.preventDefault();
    $('html, body').animate({scrollTop: $('#work').offset().top}, 1000);
  })

  $('#scroll-down-clients').click(function(event){
    event.preventDefault();
    $('html, body').animate({scrollTop: $('#clients').offset().top}, 1000);
  })

  $('#welcome .container, #work .container, #contacts, .preloading').height($(window).height());
  
  $(window).load(function(){

    $('.spinner').fadeOut();
    $('.preloading').delay(1000).fadeOut("slow");
    
   }); 

  /*--------------------------------------------------------------------------------------*/
  /*  Make all the videos responsive with FitVids - http://fitvidsjs.com/         
  /*--------------------------------------------------------------------------------------*/
  $('#content').fitVids();

  /*--------------------------------------------------------------------------------------*/
  /*  Init Comments Reply Script         
  /*--------------------------------------------------------------------------------------*/
  addComment = {
    moveForm : function(commId, parentId, respondId, postId) {
      var t = this, div, comm = t.I(commId), respond = t.I(respondId), cancel = t.I('cancel-comment-reply-link'), parent = t.I('comment_parent'), post = t.I('comment_post_ID');

      if ( ! comm || ! respond || ! cancel || ! parent )
        return;

      t.respondId = respondId;
      postId = postId || false;

      if ( ! t.I('wp-temp-form-div') ) {
        div = document.createElement('div');
        div.id = 'wp-temp-form-div';
        div.style.display = 'none';
        respond.parentNode.insertBefore(div, respond);
      }

      //comm.parentNode.insertBefore(respond, comm.nextSibling);
      if ( post && postId )
        post.value = postId;
      parent.value = parentId;
      cancel.style.display = '';

      $('html,body').animate({scrollTop: $('#reply-title').offset().top}, 500, 'easeInQuad');

      cancel.onclick = function() {
        var t = addComment, temp = t.I('wp-temp-form-div'), respond = t.I(t.respondId);

        if ( ! temp || ! respond )
          return;

        t.I('comment_parent').value = '0';
        temp.parentNode.insertBefore(respond, temp);
        temp.parentNode.removeChild(temp);
        this.style.display = 'none';
        this.onclick = null;
        return false;
      }

      try { t.I('comment').focus(); }
      catch(e) {}

      return false;
    },

    I : function(e) {
      return document.getElementById(e);
    }
  }

  var commentform=$('#comment-form'); 
  commentform.prepend('<div id="comment-status"></div>'); 
  var statusdiv=$('#comment-status');
   
  commentform.submit(function(){

    var formdata=commentform.serialize();
    statusdiv.html('<p>' + theme_objects.commentProcess + '</p>');
    var formurl=commentform.prop('action');

    $.ajax({
      type: 'post',
      url: formurl,
      data: formdata,
      error: function(XMLHttpRequest, textStatus, errorThrown){
        statusdiv.html('<p class="wdpajax-error">' + theme_objects.commentError + '</p>');
      },
      success: function(data, textStatus){
        //if(data=="success")
        statusdiv.html('<p class="ajax-success">' + theme_objects.commentSuccess + '</p>');
        //else
        //statusdiv.html('<p class="ajax-error" >Please wait a while before posting your next comment</p>');
        //commentform.find('textarea[name=comment]').val('');
      }
    });

    return false;
   
  });


}(jQuery));

// Init WOW js
new WOW().init();