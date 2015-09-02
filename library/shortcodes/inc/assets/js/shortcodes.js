(function($)
{

	/*--------------------------------------------------------------------------------------*/
	/* 	UI Elements
	/*--------------------------------------------------------------------------------------*/

	/* Tabs */ 
	$('.tabs-container').each(function(){

      var $titles = $(this).children('.titles').children('li'),
        $contents = $(this).children('.tab-contents').children('div'),
        $openedT = $titles.eq(0),
        $openedC = $contents.eq(0);

      $openedT.addClass('opened');

      $titles.click(function(){

        $openedT.removeClass('opened');
        $openedT = $(this);
        $openedT.addClass('opened');

        $openedC.stop().slideUp(200);
        $openedC = $contents.eq($(this).index());
        $openedC.stop().delay(200).slideDown(200);

        return false;

      });

    });

  /* Accordion */ 
  $('.accordion').each(function(){

      var toggle = $(this).hasClass('toggle') ? true : false,
        $sections = $(this).children('section'),
        $opened = $(this).data('opened') == '-1' ? null : $sections.eq(parseInt($(this).data('opened')));

      if($opened != null){
        $opened.addClass('opened');
        $opened.children('div').slideDown(0);
      }

      $(this).children('section').children('h4').click(function(){

        $this = $(this).parent();

        if(!toggle){
          if($opened != null){
            $opened.removeClass('opened');
            $opened.children('div').stop().slideUp(300);
          }
        }

        if($this.hasClass('opened') && toggle){
          $this.removeClass('opened');
          $this.children('div').stop().slideUp(300);
        } else if(!$this.hasClass('opened')){
          $opened = $this;
          $this.addClass('opened');
          $this.children('div').stop().slideDown(300);
        }

      });

  });

}(jQuery));