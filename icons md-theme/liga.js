/* A polyfill for browsers that don't support ligatures. */
/* The script tag referring to this file must be placed before the ending body tag. */

/* To provide support for elements dynamically added, this script adds
   method 'icomoonLiga' to the window object. You can pass element references to this method.
*/
(function () {
    'use strict';
    function supportsProperty(p) {
        var prefixes = ['Webkit', 'Moz', 'O', 'ms'],
            i,
            div = document.createElement('div'),
            ret = p in div.style;
        if (!ret) {
            p = p.charAt(0).toUpperCase() + p.substr(1);
            for (i = 0; i < prefixes.length; i += 1) {
                ret = prefixes[i] + p in div.style;
                if (ret) {
                    break;
                }
            }
        }
        return ret;
    }
    var icons;
    if (!supportsProperty('fontFeatureSettings')) {
        icons = {
            'amazon': '&#xea87;',
            'wikipedia': '&#xeac8;',
            'home': '&#xe902;',
            'camera': '&#xe90f;',
            'photo': '&#xe90f;',
            'mic': '&#xe91e;',
            'microphone': '&#xe91e;',
            'book': '&#xe91f;',
            'read': '&#xe91f;',
            'books': '&#xe920;',
            'library': '&#xe920;',
            'files-empty': '&#xe925;',
            'files': '&#xe925;',
            'credit-card': '&#xe93f;',
            'money5': '&#xe93f;',
            'calculator': '&#xe940;',
            'compute': '&#xe940;',
            'cog': '&#xe994;',
            'gear': '&#xe994;',
            'trophy': '&#xe99e;',
            'cup': '&#xe99e;',
            'gift': '&#xe99f;',
            'present': '&#xe99f;',
            'fire': '&#xe9a9;',
            'flame': '&#xe9a9;',
            'sun': '&#xe9d4;',
            'weather2': '&#xe9d4;',
            'contrast': '&#xe9d5;',
            'brightness-contrast': '&#xe9d6;',
            'star-empty': '&#xe9d7;',
            'rate': '&#xe9d7;',
            'star-half': '&#xe9d8;',
            'rate2': '&#xe9d8;',
            'star-full': '&#xe9d9;',
            'rate3': '&#xe9d9;',
            'heart': '&#xe9da;',
            'like': '&#xe9da;',
            'heart-broken': '&#xe9db;',
            'heart2': '&#xe9db;',
            'warning': '&#xea07;',
            'sign': '&#xea07;',
            'notification': '&#xea08;',
            'warning2': '&#xea08;',
            'question': '&#xea09;',
            'help': '&#xea09;',
            'info': '&#xea0c;',
            'information': '&#xea0c;',
            'cancel-circle': '&#xea0d;',
            'close': '&#xea0d;',
            'blocked': '&#xea0e;',
            'forbidden': '&#xea0e;',
            'arrow-up-left2': '&#xea39;',
            'up-left2': '&#xea39;',
            'arrow-up2': '&#xea3a;',
            'up2': '&#xea3a;',
            'arrow-up-right2': '&#xea3b;',
            'up-right2': '&#xea3b;',
            'arrow-right2': '&#xea3c;',
            'right4': '&#xea3c;',
            'arrow-down-right2': '&#xea3d;',
            'down-right2': '&#xea3d;',
            'arrow-down2': '&#xea3e;',
            'down2': '&#xea3e;',
            'arrow-down-left2': '&#xea3f;',
            'down-left2': '&#xea3f;',
            'arrow-left2': '&#xea40;',
            'left4': '&#xea40;',
            'checkbox-checked': '&#xea52;',
            'checkbox': '&#xea52;',
            'checkbox-unchecked': '&#xea53;',
            'checkbox2': '&#xea53;',
            'paypal': '&#xead8;',
            'brand79': '&#xead8;',
            'file-pdf': '&#xeadf;',
            'file10': '&#xeadf;',
            'file-word': '&#xeae1;',
            'file12': '&#xeae1;',
            'file-excel': '&#xeae2;',
            'file13': '&#xeae2;',
          '0': 0
        };
        delete icons['0'];
        window.icomoonLiga = function (els) {
            var classes,
                el,
                i,
                innerHTML,
                key;
            els = els || document.getElementsByTagName('*');
            if (!els.length) {
                els = [els];
            }
            for (i = 0; ; i += 1) {
                el = els[i];
                if (!el) {
                    break;
                }
                classes = el.className;
                if (/md-icon-/.test(classes)) {
                    innerHTML = el.innerHTML;
                    if (innerHTML && innerHTML.length > 1) {
                        for (key in icons) {
                            if (icons.hasOwnProperty(key)) {
                                innerHTML = innerHTML.replace(new RegExp(key, 'g'), icons[key]);
                            }
                        }
                        el.innerHTML = innerHTML;
                    }
                }
            }
        };
        window.icomoonLiga();
    }
}());
