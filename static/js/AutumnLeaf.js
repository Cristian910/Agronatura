// ========================================================
// Author: Klerith
// Page: http://codecanyon.net/user/klerith
// Email: fernando.herrera85@gmail.com
// 
// Version: v2.0
// 
// ========================================================

(function ($) 
{
  var leavesfolder = "";
  var $body = $("body");
  var fallInterval;

  var windowHeigth = $(window).height();
  var windowsWidth = $(window).width();

  var leafNum        = 0;
  var initiated      = false;
  var howmanyimgsare = 0;
  var maxyposition   = 10;
  var infinite       = true;
  var multiplyclick  = false;
  var multiplynumber = 1;

  $(window).resize(function(){
      windowHeigth = $(window).height() + 350;
      windowsWidth = $(window).width();
  });

  $(document).ready(function(){
    $("body").on("click",".autumnLeaf",function(){
      drop_leaf( $(this) );
      console.log("write");
    });

    $("body").on('click', '.autumnLeafFalling', function(event) {
       multiply_leaf( $(this) );
    });

  });


  $.AutumnLeafStart = function(settings){

    settings = $.extend({

        }, settings);

    if(initiated == true)
      return;

    initiated      = true;
    leavesfolder   = settings.leavesfolder
    howmanyimgsare = settings.howmanyimgsare;
    maxyposition   = settings.maxyposition;
    infinite       = settings.infinite;
    multiplyclick  = settings.multiplyclick;
    multiplynumber = settings.multiplynumber;

    var position = 0;
    for(var i = 0; i < settings.initialleaves; i++){
      create_leaf();
    }

    fallInterval = setInterval(function(){
        
        drop_leaf();

    }, settings.fallingsequence);
  };

    // Function create a leaf
    function create_leaf(){

      var newLeaf = "";
      leafNum += 1;

      var number = 1 + Math.floor(Math.random() * howmanyimgsare);
      var sizeRandom = 1 + Math.floor(Math.random() * 4);
      
      newLeaf = '<img id="lf'+ leafNum +'" class="autumnLeaf x'+ sizeRandom +'" src="'+ leavesfolder + number +'.png"/>';
      $("body").append(newLeaf);

      var $leaf = $("#lf"+leafNum);
      set_starting_point( $leaf );
    }

    function create_leaf_multiply($leaf_parent){

      for( var i=0; i< multiplynumber; i++ ){
          var newLeaf = "";
          leafNum += 1;

          var number = 1 + Math.floor(Math.random() * howmanyimgsare);
          var sizeRandom = 1 + Math.floor(Math.random() * 4);
          
          newLeaf = '<img id="lf'+ leafNum +'" data-multi="1" class="autumnLeaf x'+ sizeRandom +'" src="'+ leavesfolder + number +'.png"/>';
          $("body").append(newLeaf);

          var $leaf = $("#lf"+leafNum);
          var p    = $leaf_parent.position();
          var top  = p.top;
          var left = p.left;

          $leaf.css({
              top : top,
              left: left
            });

          TweenLite.to( $leaf, 0.5, { opacity:1 } );


          drop_leaf( $leaf )
        }
      
    }




    // Set the original position of the leaf
    function set_starting_point( $leaf ){

        var left_right = 1 + Math.floor(Math.random() * 2);
        var ranTop   = randomFromInterval(0, maxyposition);
        var ranLeft  = randomFromInterval(0, (windowsWidth / 2) );
        var ranRota  = randomFromInterval(0,40)*-1;
        var ranIntro = Math.floor( (Math.random()+ 0.9) *10 )/10;
        var ranX     = randomFromInterval(-30,30);
        

        $leaf.attr("position",left_right);

        
        if( left_right == 1 ){
          ranLeft += (windowsWidth / 2);
          ranRota *=-1;
        }
        
        $leaf.css({
          top : ranTop,
          left: ranLeft
        });

        TweenLite.to( $leaf, ranIntro, { x:"+="+ranX, y:"+=10", opacity:1, rotation: ranRota } );

    }

    // Drop leav function
    function drop_leaf( $leaf ){


      if( $leaf=== undefined ){

        var howManyRemain = $(".autumnLeaf").length;
        var ran = randomFromInterval(0,howManyRemain);
        $leaf = $(".autumnLeaf").eq(ran);
         
         if( howManyRemain == 0 ){
            return;
         }

         if( howManyRemain == 0 && infinite == false ){
            clearInterval( fallInterval );
         }
      }


      $leaf.removeClass('autumnLeaf').addClass('autumnLeafFalling');

      var left_right = 1 + Math.floor(Math.random() * 2);
      var x = randomFromInterval(100,400);
      var r = randomFromInterval(100,250);
      var fallTime = randomFromInterval(4,15);
      

      var tlSwing = new TimelineMax({ repeat:-1 });
      var tlFall    = new TimelineMax();


      var tlRota = new TimelineMax({ repeat:-1, yoyo:true });

      if( left_right == 1 ){
        tlSwing.to( $leaf, 2,{ left:"+="+x, rotation:"-=" + r, ease: Power1.easeInOut } )
               .to( $leaf, 2,{ left:"-="+x, rotation:"+=" + r, ease: Power1.easeInOut } );
      }else{
         tlSwing.to( $leaf, 2,{ left:"-="+x, rotation:"+=" + r, ease: Power1.easeInOut } )
               .to( $leaf, 2,{ left:"+="+x, rotation:"-=" + r, ease: Power1.easeInOut } )
      }

      tlFall.to( $leaf, fallTime, { y: windowHeigth, ease: Power0.easeNone, onComplete:remove_leaf, onCompleteParams:$leaf });

    }

    function remove_leaf($leaf){
      
      if( $leaf !== undefined ){

        $leaf = $($leaf);
        var isMulti = $leaf.data("multi");

        $leaf.fadeOut(200,function(){
          $(this).remove();
        });

        if( infinite && isMulti === undefined ){
          create_leaf();
        }

        // if( $leaf.data("multi") !== undefined ){
        //   return;
        // }
      }

  
      

    };

    function multiply_leaf( $leaf ){

      if( multiplyclick === false )
          return;

        var click = $leaf.data("clicked");
        if( click === undefined ){
           $leaf.attr("clicked","1");
        }else{
          return;
        }

        create_leaf_multiply( $leaf );

    };



$.AutumnLeafAdd = function(settings){
  settings = $.extend({
            leavesfolder: "static/AutumnLeafs/",
            add: 1,
        }, settings);

    for(var z=0; z<settings.add; z++){
        create_leaf();
    } //EndFor

};


// Special Functions
function randomFromInterval(from,to)
{
  return Math.floor(Math.random()*(to-from+1)+from);
}


})(jQuery);
