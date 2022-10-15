
// PURCHASE BUTTON ANIMATION
// #########################

let el = document.getElementsByClassName('purchasebutton')[0]
let elem = document.getElementById('purchaseicon')
let ele = document.getElementsByClassName('btntext')[0]

/*
  * Add a listener for mousemove event
  * Which will trigger function 'handleMove'
  * On mousemove
  */
el.addEventListener('mousemove', handleMove)

function ai(i, a, t, e, n) {
    return e + (i - a) * (n - e) / (t - a)
}
/* Define function a */
function handleMove(e) {
    /*
      * Get position of mouse cursor
      * With respect to the element
      * On mouseover
      */
    /* Store the x position */

    var a = e.target.getBoundingClientRect()
        , t = e.clientX - a.left
        , e = e.clientY - a.top
        , x = ai(t, 0, a.width, -20, 20)
        , y = ai(e, 0, a.height, -20, 20)
    /*
      * Calculate rotation valuee along the Y-axis
      * Here the multiplier 20 is to
      * Control the rotation
      * You can change the value and see the results
      */


    /* Generate string for CSS transform property */
    const string = "translate3d(" + x * 0.5 + "px," + y * 0.5 + "px, 0px)"
    const skewString = "skew(" + x / 5 + "deg, " + y / 5 + "deg)"
    const stringIc = "translate3d(" + x + "px," + y + "px, 0px)"
    /* Apply the calculated transformation */

    /* Apply the calculated transformation */
    elem.style.transform = stringIc
    elem.style.transformStyle = "preserve-3d"
    el.style.transform = skewString
    ele.style.transform = string

}

/* Add listener for mouseout event, remove the rotation */
el.addEventListener('mouseout', function () {
    el.style.transform = 'perspective(500px)  rotateX(0) rotateY(0)'
    elem.style.transform = "translate3d(" + 0 + "px," + 0 + "px, 0px)"
    ele.style.transform = "translate3d(" + 0 + "px," + 0 + "px, 0px)"
})

/* Add listener for mousedown event, to simulate click */
el.addEventListener('mousedown', function () {

    el.style.transform = 'perspective(500px)  rotateX(0) rotateY(0)'
    elem.style.transform = "translate3d(" + 0 + "px," + 0 + "px, 0px)"
    ele.style.transform = "translate3d(" + 0 + "px," + 0 + "px, 0px)"
})

// PURCHASE BUTTON ANIMATION
// #########################




/* ==========================================================================
                            LOAD SCRIPT ON SCROLL 
   ========================================================================== */
   function dynamicLoad(url) {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
}
window.addEventListener("scroll", loadScripts);

function loadScripts() {
    //load here as many dynamic scripts as you want
    dynamicLoad("js/lottie.js");
    dynamicLoad("https://cdn.jsdelivr.net/npm/promise-polyfill");
    dynamicLoad("https://cdn.jsdelivr.net/npm/sweetalert2@9");
    //end ------
    window.removeEventListener("scroll", loadScripts);
}
/* ==========================================================================
                            END OF LOAD SCRIPT ON SCROLL 
 ========================================================================== */



// LAZY LOADING Vanilla JS
//  #################################
var lottie = document.querySelectorAll('.lottie-animation-2');

var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {

            // LOTTIE ANIMATION
            //  #################################
            var animation = bodymovin.loadAnimation({
                container: document.getElementById('15f12db3-ecff-bebd-09d4-7862ca85b74c'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'img/12781-animation-delivery-on-a-bike.json'

            });

            // END OF LOTTIE ANIMATION
            //  #################################
            var lot = entry.target;
            observer.unobserve(entry.target);
            console.log(entry)
        }
    });
},
    {});
lottie.forEach(lot => {
    observer.observe(lot);
});
// End of LAZY LOADING Vanilla JS
//  #################################

// LAZY LOADING Vanilla JS
//  #################################
var lottie3 = document.querySelectorAll('.lottie-animation-12');

var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // LOTTIE ANIMATION
            //  #################################

            var animation = bodymovin.loadAnimation({
                container: document.getElementById('6baebf70-2edf-fa57-bcf9-ef01e4b6c8bc'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'img/Lottie2.json'

            });

            // END OF LOTTIE ANIMATION
            //  #################################

            var lot3 = entry.target;
            observer.unobserve(entry.target);
            console.log(entry)
        }
    });
},
    {});
lottie3.forEach(lot3 => {
    observer.observe(lot3);
});
// End of LAZY LOADING Vanilla JS
//  #################################

// LAZY LOADING Vanilla JS
//  #################################
var lottie8 = document.querySelectorAll('.lottie-animation-3');

var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // LOTTIE ANIMATION
            //  #################################

            var animation = bodymovin.loadAnimation({
                container: document.getElementById('4334fc75-2eb4-895a-851e-b90c5787e136'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'img/Lottie3.json'

            });

            // END OF LOTTIE ANIMATION
            //  #################################

            var lot8 = entry.target;
            observer.unobserve(entry.target);
            console.log(entry)
        }
    });
},
    {});
