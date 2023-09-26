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
    <?php echo $this->Html->css('ng-tags-input')
        ?>
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

    <?= $this->element("header"); ?>
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
    <?php echo $this->Html->script('ng-tags-input.min')
        ?>
    <!-- Angular Sanitize -->
    <?php echo $this->Html->script('angular-sanitize.min') ?>
    <!-- Angular Animate -->
    <?php echo $this->Html->script('angular-animate.min') ?>
    <!-- Bootstrap -->
    <?php echo $this->Html->script('bootstrap.bundle.min.js') ?>
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
            <script src="https://maps.googleapis.com/maps/api/js?key=<?= $gmapKey ?>&sensor=false&libraries=places&language=en"></script>
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
        
        
        var _getExt = function(fileext) {
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

        var _setError = function(elm, msg, clr) {

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

        var _getErrors = function(obj, form_name) {
            (form_name[0] == '#' || form_name[0] == '.') ? form_name: form_name = '#' + form_name;
            $(".error-message").text('');
            for (var prop in obj) {
                var value = obj[prop];
                if (typeof obj[prop] !== 'object') {
                    continue;
                }
                var arr = $.map(value, function(val, index) {
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
        var showPNote = function(_title, _msg, _type, _isSticky, _delay) {
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

        var _setDate = function(dt, p, flag) {
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

        var _filter = function(val) {
            if (typeof(val) != "string") return val;
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

        var nFormat = function(v, _unit, _round) {
            !_unit ? _unit = '' : _unit;
            if (!v) {
                return 0
            };
            var res = Math.floor(v).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            if (v > 9999) {
                res = res.slice(0, -3) + '000';
            }
            return res + ' ' + _unit;
        };

        var _setCvrBtn = function(tar, param, icon) {
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
        var doClick = function(tar, delay) {
            tar[0] == '#' || tar[0] == '.' || tar[0] == '[' ? tar : '#' + tar;
            !delay ? delay = 1 : delay;
            clearTimeout(doClickUpdt)
            doClickUpdt = setTimeout(function() {
                return $(tar).click()
            }, delay);
        }

        var playSound = function(url) {
            var audio = new Audio('<?= $path ?>/' + url);
            audio.play();
        }

        var DtSetter = function(tar, val, val2) {
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
                'sale_priorities': JSON.parse('<?= json_encode($this->Do->get('sale_priorities')) ?>'),
                'sale_current_stage': JSON.parse('<?= json_encode($this->Do->get('sale_current_stage')) ?>'),
                'rec_stateSale': JSON.parse('<?= json_encode($this->Do->get('rec_stateSale')) ?>'),
                'report_priorities': JSON.parse('<?= json_encode($this->Do->get('report_priorities')) ?>'),
                

            }

            if (tar == 'rec_stateSale') {
                // console.log(val2);
                if(val && val2){
                    return defines[val2];
                }
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


        var getBrowser = function() {
            var browsers = {}
            // Opera 8.0+
            browsers.opera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
            // Firefox 1.0+
            browsers.firefox = typeof InstallTrigger !== 'undefined';
            // Safari 3.0+ "[object HTMLElementConstructor]" 
            browsers.safari = /constructor/i.test(window.HTMLElement) || (function(p) {
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
        (function() {

            var __ = this;

            var app = angular.module('app',
                ['ngAnimate', 'ngSanitize', 'ngTagsInput']
            ); //, 'gm', '' 'ckeditor', 'ngTagsInput', 'cur.$mask'
            app.controller('ctrl', function($scope, $http, $location, $timeout, $q, $compile, $filter, $interval, $window) {
    
                
                this.preSaveConvertTagsArToStringAr = function(){
                    var tmpAr = this.tags; //data bound var
                    var nwAr = [];
                    angular.forEach(tmpAr,function(ob){
                        nwAr.push(ob.text);
                    });
                    console.log("my new value array: ["+nwAr.join(',')+"]");
                };
    
                $scope._formatDate = function(dt) {
                    var formattedDate = _setDate(dt, [0, 0, 0, 0, 0, 0], 'onlydate');
                    $scope.rec.book.book_meetdate = formattedDate;
                };
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
                    category: {category_priority:99},
                    client: {},
                    sale: {},
                    permission:{
                        permission_c: 0, 
                        permission_r: 0,
                        permission_u: 0,
                        permission_d: 0,
                    },
                    book: {}, 
                }

                $scope.rec = {
                    category: rec_origin.category,
                    content: rec_origin.content,
                    client: rec_origin.client,
                    permission: rec_origin.content,
                    sale: rec_origin.sale,
                    book: rec_origin.book,
                    
                };


                $scope.parseDateTime = function(dateTimeString) {
                    var dateTimeParts = dateTimeString.split(' ');
                    return {
                        date: dateTimeParts[0],
                        time: dateTimeParts[1]
                    };
                };



                    // Toggle Mobile Sidebar
                    $scope.toggleSidebar = function () {
                        document.querySelector(".sidebar").classList.toggle("active");
                    };

                    // TAG INPUT
                    $scope.loadTags = function(query, target, parent) {
                        return $http.get('<?= $app_folder ?>/admin/'+target+'?tags=1&keyword='+query+'&parent='+parent)
                        .then(function(response, status) {
                            return response.data.data;
                        });
                    };
                    $scope.loadAdvisors = function (query) {
                        return $http.get("/advisors?query=" + query);
                    };

                    // This function creates or removes Elements based on stat, element, and tar
                    $scope.inlineElement = function (tar, stat, element) {
                        
                        $(".inlineElement").parent().html("");
                        if (stat === 1) {
                            let elementsCreated = "";
                            if (element === "empathy") {
                                elementsCreated = $compile(`
                    <form action="" class="row inlineElement">
                    <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Verbal Expressions </span>
                        <textarea
                        class="wb-txt-inp"
                        name=""
                        id=""
                        cols="30"
                        rows="3"
                        placeholder=" What The Client Says "
                        ></textarea>
                    </label>
                    <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Inner Thoughts </span>
                        <textarea
                        class="wb-txt-inp"
                        name=""
                        id=""
                        cols="30"
                        rows="3"
                        placeholder="What the client thinks"
                        ></textarea>
                    </label>
                    <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Observable Actions </span>
                        <textarea
                        class="wb-txt-inp"
                        name=""
                        id=""
                        cols="30"
                        rows="3"
                        placeholder="What the client does"
                        ></textarea>
                    </label>
                    <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Emotional Responses </span>
                        <textarea
                        class="wb-txt-inp"
                        name=""
                        id=""
                        cols="30"
                        rows="3"
                        placeholder="What the client feels"
                        ></textarea>
                    </label>
                
                    <div class="down-btns mt-4 d-flex justify-content-end">
                            <div class="flex-gap-10 ">
                                <button class="btn btn-danger" id="" type="button"> Save Changes </button>
                            </div>
                        </div>
                        </form>
                        `)($scope);
                            } else if (element === "contact-setting") {
                                elementsCreated = $compile(`
                                <button type="button" id="client_btn" class="hideIt" 
                                ng-click="doGet('/admin/clients/index?list=1', 'list', 'clients');   
                                rec.client = {}; doClick('.close');">
                                </button>
                    <form action="" class="row  inlineElement" ng-submit="
                    doSave(rec.client, 'client', 'clients', '#client_btn', 
                '#client_preloader');">
                    
                    <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> <?= __('client_id') ?> </span>
                        <tags-input 
                                ng-model="rec.sale.client.client_name" 
                                add-from-autocomplete-only="true" 
                                max-tags="1" 
                                placeholder="<?= __('client_id') ?>" 
                                display-property="text"
                                key-property="value"
                            >
                                <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'clients', 0)"></auto-complete>
                            </tags-input>                   
                        </label>
                    <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Phone </span>
                        <input type="text" ng-model="rec.sale.client.client_mobile" class="wb-txt-inp" name="" id=""  />
                    </label>
                    <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Email </span>
                        <input type="text" ng-model="rec.sale.client.client_email" class="wb-txt-inp" name="" id=""  />
                    </label>
                    <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Country </span>
                        <input type="text" ng-model="rec.sale.client.adrs_country" class="wb-txt-inp" name="" id=""  />
                    </label>
                    <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Inquiry </span>
                        <input type="text" class="wb-txt-inp" name="" id=""  />
                    </label>
                        <label for="" class="col-md-6 col-12 col-lg-3">
                            <span class="sm-txt"> Source </span>
                            
                            <input type="text" ng-model="rec.sale.source_id" class="wb-txt-inp"   />
                        </label>
                        <label for="" class="col-md-6 col-12 col-lg-3">
                            <span class="sm-txt"> Last Activity </span>
                            <input type="text" class="wb-txt-inp" name="" id=""  />
                        </label>
                         <div class="down-btns mt-4 d-flex justify-content-end">
                                                <div class="flex-gap-10 ">
                                                    <button class="btn btn-danger" id="client_preloader"type="button"> Save Changes </button>
                                                </div>
                                            </div>
                        </form>
                        `)($scope);
                            } else if (element === "assign") {
                                elementsCreated = $compile(`
                    <form action="" class="row  inlineElement">
                    <label for="" class="col-12 col-sm-3">
                        <span class="sm-txt"> Advisor </span>
                        <!-- <select class="wb-ele" id=""><option value="option">Noor Hassan</option><option value="option">Option</option><option value="option">Option</option></select> -->
                        <tags-input
                        class="wb-txt-inp"
                        ng-model="advisors"
                        tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
                        >
                        <auto-complete
                            source="loadAdvisors($query)"
                        ></auto-complete>
                        </tags-input>
                    </label>
                    <label for="" class="col-12 col-sm-3">
                        <span class="sm-txt"> Priority </span>
                        <select class="wb-ele" id="">
                        <option value="option">
                            <div class="priority">
                            <em class="high"></em> High
                            </div>
                        </option>
                        <option value="option">
                            <div class="priority">
                            <em class="low"></em> Low
                            </div>
                        </option>
                        <option value="option">
                            <div class="priority">
                            <em class="med"></em> Medium
                            </div>
                        </option>
                        </select>
                    </label>
                    <div class="col-12 col-sm-1"></div>
                    <div class="col-12 col-sm-5">
                        <div
                        class="flex-gap-10 justify-content-end align-items-center"
                        >
                        <label class="switch">
                            <input id="snoose1" type="checkbox" />
                            <span class="slider round"></span>
                        </label>
                        <label for="snoose1"> Snoose </label>
                        </div>
                    </div>
                    <div class="down-btns mt-4 d-flex justify-content-end">
                                                <div class="flex-gap-10 ">
                                                    <button class="btn btn-danger" type="button"> Save Changes </button>
                                                </div>
                                            </div>
            
                        </form>
                        `)($scope);
                            } else if (element === "notes") {
                                elementsCreated = $compile(`

                                <button type="button" 
                            class="close" data-dismiss="modal" 
                            aria-hidden="true" id="report_btn"

                            ng-click="doGet('/admin/sales/index?list=1', 'list', 'sales');"></button>
                        
                    <form action="" class="   inlineElement note" 
                    
                    ng-submit="
                    rec.report.tar_id = rec.sale.id; 
                    rec.report.tar_tbl = 'Sales'; 
                    <!--rec.report.status_id = '';-->
                    doSave(rec.report, 'report', 'reports', '#report_btn', '#report_preloader');">


                    <div class='row'>
                    <!--<label for="" class=" col-md-3 col-12 ">
                    <span class="sm-txt"> Name </span>
                    <input
                        class="wb-txt-inp"
                        type='text'
                        
                        placeholder="Name"
                    / >
                    </label>-->
                    <label for="" class=" col-md-3 col-12 ">
                    <span class="sm-txt"> Type </span>
                    <?= $this->Form->control('category_id', [
                        'class' => 'form-control has-feedback-left wb-ele',
                        'label' => false,
                        'type' => 'select',
                        'options' => $options['Report Type'],
                        'empty' => 'Please Select',
                        'ng-model' => 'rec.report.report_type',
                    ]) ?> 
                    </label>
                    <!-- <label for="" class=" col-md-3 col-12 ">
                    <span class="sm-txt"> Time </span>
                    <input
                        class="wb-txt-inp pt-1"
                        type='time'
                    / >
                    </label>
                    <label for="" class=" col-md-3 col-12 ">
                    <span class="sm-txt"> Date </span>
                    <input
                        class="wb-txt-inp"
                        type='date'
                    / >
                    </label>-->

                    <label for="" class=" col-12 ">
                    <span class="sm-txt"> Note </span>
                    <textarea
                        ng-model = "rec.report.report_text"
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
                            <div class="flex-gap-10 ">
                                <button class="btn btn-danger" id="report_preloader" type="button"> Save Changes </button>
                            </div>
                        </div>

                        </form>
                        `)($scope);
                            } else if (element === "booking") {
                                elementsCreated = $compile(`

                            <form action="" class="row inlineElement">
                            
                            
                            <label for="" class="col-md-6 col-12 col-lg-4">
                                <span class="sm-txt"> Booking Meet Place </span>
                                <input type="text" max ng-model="rec.sale.books[0].book_meetplace" class="wb-ele" id="" />
                            </label>
                            <label for="" class="col-md-6 col-12 col-lg-4">
                                <span class="sm-txt"> Booking Meet Period </span>
                                <input type="text" max="99" min="1" ng-model="rec.sale.books[0].book_meetperiod" class="wb-ele" id="" />
                            </label>
                            <label for="" class="col-md-6 col-12 col-lg-4">
                                <span class="sm-txt"> Client Current Stay </span>
                                <input type="text" ng-model="rec.sale.books[0].book_current_stay" class="wb-ele" id="" />
                            </label>
                            <label for="" class="col-md-6 col-12 col-lg-4">
                                <span class="sm-txt"> Booking Time </span>
                                <input type="time" ng-model="rec.sale.books[0].book_meetdate"  class="wb-ele" id="" />
                            </label>
                            <label for="" class="col-md-6 col-12 col-lg-4">
                                <span class="sm-txt"> Booking Date </span>
                                <input type="date" ng-model="rec.sale.books[0].stat_created.split(' ')[0]" class="wb-ele p-2 ps-3" id="" />
                            </label>
                
                            <div class="down-btns mt-4 d-flex justify-content-end">
                            <div class="flex-gap-10 ">
                                <button class="btn btn-danger" id="" type="button"> Save Changes </button>
                            </div>
                        </div>
            
                        </form>
                        `)($scope);
                            } else if (element === "deal1") {
                                elementsCreated = $compile(`
                        <form action="" class="row   inlineElement">

                        <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Field Consultant </span>
                        <select class="wb-ele" id="">
                        <option  disabled selected hidden> Please Select </option>
                        <option value="option">Option</option>
                        <option value="option">Option</option>
                        </select>
                        </label>
                        <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Booking Date </span>
                        <input type="date" class="wb-ele" name="" id="" />
                        </label>
                        <label for="" class="col-md-6 col-12 col-lg-3">
                        <span class="sm-txt"> Booking Time </span>
                        <input type="time" class="wb-ele" name="" id="" />
                        </label>
                        <div class="down-btns mt-4 d-flex justify-content-end">
                            <div class="flex-gap-10 ">
                                <button class="btn btn-danger" id="" type="button"> Save Changes </button>
                            </div>
                        </div>
                        </form>
                        `)($scope);
                            } else if (element === "region") {
                                elementsCreated = $compile(`
                    <form action="" class="row inlineElement">
                    <label  class="col-md-6 col-12 col-lg-3">
                    <span class="sm-txt"> Region </span>
                    <input type="text" class="wb-txt-inp" id="" placeholder="Enter" />
                    </label>
                    <label  class="col-md-6 col-12 col-lg-3">
                    <span class="sm-txt"> Address </span>
                    <input type="text" class="wb-txt-inp" id="" placeholder="Enter" />
                    </label>
                    <div class="down-btns mt-4 d-flex justify-content-end">
                            <div class="flex-gap-10 ">
                                <button class="btn btn-danger" id="" type="button"> Save Changes </button>
                            </div>
                        </div>
                    </form>
                        `)
                        ($scope);
                            } else if (element === "reservation") {
                                elementsCreated = $compile(`
                                <form class="row inlineElement">
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Reservation </span>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas-dollar"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-lira-sign"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-try"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-euro"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <input type="text"  class="form-control" ng-model="rec.sale.reservations[0].reservation_amount" aria-label="Text input with dropdown button" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Sale Price </span>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas-dollar"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-lira-sign"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-try"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-euro"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <input type="text"  ng-model="rec.sale.reservations[0].reservation_price" class="form-control" aria-label="Text input with dropdown button" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Payment Type </span>
                                                    <?= $this->Form->control('category_id', [
                                                        'class' => 'form-control has-feedback-left wb-ele',
                                                        'label' => false,
                                                        'type' => 'select',
                                                        'options' => $options['Payment Type'],
                                                        'empty' => 'Please specify',
                                                        'ng-model' => 'rec.sale.reservations[0].reservation_paytype',
                                                    ]) ?>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Developer Name </span>
                                                <input type="text"   class="wb-txt-inp" placeholder="Enter" />
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Unit Type </span>
                                                <input type="text"   class="wb-txt-inp" placeholder="Please specify" />
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Unit Information </span>
                                                <input type="text"  ng-model="rec.sale.sale_units" class="wb-txt-inp" placeholder="Please specify" />
                                            </div>
                                             
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Commission </span>
                                                <div type="text"  ng-model="rec.sale.reservations[0].reservation_comission" class="wb-txt-inp" placeholder="% Please specify">{{rec.sale.reservations[0].reservation_comission}}</div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Down Payment </span>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas-dollar"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-lira-sign"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-try"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-euro"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <input type="text"  ng-model="rec.sale.reservations[0].reservation_downpayment" class="form-control" aria-label="Text input with dropdown button" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Downpaymnet Date </span>
                                                <div class="wb-ele">
                                                    <img src="\crm\webroot\img\datepicker.png" alt="" /> 
                                                    <div   ng-model="">{{rec.sale.reservations[0].reservation_downpayment_date.split(' ')[0]}}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 col-lg-3">
                                                <span class="sm-txt"> Installments </span>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas-dollar"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-lira-sign"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-try"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-center text-dark" href="#">
                                                                <i class="fas-euro"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <input type="text"  class="form-control" aria-label="Text input with dropdown button" />
                                                </div>
                                            </div>
                                            <div class="down-btns mt-4 d-flex justify-content-end">
                                                <div class="flex-gap-10 ">
                                                    <button class="btn btn-danger" type="button"> Save Changes </button>
                                                </div>
                                            </div>
                                        </form>
                        `)
                        ($scope);
                            } else if (element === "finance") {
                                elementsCreated = $compile(`
                                <button type="button" id="sale_btn" class="hideIt" 
                                    ng-click="doGet('/admin/sales/index?list=1', 'list', 'sales');   
                                    ">
                                </button>
                                <form class="row" ng-submit="
                                doSave(rec.sale, 'sale', 'sales', '#sale_btn', '#sale_preloader');">
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input 
                                                    ng-model="rec.sale.sale_finance" 
                                                    name="finance" 
                                                    ng-value = "'187'" 
                                                    name="finance" 
                                                    id="finance-client1" 
                                                    type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="finance-client1"> Finances in Place </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input 
                                                    ng-model="rec.sale.sale_finance" 
                                                    name="finance" 
                                                    ng-value = "'188'" 
                                                    id="payment-client1" 
                                                    type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="payment-client1"> All cash payment </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input 
                                                    ng-model="rec.sale.sale_finance" 
                                                    name="finance" 
                                                    ng-value = "'189'" 
                                                    name="finance" 
                                                    id="Ready-client1" 
                                                    type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="Ready-client1"> Ready to buy now </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 col-lg-3">
                                            <div class="flex-center text-center">
                                                <label class="switch">
                                                    <input 
                                                    ng-model="rec.sale.sale_finance" 
                                                    name="finance" 
                                                    ng-value = "'190'" 
                                                    name="finance" 
                                                    id="present-client1" 
                                                    type="radio" />
                                                    <span class="slider round"></span>
                                                </label>
                                                <label for="present-client1"> Decision maker is present </label>
                                            </div>
                                        </div>

                                        <div class="down-btns mt-4 d-flex justify-content-end">
                                            <div class="flex-gap-10 ">
                                                <button class="btn btn-danger" id="sale_preloader" type="button"> Save Changes </button>
                                            </div>
                                        </div>
                                        
                                    </form>
                        `)
                        ($scope);
                            } else if (element === "info") {
                                elementsCreated = $compile(`
                                <form class="row" >
                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> Segment </span> 
                                            <?= $this->Form->control('category_id', [
                                                'class' => 'form-control has-feedback-left wb-ele',
                                                'label' => false,
                                                'type' => 'select',
                                                'options' => $options['Type'],
                                                'empty' => 'Please Select',
                                                'ng-model' => 'rec.sale.category_id',
                                            ]) ?> 
                                        </label>
                                        
                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('sale_tags') ?> </span>
                                            <tags-input ng-model="rec.sale.sale_tags" class="wb-txt-inp" tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                                <auto-complete min-length="1" source="loadTags($query, 'categories', 40)"></auto-complete>
                                            </tags-input>
                                        </label>
                                        
                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('sale_budget') ?> </span>
                                            <div class="input-group">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas-dollar"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item text-center text-dark" href="#">
                                                            <i class="fas-lira-sign"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-center text-dark" href="#">
                                                            <i class="fas-try"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-center text-dark" href="#">
                                                            <i class="fas-euro"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <input ng-model="rec.sale.sale_budget" class="form-control" value="400k" type="text" />
                                            </div>
                                            </label>
                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('salespec_propertytype') ?> </span> 
                                            <tags-input ng-model="rec.sale.sale_specs[0].salespec_propertytype" display-property="text" key-property="value" class="wb-txt-inp" tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                                    <auto-complete min-length="1" source="loadTags($query, 'categories', 159)"></auto-complete>
                                                </tags-input>
                                        </label>
                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"><?= __('salespec_beds') ?></span>
                                            <tags-input ng-model="rec.sale.sale_specs[0].salespec_beds" display-property="text" key-property="value" class="wb-txt-inp" tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}">
                                                <auto-complete min-length="1" source="loadTags($query, 'categories', 183)"></auto-complete>
                                            </tags-input>
                                        </label>
                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"><?= __('place_of_stay') ?></span>
                                            <div class="row" >
                                                <div class="col-6 place_1">
                                                <?= $this->Form->control('category_id', [
                                                    'class' => 'form-control has-feedback-left wb-txt-inp',
                                                    'label' => false,
                                                    'type' => 'select',
                                                    // 'options' => $optionsLoc['City'],
                                                    'empty' => 'Please Select',
                                                    'ng-model' => '',
                                                ]) ?>
                                                </div>
                                                <div class="col-6 place_2">
                                                <?= $this->Form->control('category_id', [
                                                    'class' => 'form-control has-feedback-left wb-txt-inp',
                                                    'label' => false,
                                                    'type' => 'Budgetselect',
                                                    // 'options' => $optionsLoc['Region'],
                                                    'empty' => 'Please Select',
                                                    'ng-model' => '',
                                                ]) ?>
                                                </div>
                                            </div>
                                        </label>

                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('book_arrivedate') ?> </span>
                                            <input type="text" ng-model="rec.sale.books[0].book_arrivedate" class="wb-txt-inp" placeholder="Enter" />
                                        </label>
                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('target_location') ?>  </span>
                                            <input type="text" ng-model="rec.sale.sale_specs[0].salespec_location_target" class="wb-txt-inp" placeholder="Enter" />
                                        </label>
                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"><?= __('buyer_persona') ?> </span>
                                            <?= $this->Form->control('category_id', [
                                                'class' => 'form-control has-feedback-left wb-ele',
                                                'label' => false,
                                                'type' => 'select',
                                                'options' => $options['Buyer Persona'],
                                                'escape' => false,
                                                // Bu önemlidir, HTML'i kaçırmamak için escape özelliğini devre dışı bırakmalısınız.
                                                'empty' => 'Please Select',
                                                'ng-model' => 'rec.sale.sale_specs[0].salespec_buyerpersona',
                                            ]) ?>
                                        </label>



                                        <label class="col-md-6 col-12 col-lg-3">
                                            <span class="sm-txt"> <?= __('social_style_model') ?> </span>
                                            
                                            <?= $this->Form->control('category_id', [
                                                'class' => 'form-control has-feedback-left wb-ele',
                                                'label' => false,
                                                'type' => 'select',
                                                'options' => $options['Social Style'],
                                                'empty' => 'Please Select',
                                                'ng-model' => 'rec.sale.sale_specs[0].salespec_socialstyle',
                                            ]) ?>
                                        </label> 
                                        <div class="down-btns mt-4 d-flex justify-content-end">
                            <div class="flex-gap-10 ">
                                <button class="btn btn-danger" id="" type="button"> Save Changes </button>
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


                $scope.updateSaleCurrentStage = function() {
                    if ($scope.rec.sale.sale_current_stage < 7) 
                    {
                        $scope.rec.sale.sale_current_stage++;
                        $scope.rec.sale.rec_state = 1;
                    }
                    else{
                        alert('Last Stage');
                    }
                };
                
                $scope.isAddEditReportButtonClicked = false;

                $scope.updateRecState = function() {
                    
                    if ($scope.rec.sale.sale_current_stage == 2) {// 2 => [2 => 'Nosale(archived)']
                        $scope.rec.sale.rec_state = 2; 
                    } else if ($scope.rec.sale.sale_current_stage == 3) {// 3 => [1 => 'New', 2 => 'ongoing', 3 => 'Nosale', 4 =>'Reservation', 5 => 'Comission Collected', 6=> 'To Fix']
                        $scope.rec.sale.rec_state = 3; 
                    } else if ($scope.rec.sale.sale_current_stage == 4) {// 4 => [1 => 'New', 2 => 'Nosale', 3 => 'To Fix']
                        $scope.rec.sale.rec_state = 2; 
                    } else if ($scope.rec.sale.sale_current_stage == 5) {// 5 => [1 => 'New', 2 => 'Ongoing', 3 => 'Nosale', 4 =>'Reservation', 5 => 'Comission Collected']
                        $scope.rec.sale.rec_state = 3; 
                    }else {
                        
                        $scope.rec.sale.rec_state = 1; 
                    }
                    $scope.isAddEditReportButtonClicked = true;            
                };


                
                $scope.updateCommision = function() {

                    $scope.rec.sale.sale_current_stage = 6; 
                    $scope.rec.sale.rec_state = 1;
                    
                };
                $scope.updateBooking = function() {

                    $scope.rec.sale.sale_current_stage = 4; 
                    $scope.rec.sale.rec_state = 1;

                };

                $scope.updateToFix = function() {

                    $scope.rec.sale.sale_current_stage = 3; 
                    $scope.rec.sale.rec_state = 6;

                };


                
                
                // $scope.loadTags = function(query, target) {
                //     // return $http.get('/tags?query=' + query);
                //     return $http.get('<?= $app_folder ?>/admin/'+target+'?tags=1&keyword='+query)
                //         .then(function(response, status) {
                //             return response.data.data;
                //         });
                //     // return $http.get('<?= $app_folder ?>/admin/'+target+'?tags=1&keyword='+query);
                // };
                // $scope.loadTags = function(query, target) {
                //     return $http.get('<?= $app_folder ?>/admin/'+target+'?tags=1&keyword='+query);
                //     //  return _doRequest('/admin/'+target+'?tags=1', {keyword: query}, 'post')
                //      //.then(function(res){
                //     //     console.log('res.data', res.data);
                //         // var aaa = [
                //         //             {
                //         //                 "text": "Osamna34",
                //         //             },
                //         //             {
                //         //                 "text": "noSale",
                //         //             }
                //         //         ]
                            
                //         // return aaa;//res.data.data;
                //     // });
                // };


                
                $scope.openDatePicker = function(datepickerName) {
                    $scope.datepickers[datepickerName] = true;
                };

                //  console.log($scope.rec.client.client_specs)
            
                $scope.newEntity = function(tar, params) {
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

                $scope.showPNote = function(_title, _msg, _type, _isHide, _delay) {
                    return showPNote(_title, _msg, _type, _isHide, _delay)
                }

                $scope.nFormat = function(v, unit, round) {
                    return nFormat(v, unit, round)
                }

                $scope.getLastId = function(obj, isKey) {
                    !isKey ? isKey = true : isKey;
                    var keysObj = Object.keys(obj);
                    var res = isKey ? keysObj[keysObj.length - 1] : obj[keysObj[keysObj.length - 1]];
                    return res + '';
                }

                $scope.copyToClipBoard = function(tar) {
                    navigator.clipboard.writeText(tar).then(function() {
                        showPNote('<?= __('note-message') ?>', '<?= __('link_copied') ?>', 'greenBg');
                    }, function(err) {
                        console.error('Async: Could not copy text: ', err);
                        showPNote('<?= __('note-message') ?>', '<?= __('link_copy_failed') ?> ' + err, 'redBg');
                    });
                }

                $scope.currencyConverter = function(from, to, price) {
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

                $scope.empty = function(v) {
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
                        v = Object.keys(v).filter(function(k) {
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

                $scope.isArray = function(v) {
                    return (typeof v === 'object' || typeof v === 'array');
                }

                $scope.removeFilter = function(tar, key, ind) {
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
                

                $scope.toImage = function(tar) {
                    html2canvas(document.querySelector(tar)).then(canvas => {
                        $('#imgHolder').html('<img src="' + canvas.toDataURL("image/png") + '"><i class="fa fa-times" aria-hidden="true"></i>');
                        $('#imgHolder').attr("style", "opacity: 1; z-index:1111;");
                    })
                }

                $scope.DtSetter = function(tar, val, val2) {
                    return DtSetter(tar, val, val2)
                }

                const nToArray = function(num) {
                    var arr = [];
                    for (var i = 0; i < num; i++) {
                        arr[i] = i
                    }
                    return arr;
                }

                $scope.pager = function(total, curr) {
                    var arr = nToArray(total + 1).slice(curr, curr + 3)
                    if (curr > 1) {
                        arr.unshift(curr - 1)
                    }
                    if (curr > 2) {
                        arr.unshift(curr - 2)
                    }
                    return arr;
                }

                $scope.chkAll = function(tar, val) {
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

                $scope.toElm = function(tar) {
                    var elmTarget = $(!tar ? "body" : "#" + tar).offset().top;
                    $("html").animate({
                        scrollTop: elmTarget
                    }, 1000);
                }

                $scope.formatter = function(val) {
                    var suffix = "$";
                    var prefix = " USD";
                    var v = suffix + val.replace('.', '').toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + prefix;
                    return v;
                }

                $scope.closeModal = function(tar) {
                    $(tar).modal('hide');
                }

                $scope.openModal = function(tar) {
                    $(tar).modal('show');
                }

                $scope.getPhoto = function(fileToUpload, photo, folder, noimg) {
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

                $scope.doClick = function(tar, delay) {
                    return doClick(tar, delay)
                }

                $scope.doFilter = function() {
                    var url = [];
                    angular.forEach($scope.search, function(v, k) {
                        if (v) {
                            url.push(k + '=' + v)
                        }
                    })
                    $scope.goTo('/admin/' + ctrl + '/' + actn + '?' + url.join('&'))
                }

                $scope.goTo = function(path, ext = null) {
                    if (ext == 'param') {
                        return window.location.href = window.location.pathname + path
                    }
                    if (ext) {
                        return window.open($scope.dmn + $scope.app_folder + path)
                    }
                    return window.location.href = $scope.dmn + $scope.app_folder + path
                }

                $scope.showMenu = function(tar) {

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
                var _doRequest = function(url, obj, method) {

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
                    return $http(requestObj)
                }

                $scope.multiHandle = function(url, tar) {
                    !tar ? tar = $scope.selected : tar;
                    if (Object.keys(tar).length < 1) {
                        return showPNote('<?= __('note-message') ?>', '<?= __('is-selected-empty-msg') ?>', 'error');
                    }!url ? url = $scope.path + '/' + $scope.currlang : $scope.path + '/' + $scope.currlang + url;

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

                        var ids = Object.keys(tar).filter(function(k) {
                            return tar[k] !== false;
                        });
                        // return console.log(ids.join())
                        _doRequest(url + '/' + ids.join(), false, method).then(function(res) {
                            if (res.data.redirect) {
                                window.location.href = res.data.redirect
                            }
                            if (res.data.status == "SUCCESS") {
                                $scope.selected = {}
                                showPNote('<?= __('note-message') ?>', res.data.msg || '<?= __('multi-handling-success') ?>', 'greenBg');
                                setTimeout(function() {
                                    $scope.doGet('/admin/' + ctrl.toLowerCase() + '/index?list=1', 'list', ctrl.toLowerCase());
                                }, 1000)
                            } else {
                                showPNote('<?= __('note-message') ?>', res.data.msg || '<?= __('multi-handling-fail') ?>', 'redBg');
                            }
                        })
                    }
                }

                $scope.doGet = function(url, type, tar, preloader) {
                    !type ? type = 'list' : type;
                    !preloader ? preloader = '#main_preloader' : preloader;
                    if (preloader) {
                        _setCvrBtn(preloader, 1)
                    }
                    _doRequest(url, null, 'post').then(function(res) {

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
                $scope.doGetDelay = function(url, type, tar, preloader, delay) {
                    !delay ? delay = 1500 : delay;
                    clearTimeout(doGetTm)
                    doGetTm = setTimeout(function() {
                        return $scope.doGet(url, type, tar, preloader)
                    }, delay);
                }

                $scope.showAddClientForm = false;
                $scope.isDivOpen = false;
                $scope.isDivBookOpen = false;
                $scope.isDivReportOpen = false;
                $scope.isDivReportFormOpen = false;
                // Function to toggle the visibility of the clientAdd_form
                $scope.toggleAddClientForm = function() {
                    $scope.showAddClientForm = !$scope.showAddClientForm;
                };


                
                // Function to handle client selection change
                $scope.onClientSelectionChange = function() {
                    if ($scope.rec.sale.client_id === 'add_client') {
                        $scope.toggleAddClientForm();
                    }
                    else {
                        $scope.showAddClientForm = false;
                    }
                };
                $scope.toggleDiv = function() {
                    $scope.isDivOpen = !$scope.isDivOpen;
                };

                $scope.toggleDivBook = function() {
                    $scope.isDivBookOpen = !$scope.isDivBookOpen;
                };

                $scope.toggleDivReport = function() {
                    $scope.isDivReportOpen = !$scope.isDivReportOpen;
                };

                $scope.toggleDivReportForm = function() {
                    $scope.isDivReportFormOpen = !$scope.isDivReportFormOpen;
                };
                
                $scope.doSave = function(orginialObj, tar, ctrl, btn, preloader, form) {
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

                    
                    done.then(function(res) {
                        if (preloader) {
                            _setCvrBtn(preloader, 0)
                        }
                        if (res.data.redirect) {
                            window.location.href = res.data.redirect
                        }
                        if (res.data.status == 'SUCCESS') {
                            if(ctrl=='Sales' && tar == 'client'){

                            }
                            showPNote('<?= __("sys-msg") ?>', res.data.msg || '<?= __("save-success") ?>', "greenBg");

                            if (btn) {
                                doClick(btn);
                            }
                        } else {
                            showPNote('<?= __("sys-msg") ?>', res.data.msg || '<?= __("save-fail") ?>', "redBg");
                            _getErrors(res.data.data, !form ? '#' + tar + '_form' : form);
                        }
                    })
                }

                $scope.doDelete = function(url, doUpdate) {
                    if (confirm("<?= __('delete_confirm') ?>")) {
                        _doRequest(url, {
                            id: url
                        }, "DELETE").then(function(res) {
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

                $scope.delImage = function(url, image, doUpdate) {
                    if (confirm('<?= __('do_you_want_to_delete_image') ?>')) {
                        _doRequest(url, image, "DELETE").then(function(res) {
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
                $scope.clearSearchFields = function() {
                    
                    $scope.rec.search = null;

                };
                
                
                var doSearchUpdt;
                var lastSearch = '';
                $scope.doSearch = function(isPager) {

                    if (lastSearch == JSON.stringify($scope.rec.search)) {
                        return false;
                    }

                    $timeout.cancel(doSearchUpdt);
                    _setCvrBtn('#main_preloader', 1);
                    doSearchUpdt = $timeout(function() {

                        _doRequest('<?= $app_folder ?>/admin/' + ctrl + '?list=1' , {search: $scope.rec.search}, 'post').then(function(res) {

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
                $interval(function() {
                    _doRequest('/configs/refresher')
                }, refreshTime);
            });

            // DIRECTIVE //////////////////////////////////////////////////////
            app.directive('chk', function() {
                return {
                    scope: {
                        chk: '@'
                    },
                    link: function(scope, element, attrs, ctrl) {
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

            app.directive('faIcons', function($http, $compile) {
                return {
                    restrict: 'AE',
                    link: function($scope, elm, attr, ctrl) {
                        
                        elm.bind("input", onChange);

                        function onChange() {
                            $http.get('<?= $app_folder ?>/webroot/js/fa4.json').then((data) => {
                                var html = '';
                                for(var i=0; i<data.data.length; i++){
                                    if(data.data[i].indexOf( $scope.rec.category.category_configs.icon ) > -1|| $scope.rec.category.category_configs.icon.length == 0){
                                    html+=`
                                        <a href="javascript:void(0);" ng-click="rec.category.category_configs.icon = '`+data.data[i]+`'">
                                            <i class="fa `+data.data[i]+`"></i>
                                        </a>`
                                    }
                                }
                                $('.icons_div').html( $compile(html)($scope) );
                            });
                        }
                    }
                }
            });

            app.directive('setIframe', function($compile) {
                return {
                    restrict: 'AE',
                    link: function($scope, elm, attr, ctrl) {
                        var iframe = $compile(`
                            <iframe width="100%" ng-src="https://www.youtube.com/embed/` + attr.setIframe + `" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        `)($scope);
                        $(elm).html(iframe)
                    }
                }
            });

            app.filter('urlcrypt', function() {
                return window.decodeURIComponent;
            });

            app.directive("showImg", function() {
                return {
                    link: function(scope, elm, attrs, ngModel) {
                        elm.bind('click', function(e) {

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

            app.directive("removeTempHide", function() {
                return {
                    link: function(scope, elm, attrs) {
                        elm.removeClass('tempHide');
                    }
                }
            });

            app.directive("multiSelect", function($timeout) {
                return {
                    link: function(scope, elm, attrs) {

                        $timeout(function() {

                            elm.selectpicker({
                                container: 'body'
                            });
                            $(elm).selectpicker('refresh');
                            elm.on('hide.bs.select', function(e) {
                                $(elm).selectpicker('refresh');
                                if (attrs.actn) {
                                    return eval(attrs.actn)
                                }
                            });

                        }, 1000)

                    }
                }
            })

            app.directive('clickOutside', function($document) {
                return {
                    restrict: 'A',
                    link: function(scope, elem, attr, ctrl) {
                        elem.bind('click', function(e) {
                            e.stopPropagation();
                        });
                        $document.bind('click', function() {
                            scope.$apply(attr.clickOutside);
                        })
                    }
                }
            });

            app.directive('textareaExpander', function() {
                return {
                    restrict: 'AE',
                    require: 'ngModel',
                    link: function(scope, elm, attrs, ctrl) {
                        $(elm)[0].rows = !$(elm)[0].rows ? 1 : $(elm)[0].rows
                        ctrl.$parsers.unshift(function(viewValue) {
                            if ($(elm)[0].scrollHeight > $(elm)[0].offsetHeight) {
                                $(elm)[0].rows = $(elm)[0].rows + 1
                            }
                            return viewValue;
                        })
                    }
                };
            });

            app.directive('onlyNumbers', function() {
                return {
                    restrict: 'AC',
                    link: function(scope, el, attr, ctrl) {
                        el.bind('keypress', function(e) {
                            if (e.which != 8 && e.which != 13 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                _setError(el, '<?= __('only_numbers') ?>');
                                return false;
                            } else {
                                _setError(el, '');
                            }
                        })
                        el.bind('blur', function(e) {
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

            app.directive('fileModel', ['$parse', function($parse) {
                return {
                    restrict: 'A',
                    link: function($scope, element, attrs) {
                        var model = $parse(attrs.fileModel);
                        var modelSetter = model.assign;

                        element.bind('change', function(changeEvent) {

                            var total_upload_size = 0;
                            angular.forEach(changeEvent.target.files, function(itm, k) {

                                if ($scope.filesInfo[attrs.name] === undefined || $scope.filesInfo[attrs.name] == null) {
                                    $scope.filesInfo[attrs.name] = []
                                }

                                // prepare file info
                                var reader = new FileReader();

                                reader.onload = function(loadEvent) {
                                    // upload files docs
                                    if (attrs.name == 'doc_file') {
                                        $scope.$apply(function() {
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

                                        image.onload = function() {
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
                                                $scope.$apply(function() {
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
                                $scope.$apply(function() {
                                    modelSetter($scope, [element[0].files[k]]);
                                });

                            })

                        })
                    }
                };
            }]);

            app.directive('setChart', function($timeout) {
                return {
                    restrict: 'A',
                    link: function(scope, elem, attr, ctrl) {

                        var addSeperator = function(n) {
                            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                        }
                        var chart, ctx;
                        scope.$watch('rec.stats', function(old, newVal) {

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
                                            label: function(tooltipItems, data) {
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

            app.directive('setRequired', function() {
                return {
                    link: function(scope, element, attrs, ngModel) {
                        if (attrs.setRequired == 'msg') {
                            return $(element).html(' <i class="fa redText fa-asterisk"></i> <?= __('red_star_required_fields') ?>');
                        }
                        var val = $(element).html();
                        $(element).html(val + ' <i class="fa redText fa-asterisk"></i>')
                    }
                }
            });

            app.directive('setProgressWidth', function() {
                return {
                    link: function(scope, el, attrs, ngModel) {
                        var arr = attrs.setProgressWidth.split(',');
                        var val = arr[attrs.ind];
                        $(el).attr('style', 'width: ' + scope.getPercentage(arr, val) + '%; background:' + scope.clrs[attrs.ind]);
                    }
                }
            });

            // if(getBrowser() == 'safari'){
            //     $('.has-feedback-left').addClass('safari_input_padding');
            //     // $('.form-control-feedback').css({opacity: 0});
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