function Ajax(){

    this.callback = null;

    this.add = function(trigger_id, listenner, path, result_id, append = false, parameters = false, loader = false, func = false){
        let trigger = document.getElementById(trigger_id);
        let result = document.getElementById(result_id);
        let url = this.url(path, parameters);
        this.callback = func;
        let self = this;
        trigger.addEventListener(listenner, function(){
            self.request(url,result,append,loader);
        });

    }

    this.request = function(url, result, append, loader){
        let self = this;
        let request = new XMLHttpRequest();
        let content = result.innerHTML;
        if(loader != false) {
            if (append) {
                result.innerHTML = result.innerHTML + '<div class=\"' + loader + '\"></div>';
            } else {
                result.innerHTML = '<div class=\"' + loader + '\"></div>';
            }
        }
        request.onreadystatechange = function(){
            if(request.readyState === 4){
                if(append){
                    result.innerHTML = content + '<div>'+request.responseText+'</div>';
                }else{
                    result.innerHTML = '<div>'+request.responseText+'</div>'
                }
                let func = self.callback;
                func.call();

            }
        }

        request.open('GET', url, true);
        request.send();
    }


    this.url = function(path, parameters){
        let url = path;
        if(typeof parameters === 'object') {
            url += '?';
            let keylist = Object.keys(parameters);
            for (let i = 0; i < keylist.length; i++) {
                if(i!=0){ url+='&' }
                url += keylist[i] + '=' + parameters[keylist[i]];
            }
        }
        return url;
    }

}
var ajax = new Ajax();