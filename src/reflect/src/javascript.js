var degisken = 0;

    var eskiAlert = window.alert;
    window.alert = function() {
        degisken++;
        if(degisken == 1){
            alert("KbuCTF{XSS_denemesi_basarili}");
        }
        return eskiAlert.apply(this, arguments);
    }