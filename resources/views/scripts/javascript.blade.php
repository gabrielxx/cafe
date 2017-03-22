<script>
    var view = ""
    var tabulator = {};
    var total = 0;

	$(window).load(function() {

        $('.views').css('display','none');
        $('#home').css('display','block');
        $('.view').click(function(e){

            e.preventDefault();
            $('.nav-btn').removeClass('active');
            var btn = $(this).parents('li').addClass('active');
            var view = btn.data('view');
            $('.views').css('display','none');
            $('#'+view).css('display','block');
            window.view = view;
            $.view(view);
            $.update();

            if(view == 'geolocation'){
                $('#content').addClass('content-full-width');
                $.gmap();
                swal('Aviso', 'El servicio de geolocalización no se encuentra habilitado.\nComuníquese con el desarrollador para habilitarlo.', 'info');
            }
            else{
                $('#content').removeClass('content-full-width');
            };

            if(view == 'messaging'){
                swal('Aviso', 'El servicio de mensajeria masiva no se encuentra habilitado.\nComuníquese con el desarrollador para habilitarlo.', 'info');
            };
        });

        setTimeout(function() {
            $.gritter.add({
                title: 'Bienvenido!',
                text: 'Hola de nuevo ' + $('#welcome').val() + '<br>Base de datos: ' + $("#db_year").val(),
                image: $('#img-user').attr('src'),
                sticky: false,
                time: '3000',
                class_name: 'my-sticky-class'
            });

            /*$.gritter.add({
                title: 'Periodo de evaluacion',
                text: $('#welcome').val() + ", el sistema esta en fase beta y se encuentra en periodo de evaluación.<br>"+
                "El periodo de evaluación durara 7 días a partir del 15/08/2017.<br>Transcurrido dicho periodo se le notificara el costo del sistema y el pago mensual por mantenimiento.",
                sticky: true,
                time: '3000',
                class_name: 'my-sticky-class'
            });*/

        }, 1000);
    });

    $(document).ready(function() {

        App.init();

        //···Enable Plugins:

            $('.datetimepicker').datetimepicker({
                //
                locale: 'es'
            });
            $('#start-date').datetimepicker({
                locale: 'es',
                calendarWeeks: true
            });
            $('#end-date').datetimepicker({
                locale: 'es',
                calendarWeeks: true,
                useCurrent: false,
                widgetPositioning: {
                    horizontal: 'right',
                    vertical: 'auto'
                }
            });
            $("#start-date").on("dp.change", function(e){
                //
                $('#end-date').data("DateTimePicker").minDate(e.date);

                var $form = $("#form-add-services");
                var $input = $form.find('input[name=start_date]');
                var $week = $form.find('input[name=week]');

                $.week($week ,$input.val().split(' ')[0]);
            });
            $("#end-date").on("dp.change", function(e){
                //
                $('#start-date').data("DateTimePicker").maxDate(e.date);
            });

            $('#start-date-u').datetimepicker({
                locale: 'es',
                calendarWeeks: true
            });
            $('#end-date-u').datetimepicker({
                locale: 'es',
                useCurrent: false,
                calendarWeeks: true,
                widgetPositioning: {
                    horizontal: 'right',
                    vertical: 'auto'
                }
            });
            $("#start-date-u").on("dp.change", function(e){
                //
                $('#end-date-u').data("DateTimePicker").minDate(e.date);
                var $form = $("#form-add-services");
                var $input = $form.find('input[name=start_date-u]');
                var $week = $form.find('input[name=week-u]');

                $.week($week ,$input.val().split(' ')[0]);
            });
            $("#end-date-u").on("dp.change", function(e){
                //
                $('#start-date-u').data("DateTimePicker").maxDate(e.date);
            });

            $(".selectpicker").selectpicker('render');

            $(".phone").mask("(9999) 999 9999");
            $(".rif").mask("J-99999999-9");
            $(".week").mask("Sem: 99");
            $('#usuario').on('keyup', function(){ $('#contacto').val($(this).val()); });
            $('#usuario-u').on('keyup', function(){ $('#contacto-u').val($(this).val()); });
            $('.blur').keypress(function(e){ $(this).blur(); });



        //···Miscelaneus:

            $('body').on('keyup', '#form-add-invoices input[name=wait_daytime]', function(e){

                var $form = $('#form-add-invoices');
                var wait_holiday = 0;
                var wait_daytime = $(this).val() * window.tabulator.wait_daytime;
                var $input_holiday = $form.find('input[name=wait_holiday]');
                if($input_holiday.val() != ""){
                    var holiday = wait_daytime * window.tabulator.holiday;
                    $input_holiday.val(holiday.toFixed(2));
                    wait_holiday = parseFloat($input_holiday.val());
                }
                var subtotal = wait_daytime + wait_holiday;

                if($(this).val()==""){
                    $form.find('input[name=wait_daytime_subtotal]').val("")
                }
                else{
                    $form.find('input[name=wait_daytime_subtotal]').val(subtotal.toFixed(2));
                };

                $.totalize();
            });
            $('body').on('click', '#form-add-invoices input[name=wait_holiday]', function(e){

                var $form = $('#form-add-invoices');
                var subtotal = parseFloat($form.find('input[name=wait_daytime_subtotal]').val());
                if(!subtotal){ subtotal = 0; };
                if($(this).val()!=""){
                    subtotal = subtotal - $(this).val();
                    $form.find('input[name=wait_daytime_subtotal]').val(subtotal.toFixed(2));
                    $(this).val("");
                }
                else{
                    var holiday = subtotal * window.tabulator.holiday;
                    $(this).val(holiday.toFixed(2));
                    subtotal = subtotal + holiday;
                    $form.find('input[name=wait_daytime_subtotal]').val(subtotal.toFixed(2));
                };
                $.totalize();
            });
            $('body').on('keyup', '#form-add-invoices input[name=wait_night]', function(e){

                var $form = $('#form-add-invoices');
                var subtotal = $(this).val() * window.tabulator.wait_night;
                if($(this).val()==""){
                    $form.find('input[name=wait_night_subtotal]').val("");
                }
                else{
                    $form.find('input[name=wait_night_subtotal]').val(subtotal.toFixed(2));
                };
                $.totalize();
            });


            $('body').on('keyup', '#form-add-invoices input[name=disposition_daytime]', function(e){

                var $form = $('#form-add-invoices');
                var disposition_holiday = 0;
                var disposition_daytime = $(this).val() * window.tabulator.disposition_daytime;
                var $input_holiday = $form.find('input[name=disposition_holiday]');
                if($input_holiday.val() != ""){
                    var holiday = disposition_daytime * window.tabulator.holiday;
                    $input_holiday.val(holiday.toFixed(2));
                    disposition_holiday = parseFloat($input_holiday.val());
                }
                var subtotal = disposition_daytime + disposition_holiday;

                if($(this).val()==""){
                    $form.find('input[name=disposition_daytime_subtotal]').val("");
                }
                else{
                    $form.find('input[name=disposition_daytime_subtotal]').val(subtotal.toFixed(2));
                };

                $.totalize();
            });
            $('body').on('click', '#form-add-invoices input[name=disposition_holiday]', function(e){

                var $form = $('#form-add-invoices');
                var subtotal = parseFloat($form.find('input[name=disposition_daytime_subtotal]').val());
                if(!subtotal){ subtotal = 0; };
                if($(this).val()!=""){
                    subtotal = subtotal - $(this).val();
                    $form.find('input[name=disposition_daytime_subtotal]').val(subtotal.toFixed(2));
                    $(this).val("");
                }
                else{
                    var holiday = subtotal * window.tabulator.holiday;
                    $(this).val(holiday.toFixed(2));
                    subtotal = subtotal + holiday;
                    $form.find('input[name=disposition_daytime_subtotal]').val(subtotal.toFixed(2));
                };
                $.totalize();
            });
            $('body').on('keyup', '#form-add-invoices input[name=disposition_night]', function(e){

                var $form = $('#form-add-invoices');
                var subtotal = $(this).val() * window.tabulator.disposition_night;

                if($(this).val()==""){
                    $form.find('input[name=disposition_night_subtotal]').val("");
                }
                else{
                    $form.find('input[name=disposition_night_subtotal]').val(subtotal.toFixed(2));
                };

                $.totalize();
            });


            $('body').on('keyup', '#form-add-invoices input[name=sprint_daytime]', function(e){

                var $form = $('#form-add-invoices');
                var sprint_holiday = 0;
                var sprint_daytime = $(this).val() * window.tabulator.sprint_daytime;
                var $input_holiday = $form.find('input[name=sprint_holiday]');
                if($input_holiday.val() != ""){
                    var holiday = sprint_daytime * window.tabulator.holiday;
                    $input_holiday.val(holiday.toFixed(2));
                    sprint_holiday = parseFloat($input_holiday.val());
                }
                var subtotal = sprint_daytime + sprint_holiday;
                if($(this).val()==""){
                    $form.find('input[name=sprint_daytime_subtotal]').val("");
                }
                else{
                    $form.find('input[name=sprint_daytime_subtotal]').val(subtotal.toFixed(2));
                };
                $.totalize();
            });
            $('body').on('click', '#form-add-invoices input[name=sprint_holiday]', function(e){

                var $form = $('#form-add-invoices');
                var subtotal = parseFloat($form.find('input[name=sprint_daytime_subtotal]').val());
                if(!subtotal){ subtotal = 0; };
                if($(this).val()!=""){
                    subtotal = subtotal - $(this).val();
                    $form.find('input[name=sprint_daytime_subtotal]').val(subtotal.toFixed(2));
                    $(this).val("");
                }
                else{
                    var holiday = subtotal * window.tabulator.holiday;
                    $(this).val(holiday.toFixed(2));
                    subtotal = subtotal + holiday;
                    $form.find('input[name=sprint_daytime_subtotal]').val(subtotal.toFixed(2));
                };
                $.totalize();
            });
            $('body').on('keyup', '#form-add-invoices input[name=sprint_night]', function(e){

                var $form = $('#form-add-invoices');
                var subtotal = $(this).val() * window.tabulator.sprint_night;

                if($(this).val()==""){
                    $form.find('input[name=sprint_night_subtotal]').val("");
                }
                else{
                    $form.find('input[name=sprint_night_subtotal]').val(subtotal.toFixed(2));
                };

                $.totalize();
            });


            $('body').on('keyup', '#form-add-invoices input[name=night_tour]', function(e){

                var $form = $('#form-add-invoices');
                var subtotal = $(this).val() * window.tabulator.night_tour;

                if($(this).val()==""){
                    $form.find('input[name=night_tour_subtotal]').val("");
                }
                else{
                    $form.find('input[name=night_tour_subtotal]').val(subtotal.toFixed(2));
                };

                $.totalize();
            });
            $('body').on('click', '#form-add-invoices input[name=overnight]', function(e){
                var $form = $('#form-add-invoices');

                if($(this).val()!=""){
                    $(this).val("");
                }
                else{
                    $(this).val(window.tabulator.overnight);
                };
                $.totalize();
            });



        //···Events:

            $('body').on('click', ".laggard-toggle" , function(){
                var $input = $('.laggard-input');
                var $check = $('.laggard-check');
                if($input.val()=="" || $input.val()=="0"){
                    $input.val("1");
                    $check.removeClass('fa-circle-o');
                    $check.addClass('fa-check-circle-o');
                }
                else{
                    $input.val("0");
                    $check.removeClass('fa-check-circle-o');
                    $check.addClass('fa-circle-o');
                };
            });

            $('body').on('click', ".drivers-toggle" , function(){
                var $input = $('.drivers-input');
                var $check = $('.drivers-check');
                if($input.val()=="" || $input.val()=="0"){
                    $input.val("1");
                    $check.removeClass('fa-circle-o');
                    $check.addClass('fa-check-circle-o');
                }
                else{
                    $input.val("0");
                    $check.removeClass('fa-check-circle-o');
                    $check.addClass('fa-circle-o');
                };
            });

            $('body').on('click', ".subsidiaries-toggle" , function(){
                var $input = $('.subsidiaries-input');
                var $check = $('.subsidiaries-check');
                if($input.val()=="" || $input.val()=="0"){
                    $input.val("1");
                    $check.removeClass('fa-circle-o');
                    $check.addClass('fa-check-circle-o');
                }
                else{
                    $input.val("0");
                    $check.removeClass('fa-check-circle-o');
                    $check.addClass('fa-circle-o');
                };
            });

            $('body').on('click', ".laggard-toggle-u" , function(){
                var $input = $('.laggard-input-u');
                var $check = $('.laggard-check-u');
                if($input.val()=="" || $input.val()=="0"){
                    $input.val("1");
                    $check.removeClass('fa-circle-o');
                    $check.addClass('fa-check-circle-o');
                }
                else{
                    $input.val("0");
                    $check.removeClass('fa-check-circle-o');
                    $check.addClass('fa-circle-o');
                };
            });

            $('body').on('click', ".btn-change-db", function(){
                $.get('database/'+$("#db_year").val(), function(response){
                    if(response.status=="success"){
                        $.gritter.add({
                            title: 'Base de datos actualizada.',
                            text: response.details+'<br>Activa: '+ response.data,
                            sticky: false,
                            time: '3000',
                            class_name: 'my-sticky-class'
                        });
                        $.view(window.view);
                    };
                });
            });

            $('#route-invoice-select').on('change', function(e){
                if($(this).val()!=null && $(this).val()!=""){
                    $.get('routes/'+$(this).val(),function(response){
                        var $form = $('#form-add-items');
                        var km = response.data.km;
                        $form.find('input[name=km]').val(km);
                        var origin = response.data.route.split('-')[0].toLowerCase();
                        var destiny = response.data.route.split('-')[1].toLowerCase();

                        $.calculate();

                        list = [
                            'guiria', 'caracas'
                        ];


                        if(list.indexOf(origin)>=0 || list.indexOf(destiny)>=0){
                            var subtotal = parseFloat($form.find('input[name=subtotal]').val());
                            var percent = subtotal * .3;
                            var subtotal = subtotal + percent;
                            $form.find('input[name=subtotal]').val(subtotal);
                        }
                    });
                }
            });

            $('body').on('click', '#input_night', function(e){
                var $form = $('#form-add-items');
                if($(this).val()!=""){
                    $(this).val("");
                    $.calculate()
                }
                else{
                    if($form.find("input[name=holiday]").val()!=""){
                        $form.find("input[name=holiday]").val("");
                    };
                    var subtotal = parseFloat($form.find('input[name=subtotal]').val());
                    var night = subtotal * parseFloat(window.tabulator.night);
                    $(this).val(night);
                    $.calculate();
                };
            });

            $('body').on('click', '#input_holiday', function(e){
                var $form = $('#form-add-items');
                if($(this).val()!=""){
                    $(this).val("");
                    $.calculate()
                }
                else{
                    if($form.find("input[name=night]").val()!=""){
                        $form.find("input[name=night]").val("");
                    };
                    var subtotal = parseFloat($form.find('input[name=subtotal]').val());
                    var night = subtotal * parseFloat(window.tabulator.night);
                    $(this).val(night);
                    $.calculate();
                };
            });

            $('body').on('keyup', '#input_km', function(e){ $.calculate(); });

            $('body').on('click', '.btn-save-invoice', function(e){
                e.preventDefault();
                var btn = $(this);
                btn.prop('disabled', true);
                var form  =  $('#'+btn.data('form'));
                var url   =  form.attr('action');
                var data  =  form.serialize();

                $.post(url, data, function(response){
                    if(response.status=="success"){
                        swal('Listo', response.details, response.status);
                        btn.parents('div.modal').modal('hide');
                        if(btn.data('print')==true){
                            window.open(window.location+'print/'+response.data.service_id);
                        };
                        $.view(window.view);
                    };
                    btn.prop('disabled', false);
                });
            });

            $('body').on('click', '.btn-save', function(e){
                e.preventDefault();
                var btn = $(this);
                btn.prop('disabled', true);
                var form  =  $('#'+btn.data('form'));
                var url   =  form.attr('action');
                var data  =  form.serialize();

                var target = $(this).parents('.panel');
                var targetBody = $(target).find('.panel-body');
                var spinnerHtml = '<div class="panel-loader"><span class="spinner-small"></span></div>';
                $(target).addClass('panel-loading');
                $(targetBody).prepend(spinnerHtml);

                $.post(url, data, function(response){
                    $('div.form-group').removeClass('has-error');
                    $('.help-block>small').html("");
                    if(response.status=="success"){
                        swal('Listo', response.details, response.status);
                        form.each(function(){
                            this.reset();
                        });

                        var $check = $('.laggard-check');
                        $check.removeClass('fa-check-circle-o');
                        $check.addClass('fa-circle-o');

                        $('.selectpicker').each(function(){ $(this).selectpicker('val', null); });
                        btn.parents('div.modal').modal('hide');
                        $.view(window.view);
                    }
                    else{
                        for (index in response.data){
                            $('#'+btn.data('form')+' input[name='+index+']').parents('div.form-group').addClass('has-error');
                            $('#'+btn.data('form')+' select[name='+index+']').parents('div.form-group').addClass('has-error');
                            $('#'+btn.data('form')+' small#error-'+index).html(response.data[index]);
                        }
                    }
                    btn.prop('disabled', false);
                    $(target).removeClass('panel-loading');
                    $(target).find('.panel-loader').remove();
                });
            });

            $('body').on('click', '.btn-referrals', function(e){
                e.preventDefault();
                var btn = $(this);
                var form  =  $('#'+btn.data('form'));

                if(btn.data('type')=='show'){
                    form.find('input[name=type]').val(btn.data('type'));
                    btn.prop('disabled', true);
                    var url   =  form.attr('action');
                    var data  =  form.serialize();
                    var target = $(this).parents('.panel');
                    var targetBody = $(target).find('.panel-body');
                    var spinnerHtml = '<div class="panel-loader"><span class="spinner-small"></span></div>';
                    $(target).addClass('panel-loading');
                    $(targetBody).prepend(spinnerHtml);
                    $.post(url, data, function(response){
                        if(response.status=="success"){
                            swal('Listo', response.details, response.status);
                            console.log(response);
                        }
                        btn.prop('disabled', false);
                        $(target).removeClass('panel-loading');
                        $(target).find('.panel-loader').remove();
                    });
                };
                if(btn.data('type')=='pdf'){
                    form.find('input[name=type]').val('pdf');
                    form.submit();
                };
                if(btn.data('type')=='excel'){
                    form.find('input[name=type]').val('excel');
                    form.submit();
                };
            });

            $('body').on('click', '.btn-paysheets', function(e){
                e.preventDefault();
                var btn = $(this);
                var form  =  $('#'+btn.data('form'));

                form.submit();
            });

            $('body').on('click', '.btn-add-item', function(e){
                e.preventDefault();
                var btn = $(this);
                btn.prop('disabled', true);

                var form  =  $('#'+btn.data('form'));
                var url   =  form.attr('action');
                var data  =  form.serialize();

                var target = $(this).parents('.panel');
                var targetBody = $(target).find('.panel-body');
                var spinnerHtml = '<div class="panel-loader"><span class="spinner-small"></span></div>';
                $(target).addClass('panel-loading');
                $(targetBody).prepend(spinnerHtml);

                $.post(url, data, function(response){
                    $('div.form-group').removeClass('has-error');

                    if(response.status=="success"){
                        form.each(function(){
                            this.reset();
                        });
                        $('.selectpicker').each(function(){ $(this).selectpicker('val', null); });

                        var item = response.data;

                        var $items = $("#table-items");
                        var $item = $.tmpl($('#item-row'), {
                            route: item.route.route,
                            km: item.km,
                            factor: item.factor,
                            subtotal: item.subtotal,
                            night: item.night,
                            holiday: item.holiday,
                            id: item.id
                        });
                        $items.append($item);

                        window.total = window.total + parseFloat(item.subtotal);

                        $("#total-title").html(parseFloat(window.total.toFixed(2)));
                        $(".input-total").val(parseFloat(window.total.toFixed(2)));

                        $.gritter.add({
                            title: response.details,
                            text: '',
                            sticky: false,
                            time: '2000',
                            class_name: 'my-sticky-class'
                        });

                        $.totalize();
                    }
                    else{
                        for (index in response.data){
                            $('#'+btn.data('form')+' input[name='+index+']').parents('div.form-group').addClass('has-error');
                            $('#'+btn.data('form')+' select[name='+index+']').parents('div.form-group').addClass('has-error');
                        }
                    }
                    btn.prop('disabled', false);
                    $(target).removeClass('panel-loading');
                    $(target).find('.panel-loader').remove();
                });
            });

            $('body').on('click', '.btn-update', function(e){
                e.preventDefault();
                var btn = $(this);
                btn.prop('disabled', true);
                //$(".wait-preloader").removeClass('invisible');
                var form  =  $('#'+btn.data('form'));
                var url   =  form.attr('action').replace(':UI', btn.data('id'));
                var data  =  form.serialize();
                $.post(url, data, function(response){
                    $('div.form-group').removeClass('has-error');
                    $('.help-block>small').html("");
                    if(response.status == 'success'){
                        swal('Listo', response.details, response.status);
                        form.each(function(){
                            this.reset();
                        });
                        btn.parents('div.modal').modal('hide');
                        $.view(window.view);
                    }
                    else{
                        for (index in response.data){
                            $('#'+btn.data('form')+' input[name='+index+']').parents('div.form-group').addClass('has-error');
                            $('#'+btn.data('form')+' small#error-'+index).html(response.data[index]);
                        }
                    }
                    btn.prop('disabled', false);
                    //$(".wait-preloader").addClass('invisible');
                });
            });

            $('body').on('click', '.btn-update-tab', function(e){
                e.preventDefault();
                var btn = $(this);
                btn.prop('disabled', true);
                var form  =  $('#'+btn.data('form'));
                var url   =  form.attr('action');
                var data  =  form.serialize();

                var target = $(this).parents('.panel');
                var targetBody = $(target).find('.panel-body');
                var spinnerHtml = '<div class="panel-loader"><span class="spinner-small"></span></div>';
                $(target).addClass('panel-loading');
                $(targetBody).prepend(spinnerHtml);

                $.post(url, data, function(response){
                    $('div.form-group').removeClass('has-error');
                    $('.help-block>small').html("");
                    if(response.status == 'success'){
                        swal('Listo', response.details, response.status);
                        $.view(window.view);
                    }
                    else{
                        for (index in response.data){
                            $('#'+btn.data('form')+' input[name='+index+']').parents('div.form-group').addClass('has-error');
                            $('#'+btn.data('form')+' small#error-'+index).html(response.data[index]);
                        }
                    }
                    btn.prop('disabled', false);
                    $(target).removeClass('panel-loading');
                    $(target).find('.panel-loader').remove();
                });
            });



        //···Functions:

            $.datatable = function(datatable, table, options={}){
                $("#datatable-"+datatable).bootgrid({
                    caseSensitive: false,
                    rowCount: 5,
                    columnSelection: options.colSelection,
                    css: {
                        icon: 'fa',
                        iconSearch: 'fa-search',
                        iconColumns: 'fa-ellipsis-v',
                        iconDown: 'fa-sort-desc',
                        iconRefresh: 'fa-refresh',
                        iconUp: 'fa-sort-asc',
                    },
                    labels: {
                        noResults: "No se encontraron resultados.",
                        search: 'Buscar',
                        loading: 'Cargando'
                    },
                    formatters: {
                        "commands": function(column, row){

                            if(row.status == 'active'){
                                var button = "<button class='btn btn-icon btn-danger btn-circle' data-table='" + table + "' data-form='form-delete-" + table + "' data-row-id='" + row.id + "' onclick='$.delete(event, $(this))'><span class='fa fa-trash'></span></button>";
                            }
                            else{
                                var button = "<button class='btn btn-icon btn-primary btn-circle' data-table='" + table + "' data-form='form-delete-" + table + "' data-row-id='" + row.id + "' onclick='$.restore(event, $(this))'><span class='fa fa-plus'></span></button>";
                            }

                            var print = "";
                            if(window.view=="services" && row.condition=="Facturado"){
                                print = "<a target='_blank' href='print/" + row.id + "' class='btn btn-icon btn-white btn-circle'><span class='fa fa-print'></span></a>";
                            }

                            return print + " <button class='btn btn-icon btn-white btn-circle' data-table='" + table + "' data-form='form-edit-" + table + "'  data-row-id='" + row.id + "' onclick='$.edit(event, $(this))' data-modal='modal-edit-" + table + "'><span class='fa fa-pencil'></span></button> " +
                                    button;
                        },

                        "status": function(column, row){
                            var status = row.status;
                            switch(row.status){
                                case "on hold":
                                    color = "gray";
                                break;
                                case "approved":
                                    color = "lightgreen";
                                break;
                                case "rejected":
                                    color = "deeporange";
                                break;
                                case "confirmed":
                                    color = "green";
                                break;
                                case "cancelled":
                                    color = "red";
                                break;
                                case "in progress":
                                    color = "cyan";
                                break;
                                case "finalized":
                                    color = "teal";
                                break;
                                case "active":
                                    status = "Activo"
                                    color = "success";
                                break;
                                case "inactive":
                                    status = "Inactivo"
                                    color = "danger";
                                break;
                            }

                            status = "<button class='btn btn-" + color + " btn-xs waves-effect'>" + status + "</button>";
                            return status;
                        },

                        "condition": function(column, row){
                            var status = row.condition;
                            switch(row.condition){
                                case "Pendiente":
                                    var color = "default";
                                break;
                                case "Cancelado":
                                    var color = "danger";
                                break;
                                case "Facturado":
                                    var color = "success";
                                break;
                                case "Pagado":
                                    var color = "primary";
                                break;
                            }

                            status = "<button data-id='" + row.id + "' data-modal='modal-invoice-"+table+"' data-table='" + table + "' class='btn btn-" + color + " btn-xs' onclick='$.invoice(event, $(this))'>" + row.condition + "</button>";
                            return status;
                        }

                    }
                });
            };

            $.render = function(view, data){

                switch(view){
                    case 'tabulators':
                        for (tab in data){
                            if(data[tab]['category'] == 1){
                                var form = $('#form-edit-simple');
                            }
                            else{
                                var form = $('#form-edit-luxe');
                            }

                            for (index in data[tab]) {
                                form.find('input[name='+index+']').val(data[tab][index]);
                            }
                        }
                    break;
                    case 'all':
                        var $drivers = $('select.options-drivers');
                        var $routes = $('select.options-routes');
                        var $subsidiaries = $('select.options-subsidiaries');

                        $drivers.html('');
                        $routes.html('');
                        $subsidiaries.html('');

                        $drivers.append($('<option>'));
                        $routes.append($('<option>'));
                        $subsidiaries.append($('<option>'));

                        for (var i = 0; i < data.drivers.length; i++) {
                            $drivers.append($('<option>', {
                                value: data.drivers[i].id,
                                text: data.drivers[i].name
                            }));
                        };

                        for (var i = 0; i < data.routes.length; i++) {
                            $routes.append($('<option>', {
                                value: data.routes[i].id,
                                text: data.routes[i].route
                            }));
                        };

                        for (var i = 0; i < data.subsidiaries.length; i++) {
                            $subsidiaries.append($('<option>', {
                                value: data.subsidiaries[i].id,
                                text: data.subsidiaries[i].name
                            }));
                        };

                        $('.selectpicker').selectpicker('refresh');
                    break;
                    case 'referrals':
                        var $form = $('#form-referrals');
                        $weeks = $form.find('select[name=week]');

                        $weeks.html('');
                        $weeks.append($('<option>'));

                        for (var i = 0; i < data.length; i++) {
                            $weeks.append($('<option>', {
                                value: data[i].week,
                                text: data[i].week
                            }));
                        };

                        $weeks.selectpicker('refresh');
                    break;
                    case 'paysheets':
                        var $form = $('#form-paysheets');
                        $weeks = $form.find('select[name=week]');

                        $weeks.html('');
                        $weeks.append($('<option>'));

                        for (var i = 0; i < data.length; i++) {
                            $weeks.append($('<option>', {
                                value: data[i].week,
                                text: data[i].week
                            }));
                        };

                        $weeks.selectpicker('refresh');
                    break;
                    default:
                        var options = { colSelection: false };
                        $.datatable(view, view, options);
                        $('#datatable-'+view).bootgrid('clear');
                        $('#datatable-'+view).bootgrid('append', data);
                    break;
                };
            };

            $.delete = function(e, element){
                e.preventDefault();
                var form = $('#'+element.data('form'));
                var route = form.attr('action').replace(':UI', element.data('row-id'));
                var data = form.serialize();
                swal({
                    title: "Estas Seguro?",
                    text: "Estas apunto de inhabilitar este registro.",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: "btn-sm btn-primary",
                    cancelButtonClass: "btn-sm btn-info",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                    closeOnConfirm: false
                }, function(){
                    $.post(route, data, function(response){
                        if(response.status == 'success'){
                            $.view(window.view);
                            swal('Listo', response.details, response.status);
                        };
                    });
                });
            };

            $.deleteItem = function(e, element){
                e.preventDefault();
                var form = $('#'+element.data('form'));
                var route = form.attr('action').replace(':UI', element.data('row-id'));
                var data = form.serialize();
                element.prop('disabled', true);
                $.post(route, data, function(response){
                    if(response.status == 'success'){
                        element.parents('tr').remove();
                        $.gritter.add({
                            title: response.details,
                            text: '',
                            sticky: false,
                            time: '2000',
                            class_name: 'my-sticky-class'
                        });
                        window.total = window.total - parseFloat(response.data.subtotal);
                        $("#total-title").html(parseFloat(window.total.toFixed(2)));
                        $(".input-total").val(parseFloat(window.total.toFixed(2)));
                    };
                });
            };

            $.restore = function(e, element){
                e.preventDefault();
                var form = $('#'+element.data('form'));
                var route = form.attr('action').replace(':UI', element.data('row-id'));
                var data = form.serialize();
                swal({
                    title: "Estas Seguro?",
                    text: "Estas apunto de habilitar este registro.",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: "btn-sm btn-primary",
                    cancelButtonClass: "btn-sm btn-info",
                    confirmButtonText: "Si",
                    cancelButtonText: "No",
                    closeOnConfirm: false
                }, function(){
                    $.post(route, data, function(response){
                        if(response.status == 'success'){
                            $.view(window.view);
                            swal('Listo', response.details, response.status);
                        };
                    });
                });
            };

            $.edit = function(e, element){
                e.preventDefault();
                $('div.form-group').removeClass('has-error');
                $('.help-block>small').html("");
                $('.btn-update').attr('data-id', element.data('row-id'));
                $('.btn-update').data('id', element.data('row-id'));
                $('.btn-update-file').attr('data-id', element.data('row-id'));
                $('.btn-update-file').data('id', element.data('row-id'));

                $.get(element.data('table')+"/"+element.data('row-id'), function(response){
                    var form = $('#'+element.data('form'));
                    $('#'+element.data('modal')).modal();
                    $('#'+element.data('modal')).attr('data-modal-color', element.data('color'));
                    for (index in response.data){

                        form.find('input[name='+index+'-u]').val(response.data[index]);

                        if(index=='id'){
                            form.find('input[name='+index+']').val(response.data[index]);
                        }

                        if(index=='route'){
                            var route = response.data[index].split(' - ');
                            var start = route[0];
                            var end = route[1];
                            form.find('input[name=start-u]').val(start);
                            form.find('input[name=end-u]').val(end);
                        }

                        if(index=='laggard'){
                            if(response.data[index]=="" || response.data[index]==null){
                                var $check = $('.laggard-check-u');
                                $check.removeClass('fa-check-circle-o');
                                $check.addClass('fa-circle-o');
                            }
                            else{
                                var $check = $('.laggard-check-u');
                                $check.removeClass('fa-circle-o');
                                $check.addClass('fa-check-circle-o');
                            }
                        };

                        if(index=='type' || index=='driver_id' || index=='internal_driver_id' || index=='route_id' || index=='subsidiary_id' || index=='payment'){
                            $("select[name=" + index + "-u]").selectpicker('val', response.data[index]);
                        };

                        if(index=='description' || index=='description-u'){
                            form.find('textarea[name='+index+'-u]').text(response.data[index]);
                        };

                        if(index=='image'){
                            $("."+element.data('table')+"-preview").attr('src', 'storage/images/'+element.data('table')+'/preview_'+response.data[index]);
                        };

                        if(index=='new' || index=='spicy' || index=='special' || index=='recommended'){
                            form.find('input[name='+index+'-u]').val(response.data[index]);
                            if (response.data[index]=="1"){
                            form.find('input[name='+index+'-u]').prop('checked', true);
                            }
                            else{
                                form.find('input[name='+index+'-u]').prop('checked', false);
                            }
                        };
                    }
                });
            };

            $.invoice = function(e, element){

                window.total = 0;
                $("#total-title").html('0.00');


                e.preventDefault();
                $('.btn-update').attr('data-id', element.data('id'));
                $('.btn-update').data('id', element.data('id'));
                $.get(element.data('table')+"/"+element.data('id'), function(response){

                    $('#'+element.data('modal')).modal();
                    var $form = $("#form-add-invoices");

                    $form.find("input[name=total_routes]").val(0)

                    window.tabulator = response.data.tabulator;
                    for(index in window.tabulator){
                        if(index != 'created_at' && index != 'updated_at' && index != 'status' && index != 'category' && index != 'id' && index != 'company_id'){
                            window.tabulator[index] = parseFloat(window.tabulator[index]);
                        };
                    };

                    window.tabulator.wait_daytime = window.tabulator.wait/60;
                    window.tabulator.wait_night  = (window.tabulator.wait_daytime*window.tabulator.night) + window.tabulator.wait_daytime;
                    window.tabulator.disposition_daytime = window.tabulator.disposition/60;
                    window.tabulator.disposition_night  = (window.tabulator.disposition_daytime*window.tabulator.night) + window.tabulator.disposition_daytime;
                    window.tabulator.sprint_daytime = window.tabulator.sprint;
                    window.tabulator.sprint_night = (window.tabulator.sprint*window.tabulator.night) + window.tabulator.sprint;
                    window.tabulator.night_tour = window.tabulator.wait_night;
                    $form.find('input[name=factor_wait_daytime]').val(window.tabulator.wait_daytime);
                    $form.find('input[name=factor_wait_night]').val(window.tabulator.wait_night);
                    $form.find('input[name=factor_disposition_daytime]').val(window.tabulator.disposition_daytime);
                    $form.find('input[name=factor_disposition_night]').val(window.tabulator.disposition_night);
                    $form.find('input[name=factor_sprint_daytime]').val(window.tabulator.sprint_daytime);
                    $form.find('input[name=factor_sprint_night]').val(window.tabulator.sprint_night);
                    $form.find('input[name=factor_night_tour]').val(window.tabulator.night_tour);

                    var data = response.data;
                    var items = response.data.items;
                    var driver = response.data.driver;
                    var invoice = response.data.invoice;

                    if(!invoice){
                        $form.each(function(){ this.reset(); });
                    }
                    else{
                        for(index in invoice){
                            if(invoice[index]==0 || invoice[index]=='0.00'){
                                $form.find('input[name='+index+']').val("");
                            }
                            else{
                                $form.find('input[name='+index+']').val(invoice[index]);
                            };
                        };
                    }

                    $("#order-title").html(data.order);
                    $("#driver-title").html(' Conductor: '+driver.name+'. (Categoria '+driver.category+')');
                    $("#driver-title").html(' Conductor: '+driver.name+'. (Categoria '+driver.category+')');
                    $(".input-service-id").val(data.id);
                    $(".input-factor").val(window.tabulator.km);

                    var $items = $("#table-items");
                    $items.html("");

                    for (var i = 0; i < items.length; i++) {
                        var $item = $.tmpl($('#item-row'), {
                            route: items[i].route.route,
                            subtotal: items[i].subtotal,
                            km: items[i].km,
                            factor: items[i].factor,
                            night: items[i].night,
                            holiday: items[i].holiday,
                            id: items[i].id
                        });
                        $items.append($item);

                        window.total = window.total + parseFloat(items[i].subtotal);

                        $("#total-title").html(parseFloat(window.total.toFixed(2)));
                        $(".input-total").val(parseFloat(window.total.toFixed(2)));
                    };

                    $.totalize();
                });
            };

            $.update = function(){
                $.get('give', function(response){
                    $.render('all', response.data);
                });
            };

            $.view = function(view){
                $.get(view, function(response){
                    $.render(window.view, response.data);
                });
            };

            $.calculate = function(){
                var $form = $('#form-add-items');

                var input_km = $form.find('input[name=km]')
                var input_night = $form.find('input[name=night]');
                var input_holiday = $form.find('input[name=holiday]');
                var input_subtotal = $form.find('input[name=subtotal]');

                var km = 0;
                var night = 0;
                var holiday = 0;

                if(input_km.val() != ""){
                    km = parseFloat(input_km.val());
                };

                var subtotal = parseFloat(km) * parseFloat(window.tabulator.km);

                if(input_night.val() != ""){
                    night = parseFloat(subtotal) * parseFloat(window.tabulator.night);
                    input_night.val(night.toFixed(2));
                };

                if(input_holiday.val() != ""){
                    holiday = parseFloat(subtotal) * parseFloat(window.tabulator.holiday);
                    input_holiday.val(holiday.toFixed(2));
                };

                subtotal = subtotal + night + holiday;
                input_subtotal.val(subtotal.toFixed(2));
            };

            $.totalize = function(){

                var $form = $('#form-add-invoices');
                var total_routes = parseFloat($form.find("input[name=total_routes]").val());

                var inputs = {};
                var values = {};

                var total = 0.00;

                inputs.wait_night_subtotal           = $form.find('input[name=wait_night_subtotal]');
                inputs.wait_daytime_subtotal         = $form.find('input[name=wait_daytime_subtotal]');
                inputs.disposition_night_subtotal    = $form.find('input[name=disposition_night_subtotal]');
                inputs.disposition_daytime_subtotal  = $form.find('input[name=disposition_daytime_subtotal]');
                inputs.sprint_night_subtotal         = $form.find('input[name=sprint_night_subtotal]');
                inputs.sprint_daytime_subtotal       = $form.find('input[name=sprint_daytime_subtotal]');
                inputs.overnight                     = $form.find('input[name=overnight]');
                inputs.night_tour_subtotal           = $form.find('input[name=night_tour_subtotal]');

                for(index in inputs){
                    values[index] = (inputs[index].val() != "") ? parseFloat(inputs[index].val()) : 0.00;
                };

                for(index in values){
                    total = total + values[index];
                }

                total = total + total_routes;

                $("#total-title").html(parseFloat(total.toFixed(2)));
                $form.find("input[name=total]").val(parseFloat(total.toFixed(2)));
            };





            $.week = function ($contenedor, $fecha){

                if($fecha.match(/\//)){
                    $fecha   =   $fecha.replace(/\//g,"-",$fecha); //Permite que se puedan ingresar formatos de fecha ustilizando el "/" o "-" como separador
                };

                $fecha   =   $fecha.split("-"); //Dividimos el string de fecha en trozos (dia,mes,año)
                $dia   =   eval($fecha[0]);
                $mes   =   eval($fecha[1]);
                $ano   =   eval($fecha[2]);

                if ($mes==1 || $mes==2){
                    $a   =   $ano-1;
                    $b   =   Math.floor($a/4)-Math.floor($a/100)+Math.floor($a/400);
                    $c   =   Math.floor(($a-1)/4)-Math.floor(($a-1)/100)+Math.floor(($a-1)/400);
                    $s   =   $b-$c;
                    $e   =   0;
                    $f   =   $dia-1+(31*($mes-1));
                }
                else{
                    $a   =   $ano;
                    $b   =   Math.floor($a/4)-Math.floor($a/100)+Math.floor($a/400);
                    $c   =   Math.floor(($a-1)/4)-Math.floor(($a-1)/100)+Math.floor(($a-1)/400);
                    $s   =   $b-$c;
                    $e   =   $s+1;
                    $f   =   $dia+Math.floor(((153*($mes-3))+2)/5)+58+$s;
                };

                $g   =   ($a+$b)%7;
                $d   =   ($f+$g-$e)%7; //Adicionalmente esta variable nos indica el dia de la semana 0=Lunes, ... , 6=Domingo.
                $n   =   $f+3-$d;

                if ($n<0){
                    $semana   =   53-Math.floor(($g-$s)/5);
                    $ano      =   $ano-1;
                }
                else if ($n>(364+$s)){
                    $semana   = 1;
                    $ano   =   $ano+1;
                }
                else{
                    $semana   =   Math.floor($n/7)+1;
                };

                $contenedor.val("Sem: "+$semana);
            };

            $.gmap = function(){
                var mapDefault;

                var mapOptions = {
                    zoom: 12,
                    center: new google.maps.LatLng(10.641494, -63.256547),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: true,
                };

                mapDefault = new google.maps.Map(document.getElementById('google-map-default'), mapOptions);

                $(window).resize(function() {
                    google.maps.event.trigger(mapDefault, "resize");
                });

                var defaultMapStyles = [];
                var flatMapStyles = [{"stylers":[{"visibility":"off"}]},{"featureType":"road","stylers":[{"visibility":"on"},{"color":"#ffffff"}]},{"featureType":"road.arterial","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"road.highway","stylers":[{"visibility":"on"},{"color":"#fee379"}]},{"featureType":"landscape","stylers":[{"visibility":"on"},{"color":"#f3f4f4"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#7fc8ed"}]},{},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#83cead"}]},{"elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"weight":0.9},{"visibility":"off"}]}];
                var turquoiseWaterStyles = [{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#e0efef"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"hue":"#1900ff"},{"color":"#c0e8e8"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill"},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#7dcdcd"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"on"},{"lightness":700}]}];
                var icyBlueStyles = [{"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}];
                var oldDryMudStyles = [{"featureType":"landscape","stylers":[{"hue":"#FFAD00"},{"saturation":50.2},{"lightness":-34.8},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFAD00"},{"saturation":-19.8},{"lightness":-1.8},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FFAD00"},{"saturation":72.4},{"lightness":-32.6},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FFAD00"},{"saturation":74.4},{"lightness":-18},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00FFA6"},{"saturation":-63.2},{"lightness":38},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#FFC300"},{"saturation":54.2},{"lightness":-14.4},{"gamma":1}]}];
                var cobaltStyles  = [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#293036"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}];
                var darkRedStyles   = [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":10},{"gamma":0.8},{"hue":"#000000"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#293036"}]}];

                $('[data-map-theme]').click(function() {
                    var targetTheme = $(this).attr('data-map-theme');
                    var targetLi = $(this).closest('li');
                    var targetText = $(this).text();
                    var inverseContentMode = false;
                    $('#map-theme-selection li').not(targetLi).removeClass('active');
                    $('#map-theme-text').text(targetText);
                    $(targetLi).addClass('active');
                    switch(targetTheme) {
                        case 'flat':
                            mapDefault.setOptions({styles: flatMapStyles});
                            break;
                        case 'turquoise-water':
                            mapDefault.setOptions({styles: turquoiseWaterStyles});
                            break;
                        case 'icy-blue':
                            mapDefault.setOptions({styles: icyBlueStyles});
                            break;
                        case 'cobalt':
                            mapDefault.setOptions({styles: cobaltStyles});
                            inverseContentMode = true;
                            break;
                        case 'old-dry-mud':
                            mapDefault.setOptions({styles: oldDryMudStyles});
                            break;
                        case 'dark-red':
                            mapDefault.setOptions({styles: darkRedStyles});
                            inverseContentMode = true;
                            break;
                        default:
                            mapDefault.setOptions({styles: defaultMapStyles});
                            break;
                    };
                    if (inverseContentMode === true) {
                        $('#content').addClass('content-inverse-mode');
                    } else {
                        $('#content').removeClass('content-inverse-mode');
                    };
                });
            };

    });








</script>