
/*global Modernizr:true */

(function() {
  'use strict';
  (function($) {
    $.fn.extend({
      mgPgnation: function(options) {
        var $curNav, $magicLine, $magicNav, $mainNav, $nextNav, $pgnNav, $prevNav, $prevNavText, $this, calPgnWidth, magicDraw, prevNavWidth, prevText, showPrevNext, updatePrevText;
        $this = $(this);
        if ($this.length) {
          $mainNav = this.children();
          $pgnNav = $this.find('.pgn__item');
          $curNav = $this.find('.current');
          $magicNav = $this.find('a');
          $prevNav = $this.find('.prev');
          $nextNav = $this.find('.next');
          $prevNavText = $prevNav.find('.pgn__prev-txt');

          /* func :: update prev text */
          updatePrevText = function() {
            $prevNavText = $prevNav.find('.pgn__prev-txt');
            return $prevNavText.html('Prev');
          };

          /* func :: calculate width of each page num */
          calPgnWidth = function() {
            var pgnWidth, prevWidth, vsbNav, vsbNavs;
            vsbNav = $this.find('.pgn__item a:visible').length + 1;
            vsbNavs = vsbNav + 2;
            prevWidth = 100 / vsbNavs;
            pgnWidth = 100 - prevWidth * 2;
            $prevNav.css('width', prevWidth + '%');
            $nextNav.css('width', prevWidth + '%');
            $pgnNav.css('width', pgnWidth + '%');
            return $pgnNav.find('a, strong').css('width', 100 / vsbNav + '%');
          };

          /* func :: calculate and display prev/next */
          showPrevNext = function() {
            var prevNavWidth;
            prevNavWidth = $prevNav.innerWidth();
            if (prevNavWidth > 100) {
              $this.addClass('fullprevnext');
              return $prevNavText.html('Previous');
            } else if (prevNavWidth < 101 && prevNavWidth > 60) {
              $this.addClass('fullprevnext');
              return $prevNavText.html('Prev');
            } else {
              return $this.removeClass('fullprevnext');
            }
          };

          /* func :: draw magic line */
          magicDraw = function() {
            $magicLine.width($curNav.width());
            if ($curNav.position() !== void 0) {
              $magicLine.css('left', $curNav.position().left);
            }
            $magicLine.data('origLeft', $magicLine.position().left);
            return $magicLine.data('origWidth', $magicLine.width());
          };
          $mainNav.append('<li class="pgn__magic-line">');
          $magicLine = $this.find('.pgn__magic-line');
          prevNavWidth = $prevNav.innerWidth();
          if (prevNavWidth > 100) {
            prevText = 'Previous';
          } else {
            prevText = 'Prev';
          }
          if (!$prevNav.children().length) {
            $prevNav.addClass('disabled');
            $prevNav.append('<a rel="prev"><i class="pgn__prev-icon icon-angle-left"></i><span class="pgn__prev-txt">' + prevText + '</span></a>');
          }
          if (!$nextNav.children().length) {
            $nextNav.addClass('disabled');
            $nextNav.append('<a rel="next"><i class="pgn__next-icon icon-angle-right"></i><span class="pgn__next-txt">Next</span></a>');
          }
          calPgnWidth();
          showPrevNext();
          magicDraw();
          $magicNav.hover((function() {
            var $el, leftPos, newWidth;
            $el = $(this);
            leftPos = $el.position().left;
            newWidth = $el.width();
            return $magicLine.stop().animate({
              left: leftPos,
              width: newWidth
            });
          }), function() {
            return $magicLine.stop().animate({
              left: $magicLine.data('origLeft'),
              width: $magicLine.data('origWidth')
            });
          });

          /* Window Resize Changes */
          return window.addEventListener('resize', function() {
            updatePrevText();
            calPgnWidth();
            showPrevNext();
            return magicDraw();
          });
        }
      }
    });
    return $('.pgn').mgPgnation();
  })(jQuery);

}).call(this);