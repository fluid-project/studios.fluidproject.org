/*
Copyright 2012 OCAD University
Copyright 2012 Johnny Taylor

Licensed under the Educational Community License (ECL), Version 2.0 or the New
BSD license. You may not use this file except in compliance with one these
Licenses.

You may obtain a copy of the ECL 2.0 License and BSD License at
https://github.com/fluid-project/infusion/raw/master/Infusion-LICENSE.txt
*/

// Declare dependencies
/*global fluid, fs:true, jQuery*/

// JSLint options 
/*jslint white: true, funcinvoke: true, undef: true, newcap: true, nomen: true, regexp: true, bitwise: true, browser: true, forin: true, maxerr: 100, indent: 4 */

var fs = fs || {};

(function () {
    // create the "fs.ie7.slidingPanel" namespace
    fluid.registerNamespace("fs.ie7.slidingPanel");
    
    // new final init function to add the focus styling in IE7 to the toggle button
    fs.ie7.slidingPanel.finalInit = function (that) {

				var toggleButton = that.locate("toggleButton");
        
        // add the ie7Focus style on focus of the toggle button
        toggleButton.focus(function () {
            toggleButton.addClass(that.options.styles.ie7Focus);
        });
        
        // remove the ie7Focus style on blur of the toggle button
        toggleButton.blur(function () {
            toggleButton.removeClass(that.options.styles.ie7Focus);
        });
        
        // call the components default final init function
        fluid.slidingPanel.finalInit(that);
    };
    
    // demands block to add the ie7Focus style and override the finalInitFunction
    fluid.demands("fluid.slidingPanel", ["fluid.uiOptions.fatPanel"], {
        options: {
            finalInitFunction: "fs.ie7.slidingPanel.finalInit",
            styles: {
                ie7Focus: "focus"
            }
        }
    });
})();