export default {
    /**
     * Get scroll top
     */
    getScrollTop()
    {
        return $(window).scrollTop();
    },



    /**
     * Hide element on outside click
     */
    hideElementOnOutsideClick(elementToToggle, toggler, toggleClass, fadeSpeed) 
    {
        $(document).on("click", function (e) {
            let target = $(e.target);
            let href   = e.target.href;

            if (target.closest(elementToToggle).length > 0 || target.closest(toggler).length > 0) {
                if (href) {
                    window.location.href = href;
                }

                return false;
            }

            elementToToggle.fadeOut(fadeSpeed)
                           .removeClass(toggleClass);
        });
    },



    /**
     * Print form error messages
     */
    printFormErrorMessage(field, error_text) 
    {
        field.closest(".form-group").append("<span class='error'>" + error_text + "</span>");
    },



    /**
     * Do Ajax
     */
    doAjax(url, type, dataType, data, done = null, fail = null, always = null) 
    {
        $.ajax({
            url: url,
            type: type,
            dataType: dataType,
            data: data,
        }).done(done).fail(fail).always(always);
    },



    /**
     * Show/hide password
     */
    showHidePassword($_element) 
    {
        let input = $_element.parent().find('input');

        $_element.toggleClass('fa-eye fa-eye-slash');
        input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type','password');
    },



    /**
     * Limit input characters
     */
    limitInputCharacters() 
    {
        let fieldSelector = $('.jr-limit-characters');

        fieldSelector.on('keyup keydown', function () {
            let thisField     = $(this);
            let limitIndicator    = thisField.siblings('.remaining-characters');
            let maxLength         = thisField.attr('maxlength');
            let limitText         = limitIndicator.data('limit-text');
            let limitTextSingular = limitIndicator.data('limit-text-singular');
            let textLength        = thisField.val().length;
            let textRemaining     = maxLength - textLength;

            limitIndicator.html(textRemaining + ' ' + (textRemaining > 1 ? limitText : limitTextSingular));
        });
    },



    /**
     * Multiple serializeArray for forms (containing multiple checkboxes for example)
     */
    multipleSerializeArray(form) 
    {
        let form_data = {};

        $.each(form.serializeArray(), function (index, fieldData) {
            if (fieldData.name.endsWith('[]')) {
                let name = fieldData.name.substring(0, fieldData.name.length - 2);
                if (!(name in form_data)) {
                    form_data[name] = [];
                }
                form_data[name].push(fieldData.value);
            } else {
                form_data[fieldData.name] = fieldData.value;
            }
        });

        return form_data;
    },



    /**
     * Scroll to an element
     */
    scrollToElement(element, offsetCorrection) 
    {
        let htmlAndBody = $('html, body');

        htmlAndBody.animate({
            scrollTop: (element.offset().top) + offsetCorrection
        }, 400);
    },



    /**
     * Get a single query param from URL
     */
    getURLQueryParam(name) 
    {
        let querySearch = document.location.search.split('+').join(' ');

        let params = {};
        let tokens = "";
        let re     = /[?&]?([^=]+)=([^&]*)/g;

        while (tokens = re.exec(querySearch)) {
            params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
        }

        return params[name];
    },



    /**
     * Add single query param to URL
     */
    addURLQueryParam(key, value) 
    {
        let currentURL = window.location.href;
        let re         = new RegExp('([?&])' + key + '=.*?(&|$)', 'i');
        let separator  = currentURL.indexOf('?') !== -1 ? '&' : '?';
        let newURL     = '';

        if (currentURL.match(re)) {
            newURL = currentURL.replace(re, '$1' + key + '=' + value + '$2');
        } else {
            newURL = currentURL + separator + key + '=' + value;
        }

        window.history.pushState('', '', newURL);
    },



    /**
     * Remove single query param from URL
     */
    removeURLQueryParam(key, sourceURL) 
    {
        var rtn = sourceURL.split("?")[0],
            param,
            params_arr = [],
            queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";

        if (queryString !== "") {
            params_arr = queryString.split("&");
            for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                param = params_arr[i].split("=")[0];
                if (param === key) {
                    params_arr.splice(i, 1);
                }
            }
            rtn = rtn + "?" + params_arr.join("&");
        }
        
        window.history.pushState('', '', rtn);
    },



    /**
     * Refine URL
     */
    refineURL() 
    {
        window.history.replaceState(null, null, window.location.pathname);   
    },



    /**
     * Convert RGB colors to HEX format
     */
    rgbToHex(rgb) 
    {
        rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        return '#' +
            ('0' + parseInt(rgb[1],10).toString(16)).slice(-2) +
            ('0' + parseInt(rgb[2],10).toString(16)).slice(-2) +
            ('0' + parseInt(rgb[3],10).toString(16)).slice(-2);
    },



    /**
     * Get random array value except an element
     */
    getRandomArrayValueExcept(array, toExclude) 
    {
        for (let i = 0; i < array.length; i++) { 
            if (array[i] === toExclude) { 
                array.splice(i, 1); 
            }
        }

        return array;
    },



    /**
     * Detect if an object is empty
     */
    isObjectEmpty(object) 
    {
        for (let key in object) {
            if (object.hasOwnProperty(key)) {
                return false;
            }
        }

        return true;
    },



    /**
     * Parse float all object values
     */
    parseFloatObjectValues(object) 
    {
        let newObject = {};

        for (let key in object) {
            newObject[key] = parseFloat(object[key]);
        }

        return newObject;
    },



    /**
     * JS nl2br
     */
    nl2br(str, is_xhtml) 
    {
        if (typeof str === 'undefined' || str === null) {
            return '';
        }
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    },



    /**
     * Validate telephone number
     */
    isPhoneNumber(phoneNumber) 
    {
        return /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(phoneNumber);
    },



    /**
     * Display form messages
     */
    displayFormMessages(htmlElementWrapper, messages) 
    {
        let errors = '';

        if (typeof(messages) === 'object')
        {
            for (let i in messages) {
                errors += messages[i] + '<br />';
            }
        }
        else if (typeof(messages) === 'string')
        {
            errors = messages;
        }

        htmlElementWrapper.html(errors);
    }
}