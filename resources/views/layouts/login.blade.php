<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Saphira</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">--}}
        {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">--}}

        <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    </head>
    <body>
        @guest
            <main class="login">
                @yield('login', View::make('login')) <!--auth/login.blade.php-->
            </main>
        @endguest
        @auth
            <main class="home">
                @yield('home', View::make('home'))  <!--/home.blade.php-->
            </main>
        @endauth

        <script src="https://unpkg.com/swiper/js/swiper.js"></script>
        <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
        <script>
            //for the navbarmenu
            $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            });

            $('#nav-header').hover(function() {
                $("#bs-example-navbar-collapse-1").css({"display":"block"});
            }, function() {
                $("#bs-example-navbar-collapse-1").css({"display":"none"});
            });

            $('#bs-example-navbar-collapse-1').hover(function() {
                $("#bs-example-navbar-collapse-1").css({"display":"block"});
            }, function() {
                $("#bs-example-navbar-collapse-1").css({"display":"none"});
            });

            //for the backgroud on home with the hexagones
            if ($('#c').length > 0) {
                var w = c.width = window.innerWidth,
                    w = w/3,
                    h = c.height = window.innerHeight,
                    ctx = c.getContext('2d'),

                    opts = {

                        len: 20,
                        count: 300,
                        baseTime: 10,
                        addedTime: 10,
                        dieChance: .05,
                        spawnChance: 1,
                        sparkChance: .1,
                        sparkDist: 10,
                        sparkSize: 2,

                        color: 'hsl(hue,100%,light%)', //The hexagone color
                        baseLight: 50,
                        addedLight: 10, // [50-10,50+10]
                        shadowToTimePropMult: 6,
                        baseLightInputMultiplier: .01,
                        addedLightInputMultiplier: .02,

                        cx: w / 2, //damit es in der Mitte ist
                        cy: h / 2, //damit es in der Mitte ist
                        repaintAlpha: .04,
                        hueChange: .1
                    },

                    tick = 0,
                    lines = [],
                    dieX = w / 2 / opts.len,
                    dieY = h / 2 / opts.len,

                    baseRad = Math.PI * 2 / 6;

                ctx.fillStyle = '#02558B';
                ctx.fillRect(0, 0, w, h);

                function loop() {

                    window.requestAnimationFrame(loop);

                    ++tick;

                    ctx.globalCompositeOperation = 'source-over';
                    ctx.shadowBlur = 0;
                    ctx.fillStyle = 'rgba(2, 85, 139,alp)'.replace('alp', opts.repaintAlpha);
                    ctx.fillRect(0, 0, w, h);
                    ctx.globalCompositeOperation = 'lighter';

                    if (lines.length < opts.count && Math.random() < opts.spawnChance)
                        lines.push(new Line);

                    lines.map(function (line) {
                        line.step();
                    });
                }

                function Line() {

                    this.reset();
                }

                Line.prototype.reset = function () {

                    this.x = 0;
                    this.y = 0;
                    this.addedX = 0;
                    this.addedY = 0;

                    this.rad = 0;

                    this.lightInputMultiplier = opts.baseLightInputMultiplier + opts.addedLightInputMultiplier * Math.random();

                    this.color = opts.color.replace('hue', '323');
                    this.cumulativeTime = 0;

                    this.beginPhase();
                }
                Line.prototype.beginPhase = function () {

                    this.x += this.addedX;
                    this.y += this.addedY;

                    this.time = 0;
                    this.targetTime = (opts.baseTime + opts.addedTime * Math.random()) | 0;

                    this.rad += baseRad * (Math.random() < .5 ? 1 : -1);
                    this.addedX = Math.cos(this.rad);
                    this.addedY = Math.sin(this.rad);

                    if (Math.random() < opts.dieChance || this.x > dieX || this.x < -dieX || this.y > dieY || this.y < -dieY)
                        this.reset();
                }
                Line.prototype.step = function () {

                    ++this.time;
                    ++this.cumulativeTime;

                    if (this.time >= this.targetTime)
                        this.beginPhase();

                    var prop = this.time / this.targetTime,
                        wave = Math.sin(prop * Math.PI / 2),
                        x = this.addedX * wave,
                        y = this.addedY * wave;

                    ctx.shadowBlur = prop * opts.shadowToTimePropMult;
                    ctx.fillStyle = ctx.shadowColor = this.color.replace('light', opts.baseLight + opts.addedLight * Math.sin(this.cumulativeTime * this.lightInputMultiplier));
                    ctx.fillRect(opts.cx + (this.x + x) * opts.len, opts.cy + (this.y + y) * opts.len, 2, 2);

                    if (Math.random() < opts.sparkChance)
                        ctx.fillRect(opts.cx + (this.x + x) * opts.len + Math.random() * opts.sparkDist * (Math.random() < .5 ? 1 : -1) - opts.sparkSize / 2, opts.cy + (this.y + y) * opts.len + Math.random() * opts.sparkDist * (Math.random() < .5 ? 1 : -1) - opts.sparkSize / 2, opts.sparkSize, opts.sparkSize)
                }
                loop();

                window.addEventListener('resize', function () {

                    w = c.width = window.innerWidth;
                    h = c.height = window.innerHeight;
                    ctx.fillStyle = '#02558B';
                    ctx.fillRect(0, 0, w, h);

                    opts.cx = w / 2;
                    opts.cy = h / 2;

                    dieX = w / 2 / opts.len;
                    dieY = h / 2 / opts.len;
                });
            }

            // //for the slider on home
            // if(document.querySelectorAll('.slider').length > 0) {
            //     var slide = 0,
            //         slides = document.querySelectorAll('.slider-card'),
            //         numSlides = slides.length,
            //
            //         currentSlide = function() {
            //             var itemToShow = Math.abs(slide % numSlides);
            //             [].forEach.call(slides, function(el) {
            //                 el.classList.remove('slide-active')
            //             });
            //             slides[itemToShow].classList.add('slide-active');
            //
            //             resetInterval();
            //         },
            //         next = function() {
            //             slide++;
            //             currentSlide();
            //         },
            //         prev = function() {
            //             slide--;
            //             currentSlide();
            //         },
            //
            //         resetslide = function() {
            //             var elm = document.querySelector('#slides > li'),
            //                 newone = elm.cloneNode(true),
            //                 x = elm.parentNode.replaceChild(newone, elm);
            //         },
            //         resetInterval = function() {
            //             clearInterval(autonext);
            //             autonext = setInterval(function() {
            //                 slide++;
            //                 currentSlide();
            //             }, 10000);
            //         },
            //         autonext = setInterval(function() {
            //             next();
            //         }, 10000);
            //
            //
            //     //Buttons
            //     document.querySelector('.next-slide').addEventListener('click', function() {
            //         next();
            //     }, false);
            //     document.querySelector('.prev-slide').addEventListener('click', function() {
            //         prev();
            //     }, false);
            // }

            if(document.querySelectorAll('.blog-slider').length > 0) {
                var swiper = new Swiper('.blog-slider', {
                    spaceBetween: 30,
                    effect: 'fade',
                    loop: true,
                    mousewheel: {
                        invert: false,
                    },
                    // autoHeight: true,
                    pagination: {
                        el: '.blog-slider__pagination',
                        clickable: true,
                    }
                });
            }


        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>