lottie8.forEach(lot8 => {
    observer.observe(lot8);
});
// End of LAZY LOADING Vanilla JS
//  #################################


// LAZY LOADING Vanilla JS
//  #################################
var lottie7 = document.querySelectorAll('.lottie-animation-8');

var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // LOTTIE ANIMATION
            //  #################################

            var animation = bodymovin.loadAnimation({
                container: document.getElementById('1073c957-e0d3-cd2a-44c5-081f3f124b79'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'img/Paper-Plane-animated-illustration.json'

            });

            // END OF LOTTIE ANIMATION
            //  #################################

            var lot7 = entry.target;
            observer.unobserve(entry.target);
            console.log(entry)
        }
    });
},
    {});
lottie7.forEach(lot7 => {
    observer.observe(lot7);
});
// End of LAZY LOADING Vanilla JS
//  #################################


// LAZY LOADING Vanilla JS
//  #################################
var lottie9 = document.querySelectorAll('.lottie-animation-7');

var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // LOTTIE ANIMATION
            //  #################################

            var animation = bodymovin.loadAnimation({
                container: document.getElementById('60a53772-2399-c3e7-2c8a-a49a425ece35'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'img/Navigating-male-animated-illustration.json'

            });

            // END OF LOTTIE ANIMATION
            //  #################################

            var lot9 = entry.target;
            observer.unobserve(entry.target);
            console.log(entry)
        }
    });
},
    {});
lottie9.forEach(lot9 => {
    observer.observe(lot9);
});
// End of LAZY LOADING Vanilla JS
//  #################################



// LAZY LOADING Vanilla JS
//  #################################
var lottie5 = document.querySelectorAll('.lottie-animation-13');

var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // LOTTIE ANIMATION
            //  #################################

            var animation = bodymovin.loadAnimation({
                container: document.getElementById('7cdf7a2f-c635-65da-b58b-9f3c9d1b6343'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'img/data.json'

            });

            // END OF LOTTIE ANIMATION
            //  #################################

            var lot5 = entry.target;
            observer.unobserve(entry.target);
            console.log(entry)
        }
    });
},
    {});
lottie5.forEach(lot5 => {
    observer.observe(lot5);
});
// End of LAZY LOADING Vanilla JS
//  #################################


// LAZY LOADING Vanilla JS
//  #################################
var lottie6 = document.querySelectorAll('.lottie-animation-5');

var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // LOTTIE ANIMATION
            //  #################################

            var animation = bodymovin.loadAnimation({
                container: document.getElementById('07ec2f54-076f-1b9c-72a4-39590e7a2adf'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'img/lf30_editor_VPmQYi.json'

            });

            // END OF LOTTIE ANIMATION
            //  #################################

            var lot6 = entry.target;
            observer.unobserve(entry.target);
            console.log(entry)
        }
    });
},
    {});
lottie6.forEach(lot6 => {
    observer.observe(lot6);
});
// End of LAZY LOADING Vanilla JS
//  #################################


// LAZY LOADING Vanilla JS
//  #################################
var lottie10 = document.querySelectorAll('.lottie-animation-6');

var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // LOTTIE ANIMATION
            //  #################################

            var animation = bodymovin.loadAnimation({
                container: document.getElementById('00b4246a-bf0b-84cd-fe3e-14bae2c8da8a'),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: 'img/IncreaseEngagementanimatedillustration.json'

            });

            // END OF LOTTIE ANIMATION
            //  #################################

            var lot10 = entry.target;
            observer.unobserve(entry.target);
            console.log(entry)
        }
    });
},
    {});
lottie10.forEach(lot10 => {
    observer.observe(lot10);
});
// End of LAZY LOADING Vanilla JS
//  #################################


/* ==========================================================================
                    LAZYLOAD FEEDBACK.JS 
========================================================================== */
var feedback = document.querySelectorAll('.pricing-area');

var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {

/* ==========================================================================
                    LOAD FEEDBACK.JS  ONLY WHEN ENTERING SECTION 
========================================================================== */
            function feedbackLoad(url) {
                var script = document.createElement("script");
                script.type = "text/javascript";
                script.src = url;
                document.getElementsByTagName("head")[0].appendChild(script);
            }
            loadFeedback();

            function loadFeedback() {
                //load here as many dynamic scripts as you want
                feedbackLoad("js/feedback.js");
                //end ------
            }
/* ==========================================================================
                    END OF LOAD FEEDBACK.JS  ONLY WHEN ENTERING SECTION
========================================================================== */

            var fb = entry.target;
            observer.unobserve(entry.target);
            console.log(entry)
        }
    });
},
    {});
feedback.forEach(fb => {
    observer.observe(fb);
});
/* ==========================================================================
                    END OF LAZYLOAD FEEDBACK.JS  
========================================================================== */




$('#storePageBtn').click(function (){
    window.location.href = "/store";
})