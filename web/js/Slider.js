var Bs = Bs || {};

(function(bs, $){
    bs.Slider = function (options)
    {
        var defaultOptions =
                {
                    sliderSelector: "#slide-holder",
                    imagesSelector: "#slide-images",
                    childrenSelector: ".slide-image",
                    controlsSelector: "#slide-controls",
                    imagesUpSelector: "#slide-up",
                    imagesDownSelector: "#slide-down",
                    refreshSelector: "#slide-refresh",
                    imageHeight: 415,
                    duration: 1500
                    
        };
        
        this.options = $.extend(true, {}, defaultOptions, options);
        options = this.options;
        
        var images = options.imagesSelector;
        var imageHeight = options.imageHeight + "px";
        var duration = options.duration;
        var childrenSelector = options.childrenSelector;
        var count = 1;
        var end = true;
        var timerId;
        var length = $(images).children(childrenSelector).length;
        $(images).height(imageHeight);
        $(images).children(childrenSelector).each(function(){
                $(this).height(imageHeight);
            });

        slideBackground = function(direction){
            
            if ((direction === undefined || direction) && count < length && end)
            {
                $(images).animate({"bottom": "+=" + imageHeight}, duration);
                count++;
                
                if(count === length)
                {
                    end = false;
                    $(options.imagesDownSelector).addClass("unClickAble");
                    direction = true;
                }
                else
                    $(options.imagesUpSelector).removeClass("unClickAble");
            }
            else if(!direction && count > 0 && !end)
            {                
                $(images).animate({"bottom": "-=" + imageHeight}, duration);
                count--;
                if(count === 1)
                {
                    end = true;
                    $(options.imagesUpSelector).addClass("unClickAble");
                    direction = false;
                }
                else
                    $(options.imagesDownSelector).removeClass("unClickAble");
            }
        };
        
        this.slide = function(){
            timerId = setInterval(function(){slideBackground();}, 3*duration);
            $(options.sliderSelector)
                .hover(
                    function(){ clearInterval(timerId); $(options.refreshSelector).removeClass("gly-spin"); },
                    function(){ timerId = setInterval(function(){slideBackground();}, 3*duration);
                        $(options.refreshSelector).addClass("gly-spin");
                    });
                
            $(options.imagesDownSelector).click(function()
                {
                    clearInterval(timerId);
                    if(count !== length)
                        end=true;
                    slideBackground(true);
                });
            $(options.imagesUpSelector).click(function()
                {
                    clearInterval(timerId);
                    if(count !== 1)
                        end=false;
                    slideBackground(false);
                });
            
        };
    };
    
    
}(Bs, jQuery));