// JavaScript Document

var Util = {
    setCookie:function(cname, cvalue, exdays)
    {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    },
    getCookie:function(cname)
    {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ')
                c = c.substring(1);
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    },
    checkCookie:function(cname)
    {
        var name = Util.getCookie(cname);
        if (name != "") {
            return name;
        } else {
            return false;
        }
    },
    getKey:function (app_id,auth_host,date,search)
    {
        $.ajax({
            type: "GET",
            url: "https://"+auth_host+"/v1/auth?appid="+app_id+"&date="+date,
            dataType: 'jsonp',
            async:true,
            crossDomain:true,
            success: function (data) {
                if(data.status ="success")
                {
                    Util.setCookie('key',data.key);
                }
                search();
            },
            error : function (data) {
               search();
            }
        });
    },
}


