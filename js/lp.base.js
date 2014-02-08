/*
 * page base action
 */
LP.use(['jquery' , 'api', 'easing'] , function( $ , api ){
    var API_ROOT = "api";
    var submitting = false;
    var isIe6 = $.browser.msie && $.browser.version < 7;

    // live for pic-item hover event
    $(document.body)
        .delegate('.step2Styles li' , 'click' , function(){
            var $list = $('.step2Styles li');
            var index = $.inArray(this, $list);
            $list.removeClass('on');
            $(this).addClass('on');
            $('.step2BtnNext').removeClass('step2BtnNextDisabled');
            $('#val_type').val(index+1);
        })
        .delegate('.keyword' , 'keyup' , function(e){
            if (e.which == 13 || $(this).val().length == 0) {
                e.preventDefault();
                LP.triggerAction('searchFriend');
            }
        })

    var nodeActions = {
        // when current dom is main , and the recent ajax param orderby is 'like' or
        // 'random' , the datetime would not be showed.
        // pageParm.orderby == 'like' || pageParm.orderby == 'random' 此时不显示日历
        prependNode: function( $dom , nodes ){
            var aHtml = [];
            var lastDate = null;
            //var pageParm = $main.data('param'); //TODO:  pageParm.orderby == 'like' || pageParm.orderby == 'random' 此时不显示日历
            nodes = nodes || [];

            // save nodes to cache
            var cache = $dom.data('nodes') || [];
            var lastPid = cache[0].pid;
            var lastNode = getObjectIndex(nodes, 'pid', lastPid);
            var newNodes = nodes.splice(0,lastNode);
            var count = cache.length - newNodes.length;
            cache = cache.splice(0, count);
            for(var i = 0; i < newNodes.length; i++ ) {
                var $items = $dom.find('.photo_item');
                $items.eq($items.length-1).remove();
            }
            $dom.data('nodes' , newNodes.concat( cache ) );
            $.each( newNodes , function( index , node ){
                node.thumb = node.image.replace('.jpg','_thumb.jpg');
                LP.compile( 'node-item-template' ,
                    node ,
                    function( html ){
                        aHtml.push( html );
                        if( index == newNodes.length - 1 ){
                            // render html
                            $dom.prepend(aHtml.join(''));
                            $dom.find('.photo_item:not(.reversal)').css({'opacity':0});
                            //nodeActions.setItemWidth( $dom );
                            nodeActions.setItemReversal( $dom );
                        }
                    });
            } );
        },

        inserNode: function( $dom , nodes ){
            var aHtml = [];
            var lastDate = null;
            //var pageParm = $main.data('param'); //TODO:  pageParm.orderby == 'like' || pageParm.orderby == 'random' 此时不显示日历
            nodes = nodes || [];

            // save nodes to cache
            var cache = $dom.data('nodes') || [];
            $dom.data('nodes' , cache.concat( nodes ) );

            $.each( nodes , function( index , node ){
                node.thumb = node.image.replace('.jpg','_thumb.jpg');
                LP.compile( 'node-item-template' ,
                    node ,
                    function( html ){
                        aHtml.push( html );
                        if( index == nodes.length - 1 ){
                            // render html
                            $dom.append(aHtml.join(''));
                            $dom.find('.photo_item:not(.reversal)').css({'opacity':0});
                            //nodeActions.setItemWidth( $dom );
                            nodeActions.setItemReversal( $dom );
                        }
                    } );

            } );
        },
        // start pic reversal animation
        setItemReversal: function( $dom ){
            // fix all the items , set position: relative
            $dom.children()
                .css('position' , 'relative');
            // get first time item , which is not opend
            // wait for it's items prepared ( load images )
            // run the animate

            // if has time items, it means it needs to reversal from last node-item element
            // which is not be resersaled
            var $nodes = $dom.find('.photo_item:not(.reversal)');

            var startAnimate = function( $node ){
                $node.css({opacity:0}).addClass('reversal').animate({opacity:1}, 1000);
                setTimeout(function(){
                    nodeActions.setItemReversal( $dom );
                } , 100);
            }
            // if esist node , which is not reversaled , do the animation
            if( $nodes.length ){
                startAnimate( $nodes.eq(0) );
            }
        }
    }


    $(window).resize(function(){
        var $symj_popup = $('.symj_popup');
        if($symj_popup.length == 0) return;
        var $img = $('.symj_popup .symj_img img');
        var imgWidth = $img.width();
        var imgHeight = $img.height();
        var winWidth = $(window).width();
        var winHeight = $(window).height();
        var maxHeight = winHeight - 130;
        var maxWidth = winWidth - 50;
        if(imgHeight > maxHeight) {
            imgHeight = maxHeight;
        }
        if(winWidth <= 640)
        {
            imgHeight = imgHeight * 1.5;
            imgWidth = imgWidth * 1.5;
            $img.height(imgHeight).width(imgWidth);
            $symj_popup.css({width:imgWidth});
            var boxHeight = $symj_popup.height()+50;
            $symj_popup.css({'margin-top':-boxHeight/2, 'margin-left':-(imgWidth/2)-20});
        }
        else
        {
            $img.height(imgHeight).width('auto');
            imgWidth = $img.width();
            $symj_popup.css({width:imgWidth});
            var boxHeight = $symj_popup.height()+50;
            $symj_popup.css({'margin-top':-boxHeight/2, 'margin-left':-imgWidth/2});
        }
    });

    $(document).keydown(function( ev ){
        var $popup = $('.symj_popup_wrap');
        if( !$popup.is(':visible') ) return;
        switch( ev.which ){
            case 37: // left
                LP.triggerAction('prev');
                break;
            case 39: // right
                LP.triggerAction('next');
                break;
            case 27: // esc
                LP.triggerAction('close_pop');
                break;
        }
    });

    // ================== page actions ====================
    // get default nodes

    var _currentNodeIndex = 0;
    var $loading = $('.symj_box2_loading');
    LP.action('list', function(){
        pagenum = 15;
        if($('.symj_preview').length == 1) {
            pagenum = 12;
        }
        var pageParam = {page:1,pagenum:pagenum};
        $('#symj_list').data('param',pageParam);
        api.ajax('list', pageParam, function( result ){
            $loading.fadeOut();
            nodeActions.inserNode( $('#symj_list') , result.data );
        });
    });


    LP.action('addnew', function() {
        pagenum = 15;
        var pageParam = {page:1,pagenum:pagenum};
        $('#symj_list').data('param',pageParam);
        api.ajax('list', pageParam, function( result ){
            nodeActions.prependNode( $('#symj_list') , result.data );
        });
    });


    LP.action('node', function(){
        _currentNodeIndex = $(this).prevAll().length;
        var nodes = $('#symj_list').data('nodes');
        var node = nodes[ _currentNodeIndex ];
        LP.compile( 'node-zoom-template' , node , function( html ){

            $('body').append(html);
            var $symj_popup = $('.symj_popup').css('opacity',0);
            var $img = $('.symj_popup .symj_img img');
            $img.ensureLoad(function(){
                $(window).trigger('resize');
                if(isIe6) {
                    var top = $(window).scrollTop() +  $(window).height()/2;
                }
                else {
                    top = '50%';
                }
                $symj_popup.animate({opacity:1,top:top},800,'easeOutQuart');
                $('.symj_popup_loading').fadeOut();
                preLoadImage(nodes);
            });
            //get counts
            api.ajax('getcounts', {id:node.weibo_id}, function( result ){
                if(result.success) {
                    $('.symj_inner_share_link').html(result.data[0].reposts);
                }
            });
        });
    });

    //for next action
    LP.action('next' , function( data ){
        _currentNodeIndex++;
        var nodes = $('#symj_list').data('nodes');
        var node = nodes[ _currentNodeIndex ];
        if( node ){
            $('.symj_popup').animate({left:'150%'},400,'easeInQuart',function(){
                $(this).remove();
                LP.compile( 'node-zoom-template' , node , function( html ){
                    $('.symj_popup_wrap').append($(html).find('.symj_popup'));
                    $('.symj_popup_loading').fadeIn();
                    var $symj_popup = $('.symj_popup').css({'top':'50%', 'left':'-50%', 'opacity':0});
                    var $img = $('.symj_popup .symj_img img');
                    $img.ensureLoad(function(){
                        $(window).trigger('resize');
                        $symj_popup.animate({opacity:1, left:'50%'},300,'easeOutQuart');
                        $('.symj_popup_loading').fadeOut();
                        preLoadImage(nodes);
                    });
                    //get counts
                    api.ajax('getcounts', {id:node.weibo_id}, function( result ){
                        if(result.success) {
                            $('.symj_inner_share_link').html(result.data[0].reposts);
                        }
                    });
                });
            });
        }
    });

    //for prev action
    LP.action('prev' , function( data ){
        _currentNodeIndex--;
        var nodes = $('#symj_list').data('nodes');
        var node = nodes[ _currentNodeIndex ];
        if( node ){
            $('.symj_popup').animate({left:'-50%'},400,'easeInQuart',function(){
                $(this).remove();
                LP.compile( 'node-zoom-template' , node , function( html ){
                    $('.symj_popup_wrap').append($(html).find('.symj_popup'));
                    $('.symj_popup_loading').fadeOut();
                    var $symj_popup = $('.symj_popup').css({'top':'50%', 'left':'150%', 'opacity':0});
                    var $img = $('.symj_popup .symj_img img');
                    $img.ensureLoad(function(){
                        $(window).trigger('resize');
                        $symj_popup.animate({opacity:1, left:'50%'},300,'easeOutQuart');
                        $('.symj_popup_loading').fadeOut();
                        preLoadImage(nodes);
                    });
                    //get counts
                    api.ajax('getcounts', {id:node.weibo_id}, function( result ){
                        if(result.success) {
                            $('.symj_inner_share_link').html(result.data[0].reposts);
                        }
                    });
                });
            });
        }
    });


    LP.action('close_pop', function(){
        $('.symj_popup').animate({top:'-50%'},500,'easeInQuart');
        $('.symj_overlay').fadeOut(500, function(){
            $('.symj_popup_wrap').remove();
        });
    });

    LP.action('load_more', function(){
        $loading.fadeIn();
        var pageParam = $('#symj_list').data('param');
        pageParam.page ++;
        $('#symj_list').data('param',pageParam);
        api.ajax('list', pageParam, function( result ){
            $loading.fadeOut();
            nodeActions.inserNode( $('#symj_list') , result.data );
        });
    });

    LP.action('winner_list', function(){
        api.ajax('winnerList', function( result ){
            var thismonth = result.data.slice(0,1);
            LP.compile( 'winner-thismonth-template' , thismonth[0] , function( html ){
                $('.symj_winner_this_month').append(html);
            });
            var othermonth = {};
            othermonth.winners = result.data.slice(1);
            LP.compile( 'winner-othermonth-template' , othermonth , function( html ){
                $('.symj_winner_list').append(html);
            });
        });
    });

    var preLoadImage = function(nodes){
        for( var i = 0 ; i < 4 ; i++ ){
            if( nodes[ _currentNodeIndex - i ] ){
                $('<img/>').attr('src' , './api' + nodes[ _currentNodeIndex - i ].image);
            }
            if( nodes[ _currentNodeIndex + i ] ){
                $('<img/>').attr('src' , './api' + nodes[ _currentNodeIndex + i ].image);
            }
        }
    }

    var init = function(){
        if($('#symj_list').length) {
            LP.triggerAction('list');
        }

        if($('.symj_winner_banner').length) {
            LP.triggerAction('winner_list');
        }

        if($('.symj_home_banner').length) {
            setInterval(function(){
                LP.triggerAction('addnew');
            },1000 * 60 * 5);

        }
    }

    init();

    var getObjectIndex = function(obj, key, val) {
        var index=-1;
        for(var i=0;i<obj.length;i++) {
            if(obj[i][key]==val){index=i;break;}
        }
        return index;
    }


    jQuery.fn.extend({
        ensureLoad: function(handler) {
            return this.each(function() {
                if(this.complete) {
                    handler.call(this);
                } else {
                    $(this).load(handler);
                }
            });
        }
    });
});