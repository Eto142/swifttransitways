///////////////////////////////////////////////////////////////////////////////////////   
$(window).scroll(function(){$("header").toggleClass("aniPos",$(this).scrollTop()>0)})
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////
jQuery(document).ready(function(){
// mmenu
    api = jQuery("#menu").mmenu({
       slidingSubmenus: true,
       onClick: null,
        offCanvas: {
          position  : "right"
        },
        navbar: {            
            
        },
        extensions: [
            "pagedim-black"
        ]
    });

    // Tabs
});

 /////////////////////////////////////////////////////////////////////////////////////////
 window.scrollTo({ top: 0, behavior: 'smooth' });
 ///////////////////////////////////////////////////////////////////////////////////////   
 // $(window).scroll(function(){$("header").toggleClass("aniPos",$(this).scrollTop()>0)})
////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////// 
    //////////////////////////////////////////////////////
    jQuery(".wpcf7-form-control-wrap").mouseover(function () {
        ($obj = $("span.wpcf7-not-valid-tip", this)), $obj.css("display", "none");
    })
///////////////////////////////////////

$('.counter').counterUp({
    delay: 30,
    time: 2000
  });
  ///////////////////////////////////////

  
  ///////////////////////////////////////////////////////////
 
  jQuery(".homebanner").owlCarousel({
    autoplay: true,
    lazyLoad: true,
    loop: true,
    margin: 0, 
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
  autoplayHoverPause: false, // Stops sliding on hover
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1
      },
      767: {
        items: 1
      }
    }
});

jQuery(".storyslide").owlCarousel({
  autoplay: false,
  lazyLoad: true,
  loop: true,
  margin: 0, 
  center:true,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
autoplayHoverPause: true, // Stops sliding on hover
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 1
    },
    767: {
      items: 1
    }
  }
});
   jQuery(".testimonials").owlCarousel({
    autoplay: false,
      lazyLoad: true,
      loop: true,
      margin: 0, 
      responsiveClass: true,
      autoHeight: true,
    slideTransition: 'linear',
      autoplayTimeout: 5000,
      smartSpeed: 1100,
    autoplayHoverPause: true, // Stops sliding on hover
      nav: true,
      dots: false,
      slideBy: 1,
      responsive: {
          0: {
              items: 1, // Single item for small screens
              
          },
      760: {
              items: 1, // Four items for larger screens
            
          },
          980: {
              items: 1, // Four items for larger screens
              
          },
          1025: {
              items: 1, // Four items for larger screens
              
          },
          1280: {
            items: 1, // Four items for larger screens
             
        }
      }
  
  });
 
  jQuery(".associates").owlCarousel({
    autoplay: false,
      lazyLoad: true,
      loop: true,
      margin: 30, 
      responsiveClass: true,
      autoHeight: true,
    slideTransition: 'linear',
      autoplayTimeout: 5000,
      smartSpeed: 1100,
    autoplayHoverPause: true, // Stops sliding on hover
      nav: false,
      dots: true,
      slideBy: 1,
      responsive: {
          0: {
              items: 2, // Single item for small screens
              
          },
      760: {
              items: 3, // Four items for larger screens
            
          },
          980: {
              items: 5, // Four items for larger screens
              
          },
          1025: {
              items: 5, // Four items for larger screens
              
          },
          1280: {
            items: 6, // Four items for larger screens
             
        }
      }
  
  });
  jQuery(".achivehm").owlCarousel({
    autoplay: false,
      lazyLoad: true,
      loop: true,
      margin: 80, 
      responsiveClass: true,
      autoHeight: true,
    slideTransition: 'linear',
      autoplayTimeout: 5000,
      smartSpeed: 1100,
    autoplayHoverPause: true, // Stops sliding on hover
      nav: true,
      dots: false,
      slideBy: 1,
      responsive: {
          0: {
              items: 1, // Single item for small screens
              
          },
      760: {
              items: 1, // Four items for larger screens
            
          },
          980: {
              items: 2, // Four items for larger screens
              
          },
          1025: {
              items: 3, // Four items for larger screens
              margin: 45,    
          },
          11538: {
            items: 3, // Four items for larger screens
             
        }
      }
  
  });
   jQuery(".galleryslide").owlCarousel({
    autoplay: false,
      lazyLoad: true,
      loop: true,
      center:true,
      margin: 25, 
      responsiveClass: true,
      autoHeight: true,
    slideTransition: 'linear',
    autoplayTimeout: 5000,
    smartSpeed: 1100,
    autoplayHoverPause: true, // Stops sliding on hover
      nav: true,
      dots: false,
      slideBy: 1,
      responsive: {
          0: {
              items: 1, // Single item for small screens
              smartSpeed: 2000,
              autoplayTimeout: 6000,
          },
      768: {
              items: 2 // Four items for larger screens
          },
          980: {
              items: 3 // Four items for larger screens
          }, 
          
        1280: {
          items: 2.7, // Four items for larger screens
           
      }
      }
  
  });

  jQuery(".placedstd").owlCarousel({
    autoplay: false,
      lazyLoad: true,
      loop: true,
      margin: 30, 
      responsiveClass: true,
      autoHeight: true,
    slideTransition: 'linear',
      autoplayTimeout: 5000,
      smartSpeed: 1100,
    autoplayHoverPause: true, // Stops sliding on hover
      nav: false,
      dots: true,
      slideBy: 1,
      responsive: {
          0: {
              items: 1, // Single item for small screens
              
          },
      760: {
              items: 1, // Four items for larger screens
              margin: 0,
          },
          980: {
              items: 2, // Four items for larger screens
              margin: 0,
          },
          1025: {
              items: 3, // Four items for larger screens
              margin: 0,
          },
          1280: {
            items: 3, // Four items for larger screens
             
        }
      }
  
  });
 
  AOS.init({
    once: true,  // Ensures the animation runs only once when the element scrolls into view
    duration: 1000,  // Duration for the animation to complete (can be adjusted)
  });
  $(document).ready(function(e) {
    // live handler
    lc_lightbox('.elem', {
      wrap_class: 'lcl_fade_oc',
      gallery : true,	
      thumb_attr: 'data-lcl-thumb', 
      
      skin: 'minimal',
      radius: 0,
      padding	: 0,
      border_w: 0,
    });	
  
  });

  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".accordion-button").forEach(btn => {
      if (btn.getAttribute("aria-expanded") === "true") btn.classList.add("open");
    });
  
    document.querySelectorAll(".accordion-collapse").forEach(collapse => {
      collapse.addEventListener("shown.bs.collapse", toggleOpenClass);
      collapse.addEventListener("hidden.bs.collapse", toggleOpenClass);
    });
  
    function toggleOpenClass() {
      document.querySelectorAll(".accordion-button").forEach(btn => btn.classList.remove("open"));
      let activeBtn = this.previousElementSibling.querySelector(".accordion-button");
      if (activeBtn && this.classList.contains("show")) activeBtn.classList.add("open");
    }
  });
  

  jQuery(document).ready(function ($) {
    $(".clss").click(function (e) {
        e.preventDefault();
        $(".popad").removeClass("show");
    });
});
 
jQuery(document).ready(function($){
  $('.close').click(function(e){
    e.preventDefault(); // prevent default anchor behavior
    $('.popup-outer').hide(); // hide the popup
  });
});





 

