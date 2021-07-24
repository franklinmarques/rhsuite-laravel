<script>

    $.ajaxSetup({
        'type': 'POST',
        'dataType': 'json',
        'error': function (jqXHR, textStatus, errorThrown) {
            if (navigator.onLine) {
                if (jqXHR.status === 401) {
                    bootbox.alert('Sessão expirada');
                } else if (jqXHR.status !== 0) {
                    bootbox.alert(textStatus + ' ' + jqXHR.status + ': ' + errorThrown);
                }
            } else {
                if (jqXHR.status === 0) {
                    bootbox.alert(textStatus + ' ' + jqXHR.status + ': ' + 'Disconnected');
                }
            }
        }
    });

    bootbox.setDefaults({
        'size': 'small',
        'locale': 'br',
        'backdrop': true,
        'closeButton': false
    });


    var confirm_deletion = function (callback, message = 'Deseja remover o registro?') {
        let options = {
            'message': message,
        };
        options.buttons = {
            'confirm': {
                'label': 'Não',
                'className': 'btn-light'
            },
            'main': {
                'label': 'Sim',
                'className': 'btn-danger',
                'callback': callback
            }
        };
        bootbox.dialog(options);
    };


    if ($.fn.DataTable !== undefined) {
        $.extend(true, $.fn.DataTable.defaults, {
            'language': {
                'url': '{{ asset('assets/json/datatables_pt-br.json') }}'
            }
        });

        $.fn.dataTable.ext.errMode = function (settings, tn, msg) {
            if (settings.jqXHR.status !== 401 && settings.jqXHR.statusText !== 'expirado') {
                bootbox.alert(msg);
            }
        };
    }

    $('.glyphicons-fullscreen').on('click', function () {
        if (getFullscreen()) {
            exitFullscreen();
        } else {
            var element = document.body;
//            var element = document.getElementById("main-content").firstElementChild;
            launchIntoFullscreen(element);
        }
    });

    function getFullscreen() {
        var element = document.body;
        return element.fullscreenEnabled || element.mozFullScreenEnabled || element.webkitFullscreenEnabled;
    }

    function launchIntoFullscreen(element) {
        if (element.requestFullscreen) {
            element.requestFullscreen();
        } else if (element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
        } else if (element.msRequestFullscreen) {
            element.msRequestFullscreen();
        }
        sessionStorage.setItem('fullscreen', true);
    }

    function exitFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
        alert(1);
    }

    function documentacao() {
        window.open('{{ url('ajuda/visualizar/' . str_replace(env('APP_URL'), '', url()->current())) }}', 'Documentação', 'TITLEBAR=NO, STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=80, LEFT=180, WIDTH=1130, HEIGHT=560');
    }
</script>
