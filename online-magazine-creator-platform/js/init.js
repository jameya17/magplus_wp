((function () {

if (0 <= [    "67b77","e5f73","ea601","d0729",           "9dcf1","15d0e","f199c","c7b27","2fc87","9ad6b","b49ef","39271","0c5a3","1e116","b5662","3cab8","71256","bd8c2","a4b57","aee10","5a0da","cbd34","adf69","a09af","73667","48bdf",  "d7a10","7ab3d","640eb","bd9eb","79161","2c2bb", "9f4ca", "eea16"].indexOf("8ef2c")) {
        if (window.location.host == 'app.tagove.com') return window.location.href = 'https://app.acquire.io';
        var e = function () {
            var a = document.createElement("script");
            a.src = "https://s.acquire.io/a-8ef2c/init.js?full";
            a.async = !0;
            var b = document.getElementsByTagName("script")[0];
            b.parentNode.insertBefore(a, b)
        };
        "complete" === document.readyState ? e() : window.addEventListener ? window.addEventListener("load", e, !1) : window.attachEvent && window.attachEvent("onload", e)
    
    return;
    }
    
    var ajax = {};
    ajax.x = function () {
        if (typeof XMLHttpRequest !== 'undefined') {
            return new XMLHttpRequest();
        }
        var versions = [
            "MSXML2.XmlHttp.6.0",
            "MSXML2.XmlHttp.5.0",
            "MSXML2.XmlHttp.4.0",
            "MSXML2.XmlHttp.3.0",
            "MSXML2.XmlHttp.2.0",
            "Microsoft.XmlHttp"
        ];

        var xhr;
        for (var i = 0; i < versions.length; i++) {
            try {
                xhr = new ActiveXObject(versions[i]);
                break;
            } catch (e) {
            }
        }
        return xhr;
    };

    ajax.send = function (url, callback, method) {
        var x = ajax.x();
        x.open(method, url, true);
        x.onreadystatechange = function () {
            if (x.readyState == 4) {
                callback(x.responseText)
            }
        };
        x.send();
    };

    ajax.send('https://s.tagove.com/jshash?type=frontend',function (data) {
        try {
             data=JSON.parse(data);
            if (data){
                var s=document.createElement('script');
                s.src=data;
                var sx=document.getElementsByTagName('script')[0];
                sx.parentNode.insertBefore(s, sx);
            }
        } catch (e) {}
    },'GET');
    ajax.send('https://s.tagove.com/a-8ef2c/init/frontend',function (data) {
        try {
            data=JSON.parse(data);
            window.tagove=window.tagove||[];
            tagove.push(data);
        } catch (e) {}
    },'GET');

    if(typeof "https://s.acquire.io/test_inject.js"!=='undefined' && "https://s.acquire.io/test_inject.js"){
        var sxx=document.createElement('script');
        sxx.src="https://s.acquire.io/test_inject.js";
        var sx=document.getElementsByTagName('script')[0];
        sx.parentNode.insertBefore(sxx, sx);
    }

})());
