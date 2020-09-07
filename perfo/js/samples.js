
$(document).ready(function ()
    {
        var WS_URL = 'https://api.eccadresses.com/v2/';

        // Auto complete
        $("#zipcode").mcautocomplete({
            // These next two options are what this plugin adds to the autocomplete widget.
            showHeader: true,

            columns: [
                {
                    name: 'Code Insee',
                    width: '0px',
                    valueField: 'Insee'
                },
                {
                    name: 'Code Postal',
                    width: '100px',
                    valueField: 'PostalCode'
                },
                {
                    name: 'Ville',
                    width: '220px',
                    valueField: 'CityName'
                }
            ],

            autoFocus: true,

            delay: 250,

            // Event handler for when a list item is selected.
            select: function (event, ui)
            {
               // var id = this.id.substr(this.id.length - 1);
                this.value = ui.item ? ui.item.PostalCode : '';
                $("#city").val(ui.item ? ui.item.CityName : '');
                $("#numero").focus();
                $("#insee").val(ui.item ? ui.item.Insee : '');
                return false;
            },

            // The rest of the options are for configuring the ajax webservice call.
            minLength: 1,

            source: function (request, response)
            {
                var $url = WS_URL + 'find_locality_by_code';
console.log(ECC);
                $.ajax({
                    url: $url,
                    dataType: 'jsonp',
                    data: {
                        key: ECC.Key,
                        mask: request.term
                    },

                    // The success event handler will display "No match found" if no items are returned.
                    success: function (data)
                    {
                        var Result;

                        if (!data || data.Header.Code != 0 || !data.Response || data.Response.length == 0)
                        {
                            Result = [];
                        }
                        else
                        {
                            Result = data.Response;
                        }
                        response(Result);
                    }
                });
            }
        });

        $("#city").mcautocomplete({
            // These next two options are what this plugin adds to the autocomplete widget.
            showHeader: true,

            columns: [
                {
                    name: 'Code Insee',
                    width: '0px',
                    valueField: 'Insee'
                },
                {
                    name: 'Code Postal',
                    width: '100px',
                    valueField: 'PostalCode'},
                {
                    name: 'Ville',
                    width: '220px',
                    valueField: 'CityName'}
            ],

            delay: 250,

            autoFocus: true,

            // Event handler for when a list item is selected.
            select: function (event, ui)
            {
                this.value = (ui.item ? ui.item.CityName : '');
                var id = this.id.substr(this.id.length - 1);
                $("#zipcode").val(ui.item ? ui.item.PostalCode : '');
                $("#insee").val(ui.item ? ui.item.Insee : '');
                $("#numero").focus();
                return false;
            },

            // The rest of the options are for configuring the ajax webservice call.
            minLength: 1,

            source: function (request, response)
            {
                var $url = WS_URL + 'find_locality_by_name';

                $.ajax({
                    url: $url,
                    dataType: 'jsonp',
                    data: {
                        key: ECC.Key,
                        mask: request.term
                    },

                    // The success event handler will display "No match found" if no items are returned.
                    success: function (data)
                    {
                        var Result;

                        if (!data || data.Header.Code != 0 || !data.Response || data.Response.length == 0)
                        {
                            Result = [];
                        }
                        else
                        {
                            Result = data.Response;
                        }
                        response(Result);
                    }
                });
            }
        });

        $("#address").mcautocomplete({
            // These next two options are what this plugin adds to the autocomplete widget.
            showHeader: false,

            columns: [
                {
                    name: 'Rue',
                    width: '250px',
                    valueField: 'StreetName'
                }
            ],

            delay: 250,
            autoFocus: true,

            // Event handler for when a list item is selected.
            select: function (event, ui)
            {
                var id = this.id.substr(this.id.length - 1);
                $("#streetId").val(ui.item ? ui.item.StreetId : '');
               // $("#numero").focus();

                this.value = (ui.item ? ui.item.StreetName : '');

                return false;
            },

            // The rest of the options are for configuring the ajax webservice call.
            minLength: 1,

            source: function (request, response)
            {
                var $url = WS_URL + 'find_street_in_locality';
                var id = request.element.id.substr(request.element.id.length - 1);

                $.ajax({
                    url: $url,
                    dataType: 'jsonp',
                    data: {
                        key: ECC.Key,
                        locality_insee: $("#insee").val(),
                        mask: request.term
                    },

                    // The success event handler will display "No match found" if no items are returned.
                    success: function (data)
                    {
                        var Result;

                        if (!data || data.Header.Code != 0 || !data.Response || data.Response.length == 0)
                        {
                            Result = [];
                        }
                        else
                        {
                            Result = data.Response;
                        }
                        response(Result);
                    }
                });
            }
        });
/*
        $("#numero").mcautocomplete({
            showHeader: false,
            columns: [
                {
                    name: 'Num',
                    width: '80px',
                    valueField: 'StreetNumber'
                }
            ],
            autoFocus: true,
            delay: 250,

            select: function (event, ui)
            {
                this.value = ui.item ? ui.item.StreetNumber : '';
                return false;
            },

            minLength: 0,
            source: function (request, response)
            {
                var id = request.element.id.substr(request.element.id.length - 1);

                // find numbers
                $.ajax({
                    url: WS_URL + 'get_street_numbers',
                    dataType: 'jsonp',
                    data: {
                        key: ECC.Key,
                        street_id: $("#DocumentationStreetId").val(),
                        mask: request.term
                    },

                    success: function (data)
                    {
                        var Result;

                        if (!data || data.Header.Code != 0 || !data.Response || data.Response.length == 0)
                        {
                            Result = [];
                        }
                        else
                        {
                            Result = data.Response;
                        }
                        response(Result);
                    }
                });
            }
        });*/
/*
        $("input[name=s_comp1]").mcautocomplete({
            showHeader: false,
            columns: [
                {
                    name: 'Num',
                    width: '80px',
                    valueField: 'AdditionalData'
                }
            ],
            autoFocus: true,
            delay: 250,

            select: function (event, ui)
            {
                this.value = ui.item ? ui.item.AdditionalData : '';
                return false;
            },

            minLength: 0,
            source: function (request, response)
            {
                var id = request.element.id.substr(request.element.id.length - 1);

                // find additional data street avalaible
                $.ajax({
                    url: WS_URL + 'get_street_additional_data',
                    dataType: 'jsonp',
                    data: {
                        key: ECC.Key,
                        street_id: $("#s_street_id" + id).val(),
                        mask: request.term
                    },

                    success: function (data)
                    {
                        var Result;

                        if (!data || data.Header.Code != 0 || !data.Response || data.Response.length == 0)
                        {
                            Result = [];
                        }
                        else
                        {
                            Result = data.Response;
                        }
                        response(Result);
                    }
                });
            }
        });
*/
      /*  $("#DocumentationAddress").mcautocomplete({

            // These next two options are what this plugin adds to the autocomplete widget.
            showHeader: false,

            columns: [
                {
                    name: 'Rue',
                    width: '150px',
                    valueField: 'StreetName'
                },
                {
                    name: 'Code Postal',
                    width: '80px',
                    valueField: 'PostalCode'
                },
                {
                    name: 'Ville',
                    width: '100px',
                    valueField: 'CityName'
                }
            ],

            delay: 0,
            autoFocus: true,

            // Event handler for when a list item is selected.
            select: function (event, ui)
            {
                console.log(event);
                console.log(ui);
               // var id = this.id.substr(this.id.length - 1);

                this.value = ui.item ? $.trim($.trim(ui.item.StreetNumber + ' ' + ui.item.StreetIndice) + ' ' +
                    ui.item.StreetName) + ' ' + ui.item.PostalCode +
                    ' ' + ui.item.CityName : '';

                $("#DocumentationZipcode").val(ui.item ? ui.item.PostalCode : '');
                $("#DocumentationCity").val(ui.item ? ui.item.CityName : '');
                $("#DocumentationAddress").val(ui.item ? ui.item.StreetName : '');
                $("#DocumentationNumero").val(ui.item ? ui.item.StreetNumber : '');
                //$("#s_insee" + id).val(ui.item ? ui.item.Insee : '');

                return false;
            },

            // The rest of the options are for configuring the ajax webservice call.
            minLength: 1,

            source: function (request, response)
            {
                console.log(request);
                console.log(response);
                var $url = WS_URL + 'find_street_in_country';

                $.ajax({
                    url: $url,
                    dataType: 'jsonp',
                    data: {
                        key: ECC.Key,
                        mask: request.term
                    },

                    // The success event handler will display "No match found" if no items are returned.
                    success: function (data)
                    {
                        var Result;

                        if (!data || data.Header.Code != 0 || !data.Response || data.Response.length == 0)
                        {
                            Result = [];
                        }
                        else
                        {
                            Result = data.Response;
                        }
                        response(Result);
                    }
                });
            }
        });
     */
		//$("#mapSample").attr('src' , WS_URL + "show_sample_markers?key=" + ECC.Key);
    }
);

