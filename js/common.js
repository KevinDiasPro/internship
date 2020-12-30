/**
 * If input is a string, gets the element whose ID is that string
 * else, returns the input (allowing to call with either the ID or
 * the element
 * @param elem ID string or element
 * @return Element related
 */
function $(elem) {
    var type=typeof(elem);
    if (type=="string") {
        return document.getElementById(elem);
    }
    return elem;
}

/**
* Hides an element given either as parameter or through it's ID string
* @param elem Element to hide
* @return The hidden element
*/

function hide(elem) {
    var el=$(elem);

    if (!el.defdisplay) {
        if ((el.style.display != 'none') && (el.style.display != 'block')) {
            el.defdisplay=el.style.display;
        }
    }

    el.style.display='none';
    return el;
}

/**
* Shows an element given either as parameter or through it's ID string
* @param elem Element to show
* @return The shown element
*/

function show(elem) {
    var el=$(elem);

    if ((el.style.display != '') && (el.style.display != 'none')) {
        return el;
    }

    if (el.defdisplay) {
        el.style.display=el.defdisplay;
    } else {
        el.style.display='block';
    }
    return el;
}

/** 
* Shows an element if it's hidden, hide it if it's shwon. the element is 
* given either as parameter or through it's ID string
* @param elem Element to toggle show
* @return The shown element
*/

function toggle(elem) {
    var el=$(elem);
    if (el.style.display!="none") {
        hide(el);
    } else {
        show(el);
    }
    return el;
}


/** 
* Clears a select given by element or by ID String
* @param tag Select to clear
*/


function selectClear(tag) {
    var el=$(tag);
    while (el.length > 0) {
        el.remove(0);
    }
}

/**
* Appends an option at the end of a select box. Last parameter (optional)
* allows to make it pre-selected
* @param tag select element or ID string of the select
* @param text Textual content of the option (shown to the user)
* @param value Value linked to the option (value attribute)
* @param sel true if the item should be selected. (optional)
*/
function selectAppend(tag,text,value,sel) {
    var el=$(tag);
    sel=sel || false;
    var opt=document.createElement('option');
    opt.text=text;
    opt.value=value;
    if (sel) {
        opt.selected=true;
    }
    try {
        el.add(opt,null);
    } catch (e) {
        el.add(opt); /* IE Bug */
    }
}

/**
* Returns an XMLHttpRequest object. Uses different methods to accomodate
* retarded (old MSIE) browsers which requires ActiveX.
* @return XMLHttpRequest object or null
*/

function getXHR() {
    var xhr = null;
    try {
        xhr=new XMLHttpRequest();
    } catch (e) {
        try {
            xhr=new ActiveXObject('Msxml2.XMLHTTP');
        } catch (e) {
            try {
                xhr = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (e) {
                xhr = null;
            }
        }
    }
    return xhr;
}

/**
* Check that the request may be aborted (request in progress) then aborts it.
* @param xhr The XMLHttpRequest object to be stopped
*/
function abortAJAX(xhr) {
    if (xhr != null && xhr.readyState != 0 && xhr.readyState != 4) {
        xhr.abort();
    }
}

/**
* Checks if value is a valid numeric value.
* @param text Value to test
* @return true if numeric, false else
*/

function isanumber(text) {
    var pattern = /^[-+]?[0-9]+(\.[0-9]+)?$/;
    if (text.match(pattern)==null) {
        return false
    }
    else {
        return true
    }
}

/**
* Checks if value is a valid email
* @param text Value to test
* @return true if valid email, false else
*/

function checkEmail(text) {
   var regexEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; // "Syntax Coloring fix
   if (!regexEmail.test(text)) {
       return false;
   } else {
       return true;
   }
}

/**
* Create a integer number between min and max
*/
function generateInteger(min, max)
{
    var nb;
    nb = Math.random() * (max - min + 1);
    return Math.floor(nb) + min;
}
