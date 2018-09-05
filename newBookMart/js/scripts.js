jssor_1_slider_init = function () {

    var jssor_1_options = {
        $AutoPlay: 1,
        $AutoPlaySteps: 5,
        $SlideDuration: 160,
        $SlideWidth: 200,
        $SlideSpacing: 3,
        $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$,
            $Steps: 5
        },
        $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$
        }
    };

    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

    /*#region responsive code begin*/

    var MAX_WIDTH = 980;

    function ScaleSlider() {
        var containerElement = jssor_1_slider.$Elmt.parentNode;
        var containerWidth = containerElement.clientWidth;

        if (containerWidth) {

            var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

            jssor_1_slider.$ScaleWidth(expectedWidth);
        }
        else {
            window.setTimeout(ScaleSlider, 30);
        }
    }

    ScaleSlider();

    $Jssor$.$AddEvent(window, "load", ScaleSlider);
    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    /*#endregion responsive code end*/
};


$(document).ready(function () {
    $('a.open-modal').click(function (event) {
        $(this).modal({
            fadeDuration: 250
        });
        return false;
    });
});
function submitform() {
    document.forms["genreForm"].submit();
}

function placedOrderAlert() {
    alert("Successfully placed order!");
}