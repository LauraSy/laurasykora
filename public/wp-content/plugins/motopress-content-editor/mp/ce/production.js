try{"undefined"===typeof jQuery?steal.map("jquery/jquery.js",motopress.wpJQueryUrl+"jquery.js").then(motopress.wpJQueryUrl+"jquery.js"):steal.loaded("jquery/jquery.js");steal.then("bootstrap/bootstrap2-custom.min.js"+motopress.pluginVersionParam,"bootstrap/bootstrap-icon.min.css"+motopress.pluginVersionParam).then("mp/ce/concat.js"+motopress.pluginVersionParam,function(a){try{a.hasOwnProperty("fn")&&a.fn.hasOwnProperty("button")&&a.fn.button.hasOwnProperty("noConflict")&&(a.fn.btn=a.fn.button.noConflict()),
new MP.Preloader(a("#motopress-preload")),new MP.Flash(a("#motopress-flash")),new MP.Utils,new MP.Settings}catch(b){MP.Error.log(b)}});var CE={init:function(a){new CE.Navbar(a(".motopress-content-editor-navbar"));new CE.Iframe(a("#motopress-content-editor-scene"));new CE.CodeModal(a("#motopress-code-editor-modal"))}}}catch(e$$13){MP.Error.log(e$$13)};