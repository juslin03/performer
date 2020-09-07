/*
 * jQuery UI Multicolumn Autocomplete Widget Plugin 1.0
 * Copyright (c) 2012 Mark Harmon
 *
 * Depends:
 *   - jQuery UI Autocomplete widget
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 *  Update and transform by E2C Technologies 
 *	To ECC-ADRESSES
 *	2014 
 *
 */
$.widget('custom.mcautocomplete', $.ui.autocomplete, {
    _renderMenu: function (ul, items)
    {
        var self = this,
            thead;

        if (this.options.showHeader)
        {
            table = $('<div class="ui-widget-header2" style="width:100%"></div>');
            $.each(this.options.columns, function (index, item)
            {
                table.append('<span style="padding:0 4px;float:left;' +
                    ( item.width == "0px" ? 'display:none' : ('width:' + item.width)) + ';">' + item.name + '</span>');
            });
            table.append('<div style="clear: both;"></div>');
            ul.append(table);
        }
        $.each(items, function (index, item)
        {
            self._renderItem(ul, item);
        });
    },

    _renderItem: function (ul, item)
    {
        var t = '',
            result = '';

        $.each(this.options.columns, function (index, column)
        {
            t += '<span style="padding:0 4px;float:left;';
            if (column.width == "0px")
            {
                t += 'display:none ;';
            }
            t += 'width:' + column.width + ';">' + item[column.valueField ? column.valueField : index] + '</span>'
        });

        result = $('<li></li>').data('item.autocomplete', item).append('<a class="mcacAnchor">' + t + '<div style="clear: both;"></div></a>').appendTo(ul);
        return result;
    },

    _search: function( value ) {
        this.pending++;
        this.element.addClass( "ui-autocomplete-loading" );
        this.cancelSearch = false;

        this.source( { term: value , element : this.element[0]  }, this._response());
    }

});
