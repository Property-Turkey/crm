<!DOCTYPE html>
<html lang="<?= $currlang ?>">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?= $this->fetch('title') ?>
    </title>

    <link rel="shortcut icon" href="<?= $app_folder ?>/webroot/img/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $app_folder ?>/webroot/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $app_folder ?>/webroot/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $app_folder ?>/webroot/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= $app_folder ?>/webroot/img/favicon/site.webmanifest">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <!-- jQuery -->
    <?php echo $this->Html->script('jquery-1.12.3.min.js') ?>

    <!-- Bootstrap -->
    <?php
    // if($currlang == 'ar'){
    //     echo $this->Html->css('bootstrap-rtl.min');
    // }else{
    echo $this->Html->css('bootstrap.min.css');
    // }
    
    ?>
    <!-- Font Awesome -->
    <?php echo $this->Html->css('font-awesome.min') ?>
    <!-- NProgress -->
    <?php //echo $this->Html->css('/gentela/vendors/nprogress/nprogress.css') 
    ?>
    <!-- Animate -->
    <?php //echo $this->Html->css('/gentela/vendors/animate.css/animate.min.css') 
    ?>
    <!-- iCheck -->
    <?php //echo $this->Html->css('/gentela/vendors/iCheck/skins/flat/green.css')
    ?>
    <!-- bootstrap-progressbar -->
    <?php //echo $this->Html->css('/gentela/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')
    ?>
    <!-- PNotify -->
    <?php //echo $this->Html->css('/gentela/vendors/pnotify/dist/pnotify.css') 
    ?>
    <?php //echo $this->Html->css('/gentela/vendors/pnotify/dist/pnotify.buttons.css') 
    ?>
    <?php //echo $this->Html->css('/gentela/vendors/pnotify/dist/pnotify.nonblock.css') 
    ?>
    <!-- JQVMap -->
    <?php //echo $this->Html->css('/gentela/vendors/jqvmap/dist/jqvmap.min.css')
    ?>
    <!-- bootstrap-daterangepicker -->
    <!-- <?php echo $this->Html->css('/gentela/vendors/bootstrap-daterangepicker/daterangepicker.css') ?> -->
    <!-- NG Tags Input-->
    <?php echo $this->Html->css('ng-tags-input') ?>
    <!-- Bootstrap Multiple Select -->
    <?php //echo $this->Html->css('bootstrap-select.min') 
    ?>
    <!-- Range NoUi slider -->
    <?php //echo $this->Html->css('nouislider.min') 
    ?>
    <!-- Custom Theme Style -->
    <!-- <?php echo $this->Html->css('/gentela/build/css/custom.min.css') ?> -->
    <!-- MY Custom Theme Style -->
    <!-- <?php echo $this->Html->css('gentela_style') ?> -->
    <?php echo $this->Html->css('style') ?>
    <?php echo $this->Html->css('fontello') ?>
    <!-- <?php
    if ($currlang == 'ar') {
        echo $this->Html->css('gentela_style-rtl');
    }
    ?> -->

</head>


<body class="nav-md" ng-app="app" ng-controller="ctrl as ctrl">
    <?php if ($authUser) { ?>

        <?= $this->element("header"); ?>

    <?php } ?>

    <?php if (!$authUser) { ?>

        <?= $this->element("headerLog"); ?>

    <?php } ?>

    <!--  -->
    <?= $this->fetch("content"); ?>
    <!--  -->
    <?= $this->element("modals"); ?>

    <div id="imgHolder" class="imgHolder" onClick="this.setAttribute('style', 'opacity:0; visibility:hidden;')"></div>
    <div id="PNote" class="PNote"></div>
    <div id="slideHolder" class="imgHolder slideHolder"></div>


    <!--    JAVASCRIPT      -->
    <!-- Angular -->
    <?php echo $this->Html->script('angular') ?>

    <!-- NG Tags Input-->
    <?php echo $this->Html->script('ng-tags-input.min') ?>
    <!-- Angular Sanitize -->
    <?php echo $this->Html->script('angular-sanitize.min') ?>
    <!-- Angular Animate -->
    <?php echo $this->Html->script('angular-animate.min') ?>
    <!-- Bootstrap -->
    <?php echo $this->Html->script('bootstrap.bundle.min.js') ?>
    <!-- Chart.js -->
    <?php echo $this->Html->script('https://cdn.jsdelivr.net/npm/chart.js'); ?>

    <!-- Template Scripts-->
    <?php
    echo $this->Html->script('main');
    ?>
    <!-- FastClick -->
    <?php //echo $this->Html->script('/gentela/vendors/fastclick/lib/fastclick.js') 
    ?>
    <!-- NProgress -->
    <?php //echo $this->Html->script('/gentela/vendors/nprogress/nprogress.js') 
    ?>
    <!-- Chart.js -->
    <?php //echo $this->Html->script('/gentela/vendors/Chart.js/dist/Chart.min.js') 
    ?>
    <!-- gauge.js -->
    <?php //echo $this->Html->script('/gentela/vendors/gauge.js/dist/gauge.min.js') 
    ?>
    <!-- bootstrap-progressbar -->
    <?php //echo $this->Html->script('/gentela/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') 
    ?>

    <!-- PNotify -->
    <?php //echo $this->Html->script('/gentela/vendors/pnotify/dist/pnotify.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/pnotify/dist/pnotify.buttons.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/pnotify/dist/pnotify.nonblock.js') 
    ?>

    <!-- iCheck -->
    <?php //echo $this->Html->script('/gentela/vendors/iCheck/icheck.min.js') 
    ?>
    <!-- Skycons -->
    <?php //echo $this->Html->script('/gentela/vendors/skycons/skycons.js') 
    ?>
    <!-- Flot -->
    <?php //echo $this->Html->script('/gentela/vendors/Flot/jquery.flot.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/Flot/jquery.flot.pie.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/Flot/jquery.flot.time.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/Flot/jquery.flot.stack.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/Flot/jquery.flot.resize.js') 
    ?>
    <!-- Flot plugins -->
    <?php //echo $this->Html->script('/gentela/vendors/flot.orderbars/js/jquery.flot.orderBars.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/flot-spline/js/jquery.flot.spline.min.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/flot.curvedlines/curvedLines.js') 
    ?>
    <!-- DateJS -->
    <?php //echo $this->Html->script('/gentela/vendors/DateJS/build/date.js') 
    ?>
    <!-- JQVMap -->
    <?php //echo $this->Html->script('/gentela/vendors/jqvmap/dist/jquery.vmap.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/jqvmap/dist/maps/jquery.vmap.world.js') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') 
    ?>
    <!-- bootstrap-daterangepicker -->
    <?php echo $this->Html->script('/gentela/vendors/moment/min/moment.min.js') ?>
    <?php echo $this->Html->script('/gentela/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>
    <!-- CKEditor -->
    <?php //echo $this->Html->script('/gentela/vendors/ckeditor4.13.0/ckeditor') 
    ?>
    <?php //echo $this->Html->script('/gentela/vendors/ckeditor4.13.0/angular-ckeditor') 
    ?>
    <!-- Range NoUi slider -->
    <?php //echo $this->Html->script('nouislider.min') 
    ?>
    <!-- Bootstrap Multiple Select -->
    <?php //echo $this->Html->script('bootstrap-select.min') 
    ?>
    <!-- Custom Theme Scripts -->
    <?php //echo $this->Html->script('/gentela/build/js/custom.min') 
    ?>
    <!-- JQuery Mask Money -->
    <?php //echo $this->Html->script('jquery.maskMoney.min') 
    ?>
    <!-- JQuery Mask Money -->
    <?php //echo $this->Html->script('angularjs-currency-input-mask') 
    ?>



    <?php if (@$isMap == 1) { ?>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=<?= $gmapKey ?>&sensor=false&libraries=places&language=en"></script>
    <?php } ?>
    <!-- Google Maps Directive -->
    <?php //echo $this->Html->script('gm') 
    ?>

    <?php // echo $this->element('Modals/massenger') 
    ?>
    <!-- ANGULARJS APP -->
    <script>
        var ptrn = [];
        ptrn['isEmail'] = /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,7}$/;
        ptrn['isNumber'] = /^[0-9]$/;
        ptrn['isInteger'] = /^[\s\d]$/;
        ptrn['isFloat'] = /^[0-9]?\d+(\.\d+)?$/;
        ptrn['isVersion'] = /^(?:(\d+)\.)?(?:(\d+)\.)?(\*|\d+)$/
        ptrn['isPassword'] = /^[A-Za-z0-9@#$%^&*()!_-]{4,32}$/;
        ptrn['isParagraph'] = /^[^()]{40,255}$/;
        ptrn['isEmpty'] = /^[^()]{3,255}$/; ///^((?!undefined).){3,255}$/;
        ptrn['isSelectEmpty'] = /^[^()]{1,255}$/;
        ptrn['isZipcode'] = /^\+[0-9]{1,4}$/;
        ptrn['isPhone'] = /^[\s\d]{9,15}$/;
        ptrn['setNumber'] = /^[^\d|\-+|\.+]$/;

        var errorMsg = [];
        errorMsg['isEmail'] = '<?= __('is-email-msg') ?>';
        errorMsg['isNumber'] = '<?= __('is-number-msg') ?>';
        errorMsg['isInteger'] = '<?= __('is-integer-msg') ?>';
        errorMsg['isFloat'] = '<?= __('is-flaot-msg') ?>';
        errorMsg['isVersion'] = '<?= __('is-version-msg') ?>';
        errorMsg['isPassword'] = '<?= __('is-password-msg') ?>'; //Only Alphabet, Numbers and symboles @ # $ % ^ & * ( ) ! _ - allowed;
        errorMsg['isParagraph'] = '<?= __('is-paragraph-msg') ?>'; //Paragraph should be between 40 and 255 character;
        errorMsg['isEmpty'] = '<?= __('is-empty-msg') ?>';
        errorMsg['isSelectEmpty'] = '<?= __('is-selected-empty-msg') ?>';
        errorMsg['isPhone'] = '<?= __('is-phone-msg') ?>';
        errorMsg['setNumber'] = '<?= __('is-number-msg') ?>';


        var _getExt = function (fileext) {
            var ext = fileext.split('/')[1];
            switch (ext) {
                case 'jpg':
                case 'jpeg':
                    return 'jpg';
                    break;
                case 'plain':
                    return 'txt';
                    break;
                default:
                    return ext;
            }
        }

        var _setError = function (elm, msg, clr) {

            !msg ? msg = "" : msg;
            !clr ? clr = false : clr;

            var tar = $(elm).parent();
            if (elm.type == "checkbox") {
                tar = $(elm).parent().parent().parent()
            }
            if ($('.error-message', tar).html() == undefined) {
                $(tar).append('<div class="error-message"></div>');
            }
            $('.error-message', tar).text(msg)
        }

        var _getErrors = function (obj, form_name) {
            (form_name[0] == '#' || form_name[0] == '.') ? form_name : form_name = '#' + form_name;
            $(".error-message").text('');
            for (var prop in obj) {
                var value = obj[prop];
                if (typeof obj[prop] !== 'object') {
                    continue;
                }
                var arr = $.map(value, function (val, index) {
                    return [val];
                });
                var elm = $(form_name + ' [name="' + prop + '"]');
                if (Array.isArray(elm)) {
                    _setError($(form_name + ' [name="' + prop + '"]')[0], arr[0])
                } else {
                    _setError($(form_name + ' [name="' + prop + '"]'), arr[0])
                }
            }
        }

        function closePNote() {
            $('#PNote').removeClass('showPNote default redBg greenBg yellowBg blackBg grayBg');
        }

        var showPNoteTm;
        var showPNote = function (_title, _msg, _type, _isSticky, _delay) {
            $('#PNote').html(`
                <div class=""> 
                    <a href  onclick="closePNote();"><i class='fa fa-times close'></i></a>
                    <span>
                        <h3>` + (_title || '<?= __('system_message') ?>') + `</h3> 
                        <i class='fa fa-info-circle'></i> ` + _msg + `
                    </span>
                </div>`);
            setTimeout(() => {
                $('#PNote').addClass('showPNote ' + (_type || 'default'));
            }, 500);
            if (!_isSticky) {
                clearTimeout(showPNoteTm)
                showPNoteTm = setTimeout(() => {
                    $('#PNote').removeClass('showPNote default redBg greenBg yellowBg blackBg grayBg');
                }, _delay || 5000);
            }
        }




        var _setDate = function (dt, p, flag) {
            !dt ? dt = '' : dt;
            !p ? p = [0, 0, 0, 0, 0, 0] : p;

            var now = new Date(dt);
            var year = now.getFullYear();
            var month = now.getMonth() + 1;
            var day = now.getDate();
            var hour = now.getHours();
            var minute = now.getMinutes();
            var second = now.getSeconds();

            year += (p[0] * 1);
            month += (p[1] * 1);
            day += (p[2] * 1);
            hour += (p[3] * 1);
            minute += (p[4] * 1);
            second += (p[5] * 1);

            if (month.toString().length == 1) {
                month = '0' + month;
            }
            if (day.toString().length == 1) {
                day = '0' + day;
            }
            if (hour.toString().length == 1) {
                hour = '0' + hour;
            }
            if (minute.toString().length == 1) {
                minute = '0' + minute;
            }
            if (second.toString().length == 1) {
                second = '0' + second;
            }
            var res = year + '-' + month + '-' + day + ' ' + hour + ':' + minute + ':' + second;
            if (flag == 'onlydate') {
                res = year + '-' + month + '-' + day;
            }
            if (flag == 'onlyMonthYear') {
                res = year + '-' + month;
            }
            return res;
        }


        var _filter = function (val) {
            if (typeof (val) != "string") return val;
            return val
                .replace(/[\"]/g, '\\"')
                .replace(/[\\]/g, '\\\\')
                .replace(/[\/]/g, '\\/')
                .replace(/[\b]/g, '\\b')
                .replace(/[\f]/g, '\\f')
                .replace(/[\n]/g, '\\n')
                .replace(/[\r]/g, '\\r')
                .replace(/[\t]/g, '\\t');
        }

        // var nFormat = function(v, _unit, _round) {
        //     !_unit ? _unit = '' : _unit;
        //     if (!v) {
        //         return 0
        //     };
        //     var res = Math.floor(v).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        //     if (v > 9999) {
        //         res = res.slice(0, -3) + '000';
        //     }
        //     return res + ' ' + _unit;
        // };

        var nFormat = function (v, _unit, _round) {
            !_unit ? _unit = '' : _unit;

            if (!v && v !== 0) {
                return '';
            }

            var stringValue = v.toString();
            var integerPart = Math.floor(v);
            var decimalPart = stringValue.indexOf('.') !== -1 ? stringValue.slice(stringValue.indexOf('.')) : '';

            var formattedIntegerPart = integerPart.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            return _unit + '' + formattedIntegerPart + decimalPart;
        };

        var _setCvrBtn = function (tar, param, icon) {
            if (tar == '#modal_cvr' || tar == '#main_preloader' || tar == '#properties_preloader') {
                if ($(tar).length > 1) {
                    for (var i in $(tar)) {
                        $(tar)[i].css('display', param == 1 ? 'flex' : 'none');
                    }
                } else {
                    $(tar).css('display', param == 1 ? 'flex' : 'none');
                }
            }
            tar[0] == '#' || tar[0] == '.' ? tar : '#' + tar;
            var elm = $(tar + " span");
            if (param == 1) {
                elm.html('<i class="fa fa-refresh fa-spin fa-fw"></i>');
                $(tar.replace("_cvr", "")).css("pointer-events", "none");
                $(tar).attr("disabled", true);
            } else {
                if (icon) {
                    elm.html('<i class="fa fa-' + icon + '"></i>');
                } else {
                    elm.html('');
                }
                $(tar.replace("_cvr", "")).css("pointer-events", "all");
                $(tar).attr("disabled", false);
            }
        }

        var doClickUpdt;
        var doClick = function (tar, delay) {
            tar[0] == '#' || tar[0] == '.' || tar[0] == '[' ? tar : '#' + tar;
            !delay ? delay = 1 : delay;
            clearTimeout(doClickUpdt)
            doClickUpdt = setTimeout(function () {
                return $(tar).click()
            }, delay);
        }

        var playSound = function (url) {
            var audio = new Audio('<?= $path ?>/' + url);
            audio.play();
        }

        var DtSetter = function (tar, val, val2) {
            var defines = {
                'bool': {
                    0: '<?= __('disabled') ?>',
                    1: '<?= __('enabled') ?>'
                },
                'bool2': {
                    0: '<i class="fa fa-times-circle-o redText" title="<?= __('disabled') ?>"></i>',
                    1: '<i class="fa fa-check-circle-o greenText" title="<?= __('enabled') ?>"></i>',
                    2: '<i class="fa fa-bookmark orangeText" title="<?= __('sold') ?>"></i>'
                },
                'bool3': {
                    0: '<?= __('no') ?>',
                    1: '<?= __('yes') ?>'
                },

                'roles': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('roles'))) ?>'),
                'langs': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('langs'))) ?>'),
                'currencies': JSON.parse('<?= json_encode($this->Do->get('currencies')) ?>'),
                'currencies_icons': JSON.parse('<?= json_encode($this->Do->get('currencies_icons')) ?>'),
                'COUNTRIES': JSON.parse('<?= json_encode($this->Do->get('COUNTRIES_CATEGORIES')) ?>'),
                'clientsList': JSON.parse('<?= json_encode(isset($clients) ? $clients : []) ?>'),
                'salesList': JSON.parse('<?= json_encode(isset($sales) ? $sales : []) ?>'),
                'salespecs': JSON.parse('<?= json_encode($this->Do->lcl($this->Do->get('salespecs'))) ?>'),
                'client_priorities': JSON.parse('<?= json_encode($this->Do->get('client_priorities')) ?>'),
                'client_current_stageSale': JSON.parse('<?= json_encode($this->Do->get('client_current_stageSale')) ?>'),
                'rec_stateSale': JSON.parse('<?= json_encode($this->Do->get('rec_stateSale')) ?>'),
                'rec_stateStage': JSON.parse('<?= json_encode($this->Do->get('rec_stateSale')) ?>'),
                'report_priorities': JSON.parse('<?= json_encode($this->Do->get('report_priorities')) ?>'),
                'emphaty_heads': JSON.parse('<?= json_encode($this->Do->get('emphaty_heads')) ?>'),
            }


            // if (tar == 'rec_stateSale') {
            //     // console.log(val2);
            //     if(val && val2){
            //         return defines[val2];
            //     }
            //     return defines[tar][val];
            // }

            if (tar == 'rec_stateSale') {
                if (defines[tar] && defines[tar][val] && defines[tar][val][val2]) {
                    return defines[tar][val][val2];
                } else {
                    return '';
                }
            }


            if (tar == 'client_current_stageSale' || tar == 'client_priorities') {
                // console.log(tar)
                return defines[tar][val];
            }

            if (val == 'list') {
                return defines[tar];
            }

            if (!defines[tar]) {
                return val;
            }

            if (!defines[tar][val]) {
                return val;
            }

            return defines[tar][val];
        }

        var activeUserText = "<?= __('active_user') ?>";
        var inactiveUserText = "<?= __('inactive_user') ?>";


        
        var setZIndex = function () {
            var viewClientModal = $("#viewClient_mdl");
            viewClientModal.css("z-index", 9);
        }
        var getBrowser = function () {
            var browsers = {}
            // Opera 8.0+
            browsers.opera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
            // Firefox 1.0+
            browsers.firefox = typeof InstallTrigger !== 'undefined';
            // Safari 3.0+ "[object HTMLElementConstructor]" 
            browsers.safari = /constructor/i.test(window.HTMLElement) || (function (p) {
                return p.toString() === "[object SafariRemoteNotification]";
            })(!window['safari'] || (typeof safari !== 'undefined' && window['safari'].pushNotification));
            browsers.safari = navigator.userAgent.indexOf('Safari/') > -1 && navigator.userAgent.indexOf('Chrome/') < 0;
            // Internet Explorer 6-11
            browsers.ie = /*@cc_on!@*/ false || !!document.documentMode;
            // Edge 20+
            browsers.edge = !browsers.ie && !!window.StyleMedia;
            // Chrome 1 - 79
            browsers.chrome = !!window.chrome && (!!window.chrome.webstore || !!window.chrome.runtime);
            // Edge (based on chromium) detection
            browsers.edgechromium = browsers.chrome && (navigator.userAgent.indexOf("Edg") != -1);
            // Blink engine detection
            browsers.blink = (browsers.chrome || browsers.opera) && !!window.CSS;
            for (var k in browsers) {
                if (browsers[k]) {
                    return k;
                }
            }
            return 'undefined';
        };



        /////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////
        ////////////////////     ANGULARJS   ////////////////////////
        /////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////
        (function () {

            var __ = this;

            var app = angular.module('app',
                ['ngTagsInput', 'ngAnimate', 'ngSanitize',]
            ); //, 'gm', '' 'ckeditor', 'ngTagsInput', 'cur.$mask'
            app.controller('ctrl', function ($scope, $http, $location, $timeout, $q, $compile, $filter, $interval, $window) {

                // Ekran genişliği 992 piksel ve altındaysa
                if (getBrowser() == 'safari' && window.innerWidth <= 992) {
                    $('.wb-ele-select').addClass('safari_input_padding');

                    // Safari için özel CSS stilini ekleyin
                    var safariCss = {
                        'background-color': 'white',
                        'border': '1px solid #282828',
                        'display': 'flex',
                        'font-weight': '400',
                        'align-items': 'center',
                        'gap': '10px',
                        'border-radius': '9px',
                        'padding': '10px 6px',
                        'font-size': '15px',
                        'width': '161px',
                        'white-space': 'nowrap',
                        'overflow': 'hidden'
                    };

                    $('.safari_input_padding').css(safariCss);
                }



                // this.preSaveConvertTagsArToStringAr = function(){
                //     var tmpAr = this.tags; //data bound var
                //     var nwAr = [];
                //     angular.forEach(tmpAr,function(ob){
                //         nwAr.push(ob.text);
                //     });
                //     console.log("my new value array: ["+nwAr.join(',')+"]");
                // };


                $scope.showMore = false;

                $scope.filesInfo = {
                    project_photos: []
                };
                $scope.files = {
                    "project": []
                };
                $scope.app_folder = '<?= $app_folder ?>';
                $scope.currlang = '<?= $currlang ?>';
                $scope.path = '<?= $path ?>';
                $scope.currlangid = '<?= $currlangid ?>';
                $scope.notifications = {
                    'total': 0
                }
                $scope.selected = {}
                $scope.search = {
                    tar: '<?= $this->request->getQuery('tar') ?>',
                    from: '<?= $this->request->getQuery('from') ?>',
                    to: '<?= $this->request->getQuery('to') ?>',
                    key: '<?= $this->request->getQuery('key') ?>',
                };
                // $scope.addSearchElement = function() {
                //     $scope.searchElements.push({});
                // };

                $scope.param_meetdate = '';
                $timeout(function () {
                    $scope.param_meetdate = "2023-07-13 21:31:29";
                }, 1000)
                $scope.doSubmit = function () {
                    alert($scope.param_meetdate)
                }

                $scope.ckoptions = {
                    language: '<?= $currlang ?>',
                    startupOutlineBlocks: true,
                    forcePasteAsPlainText: true,
                    toolbar: [
                        // [ 'Source', 'ShowBlocks' ],
                        // [ 'BidiLtr', 'BidiRtl' ],
                        ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'],
                        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                        // [ 'Link','Unlink','Anchor' ],
                        // [ 'Format','Styles','Font' ],
                    ]
                }

                var actn = '<?= strtolower($this->request->getParam('action')) ?>';
                var ctrl = '<?= strtolower($this->request->getParam('controller')) ?>';
                $scope.param1 = '<?= empty($this->request->getParam('pass')[0]) ? '' : $this->request->getParam('pass')[0] ?>';

                $scope.clrs = [
                    "#7bb3eb", "#eba556", "#7c81e5", "#87e089", "#7a6f8d", "#ce4472", "#4c7494", "#b085b6", "#6c4c8c", "#eba556", "#7c81e5", "#87e089", "#7bb3eb", "#7a6f8d", "#ce4472", "#4c7494", "#b085b6", "#6c4c8c",
                    "#7bb5eb", "#eba756", "#7c83e5", "#87e389", "#7a8f8d", "#ce4475", "#4c7496", "#b385b6", "#6c8c8c", "#eba856", "#7c85e5", "#87e069", "#5bb3eb", "#7a3f8d", "#ce4475", "#4c7498", "#b085b9", "#6c8c8c",
                    "#7bb7eb", "#eba956", "#7c85e5", "#87e689", "#7a4f8d", "#ce4477", "#4c7498", "#b585b6", "#6c4c5c", "#eba606", "#7c85e1", "#87e049", "#3bb3eb", "#7a0f8d", "#ce4479", "#4c7454", "#b085b3", "#6c6c8c",
                    "#7bb9eb", "#eba626", "#7c87e5", "#87e989", "#7a0f8d", "#ce4479", "#4c7594", "#b885b6", "#6c4c2c", "#eba706", "#7c83e2", "#87e029", "#1bb3eb", "#7a9f8d", "#ce4422", "#4c7594", "#b085b0", "#6c0c8c"
                ]

                $scope.lists = {
                    contents: [],
                }
                var rec_origin = {
                    content: {},
                    category: { category_priority: 99 },
                    client: {},
                    sale: {},
                    permission: {
                        permission_c: 0,
                        permission_r: 0,
                        permission_u: 0,
                        permission_d: 0,
                    },
                    report: {
                        report_type: '',
                        report_text: '',
                        property: ''
                    },
                    action: {
                        // isCalled: false,
                        // isSpoken: false
                    },
                    user: {
                        activate: 1,
                    },
                    log: {

                    },
                    dashboard: {
                    },
                    statistic: {
                    },
                    saleByfield: {

                    }, user_client: {

                    },
                    reservation: {
                        reservation_currency: '',
                        reservation_amount: '',
                        reservation_price: '',
                        reservation_paytype: '',
                        reservation_comission: '',
                        reservation_downpayment: '',
                        reservation_downpayment_date: '',
                        property_id: '',
                        unit_info: '',
                        rec_state: '',
                        downpayment_paid: ''
                    },
                    getClientEmailOrPhoneChanges: {

                    }

                }

                $scope.rec = {
                    category: rec_origin.category,
                    content: rec_origin.content,
                    client: rec_origin.client,
                    permission: rec_origin.content,
                    sale: rec_origin.sale,
                    book: rec_origin.book,
                    report: rec_origin.report,
                    reservation: rec_origin.reservation,
                    action: rec_origin.action,
                    user: rec_origin.user,
                    log: rec_origin.log,
                    dashboard: rec_origin.dashboard,
                    statistic: rec_origin.statistic,
                    user_client: rec_origin.user_client,
                    getClientEmailOrPhoneChanges: rec_origin.getClientEmailOrPhoneChanges
                };

                $scope.activate = function () {
                    return $scope.rec.user.activate;
                }
                $scope.setDate = function (dt, p, flag) {
                    return _setDate(dt, p, flag)
                }

                $scope.setZIndex = function () {
                    return setZIndex()
                };




                $scope.updateCharts = function () {
                    var user_id = $scope.rec.dashboard.user_id;
                    // alert(user_id)
                    var dateFilter = $scope.rec.dashboard.dateFilter;

                    $scope.calculateDateRange(dateFilter);
                    // alert(dateFilter)



                    _doRequest('<?= $app_folder ?>/admin/' + ctrl + '/numbers', {
                        user_id: user_id

                    }, 'post').then(function (res) {
                        var recData = 'numbers';
                        // alert(1)
                        handleResponse(res, recData);
                    });



                    if (($scope.rec.dashboard.firstDate && $scope.rec.dashboard.finishDate) || (dateFilter == 0)) {

                        _doRequest('<?= $app_folder ?>/admin/' + ctrl + '/bar', {

                            firstDate: $scope.rec.dashboard.firstDate,
                            finishDate: $scope.rec.dashboard.finishDate


                        }, 'post').then(function (res) {
                            var recData = 'bar';
                            console.log(res.data)
                            handleResponse(res, recData);
                        });

                        _doRequest('<?= $app_folder ?>/admin/' + ctrl + '/doughnut', {

                            firstDate: $scope.rec.dashboard.firstDate,
                            finishDate: $scope.rec.dashboard.finishDate

                        }, 'post').then(function (res) {
                            var recData = 'doughnut';
                            handleResponse(res, recData);
                        });


                    }


                };




                $http.get('<?= $app_folder ?>/js/countries.json').then(function (response) {
                    $scope.countries = response.data;
                });


                $scope.countryCodeByName = function (categoryName) {

                    if (!$scope.countries) {
                        return 'default';
                    }

                    var lowerCategoryName = categoryName.toLowerCase();

                    for (var i = 0; i < $scope.countries.length; i++) {
                        if ($scope.countries[i].cname.toLowerCase().indexOf(lowerCategoryName) !== -1) {
                            return $scope.countries[i].code;
                        }
                    }
                    return 'default';

                };



                function handleResponse(res, recData) {
                    var doSearchUpdt;

                    $timeout.cancel(doSearchUpdt);
                    _setCvrBtn('#main_preloader', 1);
                    doSearchUpdt = $timeout(function () {
                        _setCvrBtn('#main_preloader', 0);
                        if (res.data.status == "SUCCESS") {
                            $scope.rec[recData] = res.data.data;
                        } else {
                            showPNote('<?= __('Search Message') ?>', '<?= __('No Results Found') ?>', 'redBg');
                        }
                    }, 250);
                }



                $scope.accordionState = {};

                $scope.toggleAccordion = function (id) {
                    $scope.accordionState[id] = !$scope.accordionState[id];
                };



                $scope.calculateDateRange = function (dateFilter) {
                    var currentDate = new Date();
                    switch (dateFilter) {

                        case '1': // Daily
                            $scope.rec.dashboard.firstDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate() - 1);
                            $scope.rec.dashboard.finishDate = currentDate;
                            break;
                        case '2': // Weekly
                            $scope.rec.dashboard.firstDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate() - 7);
                            $scope.rec.dashboard.finishDate = currentDate;
                            break;
                        case '3': // Monthly
                            $scope.rec.dashboard.firstDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, currentDate.getDate());
                            $scope.rec.dashboard.finishDate = currentDate;
                            break;
                        case '4': // Annual
                            $scope.rec.dashboard.firstDate = new Date(currentDate.getFullYear() - 1, currentDate.getMonth(), currentDate.getDate());
                            $scope.rec.dashboard.finishDate = currentDate;
                            break;
                        default:
                            $scope.rec.dashboard.firstDate = null;
                            $scope.rec.dashboard.finishDate = null;
                            break;
                    }
                };


                $scope.updateStateCharts = function () {
                    var stateId = $scope.rec.dashboard.recstate;
                    if (stateId) {
                        $scope.doGet('/admin/clients/numbers?recstate=' + stateId, 'rec', 'numbers');
                    }

                };
                $scope.showAlert = function () {
                    alert('Your custom message goes here');
                };

                $scope.confirmAndReallocation = function (clientId) {
                    var confirmation = confirm('Are you confirm to send request for reallocation?');

                    if (confirmation) {
                        $scope.reallocation(clientId);
                    }
                };

                $scope.reallocation = function (clientId) {

                    $scope.rec.user_client.recState = 2;
                    $scope.rec.user_client.client_id = clientId;
                    $scope.doSave($scope.rec.user_client, 'user_client', 'userclient', '#client_btn', '#userclient_preloader');
                    $scope.doGet('/admin/userclient?client_id=' + clientId, 'rec', 'client');
                };



                var currentDate = new Date();
                var tenDaysAgo = new Date(currentDate);
                tenDaysAgo.setDate(currentDate.getDate() - 10);

                $scope.rec.statistic.starterDate = tenDaysAgo.toISOString().split('T')[0];


                $scope.getClientsByDateRange = function () {

                    var starterDate = $scope.rec.statistic.starterDate;
                    var endDate = $scope.rec.statistic.endDate;

                    if (!starterDate || !endDate) {
                        alert('<?= __("alermsg1") ?>');
                        return;
                    }


                    $scope.doGet('/admin/clients/saleByfield?starterDate=' + starterDate + '&endDate=' + endDate, 'rec', 'saleByfield');
                };

                $scope.actionSave = function (clientId, actionType) {



                    $scope.rec.action.client_id = clientId;
                    $scope.rec.action.action_type = actionType;

                    $scope.doSave($scope.rec.action, 'action', 'actions', '#client_btn', '#actions_preloader');

                };




                $scope.checkDate = function (statCreated) {
                    var currentDate = new Date();
                    var createdDate = new Date(statCreated);


                    var nextDayMidnight = new Date(createdDate);
                    nextDayMidnight.setDate(nextDayMidnight.getDate() + 1);
                    nextDayMidnight.setHours(0, 0, 0, 0);


                    return currentDate < nextDayMidnight;
                };



                var currentDate = new Date();
                var tenDaysAgo = new Date(currentDate);
                tenDaysAgo.setDate(currentDate.getDate() - 10);

                $scope.rec.dashboard.starterDate = tenDaysAgo.toISOString().split('T')[0];


                $scope.getDashClientsByDateRange = function () {

                    var starterDate = $scope.rec.dashboard.starterDate;
                    var endDate = $scope.rec.dashboard.endDate;

                    if (!starterDate || !endDate) {
                        alert('<?= __("alermsg1") ?>')
                        return;
                    }


                    $scope.doGet('/admin/clients/bar?startDate=' + starterDate + '&endDate=' + endDate, 'rec', 'bar');
                    $scope.doGet('/admin/clients/numbers?startDate=' + starterDate + '&endDate=' + endDate, 'rec', 'numbers');
                    $scope.doGet('/admin/clients/doughnut?startDate=' + starterDate + '&endDate=' + endDate, 'rec', 'doughnut');
                };




                $scope.currentTab = 1;


                $scope.changeTab = function (tabNumber) {
                    $scope.currentTab = tabNumber;
                };

                // Toggle Mobile Sidebar
                $scope.toggleSidebar = function () {
                    var sidebar = angular.element(document.querySelector(".sidebar"));
                    sidebar.toggleClass("active");

                    var sidebar_bg = angular.element(document.querySelector(".sidebar-bg"));
                    sidebar_bg.toggleClass("active", sidebar.hasClass("active"));

                };

                $scope.closeSidebar = function () {
                    var sidebar = angular.element(document.querySelector(".sidebar"));
                    sidebar.removeClass("active");

                    var sidebar_bg = angular.element(document.querySelector(".sidebar-bg"));
                    sidebar_bg.removeClass("active");
                };

                angular.element(document).on('click', function (event) {
                    var isButtonClicked = event.target.id === 'sideClose';
                    if (!angular.element(event.target).closest('.sidebar').length && !isButtonClicked) {
                        // If not, close the sidebar
                        // console.log('dsfsdafsdaf');
                        $scope.$apply(function () {
                            $scope.closeSidebar();
                        });
                    }
                });




                //filter sidebar
                $scope.toggleFilter = function () {
                    var filter = angular.element(document.querySelector(".filter"));
                    filter.toggleClass("active");

                    var filter_bg = angular.element(document.querySelector(".filter-bg"));
                    filter_bg.toggleClass("active", filter.hasClass("active"));

                };

                $scope.closeFilter = function () {
                    var filter = angular.element(document.querySelector(".filter"));
                    filter.removeClass("active");

                    var filter_bg = angular.element(document.querySelector(".filter-bg"));
                    filter_bg.removeClass("active");
                };


                angular.element(document).on('click', function (event) {
                    var isButtonClicked = event.target.id === 'filterClose';
                    if (!angular.element(event.target).closest('.filter').length && !isButtonClicked) {
                        // If not, close the sidebar
                        // console.log('dsfsdafsdaf');
                        $scope.$apply(function () {
                            $scope.closeFilter();
                        });
                    }
                });




                $scope.loadTags = function (query, target, parent, roles, user_id) {
                    $timeout.cancel($scope.loadTagsUpdt);
                    !parent ? parent = '' : parent;
                    !roles ? roles = '' : roles;
                    !user_id ? user_id = '' : user_id;
                    return $scope.loadTagsUpdt = $timeout(function () {
                        return $http.get('<?= $app_folder ?>/admin/' + target + '?tags=1&keyword=' + query + '&parent=' + parent + '&roles=' + roles + '&user_id=' + user_id)
                            .then(function (response) {
                                return response.data.data;
                            });
                    }, 500)
                };



                $scope.messageContent = '';

                $scope.sendWhatsAppMessages = function () {
                    var phoneNumbers = [];
                    angular.forEach($scope.rec.client, function (phone) {
                        if (phone.client_mobile) {
                            phoneNumbers.push(phone.client_mobile.replace(/\D/g, ''));
                        }
                    });

                    var message = $scope.messageContent;
                    var url = "https://wa.me/";

                    var index = 0;
                    function openWhatsAppWindow() {
                        if (index < phoneNumbers.length) {
                            var phoneNumber = phoneNumbers[index];
                            var fullURL = url + phoneNumber + "?text=" + encodeURIComponent(message);
                            window.open(fullURL, '_blank');
                            index++;
                            $timeout(openWhatsAppWindow, 2000);
                        }
                    }

                    openWhatsAppWindow();
                };



                $scope.redirectTo = function (userId, actionType, date) {
                    let currentDay = date;


                    if (date == 'today') {
                        const now = new Date();
                        const year = now.getFullYear();
                        const month = String(now.getMonth() + 1).padStart(2, '0');
                        const day = String(now.getDate()).padStart(2, '0');

                        currentDay = `${year}-${month}-${day}`;
                    }



                    window.location.href = '<?= $app_folder ?>/en/admin/clients/index/' + userId + '?action_type=' + actionType + '&date=' + currentDay;
                };

                $scope.testButon = function () {
                    $scope.rec.search.prevId;
                    $scope.doSearch();
                }

                $scope.dashboardRedirectTo = function (recId) {
                    window.location.href = '<?= $app_folder ?>/en/admin/clients/index/' + recId;
                };

                $scope.redirectToUserActions = function (clientUserId) {
                    $scope.doGet('<?= $app_folder ?>/admin/clients/index?userId=' + clientUserId, 'list', 'clients');
                    window.location.href = '<?= $app_folder ?>/en/admin/clients/index?userId=' + clientUserId;
                };

                $scope.confirmAndSave = function (message, saveFunction, saveData) {
                    var confirmation = confirm(message);

                    if (confirmation) {
                        saveFunction(saveData);
                    }
                };

                $scope.doSave = function (data, entityType, entityName) {
                    // Save operation implementation
                    // doSave({ id: itm.id, category_id: itm.category_id }, 'client', 'clients')
                    console.log("Saving data:", data, entityType, entityName);
                    // Your existing save logic here
                };

                $scope.saveFromindexCategory = function (itm) {
                    $scope.confirmAndSave(
                        'Are you sure to save Segment?',
                        $scope.doSave,
                        { id: itm.id, category_id: itm.category_id }
                    );
                };

                $scope.saveFromindexBudget = function (itm) {
                    $scope.confirmAndSave(
                        'Are you sure to save Budget?',
                        $scope.doSave,
                        { id: itm.id, client_budget: itm.client_budget }
                    );
                };

                $scope.saveFromindexStatus = function (itm) {
                    $scope.confirmAndSave(
                        'Are you sure to save Status?',
                        $scope.doSave,
                        { id: itm.id, rec_state: itm.rec_state }
                    );
                };

                $scope.saveFromindexNextcall = function (itm) {
                    $scope.confirmAndSave(
                        'Are you sure to save Next Call?',
                        $scope.doSave({ client_id: itm.id, reminder_nextcall: itm.reminders[itm.reminders.length - 1].reminder_nextcall }, 'reminder', 'reminders')
                    );

                };



                $scope.modalElement = '';

                $scope.updateModalElement = function (elementText) {
                    $scope.modalElement = elementText;
                };

                $scope.calculateccWidth = function (id) {
                    var maxCount = Math.max.apply(null, Object.values($scope.rec.saleByfield.userBookCounts));
                    var widthPercentage = ($scope.rec.saleByfield.userBookCounts[id] / maxCount) * 100;

                    var widthPercentage = ($scope.rec.saleByfield.userBookCounts[id] / maxCount) * 100;
                    return widthPercentage;
                };
                $scope.accordionOpen = '';

                $scope.toggleAccordion = function (section) {
                    if ($scope.accordionOpen === section) {
                        $scope.accordionOpen = '';
                    } else {
                        $scope.accordionOpen = section;
                    }
                };


                $scope.calculatefieldWidth = function (id) {
                    var maxCount = Math.max.apply(null, Object.values($scope.rec.saleByfield.userfieldBookCounts));

                    var widthPercentage = ($scope.rec.saleByfield.userfieldBookCounts[id] / maxCount) * 100;
                    return widthPercentage;
                };

                $scope.isPasswordInputDisabled = true;

                // Function to toggle the input state
                $scope.togglePasswordInput = function () {
                    $scope.isPasswordInputDisabled = !$scope.isPasswordInputDisabled;
                };
                $scope.deletePasswordInput = function () {
                    $scope.rec.user.password = "";
                    $scope.isPasswordInputDisabled = !$scope.isPasswordInputDisabled;
                };



                $scope.fillReportForm = function (clsale) {
                    $scope.rec.report = angular.copy(clsale);
                };



                $scope.fillReserveForm = function (deals) {
                    $scope.rec.reservation = angular.copy(deals);
                };

                // This function creates or removes Elements based on stat, element, and tar
                $scope.inlineElement = function (tar, stat, element) {

                    $(".inlineElement").parent().html("");
                    if (stat === 1) {
                        let elementsCreated = "";
                        if (element === "empathy") {
                            elementsCreated = $compile(`
                            <form class="row inlineElement" 
                                ng-submit="
                                rec.report.tar_id = rec.client.id;
                                doSave(rec.report, 'report', 'reports', '#client_btn', '#empathy_preloader');">
                                
                                <?php foreach ($this->Do->cat(61) as $k => $itm) { ?>
                                                            <label for="" class="mr-2 col-md-6 col-12 col-lg-3">


                                                                <div class="d-flex">
                                                                    <span class="sm-txt"><?= __($itm) ?></span>
                                                                    <div class="sm-txt hover-text p-1 pt-0">?
                                                                        <span class="tooltip-text" id="right"></span>
                                                                    </div>
                                                                </div>

                                                                <?= $this->Form->control($itm, [
                                                                    'class' => 'wb-ele-select-modal ',
                                                                    'label' => false,
                                                                    'type' => 'textarea',
                                                                    'ng-model' => 'rec.report.empathy[' . $k . '].report_text',
                                                                    'cols' => '30',
                                                                    'rows' => '3',
                                                                    'placeholder' => __($itm),
                                                                ]) ?>

                                        
                                                            </label>
                                <?php } ?>
                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10">
                                        <button class="btn btn-danger" id="empathy_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>
                            </form>
                    `)($scope);
                        } else if (element === "contact-setting") {
                            elementsCreated = $compile(`
                            
                            <form class="row  inlineElement"  id="client_form" ng-submit="
                            doSave(rec.client, 'client', 'clients', '#client_btn', '#sales_preloader');">

                                    <label class="col-md-6 col-12 col-lg-3" style="position: relative;">
                                        <span class="sm-txt"> <?= __('adrs_country') ?> </span>

                                        <tags-input style="padding: 0px;padding-left: 10px;"
                                            class="wb-txt-inp" 
                                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                            ng-model="rec.client.adrscountry" 
                                            add-from-autocomplete-only="true" 
                                            
                                            max-tags="1" 
                                            placeholder="<?= __('adrs_country') ?>" 
                                            display-property="text"
                                            key-property="value"
                                            ng-disabled="rec.client.adrscountry "
                                            ng-style="{'background-color': rec.client.adrscountry ? '#eeeeee' : 'initial'}">
                                            <auto-complete source="loadTags($query, 'pmscategories', 7)"
                                                min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30"
                                            ></auto-complete>
                                            
                                        </tags-input>


                                        <span ng-if="rec.client.adrscountry" ng-click="rec.client.adrscountry = '';" class="fa fa-times" style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>                                        

                                    </label> 

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_name') ?> </span>
                                        <?= $this->Form->text('client_name', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'text',
                                            'ng-model' => 'rec.client.client_name',
                                            'placeholder' => __('client_name'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_mobile') ?> </span>
                                        <?= $this->Form->text('client_mobile', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'tel',
                                            'ng-model' => 'rec.client.client_mobile',
                                            'placeholder' => __('client_mobile'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_phone') ?> </span>
                                        <?= $this->Form->text('client_phone', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'tel',
                                            'ng-model' => 'rec.client.client_phone',
                                            'placeholder' => __('client_phone'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_email') ?> </span>
                                        <?= $this->Form->text('client_email ', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'email',
                                            'ng-model' => 'rec.client.client_email',
                                            'placeholder' => __('client_email'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_address') ?> </span>
                                        <?= $this->Form->text('client_address ', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'text',
                                            'ng-model' => 'rec.client.client_address',
                                            'placeholder' => __('client_address'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_nationality') ?> </span>
                                        <?= $this->Form->text('client_nationality', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'text',
                                            'ng-model' => 'rec.client.client_nationality',
                                            'placeholder' => __('client_nationality'),
                                        ]) ?>
                                    </label>

                                    <label  class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"><?= __('pool_id') ?></span>
                                        <?= $this->Form->text('pool_id', [
                                            'type' => 'select',
                                            'options' => $this->Do->cat(28),
                                            'class' => 'wb-ele-select-modal col-12',
                                            'ng-model' => 'rec.client.pool_id'
                                        ]) ?>
                                    </label>

                                    <label  class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"><?= __('source_id') ?></span>
                                        <?= $this->Form->text('source_id', [
                                            'type' => 'select',
                                            'options' => $this->Do->cat(33),
                                            'class' => 'wb-ele-select-modal col-12',
                                            'ng-model' => 'rec.client.source_id'
                                        ]) ?>
                                    </label>

                                    

                                    

                                    <div class="down-btns mt-4 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button type="submit" class="btn btn-danger" id="sales_preloader"> <?= __('save_changes') ?> 
                                            </button>
                                        </div>
                                    </div>


                                </form>


                    `)($scope);
                        } else if (element === "edit-user") {
                            elementsCreated = $compile(`
                            
                            <form class="row  inlineElement"  id="user_form" ng-submit="
                            doSave(rec.user, 'user', 'users', '#user_btn', '#user_preloader');">

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('user') ?> </span>
                                        <?= $this->Form->text('user', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'text',
                                            'ng-model' => 'rec.user.user_fullname',
                                            'placeholder' => __('user_fullname'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('email') ?> </span>
                                        <?= $this->Form->text('email ', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'email',
                                            'ng-model' => 'rec.user.email',
                                            'placeholder' => __('email'),
                                        ]) ?>
                                    </label>
                                    
                                    <label class="col-md-6 col-12 col-lg-3" style="position: relative;">
                                        <span class="sm-txt"> <?= __('password') ?> </span>

                                        <div ng-click="togglePasswordInput()"  style="display: flex;justify-content: center;">
                                            <span ng-show="isPasswordInputDisabled" style="cursor: pointer; position: absolute; top: 60%; z-index: 1; transform: translateY(-50%);"class="fa fa-key"> Change Password&nbsp;&nbsp;</span>
                                        </div>
                                        <div ng-click="deletePasswordInput()"  >
                                            <span ng-show="!isPasswordInputDisabled" style="cursor: pointer; position: absolute; top: 60%;right: 20px; z-index: 1; transform: translateY(-50%);"class="fa fa-times"></span>
                                        </div>

                                        <?= $this->Form->text('password ', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'password',
                                            'ng-model' => 'rec.user.password',
                                            'ng-disabled' => 'isPasswordInputDisabled',
                                            'ng-style' => "{'background-color': isPasswordInputDisabled ? '#eeeeee' : 'initial'}",
                                        ]) ?>

                                    </label>


                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('mobile') ?> </span>
                                        <?= $this->Form->text('mobile', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'tel',
                                            'ng-model' => 'rec.user.user_configs.mobile',
                                            'placeholder' => __('mobile'),
                                        ]) ?>
                                    </label>

                                    <label  class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"><?= __('user_role') ?></span>
                                        <?= $this->Form->text('user_role', [
                                            'type' => 'select',
                                            'options' => $this->Do->lcl($this->Do->get('roles'), false, false),
                                            'class' => 'wb-ele-select-modal col-12',
                                            'ng-model' => 'rec.user.user_role'
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('adrs') ?> </span>
                                        <?= $this->Form->text('adrs', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'tel',
                                            'ng-model' => 'rec.user.user_configs.address',
                                            'placeholder' => __('adrs'),
                                        ]) ?>
                                    </label>

                                    

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('rec_state') ?> </span>
                                        <select ng-model="rec.user.rec_state" class="wb-ele-select w-100" >
                                            <!-- Enable seçeneği -->
                                            <option value="1" ng-selected="rec.user.rec_state == 1">Enable</option>
                                            <!-- Disable seçeneği -->
                                            <option value="0" ng-selected="rec.user.rec_state == 0">Disable</option>
                                        </select>
                                    </label>

                                    


                                    <div class="down-btns mt-4 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                        <button class="btn btn-gray" type="submit" ng-click="rec.user.activate = 1;"><?= __('send_activation') ?></button>
                                            <button type="submit" class="btn btn-danger" id="user_preloader"> <?= __('save_changes') ?> 
                                            </button>

                                        </div>
                                    </div>


                                </form>


                    `)($scope);
                        } else if (element === "add-user") {
                            elementsCreated = $compile(`
                            
                            <form class="row  inlineElement"  id="user_form" ng-submit="
                            doSave(rec.user, 'user', 'users', '#user_btn', '#user_preloader');">

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('user') ?> </span>
                                        <?= $this->Form->text('user', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'text',
                                            'ng-model' => 'rec.user.user_fullname',
                                            'placeholder' => __('user_fullname'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('password') ?> </span>
                                        <?= $this->Form->text('user', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'password',
                                            'ng-model' => 'rec.user.password',
                                            'placeholder' => __('password'),
                                        ]) ?>
                                    </label>

                                    <label  class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"><?= __('user_role') ?></span>
                                        <?= $this->Form->text('user_role', [
                                            'type' => 'select',
                                            'options' => $this->Do->lcl($this->Do->get('roles')),
                                            'class' => 'wb-ele-select-modal col-12',
                                            'ng-model' => 'rec.user.user_role'
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('mobile') ?> </span>
                                        <?= $this->Form->text('mobile', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'tel',
                                            'ng-model' => 'rec.user.user_configs.mobile',
                                            'placeholder' => __('mobile'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('adrs') ?> </span>
                                        <?= $this->Form->text('adrs', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'tel',
                                            'ng-model' => 'rec.user.user_configs.address',
                                            'placeholder' => __('adrs'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('email') ?> </span>
                                        <?= $this->Form->text('email ', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'email',
                                            'ng-model' => 'rec.user.email',
                                            'placeholder' => __('email'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('rec_state') ?> </span>
                                        <select ng-model="rec.user.rec_state" class="wb-ele-select">
                                            <!-- Enable seçeneği -->
                                            <option value="1" ng-selected="rec.user.rec_state == 1">Enable</option>
                                            <!-- Disable seçeneği -->
                                            <option value="0" ng-selected="rec.user.rec_state == 0">Disable</option>
                                        </select>
                                    </label>

                                    <div class="down-btns mt-4 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button type="submit" class="btn btn-danger" id="user_preloader"> <?= __('save_changes') ?> 
                                            </button>
                                        </div>
                                    </div>


                                </form>


                    `)($scope);
                        } else if (element === "edit-permission") {
                            elementsCreated = $compile(`
                            
                            <form class="row inlineElement" ng-submit="
                                doSave(rec.permission, 'permission', 'permissions', '#permission_btn', 
                                '#permission_preloader');">
                                
                                
                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('permission_role') ?></span>
                                    <?= $this->Form->text('permission_role', [
                                        'class' => 'wb-ele',
                                        'label' => false,
                                        'type' => 'text',
                                        'ng-model' => 'rec.permission.permission_role',
                                        'placeholder' => __('permission_role'),
                                    ]) ?>                                    
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('permission_module') ?></span>
                                    <?= $this->Form->text('permission_module', [
                                        'class' => 'wb-ele',
                                        'label' => false,
                                        'type' => 'text',
                                        'ng-model' => 'rec.permission.permission_module',
                                        'placeholder' => __('permission_module'),
                                    ]) ?>                                    
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('permission_c') ?></span>
                                    <?= $this->Form->text('permission_c', [
                                        'class' => 'wb-ele',
                                        'label' => false,
                                        'type' => 'text',
                                        'ng-model' => 'rec.permission.permission_c',
                                        'placeholder' => __('permission_c'),
                                    ]) ?>                                    
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('permission_r') ?></span>
                                    <?= $this->Form->text('permission_r', [
                                        'class' => 'wb-ele',
                                        'label' => false,
                                        'type' => 'text',
                                        'ng-model' => 'rec.permission.permission_r',
                                        'placeholder' => __('permission_r'),
                                    ]) ?>                                    
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('permission_u') ?></span>
                                    <?= $this->Form->text('permission_u', [
                                        'class' => 'wb-ele',
                                        'label' => false,
                                        'type' => 'text',
                                        'ng-model' => 'rec.permission.permission_u',
                                        'placeholder' => __('permission_u'),
                                    ]) ?>                                    
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('permission_d') ?></span>
                                    <?= $this->Form->text('permission_d', [
                                        'class' => 'wb-ele',
                                        'label' => false,
                                        'type' => 'text',
                                        'ng-model' => 'rec.permission.permission_d',
                                        'placeholder' => __('permission_d'),
                                    ]) ?>                                    
                                </label>


                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10 ">
                                        <button class="btn btn-danger" id="permission_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>

                        
                            </form>



                        `)($scope);
                        } else if (element === "view-phones") {
                            elementsCreated = $compile(`
                                
                                <form class="row inlineElement">
                                    
                                    
                                    <div class="accordion accordion-flush" id="client1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#client1-collapseOne" aria-expanded="true"
                                                    aria-controls="client1-collapseOne">
                                                    <span class="title">Phone List</span>
                                                </button>
                                            </h2>
                                            <div id="client1-collapseOne" class="accordion-collapse collapse show">
                                                <div class="accordion-body">

                                                    <div class="heading">
                                                        <div class="title"></div>
                                                        <div class="flex-center flex-gap-5">
                                                            <button class="btn btn-primary" data-bs-toggle="collapse"
                                                                data-bs-target="#messageSection">Mesaj Gönder</button>
                                                        </div>
                                                    </div>

                                                    <div id="messageSection" class="collapse">
                                                        <div class="white-box">
                                                            <div class="row">
                                                                <div class="col-md-12 col-12">
                                                                    <span class="sm-txt">Mesajınızı Girin:</span>
                                                                    <textarea class="form-control" ng-model="messageContent"
                                                                        rows="4"></textarea>
                                                                    <button class="btn btn-success mt-2"
                                                                        ng-click="sendWhatsAppMessages()">Gönder</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="white-box">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <span class="sm-txt">
                                                                    <?= __('client_name') ?>
                                                                </span>
                                                                <div class="wb-ele-empahty" ng-if="phone.client_mobile"
                                                                    ng-repeat="phone in rec.client">{{phone.client_mobile}}</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                            
                                </form>



                        `)($scope);
                        } else if (element === "assign") {
                            elementsCreated = $compile(`
                            <form class="row inlineElement" 
                            ng-submit="
                                rec.user_client.client_id = rec.client.id;
                                doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#userclient_preloader');
                                closeModal('#subModal');">
                                
                                
                          


                                <label for="" class="col-6 col-sm-12">
                                    <span class="sm-txt"> Advisor </span>
                                    <tags-input  style="padding: 0px;padding-left: 10px;"
                                        ng-model="rec.user_client.user" 
                                        add-from-autocomplete-only="true" 
                                        placeholder="<?= __('user') ?>" 
                                        display-property="text"
                                        key-property="value"
                                        class="wb-txt-inp"
                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                    >
                                        <auto-complete min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30"  source="loadTags($query, 'users', '', 'admin.callcenter,field')"></auto-complete>
                                    </tags-input>
                                </label>

                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10 ">
                                        <button class="btn btn-danger" id="userclient_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>
                            </form>
                    `)($scope);
                        } else if (element === "assign") {
                            elementsCreated = $compile(`
                            <form class="row inlineElement" 
                            ng-submit="
                                rec.user_client.client_id = rec.client.id;
                                doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#userclient_preloader');
                                closeModal('#subModal');">
                                
                                
                          


                                <label for="" class="col-6 col-sm-12">
                                    <span class="sm-txt"> Advisor </span>
                                    <tags-input  style="padding: 0px;padding-left: 10px;"
                                        ng-model="rec.user_client.user" 
                                        add-from-autocomplete-only="true" 
                                        placeholder="<?= __('user') ?>" 
                                        display-property="text"
                                        key-property="value"
                                        class="wb-txt-inp"
                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                    >
                                        <auto-complete min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30"  source="loadTags($query, 'users', '', 'admin.callcenter,field')"></auto-complete>
                                    </tags-input>
                                </label>

                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10 ">
                                        <button class="btn btn-danger" id="userclient_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>
                            </form>
                    `)($scope);
                        
                        } else if (element === "reallocate") {
                            elementsCreated = $compile(`
                             <div class="noData mt-3" ng-if="rec.client.user_client == ''">
                                <?= __('no_data') ?>
                            </div>
                            <div class="row" ng-repeat="(recStateId, recStateName) in rec.client.user_client track by (recStateName.id + recStateName.user.user_fullname)">
                                
                                <div class="noData mt-3" ng-if=" recStateName.rec_state != 2">
                                    <?= __('no_request') ?> for {{recStateName.user.user_fullname}}
                                </div>

                           
                            
                                <div class="heading mb-2" ng-if="recStateName.rec_state == 2">
                                    <div class="title" style="color: #7d7d7d;">{{recStateName.user.user_fullname}}</div>     
                                </div>

                                <div class="row"  ng-if="recStateName.rec_state == 2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="col-6 mb-2">
                                                    <div class="btn btn-gray mt-1" type="button" ng-click="
                                                        rec.user_client.accept = 2;
                                                        rec.user_client.client_id = recStateName.client_id;
                                                        rec.user_client.user_id = recStateName.user.id;

                                                        doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#deneme');
                                                        doGet('/admin/userclient?client_id=' + itm.id, 'rec', 'client');">
                                                        <?= __('accept') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="col-6 mb-2">
                                                    <div class="btn btn-gray mt-1" type="button" ng-click="
                                                            rec.user_client.reject = 2;
                                                            rec.user_client.client_id = recStateName.client_id;
                                                            rec.user_client.user_id = recStateName.user.id;

                                                            doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#deneme');
                                                            doGet('/admin/userclient?client_id=' + itm.id, 'rec', 'client');">
                                                        <?= __('reject') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                    
                                <form class="row col-6 inlineElement" ng-if="recStateName.rec_state == 2"
                                    ng-submit="
                                    rec.user_client.client_id = recStateName.client_id;
                                    rec.user_client.reallocate = 2;
                                    rec.user_client.userclient_id = recStateName.id;

                                    doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#userclient_preloader');">

                                    <label for="" class="col-6 col-sm-12">
                                        <span class="sm-txt">
                                            <?= __('client_current_stage') ?>
                                        </span>
                                        <tags-input style="padding: 0px;padding-left: 10px;" ng-model="rec.user_client.user"
                                            add-from-autocomplete-only="true"
                                            placeholder="Select <?= __('client_current_stage') ?>"
                                            display-property="text" key-property="value" class="wb-txt-inp"
                                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                            <auto-complete min-length="0" load-on-focus="true" load-on-empty="true"
                                                max-results-to-show="30" source="loadTags($query, 'users', '', 'admin.callcenter')">
                                            </auto-complete>
                                        </tags-input>
                                    </label>

                                    <div class="down-btns mt-1 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button class="btn btn-danger" id="userclient_preloader" type="submit">
                                                <?= __('change_advisor') ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <form class="row col-6 inlineElement" ng-if="recStateName.rec_state == 2" id="client_form"
                                    ng-submit="
                                    rec.client.client_id = recStateName.client_id;
                                    rec.client.user_id = recStateName.user_id;
                                    doSave(rec.client, 'client', 'clients', '#client_btn', '#userpool_preloader');">

                                    <label class="col-md-6 col-12 col-lg-12">
                                        <span class="sm-txt">
                                            <?= __('pool_name') ?>
                                        </span>
                                        <tags-input placeholder="Add This Client to Pool"
                                            style="padding: 0px;padding-left: 10px;" ng-model="rec.client.pool"
                                            class="wb-txt-inp"
                                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                            <auto-complete min-length="0" load-on-focus="true" load-on-empty="true"
                                                max-results-to-show="30" source="loadTags($query, 'categories', 28)">
                                            </auto-complete>
                                        </tags-input>
                                    </label>

                                    <div class="down-btns mt-1 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button type="submit" class="btn btn-danger" id="userpool_preloader">
                                                <?= __('change_pool') ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                    `)($scope);
                        } else if (element === "notes") {
                            elementsCreated = $compile(`
                            <form class="row inlineElement" ng-submit="
                                rec.report.tar_id = rec.client.id; 
                                rec.report.tar_tbl = 'Clients'; 
                                doSave(rec.report, 'report', 'reports', '#client_btn', '#report_preloader');">
                                <div class="row">

                                    
                                    <label  class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"><?= __('report_type') ?></span>
                                        <?= $this->Form->text('report_type', [
                                            'type' => 'select',
                                            'options' => $this->Do->cat(53),
                                            'class' => 'wb-ele-select-modal col-12',
                                            'ng-model' => 'rec.report.report_type'
                                        ]) ?>
                                    </label>
                                    <label class="col-md-6 col-12 col-lg-3" style="position: relative;">
                                        <span class="sm-txt"> <?= __('property_id') ?> </span>
                                        <tags-input  style="padding: 0px;padding-left: 10px;"
                                            class="wb-txt-inp" 
                                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                            ng-model="rec.report.property" 
                                            add-from-autocomplete-only="true" 
                                            max-tags="1" 
                                            placeholder="<?= __('property_id') ?>" 
                                            display-property="text"
                                            key-property="value"
                                            ng-disabled="rec.report.property "
                                            ng-style="{'background-color': rec.report.property ? '#eeeeee' : 'initial'}"

                                        >
                                            <auto-complete min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30" source="loadTags($query, 'pmsproperties', '0')"></auto-complete>
                                        </tags-input>

                                        <span ng-if="rec.report.property_id" ng-click="rec.report.property = ''; rec.report.property_id = '';" class="fa fa-times" style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>                                        

                                    </label>

                                    <label for="" class=" col-12">
                                        <span class="sm-txt"> Note </span>
                                        <textarea
                                            ng-model="rec.report.report_text"
                                            class="wb-txt-inp"
                                            name=""
                                            id=""
                                            cols="30"
                                            rows="3"
                                            placeholder="The Note"
                                        ></textarea>
                                    </label>
                                </div>

                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10">
                                        <button class="btn btn-danger" id="report_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>
                            </form>

                            

                    `)($scope);
                        } else if (element === "allNotes") {
                            elementsCreated = $compile(`
                            
                                <div class="heading">
                                    <div class="title">Notes</div>
                                    
                                </div>

                                <div class="noData" ng-if="rec.client.reports == ''  ">

                                    <?= __('no_data') ?>

                                </div>
                                <div ng-repeat="clsale in rec.client.reports track by $index">
                                    <div class="note"
                                        ng-if="!(clsale.report_type == '201' || clsale.report_type == '202' || clsale.report_type == '203' || clsale.report_type == '204' || itm.report_type == '75' || itm.report_type == '76' )">

                                        <div class="box-heading d-flex">
                                            <div class="col-lg-2 text-nowrap">
                                                <i class="fas-sticky-note"></i> {{ clsale.type_category.category_name }}
                                                {{DtSetter('rec_stateSale', clsale.client_current_stage,
                                                clsale.report_type)}}
                                                <b>{{ rec.clsale.user.user_fullname }}</b>

                                            </div>


                                            <div class="col-lg-8 text truncate">
                                                <p>
                                                    {{ clsale.report_text }}
                                                </p>
                                            </div>


                                            <div class="flex-center flex-gap-10">
                                                <b> {{ clsale.stat_created.split(' ')[1] }} </b>
                                                <?php if (!in_array($authUser['user_role'], ['field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                                    <div class="dropdown">
                                                        <button class="btn" type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="fas-ellipsis"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li id="delete_preloader">
                                                                <a class="dropdown-item delete-btn"
                                                                    ng-click="doDelete('/admin/reports/delete/' + clsale.id);
                                                                    doSave(rec.report, 'report', 'reports', '#client_btn', '#report_preloader');"
                                                                    href="#">Delete</a>
                                                            </li>
                                                            <li id="delete_preloader">
                                                                <a class="dropdown-item delete-btn" ng-click="
                                                                    updateModalElement('Notes');
                                                                    openModal('#subModal'); 
                                                                    doGet('/admin/reports?id=' + clsale.id, 'rec', 'report');
                                                                    inlineElement('#elementsContainer', 1, 'notes');"
                                                                    href="#">
                                                                    <?= __('edit') ?>
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                    `)($scope);
                        } else if (element === "notesindex") {
                            elementsCreated = $compile(`
                            <form class="row inlineElement" ng-submit="
                                rec.report.tar_id = itm.id; 
                                rec.report.tar_tbl = 'Clients'; 
                                doSave(rec.report, 'report', 'reports', '#client_btn', '#report_preloader');">
                                <div class="row">

                                    
                                    <label  class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"><?= __('report_type') ?></span>
                                        <?= $this->Form->text('report_type', [
                                            'type' => 'select',
                                            'options' => $this->Do->cat(53),
                                            'class' => 'wb-ele-select-modal col-12',
                                            'ng-model' => 'rec.report.report_type'
                                        ]) ?>
                                    </label>

                                    <label for="" class=" col-12">
                                        <span class="sm-txt"> Note </span>
                                        <textarea
                                            ng-model="rec.report.report_text"
                                            class="wb-txt-inp"
                                            name=""
                                            id=""
                                            cols="30"
                                            rows="3"
                                            placeholder="The Note"
                                        ></textarea>
                                    </label>
                                </div>

                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10">
                                        <button class="btn btn-danger" id="report_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>
                            </form>

                            <div class="accordion mt-5" id="accordionNotes">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <?= __('view_allNotes') ?>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                                        <div class="grid lead-preview">
                                            <div class="heading">
                                                <div class="title"></div>
                                                <!-- <div class="flex-gap-10">
                                                    <?php if (!in_array($authUser['user_role'], ['field', 'accountant', 'aftersale']) || isset($authUser['user_original_role'])) { ?>
                                                        <button class="btn btn-modal" ng-click="
                                                        newEntity('report');
                                                        setZIndex();
                                                        updateModalElement('Notes');
                                                        openModal('#subModal');
                                                        inlineElement('#elementsContainer', 1, 'notes');">
                                                            <i class="fas-plus"></i>
                                                            <?= __('add_notes') ?>
                                                        </button>
                                                    <?php } ?>

                                                </div> -->
                                            </div>

                                            <div class="noData" ng-if="rec.client.reports == ''  ">

                                                <?= __('no_data') ?>

                                            </div>
                                            <div ng-repeat="clsale in rec.client.reports track by $index">
                                                <div class="note"
                                                    ng-if="!(clsale.report_type == '201' || clsale.report_type == '202' || clsale.report_type == '203' || clsale.report_type == '204' || itm.report_type == '75' || itm.report_type == '76' )">

                                                    <div class="box-heading d-flex">
                                                        <div class="col-lg-2 text-nowrap">
                                                            <i class="fas-sticky-note"></i> {{
                                                            clsale.type_category.category_name }}
                                                            {{DtSetter('rec_stateSale', clsale.client_current_stage,
                                                            clsale.report_type)}}
                                                            <b>{{ rec.clsale.user.user_fullname }}</b>
                                                        </div>


                                                        <div class="col-lg-8 text p-2">
                                                            <p>
                                                                {{ clsale.report_text }}
                                                            </p>
                                                        </div>


                                                        <div class="flex-center flex-gap-10">
                                                            <b> {{ clsale.stat_created.split(' ')[1] }} </b>



                                                        </div>
                                                    </div>
                                                    <!-- <span class="spoken"></span>
                                                    <div class="text">
                                                        <p>{{ itm.report_text }}</p>
                                                    </div> -->
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `)($scope);
                        } else if (element === "showNotes") {
                            elementsCreated = $compile(`
                            <form class="row inlineElement">
                                <div class="row">
                                    
                                    

                                    <label for="" class=" col-12">
                                        <span class="sm-txt"> Note </span>
                                        <textarea
                                            ng-model="rec.report.report_text"
                                            class="wb-txt-inp"
                                            ng-disabled="true"
                                            name=""
                                            id=""
                                            cols="30"
                                            rows="3"
                                            placeholder="The Note"
                                        ></textarea>
                                    </label>
                                </div>

                            </form>
                    `)($scope);
                        } else if (element === "booking") {
                            elementsCreated = $compile(`

                            <form class="row inlineElement" 
                                ng-submit="
                                    rec.book.client_id = rec.client.id;
                                    doSave(rec.book, 'book', 'books', '#client_btn', '#book_preloader');">

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('meet_place') ?></span>
                                    <input type="text" ng-model="rec.book.book_meetplace" class="wb-txt-inp" id="" />
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('meet_period') ?> <small> (Day)</small></span>
                                    <input type="number" placeholder="Meet Period Day" max="99" min="1" ng-model="rec.book.book_meetperiod" class="wb-txt-inp" id="" />
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('current_location') ?></span>
                                    <input type="text" ng-model="rec.book.book_current_stay" class="wb-txt-inp" id="" />
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4" ng-if="!(rec.book.in_turkey == 1)">
                                    <span class="sm-txt"><?= __('booking_date') ?></span>
                                    <input type="date" date-format ng-model="rec.book.book_arrivedate" class="wb-txt-inp p-2 ps-3" id="" />
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4" >
                                    <span class="sm-txt"><?= __('booking_departuredate') ?></span>
                                    <input type="date" date-format ng-model="rec.book.book_departuredate" class="wb-txt-inp p-2 ps-3" id="" />
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('booking_time') ?></span>
                                    <input type="date" date-format ng-model="rec.book.book_meetdate" class="wb-txt-inp" id="" />
                                </label>

                                <div class="col-md-6 col-12 col-lg-4 mt-3">
                                    <div class="flex-center text-center">
                                        <label class="switch">
                                            <input 
                                            ng-model="rec.book.in_turkey" 
                                            ng-true-value = "'1'" 
                                            ng-false-value = "'0'" 
                                            ng-checked="rec.book.in_turkey == 1"
                                            name="invoice" 
                                            id="finance-client3" 
                                            type="checkbox" />
                                            <span class="slider round"></span>
                                        </label>
                                        <label for="finance-client3"> <?= __('in_turkey') ?> </label>
                                    </div>
                                </div>

                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10">
                                        <button class="btn btn-danger" id="book_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>
                            </form>

                    `)($scope);
                        } else if (element === "offers") {
                            elementsCreated = $compile(`

                            <form class="row inlineElement" ng-submit="
                                rec.offer.client_id = rec.client.id;
                                doSave(rec.offer, 'offer', 'offers', '#client_btn', 
                                '#offers_preloader');
                                closeModal('#subModal');">
                            
                            
                                <div class="white-box mb-2">
                                    <div>
                                        <span class="sm-txt"><?= __('shared_property') ?></span>
                                        <div class="white-box flex-between mb-2">
                                    
                                            <label class="col-lg-7 col-6" style="position: relative;">
                                                <tags-input  style="padding: 0px;padding-left: 10px;border: 0px solid #000;"
                                                    class="wb-txt-inp" 
                                                    tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                                    ng-model="rec.offer.property" 
                                                    add-from-autocomplete-only="true" 
                                                    max-tags="1" 
                                                    placeholder="<?= __('shared_property') ?>" 
                                                    display-property="text"
                                                    key-property="value"
                                                    ng-disabled="rec.offer.property_id "
                                                    ng-style="{'background-color': rec.offer.property_id ? '#eeeeee' : 'initial'}"
                                                    
                                                >
                                                    <auto-complete min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30" source="loadTags($query, 'pmsproperties', '0')"></auto-complete>
                                                </tags-input>

                                                <span ng-if="rec.offer.property_id" ng-click="rec.offer.property_id = '';" class="fa fa-times" style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>                                        

                                            </label> 
                                            <div class="d-flex m-2 ">
                                                <div class="h-line hideMob"></div>
                                                    <label class="switch">
                                                        <input
                                                            ng-model="rec.offer.isinterested" 
                                                            ng-true-value="'1'" 
                                                            ng-false-value="'0'" 
                                                            id="present-client1"
                                                            type="checkbox" />
                                                        <span class="slider round"></span>
                                                    </label>
                                                <label for="interested-client1" class="ps-md-5 ps-3 pe-3 pe-md-5">
                                                    <?= __('interest_property') ?>
                                                </label>
                                                
                                            </div>
                                        </div>

                                        <span class="sm-txt"><?= __('desc_property') ?></span>
                                        <div class="white-box flex-between">
                                            <input style="border: 0px solid #000;" type="text" ng-model="rec.offer.offer_desc" class="wb-txt-inp" id="" placeholder="Enter" />
                                        </div>
                                    </div>
                                </div>
                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10">
                                        <button class="btn btn-danger" id="offers_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>

                            </form>
                    `)($scope);
                        } else if (element === "reminders") {
                            elementsCreated = $compile(`
                            
                            <form class="row   inlineElement" ng-submit="
                                rec.reminder.client_id = rec.client.id;
                                doSave(rec.reminder, 'reminder', 'reminders', '#client_btn', 
                                '#reminders_preloader');
                                closeModal('#subModal');">

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"> <?= __('next_call') ?></span>
                                    <input ng-model="rec.reminder.reminder_nextcall" date-format type="datetime-local" class="wb-txt-inp" name="" id="" />
                                </label>

                                <label for="" class=" col-12">
                                    <span class="sm-txt"> Note </span>
                                    <textarea
                                        ng-model="rec.reminder.reminder_desc"
                                        class="wb-txt-inp"
                                        name=""
                                        id=""
                                        cols="30"
                                        rows="3"
                                        placeholder="The Note"
                                    ></textarea>
                                </label>

                                
                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10 ">
                                        <button class="btn btn-danger" id="reminders_preloader" type="submit"> <?= __('save_changes') ?> </button>
                                    </div>
                                </div>
                            </form>
                    `)
                                ($scope);
                        } else if (element === "add-category") {
                            elementsCreated = $compile(`
                            
                            <form class="row   inlineElement" ng-submit="
                                doSave(rec.category, 'category', 'categories', '#category_btn', 
                                '#category_preloader'); ">
                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"> <?= __('category_name') ?></span>
                                    <?= $this->Form->text('category_name', [
                                        'type' => 'text',
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.category_name'
                                    ]) ?>
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('language_id') ?></span>
                                    <?= $this->Form->text('language_id', [
                                        'type' => 'select',
                                        'options' => $this->Do->lcl($this->Do->get('langs')),
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.language_id'
                                    ]) ?>
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('category_priority') ?></span>
                                    <?= $this->Form->text('category_priority', [
                                        'type' => 'text',
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.category_priority'
                                    ]) ?>
                                </label>

                                <label for="" class="col-12 ">
                                    <span class="sm-txt"><?= __('category_configs.icon') ?></span>
                                    
                                    <div class="div">
                                        <?= $this->Form->text('category_configs.icon', [
                                            'type' => 'text',
                                            'class' => 'form-control has-feedback-left',
                                            'ng-model' => 'rec.category.category_configs.icon',
                                            'fa-icons' => '',
                                        ]) ?>
                                        <span class="fa {{rec.category.category_configs.icon||'fa-tag'}} form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="icons_div"></div>
                                </label>

                                
                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10 ">
                                        <button class="btn btn-danger" id="category_preloader" type="submit"> <?= __('save_changes') ?> </button>
                                    </div>
                                </div>
                            </form>

                            
                        
                    `)
                                ($scope);
                        } else if (element === "add-poolcategory") {
                            elementsCreated = $compile(`
                            
                            <form class="row   inlineElement" ng-submit="
                                rec.category.user_id = rec.user.id;
                                rec.category.category_name = rec.user.user_fullname + 'Pool';
                                doSave(rec.category, 'category', 'categories', '#category_btn', 
                                '#category_preloader'); ">

                                
                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"> <?= __('pool_name') ?></span>
                                    <div class="form-control has-feedback-left"> 
                                        {{rec.category.category_name = rec.user.user_fullname + ' Pool'}} 
                                    </div>

                                </label>
                                

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('language_id') ?></span>
                                    <?= $this->Form->text('language_id', [
                                        'type' => 'select',
                                        'options' => $this->Do->lcl($this->Do->get('langs')),
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.language_id'
                                    ]) ?>
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('category_priority') ?></span>
                                    <?= $this->Form->text('category_priority', [
                                        'type' => 'text',
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.category_priority'
                                    ]) ?>
                                </label>

                                <label for="" class="col-12 ">
                                    <span class="sm-txt"><?= __('category_configs.icon') ?></span>
                                    
                                    <div class="div">
                                        <?= $this->Form->text('category_configs.icon', [
                                            'type' => 'text',
                                            'class' => 'form-control has-feedback-left',
                                            'ng-model' => 'rec.category.category_configs.icon',
                                            'fa-icons' => '',
                                        ]) ?>
                                        <span class="fa {{rec.category.category_configs.icon||'fa-tag'}} form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="icons_div"></div>
                                </label>
                                
                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10 ">
                                        <button class="btn btn-danger" id="category_preloader" type="submit"> <?= __('save_changes') ?> </button>
                                    </div>
                                </div>
                            </form>
                        
                    `)
                                ($scope);
                        } else if (element === "add-child") {
                            elementsCreated = $compile(`
                            
                            <form class="row   inlineElement" ng-submit="
                            rec.category.parent_id = 
                                doSave(rec.category, 'category', 'categories', '#category_btn', 
                                '#category_preloader'); ">

                                
                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"> <?= __('category_name') ?></span>
                                    <?= $this->Form->text('category_name', [
                                        'type' => 'text',
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.category_name'
                                    ]) ?>
                                </label>
                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('language_id') ?></span>
                                    <?= $this->Form->text('language_id', [
                                        'type' => 'select',
                                        'options' => $this->Do->lcl($this->Do->get('langs')),
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.language_id'
                                    ]) ?>
                                </label>
                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('category_priority') ?></span>
                                    <?= $this->Form->text('category_priority', [
                                        'type' => 'text',
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.category_priority'
                                    ]) ?>
                                </label>

                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('category_configs.icon') ?></span>
                                    <?= $this->Form->text('category_configs.icon', [
                                        'type' => 'text',
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.category_configs.icon',
                                        'fa-icons' => '',
                                    ]) ?>
                                </label>

                                
                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10 ">
                                        <button class="btn btn-danger" id="category_preloader" type="submit"> <?= __('save_changes') ?> </button>
                                    </div>
                                </div>
                            </form>

                            
                        
                    `)
                                ($scope);
                        } else if (element === "edit-child") {
                            elementsCreated = $compile(`
                            <form class="row   inlineElement" ng-submit="
                                rec.category.parent_id = rec.category.parent_id;
                                doSave(rec.category, 'category', 'categories', '#category_btn', 
                                '#category_preloader'); ">

                                
                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"> <?= __('category_name') ?></span>
                                    <?= $this->Form->text('category_name', [
                                        'type' => 'text',
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.category_name'
                                    ]) ?>
                                </label>
                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('language_id') ?></span>
                                    <?= $this->Form->text('language_id', [
                                        'type' => 'select',
                                        'options' => $this->Do->lcl($this->Do->get('langs')),
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.language_id'
                                    ]) ?>
                                </label>
                                <label for="" class="col-md-6 col-12 col-lg-4">
                                    <span class="sm-txt"><?= __('category_priority') ?></span>
                                    <?= $this->Form->text('category_priority', [
                                        'type' => 'text',
                                        'class' => 'form-control has-feedback-left',
                                        'ng-model' => 'rec.category.category_priority'
                                    ]) ?>
                                </label>

                                <label for="" class="col-12 ">
                                    <span class="sm-txt"><?= __('category_configs.icon') ?></span>
                                    
                                    <div class="div">
                                        <?= $this->Form->text('category_configs.icon', [
                                            'type' => 'text',
                                            'class' => 'form-control has-feedback-left',
                                            'ng-model' => 'rec.category.category_configs.icon',
                                            'fa-icons' => '',
                                        ]) ?>
                                        <span class="fa {{rec.category.category_configs.icon||'fa-tag'}} form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="icons_div"></div>
                                </label>

                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10 ">
                                        <button class="btn btn-danger" id="category_preloader" type="submit"> <?= __('save_changes') ?> </button>
                                    </div>
                                </div>
                            </form>

                            
                    `)
                                ($scope);
                        } else if (element === "view-category") {
                            elementsCreated = $compile(`
                            
                            <form class="row   inlineElement"
                                ng-submit="doSave 
                                (rec.category, 'category', 'categories', '#category_btn'); ">

                                <div class="heading m-0">
                                    <div class="title">Category Information</div>
                                    <div class="flex-gap-10">
                                        
                                    </div>
                                </div>
                                <div class="white-box mt-2">
                                    <div class="row">

                                    <label for="" class="col-md-6 col-12 col-lg-4">
                                        <span class="sm-txt"><?= __('category_name') ?></span>
                                        <div style="height: 38px;" class="form-control has-feedback-left">{{rec.category.category_name}}</div>
                                    </label>

                                    <label for="" class="col-md-6 col-12 col-lg-4">
                                        <span class="sm-txt"><?= __('parent_id') ?></span>
                                        <div style="height: 38px;" class="form-control has-feedback-left wb-ele">{{rec.category.parent_category.category_name}}</div>

                                    </label>

                                    <label for="" class="col-md-6 col-12 col-lg-4">
                                        <span class="sm-txt"><?= __('language_id') ?></span>
                                        <div style="height: 38px;" class="form-control has-feedback-left" ng-bind-html="DtSetter('langs', rec.category.language_id)"></div>
                                    </label>

                                    <label for="" class="col-md-6 col-12 col-lg-4">
                                        <span class="sm-txt"><?= __('rec_state') ?></span>
                                        <div style="height: 38px;" class="form-control has-feedback-left" ng-bind-html="DtSetter('bool2', rec.category.rec_state)"></div>
                                    </label>


                                    </div>
                                </div>
                            </form>
                    `)
                                ($scope);
                        } else if (element === "reservation") {
                            elementsCreated = $compile(`
                            <form class="row  inlineElement"  id="client_form" ng-submit="
                                rec.reservation.client_id = rec.client.id;
                                doSave(rec.reservation, 'reservation', 'reservations', '#client_btn', 
                                '#reservations_preloader');">
                                <?php if (!(in_array($authUser['user_role'], ['accountant'])) || isset($authUser['user_original_role'])) { ?>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"> <?= __('reservation_amount') ?> </span>
                                                    <div class="input-group">
                                                    <?= $this->Form->control('', [
                                                        'class' => 'wb-ele-select-cur cur-inp',
                                                        'empty' => '$',
                                                        'label' => false,
                                                        'type' => 'select',
                                                        'options' => $this->Do->lcl($this->Do->get('currencies_icons')),
                                                        'ng-model' => 'rec.reservation.reservation_currency',
                                                    ]) ?> 

                                                        <input n-format ng-model="rec.reservation.reservation_amount" class="form-control wb-txt-inp" value="400k" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"> <?= __('reservation_price') ?> </span>
                                                    <div class="input-group">
                                                    <?= $this->Form->control('', [
                                                        'class' => 'wb-ele-select-cur cur-inp',
                                                        'label' => false,
                                                        'type' => 'select',
                                                        'empty' => '$',
                                                        'options' => $this->Do->lcl($this->Do->get('currencies_icons')),
                                                        'ng-model' => 'rec.reservation.reservation_currency',
                                                    ]) ?> 

                                                        <input n-format ng-model="rec.reservation.reservation_price" class="form-control wb-txt-inp" value="400k" type="text" />
                                                    </div>
                                                </div>


                                                <label  class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"><?= __('pay_type') ?></span>
                                                    <?= $this->Form->text('pay_type', [
                                                        'type' => 'select',
                                                        'options' => $this->Do->cat(198),
                                                        'class' => 'wb-ele-select-modal col-12',
                                                        'ng-model' => 'rec.reservation.reservation_paytype'
                                                    ]) ?>
                                                </label>


                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"> <?= __('commission') ?> </span>
                                                    <div class="input-group">
                                                    <?= $this->Form->control('', [
                                                        'class' => 'wb-ele-select-cur cur-inp',
                                                        'label' => false,
                                                        'type' => 'select',
                                                        'empty' => '$',
                                                        'options' => $this->Do->lcl($this->Do->get('currencies_icons')),
                                                        'ng-model' => 'rec.reservation.reservation_currency',
                                                    ]) ?> 

                                                        <input n-format ng-model="rec.reservation.reservation_comission" class="form-control wb-txt-inp" value="400k" type="text" />
                                                    </div>
                                                </div>



                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"> <?= __('down_pay') ?> </span>
                                                    <div class="input-group">
                                                    <?= $this->Form->control('', [
                                                        'class' => 'wb-ele-select-cur cur-inp',
                                                        'label' => false,
                                                        'type' => 'select',
                                                        'options' => $this->Do->lcl($this->Do->get('currencies_icons')),
                                                        'empty' => '$',
                                                        'ng-model' => 'rec.reservation.reservation_currency',
                                                    ]) ?> 

                                                        <input n-format ng-model="rec.reservation.reservation_downpayment" class="form-control wb-txt-inp" value="400k" type="text" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"> <?= __('down_paydate') ?> </span>
                                                    <input type="date" date-format ng-model="rec.reservation.reservation_downpayment_date" class="wb-txt-inp"></input>
                                                </div>




                                                <label class="col-md-6 col-12 col-lg-3" style="position: relative;">
                                                    <span class="sm-txt"> <?= __('property_id') ?> </span>
                                                    <tags-input  style="padding: 0px;padding-left: 10px;"
                                                        class="wb-txt-inp" 
                                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                                        ng-model="rec.reservation.property" 
                                                        add-from-autocomplete-only="true" 
                                                        max-tags="1" 
                                                        placeholder="<?= __('property_id') ?>" 
                                                        display-property="text"
                                                        key-property="value"
                                                        ng-disabled="rec.reservation.property "
                                                        ng-style="{'background-color': rec.reservation.property ? '#eeeeee' : 'initial'}"

                                                    >
                                                        <auto-complete min-length="0"
                                                            load-on-focus="true"
                                                            load-on-empty="true"
                                                            max-results-to-show="30" source="loadTags($query, 'pmsproperties', '0')"></auto-complete>
                                                    </tags-input>

                                                    <span ng-if="rec.reservation.property_id" ng-click="rec.reservation.property = ''; rec.reservation.property_id = '';" class="fa fa-times" style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>                                        

                                                </label>

                                                <label class="col-md-6 col-12 col-lg-3">
                                                    <span class="sm-txt"><?= __('unit_info') ?></span>
                                                    <?= $this->Form->control('unit_info', [
                                                        'class' => 'p-2 wb-ele-select-modal ',
                                                        'label' => false,
                                                        'type' => 'textarea',
                                                        'ng-model' => 'rec.reservation.reservation_details',
                                                        'cols' => '30',
                                                        'rows' => '1',
                                                        'placeholder' => 'Unit Information...',
                                                    ]) ?>
                                                </label>


                                                <!--<label class="col-md-6 col-12 col-lg-3" ng-if="rec.reservation.reservation_downpayment == null && (rec.reservation.rec_state != 14 || rec.reservation.rec_state != 13 || rec.reservation.rec_state != 15)">
                                                    <span class="sm-txt"> <?= __('rec_state') ?> </span>
                                                    <select class="wb-ele-select-modal col-12" ng-model="rec.reservation.rec_state">
                                                        <option ng-click="handleButtonClick(recStateId);" 
                                                                ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index" 
                                                                value="{{ recStateId }}" 
                                                                ng-selected="recStateId === rec.reservation.rec_state"
                                                                ng-if="recStateId == 13 || recStateId == 14 || recStateId == 15 || recStateId == 17">
                                                            {{ recStateName }}
                                                        </option>
                                                    </select>
                                                </label>


                                                <label class="col-md-6 col-12 col-lg-3" ng-if="rec.reservation.reservation_downpayment != null && (rec.reservation.rec_state == 14 || rec.reservation.rec_state == 13 || rec.reservation.rec_state == 15)">
                                                    <span class="sm-txt"> <?= __('rec_state') ?> </span>
                                                    <select class="wb-ele-select-modal col-12" ng-model="rec.reservation.rec_state">
                                                        <option ng-click="handleButtonClick(recStateId);" 
                                                                ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index" 
                                                                value="{{ recStateId }}" 
                                                                ng-if="recStateId == 13 || recStateId == 14 || recStateId == 15">
                                                            {{ recStateName }}
                                                        </option>
                                                    </select>
                                                </label>-->

                                                <label class="col-md-6 col-12 col-lg-3" ng-if="
                                                                                (rec.reservation.rec_state != 14 && rec.reservation.rec_state != 15 && rec.reservation.rec_state != 17)">
                                                    <span class="sm-txt"> <?= __('rec_state') ?> </span>
                                                    <select class="wb-ele-select-modal col-12" ng-model="rec.reservation.rec_state">
                                                        <option ng-click="handleButtonClick(recStateId);" 
                                                                ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index" 
                                                                value="{{ recStateId }}" 
                                                                ng-selected="recStateId === rec.reservation.rec_state"
                                                                ng-if="recStateId == 13 || recStateId == 14 || recStateId == 15 || recStateId == 17">
                                                            {{ recStateName }}
                                                        </option>
                                                    </select>
                                                </label>

                                                <label class="col-md-6 col-12 col-lg-3" ng-if="
                                                                                (rec.reservation.rec_state == 14 || rec.reservation.rec_state == 15)">
                                                    <span class="sm-txt"> <?= __('rec_state') ?> </span>
                                                    <select class="wb-ele-select-modal col-12" ng-model="rec.reservation.rec_state">
                                                        <option ng-click="handleButtonClick(recStateId);" 
                                                                ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index" 
                                                                value="{{ recStateId }}" 
                                                                ng-selected="recStateId === rec.reservation.rec_state"
                                                                ng-if="recStateId == 13 || recStateId == 14 || recStateId == 15">
                                                            {{ recStateName }}
                                                        </option>
                                                    </select>
                                                </label>



                                                <div class="col-md-6 col-12 col-lg-3 mt-3">
                                                    <div class="flex-center text-center">
                                                        <label class="switch">
                                                            <input 
                                                            ng-model="rec.reservation.downpayment_paid" 
                                                            ng-true-value = "'1'" 
                                                            ng-false-value = "'0'" 
                                                            ng-checked="rec.reservation.downpayment_paid == 1"
                                                            name="invoice" 
                                                            id="finance-client3" 
                                                            type="checkbox" />
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <label for="finance-client3"> <?= __('downpayment_paid') ?> </label>
                                                    </div>
                                                </div>
                                    <?php } ?>

                                    
                                    <?php if (in_array($authUser['user_role'], ['accountant']) || isset($authUser['user_original_role'])) { ?>
                                        
                                        
                                                    <div class="col-md-6 col-12 col-lg-3">
                                                        <span class="sm-txt"> <?= __('invoice_date') ?> </span>
                                                        <input type="date" date-format ng-model="rec.reservation.reservation_invoice_date" class="wb-txt-inp" ></input>
                                                    </div>


                                                    <div class="col-md-6 col-12 col-lg-3 mt-3">
                                                        <div class="flex-center text-center">
                                                            <label class="switch">
                                                                <input 
                                                                ng-model="rec.reservation.reservation_isinvoice_sent" 
                                                                ng-true-value = "'1'" 
                                                                ng-false-value = "'0'" 
                                                                ng-checked="rec.reservation.reservation_isinvoice_sent == 1"
                                                                name="invoice" 
                                                                id="finance-client4" 
                                                                type="checkbox" />
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <label for="finance-client4"> <?= __('is_invoice_sent') ?> </label>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 col-12 col-lg-3 mt-3">
                                                        <div class="flex-center text-center">
                                                            <label class="switch">
                                                                <input 
                                                                ng-model="rec.reservation.is_commision_collacted" 
                                                                ng-true-value = "'1'" 
                                                                ng-false-value = "'0'" 
                                                                ng-checked="rec.reservation.is_commision_collacted == 1"
                                                                name="invoice" 
                                                                id="finance-client2" 
                                                                type="checkbox" />
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <label for="finance-client2"> <?= __('is_commision_collacted') ?> </label>
                                                        </div>
                                                    </div>
                                    <?php } ?>
                                    <div class="down-btns mt-4 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button class="btn btn-danger" id="reservations_preloader" type="submit"> <?= __('save_changes') ?> </button>
                                        </div>
                                    </div>
                                </form>
                    `)
                                ($scope);
                        } else if (element === "finance") {
                            elementsCreated = $compile(`
                            
                            <form class="row inlineElement" ng-submit="
                            rec.report.tar_tbl = 'Clients';
                            doSave(rec.report, 'report', 'reports', '#client_btn', '#report_preloader');">
                                <div class="row">
                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"><?= __('report_type') ?></span>
                                        <?= $this->Form->text('report_type', [
                                            'type' => 'select',
                                            'options' => $this->Do->cat(53),
                                            'class' => 'wb-ele-select-modal col-12',
                                            'ng-model' => 'rec.report.report_type'
                                        ]) ?>
                                    </label>
                                    <label class="col-md-6 col-12 col-lg-3" style="position: relative;">
                                        <span class="sm-txt"> <?= __('property_id') ?> </span>
                                        <tags-input  style="padding: 0px;padding-left: 10px;"
                                            class="wb-txt-inp" 
                                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                            ng-model="rec.report.property" 
                                            add-from-autocomplete-only="true" 
                                            max-tags="1" 
                                            placeholder="<?= __('property_id') ?>" 
                                            display-property="text"
                                            key-property="value"
                                            ng-disabled="rec.report.property "
                                            ng-style="{'background-color': rec.report.property ? '#eeeeee' : 'initial'}"

                                        >
                                            <auto-complete min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30" source="loadTags($query, 'pmsproperties', '0')"></auto-complete>
                                        </tags-input>

                                        <span ng-if="rec.report.property_id" ng-click="rec.report.property = ''; rec.report.property_id = '';" class="fa fa-times" style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>                                        

                                    </label>
                                    <label for="" class=" col-12">
                                        <span class="sm-txt"> Note </span>
                                        <textarea ng-model="rec.report.report_text" class="wb-txt-inp" name="" id="" cols="30" rows="3" placeholder="The Note"></textarea>
                                    </label>
                                    
                                </div>
                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10">
                                        <button class="btn btn-danger" id="report_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>
                            </form>

                            <div class="accordion mt-5" id="accordionNotes">
                                <div class="accordion-item" >
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <?= __('view_allNotes') ?>
                                        </button>
                                    </h2>
                                    <div id="collapseOne"ng-repeat="clsale in rec.client.reports track by $index" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                        <div class="accordion-body"  ng-click="fillReportForm(clsale)">
                                            <div class="grid lead-preview">
                                                <div class="heading">
                                                    <div class="title"></div>
                                                </div>
                                                <div class="noData" ng-if="rec.client.reports == ''"><?= __('no_data') ?></div>
                                                <div class="note" ng-if="!(clsale.report_type == '201' || clsale.report_type == '202' || clsale.report_type == '203' || clsale.report_type == '204' || itm.report_type == '75' || itm.report_type == '76' )">
                                                    <div class="box-heading d-flex">
                                                        <div class="col-lg-2 text-nowrap">
                                                            <i class="fas-sticky-note"></i> 
                                                            {{ clsale.type_category.category_name }} 
                                                            {{DtSetter('rec_stateSale', clsale.client_current_stage, clsale.report_type)}} 
                                                            ,<b> {{ clsale.user.user_fullname }}</b>
                                                            <p>
                                                                <i class="fas-home"></i>
                                                                {{ clsale.property.property_ref}}
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-8 text p-2">
                                                            <p>{{ clsale.report_text }}</p>
                                                           
                                                        </div>
                                                        <div class="flex-center flex-gap-10">
                                                            <b> {{ clsale.stat_created.split(' ')[1] }} </b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    `)
                                ($scope);
                        } else if (element === "indexreser") {
                            elementsCreated = $compile(`
                            
                            <form class="row  inlineElement"  id="client_form" ng-submit="
                                rec.reservation.client_id = rec.client.id;
                                doSave(rec.reservation, 'reservation', 'reservations', '#client_btn', 
                                '#reservations_preloader');">
                                <?php if (!(in_array($authUser['user_role'], ['accountant'])) || isset($authUser['user_original_role'])) { ?>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('reservation_amount') ?> </span>
                                            <div class="input-group">
                                            <?= $this->Form->control('', [
                                                'class' => 'wb-ele-select-cur cur-inp',
                                                'empty' => '$',
                                                'label' => false,
                                                'type' => 'select',
                                                'options' => $this->Do->lcl($this->Do->get('currencies_icons')),
                                                'ng-model' => 'rec.reservation.reservation_currency',
                                            ]) ?> 

                                                <input n-format ng-model="rec.reservation.reservation_amount" class="form-control wb-txt-inp" value="400k" type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('reservation_price') ?> </span>
                                            <div class="input-group">
                                            <?= $this->Form->control('', [
                                                'class' => 'wb-ele-select-cur cur-inp',
                                                'label' => false,
                                                'type' => 'select',
                                                'empty' => '$',
                                                'options' => $this->Do->lcl($this->Do->get('currencies_icons')),
                                                'ng-model' => 'rec.reservation.reservation_currency',
                                            ]) ?> 

                                                <input n-format ng-model="rec.reservation.reservation_price" class="form-control wb-txt-inp" value="400k" type="text" />
                                            </div>
                                        </div>


                                        <label  class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"><?= __('pay_type') ?></span>
                                            <?= $this->Form->text('pay_type', [
                                                'type' => 'select',
                                                'options' => $this->Do->cat(198),
                                                'class' => 'wb-ele-select-modal col-12',
                                                'ng-model' => 'rec.reservation.reservation_paytype'
                                            ]) ?>
                                        </label>


                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('commission') ?> </span>
                                            <input type="text" n-format ng-model="rec.reservation.reservation_comission" class="wb-txt-inp"></input>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('down_pay') ?> </span>
                                            <div class="input-group">
                                            <?= $this->Form->control('', [
                                                'class' => 'wb-ele-select-cur cur-inp',
                                                'label' => false,
                                                'type' => 'select',
                                                'options' => $this->Do->lcl($this->Do->get('currencies_icons')),
                                                'empty' => '$',
                                                'ng-model' => 'rec.reservation.reservation_currency',
                                            ]) ?> 

                                                <input n-format ng-model="rec.reservation.reservation_downpayment" class="form-control wb-txt-inp" value="400k" type="text" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('down_paydate') ?> </span>
                                            <input type="date" date-format ng-model="rec.reservation.reservation_downpayment_date" class="wb-txt-inp"></input>
                                        </div>




                                        <label class="col-md-6 col-12 col-lg-3" style="position: relative;">
                                            <span class="sm-txt"> <?= __('property_id') ?> </span>
                                            <tags-input  style="padding: 0px;padding-left: 10px;"
                                                class="wb-txt-inp" 
                                                tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                                ng-model="rec.reservation.property" 
                                                add-from-autocomplete-only="true" 
                                                max-tags="1" 
                                                placeholder="<?= __('property_id') ?>" 
                                                display-property="text"
                                                key-property="value"
                                                ng-disabled="rec.reservation.property"
                                                ng-style="{'background-color': rec.reservation.property ? '#eeeeee' : 'initial'}"

                                            >
                                                <auto-complete min-length="0"
                                                    load-on-focus="true"
                                                    load-on-empty="true"
                                                    max-results-to-show="30" source="loadTags($query, 'pmsproperties', '0')"></auto-complete>
                                            </tags-input>

                                            <span ng-if="rec.reservation.property_id" ng-click="rec.reservation.property = ''; rec.reservation.property_id = '';" class="fa fa-times" style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>                                        

                                        </label>

                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"><?= __('unit_info') ?></span>
                                            <?= $this->Form->control('unit_info', [
                                                'class' => 'p-2 wb-ele-select-modal ',
                                                'label' => false,
                                                'type' => 'textarea',
                                                'ng-model' => 'rec.reservation.reservation_details',
                                                'cols' => '30',
                                                'rows' => '1',
                                                'placeholder' => 'Unit Information...',
                                            ]) ?>
                                        </label>




                                        <label class="col-md-6 col-12 col-lg-3" ng-if="
                                                                        (rec.reservation.rec_state != 14 && rec.reservation.rec_state != 15 && rec.reservation.rec_state != 17)">
                                            <span class="sm-txt"> <?= __('rec_state') ?> </span>
                                            <select class="wb-ele-select-modal col-12" ng-model="rec.reservation.rec_state">
                                                <option ng-click="handleButtonClick(recStateId);" 
                                                        ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index" 
                                                        value="{{ recStateId }}" 
                                                        ng-selected="recStateId === rec.reservation.rec_state"
                                                        ng-if="recStateId == 13 || recStateId == 14 || recStateId == 15 || recStateId == 17">
                                                    {{ recStateName }}
                                                </option>
                                            </select>
                                        </label>

                                        <label class="col-md-6 col-12 col-lg-3" ng-if="
                                                                        (rec.reservation.rec_state == 14 || rec.reservation.rec_state == 15)">
                                            <span class="sm-txt"> <?= __('rec_state') ?> </span>
                                            <select class="wb-ele-select-modal col-12" ng-model="rec.reservation.rec_state">
                                                <option ng-click="handleButtonClick(recStateId);" 
                                                        ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index" 
                                                        value="{{ recStateId }}" 
                                                        ng-selected="recStateId === rec.reservation.rec_state"
                                                        ng-if="recStateId == 13 || recStateId == 14 || recStateId == 15">
                                                    {{ recStateName }}
                                                </option>
                                            </select>
                                        </label>



                                        <div class="col-md-6 col-12 col-lg-3 mt-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input 
                                                    ng-model="rec.reservation.downpayment_paid" 
                                                    ng-true-value = "'1'" 
                                                    ng-false-value = "'0'" 
                                                    ng-checked="rec.reservation.downpayment_paid == 1"
                                                    name="invoice" 
                                                    id="finance-client3" 
                                                    type="checkbox" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="finance-client3"> <?= __('downpayment_paid') ?> </label>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    
                                    <div class="down-btns mt-4 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button class="btn btn-danger" id="reservations_preloader" type="submit"> <?= __('save_changes') ?> </button>
                                        </div>
                                    </div>
                                </form>

                        <div class="accordion mt-5" id="accordionNotes">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <?= __('view_allNotes') ?>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                                        <div class="grid lead-preview">
                                            <div class="heading">
                                                <div class="title"></div>
                                                
                                            </div>

                                            <div class="noData" ng-if="rec.client.reservations == ''">

                                            <?= __('no_data') ?>

                                        </div>
                                    <div>

                                <div ng-repeat="deals in rec.client.reservations track by $index">
                                    <div class="heading" >
                                        <div class="title" >{{$index+1}}. Deal</div>
                                    </div>


                                    <div class="white-box">
                                        <form class="row"  ng-click="fillReserveForm(deals)">
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('reservation_amount') ?>
                                                </span>
                                                <div class="input-group">

                                                    <div class="wb-ele form-control">

                                                        {{nFormat( deals.reservation_amount
                                                        ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                    </div>

                                                </div>
                                            </div>



                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('reservation_price') ?>
                                                </span>
                                                <div class="input-group">
                                                    <div class="wb-ele form-control">

                                                        {{nFormat( deals.reservation_price
                                                        ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('usdprice') ?>
                                                </span>
                                                <div type="text"
                                                    ng-model="rec.reservations.reservation_usdcomission"
                                                    class="wb-ele form-control" placeholder="% Please specify">
                                                    {{nFormat( deals.reservation_usdprice
                                                    ,DtSetter('currencies_icons','$'))}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Payment Type </span>
                                                <div class="wb-ele form-control">
                                                    {{deals.payment.category_name}}</div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Down Payment </span>
                                                <div class="wb-ele">
                                                    <!-- {{deals.currency.category_name}}
                                                {{deals.reservation_downpayment}} -->
                                                    {{nFormat( deals.reservation_downpayment
                                                    ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Downpaymnet Date </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                    <div>
                                                        {{deals.reservation_downpayment_date.split(' ')[0]}}</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Commission </span>
                                                <div class="wb-ele">
                                                    {{nFormat( deals.reservation_comission
                                                    ,DtSetter('currencies_icons',deals.reservation_currency))}}

                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('usdcommission') ?>
                                                </span>
                                                <div type="text" class="wb-ele form-control"
                                                    placeholder="Please specify">

                                                    {{nFormat(
                                                    deals.reservation_usdcomission,DtSetter('currencies_icons','$'))}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('invoice_date') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                    <div>
                                                        {{deals.reservation_invoice_date.split(' ')[0]}}</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('property_id') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    {{deals.property.property_ref}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('clientspec_propertytype') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    {{deals.pmscategory.category_name}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('project_id') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    {{deals.project.project_ref}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('seller_name') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    {{deals.seller.seller_name}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('sold_from') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    {{deals.Property.seller_name}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('dev_name') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    {{deals.developer.dev_name}}
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Unit Information </span>
                                                <div class="wb-ele">{{deals.reservation_details}}</div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('reservation_date') ?>
                                                </span>
                                                <div class="wb-ele">
                                                    <?= $this->Html->image('/img/datepicker.png', ['' => '']) ?>
                                                    <div>
                                                        {{deals.stat_created.split(' ')[0]}}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt">
                                                    <?= __('rec_state') ?>
                                                </span>
                                                <div class="wb-ele">{{ DtSetter('rec_stateSale',
                                                    3, deals.rec_state)
                                                    }}</div>
                                            </div>


                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.reservation_isinvoice_sent == 1">
                                                <span class="sm-txt">
                                                    <?= __('is_invoice_sent') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.reservation_isinvoice_sent == 0 || deals.reservation_isinvoice_sent == null">
                                                <span class="sm-txt">
                                                    <?= __('is_invoice_sent') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>



                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.is_commision_collacted == 1">
                                                <span class="sm-txt">
                                                    <?= __('is_commision_collacted') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.is_commision_collacted == 0 || deals.is_commision_collacted == null">
                                                <span class="sm-txt">
                                                    <?= __('is_commision_collacted') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.downpayment_paid == 1">
                                                <span class="sm-txt">
                                                    <?= __('downpayment_paid') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o greenText"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 col-lg-3"
                                                ng-if="deals.downpayment_paid == 0 || deals.downpayment_paid == null">
                                                <span class="sm-txt">
                                                    <?= __('downpayment_paid') ?>
                                                </span>

                                                <div class="wb-ele">
                                                    <i class="fa fa-check-circle-o redText"></i>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `)
                                ($scope);

                        } else if (element === "viewOffer") {
                            elementsCreated = $compile(`
                            
                            <form class="row inlineElement" ng-submit="
                                rec.offer.client_id = rec.client.id;
                                doSave(rec.offer, 'offer', 'offers', '#client_btn', 
                                '#offers_preloader');">


                                <div class="white-box mb-2">
                                    <div>
                                        <span class="sm-txt">
                                            <?= __('shared_property') ?>
                                        </span>
                                        <div class="white-box flex-between mb-2">

                                            <label class="col-lg-7 col-6" style="position: relative;">
                                                <tags-input
                                                    style="padding: 0px;padding-left: 10px;border: 0px solid #000;"
                                                    class="wb-txt-inp"
                                                    tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                                    ng-model="rec.offer.property" add-from-autocomplete-only="true"
                                                    max-tags="1" placeholder="<?= __('shared_property') ?>"
                                                    display-property="text" key-property="value"
                                                    ng-disabled="rec.offer.property_id "
                                                    ng-style="{'background-color': rec.offer.property_id ? '#eeeeee' : 'initial'}">
                                                    <auto-complete min-length="0" load-on-focus="true"
                                                        load-on-empty="true" max-results-to-show="30"
                                                        source="loadTags($query, 'pmsproperties', '0')"></auto-complete>
                                                </tags-input>

                                                <span ng-if="rec.offer.property_id"
                                                    ng-click="rec.offer.property_id = '';" class="fa fa-times"
                                                    style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>

                                            </label>
                                            <div class="d-flex m-2 ">
                                                <div class="h-line hideMob"></div>
                                                <label class="switch">
                                                    <input ng-model="rec.offer.isinterested" ng-true-value="'1'"
                                                        ng-false-value="'0'" id="present-client1" type="checkbox" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="interested-client1" class="ps-md-5 ps-3 pe-3 pe-md-5">
                                                    <?= __('interest_property') ?>
                                                </label>

                                            </div>
                                        </div>

                                        <span class="sm-txt">
                                            <?= __('desc_property') ?>
                                        </span>
                                        <div class="white-box flex-between">
                                            <input style="border: 0px solid #000;" type="text"
                                                ng-model="rec.offer.offer_desc" class="wb-txt-inp" id=""
                                                placeholder="Enter" />
                                        </div>
                                    </div>
                                </div>
                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10">
                                        <button class="btn btn-danger" id="offers_preloader" type="submit">
                                            <?= __('save_changes') ?>
                                        </button>
                                    </div>
                                </div>

                            </form>

                            <div class="accordion mt-5" id="accordionNotes">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <?= __('view_allOffers') ?>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                                        <div class="grid lead-preview">

                                            <div class="noData" ng-if="rec.client.offers == ''  ">

                                                <?= __('no_data') ?>

                                            </div>
                                            <div ng-repeat="clsale in rec.client.offers track by $index">
                                                <div class="heading">
                                                    <div class="title">{{$index+1}}. Offer</div>
                                                  
                                                </div>
                                                <div class="note"
                                                    ng-if="!(clsale.report_type == '201' || clsale.report_type == '202' || clsale.report_type == '203' || clsale.report_type == '204' || clsale.report_type == '75' || itm.report_type == '76' )">

                                                    <div>
                                                        <span class="sm-txt">
                                                            <?= __('shared_property') ?>
                                                        </span>
                                                        <div class="flex-between mb-2">
                                                            <a href="#"> <span class="btn-link">{{
                                                                    clsale.property_ref.property_title
                                                                    }},
                                                                    {{ clsale.property_ref.property_ref }}</span>
                                                                <br><span class="text-dark">{{ clsale.offer_desc
                                                                    }}</span></a>



                                                            <div class="d-flex">
                                                                <div class="h-line hideMob"></div>
                                                                <label class="switch">
                                                                    <span disabled class="slider round"
                                                                        ng-model="clsale.isinterested"
                                                                        ng-class="{'green-background': clsale.isinterested == 1}">
                                                                    </span>
                                                                </label>
                                                                <label for="interested-client1"
                                                                    class="ps-md-5 ps-3 pe-3 pe-md-5">
                                                                    <?= __('interest_property') ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <!-- <span class="sm-txt">
                                                                <?= __('desc_property') ?>
                                                            </span> -->
                                                        <!-- <div class="flex-between">
                                                                <div> {{ clsale.offer_desc }}</div>
                                                            </div> -->
                                                    </div>
                                                    <!-- <span class="spoken"></span>
                                                        <div class="text">
                                                            <p>{{ itm.report_text }}</p>
                                                        </div> -->
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                    `)
                                ($scope);
                        } else if (element === "info") {
                            elementsCreated = $compile(`
                            <form class="row  inlineElement"  id="client_form" ng-submit="
                                rec.action.client_id = rec.client.id; 
                                
                                doSave(rec.client, 'client', 'clients', '#client_btn', 
                                '#clients_preloader');">
                                <?php if (!(in_array($authUser['user_role'], ['accountant', 'field'])) || isset($authUser['user_original_role'])) { ?>
                                    
                                            <label  class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"><?= __('category_id') ?></span>
                                                <?= $this->Form->text('category_id', [
                                                    'type' => 'select',
                                                    'options' => $this->Do->cat(37),
                                                    'class' => 'wb-ele-select-modal col-12',
                                                    'ng-model' => 'rec.client.category_id'
                                                ]) ?>
                                            </label>

                                            <label class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> <?= __('clientspec_propertytype') ?> </span> 
                                                <tags-input placeholder="Add Property Type" style="padding: 0px;padding-left: 10px;"ng-model="rec.client.client_specs[0].clientspec_propertytype" display-property="text" key-property="value" class="wb-txt-inp" tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                                    <auto-complete min-length="0"
                                                        load-on-focus="true"
                                                        load-on-empty="true"
                                                        max-results-to-show="30" source="loadTags($query, 'pmscategories', 1)"></auto-complete>
                                                </tags-input>
                                            </label>

                                            <label class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> <?= __('client_tags') ?> </span>
                                                <tags-input placeholder="Add Lead Tag" style="padding: 0px;padding-left: 10px;"ng-model="rec.client.client_tags" class="wb-txt-inp" tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                                    <auto-complete min-length="0"
                                                        load-on-focus="true"
                                                        load-on-empty="true"
                                                        max-results-to-show="30" source="loadTags($query, 'pmscategories', 8)"></auto-complete>
                                                </tags-input>
                                            </label>

                                            <label class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"><?= __('clientspec_beds') ?></span>
                                                <tags-input placeholder="Add Beds" style="padding: 0px;padding-left: 10px;"ng-model="rec.client.client_specs[0].clientspec_beds" display-property="text" key-property="value" class="wb-txt-inp" tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                                    <auto-complete min-length="0"
                                                        load-on-focus="true"
                                                        load-on-empty="true"
                                                        max-results-to-show="30" source="loadTags($query, 'pmscategories', 152)"></auto-complete>
                                                </tags-input>
                                            </label>

                                            <label class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"><?= __('client_budget') ?></span>
                                                <div class="input-group">
                                                    <?= $this->Form->select(
                                                        'client.client_budget',
                                                        [
                                                            '' => 'Select One',
                                                            '50000' => 'Up to Dolar 50k',
                                                            '100000' => 'Up to Dolar 100k',
                                                            '150000' => 'Up to Dolar 150k',
                                                            '200000' => 'Up to Dolar 200k',
                                                            '300000' => 'Up to Dolar 300k',
                                                            '400000' => 'Up to Dolar 400k',
                                                            '500000' => 'Up to Dolar 500k',
                                                            '750000' => 'Up to Dolar 750k',
                                                            '1000000' => 'Up to Dolar 1m',
                                                            '1500000' => 'Up to Dolar 1.5m',
                                                            '2000000' => 'Up to Dolar 2m',
                                                            '2000001' => 'Dolar 2m +',
                                                        ],
                                                        [
                                                            'class' => 'wb-ele-select-modal col-12',
                                                            'label' => false,
                                                            'ng-model' => 'rec.client.client_budget '
                                                        ]
                                                    ) ?>
                                                </div>
                                            </label>

                                            <label class="col-md-6 col-12 col-lg-3" style="position: relative;">
                                                <span class="sm-txt"> <?= __('target_location') ?> </span>

                                                <tags-input  style="padding: 0px;padding-left: 10px;"
                                                    class="wb-txt-inp" 
                                                    tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                                    ng-model="rec.client.client_specs[0].clientspec_loction_target" 
                                                    add-from-autocomplete-only="true" 
                                                    max-tags="1" 
                                                    placeholder="<?= __('target_location') ?>" 
                                                    display-property="text"
                                                    key-property="value"
                                                    ng-disabled="rec.client.client_specs[0].targetLocation "
                                                    ng-style="{'background-color': rec.client.client_specs[0].targetLocation ? '#eeeeee' : 'initial'}"

                                                >
                                                    <auto-complete min-length="0"
                                                        load-on-focus="true"
                                                        load-on-empty="true"
                                                        max-results-to-show="30" source="loadTags($query, 'addresses', '1')"></auto-complete>
                                                </tags-input>

                                                <span ng-if="rec.client.client_specs[0].targetLocation" ng-click="rec.client.client_specs[0].targetLocation = '';" class="fa fa-times" style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>                                        

                                            </label>

                                            <label  class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"><?= __('Social Style') ?></span>
                                                <?= $this->Form->text('Social Style', [
                                                    'type' => 'select',
                                                    'options' => $this->Do->cat(178),
                                                    'class' => 'wb-ele-select-modal col-12',
                                                    'ng-model' => 'rec.client.client_specs[0].clientspec_socialstyle'
                                                ]) ?>
                                            </label>

                                            <label  class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"><?= __('Buyer Persona') ?></span>
                                                <?= $this->Form->text('Buyer Persona', [
                                                    'type' => 'select',
                                                    'options' => $this->Do->cat(170),
                                                    'class' => 'wb-ele-select-modal col-12',
                                                    'ng-model' => 'rec.client.client_specs[0].clientspec_buyerpersona'
                                                ]) ?>
                                            </label>

                                            <label for="" class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"><?= __('client_priority') ?></span>
                                                <?= $this->Form->control('client_priority', [
                                                    'class' => 'wb-ele-select-modal col-12',
                                                    'label' => false,
                                                    'type' => 'select',
                                                    'ng-model' => 'rec.client.client_priority',
                                                    'options' => $this->Do->lcl($this->Do->get('client_priorities')),
                                                    'empty' => 'Select Please',
                                                ]) ?>
                                            </label>
                                        
                        <?php } ?>
                            <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'field']) || isset($authUser['user_original_role'])) { ?>
                                            <label class="col-md-6 col-12 col-lg-3" >
                                                <span class="sm-txt"> <?= __('rec_state') ?> </span>
                                                <select class="wb-ele-select-modal col-12" ng-model="rec.client.rec_state">
                                                    <option ng-click="handleButtonClick(recStateId);" 
                                                            ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index" 
                                                            value="{{ recStateId }}" 
                                                            ng-selected="recStateId === rec.client.rec_state">
                                                        {{ recStateName }}
                                                    </option>
                                                </select>
                                            </label>
                            <?php } ?>
                                    


                            <?php if (!in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'field']) || isset($authUser['user_original_role'])) { ?>

                                            <label class="col-md-6 col-12 col-lg-3" ng-if="!(rec.client.rec_state == 13 || rec.client.rec_state == 14 || rec.client.rec_state == 15)" >
                                                <span class="sm-txt"> <?= __('rec_state') ?> </span>
                                                <select class="wb-ele-select-modal col-12" ng-model="rec.client.rec_state">
                                                    <option ng-click="handleButtonClick(recStateId);" 
                                                            ng-repeat="(recStateId, recStateName) in DtSetter('rec_stateStage', 3) track by $index" 
                                                            value="{{ recStateId }}" 
                                                            ng-selected="recStateId === rec.client.rec_state"
                                                            ng-if="recStateId != 13 && recStateId != 11 && recStateId != 16 && recStateId != 17">
                                                        {{ recStateName }}
                                                    </option>
                                                </select>
                                            </label>

                            <?php } ?>
                                    
                                    <div class="down-btns mt-4 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button type="submit" class="btn btn-danger" id="clients_preloader"> <?= __('save_changes') ?> </button>
                                        </div>
                                    </div>

                                </form>
                    `)
                                ($scope);

                        } else if (element === "add-sale") {
                            elementsCreated = $compile(`
                            
                            <form class="row  inlineElement"  id="client_form" ng-submit="
                            doSave(rec.client, 'client', 'clients', '#client_btn', '#sales_preloader');">

                                

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_name') ?> </span>
                                        <?= $this->Form->text('client_name', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'text',
                                            'ng-model' => 'rec.client.client_name',
                                            'placeholder' => __('client_name'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_mobile') ?> </span>
                                        <?= $this->Form->text('client_mobile', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'tel',
                                            'ng-model' => 'rec.client.client_mobile',
                                            'placeholder' => __('client_mobile'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_phone') ?> </span>
                                        <?= $this->Form->text('client_phone', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'tel',
                                            'ng-model' => 'rec.client.client_phone',
                                            'placeholder' => __('client_phone'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_email') ?> </span>
                                        <?= $this->Form->text('client_email ', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'email',
                                            'ng-model' => 'rec.client.client_email',
                                            'placeholder' => __('client_email'),
                                        ]) ?>
                                    </label>
                                    <label class="col-md-6 col-12 col-lg-3" style="position: relative;">
                                        <span class="sm-txt"> <?= __('adrs_country') ?> </span>

                                        <tags-input  style="padding: 0px;padding-left: 10px;"
                                            class="wb-txt-inp" 
                                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                            ng-model="rec.client.adrscountry" 
                                            add-from-autocomplete-only="true" 
                                            max-tags="1" 
                                            placeholder="<?= __('adrs_country') ?>" 
                                            display-property="text"
                                            key-property="value"
                                            ng-disabled="rec.client.adrscountry "
                                            ng-style="{'background-color': rec.client.adrscountry ? '#eeeeee' : 'initial'}"
                                            
                                        >
                                            <auto-complete min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30" source="loadTags($query, 'pmscategories', 7)"></auto-complete>
                                        </tags-input>

                                        <span ng-if="rec.client.adrscountry" ng-click="rec.client.adrscountry = '';" class="fa fa-times" style="cursor: pointer; position: absolute; top: 55%; right: 20px; transform: translateY(-50%);"></span>                                        

                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_nationality') ?> </span>
                                        <?= $this->Form->text('client_nationality', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'text',
                                            'ng-model' => 'rec.client.client_nationality',
                                            'placeholder' => __('client_nationality'),
                                        ]) ?>
                                    </label>

                                    <label class="col-md-6 col-12 col-lg-3">
                                        <span class="sm-txt"> <?= __('client_address') ?> </span>
                                        <?= $this->Form->text('client_address ', [
                                            'class' => 'wb-txt-inp',
                                            'label' => false,
                                            'type' => 'text',
                                            'ng-model' => 'rec.client.client_address',
                                            'placeholder' => __('client_address'),
                                        ]) ?>
                                    </label>

                                    

                                    <div class="down-btns mt-4 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button type="submit" class="btn btn-danger" id="sales_preloader"> <?= __('save_changes') ?> 
                                            </button>
                                        </div>
                                    </div>


                                </form>

                                
                    `)($scope);

                        } else if (element === "add-pool") {
                            elementsCreated = $compile(`
                            
                            <form class="row  inlineElement"  id="client_form" ng-submit="
                            rec.user_pool.user_id = rec.user.id;
                            doSave(rec.user_pool, 'user_pool', 'userpool', '#client_btn', '#userpool_preloader');">

                                

                            <label class="col-md-6 col-12 col-lg-12">
                                        <span class="sm-txt"> <?= __('pool_name') ?> </span>
                                        <tags-input placeholder="Add User Pool" 
                                        style="padding: 0px;padding-left: 10px;"
                                        ng-model="rec.user_pool.pool_id" 
                                        class="wb-txt-inp" 
                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                            <auto-complete min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30" source="loadTags($query, 'categories', 28)">
                                            </auto-complete>
                                        </tags-input>
                                    </label>


                                    

                                    <div class="down-btns mt-4 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button type="submit" class="btn btn-danger" id="userpool_preloader"> <?= __('save_changes') ?> 
                                            </button>
                                        </div>
                                    </div>


                                </form>

                                
                        `)($scope);
                        } else if (element === "add-team-or-memeber") {
                            elementsCreated = $compile(`
                            
                            <form class="row  inlineElement"  id="client_form" ng-submit="
                            doSave(rec.user, 'user', 'users', '#client_btn', '#user_preloader');">

                                

                            <label class="col-md-6 col-12 col-lg-12">
                                <span class="sm-txt"> <?= __('user') ?> </span>
                                <tags-input placeholder="Add User" 
                                            style="padding: 0px; padding-left: 10px;"
                                            ng-model="rec.user.parent_id" 
                                            class="wb-txt-inp" 
                                            tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                    <auto-complete min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30" 
                                                source="loadTags($query, 'users', '', '', '0')">
                                    </auto-complete>
                                </tags-input>
                            </label>



                                    

                                    <div class="down-btns mt-4 d-flex justify-content-end">
                                        <div class="flex-gap-10 ">
                                            <button type="submit" class="btn btn-danger" id="users_preloader"> <?= __('save_changes') ?> 
                                            </button>
                                        </div>
                                    </div>

                                </form>

                                
                        `)($scope);
                    } else if (element === "fieldassign") {
                            elementsCreated = $compile(`
                            <form class="row inlineElement" 
                            ng-submit="
                                rec.user_client.client_id = rec.client.id;
                                doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#userclient_preloader');
                                closeModal('#subModal');">
                                

                                <label for="" class="col-6 col-sm-12">
                                    <span class="sm-txt"> Advisor </span>
                                    <tags-input  style="padding: 0px;padding-left: 10px;"
                                        ng-model="rec.user_client.user" 
                                        add-from-autocomplete-only="true" 
                                        placeholder="<?= __('user') ?>" 
                                        display-property="text"
                                        key-property="value"
                                        class="wb-txt-inp"
                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                    >
                                        <auto-complete min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30"  source="loadTags($query, 'users', '', 'field')"></auto-complete>
                                    </tags-input>
                                </label>

                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10 ">
                                        <button class="btn btn-danger" id="userclient_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>
                            </form>
                    `)($scope);
                        } else if (element === "ccassign") {
                            elementsCreated = $compile(`
                            <form class="row inlineElement" 
                            ng-submit="
                                rec.user_client.client_id = rec.client.id;
                                doSave(rec.user_client, 'user_client', 'userclient', '#client_btn', '#userclient_preloader');
                                closeModal('#subModal');">
                                
                                
                    

                                <label for="" class="col-6 col-sm-12">
                                    <span class="sm-txt"> Advisor </span>
                                    <tags-input  style="padding: 0px;padding-left: 10px;"
                                        ng-model="rec.user_client.user" 
                                        add-from-autocomplete-only="true" 
                                        placeholder="<?= __('user') ?>" 
                                        display-property="text"
                                        key-property="value"
                                        class="wb-txt-inp"
                                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                                    >
                                        <auto-complete min-length="0"
                                                load-on-focus="true"
                                                load-on-empty="true"
                                                max-results-to-show="30"  source="loadTags($query, 'users', '', 'admin.callcenter')"></auto-complete>
                                    </tags-input>
                                </label>

                                <div class="down-btns mt-4 d-flex justify-content-end">
                                    <div class="flex-gap-10 ">
                                        <button class="btn btn-danger" id="userclient_preloader" type="submit"><?= __('save_changes') ?></button>
                                    </div>
                                </div>
                            </form>
                    `)($scope);
                        } else {
                            console.log("object");
                        }
                        $(tar).append(elementsCreated);
                    } else {
                        $(tar).html("");
                    }
                };

                // View More / View Less Function
                $scope.toggleText = function (event) {
                    event.preventDefault();
                    let text = event.target.parentElement;
                    if (text.classList.contains("show-text")) {
                        text.classList.remove("show-text");
                        text.classList.add("hide-text");
                        event.target.innerHTML = "View More";
                    } else {
                        text.classList.remove("hide-text");
                        text.classList.add("show-text");
                        event.target.innerHTML = "View Less";
                    }
                };

                // Check / Uncheck Client Checkboxes
                $scope.checkAll = function () {
                    let checkboxes = document.getElementsByName("client-checkbox");
                    let checkboxAll = checkboxes[0];
                    if (checkboxAll.checked == true) {
                        checkboxes.forEach(function (checkbox) {
                            checkbox.checked = true;
                        });
                    } else {
                        checkboxes.forEach(function (checkbox) {
                            checkbox.checked = false;
                        });
                    }
                };

                // Toggle Lead Preview Modal
                let overlay = $(".overlay");
                $(".previewToggle").on("click", function () {
                    let leadPreviewModal = $(this)
                        .parents()
                        .eq(3)
                        .find(".lead-preview");
                    leadPreviewModal.toggleClass("active");
                    overlay.toggleClass("active");

                    // scroll to the top of the page
                    $(window).scrollTop(0);
                });

                // Lead Preview Exit Button
                $(".lead-preview .btn-exit, .overlay").on("click", function () {
                    $(".lead-preview").removeClass("active");
                    $(".overlay").removeClass("active");
                });




                $scope.openDatePicker = function (datepickerName) {
                    $scope.datepickers[datepickerName] = true;
                };




                $scope.showLogUrlAlert = function (logUrl) {
                    var logValue = logUrl;
                    // alert(logUrl);
                    var lowerCaseFirstChar = logValue.charAt(0).toLowerCase();
                    var modifiedValue = lowerCaseFirstChar + logValue.slice(1);
                    var aaa = modifiedValue;
                    modifiedValue = modifiedValue.slice(0, -1);
                    // alert('#' + modifiedValue + '_btn');
                    $scope.doSave($scope.rec.log, 'log', 'logs', '#log_btn', '#log_preloader');
                };



                $scope.newEntity = function (tar, params) {
                    // $scope.rec = [];
                    var dt = rec_origin[tar];
                    if (typeof params === 'object') {
                        for (let k in params) {
                            if (k == 'id') {
                                params[k] = -Math.abs(params[k]);
                            }
                            dt[tar][k] = params[k];
                        }
                    }
                    $scope.rec[tar] = dt;
                }

                $scope.showPNote = function (_title, _msg, _type, _isHide, _delay) {
                    return showPNote(_title, _msg, _type, _isHide, _delay)
                }

                $scope.nFormat = function (v, unit, round) {
                    return nFormat(v, unit, round)
                }

                $scope.getLastId = function (obj, isKey) {
                    !isKey ? isKey = true : isKey;
                    var keysObj = Object.keys(obj);
                    var res = isKey ? keysObj[keysObj.length - 1] : obj[keysObj[keysObj.length - 1]];
                    return res + '';
                }

                $scope.copyToClipBoard = function (tar) {
                    navigator.clipboard.writeText(tar).then(function () {
                        showPNote('<?= __('note-message') ?>', '<?= __('link_copied') ?>', 'greenBg');
                    }, function (err) {
                        console.error('Async: Could not copy text: ', err);
                        showPNote('<?= __('note-message') ?>', '<?= __('link_copy_failed') ?> ' + err, 'redBg');
                    });
                }

                $scope.currencyConverter = function (from, to, price) {
                    var currCurrency = 2;
                    var ratios = DtSetter('ratios', 'list');
                    // console.log('ratios', from, to, price ,ratios);
                    if (from == to) {
                        return nFormat(price);
                    } // no need convertion if the same currency
                    if (from == 'USD') { // reverse db ratio and multiply it by price
                        return nFormat(price * (1 / (ratios[to + '_USD'] * 1)))
                    }
                    if (to == 'USD') { // this match our ratio values from X to USD
                        return nFormat(price * (ratios[from + '_' + to] * 1))
                    }
                    var toUsd = price * (ratios[from + '_USD'] * 1) // convert X to USD
                    return nFormat(toUsd * (1 / (ratios[to + '_USD'] * 1))); // multiplay with the price
                }

                $scope.empty = function (v) {
                    if (!v) {
                        return true;
                    }
                    if (typeof v === 'number') {
                        return false;
                    }
                    if (typeof v === 'array' || typeof v === 'string') {
                        if (v.length == 0) {
                            return true;
                        }
                    }
                    if (typeof v === 'object') {
                        v = Object.keys(v).filter(function (k) {
                            return v[k] !== false;
                        });
                        if (Object.keys(v).length == 0) {
                            return true;
                        }
                        // for (var prop in obj) {
                        //     var value = obj[prop];
                        //     if (typeof obj[prop] !== 'object') {
                        //         continue;
                        //     }
                        //     var arr = $.map(value, function(val, index) {
                        //         return [val];
                        //     });
                        // }
                    }
                    return false;
                }

                $scope.isArray = function (v) {
                    return (typeof v === 'object' || typeof v === 'array');
                }

                $scope.removeFilter = function (tar, key, ind) {
                    if (tar == 'adrs') {
                        $scope.rec.search[key] = ''
                    }
                    if ('keyword,language_id,stat_updated,stat_created'.indexOf(tar) > -1) {
                        $scope.rec.search[tar] = ''
                    }
                    if ('features_ids,property_usp'.indexOf(tar) > -1) {
                        $scope.rec.search[tar][key] = false
                    }
                    if (tar == 'slide') {
                        $scope.rec.search[key] = [];
                    }
                    if (tar == 'specs') {
                        $scope.rec.search[key].splice(ind, 1);
                    }
                    if (tar == 'specs_one_id') {
                        $scope.rec.search[key] = [];
                    }
                    $scope.doSearch();
                }


                $scope.toImage = function (tar) {
                    html2canvas(document.querySelector(tar)).then(canvas => {
                        $('#imgHolder').html('<img src="' + canvas.toDataURL("image/png") + '"><i class="fa fa-times" aria-hidden="true"></i>');
                        $('#imgHolder').attr("style", "opacity: 1; z-index:1111;");
                    })
                }

                $scope.DtSetter = function (tar, val, val2) {
                    return DtSetter(tar, val, val2)
                }

                const nToArray = function (num) {
                    var arr = [];
                    for (var i = 0; i < num; i++) {
                        arr[i] = i
                    }
                    return arr;
                }

                $scope.pager = function (total, curr) {
                    var arr = nToArray(total + 1).slice(curr, curr + 3)
                    if (curr > 1) {
                        arr.unshift(curr - 1)
                    }
                    if (curr > 2) {
                        arr.unshift(curr - 2)
                    }
                    return arr;
                }

                $scope.checkRecState = function (user_client) {
                    for (var i = 0; i < user_client.length; i++) {
                        if (user_client[i].rec_state === 2) {
                            return true;
                        }
                    }
                    return false;
                };


                $scope.chkAll = function (tar, val) {
                    var all = $(tar + " input");
                    $scope.selected = {}
                    for (var i = 0; i < all.length; i++) {
                        $(all[i]).prop('checked', val)
                        if (!val) {
                            continue;
                        }
                        $scope.selected[$(all[i]).val()] = true
                    }
                }

                $scope.toElm = function (tar) {
                    var elmTarget = $(!tar ? "body" : "#" + tar).offset().top;
                    $("html").animate({
                        scrollTop: elmTarget
                    }, 1000);
                }

                $scope.formatter = function (val) {
                    var suffix = "$";
                    var prefix = " USD";
                    var v = suffix + val.replace('.', '').toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + prefix;
                    return v;
                }

                $scope.closeModal = function (tar) {
                    $(tar).modal('hide');
                }

                $scope.openModal = function (tar) {
                    $(tar).modal('show');
                }

                $scope.getPhoto = function (fileToUpload, photo, folder, noimg) {
                    // console.log(fileToUpload, photo, folder, noimg)
                    !fileToUpload ? fileToUpload = false : fileToUpload;
                    !photo ? photo = '' : photo;
                    !folder ? folder = '' : folder;
                    !noimg ? noimg = 'noimg.svg' : noimg;

                    if (fileToUpload == 'camera') {
                        return photo;
                    }
                    if (fileToUpload) {
                        return fileToUpload;
                    }
                    var path = '<?= $app_folder ?>/img/' + folder + '_photos/thumb'
                    if (photo.length > 3) {
                        return path + '/' + photo
                    }
                    return '<?= $app_folder ?>/img/' + noimg
                }

                $scope.doClick = function (tar, delay) {
                    return doClick(tar, delay)
                }

                $scope.doFilter = function () {
                    var url = [];
                    angular.forEach($scope.search, function (v, k) {
                        if (v) {
                            url.push(k + '=' + v)
                        }
                    })
                    $scope.goTo('/admin/' + ctrl + '/' + actn + '?' + url.join('&'))
                }

                $scope.goTo = function (path, ext = null) {
                    if (ext == 'param') {
                        return window.location.href = window.location.pathname + path
                    }
                    if (ext) {
                        return window.open($scope.dmn + $scope.app_folder + path)
                    }
                    return window.location.href = $scope.dmn + $scope.app_folder + path
                }

                $scope.showMenu = function (tar) {

                    !tar ? tar = $('.left_col').css('left') : tar;

                    if (tar == '0px' || tar == 'hide') {
                        $('.left_col').css('left', '-230px');
                        $('.bg-sidemenu').css('display', 'none');
                    } else {
                        $('.left_col').css('left', '0');
                        $('.bg-sidemenu').css('display', 'block');
                    }
                }

                /////////// Data Requests Handling Functions ///////////////

                var headers = {
                    'X-CSRF-Token': '<?= $this->request->getCookie('csrfToken') ?>',
                    '_Token': '<?= $this->request->getCookie('csrfToken') ?>',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
                var _doRequest = function (url, obj, method) {
                    !method ? method = 'get' : method;
                    !obj ? obj = null : obj;

                    if (url.indexOf('http') == -1) {
                        url.indexOf($scope.app_folder) > -1 ? url : url = $scope.app_folder + url
                    }

                    var requestObj = {
                        dataType: 'xhr',
                        method: method,
                        url: url,
                        data: obj,
                        headers: headers
                    }
                    // console.log('requestObj', requestObj)
                    return $http(requestObj)
                }

                // $scope.multiHandle = function (url, tar) {
                //     !tar ? tar = $scope.selected : tar;
                //     if (Object.keys(tar).length < 1) {
                //         return showPNote('<?= __('note-message') ?>', '<?= __('is-selected-empty-msg') ?>', 'error');
                //     } !url ? url = $scope.path + '/' + $scope.currlang : $scope.path + '/' + $scope.currlang + url;

                //     // console.log(tar)
                //     var msg = '<?= __('delete_selected_records') ?>';
                //     var method = "delete";

                //     if (url.indexOf('enable/1') > -1) {
                //         msg = '<?= __('enable_selected_records') ?>'
                //     }
                //     if (url.indexOf('enable/0') > -1) {
                //         msg = '<?= __('disable_selected_records') ?>'
                //     }
                //     if (url.indexOf('enable/2') > -1) {
                //         msg = '<?= __('sold_selected_records') ?>'
                //     }
                //     if (url.indexOf('assign/') > -1) {
                //         msg = '<?= __('assign_selected_records') ?>'
                //     }
                //     if (url.indexOf('assign/publish') > -1) {
                //         msg = '<?= __('publish_selected_records') ?>'
                //     }
                //     if (confirm(msg)) {

                //         var ids = Object.keys(tar).filter(function (k) {
                //             return tar[k] !== false;
                //         });
                //         // return console.log(ids.join())
                //         _doRequest(url + '/' + ids.join(), false, method).then(function (res) {
                //             if (res.data.redirect) {
                //                 window.location.href = res.data.redirect
                //             }
                //             if (res.data.status == "SUCCESS") {
                //                 $scope.selected = {}
                //                 showPNote('<?= __('note-message') ?>', res.data.msg || '<?= __('multi-handling-success') ?>', 'greenBg');
                //                 setTimeout(function () {
                //                     $scope.doGet('/admin/' + ctrl.toLowerCase() + '/index?list=1', 'list', ctrl.toLowerCase());
                //                 }, 100)
                //             } else {
                //                 showPNote('<?= __('note-message') ?>', res.data.msg || '<?= __('multi-handling-fail') ?>', 'redBg');
                //             }
                //         })
                //     }
                // }

                $scope.multiHandle = function (url, tar, _pid) {
                    !tar ? tar = $scope.selected : tar;
                    if (Object.keys(tar).length < 1) {
                        return showPNote('<?= __('note-message') ?>', '<?= __('is-selected-empty-msg') ?>', 'error');
                    } !url ? url = $scope.path + '/' + $scope.currlang : $scope.path + '/' + $scope.currlang + url;

                    // console.log(tar)
                    var msg = '<?= __('delete_selected_records') ?>';
                    var method = "delete";

                    if (url.indexOf('enable/1') > -1) {
                        msg = '<?= __('enable_selected_records') ?>'
                    }
                    if (url.indexOf('enable/0') > -1) {
                        msg = '<?= __('disable_selected_records') ?>'
                    }
                    if (url.indexOf('enable/2') > -1) {
                        msg = '<?= __('sold_selected_records') ?>'
                    }
                    if (url.indexOf('assign/') > -1) {
                        msg = '<?= __('assign_selected_records') ?>'
                    }
                    if (url.indexOf('assign/publish') > -1) {
                        msg = '<?= __('publish_selected_records') ?>'
                    }
                    if (confirm(msg)) {

                        var ids = Object.keys(tar).filter(function (k) {
                            return tar[k] !== false;
                        });
                        // return console.log(ids.join())
                        _doRequest(url + '/' + ids.join(), false, method).then(function (res) {
                            if (res.data.redirect) {
                                window.location.href = res.data.redirect
                            }
                            if (res.data.status == "SUCCESS") {
                                $scope.selected = {}
                                showPNote('<?= __('note-message') ?>', res.data.msg || '<?= __('multi-handling-success') ?>', 'greenBg');
                                if (ctrl == 'categories') {
                                    setTimeout(function () {
                                        $scope.doGet('/admin/' + ctrl.toLowerCase() + '/index/' + _pid + '?list=1', 'list', ctrl.toLowerCase());
                                    }, 100)
                                } else {
                                    setTimeout(function () {
                                        $scope.doGet('/admin/' + ctrl.toLowerCase() + '/index?list=1', 'list', ctrl.toLowerCase());
                                    }, 100)
                                }

                            } else {
                                showPNote('<?= __('note-message') ?>', res.data.msg || '<?= __('multi-handling-fail') ?>', 'redBg');
                            }
                        })
                    }
                }

                $scope.getCurrentDate = function () {
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();

                    return yyyy + '-' + mm + '-' + dd;
                };

                $scope.doGet = function (url, type, tar, preloader) {
                    !type ? type = 'list' : type;
                    !preloader ? preloader = '#main_preloader' : preloader;
                    if (preloader) {
                        _setCvrBtn(preloader, 1)
                    }
                    _doRequest(url, null, 'post').then(function (res) {

                        if (type == 'reload') {
                            location.reload();
                        }

                        if (res.data.redirect) {
                            window.location.href = res.data.redirect
                        }
                        if (preloader) {
                            _setCvrBtn(preloader, 0)
                        }
                        if (type == 'list') {
                            $scope.lists[tar] = angular.fromJson(res.data.data);
                            if (res.data.paging) {
                                $scope.paging = res.data.paging
                            }
                        } else {
                            $scope.rec[tar] = angular.fromJson(res.data.data);
                        }

                    })
                }

                var doGetTm;
                $scope.doGetDelay = function (url, type, tar, preloader, delay) {
                    !delay ? delay = 1500 : delay;
                    clearTimeout(doGetTm)
                    doGetTm = setTimeout(function () {
                        return $scope.doGet(url, type, tar, preloader)
                    }, delay);
                }

                $scope.doSave = function (orginialObj, tar, ctrl, btn, preloader, form) {
                    !tar ? tar = 'package' : tar;
                    !ctrl ? ctrl = '<?= strtolower($this->request->getParam("controller")) ?>' : tar;
                    !btn ? btn = false : btn;
                    !preloader ? preloader = false : preloader;
                    !form ? form = false : form;

                    var obj = {}
                    Object.assign(obj, orginialObj);

                    !obj.id ? obj.id = -1 : obj.id;

                    var defer = $q.defer();
                    var method = obj.id > -1 ? "PUT" : "POST";

                    // remove messages
                    _getErrors([], !form ? '#' + tar + '_form' : form);

                    if (preloader) {
                        _setCvrBtn(preloader, 1);
                    }

                    defer.resolve(
                        _doRequest('/admin/' + ctrl + '/save/' + obj.id, obj, method, 'save_' + tar + '_btn', 'save', tar + '_form')
                    )
                    var done = defer.promise;


                    done.then(function (res) {
                        if (preloader) {
                            _setCvrBtn(preloader, 0)
                        }
                        if (res.data.redirect) {
                            window.location.href = res.data.redirect
                        }
                        if (res.data.status == 'SUCCESS') {
                            if (ctrl == 'Sales' && tar == 'client') {

                            }
                            // alert('<?= __("save-success") ?>')
                            showPNote('<?= __("sys-msg") ?>', res.data.msg || '<?= __("save-success") ?>', "greenBg");

                            if (btn) {
                                doClick(btn);
                            }
                        } else {
                            // alert('<?= __("save-fail") ?>')
                            showPNote('<?= __("sys-msg") ?>', res.data.msg || '<?= __("save-fail") ?>', "redBg");
                            _getErrors(res.data.data, !form ? '#' + tar + '_form' : form);
                        }
                    })
                }

                $scope.doDelete = function (url, doUpdate) {
                    if (confirm("<?= __('delete_confirm') ?>")) {
                        _doRequest(url, {
                            id: url
                        }, "DELETE").then(function (res) {
                            if (res.data.redirect) {
                                window.location.href = res.data.redirect
                            }
                            if (res.data.status == 'SUCCESS') {
                                if (doUpdate) {
                                    doClick(doUpdate)
                                }
                            } else {
                                console.log(res.data)
                            }
                        })
                    }
                }

                $scope.delImage = function (url, image, doUpdate) {
                    if (confirm('<?= __('do_you_want_to_delete_image') ?>')) {
                        _doRequest(url, image, "DELETE").then(function (res) {
                            if (res.data.redirect) {
                                window.location.href = res.data.redirect
                            }
                            if (res.data.status == "SUCCESS") {
                                if (doUpdate) {
                                    doClick(doUpdate)
                                }
                                showPNote('<?= __('note-message') ?>', '<?= __('delete-image-success') ?>', 'greenBg');
                            } else {
                                showPNote('<?= __('note-message') ?>', '<?= __('delete-image-fail') ?>', 'redBg');
                            }
                        });
                    }
                }


                $scope.clearSearchFields = function () {
                    $scope.rec.search = null;
                };

                var doSearchUpdt;
                var lastSearch = '';
                $scope.doSearch = function (isPager) {

                    if (lastSearch == JSON.stringify($scope.rec.search)) {
                        return false;
                    }

                    $timeout.cancel(doSearchUpdt);
                    _setCvrBtn('#main_preloader', 1);
                    doSearchUpdt = $timeout(function () {

                        _doRequest('<?= $app_folder ?>/admin/' + ctrl + '?list=1', { search: $scope.rec.search }, 'post').then(function (res) {

                            lastSearch = JSON.stringify($scope.rec.search);

                            _setCvrBtn('#main_preloader', 0);

                            if (res.data.status == "SUCCESS") {
                                $scope.lists[ctrl] = res.data.data
                                if (res.data.paging) {
                                    $scope.paging = res.data.paging
                                }
                                isPager ? '' : showPNote('<?= __('note-message') ?>', '<?= __('search-success') ?>', 'greenBg');
                            } else {
                                showPNote('<?= __('note-message') ?>', '<?= __('search-fail') ?>', 'redBg');
                            }
                        })
                    }, 100);
                }

                // Conditions from query params
                if ('<?= $this->request->getQuery('msg') ? 1 : 0 ?>' === '1') { //_title, _msg, _type, _isHide, _delay
                    showPNote('<?= __('note-message') ?>', '<?= $this->request->getQuery('msg') ?>', 'warning', false, 10000);
                }

                if ('<?= $this->request->getQuery('view_rec') ? 1 : 0 ?>' == 1) {
                    var controller = '<?= $this->request->getParam('controller'); ?>';
                    controller = controller == 'Properties' ? 'Propertys' : controller;
                    $scope.doGet('<?= $app_folder ?>/admin/' + ctrl + '?id=<?= $this->request->getQuery('view_rec') ?>', 'rec', controller.substr(0, controller.length - 1).toLowerCase());
                    $scope.openModal('#view' + controller.substr(0, controller.length - 1) + '_mdl')
                }
                // PREVENT SESSION EXPIRE
                var refreshTime = 600000; // every 10 minutes in milliseconds
                $interval(function () {
                    _doRequest('/configs/refresher')
                }, refreshTime);
            });

            // DIRECTIVE //////////////////////////////////////////////////////
            app.directive('chk', function () {
                return {
                    scope: {
                        chk: '@'
                    },
                    link: function (scope, element, attrs, ctrl) {
                        element.bind('blur', onBlur);

                        function onBlur(ctrl) {
                            if (attrs.type == 'checkbox' || attrs.type == 'radio') {
                                var newid = attrs.id.substr(0, attrs.id.length - 1);
                                var elms = document.querySelectorAll('[id^=' + newid + ']');
                                for (var i in elms) {
                                    if (elms[i].checked == true) {
                                        return _setError(element[0], '', true);
                                    } else {
                                        _setError(element[0], errorMsg[scope.chk]);
                                    }
                                }
                            } else {
                                if (ptrn[scope.chk].test(element[0].value)) {
                                    _setError(element[0], '', true);
                                } else {
                                    _setError(element[0], errorMsg[scope.chk]);
                                }
                            }
                            scope.$apply();
                        }
                    }
                };

            });

            app.directive('faIcons', function ($http, $compile) {
                return {
                    restrict: 'AE',
                    link: function ($scope, elm, attr, ctrl) {

                        elm.bind("input", onChange);

                        function onChange() {
                            $http.get('<?= $app_folder ?>/webroot/js/fa4.json').then((data) => {
                                var html = '';
                                for (var i = 0; i < data.data.length; i++) {
                                    if (data.data[i].indexOf($scope.rec.category.category_configs.icon) > -1 || $scope.rec.category.category_configs.icon.length == 0) {
                                        html += `
                                        <a href="javascript:void(0);" ng-click="rec.category.category_configs.icon = '`+ data.data[i] + `'">
                                            <i class="fa `+ data.data[i] + `"></i>
                                        </a>`
                                    }
                                }
                                $('.icons_div').html($compile(html)($scope));
                            });
                        }
                    }
                }
            });

            app.directive('setIframe', function ($compile) {
                return {
                    restrict: 'AE',
                    link: function ($scope, elm, attr, ctrl) {
                        var iframe = $compile(`
                            <iframe width="100%" ng-src="https://www.youtube.com/embed/` + attr.setIframe + `" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        `)($scope);
                        $(elm).html(iframe)
                    }
                }
            });

            app.filter('urlcrypt', function () {
                return window.decodeURIComponent;
            });

            app.directive("showImg", function () {
                return {
                    link: function (scope, elm, attrs, ngModel) {
                        elm.bind('click', function (e) {

                            if (attrs.src.indexOf(".svg") > 0) {
                                return "";
                            }
                            if (attrs.src.indexOf("noimg") > 0) {
                                return "";
                            }

                            if (attrs.showImg != '') {

                                $('#slideHolder').attr("style", "opacity: 1; z-index:1111;");

                                var imgs_array = attrs.showImg.split(','),
                                    imgs = '';

                                var ctrl = !attrs.ctrl ? '<?= strtolower($this->request->getParam('controller')) ?>' : attrs.ctrl;

                                for (let img in imgs_array) {
                                    imgs += `
                                        <div class="carousel-item ` + (attrs.curr == imgs_array[img] ? 'active' : '') + `">
                                            <img class="" src="<?= $app_folder ?>/img/` + ctrl + `_photos/` + imgs_array[img] + `" />
                                        </div>
                                        `;
                                }

                                $('#slideHolder').html(`
                                    <i class="fa fa-times" aria-hidden="true" onClick="document.getElementById('slideHolder').setAttribute('style', 'opacity:0; visibility:hidden;')"></i>
                                    <div id="imgs_slider" class="carousel slide carousel-fade imgs_slider" data-ride="carousel">
                                        <div class="carousel-inner">
                                            ` + imgs + `
                                        </div>
                                        <a class="carousel-control-prev" href="#imgs_slider" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#imgs_slider" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                `);
                            } else {
                                $('#imgHolder').attr("style", "opacity: 1; z-index:1111;");
                                $('#imgHolder').html('<img src="' + attrs.src.replace("thumb/", "") + '"><i class="fa fa-times" aria-hidden="true"></i>');
                            }
                        })
                    }
                }
            });

            app.directive("removeTempHide", function () {
                return {
                    link: function (scope, elm, attrs) {
                        elm.removeClass('tempHide');
                    }
                }
            });

            app.directive("multiSelect", function ($timeout) {
                return {
                    link: function (scope, elm, attrs) {

                        $timeout(function () {

                            elm.selectpicker({
                                container: 'body'
                            });
                            $(elm).selectpicker('refresh');
                            elm.on('hide.bs.select', function (e) {
                                $(elm).selectpicker('refresh');
                                if (attrs.actn) {
                                    return eval(attrs.actn)
                                }
                            });

                        }, 1000)

                    }
                }
            })

            app.directive('clickOutside', function ($document) {
                return {
                    restrict: 'A',
                    link: function (scope, elem, attr, ctrl) {
                        elem.bind('click', function (e) {
                            e.stopPropagation();
                        });
                        $document.bind('click', function () {
                            scope.$apply(attr.clickOutside);
                        })
                    }
                }
            });

            app.directive('textareaExpander', function () {
                return {
                    restrict: 'AE',
                    require: 'ngModel',
                    link: function (scope, elm, attrs, ctrl) {
                        $(elm)[0].rows = !$(elm)[0].rows ? 1 : $(elm)[0].rows
                        ctrl.$parsers.unshift(function (viewValue) {
                            if ($(elm)[0].scrollHeight > $(elm)[0].offsetHeight) {
                                $(elm)[0].rows = $(elm)[0].rows + 1
                            }
                            return viewValue;
                        })
                    }
                };
            });

            app.directive('onlyNumbers', function () {
                return {
                    restrict: 'AC',
                    link: function (scope, el, attr, ctrl) {
                        el.bind('keypress', function (e) {
                            if (e.which != 8 && e.which != 13 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                _setError(el, '<?= __('only_numbers') ?>');
                                return false;
                            } else {
                                _setError(el, '');
                            }
                        })
                        el.bind('blur', function (e) {
                            let n_arr = attr.onlyNumbers.split('-'),
                                isError = false;
                            console.log(n_arr)
                            if (n_arr.length > 2) {
                                if (attr.onlyNumbers.indexOf($(el).val()) == -1) {
                                    isError = true;
                                }
                            }
                            if (n_arr.length == 2) {
                                if ($(el).val() < n_arr[0] * 1 || $(el).val() > n_arr[1] * 1) {
                                    isError = true;
                                }
                            }
                            if (isError) {
                                _setError(el, '<?= __('number_should_between') ?> ' + attr.onlyNumbers);
                                return false;
                            }
                        })
                    }
                }
            });


            app.directive('fileModel', ['$parse', function ($parse) {
                return {
                    restrict: 'A',
                    link: function ($scope, element, attrs) {
                        var model = $parse(attrs.fileModel);
                        var modelSetter = model.assign;

                        element.bind('change', function (changeEvent) {

                            var total_upload_size = 0;
                            angular.forEach(changeEvent.target.files, function (itm, k) {

                                if ($scope.filesInfo[attrs.name] === undefined || $scope.filesInfo[attrs.name] == null) {
                                    $scope.filesInfo[attrs.name] = []
                                }

                                // prepare file info
                                var reader = new FileReader();

                                reader.onload = function (loadEvent) {
                                    // upload files docs
                                    if (attrs.name == 'doc_file') {
                                        $scope.$apply(function () {
                                            $scope.filesInfo[attrs.name].push({
                                                lastModified: itm.lastModified,
                                                lastModifiedDate: itm.lastModifiedDate,
                                                name: itm.name,
                                                size: itm.size,
                                                type: itm.type,
                                                tmp_name: loadEvent.target.result
                                            });
                                        });

                                        // upload images
                                    } else {

                                        var image = new Image();
                                        image.src = loadEvent.target.result;

                                        image.onload = function () {
                                            let dim = this.height > this.width ? this.height : this.width;
                                            total_upload_size += (itm.size / 1024 / 1024)
                                            if (total_upload_size > 10) {
                                                showPNote('<?= __('note-message') ?>', '<?= __('exceeded_uploading_size') ?>', 'redBg', true, 15000);
                                                return;
                                            }
                                            if (dim < 650) { // check if very small photo
                                                showPNote('<?= __('note-message') ?>', itm.name + ' <?= __('file-too-small') ?>', 'redBg');
                                            } else if ((itm.size / 1024 / 1024) > 5) { // check if photo bigger than 1.5 mb
                                                showPNote('<?= __('note-message') ?>', itm.name + ' <?= __('file-too-big') ?>', 'redBg');
                                            } else {
                                                $scope.$apply(function () {
                                                    $scope.filesInfo[attrs.name].push({
                                                        lastModified: itm.lastModified,
                                                        lastModifiedDate: itm.lastModifiedDate,
                                                        name: itm.name,
                                                        size: itm.size,
                                                        type: itm.type,
                                                        tmp_name: loadEvent.target.result
                                                    })
                                                });
                                            }
                                        };
                                    }

                                }
                                reader.readAsDataURL(itm);
                                // prepage file upload
                                $scope.$apply(function () {
                                    modelSetter($scope, [element[0].files[k]]);
                                });

                            })

                        })
                    }
                };
            }]);

            app.directive('setChart', function ($timeout) {
                return {
                    restrict: 'A',
                    link: function (scope, elem, attr, ctrl) {

                        var addSeperator = function (n) {
                            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                        }
                        var chart, ctx;
                        scope.$watch('rec.stats', function (old, newVal) {

                            var type = !attr.setChart ? 'pie' : attr.setChart;
                            var dt = scope.rec.dashboard.stats[attr.dt];
                            var unit = !attr.unit ? '<?= __('user') ?>' : attr.unit;

                            var clrs = scope.clrs;
                            var dtSet = [];
                            var allLabels = [];
                            var vals = [];

                            var height = document.body.clientHeight;
                            var width = document.body.clientWidth;

                            if (!dt) {
                                return false;
                            }

                            if ('bar,line'.indexOf(type) > -1) {
                                for (var i = 0; i < dt.items.length; i++) {
                                    for (var j = 0; j < dt.items[i].labels.length; j++) {
                                        if (allLabels.indexOf(dt.items[i].labels[j]) == -1) {
                                            allLabels.push(dt.items[i].labels[j]);
                                        }
                                    }
                                    dtSet.push({
                                        label: dt.items[i].label,
                                        data: dt.items[i].values,
                                        borderColor: clrs[i], //type == 'line' ? false : clrs,,
                                        backgroundColor: type == 'line' ? false : clrs[i]
                                    })
                                }
                            } else {
                                allLabels = dt.labels
                                dtSet = [{
                                    label: dt.label,
                                    data: dt.values,
                                    backgroundColor: clrs
                                }]
                            }
                            var options = {
                                type: type, //bar,pie,doughnut,polarArea,bubble,scatter,radar
                                data: {
                                    labels: allLabels,
                                    backgroundColor: '#fff',
                                    datasets: dtSet
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    },
                                    responsive: true,
                                    legend: {
                                        // display: width < 1200 ? false : true,
                                        position: 'bottom',
                                    },
                                    tooltips: {
                                        callbacks: {
                                            label: function (tooltipItems, data) {
                                                if ('bar,line'.indexOf(type) === -1) {
                                                    var content = [
                                                        data.labels[tooltipItems.index],
                                                        addSeperator(data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index]) + ' ' + unit,
                                                    ]
                                                    return content;
                                                } else {
                                                    var content = [
                                                        data.datasets[tooltipItems.datasetIndex].label,
                                                        addSeperator(data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index]) + ' ' + unit,
                                                    ]
                                                    return content;
                                                }
                                            }
                                        }
                                    },
                                }
                            }

                            if (chart) {
                                chart.destroy();
                            }
                            ctx = document.getElementById(elem[0].id).getContext('2d');
                            chart = new Chart(ctx, options);
                            if (JSON.stringify(old) !== JSON.stringify(newVal)) {
                                chart.update()
                            }

                        });
                    }
                }
            });

            // app.filter('phoneFormat', function () {
            //     return function (phoneNumber) {
            //         if (!phoneNumber) return '';

            //         // Assuming the phone number is in the format XXXXXXXXXX (10 digits)
            //         const phoneStr = phoneNumber.toString();
            //         return phoneStr.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
            //     };
            // });


            app.directive('setRequired', function () {
                return {
                    link: function (scope, element, attrs, ngModel) {
                        if (attrs.setRequired == 'msg') {
                            return $(element).html(' <i class="fa redText fa-asterisk"></i> <?= __('red_star_required_fields') ?>');
                        }
                        var val = $(element).html();
                        $(element).html(val + ' <i class="fa redText fa-asterisk"></i>')
                    }
                }
            });

            app.directive('setProgressWidth', function () {
                return {
                    link: function (scope, el, attrs, ngModel) {
                        var arr = attrs.setProgressWidth.split(',');
                        var val = arr[attrs.ind];
                        $(el).attr('style', 'width: ' + scope.getPercentage(arr, val) + '%; background:' + scope.clrs[attrs.ind]);
                    }
                }
            });

            app.directive('dateFormat', function () {
                return {
                    require: 'ngModel',
                    link: function (scope, elm, attrs, ctrl) {
                        ctrl.$formatters.push(function (data) {
                            return new Date(data);
                        });
                        ctrl.$parsers.push(function (data) {
                            return _setDate(new Date(data))
                        });
                    }
                };
            });


            app.directive('chartDirective', function () {
                return {
                    restrict: 'A',
                    scope: {
                        chartType: '@',
                        data: '=' // Two-way data binding for passing data
                    },
                    link: function (scope, element, attrs) {
                        var chart;

                        scope.$watch('data', function (newData, oldData) {
                            if (chart) {
                                chart.destroy();
                            }

                            if (newData) {

                                var ctx = element[0].getContext('2d');
                                chart = new Chart(ctx, {
                                    type: attrs.chartType,
                                    data: newData,
                                    options: {
                                        aspectRatio: attrs.chartType === 'doughnut' ? 2 : attrs.chartType === 'bar ' ? maintainAspectRatio : false, responsive: true,
                                    },
                                    responsive: true
                                });


                            }
                        });
                    }
                };
            });


            app.directive('nFormat', function () {
                return {
                    require: 'ngModel',
                    link: function (scope, elm, attrs, ctrl) {
                        ctrl.$formatters.push(function (modelValue) {
                            return nFormat(modelValue, attrs.unit);
                        });

                        ctrl.$parsers.push(function (viewValue) {
                            var plainNumber = viewValue.replace(/[^\d]/g, '');
                            elm.val(nFormat(plainNumber, attrs.unit));
                            return parseFloat(plainNumber);
                        });

                        ctrl.$render = function () {
                            elm.val(nFormat(ctrl.$modelValue, attrs.unit));
                        };

                        attrs.$observe('unit', function (newValue) {
                            ctrl.$render();
                        });
                    }
                };
            });

            app.directive('formatCurrency', function () {
                return {
                    scope: {
                        amount: '=formatCurrency'
                    },
                    template: '{{ formattedAmount }}',
                    link: function (scope) {
                        const threshold = 1000;

                        scope.$watch('amount', function (newValue) {
                            if (Math.abs(newValue) < threshold) {
                                scope.formattedAmount = newValue;
                            } else if (Math.abs(newValue) < threshold * threshold) {
                                scope.formattedAmount = (newValue / threshold).toFixed(1) + 'K';
                            } else {
                                scope.formattedAmount = (newValue / (threshold * threshold)).toFixed(1) + 'M';
                            }
                        });
                    }
                };
            });

            app.directive('myTooltip', function () {
                return {
                    restrict: 'A',
                    link: function (scope, element, attrs) {
                        $(element).tooltip({
                            title: attrs.myTooltip,
                            placement: 'top'
                        });
                    }
                };
            });

            app.directive('valueChecker', function ($compile, $interval) {
                return {
                    restrict: 'A',
                    link: function (scope, element, attrs) {
                        // İlk değeri al
                        var value = scope.$eval(attrs.valueChecker);
                        renderValue(value);

                        // Belirli bir aralıkta değeri kontrol et
                        var intervalPromise = $interval(function () {
                            var newValue = scope.$eval(attrs.valueChecker);

                            // Değer değiştiyse güncelle
                            if (!angular.equals(value, newValue)) {
                                value = newValue;
                                renderValue(value);
                            }
                        }, 1000); // Her saniyede bir kontrol et, istediğiniz aralığı belirleyebilirsiniz.

                        // Sayfa veya scope destroy edildiğinde interval'ı temizle
                        scope.$on('$destroy', function () {
                            $interval.cancel(intervalPromise);
                        });

                        function renderValue(value) {
                            console.log(value);

                            if (angular.isObject(value) || angular.isArray(value)) {
                                // Eğer value bir object veya array ise, içerisindeki key-value'ları görüntüle
                                var innerHtml = '<div class="text-danger">';
                                angular.forEach(value, function (innerValue, innerKey) {
                                    innerHtml += '<p >';
                                    renderKeyValue(innerKey, innerValue);
                                    innerHtml += '</p>';
                                });
                                innerHtml += '</div>';

                                // Yeni HTML'i compile et ve elementin içine ekle
                                element.html(innerHtml);
                                $compile(element.contents())(scope);
                            } else {
                                // Değer object veya array değilse sadece değeri görüntüle
                                element.text(value);
                            }
                        }

                        function renderKeyValue(key, value) {
                            if (angular.isObject(value) || angular.isArray(value)) {
                                // Eğer value bir object veya array ise, içerisindeki key-value'ları görüntüle
                                element.append('<div>' + key + ':</div>');
                                element.append('<div value-checker="' + value + '"></div>');
                            } else {
                                // Değer object veya array değilse sadece key:value olarak yazdır
                                element.append('<div>' + key + ': ' + value + '</div>');
                            }
                        }
                    }
                };
            });

            // if(getBrowser() == 'safari'){
            //     $('.wb-ele-select').addClass('safari_input_padding');


            // }

            // if (getBrowser() == 'safari') {
            //     $('.wb-ele-select').addClass('safari_input_padding');

            //     // Safari için özel CSS stilini ekleyin
            //     var safariCss = {
            //         'background-color': 'white',
            //         'border': '1px solid #282828',
            //         'display': 'flex',
            //         'font-weight': '400',
            //         'align-items': 'center',
            //         'gap': '10px',
            //         'border-radius': '9px',
            //         'padding': '10px 6px',
            //         'font-size': '15px',
            //         'width': '121px',
            //         'white-space': 'nowrap',
            //         'overflow': 'hidden',
            //         'margin': '3px'
            //     };

            //     $('.safari_input_padding').css(safariCss);
            // }


            // $(document).bind('keyup', function(e) {
            //     if (e.keyCode==39) {
            //         $('.carousel-control-next-icon').trigger('click');
            //     }else if(e.keyCode==37){
            //         $('.carousel-control-prev-icon').trigger('click');
            //     }
            // });

        })()
    </script>

</body>

</html>